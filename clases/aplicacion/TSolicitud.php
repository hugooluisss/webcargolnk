<?php
/**
* TSolicitud
* Solicitudes desde la app
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/
class TSolicitud{
	private $idFormulario;
	public $departamento;
	public $usuario;
	private $fecha;
	private $estado;
	private $json;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access publicTTipoItem.class.php
	* @param int $id identificador del objeto
	*/
	public function TSolicitud($id = ''){
		$this->departamento = new TDepartamento();
		$this->usuario = new TUsuario();
		
		$this->setId($id);		
		return true;
	}
	
	/**
	* Carga los datos del objeto
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setId($id = ''){
		if ($id == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->query("select * from solicitud where idSolicitud = ".$id);
		
		foreach($rs->fetch_assoc() as $field => $val){
			switch($field){
				case 'idDepartamento':
					$this->departamento = new TDepartamento($val);
				break;
				case 'idUsuario':
					$this->usuario = new TUsuario($val);
				break;
				default:
					$this->$field = $val;
				break;
			}
		}
				
		return true;
	}
	
	public function getId(){
		return $this->idSolicitud;
	}
		
	/**
	* Establece la fecha de registro
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setFecha($val = ''){
		$val = $val == ''?date("Y-m-d H:i:s"):$val;
		$this->fecha = $val;
		return true;
	}
	
	/**
	* Retorna la fecha de registro
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getFecha(){
		return $this->fecha == ''?date("Y-m-d H:i:s"):$this->fecha;
	}
	
	/**
	* Establece el estado
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setEstado($val = ''){
		$this->estado = $val;
		return true;
	}
	
	/**
	* Retorna el estado
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getEstado(){
		return $this->estado == ''?0:$this->estado;
	}
	
	/**
	* Establece el objeto jSON
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setJSON($val = ''){
		$this->json = $val;
		return true;
	}
	
	/**
	* Retorna el json
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getJSON(){
		return $this->json;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->departamento->getId() == '') return false;
		if ($this->usuario->getId() == '') return false;
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$sql = "INSERT INTO solicitud(idDepartamento, idUsuario, fecha) VALUES(".$this->departamento->getId().", ".$this->usuario->getId().", now());";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			if (!$rs) return false;
				
			$this->idSolicitud = $db->insert_id;
		}		
		
		if ($this->getId() == '')
			return false;
		
		$sql = "UPDATE solicitud
			SET
				json = '".$this->getJSON()."',
				fecha = '".$this->getFecha()."',
				estado = ".$this->getEstado()."
			WHERE idSolicitud = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
			
		return $rs?true:false;
	}
}