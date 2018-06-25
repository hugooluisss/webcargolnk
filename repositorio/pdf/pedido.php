<?php
class RPedido extends tFPDF{
	private $pedido;
	
	public function RPedido($id, $onlyPrecio1 = false){
		$this->pedido = new TPedido($id);
		
		parent::tFPDF('P', 'mm', 'Letter');
		$this->AddFont('Sans','', 'DejaVuSans.ttf', true);
		$this->AddFont('Sans','B', 'DejaVuSans-Bold.ttf', true);
		$this->AddFont('Sans','U', 'DejaVuSans-Oblique.ttf', true);
		$this->AddFont('Sans','BU', 'DejaVuSans-BoldOblique.ttf', true);
		$this->total = 0;
		$this->onlyPrecio1 = $onlyPrecio1;
		
		$this->cleanFiles();
	}	
	
	public function Header($nombre){
		$y = $this->GetY();
		
		$this->Image("templates/img/logo.jpg", null, 9, 80, 25);
		
		$this->SetY($y);
    	$this->SetFont('Sans', 'B', 12);
    	$this->SetTextColor(255, 0, 0);
    	$y = $this->GetY();
    	$this->SetFont('Sans', 'B', 12);
    	$this->SetXY(150, $y);
    	$this->Cell(0, 8, "Folio: ".$this->pedido->getId(), 1, 1);
    	$this->SetX(150);
    	$this->SetTextColor(255, 255, 255);
    	$this->Cell(0, 8, "C O T I Z A C I Ó N", 1, 1, 'C', 1);
    	$this->SetTextColor(0, 0, 0);
    	$this->SetX(150);
    	$this->SetFont('Sans', '', 10);
    	$this->Cell(28, 8, $this->pedido->estado->getNombre(), 1, 0, 'C');
    	$this->Cell(27.8, 8, date("Y-m-d"), 1, 1, 'C');
    	
    	$this->Ln(10);
    	$this->Cell(20, 5, "Cliente: ");
    	$this->Cell(120, 5, $this->pedido->usuario->getNombre(), 'B');
    	$this->Cell(20, 5, "Teléfono: ");
    	$this->Cell(35, 5, $this->pedido->usuario->getTelefono(), 'B');
    	$this->Ln(8);
    	$this->Cell(20, 5, "Dirección: ");
    	$this->Cell(0, 5, $this->pedido->usuario->getDireccion(), 'B');
    	$this->Ln(8);
    	if ($this->pedido->estado->getId() == 6){
    		$this->SetFont('Sans', '', 8);
	    	$this->Cell(20, 5, "Enviado a través de ".$this->pedido->objEnvio['paqueteria']->getNombre()." con el número de guía ".$this->pedido->objEnvio['guia']);
	    	$this->Ln(10);
	    }else
    		$this->Ln(15);
    	#Inicio del detalle de la venta
    	$this->SetFont('Sans', '', 8);
    	$this->SetFillColor(160);
    	$y = $this->GetY();
    	$x = $this->GetX();
    	
    	$this->Cell(40, 10, "Código", 0, 0, 'C', true);
    	$this->Cell(93, 10, "Descripción", 0, 0, 'C', true);
    	$this->Cell(15, 10, "Cantidad", 0, 0, 'C', true);
    	$this->Cell(25, 10, "Precio U.", 0, 0, 'C', true);
    	$this->Cell(25, 10, "Precio total", 0, 0, 'C', true);
    	$this->Ln(10);
	}
	
	public function generar($id){
		$this->AddPage();
		
		$this->SetFont('Sans', '', 6);
		$db = TBase::conectaDB();
		global $sesion;
		$this->items = 0;
		foreach($this->pedido->movimientos as $movimiento){
			$x = $this->GetX();
			$y = $this->GetY();
			$cont++;
			
			if ($cont % 2 == 0)
				$this->SetFillColor(230);
			else
				$this->SetFillColor(255);
			$this->items += $movimiento->getCantidad();
			$this->Cell(40, 4, $movimiento->producto->getCodigo(), 0, 0, 'L', true);
	    	$this->Cell(93, 4, $movimiento->producto->getDescripcion(), 0, 0, 'L', true);
	    	$this->Cell(15, 4, $movimiento->getCantidad(), 0, 0, 'R', true);
	    	if ($this->onlyPrecio1)
	    		$precio = $movimiento->producto->getPrecio1();
	    	else
	    		$precio = $movimiento->getPrecio();
	    		
	    	$this->Cell(25, 4, number_format($precio, 2, '.', ','), 0, 0, 'R', true);
	    	$this->Cell(25, 4, number_format($movimiento->getCantidad() * $precio, 2, '.', ','), 0, 0, 'R', true);
	    	
	    	$total += $movimiento->getCantidad() * $precio;
	    	$this->total = $total;
	    	$this->Ln(4);
		}
		
		$this->SetFont('Sans', 'B', 6);
		$this->Cell(40 + 93 + 15 + 25, 4, "Precio total", 'T', 0, 'R');
		$this->Cell(25, 4, number_format($total, 2, '.', ','), 'T', 0, 'R');
	}
	
	function Footer(){
		$db = TBase::conectaDB();
		
		$monto = $this->total;
		
		$this->SetY(-30 + count($pagos) * -5);
		$this->SetFont('Arial', 'I', 8);
		$this->SetY(-30 + count($pagos) * -5);
		$y = $this->GetY();
		$this->SetXY(10, $y);
		$this->MultiCell(130, 8, $this->pedido->getComentario());
		
		
		$this->SetXY(140, $y);
		$this->Cell(30, 5, "Total de art.", 'LT', 0);
		$this->Cell(0, 5, number_format($this->items, 2, '.', ','), 'RT', 0, 'R');
		$this->Ln(5); $y += 5;
		$this->SetXY(140, $y);
		$this->Cell(30, 5, "Subtotal", 'L', 0);
		$this->Cell(0, 5, number_format($monto, 2, '.', ','), 'R', 0, 'R');
		$this->Ln(5); $y += 5;
		$this->SetXY(140, $y);
		$this->Cell(30, 5, utf8_decode("Envío"), 'L');
		$this->Cell(0, 5, number_format($this->pedido->getEnvio(), 2, '.', ','), 'R', 0, 'R');
		$this->Ln(5); $y += 5;
		$this->SetXY(140, $y);
		$this->Cell(30, 5, "Total", 'LB');
		$this->Cell(0, 5, number_format($monto + $this->pedido->getEnvio(), 2, '.', ','), 'RB', 0, 'R');
	}
	
	private function cleanFiles(){
    	$t = time();
    	$dir = "temporal";
    	$h = opendir($dir);
    	while($file=readdir($h)){
        	if(substr($file,0,3)=='tmp' && substr($file,-4)=='.pdf'){
            	$path = $dir.'/'.$file;
            	if($t-filemtime($path)>3600)
                	@unlink($path);
        	}
    	}
    	closedir($h);
	}
	
	public function Output(){
		$file = "temporal/".basename(tempnam("temporal/", 'tmp'));
		rename($file, $file.'.pdf');
		$file .= '.pdf';
		parent::Output($file, 'F');
		chmod($file, 0777);
		//header('Location: temporal/'.$file);
		
		return $file;
	}
}
?>