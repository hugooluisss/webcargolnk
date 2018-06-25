<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listasecciones':
		$db = TBase::conectaDB();
		
		$rs = $db->query("select * from seccion where visible = true");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'csecciones':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TSeccion();
				$obj->setId($_POST['id']);
				$obj->setTitulo($_POST['titulo']);
				$obj->setCuerpo($_POST['cuerpo']);
				$obj->setReferencia($_POST['referencia']);
				$obj->setPublicada($_POST['publicado']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TSeccion($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
};
?>