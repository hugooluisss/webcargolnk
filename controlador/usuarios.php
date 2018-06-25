<?php
global $objModulo;

switch($objModulo->getId()){
	case 'admonusuarios':
		$db = TBase::conectaDB();

		$rs = $db->query("select * from perfil");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$datos[$row['idPerfil']] = $row['nombre'];
		}
		
		$smarty->assign("tipos", $datos);
		
		$rs = $db->query("select * from unidad where visible = true");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$datos[$row['idUnidad']] = $row['nombre'];
		}
		
		$smarty->assign("unidades", $datos);
		
		$rs = $db->query("select * from puesto where visible = true");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$datos[$row['idPuesto']] = $row['nombre'];
		}
		
		$smarty->assign("puestos", $datos);
	break;
	case 'contactos':
		$db = TBase::conectaDB();
		$sql = "select * from usuario a where visible = true order by nombre";
		if ($_POST['movil'] <> ''){
			$obj = new TUsuario($_POST['usuario']);
			$sql = "select * from usuario a where idUnidad = ".$obj->unidad->getId()." and visible = true order by nombre";
		}
		$rs = $db->query($sql);
		$datos = array();
		$semilla = rand();
		while($row = $rs->fetch_assoc()){
			$obj = new TUsuario($row['idUsuario']);
			$row['tipo'] = $obj->getTipo();
			
			$archivo = "repositorio/usuarios/".$row['idUsuario'].".jpg";
			$row['fotoPerfil'] = file_exists($archivo)?($archivo."?".$semilla):" ";
			
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		$smarty->assign("lista", $datos);
		$smarty->assign("json", $datos);
	break;
	case 'listausuarios':
		$db = TBase::conectaDB();
		$rs = $db->query("select * from usuario a where visible = true");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$obj = new TUsuario($row['idUsuario']);
			
			$row['tipo'] = $obj->getTipo();
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		$smarty->assign("lista", $datos);
	break;
	case 'cusuarios':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				$obj = new TUsuario();
				
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setApellidos($_POST['apellidos']);
				$obj->setEmail($_POST['email']);
				
				if ($_POST['pass'] <> '')
					$obj->setPass($_POST['pass']);
					
				if ($_POST['perfil'] <> '')
					$obj->setPerfil($_POST['perfil']);
					
				if ($_POST['unidad'] <> '')
					$obj->unidad = new TUnidad($_POST['unidad']);
					
				if ($_POST['puesto'] <> '')
					$obj->puesto = new TPuesto($_POST['puesto']);
					
				$obj->setNumEmp($_POST['numemp']);
				$obj->setNacimiento($_POST['nacimiento']);
				$obj->setIMSS($_POST['imss']);
				$obj->setRFC($_POST['rfc']);
				$obj->setFechaIngreso($_POST['fechaingreso']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TUsuario($_POST['usuario']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
			case 'validaUsuario':
				$db = TBase::conectaDB();
				
				$rs = $db->query("select idUsuario from usuario where upper(email) = upper('".$_POST['usuario']."')");
				$row = $rs->fetch_assoc();
				if ($rs->num_rows > 0)
					echo "false";
				else
					echo "true";
			break;
			case 'getData':
				$db = TBase::conectaDB();
				
				$rs = $db->query("select * from usuario where idUsuario = ".$_POST['id']."");
				$row = $rs->fetch_assoc();
				
				$ruta = "repositorio/usuarios/".$_POST['id'].".jpg";
				$row['imagenPerfil'] = file_exists($ruta)?$ruta:"";
				
				$smarty->assign("json", $row);
			break;
			case 'setImagenPerfil':
				$usuario = new TUsuario($_POST['usuario']);
				if ($usuario->getId() == '')
					$smarty->assign("json", array("band" => false));
				else{
					saveImage($_POST['imagen'], "repositorio/usuarios/".$usuario->getId().".jpg");
					$smarty->assign("json", array("band" => true));
				}
			break;
		}
	break;
}
?>