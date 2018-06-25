<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listasolicitudes':
		$db = TBase::conectaDB();
		
		$rs = $db->query("select a.*, b.nombre as usuario, c.nombre as departamento, d.nombre as unidad from solicitud a join usuario b using(idUsuario) join departamento c using(idDepartamento) join unidad d using(idUnidad)");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'csolicitudes':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TSolicitud();
				$obj->setId($_POST['id']);
				$obj->setFecha($_POST['fecha']);
				$obj->setJSON($_POST['data']);
				$obj->departamento = new TDepartamento($_POST['departamento']);
				$obj->usuario = new TUsuario($_POST['usuario']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TSolicitud($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
			case 'update':
				$obj = new TSolicitud();
				$obj->setId($_POST['id']);
				$obj->setEstado($_POST['estado']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
		}
	break;
};
?>