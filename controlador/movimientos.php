<?php
global $objModulo;
switch($objModulo->getId()){
	case 'cmovimientos':
		switch($objModulo->getAction()){
			case 'update':
				$obj = new TMovimiento($_POST['id']);
				$obj->setCantidad($_POST['cantidad']);
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TMovimiento($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
};
?>