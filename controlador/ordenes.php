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
			$row['origen_json'] = json_decode($row['origen']);
			$row['destino_json'] = json_decode($row['destino']);
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
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
				
				$band = $obj->guardar();
				
				$smarty->assign("json", array("band" => $band, "folio" => $obj->getFolio()));
			break;
			case 'del':
				$obj = new TOrden($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
}
?>