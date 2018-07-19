<?php
global $objModulo;
switch($objModulo->getId()){
	case 'transportistas':
		$db = TBase::conectaDB();
		global $sesion;
		$sql = "select * from tipocamion where visible = true";
		
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			array_push($datos, $row);
		}
		
		$smarty->assign("tipoCamion", $datos);
	break;
	case 'listatransportistas':
		$db = TBase::conectaDB();
		global $sesion;
		
		$sql = "select * from transportista a join tipocamion b using(idTipoCamion) where a.visible = true";
		
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		$smarty->assign("lista", $datos);
	break;
	case 'ctransportistas':
		$documentos = "repositorio/transportistas/documentos/";
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				$obj = new TTransportista();
				
				$rs = $db->query("select idTransportista from transportista where correo = '".$_POST['correo']."'");
				
				if ($rs->num_rows > 0){ #si es que encontró la clave
					$row = $rs->fetch_assoc();
					if ($row["idTransportista"] <> $_POST['id']){
						$obj->setId($row['idTransportista']);
						$smarty->assign("json", array("band" => false, "mensaje" => "El correo ya se encuentra registrado con otro transportista: ".$obj->getRazonSocial()));
						exit(1);
					}
				}

				$obj = new TTransportista();
				
				$obj->setId($_POST['id']);
				$obj->setRazonSocial($_POST['razonSocial']);
				$obj->tipoCamion->setId($_POST['tipoCamion']);
				$obj->setRUT($_POST['rut']);
				$obj->setRepresentante($_POST['representante']);
				$obj->setPatente($_POST['patente']);
				$obj->setCorreo($_POST['correo']);
				$obj->setPass($_POST['pass']);
				$obj->setCalificacion($_POST['calificacion']);
				$obj->setAprobado($_POST['aprobado']);
				$obj->setTelefono($_POST['telefono']);
				$band = $obj->guardar();
				
				$smarty->assign("json", array("band" => $band));
			break;
			case 'del':
				$obj = new TTransportista($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
			case 'validarEmail':
				$db = TBase::conectaDB();
				if ($_POST['id'] == '')
					$rs = $db->query("select idTransportista from transportista where upper(correo) = upper('".$_POST['txtCorreo']."')");
				else
					$rs = $db->query("select idTransportista from transportista where upper(correo) = upper('".$_POST['txtCorreo']."') and not idTransportista = ".$_POST['id']);
					
				echo $rs->num_rows == 0?"true":"false";
			break;
			case 'recuperarPass':
				$db = TBase::conectaDB();
				global $ini;
				$sql = "select idTransportista from transporitsta where correo = upper('".$_POST['correo']."') and visible = true";
				$rs = $db->query($sql) or errorMySQL($db, $sql);
				
				if ($rs->num_rows >= 1){
					$row = $rs->fetch_assoc();
					$usuario = new TTransportista($row['idTransportista']);
					
					$datos = array();
					$datos['usuario.nombre'] = $usuario->getRazonSocial();
					$datos['usuario.pass'] = $usuario->getPass();
					$datos['usuario.email'] = $usuario->getEmail();
					$datos['sitio.url'] = $ini["sistema"]["url"];
					
					$email = new TMail();
					$email->setTema("Recuperación de contraseña");
					$email->addDestino($usuario->getEmail(), utf8_decode($usuario->getNombre()));
					
					$email->setBodyHTML(utf8_decode($email->construyeMail(file_get_contents("repositorio/mail/recuperarPassTransportista.html"), $datos)));
					
					echo json_encode(array("band" => $email->send(), "mensaje" => "Se trató de enviar"));
				}else
					echo json_encode(array("band" => false));
			break;
			case 'upload':
				$result = false;
				if ($_GET['id'] <> ''){
					if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){
						$carpeta = $documentos."transportista_".$_GET['id']."/";
						if (!file_exists($carpeta))
							mkdir($carpeta, 0755);
							
						$archivo = $_POST['nombre'] == ''?$_FILES['upl']['name']:($_POST['nombre'].".".end(explode(".", $_FILES['upl']['name'])));
						if(move_uploaded_file($_FILES['upl']['tmp_name'], $carpeta.$archivo)){
							chmod($carpeta.$archivo, 0775);
							$result = true;
						}
					}
				}
				
				$smarty->assign("json", array("band" => $result));
			break;
			case 'getDocumentos':
				$carpeta = $documentos."transportista_".$_POST['id']."/";
				$archivos = array();
				
				if (file_exists($carpeta)){
					$gestor_dir = opendir($carpeta);
					while (false !== ($nombre_fichero = readdir($gestor_dir))){
						if (!in_array($nombre_fichero, array(".", "..", ".DS_store"))){
							$datos = Array();
							$datos["nombre"] = $nombre_fichero;
							$datos["ruta"] = $carpeta.$nombre_fichero;
							array_push($archivos, $datos);
						}
					}
				}
				
				$smarty->assign("json", $archivos);
			break;
			case 'delDocumento':
				if(unlink($_POST['ruta']))
					$smarty->assign("json", array("band" => true));
				else
					$smarty->assign("json", array("band" => false));
			break;
		}
	break;
}
?>