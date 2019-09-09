<!--Agrego esta parte para enviar a guardar los Datos en Tabla Control Salud -->
<script type="text/javascript">
$(function(){
  $("#form_nuevo_controlsalud").submit(function(e){
    e.preventDefault();
    $.post('control/ctrl_controlsalud.php?e=guardarControlSalud',$("#form_nuevo_controlsalud").serialize(),function(data){
      swal('',data);
      controlsalud(<?php echo $_POST['id_expediente']; ?>);
    });
  });
});
</script>
<!-- Termina script para enviar a guardar los campos-->
  <?php 
include '../control/conexion.php';
$con = new Conexion();
//Obtener datos
$id_expediente;
if(isset($_POST['id_expediente']))
{
  $id_expediente=$_POST['id_expediente'];
}else{
  $id_expediente=$_GET['id_expediente'];
} 

$datos=$con->select("SELECT * FROM paciente  WHERE id_paciente=".$id_expediente);
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
<center><h2 id="up">CONTROL DE SALUD</h2></center>
<center>
<div class="info_gral">
<table style="width:100%;">
<tr>
<td><button onclick="agregarBuzon(<?php echo $_GET['id_expediente']; ?>);" class="btn btn-primary">Enviar a buzón</button> </td>
<td><button onclick="incapacidad(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-bullhorn"></span> Incapacidad</button></td>
<td><button onclick="examen_pruebas(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-lab"></span> Examenes</button></td>
<td><button onclick="nutricion(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-calendar"></span> Nutricion</button></td>
<?php
//ES PARA CONDICIONAR LO QUE PUEDE VER EN "Archivos" SEGUN SEA UN USUARIO o ADMIN
session_start();
if($_SESSION['tipo_usu']=='Admin')
{  
	echo '
<td><button onclick="archivosadmin('.$_POST['id_expediente'].');"  class="btn btn-primary">
<span class="icon-books"></span> Archivos</button></td>';
}
      else { 
      	echo '<td> <button onclick="archivosusuario('.$_POST['id_expediente'].');"  class="btn btn-primary">
<span class="icon-books"></span> Archivos</button></td>'; 
      		}
?>
<td><button onclick="abrirExpedienteALL(<?php echo $_POST['id_expediente']; ?>);"  class="btn btn-warning" style="">Cerrar</button> </td>
 </tr>
</table>
<br>
<form class="form" id="form_nuevo_controlsalud" action="control/ctrl_controlsalud.php?e=guardarControlsalud" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id_paciente" value="<?php echo $_POST['id_expediente']; ?>"/>
<table class="table" style="width:100%">
<tr>
<td colspan="2"><label style="color:blue;">Nombre de Empleado: </label><?php echo $data['nombre_emp']; ?><br>
</td>
</tr>
<tr>
<td><label style="color:blue;">Fecha de Captura</label>
<input type="date" class="form-control" name="fecha_captura" style="width:70%; text-align: center;" value="<?php echo date('Y-m-d'); ?>" required>
</td>
<td><label style="color:blue;">Tipo de Control:</label>
<select name="tipo_control" class="form-control" id="cbo_control_salud" onchange="agregarTipoControl(this.value);" required>
<?php 
$con = new Conexion();
$sql = "SELECT * FROM tipo_controlsalud ORDER BY tipocontrol";
$datos = $con->select($sql);
echo "<option value='' >--Seleccione un tipo--</option>";
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
 <option value="agregar">--Agregar otra Causa--</option>
?>
</select>
</td>
<tr colspan="3">
<td><label style="color:blue;">Toma de TA:</label><input class="form-control" name="t_a" placeholder="Ingreso Informacion" required></td>
<td><label style="color:blue;">Toma de Glucosa:</label>
<input class="form-control" name="glucosa" placeholder="Ingreso informacion" required></td>
</tr>
</table>
<input type="submit" class="btn btn-primary" value="Guardar" style="width:100%;">
</form>
</div>
</center>

<!--<table class="table table-hover">  -->
<table class="table" style="width:100%;">
<tr>
<th>Fecha de Captura</th>
<th>Tipo de Control</th>
<th>Toma de TA</th>
<th>Toma de Glucosa</th>
</tr>
<?php

$sql="SELECT * FROM controlsalud WHERE id_paciente=".$id_expediente;
$datos = $con->select($sql);
while($fila=mysqli_fetch_array($datos))
echo '
  <tr>
  <td>'.$fila['fecha_captura'].'</td>
  <td>'.$fila['tipo_control'].'</td>
  <td>'.$fila['t_a'].'</td>
  <td>'.$fila['glucosa'].'</td>
  </tr>';
  ?>

</table>
