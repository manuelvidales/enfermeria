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
<center><h2 id="up">EXPEDIENTE (Seccion III)</h2></center>
<center>
<div class="info_gral">

<table style="width:100%;">
<tr>
<td><button onclick="seccion2(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion II</button></td>
<td><button onclick="seccion4(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion IV</button></td>
<td><button onclick="seccion5(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion V</button></td>
<td><button onclick="seccion6(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion VI</button></td>
<td><button onclick="seccion7(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion VII</button></td>
<td><button onclick="seccion8(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion VIII</button></td>
<td> <button onclick="abrirExpedienteALL(<?php echo $_POST['id_expediente']; ?>);"  class="btn btn-warning" style="">Cerrar</button> </td>
</tr>
</table>

<form method="POST" class="form" id="form_actualizar_seccionIII" action="control/ctrl_expediente.php?e=Expedienteparte3" >
<input type="hidden" name="id_paciente" value="<?php echo $data['id_paciente']; ?>">
<br>
<label> Estatus del expediente: <?php echo $data['edo_exp']; ?></label>
<br>
<label>Fecha de registro: <?php echo $data['fecha_reg']; ?> </label><br>
<label>Empleado: </label> <?php echo $data['nombre_emp']; ?><br>

<table class="table" style="width:100%;">
<tr><td colspan="4" style="text-align:center;"><label><span class="texto-colorfondo">III.-ANTECEDENTES PATOLOGICOS FAMILIARES</span></label></td></tr>

<tr><td colspan="4" ><label> A)¿En su Familia casos de?</label></td></tr>

<tr colspan="4" ><td>
<label><input type="checkbox" name="antecedfami[]" value="Cancer"> CANCER </label></td>
<td>
<label><input type="checkbox" name="antecedfami[]" value="Diabetes"> DIABETES </label></td>
<td>
<label><input type="checkbox" name="antecedfami[]" value="Enf.Renales"> ENF. RENALES </label></td>
<td>
<label><input type="checkbox" name="antecedfami[]" value="Enf.corazaron"> ENF. CORAZON </label></td>
</tr>

<tr colspan="4"><td>
<label><input type="checkbox" name="antecedfami[]" value="Nervios"> NERVIOS </label></td>
<td>
<label><input type="checkbox" name="antecedfami[]" value="Cerebrovasculares"> ENF. CEREBROVASCULARES </label></td>
<td>
<label><input type="checkbox" name="antecedfami[]" value="Hipertension"> HIPERTENSION </label></td>
<td>
<label><input type="checkbox" name="antecedfami[]" value="Hipotension"> HIPOTENSION </label></td>
</tr>
	<!-- Esta parte se agrego por peticion ya que no estaba en la hoja  -->
<tr><td colspan="4"> <label>En caso afirmativo: ¿Quien de sus Familiares?:</label>
<input class="form-control" name="antecedfamquien">
</td></tr>
	<!-- FIN -->
</table>

<input type="submit" class="btn btn-primary" value="Guardar cambios" style="width:100%;">
</form>
</div>
</center>
<!--
<script type="text/javascript">
$(document).ready(function(){
  $("#form_actualizar_seccionIII").submit(function(e){
    e.preventDefault();
    $.post('control/ctrl_expediente.php?e=Expedienteparte3',$("#form_actualizar_seccionIII").serialize(),function(data){
      swal('',data);
      abrirExpedienteALL(<?php echo $_POST['id_expediente']; ?>);
    });
  });
});
</script> -->
