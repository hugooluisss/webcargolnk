<?php
global $objModulo;
switch($objModulo->getId()){
	case 'cotizador':
		$db = TBase::conectaDB();
		global $userSesion;
		if ($userSesion->getActivo()){
			if ($userSesion->suscripcion->getId() <> ''){
				$rs = $db->query("select * from producto where visible = true order by marca, tipo, descripcion");
				$datos = array();
				while($row = $rs->fetch_assoc()){
					if ($marca[$row['marca']] == '')
						$marca[$row['marca']] = 1;
					else
						$marca[$row['marca']]++;
					
					if ($tipo[$row['tipo']] == '')
						$tipo[$row['tipo']] = 1;
					else
						$tipo[$row['tipo']]++;
					
					$row['json'] = json_encode($row);
					
					array_push($datos, $row);
				}
				
				$smarty->assign("productos", $datos);
				$smarty->assign("marcas", $marca);
				$smarty->assign("tipos", $tipo);
				global $ini;
				$smarty->assign("ini", $ini);
			}else{
				header ("Location: membresia");
			}
		}else{
			header ("Location: activarCuenta");
		}
	break;
	case 'listaPedidosCotizador':
		$db = TBase::conectaDB();
		global $userSesion;
		$rs = $db->query("select *, b.nombre as estado from pedido a join estado b using(idEstado) where idUsuario = ".$userSesion->getId()."  and idEstado in (1, 2, 3, 4, 5, 6)");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['noPrecio'] = $userSesion->suscripcion->membresia->getNoPrecio();
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		$smarty->assign("lista", $datos);
	break;
	case 'listaProductosPedido':
		$pedido = new TPedido($_POST['pedido']);
		if (isset($_POST['pedido'])){
			$db = TBase::conectaDB();
			
			$rs = $db->query("select * from movimiento a join producto b using(idProducto) where idPedido = ".$_POST['pedido']);
			$datos = array();
			while($row = $rs->fetch_assoc()){
				if ($userSesion->getPerfil() == 3)
					$row['precio'] = $row['precio1'];
					
				$row['json'] = json_encode($row);
				
				array_push($datos, $row);
			}
			$smarty->assign("lista", $datos);
		}
		
		$smarty->assign("pedido", $pedido);
	break;
	case 'ccotizador':
		switch($objModulo->getAction()){
			case 'nuevoPedido':
				$pedido = new TPedido($_POST['pedido']);
				
				global $userSesion;
				
				if ($_POST['pedido'] == ''){
					global $userSesion;
					$pedido->usuario->setId($userSesion->getId());
					$pedido->guardar();
				}
				
				$smarty->assign("json", array("band" => $pedido->guardar(), "pedido" => $pedido->getId(), "precio" => $pedido->usuario->suscripcion->membresia->getNoPrecio()));
			break;
			case 'addMovimiento':
				$pedido = new TPedido($_POST['pedido']);
				
				if ($pedido->getId() <> ''){
					$movimiento = new TMovimiento($_POST['movimiento']);
					$movimiento->producto = new TProducto($_POST['producto']);
					$movimiento->setCantidad($_POST['cantidad']);
					switch($pedido->usuario->suscripcion->membresia->getNoPrecio()){
						case '1':
							$movimiento->setPrecio($movimiento->producto->getPrecio1());
						break;
						case '2':
							$movimiento->setPrecio($movimiento->producto->getPrecio2());
						break;
						case '3':
							$movimiento->setPrecio($movimiento->producto->getPrecio3());
						break;
						case '4':
							$movimiento->setPrecio($movimiento->producto->getPrecio4());
						break;
					}
					
					$movimiento->setPedido($pedido->getId());
					
					if ($movimiento->guardar())
						$smarty->assign("json", array("band" => true, "pedido" => $pedido->getId()));
					else
						$smarty->assign("json", array("band" => false, "mensaje" => "No se guardó"));
				}else
					$smarty->assign("json", array("band" => false, "mensaje" => "No se generó la orden"));
			break;
			case 'del':
				$obj = new TMovimiento($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
			case 'setEstado':
				$obj = new TPedido($_POST['id']);
				$obj->estado->setId($_POST['estado']);
				/*
				switch($obj->estado->getId()){
					case 3:
						$email = new TMail2();
						$email->setTema("Orden aprobada");
						$email->addDestino($orden->usuario->getEmail(), utf8_decode($orden->usuario->getNombre()));
						$cuerpo = file_get_contents("repositorio/correo/head.html");
						$cuerpo .= file_get_contents("repositorio/correo/aprobadaCliente.html");
						$email->setBodyHTML(utf8_decode($email->construyeMail($cuerpo, $datos)));
					break;
				}
				*/
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'imprimir':
				global $userSesion;
				require_once(getcwd()."/repositorio/pdf/pedido.php");
				$idVenta = $_POST['id'] == ''?$_GET['id']:$_POST['id'];
				$pdf = new RPedido($idVenta, $userSesion->getPerfil() == 3);
				$pdf->generar();
				$documento = $pdf->Output();
				header("Location: ".$documento);
			break;
			case 'uploadComprobante':
				$ext = explode(".", $_FILES['upl']['name']);
				$ext = $ext[count($ext) - 1];
				
				if (strtolower($ext) == 'jpg' or strtolower($ext) == 'jpeg'){
					if(isset($_FILES['upl']) and $_FILES['upl']['error'] == 0 and $_GET['cotizacion'] <> ''){
						$carpeta = "repositorio/comprobante/";
						mkdir($carpeta, 0777, true);
						chmod($carpeta, 0755);
						
						#$_FILES['upl']['name']
						if(move_uploaded_file($_FILES['upl']['tmp_name'], $carpeta."comprobante".$_GET['cotizacion'].".jpg")){
							chmod($carpeta."comprobante".$_GET['cotizacion'].".jpg", 0755);
							
							$pedido = new TPedido($_GET['cotizacion']);
							$pedido->estado->setId(4);
							$pedido->guardar();
							echo '{"status":"success"}';
							exit;
						}
					}
				}
				
				echo '{"status":"error", "extension":"'.$ext.'", "upload": "'.$_FILES['upl']['error'].'"}';
			break;
			case 'confirmar': #para confirmar el pago a traves de paypal
				$pedido =  new TPedido(base64_decode($_GET['codigo']));
				$pedido->setComentario($pedido->getComentario()." Orden pagada en PAYPAL");
				$pedido->estado->setId(4);
				$pedido->guardar();
				if ($pedido->guardar())
					header("Location: cotizador");
			break;
		}
	break;
};
?>