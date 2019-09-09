<?php 
if(isset($_GET['e']))
{
switch ($_GET['e']) {
	case 'guardarIncapacidad': guardarIncapacidad(); break;
	case 'nuevoCausasIncap': nuevoCausasIncap(); break;
}
}
//para agregar mas causas desde el SELECT
function nuevoCausasIncap()
{
	include 'conexion.php';
	$con = new Conexion();
	$sql = "INSERT INTO causas_incap (causas_incap) VALUES ('$_POST[causas_incap]')";
	if($con->insert($sql))
	{
		echo "La causa ha sido agregado";
	}else{
		echo "Ocurrió un error en la petición: ".$sql;
	}
}

function guardarIncapacidad()
{
	include 'conexion.php';
	$con = new Conexion();
	$sql = "INSERT INTO incapacidades (id_paciente,fecha_inicio,fecha_final,causas_incap,descripcion) VALUES ($_POST[id_paciente], '$_POST[fecha_inicio]', '$_POST[fecha_final]', '$_POST[causas_incap]', '$_POST[descripcion]')";
	if($con->insert($sql))
	{
	  echo "La informacion se guardó con éxito!";
	}else{
		echo "Ocurrió un error : ".$sql;
	}
}


 ?>