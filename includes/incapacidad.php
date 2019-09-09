<!--Agrego esta parte para enviar a guardar los Datos en Tabla Incapacidades -->

<script type="text/javascript">
$(function(){
  $("#form_nueva_incapacidad").submit(function(e){
    e.preventDefault();
    $.post('control/ctrl_incapacidad.php?e=guardarIncapacidad',$("#form_nueva_incapacidad").serialize(),function(data){
      swal('',data);
      incapacidad(<?php echo $_POST['id_expediente']; ?>);
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
<center><h2 id="up">CAPTURA DE INCAPACIDAD</h2></center>
<center>
<div class="info_gral">
<table style="width:100%;">
<tr>
<td><button onclick="agregarBuzon(<?php echo $_GET['id_expediente']; ?>);" class="btn btn-primary">Enviar a buzón</button> </td>
<td><button onclick="examen_pruebas(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-lab"></span> Examenes</button></td>
<td> <button onclick="controlsalud(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary">
<span class="icon-heart"></span> Control Salud</button> </td>
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
<td><button onclick="abrirExpedienteALL(<?php echo $_POST['id_expediente']; ?>);"  class="btn btn-warning" style="">Cerrar</button></td></tr>
</table>
<br>
<form class="form" id="form_nueva_incapacidad" action="control/ctrl_incapacidad.php?e=guardarIncapacidad" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id_paciente" value="<?php echo $_POST['id_expediente']; ?>"/>
<table class="table" style="width:100%">
<tr>
<td colspan="3"><label style="color:blue;">Nombre de Empleado: </label><?php echo $data['nombre_emp']; ?><br>
</td>
</tr>
<tr>
<td><label style="color:blue;">Fecha de Inicio</label>
<input type="date" class="form-control" name="fecha_inicio" style="width:70%; text-align: center;" value="<?php echo date('Y-m-d'); ?>" required>
</td>
<td><label style="color:blue;">Fecha Termina</label>
<input type="date" class="form-control" name="fecha_final" style="width:70%; text-align: center;" value="<?php echo date('Y-m-d'); ?>" required>
</td>
<td><label style="color:blue;">Causas:</label>
<select name="causas_incap" class="form-control" id="cbo_causa_incap" onchange="agregarCausasIncap(this.value);" required>
<?php 
$con = new Conexion();
$sql = "SELECT * FROM causas_incap ORDER BY causas_incap";
$datos = $con->select($sql);
echo "<option value='' >--Seleccione una causa--</option>";
while($fila=mysqli_fetch_array($datos))
{
if(isset($_POST['selected']))
{
  if($fila['causas_incap']==$_POST['selected'])
  {
    echo "<option value='".utf8_encode($fila['causas_incap'])."' selected>".utf8_encode($fila['causas_incap'])."</option>";
  }else{
    echo "<option value='".utf8_encode($fila['causas_incap'])."'>".utf8_encode($fila['causas_incap'])."</option>";
  }
}else{
  echo "<option value='".utf8_encode($fila['causas_incap'])."' >".utf8_encode($fila['causas_incap'])."</option>";
}

}
 ?>
 <option value="agregar">--Agregar otra Causa--</option>
?>
</select>

</td>
<tr>
	<td colspan="3"><label style="color:blue;">Descripcion que Origino la Incapacidad:</label>
	<textarea name="descripcion" class="form-control" required></textarea>
	</td>
</tr>
</table>

<input type="submit" class="btn btn-primary" value="Guardar" style="width:100%;">
</form>
</div>
</center>

<!--<table class="table table-hover">  -->
<table class="table" style="width:100%;">
<tr>
<th>Fecha Inicio</th>
<th>Fecha Final</th>
<th>Causa</th>
<th>Descripcion</th>
</tr>
<?php

$sql="SELECT * FROM incapacidades WHERE id_paciente=".$id_expediente;
$datos = $con->select($sql);
while($fila=mysqli_fetch_array($datos))
echo '
  <tr>
  <td>'.$fila['fecha_inicio'].'</td>
  <td>'.$fila['fecha_final'].'</td>
  <td>'.$fila['causas_incap'].'</td>
  <td>'.$fila['descripcion'].'</td>

  </tr>
  ';
  ?>

</table>
<?php if (isset($_GET['id_expediente'])): ?>
<script type="text/javascript">
$(function(){
	swal('Aviso','El proceso se realizo con éxito');
	archivos(<?php echo $_GET['id_expediente']; ?>);
});
</script>	
<?php endif ?>

