<?php
/**
* TPedido
* Un pedido
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TPedido{
	private $idPedido;
	public $estado;
	public $usuario;
	private $fecha;
	public $movimientos;
	private $comentario;
	private $envio;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TPedido($id = ''){
		$this->movimientos = array();
		$this->estado = new TEstado(1);
		$this->usuario = new TUsuario;
		$this->extra = 0;
		$this->objEnvio = array();
		
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
		$sql = "select * from pedido where idPedido = ".$id;
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		foreach($rs->fetch_assoc() as $field => $val){
			switch($field){
				case 'idEstado': $this->estado = new TEstado($val); break;
				case 'idUsuario': $this->usuario = new TUsuario($val);
				default: $this->$field = $val;
			}
		}
		
		if ($this->estado->getId() == 6){
			$this->objEnvio = array();
			
			$sql = "select * from envio where idPedido = ".$id;
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			$row = $rs->fetch_assoc();
			$this->objEnvio['paqueteria'] = new TPaqueteria($row['idPaqueteria']);
			$this->objEnvio['guia'] = $row['guia'];
			$this->objEnvio['fecha'] = $row['fecha'];
		}
		
		$this->getMovimientos();
		
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
	public function getMovimientos(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$sql = "select idMovimiento from movimiento where idPedido = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$this->movimientos = array();
		while($row = $rs->fetch_assoc()){
			array_push($this->movimientos, new TMovimiento($row['idMovimiento']));
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
		return $this->idPedido;
	}
	
	/**
	* Establece la fecha
	*
	* @autor Hugo
	* @access public
	* @param mix $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	public function setFecha($val = ''){
		$this->fecha = $val;
		
		return true;
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
	* Establece el comentario
	*
	* @autor Hugo
	* @access public
	* @param mix $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	public function setComentario($val = ''){
		$this->comentario = $val;
		
		return true;
	}
	
	/**
	* Retorna el comentario
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	public function getComentario(){
		return $this->comentario;
	}
	
	/**
	* Establece el costo del envío
	*
	* @autor Hugo
	* @access public
	* @param mix $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	public function setEnvio($val = 0){
		$this->envio = $val;
		
		return true;
	}
	
	/**
	* Retorna el extra
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	public function getEnvio(){
		return $this->envio == ''?0:$this->envio;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	public function guardar(){
		if ($this->usuario->getId() == ''){
			global $userSesion;
			$this->usuario->setId($userSesion->getId());
		}
		
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$this->estado->setId(1);
			$sql = "INSERT INTO pedido(idUsuario, idEstado, fecha) VALUES (".$this->usuario->getId().", ".$this->estado->getId().", now())";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			
			$this->idPedido = $db->insert_id;
		}
		
		if ($this->idPedido == '') return false;
		
		$sql = "UPDATE pedido
			SET
				idEstado = ".$this->estado->getId().",
				comentario = '".$this->getComentario()."',
				envio = ".$this->getEnvio()."
			WHERE idPedido = ".$this->getId();
		
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
		$sql = "delete from pedido where idPedido = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		return $rs?true:false;
	}
	
	/**
	* Retorna el total de la factura ya con el envío
	*
	* @autor Hugo
	* @access public
	* @return integer Total
	*/
	public function getTotal(){
		$total = 0;
		foreach($this->movimientos as $mov)
			$total = $mov->getPrecio() * $mov->getCantidad();
			
		return $total + $this->getEnvio();
	}
	
	/**
	* Add guia
	*
	* @autor Hugo
	* @access public
	* @return integer Total
	*/
	public function setGuia($paqueteria, $guia){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$sql = "select * from envio where idPedido = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		if ($rs->num_rows > 0){
			$sql = "delete from envio where idPedido = ".$this->getId();
			$rs = $db->query($sql) or errorMySQL($db, $sql);
		}
		
		$sql = "insert into envio(idPaqueteria, idPedido, guia) values (".$paqueteria.", ".$this->getId().", '".$guia."')";
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		return true;
	}
}
?>