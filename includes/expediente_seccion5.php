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
<center><h2 id="up">EXPEDIENTE (Seccion V)</h2></center>
<center>
<div class="info_gral">

<table style="width:100%;">
<tr>
<td><button onclick="seccion2(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion II</button></td>
<td><button onclick="seccion3(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion III</button></td>
<td><button onclick="seccion4(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion IV</button></td>
<td><button onclick="seccion6(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion VI</button></td>
<td><button onclick="seccion7(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion VII</button></td>
<td><button onclick="seccion8(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion VIII</button></td>
<td> <button onclick="abrirExpedienteALL(<?php echo $_POST['id_expediente']; ?>);"  class="btn btn-warning" style="">Cerrar</button> </td>
</tr>
</table>
<hr>
<form method="POST" class="form" id="form_actualizar_seccionV" action="control/ctrl_expediente.php?e=Expedienteparte5">
<input type="hidden" name="id_paciente" value="<?php echo $data['id_paciente']; ?>">
<label> Estatus del expediente: <?php echo $data['edo_exp']; ?></label>
<br>
<label>Fecha de registro: <?php echo $data['fecha_reg']; ?> </label><br>
<label>Empleado: </label> <?php echo $data['nombre_emp']; ?><br>
<table class="table" style="width:100%;">
<tr><td colspan="3" style="text-align:center;"><label><span class="texto-colorfondo">V.-ANTECEDENTES PSICO-SOCIALES</span></label>
</td></tr>
<tr><td><label><span class="item-subtitle">V.I.- TABACO </span></label></td></tr>
<tr><td>
<label>A) ¿Fuma Actualmente?</label><br>
<label><input type="checkbox" name="fuma" value="si"> SI</label>
<label><input type="checkbox" name="fuma" value="no"> NO</label>
</td>
<td>
<label>En caso de ser Negativo,¿Fumaba Anteriormente?</label><br>
<label><input type="checkbox" name="fuma_antes_si" value="si"> SI</label>
<label><input type="checkbox" name="fuma_antes_si" value="no"> NO</label>
</td></tr>

<tr>
<td>
<label>B) ¿A que edad empezo a fumar?</label><br>
<textarea class="form-login" name="fuma_empezo" style="width:20%;"></textarea><br>
<label>D) ¿En que año dejo de fumar?</label><br>
<textarea class="form-login" name="fuma_dejo" style="width:20%;"></textarea><br>
</td>
<td>
<label>C) ¿Numero de Cigarrillos que fuma o fumaba?</label><br>
<textarea class="form-login" name="fuma_cant" style="width:20%;"></textarea><br>
<label>E) ¿Porque razon?</label><br>
<textarea class="form-login" name="fuma_razon" style="width:100%;"></textarea><br>
</td>
</tr>
<tr><td colspan="3"><label><span class="item-subtitle">V.II.- ALCOHOL</span></label><br></td></tr>
<tr><td>
<label>A) ¿Ingiere bebidas Alcoholicas?</label><br>
<label><input type="checkbox" name="toma" value="si"> SI</label>
<label><input type="checkbox" name="toma" value="no"> NO</label></td>
<td>
<label>B) En caso de ser SI, ¿Desde Cuando?</label><br>
<textarea class="form-control" name="toma_inicio"></textarea></td>
<tr>
<td colspan="3" rowspan="1">
<label>C) ¿Frecuencia? </label>
<label><input type="checkbox" name="tomafrecuencia[]" value="Diario">  Diaria</label>
<label><input type="checkbox" name="tomafrecuencia[]" value="Semanal"> Semanal</label>
<label><input type="checkbox" name="tomafrecuencia[]" value="Quincenal"> Quincenal</label>
<label><input type="checkbox" name="tomafrecuencia[]" value="Mensual"> Mensual</label></td></tr>
<tr><td>
<label>D) ¿Ha tenido accidentes de transito o de trabajo por causa de la ingesta de Alcohol?</label><br>
<label><input type="checkbox" name="toma_acci_si" value="si"> SI</label>
<label><input type="checkbox" name="toma_acci_si" value="no"> NO</label></td>
<td>
<br>
<textarea class="form-control" name="toma_acci_com" placeholder="COMENTARIOS!!!"></textarea><br>
</td>
</tr>
<tr><td colspan="3"><label><span class="item-subtitle">V.III.- DROGAS</span></label><br></td></tr>
<tr><td>
<label>A) ¿Alguna vez ha usado algun tipo de droga Psicoactiva?</label><br>
<label><input type="checkbox" name="drogas" value="si"> SI</label>
<label><input type="checkbox" name="drogas" value="no"> NO</label></td>
<td>
<label>B) En caso que si, Señale Fecha de inicio, Tipo de Droga, Frecuencia y Ultima Ocasion:</label><br>
<textarea class="form-control" name="drogas_coment"></textarea></td>
</tr></tr></table>

<input type="submit" class="btn btn-primary" value="Guardar cambios" style="width:100%;">
</form>
</div>
</center>
<!--
<script type="text/javascript">
$(document).ready(function(){
  $("#form_actualizar_seccionV").submit(function(e){
    e.preventDefault();
    $.post('control/ctrl_expediente.php?e=Expedienteparte5',$("#form_actualizar_seccionV").serialize(),function(data){
      swal('',data);
      abrirExpedienteALL(<?php echo $_POST['id_expediente']; ?>);
    });
  });
});
</script> -->
