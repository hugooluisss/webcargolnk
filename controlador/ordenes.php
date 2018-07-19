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
		$sql = "select *, c.descripcion as descripcionTipoCamion from orden a join interesado b using(idOrden) join tipocamion c using(idTipoCamion) where idEstado in (1, 2) and b.idTransportista = ".$transportista->getId()." order by b.registro";
		
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
		}
	break;
}
?>