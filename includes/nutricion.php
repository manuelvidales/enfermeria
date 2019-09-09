<!--Agrego esta parte para enviar a guardar los Datos en Tabla Control Salud -->
<script type="text/javascript">
$(function(){
  $("#form_nuevo_nutricion").submit(function(e){
    e.preventDefault();
    $.post('control/ctrl_controlsalud.php?e=guardarNutricion',$("#form_nuevo_nutricion").serialize(),function(data){
      swal('',data);
      nutricion(<?php echo $_POST['id_expediente']; ?>);
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
<center><h2 id="up">N U T R I C I O N</h2></center>
<center>
<div class="info_gral">
<table style="width:100%;">
<tr>
<td><button onclick="agregarBuzon(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary">Enviar a buzón</button> </td>
<td><button onclick="incapacidad(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-bullhorn"></span> Incapacidad</button></td>
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
<td><button onclick="abrirExpedienteALL(<?php echo $_POST['id_expediente']; ?>);"  class="btn btn-warning" style="">Cerrar</button> </td>
 </tr>
</table>
<br>
<form name="formularioNutricion"class="form" id="form_nuevo_nutricion" action="control/ctrl_controlsalud.php?e=guardarNutricion" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id_paciente" value="<?php echo $_POST['id_expediente']; ?>"/>
<table class="table" style="width:100%">
<tr>
<td colspan="3"><label style="color:blue;">Nombre de Empleado: </label><?php echo $data['nombre_emp']; ?><br>
</td>
</tr>
<tr>
<td><label style="color:blue;">Fecha de Captura</label>
<input type="date" class="form-control" name="fecha_captura" style="width:70%; text-align: center;" value="<?php echo date('Y-m-d'); ?>" required>
</td>
<td><label style="color:blue;">Peso:</label>
<input class="form-control" name="peso" placeholder="Ingrese Peso en Kgs." onKeyUp="calcularIMC()" required></td>
<td><label style="color:blue;">Talla:</label>
<input class="form-control" name="talla" placeholder="Ingrese Estatura Centimetros" onKeyUp="calcularIMC()" required ></td>
</tr>
<tr colspan="3">
<td><label style="color:blue;">Cintura:</label>
<input class="form-control" name="cintura" placeholder="Ingrese en Centimetros" required></td>
<td><label style="color:blue;">I.M.C.:</label><input class="form-control" name="imc" placeholder="Calculo automatico" required></td>
<td><label style="color:blue;">Grado Obesidad:</label><input class="form-control" name="gradoobesidad" placeholder="Calculo automatico" required></td>
</tr>
</table>
<input type="submit" class="btn btn-primary" value="Guardar" style="width:100%;">
</form>
</div>
</center>
<!--<table class="table table-hover">  -->
<table class="table" style="width:100%;">
<tr>
<th>Fecha</th>
<th>Peso</th>
<th>Estatura</th>
<th>Cintura</th>
<th>I.M.C.</th>
<th>Grado</th>
</tr>
<?php

$sql="SELECT * FROM nutricion WHERE id_paciente=".$id_expediente;
$datos = $con->select($sql);
while($fila=mysqli_fetch_array($datos))
echo '
  <tr>
  <td>'.$fila['fecha_captura'].'</td>
  <td>'.$fila['peso'].'</td>
  <td>'.$fila['talla'].'</td>
  <td>'.$fila['cintura'].'</td>
  <td>'.$fila['imc'].'</td>
  <td>'.$fila['gradoobesidad'].'</td>
  </tr>';
  ?>
</table>
<script type="text/javascript">
/*Se Automatiza el Calculo del IMC dentro de NUTRICION antes de guardar*/
function calcularIMC() {
   var peso = document.formularioNutricion.peso.value;
   var talla = document.formularioNutricion.talla.value;
   try{
      //Calculamos el número escrito:
      peso = (isNaN(parseInt(peso)))? 0 : parseInt(peso);
      talla = (isNaN(parseInt(talla)))? 0 : parseInt(talla);
      estatura = talla/100; //convertimos talla de CMS a Metros
       document.formularioNutricion.imc.value = peso/(estatura*estatura);
   }
   //Si se produce un error no hacemos nada
   catch(e) {}
  //Para mostrar el GRADO de Obesidad dependiendo del resultado del IMC.
  var imc = document.formularioNutricion.imc.value;
  if (imc >= 40)
  {
    document.formularioNutricion.gradoobesidad.value ="OBESIDAD III";
  }
  else if (imc >=30 && imc <= 39.9)
  {
    document.formularioNutricion.gradoobesidad.value ="OBESIDAD II";
  }
  else if (imc >=27 && imc <=29.9)
  {
    document.formularioNutricion.gradoobesidad.value ="OBESIDAD I";
  }
  else if (imc >=25 && imc <=26.9)
  {
    document.formularioNutricion.gradoobesidad.value ="SOBREPESO";
  }
  else if (imc >=18 && imc <=24.9)
  {
    document.formularioNutricion.gradoobesidad.value ="NORMAL";
  }
  else if (imc >=0 && imc <=17.9)
  {
    document.formularioNutricion.gradoobesidad.value ="BAJO DE PESO";
  }
}
</script>
