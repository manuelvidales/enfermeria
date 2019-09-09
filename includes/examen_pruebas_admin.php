<!--Agrego esta parte para enviar a guardar los Datos en Tabla Examanes -->

<script type="text/javascript">
$(function(){
	$("#form_captura_examen").submit(function(e){
    e.preventDefault();
    $.post('control/ctrl_examenes.php?e=guardarExamen',$("#form_captura_examen").serialize(),function(data){
      swal('',data);
      examen_pruebas(<?php echo $_POST['id_expediente']; ?>);
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
<center><h2 id="up">CAPTURA DE EXAMENES REALIZADOS</h2></center>
<center>
<div class="info_gral">
<table style="width:100%;">
<tr>
<td><button onclick="agregarBuzon(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary">Enviar a buzón</button> </td>
<td><button onclick="incapacidad(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-bullhorn"></span> Incapacidad</button></td>
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
<form class="form" id="form_captura_examen" action="control/ctrl_examenes.php?e=guardarExamen" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id_paciente" value="<?php echo $_POST['id_expediente']; ?>"/>
<table class="table" style="width:100%">
<tr>
<td colspan="3"><label style="color:blue;">Nombre de Empleado: </label><?php echo $data['nombre_emp']; ?><br>
</td>
</tr>
<tr>
<td><label style="color:blue;">Fecha del Examen: </label>
<input type="date" class="form-control" name="fecha_examen" style="width:75%; text-align: center;" value="<?php echo date('Y-m-d'); ?>" required></td>
<td><label style="color:blue;">Tipo Examen:</label>
<select name="tipo_examen" class="form-control" id="cbo_tipo_examen" onchange="agregarTipoExamen(this.value);" required>
<?php 
$con = new Conexion();
$sql = "SELECT * FROM tipo_examen ORDER BY tipoexamen";
$datos = $con->select($sql);
echo "<option value='' >--Seleccione un Examen--</option>";
while($fila=mysqli_fetch_array($datos))
{
if(isset($_POST['selected']))
{
  if($fila['tipoexamen']==$_POST['selected'])
  {
    echo "<option value='".utf8_encode($fila['tipoexamen'])."' selected>".utf8_encode($fila['tipoexamen'])."</option>";
  }else{
    echo "<option value='".utf8_encode($fila['tipoexamen'])."'>".utf8_encode($fila['tipoexamen'])."</option>";
  }
}else{
  echo "<option value='".utf8_encode($fila['tipoexamen'])."' >".utf8_encode($fila['tipoexamen'])."</option>";
}
}
 ?>
 <option value="agregar">--Agregar otro--</option>
?>
</select>

</td>
<td><label style="color:blue;">Grupo:</label>
<select name="grupo_examen" class="form-control" id="cbo_grupo_examen" onchange="agregarGrupoExamen(this.value);" required>
<?php 
$con = new Conexion();
$sql = "SELECT * FROM grupo_examen ORDER BY grupo";
$datos = $con->select($sql);
echo "<option value='' >--Seleccione un grupo--</option>";
while($fila=mysqli_fetch_array($datos))
{
if(isset($_POST['selected']))
{
  if($fila['grupo']==$_POST['selected'])
  {
    echo "<option value='".utf8_encode($fila['grupo'])."' selected>".utf8_encode($fila['grupo'])."</option>";
  }else{
    echo "<option value='".utf8_encode($fila['grupo'])."'>".utf8_encode($fila['grupo'])."</option>";
  }
}else{
  echo "<option value='".utf8_encode($fila['grupo'])."' >".utf8_encode($fila['grupo'])."</option>";
}
}
 ?>
 <option value="agregar">--Agregar otra Causa--</option>
?>
</select>
</td></tr>

<tr>
  <td colspan="1">
  <label style="color:blue;">Resultado:</label>
    <select  name="resul_examen" class="form-control">
    <option value="">--Seleccione una opcion--</option>
    <option value="Negativo">Negativo</option><option value="Positivo">Positivo</option>
    </select>
  </td>
	<td colspan="2"><label style="color:blue;">Valores de Referencia:</label>
	<textarea name="lectura" class="form-control" required></textarea>
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
<th>Fecha de Examen</th>
<th>Tipo de Examen</th>
<th>Grupo</th>
<th>Resultados</th>
<th>Valores</th>
</tr>
<?php

$sql="SELECT * FROM examenes WHERE id_paciente=$id_expediente";
$datos = $con->select($sql);
while($fila=mysqli_fetch_array($datos))
echo '
  <tr>
  <td>'.$fila['fecha_examen'].'</td>
  <td>'.$fila['tipo_examen'].'</td>
  <td>'.$fila['grupo'].'</td>
  <td>'.$fila['resultados'].'</td>
  <td>'.$fila['lectura'].'</td>

  </tr>
  ';
  ?>

</table>
