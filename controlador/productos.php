<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaProductos':
		$db = TBase::conectaDB();
		
		$rs = $db->query("select * from producto order by idProducto");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'cproductos':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TProducto();
				$obj->setId($_POST['id']);
				$obj->setCodigo($_POST['codigo']);
				$obj->setDescripcion($_POST['descripcion']);
				$obj->setDescripcionLarga($_POST['descripcionLarga']);
				$obj->setPrecio1($_POST['precio1']);
				$obj->setPrecio2($_POST['precio2']);
				$obj->setPrecio3($_POST['precio3']);
				$obj->setPrecio4($_POST['precio4']);
				$obj->setPeso($_POST['peso']);
				$obj->setMarca($_POST['marca']);
				$obj->setTipo($_POST['tipo']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TProducto($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
};
?>