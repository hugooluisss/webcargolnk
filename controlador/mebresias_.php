<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaMembresias':
		$db = TBase::conectaDB();
		$sql = "select * from membresia where visible = true";
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'cmembresias':
		switch($objModulo->getAction()){
			case 'update':
				$obj = new TMembresia();
				$obj->setId($_POST['id']);
				$obj->setTitulo($_POST['titulo']);
				$obj->setDescripcion($_POST['descripcion']);
				$obj->setPrecio($_POST['precio']);
				$obj->setNoPrecio($_POST['noprecio']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TMembresia($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
};
?>