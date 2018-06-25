<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaSuscripciones':
		$db = TBase::conectaDB();
		$sql = "select a.*, b.titulo from suscripcion a join membresia b using(idMembresia) where idUsuario = ".$_POST['usuario'];
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'csuscripciones':
		switch($objModulo->getAction()){
			case 'add':
				$membresia = new TMembresia($_POST['membresia']);
				$cliente = new TUsuario($_POST['cliente']);
				
				if ($cliente->getidPerfil() == 2){
					$suscripcion = new TSuscripcion();
					$suscripcion->setCliente($_POST['cliente']);
					$suscripcion->membresia = new TMembresia($_POST['membresia']);
					$suscripcion->setMetodoPago($_POST['metodopago']);
					$suscripcion->setReferencia($_POST['referencia']);
					
					$smarty->assign("json", array("band" => $suscripcion->guardar()));
				}else
					$smarty->assign("json", array("band" => false, $cliente->getidPerfil()));
			break;
			case 'confirmar':
				$codigo = base64_decode($_GET['codigo']);
				
				$codigo = explode("|.|", $codigo);
				
				
				$suscripcion = new TSuscripcion();
				$suscripcion->setCliente($codigo[1]);
				$suscripcion->membresia = new TMembresia($codigo[0]);
				$suscripcion->setMetodoPago($codigo[3]);
				$suscripcion->setReferencia($_GET['codigo']);
				
				$suscripcion->guardar();
				header("Location: cotizador");
			break;
			case 'del':
				$suscripcion = new TSuscripcion($_POST['id']);
				
				$smarty->assign("json", array("band" => $suscripcion->eliminar()));
			break;
			case 'uploadfile':
				$ext = explode(".", $_FILES['upl']['name']);
				$ext = $ext[count($ext) - 1];
				
				if (strtolower($ext) == 'jpg' or strtolower($ext) == 'jpeg'){
					global $userSesion;
					
					if(isset($_FILES['upl']) and $_FILES['upl']['error'] == 0){
						$carpeta = "repositorio/pagos/".$userSesion->getId()."/";
						mkdir($carpeta, 0777, true);
						chmod($carpeta, 0755);
						#$_FILES['upl']['name']
						$fecha = date("Y-m-d")."_".$_POST['membresia'].".jpg";
						if(move_uploaded_file($_FILES['upl']['tmp_name'], $carpeta.$fecha)){
							chmod($carpeta.$fecha, 0755);
							
							echo '{"status":"success"}';
							exit;
						}
					}
				}
				
				echo '{"status":"error"}';
			break;
		}
	break;
};
?>