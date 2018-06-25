<?php
/**
* TNoticia
* Item de tipo Noticia
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/
include_once("clases/aplicacion/TItem.class.php");

class TArchivo extends TItem{
	private $registro;
	private $subtitulo;
	private $nombre;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access publicTTipoItem.class.php
	* @param int $id identificador del objeto
	*/
	public function TArchivo($id = ''){
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
		$this->setRegistro();
		$db = TBase::conectaDB();
		$rs = $db->query("select * from archivo where idItem = ".$this->getId());
		
		foreach($rs->fetch_assoc() as $field => $val){
			$this->$field = $val;
		}
				
		return true;
	}
		
	/**
	* Establece la fecha de registro
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setRegistro($val = ''){
		$val = $val == ''?date("Y-m-d"):$val;
		$this->registro = $val;
		return true;
	}
	
	/**
	* Retorna la fecha de registro
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getRegistro(){
		return $this->registro == ''?date("Y-m-d"):$this->registro;
	}
	
	/**
	* Establece el subtitulo
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setSubtitulo($val = ''){
		$this->subtitulo = $val;
		return true;
	}
	
	/**
	* Retorna el subtitulo
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getSubtitulo(){
		return $this->subtitulo;
	}
	
	/**
	* Establece el nombre del archivo
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setNombre($val = ''){
		$this->nombre = $val;
		return true;
	}
	
	/**
	* Retorna el nombre del archivo
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getNombre(){
		return $this->nombre;
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
		
		$sql = "select * from archivo where idItem = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		if ($rs->num_rows == 0){
			$sql = "INSERT INTO archivo(idItem, registro) VALUES(".$this->getId().", now());";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			if (!$rs) return false;
		}
		
		if ($this->getId() == '')
			return false;
		
		$sql = "UPDATE archivo
			SET
				subtitulo = '".mysql_escape_string($this->getSubtitulo())."',
				registro = '".$this->getRegistro()."',
				nombre = '".mysql_escape_string($this->getNombre())."'
			WHERE idItem = ".$this->getId();
			
		$rs = $db->query($sql) or errorMySQL($db, $sql);
			
		return $rs?true:false;
	}
}