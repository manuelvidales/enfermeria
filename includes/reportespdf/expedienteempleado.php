<?php
//	include 'plantilla.php';
//	require 'conexion.php';
	include 'plantillaexpediente.php';
//	include '../control/conexion.php';
	require 'conexion.php';
	//$mysqli = new Conexion();
	//$id_expediente=$_GET['id_expediente'];
	$query = "SELECT * FROM paciente WHERE id_paciente=".$_GET['id'];
	$resultado = $mysqli->query($query);

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetXY(15,30);
	$pdf->Cell(180,6,'I.- DATOS GENERALES',0,0,'C',1);
	$pdf->SetXY(45,38);
	$pdf->Cell(20,6,'FECHA:',0,0,'C',0);
	$pdf->SetFont('Arial','',10);
	$pdf->SetXY(130,38);
	$pdf->Cell(10,6,'CC:______________________',0,0,'C',0);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetXY(15,50);
	$pdf->Cell(28,6,'NOMBRE(S):',0,0,'L',0);
	$pdf->SetXY(155,50);
	$pdf->Cell(15,6,'SEXO:',0,0,'C',0);
	$pdf->SetXY(15,60);
	$pdf->Cell(15,6,'EDAD:',0,0,'L',0);
	$pdf->SetXY(50,60);
	$pdf->Cell(30,6,'GRUPO y RH:',0,0,'C',0);
	$pdf->SetXY(125,60);
	$pdf->Cell(33,6,'ESTADO CIVIL:',0,0,'C',0);
	$pdf->SetXY(15,70);
	$pdf->Cell(45,6,'FECHA DE NACIMIENTO:',0,0,'L',0);
	$pdf->SetXY(95,70);
	$pdf->Cell(45,6,'LUGAR DE NACIMIENTO:',0,0,'L',0);
	$pdf->SetXY(15,80);
	$pdf->Cell(24,6,'TELEFONOS:',0,0,'L',0);
	$pdf->SetXY(120,80);
	$pdf->Cell(20,6,'RELIGION:',0,0,'L',0);
	$pdf->SetXY(15,90);
	$pdf->Cell(22,6,'DOMICILIO:',0,0,'L',0);
	$pdf->SetXY(15,110);
	$pdf->Cell(73,6,'EN CASO DE EMERGENCIA NOTIFICAR A:',0,0,'L',0);
	$pdf->SetXY(125,110);
	$pdf->Cell(28,6,'PARENTESCO:',0,0,'C',0);
	$pdf->SetXY(15,120);
	$pdf->Cell(23,6,'NOMBRE(S):',0,0,'L',0);
	$pdf->SetXY(125,120);
	$pdf->Cell(10,6,'TEL:',0,0,'L',0);	

	$pdf->SetXY(15,130);
	$pdf->Cell(180,6,'II.- ANTECEDENTES PERSONALES',0,0,'C',1);
	$pdf->SetXY(15,140);
	$pdf->Cell(95,6,utf8_decode('A)¿PADECE ACTUALMENTE ALGUNA ENFERMEDAD?'),0,0,'L',0);
	$pdf->SetXY(15,180);
	$pdf->Cell(120,6,utf8_decode('B) EN LOS ULTIMOS 12 MESES, ¿HA CONSULTADO ALGUN MEDICO?'),0,0,'L',0);
	$pdf->SetXY(15,190);
	$pdf->Cell(103,6,utf8_decode('C)¿ESTA USTED SUJETO ALGUN TRATAMIENTO MEDICO?'),0,0,'L',0);
	$pdf->SetXY(15,200);
	$pdf->Cell(30,6,utf8_decode('¿CUAL?'),0,0,'L',0);

	$pdf->SetXY(15,210);
	$pdf->Cell(180,6,'III.- ANTECEDENTES PATOLOGICOS FAMILIARES',0,0,'C',1);
	$pdf->SetXY(15,220);
	$pdf->Cell(60,6,utf8_decode('A)¿EN SU FAMILIA CASOS DE?'),0,0,'L',0);

	$pdf->SetXY(15,240);
	$pdf->Cell(180,6,'IV.- HITORIA FAMILIARES',0,0,'C',1);
	$pdf->SetXY(15,247);
	$pdf->Cell(60,6,utf8_decode('PARENTESCO'),0,0,'L',0);
	$pdf->SetXY(15,254);
	$pdf->Cell(30,6,utf8_decode('A) PADRE'),1,0,'L',0);
	$pdf->SetXY(15,262);
	$pdf->Cell(30,6,utf8_decode('B) MADRE'),1,0,'L',0);
	$pdf->SetXY(15,270);
	$pdf->Cell(30,6,utf8_decode('D) CONYUGE'),1,0,'L',0);
	$pdf->SetXY(110,254);
	$pdf->Cell(30,6,utf8_decode('C) HERMANOS'),1,0,'L',0);
	$pdf->SetXY(110,262);
	$pdf->Cell(30,6,utf8_decode('E) HIJOS'),1,0,'L',0);


	$pdf->SetFont('Arial','',12);
	$pdf->SetXY(15,52);
	$pdf->Cell(180,3,'____________________________________________________________________________',0,0,'C',0);
	$pdf->SetXY(15,62);
	$pdf->Cell(180,3,'____________________________________________________________________________',0,0,'C',0);
	$pdf->SetXY(15,72);
	$pdf->Cell(180,3,'____________________________________________________________________________',0,0,'C',0);
	$pdf->SetXY(15,82);
	$pdf->Cell(180,3,'____________________________________________________________________________',0,0,'C',0);
	$pdf->SetXY(15,92);
	$pdf->Cell(180,3,'____________________________________________________________________________',0,0,'C',0);
	$pdf->SetXY(15,102);
	$pdf->Cell(180,3,'____________________________________________________________________________',0,0,'C',0);
	$pdf->SetXY(15,112);
	$pdf->Cell(75,3,'_______________________________',0,0,'L',0);
	$pdf->SetXY(125,112);
	$pdf->Cell(55,3,'_____________________________',0,0,'L',0);
	$pdf->SetXY(15,122);
	$pdf->Cell(180,3,'____________________________________________________________________________',0,0,'C',0);
	$pdf->SetXY(15,172);
	$pdf->Cell(180,3,'____________________________________________________________________________',0,0,'C',0);
	$pdf->SetXY(27,202);
	$pdf->Cell(175,3,'_______________________________________________________________________',0,0,'L',0);
	



	if($row = $resultado->fetch_assoc())
	{
		$pdf->SetXY(62,38);
		$pdf->Cell(25,6,date('d/m/Y', strtotime($row['fecha_reg'])),0,0,'C');
		$pdf->SetXY(43,50);
		$pdf->Cell(110,6,$row['nombre_emp'],0,0,'L');
		$pdf->SetXY(170,50);
		$pdf->Cell(25,6,$row['sex_paci'],0,0,'C');
		$pdf->SetXY(30,60);
		$pdf->Cell(10,6,$row['edad_paci'],0,0,'C');
		$pdf->SetXY(80,60);
		$pdf->Cell(40,6,$row['tipo_sangre'],0,0,'L');
		$pdf->SetXY(158,60);
		$pdf->Cell(35,6,$row['edo_civ'],0,0,'C');
		$pdf->SetXY(60,70);
		$pdf->Cell(27,6,date('d/m/Y', strtotime($row['naci_paci'])),0,0,'L');
		$pdf->SetXY(140,70);
		$pdf->Cell(50,6,utf8_decode($row['lugar_paci']),0,0,'L');
		$pdf->SetXY(39,80);
		$pdf->Cell(31,6,$row['tel_cas'],0,0,'L');
		$pdf->SetXY(70,80);
		$pdf->Cell(17,6,'Celular:',0,0,'L');
		$pdf->SetXY(87,80);
		$pdf->Cell(33,6,$row['tel_cel'],0,0,'L');
		$pdf->SetXY(140,80);
		$pdf->Cell(40,6,utf8_decode($row['reli']),0,0,'L');
		$pdf->SetXY(37,90);
		$pdf->Cell(60,6,$row['calle'],0,0,'L');
		$pdf->SetXY(127,90);
		$pdf->Cell(17,6,'No. Ext:',0,0,'L');
		$pdf->SetXY(144,90);
		$pdf->Cell(12,6,$row['no_ext'],0,0,'L');
		$pdf->SetXY(157,90);
		$pdf->Cell(15,6,'No. Int:',0,0,'L');
		$pdf->SetXY(173,90);
		$pdf->Cell(12,6,$row['no_int'],0,0,'L');
		$pdf->SetXY(15,100);
		$pdf->Cell(20,6,'Colonia:',0,0,'R');
		$pdf->SetXY(35,100);
		$pdf->Cell(40,6,$row['col'],0,0,'L');
		$pdf->SetXY(80,100);
		$pdf->Cell(20,6,'Municipio:',0,0,'C');
		$pdf->SetXY(100,100);
		$pdf->Cell(35,6,$row['mun'],0,0,'L');
		$pdf->SetXY(135,100);
		$pdf->Cell(16,6,'Estado:',0,0,'C');
		$pdf->SetXY(150,100);
		$pdf->Cell(40,6,utf8_decode($row['edo_dir']),0,0,'L');
		$pdf->SetXY(153,110);
		$pdf->Cell(40,6,$row['par_cont'],0,0,'L');
		$pdf->SetXY(38,120);
		$pdf->Cell(85,6,$row['nom_cont'],0,0,'L');
		$pdf->SetXY(135,120);
		$pdf->Cell(55,6,$row['tel_cont'],0,0,'L');

// seccion de: II.- ANTECEDENTES PERSONALES
			//HACER UNA CONSULTA CON UN ARRAYS PARA MOSTRAR SOLO LAS QUE TENGA ACTIVAS

		$pdf->SetXY(20,147);
		$pdf->Cell(170,16,$row['enfermedad'],1,0,'C');
	//	$pdf->SetXY(25,152);
	//	$pdf->write(5,$row['enfermedad']);
		$pdf->SetXY(15,170);
		$pdf->Cell(25,6,'Otros:',0,0,'R');
		$pdf->SetXY(40,170);
		$pdf->Cell(110,6,$row['otro_opc_a'],0,0,'L');
		$pdf->SetXY(140,180);
		$pdf->Cell(15,6,$row['pers_opc_b'],1,0,'C');
		$pdf->SetXY(140,190);
		$pdf->Cell(15,6,$row['pers_opc_c'],1,0,'C');
		$pdf->SetXY(32,200);
		$pdf->Cell(160,6,$row['pers_opc_ccual'],0,0,'L');

// seccion III.- ANTECEDENTES PATOLOGICOS FAMILIARES
		$pdf->SetXY(25,225);
		$pdf->Cell(150,10,$row['antecedfami'],1,0,'C');

//seccion IV.- HITORIA FAMILIARES
	$pdf->SetXY(45,254);
	$pdf->Cell(10,6,utf8_decode($row['padre_edad']),1,0,'C',0);
	$pdf->SetXY(55,254);
	$pdf->Cell(20,6,utf8_decode($row['padre_vive']),1,0,'L',0);
	$pdf->SetXY(45,262);
	$pdf->Cell(10,6,utf8_decode($row['madre_edad']),1,0,'C',0);
	$pdf->SetXY(55,262);
	$pdf->Cell(20,6,utf8_decode($row['madre_vive']),1,0,'L',0);
	$pdf->SetXY(45,270);
	$pdf->Cell(10,6,utf8_decode($row['conyu_edad']),1,0,'C',0);
	$pdf->SetXY(55,270);
	$pdf->Cell(20,6,utf8_decode($row['conyu_si']),1,0,'L',0);
	$pdf->SetXY(140,254);
	$pdf->Cell(10,6,utf8_decode($row['hermanos_cant']),1,0,'C',0);
	$pdf->SetXY(150,254);
	$pdf->Cell(20,6,utf8_decode($row['hermanos']),1,0,'L',0);
	$pdf->SetXY(140,262);
	$pdf->Cell(10,6,utf8_decode($row['hijos_cant']),1,0,'C',0);
	$pdf->SetXY(150,262);
	$pdf->Cell(20,6,utf8_decode($row['hijos']),1,0,'L',0);


	}
	$pdf->Output(); //Se muestra directamente en el Navegador
//	$pdf->Output('D'); //Genera la Descarga automaticamente
//	$pdf->Output('F', 'Reporte01'); //para Guardarlo Directamente enel disco con el nombre dado
?>
