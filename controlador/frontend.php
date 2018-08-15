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
	case 'administracion':
		$db = TBase::conectaDB();
		$sql = "select * from orden where idOrden = ".$_GET['id'];
		$rs = $db->query($sql);
		$row = $rs->fetch_assoc();
		
		$row['origen_json'] = json_decode($row['origen']);
		$row['destino_json'] = json_decode($row['destino']);
		$row['salida'] = "";
		
		$smarty->assign("datosOrden", json_encode($row));
	break;
}
?>