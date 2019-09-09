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
<center><h2 id="up">EXPEDIENTE (Seccion IV)</h2></center>
<center>
<div class="info_gral">

<table style="width:100%;">
<tr>
<td><button onclick="seccion2(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion II</button></td>
<td><button onclick="seccion3(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion III</button></td>
<td><button onclick="seccion5(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion V</button></td>
<td><button onclick="seccion6(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion VI</button></td>
<td><button onclick="seccion7(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion VII</button></td>
<td><button onclick="seccion8(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion VIII</button></td>
<td> <button onclick="abrirExpedienteALL(<?php echo $_POST['id_expediente']; ?>);"  class="btn btn-warning" style="">Cerrar</button> </td>
</tr>
</table>

<form method="POST" class="form" id="form_actualizar_seccionIV" action="control/ctrl_expediente.php?e=Expedienteparte4">
<input type="hidden" name="id_paciente" value="<?php echo $data['id_paciente']; ?>">
<br>
<label> Estatus del expediente: <?php echo $data['edo_exp']; ?></label>
<br>
<label>Fecha de registro: <?php echo $data['fecha_reg']; ?> </label><br>
<label>Empleado: </label> <?php echo $data['nombre_emp']; ?><br>

<table class="table" style="width:100%;">
<tr><td colspan="4" style="text-align:center;"><label><span class="texto-colorfondo">IV.-HISTORIA FAMILIARES</span>
</label></td></tr>
<tr><td colspan="4" ><label><span class="item-subtitle"> PARENTESCO </span></label></td></tr>

<tr colspan="4"><td><label>A) PADRE</label></td>
<td>
<label><input type="checkbox" name="padre_vive" value="SI">SI, </label></td>
<td>
<input type="text" name="padre_edad" class="form-control" style="width:25%;" placeholder="Edad?"></td>
<td>
<label><input type="checkbox" name="padre_vive" value="Fallecido"> Finado&#x2020;</label></td>
</tr>
<tr colspan="4">
<td><label>B) MADRE</label></td>
<td><label><input type="checkbox" name="madre_vive" value="SI">SI,</label></td>
<td>
<input type="text" name="madre_edad" class="form-control" style="width:25%;" placeholder="Edad?"></td>
<td>
<label><input type="checkbox" name="madre_vive" value="Fallecido"> Finado&#x2020;</label></td>
</tr>
<tr colspan="3"><td><label>C) HERMANOS</label></td>
<td>
<label><input type="checkbox" name="hermanos" value="SI"> SI</label></td>
<td>
<input type="text" name="hermanos_cant" class="form-control" style="width:25%;" placeholder="Cuantos?">
</td>
<td>
<label><input type="checkbox" name="hermanos" value="NO"> NO</label></td>
</tr>
<tr colspan="4"><td><label>D) CONYUGE</label></td>
<td>
<label><input type="checkbox" name="conyu_si" value="SI"> SI,</label></td>
<td>
<input type="text" name="conyu_edad" class="form-control" style="width:25%;" placeholder="Edad"></td>
<td>
<label><input type="checkbox" name="conyu_si" value="NO"> NO</label></td>
</tr>
<tr colspan="4"><td><label>E) HIJOS</label></td>
<td>
<label><input type="checkbox" name="hijos" value="SI"> SI,</label></td>
<td>
<input type="text" name="hijos_cant" class="form-control" style="width:25%;" placeholder="Cuantos?"></td>
<td>
<label><input type="checkbox" name="hijos" value="NO"> NO</label></td>
</tr>
</table>

<input type="submit" class="btn btn-primary" value="Guardar cambios" style="width:100%;">
</form>
</div>
</center>
<!--
<script type="text/javascript">
$(document).ready(function(){
  $("#form_actualizar_seccionIV").submit(function(e){
    e.preventDefault();
    $.post('control/ctrl_expediente.php?e=Expedienteparte4',$("#form_actualizar_seccionIV").serialize(),function(data){
      swal('',data);
      abrirExpedienteALL(<?php echo $_POST['id_expediente']; ?>);
    });
  });
});
</script> -->

