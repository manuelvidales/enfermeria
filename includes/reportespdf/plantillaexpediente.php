<?php
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('image/Logohalcon.png', 25, 5, 30,20 );
			$this->SetFont('Arial','B',12);
			$this->Cell(30);
			$this->SetXY(60,7);
			$this->Cell(110,8, 'AUTOFLETES INTERNACIONALES HALCON S.C.',0,0,'C');
			$this->SetFont('Arial','',8);
			$this->SetXY(95,13);
			$this->Cell(40,5, 'FR-PC-SSE-007.00',0,0,'C');
			$this->SetFont('Arial','U',9);
			$this->SetXY(60,22);
			$this->Cell(100,6, ' "EXPEDIENTE DE EMPLEADO" ',0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>