<?php 
if(isset($_GET['e']))
{
switch ($_GET['e']) {
	case 'nuevoTipoControl': nuevoTipoControl(); break;
	case 'guardarControlSalud': guardarControlSalud(); break;
	case 'guardarNutricion': guardarNutricion(); break;
	}
}

function nuevoTipoControl()
{
	include 'conexion.php';
	$con = new Conexion();
	$sql = "INSERT INTO tipo_controlsalud (tipocontrol) VALUES ('$_POST[tipocontrol]')";
	if($con->insert($sql))
	{
		echo "El nuevo tipo ha sido agregado";
	}else{
		echo "Ocurrió un error en la petición: ".$sql;
	}
}
function guardarControlSalud()
{
	include 'conexion.php';
	$con = new Conexion();
	$sql = "INSERT INTO controlsalud (id_paciente,fecha_captura,tipo_control,t_a,glucosa) VALUES ($_POST[id_paciente], '$_POST[fecha_captura]', '$_POST[tipo_control]', '$_POST[t_a]', '$_POST[glucosa]')";
	if($con->insert($sql))
	{
		echo "La informacion se guardó con éxito!";
	}else{
		echo "Ocurrió un error : ".$sql;
	}
}
function guardarNutricion()
{
	include 'conexion.php';
	$con = new Conexion();
	$sql = "INSERT INTO nutricion (id_paciente,fecha_captura,peso,talla,cintura,imc,gradoobesidad) VALUES ($_POST[id_paciente], '$_POST[fecha_captura]', '$_POST[peso]', '$_POST[talla]', '$_POST[cintura]', '$_POST[imc]', '$_POST[gradoobesidad]')";
	if($con->insert($sql))
	{
		echo "La informacion se guardó con éxito!";
	}else{
		echo "Ocurrió un error : ".$sql;
	}
}
?>
