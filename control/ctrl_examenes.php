<?php 
if(isset($_GET['e']))
{
switch ($_GET['e']) {
	case 'nuevoTipoExamen': nuevoTipoExamen(); break;
	case 'nuevoGrupo': nuevoGrupo(); break;
	case 'guardarExamen': guardarExamen(); break;
}
}

function nuevoTipoExamen()
{
	include 'conexion.php';
	$con = new Conexion();
        $tipo = $_POST['tipoexamen'];
	$sql = "INSERT INTO tipo_examen (tipoexamen) VALUES ('$tipo')";
	if($con->insert($sql))
	{
		echo "El nuevo examen ha sido agregado";
	}else{
		echo "Ocurrió un error en la petición: ".$sql;
	}
}

function nuevoGrupo()
{
	include 'conexion.php';
	$con = new Conexion();
	$sql = "INSERT INTO grupo_examen (grupo) VALUES ('$_POST[nombregrupo]')";
	if($con->insert($sql))
	{
		echo "El nuevo grupo ha sido agregado";
	}else{
		echo "Ocurrió un error en la petición: ".$sql;
	}
}

function guardarExamen()
{
	include 'conexion.php';
	$con = new Conexion();
	$sql = "INSERT INTO examenes (id_paciente,fecha_examen,tipo_examen,grupo,resultados, lectura) VALUES ('$_POST[id_paciente]', '$_POST[fecha_examen]', '$_POST[tipo_examen]', '$_POST[grupo_examen]', '$_POST[resul_examen]','$_POST[lectura]')";
	if($con->insert($sql))
	{
		echo "La informacion se guardó con éxito!";
	}else{
		echo "Ocurrió un error : ".$sql;
	}
}
 ?>
