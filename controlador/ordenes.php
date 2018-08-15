<?php
global $objModulo;
switch($objModulo->getId()){
	case 'cargas':
		$db = TBase::conectaDB();
		$sql = "select * from tipocamion where visible = true";
		$rs = $db->query($sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		$smarty->assign("tipoCamion", $datos);
		
		$sql = "select * from estado";
		$rs = $db->query($sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		$smarty->assign("estados", $datos);
	break;
	case 'listaordenes':
		$db = TBase::conectaDB();
		$sql = "select * from orden a join estado b using(idEstado) join tipocamion c using(idTipoCamion)";
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$sql = "select count(*) as total from interesado where idOrden = ".$row['idOrden'];
			$rs2 = $db->query($sql) or errorMySQL($db, $sql);
			$row2 = $rs2->fetch_assoc();
			
			$row['interesados'] = $row2['total'] == ''?0:$row2['total'];
			$row['origen_json'] = json_decode($row['origen']);
			$row['destino_json'] = json_decode($row['destino']);
			$row['salida'] = "";
			
			$row['json'] = json_encode($row);
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'listaordenestransportistas':
		$transportista = new TTransportista($_POST['transportista']);
		$db = TBase::conectaDB();
		$sql = "select *, c.descripcion as descripcionTipoCamion, GLength(LineString(salida, GeomFromText('point(".$_POST['posicion']['coords']['latitude']." ".$_POST['posicion']['coords']['longitude'].")'))) * 100 as distancia from orden a join tipocamion c using(idTipoCamion) where idEstado = 1 and idTipoCamion = ".$transportista->tipoCamion->getId()." order by distancia, fechaServicio";
		
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$sql = "select * from interesado where idTransportista = ".$transportista->getId()." and idOrden = ".$row['idOrden'];
			$rs2 = $db->query($sql) or errorMySQL($db, $sql);
			if ($rs2->num_rows == 0){
				$row['origen_json'] = json_decode($row['origen']);
				$row['direccion_origen'] = $row['origen_json']->direccion;
				$row['destino_json'] = json_decode($row['destino']);
				$row['direccion_destino'] = $row['destino_json']->direccion;
				$row['salida'] = '';
				
				array_push($datos, $row);
			}
		}
		
		$smarty->assign("json", $datos);
	break;
	case 'listaordenestransportistaspostuladas':
		$transportista = new TTransportista($_POST['transportista']);
		$db = TBase::conectaDB();
		$sql = "select *, c.descripcion as descripcionTipoCamion, b.registro, b.monto from orden a join interesado b using(idOrden) join tipocamion c using(idTipoCamion) where idEstado in (1, 2) and b.idTransportista = ".$transportista->getId()." order by b.registro";
		
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['origen_json'] = json_decode($row['origen']);
			$row['direccion_origen'] = $row['origen_json']->direccion;
			$row['destino_json'] = json_decode($row['destino']);
			$row['direccion_destino'] = $row['destino_json']->direccion;
			$row['salida'] = '';
				
			array_push($datos, $row);
		}
		
		$smarty->assign("json", $datos);
	break;
	case 'listaordenestransportistasadjudicadas':
		$transportista = new TTransportista($_POST['transportista']);
		$db = TBase::conectaDB();
		$sql = "select *, c.descripcion as descripcionTipoCamion, b.fecha from orden a join asignadotransportista b using(idOrden) join tipocamion c using(idTipoCamion) where idEstado in (3, 4) and b.idTransportista = ".$transportista->getId()." order by b.fecha";
		
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['origen_json'] = json_decode($row['origen']);
			$row['direccion_origen'] = $row['origen_json']->direccion;
			$row['destino_json'] = json_decode($row['destino']);
			$row['direccion_destino'] = $row['destino_json']->direccion;
			$row['salida'] = '';
				
			array_push($datos, $row);
		}
		
		$smarty->assign("json", $datos);
	break;
	case 'listaordenestransportistasfinalizadas':
		$transportista = new TTransportista($_POST['transportista']);
		$db = TBase::conectaDB();
		$sql = "select *, c.descripcion as descripcionTipoCamion, b.fecha from orden a join asignadotransportista b using(idOrden) join tipocamion c using(idTipoCamion) where idEstado in (5) and b.idTransportista = ".$transportista->getId()." order by b.fecha desc";
		
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['origen_json'] = json_decode($row['origen']);
			$row['direccion_origen'] = $row['origen_json']->direccion;
			$row['destino_json'] = json_decode($row['destino']);
			$row['direccion_destino'] = $row['destino_json']->direccion;
			$row['salida'] = '';
				
			array_push($datos, $row);
		}
		
		$smarty->assign("json", $datos);
	break;
	case 'listaPosicionesOrden':
		$db = TBase::conectaDB();
		
		$sql = "select * from posicion where idOrden = ".$_POST['orden'];
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'reporte':
		$directorio = "repositorio/reportes/orden_".$_POST['orden']."/";
		$ficheros = array();
		
		if (is_dir($directorio)){
			$gestor_dir = opendir($directorio);
			
			while (false !== ($nombre_fichero = readdir($gestor_dir))) {
				if (!in_array($nombre_fichero, array(".", "..")))
					$ficheros[] = $directorio.$nombre_fichero;
			}
		}
		$smarty->assign("fotos", $ficheros);
		
		$db = TBase::conectaDB();
		
		$sql = "select * from asignadotransportista where idOrden = ".$_POST['orden'];
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$row = $rs->fetch_assoc();
		
		$smarty->assign("comentarios", $row['comentarios']);
	break;
	case 'cordenes':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				$obj = new TOrden();
				$obj->setId($_POST['id']);
				$obj->tipoCamion = new TTipoCamion($_POST['tipoCamion']);
				$obj->estado = new TEstado($_POST['estado'] == ''?1:$_POST['estado']);
				
				$obj->setCorreo($_POST['correo']);
				$obj->setTelefono($_POST['telefono']);
				$obj->setDescripcion($_POST['descripcion']);
				$obj->setFechaServicio($_POST['fechaServicio']);
				$obj->setOrigen($_POST['origen']);
				$obj->setDestino($_POST['destino']);
				$obj->setPresupuesto($_POST['presupuesto']);
				$obj->setPeso($_POST['peso']);
				
				$band = $obj->guardar();
				
				$smarty->assign("json", array("band" => $band, "folio" => $obj->getFolio()));
			break;
			case 'del':
				$obj = new TOrden($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
			case 'findCodigo':
				$db = TBase::conectaDB();
				$sql = "select idOrden from orden where folio = ".$_POST['codigo'];
				$rs = $db->query($sql) or errorMySQL($db, $sql);
				$row = $rs->fetch_assoc();
				if ($rs->num_rows == 0)
					$smarty->assign("json", array("band" => false));
				else
					$smarty->assign("json", array("band" => true, "id" => $row['idOrden']));
			break;
			case 'adjudicar':
				$obj = new TOrden($_POST['orden']);
				$band = $obj->aceptar($_POST['transportista'], $_POST['monto']);
				if ($band){
					$transportista = new TTransportista($_POST['transportista']);
					/*
					$notificacion = new TNotificacion();
					$notificacion->setOrden($obj->getId());
					$notificacion->setMensaje($transportista->getNombre()." se interesó en la orden".$obj->getFolio()."");
					$notificacion->guardar($obj->usuario->getId());
					*/
				}
				$smarty->assign("json", array("band" => $band));
			break;
			case 'asignar':
				$obj = new TOrden($_POST['orden']);
				$band = $obj->asignar($_POST['transportista'], $_POST['monto']);
				/*
				if($band){
					
					$db = TBase::conectaDB();
						
					$sql = "select distinct idUsuario from ordenregion join transportistaregion using(idRegion) join chofer c using(idTransportista) join usuario using(idUsuario) where idOrden = ".$obj->getId()." and idPerfil = 4 and idEmpresa = ".$obj->empresa->getId();
					$rs = $db->query($sql) or errorMySQL($db, $sql);
					
					$notificacion = new TNotificacion();
					$notificacion->setOrden($obj->getId());
					
					while($row = $rs->fetch_assoc()){
						$notificacion->setMensaje("¡¡¡ Felicidades !!! asignaron la ordende trabajo con folio ".$obj->getFolio()." a tu empresa, consulta los detalles de la orden y asignasela a un chofer");
							
						$notificacion->guardar($row['idUsuario']);
					}
					
				}
				*/
						
				$smarty->assign("json", array("band" => $band));
			break;
			case 'desasignar':
				$obj = new TOrden($_POST['orden']);
				$band = $obj->desasignar();
				/*
				if($band){
					
					$db = TBase::conectaDB();
						
					$sql = "select distinct idUsuario from ordenregion join transportistaregion using(idRegion) join chofer c using(idTransportista) join usuario using(idUsuario) where idOrden = ".$obj->getId()." and idPerfil = 4 and idEmpresa = ".$obj->empresa->getId();
					$rs = $db->query($sql) or errorMySQL($db, $sql);
					
					$notificacion = new TNotificacion();
					$notificacion->setOrden($obj->getId());
					
					while($row = $rs->fetch_assoc()){
						$notificacion->setMensaje("¡¡¡ Felicidades !!! asignaron la ordende trabajo con folio ".$obj->getFolio()." a tu empresa, consulta los detalles de la orden y asignasela a un chofer");
							
						$notificacion->guardar($row['idUsuario']);
					}
					
				}
				*/
						
				$smarty->assign("json", array("band" => $band));
			break;
			case 'setEnRuta':
				$obj = new TOrden($_POST['orden']);
				$obj->estado->setId(4);
				$band = $obj->guardar();
				$smarty->assign("json", array("band" => $band));
			break;
			case 'terminar':
				$obj = new TOrden($_POST['orden']);
				mkdir("repositorio/reportes/orden_".$obj->getId()."/", 0777, true);
				
				for($i = 1 ; $i < 5 ; $i++)
					saveImage($_POST['foto'.$i], "repositorio/reportes/orden_".$obj->getId()."/".date("Ymd_His")."_".$i.".jpg");
				
				$band = $obj->terminar($_POST['comentario']);
				$result = $band;
				/*
				if ($band and false){
					$notificacion = new TNotificacion();
					$notificacion->setOrden($orden->getId());
					$notificacion->setMensaje("Han entregado el servicio en el punto ".$obj->getDireccion()." de la orden ".$orden->getFolio()."");
					$notificacion->guardar($orden->usuario->getId());
					
					$db = TBase::conectaDB();
					$sql = "select * from asignadotransportista where idOrden = ".$obj->getId();
					$rs = $db->query($sql) or errorMySQL($db, $sql);
					$row = $rs->fetch_assoc();
					
					$transportista = new TTransportista($row['idTransportista']);
					$datos = array();
					$datos['transportista.nombre'] = $transportista->getNombre();
					$datos['orden.folio'] = $orden->getFolio();
					$datos['usuario.nombre'] = $orden->usuario->getNombre();
					$datos['orden.comentario'] = utf8_decode($_POST['comentario']);
					
					$datos['sitio.url'] = $ini["sistema"]["url"];
					
					$email = new TMail();
					$email->setTema("Orden terminada");
					$email->addDestino($orden->usuario->getEmail(), utf8_decode($orden->usuario->getNombre()));
					#$email->addDestino("hugooluisss@gmail.com", "Hugo Santiago");
					
					$directorio = "repositorio/reportes/punto_".$obj->getId()."/";
					$gestor_dir = opendir($directorio);
					//$email->adjuntos = array();
					$s = "";
					while (false !== ($nombre_fichero = readdir($gestor_dir))){
						if (!in_array($nombre_fichero, array(".", ".."))){
							$email->adjuntar($directorio.$nombre_fichero);
							array_push($email->adjuntos, array("nombre" => $nombre_fichero, "ruta" => $directorio.$nombre_fichero));
							#$s .= '<img src="'.$ini["sistema"]["url"].$directorio.$nombre_fichero.'" />';
						}
					}
					closedir($gestor_dir);
					
					$email->setBodyHTML(utf8_decode($email->construyeMail(file_get_contents("repositorio/mail/OrdenTerminada.html"), $datos)));
					$result = $email->send();	
				}
				*/
				
				$smarty->assign("json", array("band" => $band, "correo" => $result));
			break;
			case 'addPosicion':
				$orden = new TOrden($_POST['orden']);
				
				$smarty->assign("json", array("band" => $orden->addPosicion($_POST['latitude'], $_POST['longitude'], $_POST['gps'])));
			break;
			case 'getLastPosicion':
				$db = TBase::conectaDB();
				$sql = "select * from posicion where idOrden = ".$_POST['orden']." order by fecha desc limit 1";
				$rs = $db->query($sql) or errorMySQL($db, $sql);
				
				$smarty->assign("json", $rs->fetch_assoc());
			break;
			case 'terminar':
				$obj = new TOrden($_POST['orden']);
				mkdir("repositorio/reportes/orden_".$obj->getId()."/", 0777, true);
				
				for($i = 1 ; $i < 5 ; $i++)
					saveImage($_POST['foto'.$i], "repositorio/reportes/orden_".$obj->getId()."/".date("Ymd_His")."_".$i.".jpg");
				
				$band = $obj->setTerminar($_POST['comentario']);
				$result = $band;
				
				/*
				if ($band){
					$notificacion = new TNotificacion();
					$notificacion->setOrden($orden->getId());
					$notificacion->setMensaje("Han entregado el servicio en el punto ".$obj->getDireccion()." de la orden ".$orden->getFolio()."");
					$notificacion->guardar($orden->usuario->getId());
					
					$db = TBase::conectaDB();
					$sql = "select * from asignadotransportista where idOrden = ".$obj->getId();
					$rs = $db->query($sql) or errorMySQL($db, $sql);
					$row = $rs->fetch_assoc();
					
					$transportista = new TTransportista($row['idTransportista']);
					$datos = array();
					$datos['transportista.nombre'] = $transportista->getNombre();
					$datos['orden.folio'] = $orden->getFolio();
					$datos['usuario.nombre'] = $orden->usuario->getNombre();
					$datos['orden.comentario'] = utf8_decode($_POST['comentario']);
					
					$datos['sitio.url'] = $ini["sistema"]["url"];
					
					$email = new TMail();
					$email->setTema("Orden terminada");
					$email->addDestino($orden->usuario->getEmail(), utf8_decode($orden->usuario->getNombre()));
					#$email->addDestino("hugooluisss@gmail.com", "Hugo Santiago");
					
					$directorio = "repositorio/reportes/punto_".$obj->getId()."/";
					$gestor_dir = opendir($directorio);
					//$email->adjuntos = array();
					$s = "";
					while (false !== ($nombre_fichero = readdir($gestor_dir))){
						if (!in_array($nombre_fichero, array(".", ".."))){
							$email->adjuntar($directorio.$nombre_fichero);
							array_push($email->adjuntos, array("nombre" => $nombre_fichero, "ruta" => $directorio.$nombre_fichero));
							#$s .= '<img src="'.$ini["sistema"]["url"].$directorio.$nombre_fichero.'" />';
						}
					}
					closedir($gestor_dir);
					
					$email->setBodyHTML(utf8_decode($email->construyeMail(file_get_contents("repositorio/mail/OrdenTerminada.html"), $datos)));
					$result = $email->send();	
				}
				*/
				$smarty->assign("json", array("band" => $band, "correo" => $result));
			break;
		}
	break;
}
?>