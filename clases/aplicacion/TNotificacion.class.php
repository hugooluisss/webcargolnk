<?php
/**
* Notificacion
* Envía una notificación a los usuarios
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TNotificacion{
	private $usuarios;
	private $mensaje;
	private $fecha;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access publicTTipoItem.class.php
	* @param int $id identificador del objeto
	*/
	public function TNotificacion($id = ''){
		$this->usuarios = array();
		$this->fecha = date("Y-m-d H:i:s");
		$this->setId($id);		
		return true;
	}
	
	/**
	* Establece el mensaje
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	public function setMensaje($msg = ''){
		$this->mensaje = $msg;
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
		$rs = $db->query("select * from notificacion where idNotificacion = ".$id);
		
		foreach($rs->fetch_assoc() as $field => $val){
			$this->$field = $val;
		}
		
		$rs = $db->query("select idUsuario from usuarionotificacion where idNotificacion = ".$id);
		$this->usuarios = array();
		while($row = $rs->fetch_assoc()){
			array_push($this->usuarios, new TUsuario($row['idUsuario']));
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
		return $this->idNotificacion;
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
	* Retorna el número de empleado
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getMensaje(){
		return $this->mensaje;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	public function guardar(){
		if ($this->getMensaje() == '') return false;
		if (count($this->usuarios) == 0) return false;
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$sql = "insert into notificacion(mensaje, fecha) values ('".$this->getMensaje()."', '".$this->getFecha()."')";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			
			$this->idNotificacion = $db->insert_id;
		}
		
		if ($this->getId() == '')
			return false;
		
		$sql = "UPDATE notificacion
			SET
				mensaje = '".$this->getMensaje()."'
			WHERE idNotificacion = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		
		$sql = "delete from usuarionotificacion where idNotificacion = ".$this->getId();
		$db->query($sql) or errorMySQL($db, $sql);
		
		foreach($this->usuarios as $usuario){
			$sql = "insert into usuarionotificacion(idNotificacion, idUsuario) values (".$this->getId().", ".$usuario->getId().")";
			$db->query($sql) or errorMySQL($db, $sql);
		}
		
		return $rs?true:false;
	}
	
	/**
	* Envia la notificación a todos los usuarios
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function send(){
		if ($this->getId() == '') return false;
		if (count($this->usuarios) < 1) return false;
		global $ini;
		
		foreach($this->usuarios as $usuario){
			$pb = new PushBots();
			
			$pb->App($ini['pushbots']['applicationId'], $ini['pushbots']['applicationSecret']);
			$pb->Alert($this->getMensaje());
			$pb->Platform(array("0","1"));
			$pb->Alias("user_".$usuario->getId());
			
			$pb->Push();
		}
		
		return true;
	}
	
	/**
	* Envia la notificación a todos los usuarios
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function addAllUsers(){
		if ($this->getId() <> '')
			$sql = "select idUsuario from usuario where not idUsuario in (select idUsuario from usuarionotificacion where idNotificacion = ".$this->getId().")";
		else
			$sql = "select idUsuario from usuario";
		
		$db = TBase::conectaDB();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		while($row = $rs->fetch_assoc()){
			array_push($this->usuarios, new TUsuario($row['idUsuario']));
		}
		
		return true;
	}
}