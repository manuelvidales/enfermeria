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
<center><h2 id="up">EXPEDIENTE (Seccion VI)</h2></center>
<center>
<div class="info_gral">

<table style="width:100%;">
<tr>
<td><button onclick="seccion2(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion II</button></td>
<td><button onclick="seccion3(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion III</button></td>
<td><button onclick="seccion4(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion IV</button></td>
<td><button onclick="seccion5(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion V</button></td>
<td><button onclick="seccion7(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion VII</button></td>
<td><button onclick="seccion8(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion VIII</button></td>
<td> <button onclick="abrirExpedienteALL(<?php echo $_POST['id_expediente']; ?>);"  class="btn btn-warning" style="">Cerrar</button> </td>
</tr>
</table>

<form method="POST" class="form" id="form_actualizar_seccionVI" action="control/ctrl_expediente.php?e=Expedienteparte6">
<input type="hidden" name="id_paciente" value="<?php echo $data['id_paciente']; ?>">
<br>
<label> Estatus del expediente: <?php echo $data['edo_exp']; ?></label>
<br>
<label>Fecha de registro: <?php echo $data['fecha_reg']; ?> </label><br>
<label>Empleado: </label> <?php echo $data['nombre_emp']; ?><br>

<table class="table" style="width:100%;">
<tr><td colspan="3" style="text-align:center;"><label><span class="texto-colorfondo">VI.-HISTORIA, ENFERMEDADES O DX GINECOLOGICOS (Exclusivo Mujeres)</span></label></td></tr>
<tr colspan="3"><td>
<label>A) Menarca:</label>
<textarea class="form-control" name="menarca" style="width:100%;"></textarea></td>
</tr>
<tr colspan="3"><td>
<label>B) Ritmo:</label>
<textarea class="form-control" name="ritmo" style="width:100%;"></textarea></td>
</tr>
<tr colspan="3"><td>
<label>C) ¿Enfermedades de las Glandulas Mamarias? </label></td>
<td>
<label><input type="checkbox" name="enferm_glandulas" value="si">  SI</label></td>
<td>
<label><input type="checkbox" name="enferm_glandulas" value="no">  NO</label></td>
</tr>
<tr colspan="3"><td>
<label>D) ¿Enfermedades en los Ovarios? </label></td>
<td>
<label><input type="checkbox" name="enferm_ovarios" value="si">  SI</label></td>
<td>
<label><input type="checkbox" name="enferm_ovarios" value="no">  NO</label></td>
</tr>
<tr colspan="3"><td>
<label>E) ¿Enfermedades del Utero? </label></td>
<td>
<label><input type="checkbox" name="enferm_utero" value="si">  SI</label></td>
<td>
<label><input type="checkbox" name="enferm_utero" value="no">  NO</label></td>
</tr>
<tr colspan="3"><td>
<label>F) ¿Esta Embrazada? </label></td>
<td>
<label><input type="checkbox" name="embrazo" value="si">  SI</label></td>
<td>
<label><input type="checkbox" name="embrazo" value="no">  NO</label></td>
</tr>
<tr colspan="3"><td>
<label>En caso de Afirmativo:</label>
<input type="text" name="embrazo_sem" class="form-control" style="width:70%;" placeholder="¿Cuantas Semanas de Gestacion tiene?"></td>
<td>
<label>Fecha de ultima regla</label>
<input type="date" class="form-control" name="fecha_regla" value="<?php echo date('Y-m-d'); ?>" style="width:80%;"></td>
</tr>
<tr colspan="3"><td>
<label>G) Antecedentes Gineco-Obstetricos:</label></td>
<td>
<label><input type="checkbox" name="ginecoobst[]" value="Gesta">GESTA</label><br>
<label><input type="checkbox" name="ginecoobst[]" value="Aborto">  ABORTOS</label></td>
<td>
<label><input type="checkbox" name="ginecoobst[]" value="Parto">  PARTOS</label><br>
<label><input type="checkbox" name="ginecoobst[]" value="Cesarea">  CESAREA</label></td>
</tr>
<tr colspan="3"><td>
<label>H) ¿Se le ha practicado alguna mastografia? </label></td>
<td>
<label><input type="checkbox" name="mastografia" value="si">SI</label></td>
<td>
<label><input type="checkbox" name="mastografia" value="no">NO</label></td>
</tr>
<tr colspan="3"><td>
<label>I) ¿Se le ha practicado algun Papanicolao? </label></td>
<td>
<label><input type="checkbox" name="papanicolao" value="si">SI</label></td>
<td>
<label><input type="checkbox" name="papanicolao" value="no">NO</label></td>
</tr>
	<!-- SE AGREGA ESTA PARTE NO EXISTIA  -->
<tr><td>
<label>J) ¿Utiliza algun metodo anticonceptivo? </label></td>
<td>
<label><input type="checkbox" name="anticonceptivo" value="si">SI</label></td>
<td>
<label><input type="checkbox" name="anticonceptivo" value="no">NO</label></td>
</tr>
<tr>
<td colspan="3">
<label>En caso de Afirmativo:</label>
<input name="anticoncepcual" class="form-control" style="width:100%;" placeholder="¿Que metodo anticonceptivo utiliza?"></td>
</tr>
	<!-- FIN  -->
</table>


<input type="submit" class="btn btn-primary" value="Guardar cambios" style="width:100%;">
</form>
</div>
</center>
<!--
<script type="text/javascript">
$(document).ready(function(){
  $("#form_actualizar_seccionVI").submit(function(e){
    e.preventDefault();
    $.post('control/ctrl_expediente.php?e=Expedienteparte6',$("#form_actualizar_seccionVI").serialize(),function(data){
      swal('',data);
      abrirExpedienteALL(<?php echo $_POST['id_expediente']; ?>);
    //  window.open("control/conexion.php?e=exportarBD");
    //  window.open("control/lista_excel.php");
    });
  });
});
</script> -->
