<?php
/**
* TUsuario
* Usuarios del sistema
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TUsuario{
	private $idUsuario;
	private $idPerfil;
	private $nombre;
	private $email;
	private $pass;
	private $direccion;
	private $visible;
	private $activo;
	public $suscripcion;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TUsuario($id = ''){
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
		$rs = $db->query("select * from usuario where idUsuario = ".$id);
		
		foreach($rs->fetch_assoc() as $field => $val){
			$this->$field = $val;
		}
		
		$this->suscripcion = new TSuscripcion();
		if ($this->idPerfil == 2){
			#suscripcion
			$sql = "select idSuscripcion from suscripcion where idUsuario = ".$this->getId()." and fechalimite > '".date("Y-m-d H:i:s")."'";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			$row = $rs->fetch_assoc();
			
			$this->suscripcion->setId($row['idSuscripcion']);
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
		return $this->idUsuario;
	}
	
	/**
	* Establece el valor de tipo de usuario
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPerfil($val = 2){
		$this->idPerfil = $val;
		return true;
	}
	
	/**
	* Retorna las el identificador del tipo de usuario
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getidPerfil(){
		return $this->idPerfil;
	}
	
	/**
	* Retorna el tipo
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getTipo(){
		if ($this->getidPerfil() == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->query("select nombre from perfil where idPerfil = ".$this->getidPerfil());
		$row = $rs->fetch_assoc();
		return $row['nombre'];
	}
	
	/**
	* Retorna el tipo como si fuera un perfil
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPerfil(){
		return $this->getidPerfil();
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
	* Establece el email
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setEmail($val = ''){
		$this->email = $val;
		return true;
	}
	
	/**
	* Retorna el email
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getEmail(){
		return $this->email;
	}
	
	/**
	* Establece el valor del password
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPass($val = ''){
		$this->pass = $val;
		return true;
	}
	
	/**
	* Retorna el password
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPass(){
		return $this->pass;
	}
	
	/**
	* Establece la direccion
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setDireccion($val = ''){
		$this->direccion = $val;
		return true;
	}
	
	/**
	* Retorna la direccion
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getDireccion(){
		return $this->direccion;
	}
	
	/**
	* Establece el teléfono
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setTelefono($val = ''){
		$this->telefono = $val;
		return true;
	}
	
	/**
	* Retorna el telefono
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getTelefono(){
		return $this->telefono;
	}
	
	/**
	* Establece al usuario como activo
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setActivo(){
		$this->activo = true;
		return true;
	}
	
	/**
	* Retorna 1 o true si el usuario está activo
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getActivo(){
		return $this->activo;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->getidPerfil() == '') return false;
		
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->query("INSERT INTO usuario(idPerfil, visible) VALUES(".$this->getIdPerfil().", true);");
			if (!$rs) return false;
				
			$this->idUsuario = $db->insert_id;
		}		
		
		if ($this->getId() == '')
			return false;
		
		$sql = "UPDATE usuario
			SET
				idPerfil = ".$this->getIdPerfil().",
				nombre = '".$this->getNombre()."',
				email = '".$this->getEmail()."',
				pass = '".$this->getPass()."',
				telefono = '".$this->getTelefono()."',
				direccion = '".$this->getDireccion()."',
				activo = ".($this->getActivo()?1:0)."
			WHERE idUsuario = ".$this->getId();
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
		$rs = $db->query("update usuario set visible = false where idUsuario = ".$this->getId());
		
		return $rs?true:false;
	}
}
?>