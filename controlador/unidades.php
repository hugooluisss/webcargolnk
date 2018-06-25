<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaunidades':
		$db = TBase::conectaDB();
		
		$rs = $db->query("select * from unidad where visible = true");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'cunidades':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TUnidad();
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setClave($_POST['clave']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TUnidad($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
};
?>