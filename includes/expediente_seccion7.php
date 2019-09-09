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
<center><h2 id="up">EXPEDIENTE (Seccion VII)</h2></center>
<center>
<div class="info_gral">

<table style="width:100%;">
<tr>
<td><button onclick="seccion2(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion II</button></td>
<td><button onclick="seccion3(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion III</button></td>
<td><button onclick="seccion4(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion IV</button></td>
<td><button onclick="seccion5(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion V</button></td>
<td><button onclick="seccion6(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion VI</button></td>
<td><button onclick="seccion8(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion VIII</button></td>
<td> <button onclick="abrirExpedienteALL(<?php echo $_POST['id_expediente']; ?>);"  class="btn btn-warning" style="">Cerrar</button> </td>
</tr>
</table>

<form method="POST" class="form" id="form_actualizar_seccionVII" action="control/ctrl_expediente.php?e=Expedienteparte7">
<input type="hidden" name="id_paciente" value="<?php echo $data['id_paciente']; ?>">
<br>
<label> Estatus del expediente: <?php echo $data['edo_exp']; ?></label>
<br>
<label>Fecha de registro: <?php echo $data['fecha_reg']; ?> </label><br>
<label>Empleado: </label> <?php echo $data['nombre_emp']; ?><br>

<table class="table" style="width:100%;">
<tr><td colspan="4"style="text-align:center;"><label><span class="texto-colorfondo">VII.-EXPLORACION FISICA</span></label>
</td></tr>

<tr><td>
<label>TALLA:</label>
<input type="text" name="talla" class="form-login" placeholder="Medida"><br>
<br>
<label>CINTURA:</label>
<input type="text" name="cintura" class="form-login" placeholder="Centimetros"><br>
</td>
<td>
<label>PESO:</label>
<input type="text" name="peso" class="form-login" placeholder="Kg"><br>
<br>
<label>FC:</label>
<input type="text" name="fc" class="form-login" placeholder="frec. cardiaca" style="width:60%;">
</td>
<td>
<label>T/A</label>
<input type="text" name="t_a" class="form-login" placeholder="MMHG"><br>
<br>
<label>GLUCEMIA CAPILAR:</label>
<input type="text" name="glucemia" class="form-login" placeholder="MG/DL"><br>
</td></tr>

<tr><td colspan="4" style="text-align:center;"><label><span class="item-subtitle">"AGUDEZA VIZUAL"</span></label></td></tr>
<tr colspan="4">
<td><label>OJO DERECHO:</label><br>
<input type="text" name="ojo_dere" class="form-login" style="width:100%;"></td>
<td><label>CATARATAS:</label><br>
<input type="text" name="cataratas" class="form-login" style="width:100%;"></td>
<td><label>OJO IZQUIERDO:</label><br>
<input type="text" name="ojo_izq" class="form-login" style="width:100%;"></td>
<td><label>PTERIGION (Carnosidad):</label><br>
<input type="text" name="pterigion" class="form-login" style="width:100%;"></td>
</td>
</tr>
<tr><td colspan="4" style="text-align:center;"><label><span class="item-subtitle">"EXAMENES ESPECIALES"</span></label></td></tr>
<tr colspan="3">
<td><label>ANTIDOPING:</label></td>
<td><input type="date" class="form-control" name="antidop_fecha" value="<?php echo date('Y-m-d'); ?>" style="width:80%;"></td>
<td><textarea class="form-login" name="antidop_res" style="width:100%;" placeholder="RESULTADOS"></textarea></td>
<tr colspan="3">
<td><label>ALCOHOLIMETRIA:</label></td>
<td><input type="date" class="form-control" name="alcohol_fecha" value="<?php echo date('Y-m-d'); ?>" style="width:80%;"></td>
<td><textarea class="form-login" name="alcohol_res" style="width:100%;" placeholder="RESULTADOS"></textarea></td>
</tr>
<tr colspan="3">
<td><label>PRUEBA EMBRAZO:</label></td>
<td><input type="date" class="form-control" name="prueba_emb_fech" value="<?php echo date('Y-m-d'); ?>" style="width:80%;"></td>
<td><textarea class="form-login" name="prueba_emb_res" style="width:100%;" placeholder="RESULTADOS"></textarea></td>
</tr>
<tr><td colspan="4"><label>Observaciones:</label>
<textarea class="form-login" name="antidop_observ" style="width:50%; height:100%" placeholder="comentarios"></textarea></td>
</tr>
</table>



<input type="submit" class="btn btn-primary" value="Guardar cambios" style="width:100%;">
</form>
</div>
</center>
<!--
<script type="text/javascript">
$(document).ready(function(){
  $("#form_actualizar_seccionVII").submit(function(e){
    e.preventDefault();
    $.post('control/ctrl_expediente.php?e=Expedienteparte7',$("#form_actualizar_seccionVII").serialize(),function(data){
      swal('',data);
      abrirExpedienteALL(<?php echo $_POST['id_expediente']; ?>);
    //  window.open("control/conexion.php?e=exportarBD");
    //  window.open("control/lista_excel.php");
    });
  });
});
</script> -->
