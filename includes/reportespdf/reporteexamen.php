<?php
//AddPage(orientacion[PORTRAIT, LANDSCAPE], tamano[A3, A4, A5, LETTER, LEGAL], rotacion),
//SetFont(tipo[CURIER, HELVETICA, ARIAL, TIMES, SYMBOL, ZAPDINGBASTS], estilo[normal, B, I, U], tamano),
//Cell(ancho, alto, texto, bordes, ?, alineacion, rellenar, link),
//Write(alto, texto, link),
//OutPut(destino[I, D, F, S], nombre_archivo, utf8)
//Ln(); Salto de Linea

	include 'plantillaExamenes.php';
	require 'conexion.php';

	$query = "SELECT e.nombre_emp, m.id_paciente, m.tipo_examen, m.fecha_examen, m.resultados FROM examenes AS m INNER JOIN paciente AS e ON m.id_paciente=e.id_paciente WHERE fecha_examen BETWEEN DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND CURDATE() ORDER BY m.fecha_examen DESC";
	$resultado = $mysqli->query($query);
//WHERE m.resultados='negativo'
//[consulta por rango de fechas]... BETWEEN '2018-12-01' AND '2019-01-30'

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('PORTRAIT', 'LETTER');

//inicia config de Linea
//	$pdf->SetLineWidth(0.6); //crosor de linea
//	$pdf->SetDrawColor(10,100,15); //Dar color a la Linea
//	$pdf->Line(10,23,205,23); //Posicionamiento de la linea
//termina config de Linea

	$pdf->SetFillColor(10,100,15);
	$pdf->SetFont('Arial','B',11);
	$pdf->SetTextColor(255,255,255);
	$pdf->SetDrawColor(20,20,20);
	$pdf->Cell(65,6,'EMPLEADO',0,0,'C',1);
	$pdf->Cell(35,6,'EXAMEN',0,0,'C',1);
	$pdf->Cell(35,6,'FECHA',0,0,'C',1);
	$pdf->Cell(35,6,'RESULTADO',0,1,'C',1);
	
	
	$pdf->SetFont('Arial','',9);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->SetFillColor(225,255,255);
		$pdf->SetDrawColor(20,20,20);
		$pdf->SetTextColor(50,50,50);
		$pdf->Cell(65,6,utf8_decode($row['nombre_emp']),0,0,'L');
		$pdf->Cell(35,6,utf8_decode($row['tipo_examen']),0,0,'C');
		$pdf->Cell(35,6,utf8_decode($row['fecha_examen']),0,0,'C');
		$pdf->Cell(35,6,utf8_decode($row['resultados']),0,1,'C');
		
	}
	$pdf->Output(); //Se muestra directamente en el Navegador
//	$pdf->Output('D'); //Genera la Descarga automaticamente
//	$pdf->Output('F', 'Reporte01'); //para Guardarlo Directamente enel disco con el nombre dado
?>