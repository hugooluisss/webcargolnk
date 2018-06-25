<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listapuestos':
		$db = TBase::conectaDB();
		
		$rs = $db->query("select * from puesto where visible = true");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'cpuestos':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TPuesto();
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setClave($_POST['clave']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TPuesto($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
};
?>