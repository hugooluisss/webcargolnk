<?php
global $objModulo;
switch($objModulo->getId()){
	case 'inicio':
		$db = TBase::conectaDB();
		$sql = "select * from tipocamion where visible = true";
		$rs = $db->query($sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		$smarty->assign("tipoCamion", $datos);
	break;
}
?>