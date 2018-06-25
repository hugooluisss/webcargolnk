<?php
global $objModulo;
switch($objModulo->getId()){
	case 'noticias': case 'eventos': case 'archivos':
		$db = TBase::conectaDB();
		
		$rs = $db->query("select * from departamento where visible = true");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("departamentos", $datos);
	break;
	case 'listanoticias':
		$db = TBase::conectaDB();
		
		$sql = "select *, c.nombre as departamento, a.cuerpo as cuerpo from noticia a join item b using(idItem) join departamento c using(idDepartamento) where b.visible = true";
		
		if ($_POST['departamento'] <> '')
			$sql .= " and b.idDepartamento = ".$_POST['departamento']." order by actualizada desc";
		
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row;
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
		$smarty->assign("json", $datos);
	break;
	case 'listaeventos':
		$db = TBase::conectaDB();
		
		$sql = "select * from evento join item using(idItem) join departamento b using(idDepartamento) where item.visible = true and fecha >= now()";
		
		if ($_POST['departamento'] <> '')
			$sql .= " and b.idDepartamento = ".$_POST['departamento']." order by fecha desc";
			
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$fecha = explode("-", $row['fecha']);
			$row['dia'] = $fecha[2];
			$row['mes'] = $fecha[1];
			$row['anio'] = $fecha[0];
			
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
		$smarty->assign("json", $datos);
	break;
	case 'listaarchivos':
		$db = TBase::conectaDB();
		
		$sql = "select *, departamento.nombre as departamento, archivo.nombre as file from archivo join item using(idItem) join departamento using(idDepartamento) where item.visible = true";
		
		if ($_POST['departamento'] <> '')
			$sql .= " and item.idDepartamento = ".$_POST['departamento']." order by registro desc";
		
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['existe'] = file_exists("repositorio/archivos/".$row['idItem']."/".$row['file'])?"repositorio/archivos/".$row['idItem']."/".$row['file']:"";
			$row['archivo'] = "repositorio/archivos/".$row['idItem']."/".$row['file'];
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
		$smarty->assign("json", $datos);
	break;
	case 'citems':
		switch($objModulo->getAction()){
			case 'add':
				switch($_POST['tipo']){
					case 1: #noticias
						$obj = new TNoticia();
						$obj->setId($_POST['id']);
						$obj->setTitulo($_POST['titulo']);
						$obj->setResumen($_POST['resumen']);
						$obj->tipo->setId($_POST['tipo']);
						$obj->departamento->setId($_POST['departamento']);
						$obj->setCuerpo($_POST['cuerpo']);
						$obj->setPublicado($_POST['publicado']);
						$mensaje = $_POST['id'] == ''?$obj->getTitulo():("Consulta la actualización de ".$obj->getTitulo());
					break;
					case 2:
						$obj = new TEvento();
						$obj->setId($_POST['id']);
						$obj->setTitulo($_POST['titulo']);
						$obj->setFecha($_POST['fecha']);
						$obj->tipo->setId($_POST['tipo']);
						$obj->departamento->setId($_POST['departamento']);
						$obj->setLugar($_POST['lugar']);
						$obj->setPublicado($_POST['publicado']);
						$mensaje = $_POST['id'] == ''?"Hay un nuevo evento que te puede interesar":("Consulta la actualización del evento ".$obj->getTitulo());
					break;
					case 3:
						$obj = new TArchivo();
						$obj->setId($_POST['id']);
						$obj->setTitulo($_POST['titulo']);
						$obj->tipo->setId($_POST['tipo']);
						$obj->departamento->setId($_POST['departamento']);
						$obj->setSubtitulo($_POST['subtitulo']);
						$obj->setRegistro($_POST['registro']);
						$obj->setPublicado($_POST['publicado']);
						
						$mensaje = "Se actualizaron los archivos del departamento ".$obj->departamento->getNombre();
					break;
				}
				
				$band = $obj->guardar();
				
				if ($band){
					$notificacion = new TNotificacion();
					$notificacion->setMensaje($mensaje);
					$notificacion->addAllUsers();
					$notificacion->guardar();
					#$notificacion->send();
				}
				
				$smarty->assign("json", array("band" => $band, "id" => $obj->getId()));
			break;
			case 'del':
				$obj = new TItem($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
			case 'getDatos':
				$obj = new TItem($_POST['id']);
				$db = TBase::conectaDB();
				
				switch($obj->tipo->getId()){
					case 1: #noticia
						$sql = "select *, cuerpo as html from item join noticia using(idItem) where idItem = ".$obj->getId();
						$rs = $db->query($sql) or errorMySQL($db, $sql);
						$datos = $rs->fetch_assoc();
					break;
					case 2: #evento
						$sql = "select * from item join evento using(idItem) where idItem = ".$obj->getId();
						$rs = $db->query($sql) or errorMySQL($db, $sql);
						$datos = $rs->fetch_assoc();
					break;
					case 3: #archivo
						$sql = "select * from item join archivo using(idItem) where idItem = ".$obj->getId();
						$rs = $db->query($sql) or errorMySQL($db, $sql);
						$datos = $rs->fetch_assoc();
						
						if ($rs->num_rows > 0)
							$datos['existe'] = file_exists("repositorio/archivos/".$datos['idItem']."/".$datos['nombre'])?"repositorio/archivos/".$datos['idItem']."/".$datos['nombre']:"";
					break;
					default:
						$datos = array();
				}
			
				$smarty->assign("json", $datos);
			break;
			case 'uploadArchivo':
				if(isset($_FILES['upl']) and $_FILES['upl']['error'] == 0 and $_GET['item'] <> ''){
					$carpeta = "repositorio/archivos/".$_GET['item']."/";
					mkdir($carpeta, 0777, true);
					chmod($carpeta, 0755);
					
					$obj = new TArchivo($_GET['item']);
					$anterior = $carpeta.$obj->getNombre();
					unlink($anterior);
					
					if(move_uploaded_file($_FILES['upl']['tmp_name'], $carpeta.$_FILES['upl']['name'])){
						chmod($carpeta.$_FILES['upl']['name'], 0755);
						
						$obj->setNombre($_FILES['upl']['name']);
						$obj->guardar();
						
						echo '{"status":"success"}';
						exit;
					}
				}
				
				echo '{"status":"error"}';
			break;
			case 'search':
				$db = TBase::conectaDB();
				$sql = "select *, c.nombre as departamento from item a join noticia b using(idItem) join departamento c using(idDepartamento) where idTipoItem = 1 and titulo like '%".$_POST['texto']."%' and publicado = 1 and a.visible = 1 order by actualizada desc";
				$rs = $db->query($sql) or errorMySQL($db, $sql);
				$datos = array();
				while($row = $rs->fetch_assoc()){
					$row['json'] = json_encode($row);
					
					array_push($datos, $row);
				}
				
				$smarty->assign("json", $datos);
			break;
			case 'eventosDia':
				$db = TBase::conectaDB();
				
				$sql = "select * from evento join item using(idItem) join departamento b using(idDepartamento) where item.visible = true and fecha >= now() and fecha = '".$_POST['fecha']."'";
				
				if ($_POST['departamento'] <> '')
					$sql .= " and b.idDepartamento = ".$_POST['departamento']." order by fecha desc";
					
				$rs = $db->query($sql) or errorMySQL($db, $sql);
				
				$datos = array();
				while($row = $rs->fetch_assoc()){
					$fecha = explode("-", $row['fecha']);
					$row['dia'] = $fecha[2];
					$row['mes'] = $fecha[1];
					$row['anio'] = $fecha[0];
					$row['json'] = json_encode($row);
					
					array_push($datos, $row);
				}
				
				$smarty->assign("lista", $datos);
				$smarty->assign("json", $datos);
			break;
		}
	break;
};
?>