<?php
/**
* TEvento
* Item de tipo Evento
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/
include_once("clases/aplicacion/TItem.class.php");
class TEvento extends TItem{
	private $fecha;
	private $lugar;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access publicTTipoItem.class.php
	* @param int $id identificador del objeto
	*/
	public function TEvento($id = ''){
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
		parent::setId($id);
		
		if ($id == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->query("select * from evento where idItem = ".$this->getId());
		
		foreach($rs->fetch_assoc() as $field => $val){
			$this->$field = $val;
		}
				
		return true;
	}
		
	/**
	* Establece el lugar
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setLugar($val = ''){
		$this->lugar = $val;
		return true;
	}
	
	/**
	* Retorna la fecha
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getLugar(){
		return $this->lugar;
	}
	
	/**
	* Establece la fecha
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setFecha($val = ''){
		$this->fecha = $val;
		return true;
	}
	
	/**
	* Retorna la fecha
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getFecha(){
		return $this->fecha;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		$db = TBase::conectaDB();
		parent::guardar();
		if ($this->getId() == '') return false;
		
		$sql = "select * from evento where idItem = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		if ($rs->num_rows == 0){
			$sql = "INSERT INTO evento(idItem) VALUES(".$this->getId().");";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			if (!$rs) return false;
		}
		
		if ($this->getId() == '')
			return false;
		
		$sql = "UPDATE evento
			SET
				fecha = '".mysql_escape_string($this->getFecha())."',
				lugar = '".mysql_escape_string($this->getLugar())."'
			WHERE idItem = ".$this->getId();
			
		$rs = $db->query($sql) or errorMySQL($db, $sql);
			
		return $rs?true:false;
	}
}