<?php 
if(isset($_POST['selected']))include '../control/conexion.php';
$con = new Conexion();
$sql = "SELECT * FROM grupo_examen ORDER BY grupo";
$datos = $con->select($sql);
echo "<option value='Sin Seleccion' >--Seleccione un Grupo--</option>";
while($fila=mysqli_fetch_array($datos))
{
if(isset($_POST['selected']))
{
	if($fila['grupo']==$_POST['selected'])
	{
		echo "<option value='".utf8_encode($fila['grupo'])."' selected>".utf8_encode($fila['grupo'])."</option>";
	}else{
		echo "<option value='".utf8_encode($fila['grupo'])."'>".utf8_encode($fila['grupo'])."</option>";
	}
}else{
	echo "<option value='".utf8_encode($fila['grupo'])."' >".utf8_encode($fila['grupo'])."</option>";
}

}
 ?>
 <option value="agregar">--Agregar otro--</option>