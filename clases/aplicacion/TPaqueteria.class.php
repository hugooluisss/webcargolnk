<?php
/**
* TPaqueteria
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TPaqueteria{
	private $idPaqueteria;
	private $nombre;
	private $url;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TPaqueteria($id = ''){
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
		$sql = "select * from paqueteria where idPaqueteria = ".$id;
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		foreach($rs->fetch_assoc() as $field => $val)
			$this->$field = $val;
		
		return true;
	}
	
	/**
	* Retorna el id
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getId(){
		return $this->idPaqueteria;
	}
	
	/**
	* Establece el nombre
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setNombre($val = ''){
		$this->nombre = $val;
		return true;
	}
	
	/**
	* Retorna el nombre
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getNombre(){
		return $this->nombre;
	}
	
	/**
	* Establece la uri
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setUrl($val = ''){
		$this->url = $val;
		return true;
	}
	
	/**
	* Retorna lña dirección web
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getUrl(){
		return $this->url;
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
		
		if ($this->getId() == ''){
			$sql = "INSERT INTO paqueteria(nombre) VALUES('".$this->getNombre()."');";
			$rs = $db->query($sql) or errorMySQL($db, $sql);;
			if (!$rs) return false;
			
			$this->idPaqueteria = $db->insert_id;
		}
		
		if ($this->getId() == '')
			return false;
		
		$sql = "UPDATE paqueteria
			SET
				nombre = '".$this->getNombre()."',
				url = '".$this->getUrl()."'
			WHERE idPaqueteria = ".$this->getId();
			
		$rs = $db->query($sql) or errorMySQL($db, $sql);
			
		return $rs?true:false;
	}
	
	/**
	* Elimina el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function eliminar(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$sql = "update paqueteria set visible = false where idPaqueteria = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		return $rs?true:false;
	}
}
?>