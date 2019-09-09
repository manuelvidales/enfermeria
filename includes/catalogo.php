<center><h2 id="up">CATÁLOGO DE EXPEDIENTES</h2></center>
<div class="expediente">
<!--
<table style="width:100%;">
<tr>
<button class="btn btn-success" onclick="openVerExpedientes();"><span class="icon icon-book"> </span> Reporte ACTIVOS</button>
</tr>
</table> -->

<br>
<table class="table table-hover">
<tr>
<th>N° Expediente</th>
<th>Nombre Completo</th>
<th>Fecha de nacimiento</th>
<th>Edad</th>
<!-- <th>Visitas</th> -->
<th>Estatus</th>
</tr>
<?php 
include '../control/conexion.php';
$con = new Conexion();
$sql = "SELECT * FROM paciente WHERE edo_exp='Activo'";
$datos = $con->select($sql);
while($fila=mysqli_fetch_array($datos))
{
$sql = "SELECT count(*) as num FROM consulta WHERE id_paciente=".$fila['id_paciente'];	
$datos2 = $con->select($sql);
if($fila2=mysqli_fetch_array($datos2))
{
	$numCons=$fila2['num'];
}
$fecha=explode('-',$fila['naci_paci']);
$fecha=$fecha[2].'-'.$fecha[1].'-'.$fecha[0];
echo'
<tr style="cursor:pointer;" onclick="abrirExpedienteALL('.$fila['id_paciente'].');">
<td>'.$fila['id_paciente'].'</td>
<td>'.utf8_encode($fila['nombre_emp']).'</td>
<td>'.$fecha.'</td>
<td>'.$fila['edad_paci'].'</td>
<!-- <td>'.$numCons.'</td> -->
<td>'.$fila['edo_exp'].'</td>
</tr>
';
}
 ?>

</table>


<script type="text/javascript">
/*Prueba ver Expedientes y Exportar PDF*/
 function openVerExpedientes()
{
	$.post('control/ctrl_expediente.php?e=selectExpedientes',{},function(data){
		$("#ver_expedientes").html(data);
		$("#modal_ver_expedientes").modal('show');
	});	
}
/*Prueba ver Expedientes*/
</script>
</div>
