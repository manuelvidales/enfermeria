<?php 
if(isset($_POST['selected']))include '../control/conexion.php';
$con = new Conexion();
$sql = "SELECT * FROM causas_incap ORDER BY causas_incap";
$datos = $con->select($sql);
echo "<option value='Sin Causas' >--Seleccione una Causa--</option>";
while($fila=mysqli_fetch_array($datos))
{
if(isset($_POST['selected']))
{
	if($fila['causas_incap']==$_POST['selected'])
	{
		echo "<option value='".utf8_encode($fila['causas_incap'])."' selected>".utf8_encode($fila['causas_incap'])."</option>";
	}else{
		echo "<option value='".utf8_encode($fila['causas_incap'])."'>".utf8_encode($fila['causas_incap'])."</option>";
	}
}else{
	echo "<option value='".utf8_encode($fila['causas_incap'])."' >".utf8_encode($fila['causas_incap'])."</option>";
}

}
 ?>
 <option value="agregar">--Agregar otra Causa--</option>