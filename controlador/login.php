<?php
global $objModulo;
switch($objModulo->getId()){
	case 'route':
		global $userSesion;
		switch($userSesion->getIdPerfil()){
			case '3': #extranjero
				header ("Location: panelPrincipal");
			break;
			case '2': #cliente
				header ("Location: cotizador");
			break;
			case '1':
				header ("Location: panelPrincipal");
			break;
		}
	break;
	case 'logout':
		$_SESSION[SISTEMA] = array();
		session_destroy();
		
		header ("Location: index.php");
	break;
	case 'clogin':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				$obj = new TUsuario();
				
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setEmail($_POST['email']);
				$obj->setPass($_POST['pass']);
				$obj->setPerfil(2);
				$obj->setTelefono($_POST['telefono']);
				$obj->setDireccion($_POST['direccion']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'validaEmail':
				$db = TBase::conectaDB();
				$sql = "select idUsuario from usuario where upper(email) = upper('".$_POST['txtUsuario']."')";
				$rs = $db->query($sql) or errorMySQL($db, $sql);
				$row = $rs->fetch_assoc();
				
				echo $row['idUsuario'] == ''?"true":"false";
			break;
			case 'login':
				$db = TBase::conectaDB();
				$rs = $db->query("select idUsuario, pass from usuario where upper(email) = upper('".$_POST['usuario']."') and visible = true");
				$result = array('band' => false, 'mensaje' => 'Error al consultar los datos');
				
				$row = $rs->fetch_assoc();
				
				if($rs->num_rows == 0)
					$result = array('band' => false, 'mensaje' => 'El usuario no existe');
				elseif(strtoupper($row['pass']) <> strtoupper($_POST['pass']))
					$result = array('band' => false, 'mensaje' => 'Contraseña inválida');
				else{
					$obj = new TUsuario($row['idUsuario']);
					if ($obj->getId() == '')
						$result = array('band' => false, 'mensaje' => 'Acceso denegado', 'tipo' => $obj->getIdTipo());
					else
						$result = array('band' => true);
				}
				
				if($result['band']){
					$obj = new TUsuario($row['idUsuario']);
					$sesion['usuario'] = $obj->getId();
					$sesion['perfil'] = $obj->getIdPerfil();
					
					$_SESSION[SISTEMA] = $sesion;
				}
				
				$result['datos'] = $sesion;
				echo json_encode($result);
			break;
			case 'logout':
				$_SESSION[SISTEMA] = array();
				session_destroy();
				echo 'asdf';
				
				header ("Location: index.php");
			break;
		}
	break;
}
?>