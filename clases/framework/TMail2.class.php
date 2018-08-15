<?php
/**
* TMail
* Interfaz que permite conectar a un servidor SMTP
* Extrae los datos del servidor
* PHP 5
* @author     Hugo Luis Santiago Altamirano hugooluisss@gmail.com
* @license    openSource
* @version    1.0, 23/01/2018
**/

class TMail2{
	private $permitir = true;
	private $sandbox = false;
	private $destinos;
	private $origen;
	private $contestarA;
	public $adjuntos;
	private $tema;

	public function __construct(){
		global $ini;
		$this->destinos = array();
		$this->contestarA = "";
		$this->origen = array("nombre" => $ini['sistema']['nombreEmpresa'], "correo" => $ini['sistema']['correo']);
		$this->adjuntos = array();
		
		$this->permitir = true;
	}
	
	public function setPermitir($band = true){
		$this->permitir = $band;
	}

	public function setBodyHTML($msg = "Sin mensaje"){
		$this->msg = $msg;
	}

	public function setTema($tema){
		$this->tema = $tema;
	}
	
	public function getTema(){
		return $this->tema;
	}
	
	public function setOrigen($nombre = '', $correo = ''){
		$this->origen = array("nombre" => $nombre, "correo" => $mail);
	}

	public function addDestino($mail = "", $nombre = ""){
		if ($this->sandbox)
			array_push($this->destinos, array("nombre" => "Pruebas del sistema", "correo" => "hugooluisss@gmail.com"));
		else
			array_push($this->destinos, array("nombre" => $nombre, "correo" => $mail));
			
		return true;
	}
	
	public function setContestarA($contestar = ''){
		$this->contestarA = $contestar;
		
	}
	
	public function send(){
		if (!$this->permitir)
			return true;
		else{
			$salto = "\r";
			$random_hash = md5(date('r', time()));
			
			$headers = "MIME-Version: 1.0;\r\n";
			$headers .= "From: ".$this->origen['nombre']."<".$this->origen['correo'].">;\r\n";
			$headers .= "Reply-To: <".($this->contestarA == ''?$this->origen['correo']:$this->contestarA).">;\r\n";
			$headers .= "Content-Type: multipart/mixed; boundary=\"PHP-mixed-".$random_hash."\"";
			
			#Esta es la parte del mensaje
			$msg = "--PHP-mixed-".$random_hash.$salto;
			$msg .= 'Content-Type: multipart/alternative; boundary="PHP-alt-'.$random_hash.'"'.$salto; 
			$msg .= '--PHP-alt-'.$random_hash.$salto;
			$msg .= 'Content-Type: text/html; charset="iso-8859-1"'.$salto;
			$msg .= 'Content-Transfer-Encoding: 7bit'.$salto.$salto;
			$msg .= $this->msg.$salto;
			$msg .= '--PHP-alt-'.$random_hash.'--'.$salto;
			#este es el fin del mensaje
			
			#por cada adjunto
			foreach($this->adjuntos as $adjunto){
				$msg .= '--PHP-mixed-'.$random_hash.$salto;
				$msg .= 'Content-Type: '.mime_content_type($adjunto['ruta']).'; name="'.$adjunto['nombre'].'"'.$salto;
				
				/*
				if ($adjunto['type'] <> '')
					$msg .= 'Content-Type: '.$adjunto['type'].'; name="'.$adjunto['nombre'].'"'.$salto;
				else
					$msg .= 'Content-Type: application/image-jpeg; name="'.$adjunto['nombre'].'"'.$salto;
				*/
				
				$msg .= 'Content-Transfer-Encoding: base64'.$salto;
				$msg .= 'Content-Disposition: attachment'.$salto;
		
				$msg .= chunk_split(base64_encode(file_get_contents($adjunto['ruta'])));
				$msg .= '--PHP-mixed-'.$random_hash.'--'.$salto;
			}
			
			$emailBand = true;
			foreach($this->destinos as $destino){
				if ($emailBand)
					$emailBand = imap_mail($destino["correo"], $this->getTema(), $msg, $headers);
			}
				
			return $emailBand;
		}
	}
		
	public function construyeMail($texto, $datos){
		foreach($datos as $indice => $valor)
			$texto = str_replace('[*'.$indice.'*]', $datos[$indice], $texto);
			
		return $texto;
	}
}
?>