<?php
/**
* TMembresia
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TMembresia{
	private $idMembresia;
	private $titulo;
	private $descripcion;
	private $precio;
	private $noprecio;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TMembresia($id = ''){
		$this->noprecio = 1;
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
		$sql = "select * from membresia where idMembresia = ".$id;
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
		return $this->idMembresia;
	}
	
	/**
	* Establece el titulo
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setTitulo($val = ''){
		$this->titulo = $val;
		return true;
	}
	
	/**
	* Retorna el titulo
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getTitulo(){
		return $this->titulo;
	}
	
	/**
	* Establece la descripcion
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setDescripcion($val = ''){
		$this->descripcion = $val;
		return true;
	}
	
	/**
	* Retorna la descripcion
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getDescripcion(){
		return $this->descripcion;
	}
	
	/**
	* Establece el precio
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPrecio($val = 0){
		$this->precio = $val;
		return true;
	}
	
	/**
	* Retorna el titulo
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPrecio(){
		return $this->precio;
	}
	
	/**
	* Establece el número de precio
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setNoPrecio($val = 1){
		$this->noprecio = $val;
		return true;
	}
	
	/**
	* Retorna el número de precio
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getNoPrecio(){
		return $this->noprecio;
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
			$sql = "INSERT INTO membresia(titulo) VALUES('".$this->getTitulo()."');";
			$rs = $db->query($sql) or errorMySQL($db, $sql);;
			if (!$rs) return false;
			
			$this->idMembresia = $db->insert_id;
		}
		
		if ($this->getId() == '')
			return false;
		
		$sql = "UPDATE membresia
			SET
				titulo = '".$this->getTitulo()."',
				descripcion = '".$this->getDescripcion()."',
				precio = ".$this->getPrecio().",
				noprecio = ".$this->getNoPrecio()."
			WHERE idMembresia = ".$this->getId();
			
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
		$sql = "update membresia set visible = false where idMembresia = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		return $rs?true:false;
	}
}
?>