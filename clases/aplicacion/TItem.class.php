<?php
/**
* TItem
* Puestos de los empleados
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TItem{
	private $idItem;
	public $tipo;
	public $departamento;
	private $titulo;
	private $publicado;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TItem($id = ''){
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
		$this->departamento = new TDepartamento();
		$this->tipo = new TTipoItem();
		
		if ($id == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->query("select * from item where idItem = ".$id);
		
		foreach($rs->fetch_assoc() as $field => $val){
			switch($field){
				case 'idDepartamento':
					$this->departamento = new TDepartamento($val);
				break;
				case 'idTipoItem':
					$this->tipo = new TTipoItem($val);
				break;
				default:
					$this->$field = $val;
				break;
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
		return $this->idItem;
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
	* Establece como publicado
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPublicado($val = true){
		$this->publicado = $val;
		return true;
	}
	
	/**
	* Retorna si está publicado o no
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPublicado(){
		return $this->publicado;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->departamento->getId() == '') return false;
		if ($this->tipo->getId() == '') return false;
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$sql = "INSERT INTO item(idDepartamento, idTipoItem) VALUES(".$this->departamento->getId().", ".$this->tipo->getId().");";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			if (!$rs) return false;
				
			$this->idItem = $db->insert_id;
		}		
		
		if ($this->getId() == '')
			return false;
		
		$sql = "UPDATE item
			SET
				idDepartamento = '".$this->departamento->getId()."',
				idTipoItem = '".$this->tipo->getId()."',
				titulo = '".$this->getTitulo()."',
				publicado = ".($this->getPublicado()?1:0)."
			WHERE idItem = ".$this->getId();
			
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
		$rs = $db->query("update item set visible = false, publicado = false where idItem = ".$this->getId());
		
		return $rs?true:false;
	}
}