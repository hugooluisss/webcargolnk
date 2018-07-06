<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listatipocamion':
		$db = TBase::conectaDB();
		global $sesion;
		
		$sql = "select * from tipocamion a where a.visible = true";		
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		$smarty->assign("lista", $datos);
	break;
	case 'ctipocamion':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				$obj = new TTipoCamion();
				
				$obj->setId($_POST['id']);
				$obj->setDescripcion($_POST['descripcion']);
				$band = $obj->guardar();
				
				$smarty->assign("json", array("band" => $band));
			break;
			case 'del':
				$obj = new TTipoCamion($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
}
?>