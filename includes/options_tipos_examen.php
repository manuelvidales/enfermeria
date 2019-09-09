<?php 
if(isset($_POST['selected']))include '../control/conexion.php';
$con = new Conexion();
$sql = "SELECT * FROM tipo_examen ORDER BY tipoexamen";
$datos = $con->select($sql);
echo "<option value='Sin Seleccion' >--Seleccione un Examen--</option>";
while($fila=mysqli_fetch_array($datos))
{
if(isset($_POST['selected']))
{
	if($fila['tipoexamen']==$_POST['selected'])
	{
		echo "<option value='".utf8_encode($fila['tipoexamen'])."' selected>".utf8_encode($fila['tipoexamen'])."</option>";
	}else{
		echo "<option value='".utf8_encode($fila['tipoexamen'])."'>".utf8_encode($fila['tipoexamen'])."</option>";
	}
}else{
	echo "<option value='".utf8_encode($fila['tipoexamen'])."' >".utf8_encode($fila['tipoexamen'])."</option>";
}

}
 ?>
 <option value="agregar">--Agregar otro--</option>