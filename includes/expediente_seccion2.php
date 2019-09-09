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
<center><h2 id="up">EXPEDIENTE (Seccion II)</h2></center>
<center>
<div class="info_gral">

<table style="width:100%;">
<tr>
<td><button onclick="seccion3(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion III</button></td>
<td><button onclick="seccion4(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion IV</button></td>
<td><button onclick="seccion5(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion V</button></td>
<td><button onclick="seccion6(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion VI</button></td>
<td><button onclick="seccion7(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion VII</button></td>
<td><button onclick="seccion8(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion VIII</button></td>
<td> <button onclick="abrirExpedienteALL(<?php echo $_POST['id_expediente']; ?>);"  class="btn btn-warning" style="">Cerrar</button> </td>
</tr>
</table>

<form method="POST" class="form" id="form_actualizar_seccionII" action="control/modificar_exp_parte2.php">
<input type="hidden" name="id_paciente" value="<?php echo $data['id_paciente']; ?>">
<br>
<label> Estatus del expediente: <?php echo $data['edo_exp']; ?></label>
<br>
<label>Fecha de registro: <?php echo $data['fecha_reg']; ?> </label><br>
<label>Empleado: </label> <?php echo $data['nombre_emp']; ?><br>

<table class="table" style="width:100%;">
<tr><td colspan="5" style="text-align:center;"><label><span class="texto-colorfondo">II.-ANTECEDENTES PERSONALES</span></label></td>
</tr>
<tr><td colspan="5"><label> A)¿Padece Actualmente Alguna Enfermedad?</label></td></tr>

<tr colspan="5"><td>
<label><input type="checkbox" name="enfermedad[]" value="DIABETES"> DIABETES</label></td>
<td>
<label><input type="checkbox" name="enfermedad[]" value="HIPERTENSION"> HIPERTENSION</label></td>
<td>
<label><input type="checkbox" name="enfermedad[]" value="HIPOTENSION"> HIPOTENSION</label></td>
<td>
<label><input type="checkbox" name="enfermedad[]" value="ASMA"> ASMA</label></td>
<td>
<label><input type="checkbox" name="enfermedad[]" value="HERNIA"> HERNIA </label><br/></td>
</tr>

<tr colspan="5"><td>
<label><input type="checkbox" name="enfermedad[]" value="ENF. RENALES"> ENF. RENALES </label></td>
<td>
<label><input type="checkbox" name="enfermedad[]" value="MIGRANA"> MIGRAÑA </label></td>
<td>
<label><input type="checkbox" name="enfermedad[]" value="GASTRITIS"> GASTRITIS</label></td>
<td>
<label><input type="checkbox" name="enfermedad[]" value="ALERGIAS"> ALERGIAS</label></td>
<td>
<label><input type="checkbox" name="enfermedad[]" value="FRACTURA"> FRACTURA</label></td>

<tr colspan="5"><td>
<label><input type="checkbox" name="enfermedad[]" value="NERVIOS"> NERVIOS</label></td>
<td>
<label><input type="checkbox" name="enfermedad[]" value="CONVULCIONES"> CONVULCIONES</label></td>
<td>
<label><input type="checkbox" name="enfermedad[]" value="PARALISIS"> PARALISIS</label></td>
<td>
<label><input type="checkbox" name="enfermedad[]" value="TUBERCULOSIS"> TUBERCULOSIS</label></td>
<td>
<label><input type="checkbox" name="enfermedad[]" value="CIRUGIAS"> CIRUGIAS</label></td>
</tr>

<tr>
<td colspan="3">
<label>Otros:</label>
<input class="form-control" name="otro_opc_a">
</td></tr>

<tr>
<td colspan="3"><label>B) En los Ultimos 12 meses, ¿Ha Consultado algun medico?</label></td>
<td><label><input type="checkbox" name="pers_opc_b" value="Si"> SI</label></td>
<td><label><input type="checkbox" name="pers_opc_b" value="No"> NO</label></td>
</tr>

<tr>
<td colspan="3">
<label>C) ¿Esta Usted Sujeto a un Tratamiento Medico?</label></td>
<td><label><input type="checkbox" name="pers_opc_c" value="Si"> SI</label></td>
<td><label><input type="checkbox" name="pers_opc_c" value="No"> NO</label></td>
</tr>

<tr>
<td colspan="3">
<label>En caso Afirmativo, cual es el Tratamiento?</label></td>
<td>
<input class="form-control" name="pers_opc_ccual" placeholder="Anotar Tratamiento"></td>
</tr>
</table>

<input type="submit" class="btn btn-primary" value="Guardar cambios" style="width:100%;">
</form>
</div>
</center>
<!--
<script type="text/javascript">
$(document).ready(function(){
  $("#form_actualizar_seccionII").submit(function(e){
    e.preventDefault();
    $.post('control/ctrl_expediente.php?e=Expedienteparte2',$("#form_actualizar_seccionII").serialize(),function(data){
      swal('',data);
      abrirExpedienteALL(<?php echo $_POST['id_expediente']; ?>);
    //  window.open("control/conexion.php?e=exportarBD");
    //  window.open("control/lista_excel.php");
    });
  });
});
</script> -->

