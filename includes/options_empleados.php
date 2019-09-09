<?php 
//if(isset($_POST['selected']))include '..include/conexion.php';
//$con = new Conexion();
$serverName = "192.168.1.190"; //serverName\instanceName
$connectionInfo = array( "Database"=>"halcondbnew", "UID"=>"sa", "PWD"=>"Halcon2018");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

$consulta = "SELECT id_personal, nombre, imss, estado FROM personal_personal WHERE estado='A' ORDER BY nombre";
$ejecutar = sqlsrv_query($conn, $consulta);
echo "<option value=''>--Seleccione Empleado--</option>";

while($valores = sqlsrv_fetch_array($ejecutar))
{

if(isset($_POST['selected']))
{

	if($valores['nombre']==$_POST['selected'])
	{
		echo "<option value='".utf8_encode($valores['nombre'])."' selected>".utf8_encode($valores['nombre'])."</option>";
		
	}
	else{
		echo "<option value='".utf8_encode($valores['nombre'])."'>".utf8_encode($valores['nombre'])."</option>";
		
		}
	}
	else{
	echo "<option value='".utf8_encode($valores['nombre'])."' >".utf8_encode($valores['nombre'])."</option>";
	
}

}

?>
