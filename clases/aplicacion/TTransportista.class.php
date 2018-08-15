<?php
/**
* TTransportista
* Transportistas que pueden realizar el trabajo
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TTransportista{
	private $idTransportista;
	private $situacion;
	public $tipoCamion;
	private $razonsocial;
	private $rut;
	private $representante;
	private $patente;
	private $correo;
	private $pass;
	private $calificacion;
	private $aprobado;
	private $telefono;
	
	private $visible;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function __construct($id = ''){
		$this->tipoCamion = new TTipoCamion;
		$this->situacion = 0;
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
		$rs = $db->query("select * from transportista where idTransportista = ".$id);
		
		foreach($rs->fetch_assoc() as $field => $val){
			switch($field){
				case 'idTipoCamion':
					$this->tipoCamion = new TTipoCamion($val);
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
		return $this->idTransportista;
	}
	
	/**
	* Establece la razón social
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setRazonSocial($val = ''){
		$this->razonsocial = $val;
		return true;
	}
	
	/**
	* Retorna la razón social
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getRazonSocial(){
		return $this->razonsocial;
	}
	
	/**
	* Establece rut
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setRUT($val = ''){
		$this->rut = $val;
		return true;
	}
	
	/**
	* Retorna el RUT
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getRUT(){
		return $this->rut;
	}
	
	/**
	* Establece el nombre del representante
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setRepresentante($val = ""){
		$this->representante = $val;
		return true;
	}
	
	/**
	* Retorna el nombre del representante
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getRepresentante(){
		return $this->representante;
	}
	
	/**
	* Establece la patente
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPatente($val = ""){
		$this->patente = $val;
		return true;
	}
	
	/**
	* Retorna la patente
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPatente(){
		return $this->patente;
	}
	
	/**
	* Establece el correo
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCorreo($val = ""){
		$this->correo = $val;
		return true;
	}
	
	/**
	* Retorna el correo
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getCorreo(){
		return $this->correo;
	}
	
	/**
	* Establece el celular
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setTelefono($val = ""){
		$this->telefono = $val;
		return true;
	}
	
	/**
	* Retorna el celular
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getTelefono(){
		return $this->telefono;
	}
	
	/**
	* Establece la contraseña
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPass($val = ""){
		$this->pass = $val;
		return true;
	}
	
	/**
	* Retorna la contraseña
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPass(){
		return $this->pass;
	}
	
	/**
	* Establece la calificación
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCalificacion($val = 0){
		$this->calificacion = $val;
		return true;
	}
	
	/**
	* Retorna la calificacion
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getCalificacion(){
		return $this->calificacion == ''?0:$this->calificacion;
	}
	
	/**
	* Establece como aprobado
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setAprobado($val = 0){
		$this->aprobado = $val;
		return true;
	}
	
	/**
	* Retorna si está aprobado
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getAprobado(){
		return $this->aprobado == 1?1:0;
	}
	
	/**
	* Establece su situacion
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setSituacion($val = 0){
		$this->situacion = $val;
		return true;
	}
	
	/**
	* Retorna si está aprobado
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getSituacion(){
		return $this->situacion;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->tipoCamion->getId() == '') return false;
		
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$sql = "INSERT INTO transportista(idTipoCamion, situacion, visible) VALUES(".$this->tipoCamion->getId().", '".$this->getSituacion()."', 1);";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			
			if (!$rs) return false;
				
			$this->idTransportista = $db->insert_id;
		}

		if ($this->getId() == '')
			return false;
			
		$sql = "UPDATE transportista
			SET
				idTipoCamion = ".$this->tipoCamion->getId().",
				razonsocial = '".$this->getRazonSocial()."',
				rut = '".$this->getRUT()."',
				representante = '".$this->getRepresentante()."',
				patente = '".$this->getPatente()."',
				correo = '".$this->getCorreo()."',
				telefono = '".$this->getTelefono()."',
				pass = '".$this->getPass()."',
				calificacion = ".$this->getCalificacion().",
				aprobado = ".$this->getAprobado().",
				situacion = ".$this->getSituacion().",
				telefono = '".$this->getTelefono()."'
			WHERE idTransportista = ".$this->getId();
			
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		if ($rs)
			$this->setId($this->getId());
			
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
		$sql = "update transportista set visible = false, aprobado = false where idTransportista = ".$this->getId();
		
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		return $rs?true:false;
	}
	
	/**
	* Retorna si el transportista está habilitado
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function isVisible(){
		return $this->visible == 1;
	}
}
?>