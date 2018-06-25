<?php
global $objModulo;
switch($objModulo->getId()){
	case 'pedidos':
		$db = TBase::conectaDB();
		
		if ($userSesion->getPerfil() <> 3){
			$rs = $db->query("select * from producto where visible = true order by descripcion");
			$datos = array();
			while($row = $rs->fetch_assoc()){
				$row['json'] = json_encode($row);
				
				array_push($datos, $row);
			}
			
			$smarty->assign("productos", $datos);
		}else
			$smarty->assign("productos", array());
		
		$rs = $db->query("select * from paqueteria where visible = true");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("paqueterias", $datos);
	break;
	case 'listaPedidos':
		$db = TBase::conectaDB();
		global $userSesion;
		$rs = $db->query("select a.*, b.nombre as cliente, b.email as correo, c.nombre as estado, c.color from pedido a join usuario b using(idUsuario) join estado c using(idEstado) order by idPedido");
		$datos = array();
		$usuario = new TUsuario();
		while($row = $rs->fetch_assoc()){
			$usuario->setId($row['idUsuario']);
			if ($userSesion->getPerfil() == 3)
				$row['noPrecio'] = 1;
			else
				$row['noPrecio'] = $usuario->suscripcion->membresia->getNoPrecio();
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'cpedidos':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TPedido();
				$obj->estado->setId($_POST['id']);
				$obj->setComentario($_POST['comentario']);
				$obj->setEnvio($_POST['envio']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TPedido($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
			case 'setEnvio':
				$obj = new TPedido($_POST['id']);
				$obj->setEnvio($_POST['envio']);
				$smarty->assign("json", array("band" => $obj->guardar()));
			break; 
			case 'getDatos':
				$db = TBase::conectaDB();
		
				$rs = $db->query("select * from pedido where idPedido = ".$_POST['id']."");
				$row = $rs->fetch_assoc();
				$pedido = new TPedido($_POST['id']);
				$row['total'] = $pedido->getTotal();
				$row['subtotal'] = $row['total'] - $pedido->getEnvio();
				$smarty->assign("json", array("band" => $rs?true:false, "datos" => $row));
			break;
			case 'uploadFactura':
				$ext = explode(".", $_FILES['upl']['name']);
				$ext = $ext[count($ext) - 1];
				
				if (strtolower($ext) == 'zip'){
					if(isset($_FILES['upl']) and $_FILES['upl']['error'] == 0 and $_GET['pedido'] <> ''){
						$carpeta = "repositorio/factura/";
						mkdir($carpeta, 0777, true);
						chmod($carpeta, 0755);
						
						if(move_uploaded_file($_FILES['upl']['tmp_name'], $carpeta."factura".$_GET['pedido'].".zip")){
							chmod($carpeta."factura".$_GET['cotizacion'].".zip", 0755);
							
							$pedido = new TPedido($_GET['pedido']);
							$pedido->estado->setId(5);
							$pedido->guardar();
							echo '{"status":"success"}';
							exit;
						}
					}
				}
				
				echo '{"status":"error", "extension":"'.$ext.'", "upload": "'.$_FILES['upl']['error'].'"}';
			break;
			case 'setPaqueteria':
				$pedido = new TPedido($_POST['id']);
				if ($pedido->setGuia($_POST['paqueteria'], $_POST['guia'])){
					$pedido->estado->setId(6);
					$pedido->guardar();
					
					$smarty->assign("json", array("band" => true));
				}else
					$smarty->assign("json", array("band" => false));
			break;
		}
	break;
};
?>