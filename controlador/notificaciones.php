<?php
global $objModulo;
switch($objModulo->getId()){
	case 'cnotificaciones':
		switch($objModulo->getAction()){
			case 'getTotalNotificaciones':
				$db = TBase::conectaDB();
				$sql = "select count(*) as total, sum(if (leido = 1, 1, 0)) as leidos, sum(if(leido = 0, 1, 0)) as sinLeer from usuarionotificacion where idUsuario = ".$_POST['usuario'].";";
				$rs = $db->query($sql) or errorMySQL($db, $sql);
				
				$row = $rs->fetch_assoc();
				
				$smarty->assign("json", $row);
			break;
			case 'getNotificaciones':
				$db = TBase::conectaDB();
				$sql = "select mensaje, fecha, leido from usuarionotificacion join notificacion using(idNotificacion) where idUsuario = ".$_POST['usuario']." order by fecha desc;";
				
				$notificaciones = array();
				$rs = $db->query($sql) or errorMySQL($db, $sql);
				
				while($row = $rs->fetch_assoc()){
					$row['hace'] = time_passed(date($row['fecha']));
					$datetime1 = date_create('2009-10-11');
					$datetime2 = date_create('2009-10-13');
					$interval = date_diff($datetime1, $datetime2);
					$row['hoy'] = $interval->format('%R%a') < 1;
					$row['json'] = json_encode($row);
					array_push($notificaciones, $row);
				}
				
				$sql = "update usuarionotificacion set leido = 1 where idUsuario = ".$_POST['usuario'];
				$db->query($sql) or errorMySQL($db, $sql);
				
				$smarty->assign("json", $notificaciones);
			break;
		}
	break;
};
?>