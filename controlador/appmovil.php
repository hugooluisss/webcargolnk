<?php
global $objModulo;
switch($objModulo->getId()){
	case 'appmovil':
		$db = TBase::conectaDB();
		
		$rs = $db->query("select * from seccionesapp a left join seccion b using(idSeccion);");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
		
		$rs = $db->query("select * from seccion where visible = true and publicada = true");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("secciones", $datos);
	break;
	case 'cappmovil':
		switch($objModulo->getAction()){
			case 'change':
				$db = TBase::conectaDB();
				$db->query("update seccionesapp set idSeccion = ".$_POST['seccion']." where clave = '".$_POST['clave']."'");
				
				$smarty->assign("json", array("band" => true));
			break;
			case 'getSeccion':
				$db = TBase::conectaDB();
		
				$rs = $db->query("select * from seccionesapp a join seccion b using(idSeccion) where clave = '".$_POST['codigo']."';");
				
				$smarty->assign("json", $rs->fetch_assoc());
			break;
		}
	break;
};
?>