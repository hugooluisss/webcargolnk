<?php
global $objModulo;
switch($objModulo->getId()){
	case 'admonUsuarios':
		$db = TBase::conectaDB();
		global $sesion;
		$usuario = new TUsuario($sesion['usuario']);

		$rs = $db->query("select * from perfil");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$datos[$row['idPerfil']] = $row['nombre'];
		}
		
		$smarty->assign("tipos", $datos);
		
		$rs = $db->query("select * from membresia where visible = true");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			array_push($datos, $row);
		}
		
		$smarty->assign("membresias", $datos);
	break;
	case 'listaUsuarios':
		$db = TBase::conectaDB();
		global $sesion;
		$usuario = new TUsuario($sesion['usuario']);
		$rs = $db->query("select * from usuario a where a.visible = true");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$obj = new TUsuario($row['idUsuario']);
			
			$row['tipo'] = $obj->getTipo();
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		$smarty->assign("lista", $datos);
	break;
	case 'usuarioDatosPersonales':
		global $sesion;
		$usuario = new TUsuario($sesion['usuario']);
		$smarty->assign("nombre", $usuario->getNombre());
		$smarty->assign("app", $usuario->getApp());
		$smarty->assign("apm", $usuario->getApm());
	break;
	case 'membresia':
		$db = TBase::conectaDB();
		$sql = "select * from membresia";
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			array_push($datos, $row);
		}
		$smarty->assign("membresias", $datos);
		global $ini;
		$smarty->assign("ini", $ini);
	break;
	case 'activarCuenta':
		$paises = json_decode('{"Chile":"+56","Colombia":"+57","Ecuador":"+593","Falkland Islands":"+5000","French Guiana":"+594","Guayana":"+592","Paraguay":"+595","Peru":"51","Suriname":"+597","Uruguay":"+598","Venezuela":"+58","Northern Mariana Islands":"+1670","Panama":"+507","Puerto Rico":"+1787","St Kitts and Nevis":"+1869","St Lucia":"+1758","St Pierre and Miquelon":"+508","St Vicent Grenadines":"+1784","Trinidad and Tobago":"+1868","Turks and Caicos Islands":"+1649","United States":"+1","Virgin Islands, British":"+1284","Virgin Islands":"+1340","Argentina":"+54","Boliva":"+591","Brazil":"+55","Dominican Republic":"+1809201","El salvador":"+503","Greenland":"+299","Grenada":"+1473","Guadeloupe":"+590","Guam":"+1671","Guatemala":"+502","Haiti":"+509","Honduras":"+504","Jamaica":"+1876","Martinique":"+596","Mexico":"+52","Montserrat":"+1664","Netherlands Antilles":"+599":"Nicaragua":"+505","Northern Mariana Islands": "+1670","American Samoa":"+1684","Anguilla":"+1264","Antigua and Barbuda":"+1268","Aruba":"+297","Ascension":"+247","Bahamas":"+1","Barbados":"+1246","Belize":"+501","Bermuda":"+1441","Canada":"+1","Cayman Islands":"+1345","Costa Rica":"+506","Cuba":"+53","Dominica":"+1767","Dominican Republic":"+1809"}');
		
		#'"España":"+34","Costa Rica":"+506","Cuba":"+53","República Dominicana":"+1809","El Salvador":"+503","Guatemala":"+502","México":"+52","Nicaragua":"+505","Panamá":"+507","Argentina":"+54","Chile":"+56","Colombia":"+57","Ecuador":"+593","Perú":"+51","Uruguay":"+598","Venezuela":"+58"}', true);

		$smarty->assign("paises", $paises);
	break;
	case 'listaMembresiasUsuarios':
		$db = TBase::conectaDB();
		$sql = "select * from membresia a join usuariomembresia b using(idMembresia) where idUsuario = ".$_POST['usuario'];
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			array_push($datos, $row);
		}
		$smarty->assign("membresias", $datos);
	break;
	case 'cusuarios':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				$obj = new TUsuario();
				
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setEmail($_POST['email']);
				$obj->setPass($_POST['pass']);
				$obj->setPerfil($_POST['perfil']);
				$obj->setTelefono($_POST['telefono']);
				$obj->setDireccion($_POST['direccion']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TUsuario($_POST['usuario']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
			case 'solicitarCodigo':
				global $userSesion;
				
				$codigo = "";
				$code = md5($userSesion->getEmail());
				for($x = 0 ; $x < strlen($code) ; $x++){
					$s = $code[$x];
					if (is_numeric($s) and strlen($codigo) < 6)
						$codigo .= $s;
				}
				
				try{
					require 'librerias/twilio/Services/Twilio.php';
					$sid = 'ACc3f8370c8e2a924c277303763165004f';
					$token = '7ee31b130a925ea6160b001a40c463a1';
					$telefono = '+12056831259';
					
					$client = new Services_Twilio($sid, $token);
					$message = $client->account->messages->sendMessage(
						$telefono, // From a valid Twilio number
						#'+5219515705278', // Text this number
						$_POST['telefono'],
						"GetUsLink: Tu código de activacion es ".$codigo."... Bienvenido"
					);
					
					$userSesion->setTelefono($_POST['telefono']);
					$userSesion->guardar();
					$smarty->assign("json", array("band" => true, $code, $message->last_response));
				}catch(Exception $e){
					ErrorSistema($e->getMessage());
					$smarty->assign("json", array("band" => false, $e->getMessage()));
				}
			break;
			case 'activarCuenta':
				global $userSesion;
				$codigo = "";
				$code = md5($userSesion->getEmail());
				for($x = 0 ; $x < strlen($code) ; $x++){
					$s = $code[$x];
					if (is_numeric($s) and strlen($codigo) < 6)
						$codigo .= $s;
				}
				
				if ($_POST['codigo'] == $codigo){
					$userSesion->setActivo();
					$userSesion->guardar();
				}
				
				$smarty->assign("json", array("band" => $_POST['codigo'] == $codigo));
			break;
		}
	break;
}
?>