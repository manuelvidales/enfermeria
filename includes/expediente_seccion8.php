<?php 
include '../control/conexion.php';
$con = new Conexion();
$sql="SELECT * FROM paciente WHERE id_paciente=".$_POST['id_expediente'];
$datos=$con->select($sql);
$data;
if($fila=mysqli_fetch_array($datos))
{
  $data=$fila;  
}
$sql = "SELECT count(*) as num_cons FROM consulta WHERE id_paciente=".$_POST['id_expediente'];
$datos = $con->select($sql);
$num_cons;
if($fila=mysqli_fetch_array($datos)) $num_cons = $fila['num_cons'];
?>
<center><h2 id="up">EXPEDIENTE (Seccion VIII)</h2></center>
<center>
<div class="info_gral">

<table style="width:100%;">
<tr>
<td><button onclick="seccion2(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion II</button></td>
<td><button onclick="seccion3(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion III</button></td>
<td><button onclick="seccion4(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion VV</button></td>
<td><button onclick="seccion5(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion V</button></td>
<td><button onclick="seccion6(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion VI</button></td>
<td><button onclick="seccion7(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion VII</button></td>
<td> <button onclick="abrirExpedienteALL(<?php echo $_POST['id_expediente']; ?>);"  class="btn btn-warning" style="">Cerrar</button> </td>
</tr>
</table>

<form method="POST" class="form" id="form_actualizar_seccionVIII" action="control/ctrl_expediente.php?e=Expedienteparte8">
<input type="hidden" name="id_paciente" value="<?php echo $data['id_paciente']; ?>">
<br>
<label> Estatus del expediente: <?php echo $data['edo_exp']; ?></label>
<br>
<label>Fecha de registro: <?php echo $data['fecha_reg']; ?> </label><br>
<label>Empleado: </label> <?php echo $data['nombre_emp']; ?><br>


<table class="table" style="width:100%;">
<tr><td colspan="3" style="text-align:center;"><label><span class="texto-colorfondo">VIII.-RESULTADOS</span></label></td>
</tr>
<tr><td style="text-align:center;"><label>APTO: </label></td>
<td style="text-align:left;"><label><input type="checkbox" name="apto[]" value="SI">  SI</label></td>
<td style="text-align:left;"><label><input type="checkbox" name="apto[]" value="NO">  NO</label></td>

<tr><td style="text-align:center;"><label>NO APTO</label></td>
<td style="text-align:left;"><label><input type="checkbox" name="noapto[]" value="SI">  SI</label></td>
<td style="text-align:left;"><label><input type="checkbox" name="noapto[]" value="NO">  NO</label></td>
</tr>
</table>

<input type="submit" class="btn btn-primary" value="Guardar cambios" style="width:100%;">
</form>
</div>
</center>
<!--
<script type="text/javascript">
$(document).ready(function(){
  $("#form_actualizar_seccionVIII").submit(function(e){
    e.preventDefault();
    $.post('control/ctrl_expediente.php?e=Expedienteparte8',$("#form_actualizar_seccionVIII").serialize(),function(data){
      swal('',data);
      abrirExpedienteALL(<?php echo $_POST['id_expediente']; ?>);
    });
  });
});
</script> -->
