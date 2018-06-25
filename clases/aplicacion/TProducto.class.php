<?php
/**
* TProducto
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TProducto{
	private $idProducto;
	private $codigo;
	private $descripcion;
	private $descripcionlarga;
	private $marca;
	private $tipo;
	private $precio1;
	private $precio2;
	private $precio3;
	private $precio4;
	private $peso;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TProducto($id = ''){
		$this->precio1 = 0;
		$this->precio2 = 0;
		$this->precio3 = 0;
		$this->precio4 = 0;
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
		$sql = "select * from producto where idProducto = ".$id;
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
		return $this->idProducto;
	}
	
	/**
	* Establece el código
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCodigo($val = ''){
		$this->codigo = $val;
		return true;
	}
	
	/**
	* Retorna el código
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getCodigo(){
		return $this->codigo;
	}
	
	/**
	* Establece el descripción
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
	* Retorna la descripción
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getDescripcion(){
		return $this->descripcion;
	}
	
	/**
	* Establece la descripción larga
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setDescripcionLarga($val = ''){
		$this->descripcionlarga = $val;
		return true;
	}
	
	/**
	* Retorna la descripción larga
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getDescripcionLarga(){
		return $this->descripcionlarga;
	}
	
	/**
	* Establece el precio 1
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPrecio1($val = 0){
		$this->precio1 = $val;
		return true;
	}
	
	/**
	* Retorna el precio1
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPrecio1(){
		return $this->precio1;
	}
	
	/**
	* Establece el precio 1
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPrecio2($val = 0){
		$this->precio2 = $val;
		return true;
	}
	
	/**
	* Retorna el precio2
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPrecio2(){
		return $this->precio2;
	}
	
	/**
	* Establece el precio 1
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPrecio3($val = 0){
		$this->precio3 = $val;
		return true;
	}
	
	/**
	* Retorna el precio1
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPrecio3(){
		return $this->precio3;
	}
	
	/**
	* Establece el precio 4
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPrecio4($val = 0){
		$this->precio4 = $val;
		return true;
	}
	
	/**
	* Retorna el precio1
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPrecio4(){
		return $this->precio4;
	}
	
	/**
	* Establece el peso
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPeso($val = 0){
		$this->peso = $val;
		return true;
	}
	
	/**
	* Retorna el peso
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPeso(){
		return $this->peso;
	}
	
	/**
	* Establece la marca
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setMarca($val = ''){
		$this->marca = $val;
		return true;
	}
	
	/**
	* Retorna la marca
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getMarca(){
		return $this->marca;
	}
	
	/**
	* Establece el tipo
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setTipo($val = ''){
		$this->tipo = $val;
		return true;
	}
	
	/**
	* Retorna el tipo
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getTipo(){
		return $this->tipo;
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
			$sql = "INSERT INTO producto(codigo) VALUES('".$this->getCodigo()."');";
			$rs = $db->query($sql) or errorMySQL($db, $sql);;
			if (!$rs) return false;
			
			$this->idProducto = $db->insert_id;
		}
		
		if ($this->getId() == '')
			return false;
		
		$sql = "UPDATE producto
			SET
				codigo = '".$this->getCodigo()."',
				descripcion = '".$this->getDescripcion()."',
				descripcionlarga = '".$this->getDescripcionLarga()."',
				precio1 = ".$this->getPrecio1().",
				precio2 = ".$this->getPrecio2().",
				precio3 = ".$this->getPrecio3().",
				precio4 = ".$this->getPrecio4().",
				peso = ".$this->getPeso().",
				marca = '".$this->getMarca()."',
				tipo = '".$this->getTipo()."'
			WHERE idProducto = ".$this->getId();
			
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
		$sql = "update producto set visible = false where idProducto = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		return $rs?true:false;
	}
}
?>