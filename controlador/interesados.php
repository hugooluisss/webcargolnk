<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaInteresados': case 'listaPostulantes':
		$db = TBase::conectaDB();
		$orden = new TOrden($_POST['orden']);
		$smarty->assign("orden", $orden);
		
		
		$rs = $db->query("select b.*, a.registro, a.idOrden, a.monto from interesado a join transportista b using(idTransportista) where idOrden = ".$_POST['orden']." order by registro");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['asignado'] = false;
			$row['monto2'] = number_format($row['monto'], 0, "", ".");
			if ($orden->estado->getId() == 4){
				$rs2 = $db->query("select idOrden from asignado where idOrden = ".$_POST['orden']." and idTransportista = ".$row['idTransportista']);
				if ($rs2->num_rows > 0) $row['asignado'] = true;
			}
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
	break;
};
?>