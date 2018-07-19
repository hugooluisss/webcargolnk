<?php
/**
* TOrden
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TOrden{
	private $idOrden;
	public $estado;
	public $tipoCamion;
	public $transportista;
	private $correo;
	private $telefono;
	private $descripcion;
	private $fechaservicio;
	private $latitude;
	private $longitude;
	private $origen;
	private $destino;
	private $presupuesto;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TOrden($id = ''){
		$this->estado = new TEstado(1);
		$this->tipoCamion = new TTipoCamion();
		$this->transportista = new TTransportista();
		
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
		$sql = "select *, X(salida) AS latitude, Y(salida) AS longitude from orden where idOrden = ".$id;
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		foreach($rs->fetch_assoc() as $field => $val){
			switch($field){
				case 'idTipoCamion':
					$this->tipoCamion = new TTipoCamion($val);
				break;
				case 'idEstado':
					$this->estado = new TEstado($val);
				break;
				default:
					$this->$field = $val;
				break;
			}
		}
		
		$sql = "select idTransportista from asignadotransportista where idOrden = ".$id;
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$row = $rs->fetch_assoc();
		$this->transportista = new TTransportista($row['idTransportista']);
		
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
		return $this->idOrden;
	}
	
	/**
	* Establece el folio
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setFolio($val = ''){
		$this->folio = $val;
		return true;
	}
	
	/**
	* Retorna el teléfono
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getFolio($generar = false){
		if ($generar == true and $this->folio == ''){
			$db = TBase::conectaDB();
			$band = false;
			$sql = "select * from configuracion where campo = '".date("Y")."'";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			$row = $rs->fetch_assoc();
			
			while(!$band){
				$folio = date("Y").sprintf("%04d", ++$row['folio']);
				$sql = "select folio from orden where folio = '".$folio."'";
				$rs = $db->query($sql) or errorMySQL($db, $sql);
				
				$band = $rs->num_rows == 0;
			}
			
			$sql = "update configuracion set folio = ".$folio." where campo = '".date("Y")."'";
			$db->query($sql) or errorMySQL($db, $sql);
			
			$this->folio = $folio;
		}
		
		return $this->folio;
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
	* Retorna el teléfono
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getTelefono(){
		return $this->telefono;
	}
	
	/**
	* Establece el correo
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCorreo($val = ''){
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
	* Establece la descripcion
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
	* Establece la fecha en la que se debe de realizar el servicio
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setFechaServicio($val = ''){
		$this->fechaservicio = $val;
		return true;
	}
	
	/**
	* Retorna la fecha en la que se debe de realizar el servicio
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getFechaServicio(){
		return $this->fechaservicio;
	}
	
	/**
	* Establece el valor en json del punto de origen
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setOrigen($val = ''){
		$this->origen = $val;
		$obj = json_decode($this->getOrigen());
		$this->latitude = $obj->latitude;
		$this->longitude = $obj->longitude;
		
		return true;
	}
	
	/**
	* Retorna el punto de origen en formato json
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getOrigen(){
		return $this->origen;
	}
	
	/**
	* Retorna la latitude
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getLatitude(){
		return $this->latitude == ''?0:$this->latitude;
	}
	
	/**
	* Retorna la longitude
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getLongitude(){
		return $this->longitude == ''?0:$this->longitude;
	}
		
	/**
	* Establece el valor en json del punto de destino
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setDestino($val = ''){
		$this->destino = $val;
		return true;
	}
	
	/**
	* Retorna el punto de destino en formato json
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getDestino(){
		return $this->destino;
	}
	
	/**
	* Establece el presupuesto
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPresupuesto($val = 0){
		$this->presupuesto = $val;
		return true;
	}
	
	/**
	* Retorna el presupuesto
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPresupuesto(){
		return $this->presupuesto == ''?0:$this->presupuesto;
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
	* Retorna el presupuesto
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPeso(){
		return $this->peso == ''?0:$this->peso;
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
		if ($this->estado->getId() == '') return false;
		
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$sql = "INSERT INTO orden(idTipoCamion, idEstado) VALUES(".$this->tipoCamion->getId().", ".$this->estado->getId().");";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			if (!$rs) return false;
			
			$this->idOrden = $db->insert_id;
		}
		
		if ($this->getId() == '')
			return false;
		
		$sql = "UPDATE orden
			SET
				folio = '".$this->getFolio(true)."',
				idTipoCamion = ".$this->tipoCamion->getId().",
				idEstado = ".$this->estado->getId().",
				descripcion = '".$this->getDescripcion()."',
				fechaservicio = '".$this->getFechaServicio()."',
				salida = point(".$this->getLatitude().", ".$this->getLongitude()."),
				origen = '".$this->getOrigen()."',
				destino = '".$this->getDestino()."',
				presupuesto = ".$this->getPresupuesto().",
				correo = '".$this->getCorreo()."',
				telefono = '".$this->getTelefono()."',
				peso = ".$this->getPeso()."
			WHERE idOrden = ".$this->getId();
			
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
		$sql = "delete from orden where idOrden = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		return $rs?true:false;
	}
	
	/**
	* Establece como aceptada por un transportista
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function aceptar($transportista = '', $monto = 0){
		if ($this->getId() == '') return false;
		$obj = new TTransportista($transportista);
		
		$db = TBase::conectaDB();
		$sql = "insert into interesado(idOrden, idTransportista, monto) values (".$this->getId().", ".$obj->getId().", ".$monto.")";
		$rs1 = $db->query($sql) or errorMySQL($db, $sql);
		
		$sql = "select count(*) as total from interesado where idOrden = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$row = $rs->fetch_assoc();
		
		if ($row['total'] >= 5){
			$this->estado->setId(2);
			$this->guardar();
		}
		
		return $rs1?true:false;
	}
	
	/**
	* Asigna la orden a un transportista
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function asignar($transportista = '', $monto = 0){
		if ($this->getId() == '') return false;
		$obj = new TTransportista($transportista);
		if ($obj->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$sql = "insert into asignadotransportista(idOrden, idTransportista) values (".$this->getId().", ".$obj->getId().")";
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		$sql = "update orden set presupuestofinal = ".$monto." where idOrden = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		$this->estado->setId(3);
		$this->guardar();
		
		//$obj->setSituacion(2);
		$obj->guardar();
		
		return $rs?true:false;
	}
	
	/**
	* Desasigna la orden a un transportista
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function desasignar(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$sql = "delete from asignadotransportista where idOrden = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		$sql = "update orden set presupuestofinal = null where idOrden = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		$this->estado->setId(2);
		$this->guardar();
		
		return $rs?true:false;
	}
	
	/**
	* Termina la orden
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function terminar($comentario = ''){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$sql = "update asignado set comentarios = '".$comentario."' where idOrden = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);

		$this->estado->setId(5);
		$this->guardar();
		
		return $rs?true:false;
	}
}
?>