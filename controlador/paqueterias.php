<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaPaqueterias':
		$db = TBase::conectaDB();
		
		$rs = $db->query("select * from paqueteria where visible = true");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'cpaqueterias':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TPaqueteria();
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setUrl($_POST['url']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TPaqueteria($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
};
?>