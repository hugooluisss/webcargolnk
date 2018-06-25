<?php
global $objModulo;
$carpeta = "repositorio/departamentos/";

switch($objModulo->getId()){
	case 'listadepartamentos':
		$db = TBase::conectaDB();
		
		$rs = $db->query("select * from departamento where visible = true");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$archivo = $carpeta."iconos/".$row['idDepartamento'].".png";
			$row['icono'] = file_exists($archivo)?$archivo:"";
			
			$archivo = $carpeta."portadas/".$row['idDepartamento'].".png";
			$row['portada'] = file_exists($archivo)?$archivo:"";
			
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
		$smarty->assign("json", $datos);
	break;
	case 'cdepartamentos':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TDepartamento();
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setClave($_POST['clave']);
				$obj->setColor1($_POST['color1']);
				$obj->setColor2($_POST['color2']);
				$obj->setCuerpo($_POST['cuerpo']);
				$obj->setFormulario($_POST['formulario']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TDepartamento($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
			case 'uploadIcono':
				if(isset($_FILES['upl']) and $_FILES['upl']['error'] == 0 and $_GET['id'] <> ''){
					$carpeta .= "iconos/";
					mkdir($carpeta, 0777, true);
					chmod($carpeta, 0755);
					@unlink($carpeta.$_GET['id'].".png");
					if(move_uploaded_file($_FILES['upl']['tmp_name'], ($carpeta.$_GET['id'].".png"))){
						chmod(($carpeta.$_GET['id'].".png"), 0755);
						
						echo '{"status":"success"}';
						exit;
					}
				}
				
				echo '{"status":"error"}';
			break;
			case 'uploadPortada':
				if(isset($_FILES['upl']) and $_FILES['upl']['error'] == 0 and $_GET['id'] <> ''){
					$carpeta .= "portadas/";
					mkdir($carpeta, 0777, true);
					chmod($carpeta, 0755);
					
					if(move_uploaded_file($_FILES['upl']['tmp_name'], ($carpeta.$_GET['id'].".png"))){
						chmod(($carpeta.$_GET['id'].".png"), 0755);
						
						echo '{"status":"success"}';
						exit;
					}
				}
				
				echo '{"status":"error"}';
			break;
			case 'getData':
				$db = TBase::conectaDB();
		
				$rs = $db->query("select * from departamento where idDepartamento = ".$_POST['id']);
				$smarty->assign("json", $rs->fetch_assoc());
			break;
		}
	break;
};
?>