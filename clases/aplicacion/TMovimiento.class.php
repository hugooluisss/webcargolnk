<?php
/**
* TMovimiento
* Movimientos de ventas
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/
class TMovimiento{
	private $idMovimiento;
	private $idPedido;
	public $producto;
	private $precio;
	private $cantidad;
	private $descuento;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TMovimiento($id = ''){
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
		$sql = "select * from movimiento where idMovimiento = ".$id;
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		foreach($rs->fetch_assoc() as $field => $val){
			switch($field){
				case 'idProducto':
					$this->producto = new TProducto($val);
				break;
				default:
					$this->$field = $val;
				break;
			}
		}
		
		return true;
	}
	
	/**
	* Retorna el identificador
	*
	* @autor Hugo
	* @access public
	* @return int Identificador
	*/
	public function getId(){
		return $this->idMovimiento;
	}
	
	/**
	* Establece el pedido
	*
	* @autor Hugo
	* @access public
	* @param mix $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	public function setPedido($val = ''){
		$this->idPedido = $val;
		
		return true;
	}
	
	/**
	* Retorna la venta
	*
	* @autor Hugo
	* @access public
	* @return integer El identificador de la venta
	*/
	public function getPedido(){
		return $this->idPedido;
	}
	
	/**
	* Establece la cantidad
	*
	* @autor Hugo
	* @access public
	* @param integer $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	public function setCantidad($val = 1){
		$this->cantidad = $val;
		
		return true;
	}
	
	/**
	* Retorna la cantidad
	*
	* @autor Hugo
	* @access public
	* @return integer La cantidad del producto
	*/
	public function getCantidad(){
		return $this->cantidad;
	}
	
	/**
	* Establece el precio
	*
	* @autor Hugo
	* @access public
	* @param decimal $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	public function setPrecio($val = 0){
		$this->precio = $val;
		
		return true;
	}
	
	/**
	* Retorna el precio
	*
	* @autor Hugo
	* @access public
	* @return decimal Precio del producto
	*/
	public function getPrecio(){
		return $this->precio;
	}
	
	/**
	* Establece el descuento
	*
	* @autor Hugo
	* @access public
	* @param integer $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	public function setDescuento($val = 0){
		$this->descuento = $val;
		
		return true;
	}
	
	/**
	* Retorna la descuento
	*
	* @autor Hugo
	* @access public
	* @return integer La cantidad del producto
	*/
	public function getDescuento(){
		return $this->descuento == ''?0:$this->descuento;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	public function guardar(){
		if ($this->getPedido() == '') return false;
		if ($this->producto->getId() == '') return false;
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$sql = "INSERT INTO movimiento(idPedido, idProducto) VALUES (".$this->getPedido().", ".$this->producto->getId().")";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			
			$this->idMovimiento = $db->insert_id;
		}
		
		if ($this->idMovimiento == '') return false;
		
		$sql = "UPDATE movimiento
			SET
				cantidad = ".$this->getCantidad().",
				precio = ".$this->getPrecio().",
				descuento = ".$this->getDescuento()."
			WHERE idMovimiento = ".$this->getId();
		
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
		$sql = "delete from movimiento where idMovimiento = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		return $rs?true:false;
	}
}
?>