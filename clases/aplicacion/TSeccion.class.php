<?php
/**
* TSeccion
* Son las secciones fijas que se muestran en la app
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TSeccion{
	private $idSeccion;
	private $titulo;
	private $cuerpo;
	private $referencia;
	private $publicada;
	private $modificada;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TSeccion($id = ''){
		$this->publicada = 0;
		$this->modificacion = date("Y-m-d h:i:s");
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
		$rs = $db->query("select * from seccion where idSeccion = ".$id);
		
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
		return $this->idSeccion;
	}
	
	/**
	* Establece el titulo
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
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
	* Establece el cuerpo
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
	* Retorna el cuerpo
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getCuerpo(){
		return $this->cuerpo;
	}
	
	/**
	* Establece el referencia
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setReferencia($val = ''){
		$this->referencia = $val;
		return true;
	}
	
	/**
	* Retorna la referencia
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getReferencia(){
		return $this->referencia;
	}
	
	/**
	* Establece si está publicada
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPublicada($val = 1){
		$this->publicada = $val;
		return true;
	}
	
	/**
	* Retorna si es que está publicada
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPublicada(){
		return $this->publicada == 1;
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
			$sql = "INSERT INTO seccion(publicada) VALUES(true);";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			if (!$rs) return false;
				
			$this->idSeccion = $db->insert_id;
		}		
		
		if ($this->getId() == '')
			return false;
		
		$modificacion = date("Y-m-d h:i:s");
		
		$sql = "UPDATE seccion
			SET
				titulo = '".mysql_escape_string($this->getTitulo())."',
				cuerpo = '".mysql_escape_string($this->getCuerpo())."',
				referencia = '".mysql_escape_string($this->getReferencia())."',
				publicada = ".$this->getPublicada().",
				modificada = '".$modificacion."'
			WHERE idSeccion = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		$this->modificada = $modificacion;
			
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
		$rs = $db->query("update seccion set visible = false where idSeccion = ".$this->getId());
		
		return $rs?true:false;
	}
}