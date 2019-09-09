<?php 
if(isset($_POST['selected']))include '../control/conexion.php';
$con = new Conexion();
$sql = "SELECT * FROM tipo_controlsalud ORDER BY tipocontrol";
$datos = $con->select($sql);
echo "<option value='Sin Seleccion' >--Seleccione un tipo --</option>";
while($fila=mysqli_fetch_array($datos))
{
if(isset($_POST['selected']))
{
	if($fila['tipocontrol']==$_POST['selected'])
	{
		echo "<option value='".utf8_encode($fila['tipocontrol'])."' selected>".utf8_encode($fila['tipocontrol'])."</option>";
	}else{
		echo "<option value='".utf8_encode($fila['tipocontrol'])."'>".utf8_encode($fila['tipocontrol'])."</option>";
	}
}else{
	echo "<option value='".utf8_encode($fila['tipocontrol'])."' >".utf8_encode($fila['tipocontrol'])."</option>";
}

}
 ?>
 <option value="agregar">--Agregar otro--</option>