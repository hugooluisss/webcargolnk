<?php
/**
* TSuscripcion
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TSuscripcion{
	private $idSuscripcion;
	private $fechalimite;
	private $metodopago;
	private $referencia;
	private $idCliente;
	public $membresia;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TSuscripcion($id = ''){
		$this->membresia = new TMembresia;
		$fecha = date('Y-m-d');
		$nuevafecha = strtotime('+1 month', strtotime($fecha)) ;
		
		$this->fechalimite = date("Y-m-d" , $nuevafecha);
		
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
		$sql = "select * from suscripcion where idSuscripcion = ".$id;
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		foreach($rs->fetch_assoc() as $field => $val){
			switch($field){
				case 'idMembresia':
					$this->membresia = new TMembresia($val);
				break;
				default: 
					$this->$field = $val;
			}
		}
		
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
		return $this->idSuscripcion;
	}
	
	/**
	* Establece al cliente
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCliente($val = ''){
		$this->idCliente = $val;
		return true;
	}
	
	/**
	* Retorna el id del cliente
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getCliente(){
		return $this->idCliente;
	}
	
	/**
	* Establece el titulo
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setFechaLimite($val = ''){
		$this->fechalimite = $val;
		return true;
	}
	
	/**
	* Retorna el titulo
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getFechaLimite(){
		return $this->fechalimite;
	}
	
	/**
	* Establece el método de pago
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setMetodoPago($val = ''){
		$this->metodopago = $val;
		return true;
	}
	
	/**
	* Retorna el método de pago
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getMetodoPago(){
		return $this->metodopago;
	}
	
	/**
	* Establece la referencia
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setReferencia($val = 0){
		$this->referencia = $val;
		return true;
	}
	
	/**
	* Retorna el titulo
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getReferencia(){
		return $this->referencia;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->getCliente() == '') return false;
		if ($this->membresia->getId() == '') return false;
		if ($this->getFechaLimite() == '') return false;
		
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$sql = "INSERT INTO suscripcion(idUsuario, idMembresia, fechalimite) VALUES(".$this->getCliente().", ".$this->membresia->getId().", '".$this->getFechaLimite()."');";
			$rs = $db->query($sql) or errorMySQL($db, $sql);;
			if (!$rs) return false;
			
			$this->idSuscripcion = $db->insert_id;
		}
		
		if ($this->getId() == '')
			return false;
		
		$sql = "UPDATE suscripcion
			SET
				referencia = '".$this->getReferencia()."',
				metodopago = '".$this->getMetodoPago()."'
			WHERE idSuscripcion = ".$this->getId();
			
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
		$sql = "delete from suscripcion where idSuscripcion = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		return $rs?true:false;
	}
}
?>