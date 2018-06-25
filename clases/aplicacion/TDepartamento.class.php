<?php
/**
* TDepartamento
* Puestos de los empleados
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TDepartamento{
	private $idDepartamento;
	private $clave;
	private $nombre;
	private $color1;
	private $color2;
	private $cuerpo;
	private $formulario;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TDepartamento($id = ''){
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
		$rs = $db->query("select * from departamento where idDepartamento = ".$id);
		
		foreach($rs->fetch_assoc() as $field => $val){
			$this->$field = $val;
		}
				
		return true;
	}
	
	/**
	* Retorna el identificador del objeto
	*
	* @autor Hugo
	* @access public
	* @return integer identificador
	*/
	
	public function getId(){
		return $this->idDepartamento;
	}
	
	/**
	* Establece la clave
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setClave($val = ''){
		$this->clave = $val;
		return true;
	}
	
	/**
	* Retorna la clave
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getClave(){
		return $this->clave;
	}
	
	/**
	* Establece el nombre
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
	* Establece el color
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setColor1($val = ''){
		$this->color1 = $val;
		return true;
	}
	
	/**
	* Retorna el color
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getColor1(){
		return $this->color1;
	}
	
	/**
	* Establece el color
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setColor2($val = ''){
		$this->color2 = $val;
		return true;
	}
	
	/**
	* Retorna el color
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getColor2(){
		return $this->color2;
	}
	
	/**
	* Establece el cuerpo del html
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCuerpo($val = ''){
		$this->cuerpo = $val;
		return true;
	}
	
	/**
	* Retorna el color
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getCuerpo(){
		return $this->cuerpo;
	}
	
	/**
	* Establece el cuerpo del formulario
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setFormulario($val = ''){
		$this->formulario = $val;
		return true;
	}
	
	/**
	* Retorna el formulario
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getFormulario(){
		return $this->formulario;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->getClave() == '') return false;
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$sql = "INSERT INTO departamento(clave, visible) VALUES('".$this->getClave()."', true);";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			if (!$rs) return false;
				
			$this->idDepartamento = $db->insert_id;
		}		
		
		if ($this->getId() == '')
			return false;
		
		$sql = "UPDATE departamento
			SET
				clave = '".$this->getClave()."',
				nombre = '".$this->getNombre()."',
				color1 = '".$this->getColor1()."',
				color2 = '".$this->getColor2()."',
				cuerpo = '".mysql_escape_string($this->getCuerpo())."',
				formulario = '".mysql_escape_string($this->getFormulario())."'
			WHERE idDepartamento = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
			
		return $rs?true:false;
	}
	
	/**
	* Elimina el objeto de la base de datos
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function eliminar(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->query("update departamento set visible = false where idDepartamento = ".$this->getId());
		
		return $rs?true:false;
	}
}