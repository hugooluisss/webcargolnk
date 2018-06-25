<?php
/**
* TNoticia
* Item de tipo Noticia
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TNoticia extends TItem{
	private $cuerpo;
	private $resumen;
	private $registrada;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access publicTTipoItem.class.php
	* @param int $id identificador del objeto
	*/
	public function TNoticia($id = ''){
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
		parent::setId($id);
		
		if ($id == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->query("select * from noticia where idItem = ".$this->getId());
		
		foreach($rs->fetch_assoc() as $field => $val){
			$this->$field = $val;
		}
				
		return true;
	}
		
	/**
	* Establece el cuerpo
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCuerpo($val = ''){
		$this->cuerpo = $val;
		return true;
	}
	
	/**
	* Retorna el cuerpo
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getCuerpo(){
		return $this->cuerpo;
	}
	
	/**
	* Establece el resumen
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar por default es 2 que hace referencia a doctor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setResumen($val = ''){
		$this->resumen = $val;
		return true;
	}
	
	/**
	* Retorna el resumen
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getResumen(){
		return $this->resumen;
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
		parent::guardar();
		if ($this->getId() == '') return false;
		
		$sql = "select * from noticia where idItem = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		if ($rs->num_rows == 0){
			$sql = "INSERT INTO noticia(idItem, registrada, actualizada) VALUES(".$this->getId().", now(), now());";
			$rs = $db->query($sql) or errorMySQL($db, $sql);
			if (!$rs) return false;
		}
		
		if ($this->getId() == '')
			return false;
			
		$sql = "UPDATE noticia
			SET
				resumen = '".mysql_escape_string($this->getResumen())."',
				cuerpo = '".mysql_escape_string($this->getCuerpo())."',
				actualizada = now()
			WHERE idItem = ".$this->getId();
		$rs = $db->query($sql) or errorMySQL($db, $sql);
			
		return $rs?true:false;
	}
}