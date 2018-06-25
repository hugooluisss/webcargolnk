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
	public $unidad;
	public $puesto;
	private $nombre;
	private $apellidos;
	private $email;
	private $pass;
	private $nacimiento;
	private $numemp;
	private $imss;
	private $rfc;
	private $fechaingreso;
	private $visible;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TUsuario($id = ''){
		$this->unidad = new TUnidad;
		$this->puesto = new TPuesto;
		
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
			switch($field){
				case 'idPuesto':
					$this->puesto = new TPuesto($val);
				break;
				case 'idUnidad':
					$this->unidad = new TUnidad($val);
				break;
				default:
					$this->$field = $val;
			}
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
	* Establece los apellidos
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setApellidos($val = ''){
		$this->apellidos = $val;
		return true;
	}
	
	/**
	* Retorna los apellidos
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getApellidos(){
		return $this->apellidos;
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
	* Establece la fecha de nacimiento
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setNacimiento($val = ''){
		$this->nacimiento = $val == ''?date("Y-m-d"):$val;
		return true;
	}
	
	/**
	* Retorna la fecha de nacimiento
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getNacimiento(){
		return $this->nacimiento == ''?date("Y-m-d"):$this->nacimiento;
	}
	
	/**
	* Establece Número de empleado
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setNumEmp($val = ''){
		$this->numemp = $val;
		return true;
	}
	
	/**
	* Retorna el número de empleado
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getNumEmp(){
		return $this->numemp;
	}
	
	/**
	* Establece Número de IMSS
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setIMSS($val = ''){
		$this->imss = $val;
		return true;
	}
	
	/**
	* Retorna el número de IMSS
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getIMSS(){
		return $this->imss;
	}
	
	/**
	* Establece RFC
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setRFC($val = ''){
		$this->rfc = $val;
		return true;
	}
	
	/**
	* Retorna el RFC
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getRFC(){
		return $this->rfc;
	}
	
	/**
	* Establece la fecha de ingreso
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setFechaIngreso($val = ''){
		$this->fechaingreso = $val;
		return true;
	}
	
	/**
	* Retorna la fecha de ingreso
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getFechaIngreso(){
		return $this->fechaingreso;
	}
		
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->unidad->getId() == '') return false;
		if ($this->puesto->getId() == '') return false;
		
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->query("INSERT INTO usuario(idPerfil, idUnidad, idPuesto, visible) VALUES(".$this->getIdPerfil().", ".$this->unidad->getId().", ".$this->puesto->getId().", true);");
			if (!$rs) return false;
				
			$this->idUsuario = $db->insert_id;
		}		
		
		if ($this->getId() == '')
			return false;
		
		$sql = "UPDATE usuario
			SET
				idPerfil = ".$this->getIdPerfil().",
				idUnidad = ".$this->unidad->getId().",
				idPuesto = ".$this->puesto->getId().",
				nombre = '".$this->getNombre()."',
				apellidos = '".$this->getApellidos()."',
				email = '".$this->getEmail()."',
				pass = '".$this->getPass()."',
				nacimiento = '".$this->getNacimiento()."',
				numemp = '".$this->getNumEmp()."',
				imss = '".$this->getIMSS()."',
				rfc = '".$this->getRFC()."',
				fechaingreso = '".$this->getFechaIngreso()."'
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