<?php date_default_timezone_set('America/Mexico_City'); ?>
<script type="text/javascript">
$(function(){
	$("#frm_nueva_consulta").submit(function(e){
    e.preventDefault();
    $.post('control/ctrl_consulta.php?e=nuevaConsulta',$("#frm_nueva_consulta").serialize(),function(data){
     	var json = JSON.parse(data);
     	swal('Aviso',json.msj);
     	abrirExpediente(json.id_expediente);
     	//window.open("control/conexion.php?e=exportarBD");
      //window.open("control/lista_excel.php");
        window.location.reload();
      });
  	});
  	$("#txt_contenedor_evoluciones").scrollTop($('#txt_contenedor_evoluciones')[0].scrollHeight);
});
</script>
<div style="background-color:white;padding:10px;">
<?php 
include "../control/conexion.php";
include "../control/ctrl_expediente.php";
$con = new Conexion();
$sql = "SELECT * FROM paciente WHERE id_paciente=".$_GET['id_expediente'];
$datos = $con->select($sql);
$data;//datos del paciente
if($fila=mysqli_fetch_array($datos)) $data = $fila;

$sql = "SELECT count(*) as num_cons FROM consulta WHERE id_paciente=".$_GET['id_expediente'];
$datos = $con->select($sql);
$num_cons;//total de consultas
if($fila=mysqli_fetch_array($datos)) $num_cons = $fila['num_cons'];

$sql = "SELECT count(*) as num_pase FROM consulta WHERE pase_cons = '".$data['pase_id']."'";
$datos = $con->select($sql);
$num_pase;
if($fila=mysqli_fetch_array($datos)) $num_pase = $fila['num_pase'];
 ?>

 <table style="width:100%;">
<tr>
<td> <button onclick="agregarBuzon(<?php echo $_GET['id_expediente']; ?>);" class="btn btn-primary" style="">Enviar a buzón</button> </td>
<td> <button onclick="informacionGral(<?php echo $_GET['id_expediente']; ?>);" class="btn btn-primary" style="">Información Gral</button> </td>
<?php 
session_start();
if($_SESSION['tipo_usu']=='Admin')
{
  if($num_cons<=0)
  {
      echo'
  <td> <button onclick="iniciarConsulta('.$_GET['id_expediente'].');" class="btn btn-primary" style="">Iniciar consulta</button> </td>
  <td> <button onclick="consultas('.$_GET['id_expediente'].');"  class="btn btn-primary" style="">Consultas</button> </td>
  <td> <button onclick="archivos('.$_GET['id_expediente'].');"  class="btn btn-primary" style="">Archivos</button> </td>';
  }else{
    echo'
  <td> <button onclick="iniciarConsulta('.$_GET['id_expediente'].');" class="btn btn-primary" style="">Iniciar consulta</button> </td>
  <td> <button onclick="historiaClinica('.$_GET['id_expediente'].');" class="btn btn-primary" style="">Historia clínica</button> </td>
  <td> <button onclick="consultas('.$_GET['id_expediente'].');"  class="btn btn-primary" style="">Consultas</button> </td>
  <td> <button onclick="archivos('.$_GET['id_expediente'].');"  class="btn btn-primary" style="">Archivos</button> </td>';
  }
  
}
echo '<td> <button onclick="cerrarExpediente();"  class="btn btn-primary" style="">Cerrar expediente</button> </td>';
 ?>
 </tr>
</table>

<br><br>
 <?php 
 if($num_cons<=0)
 {
 	echo '<center><h2>PRIMER CONSULTA MÉDICA</h2></center>';
 	$tipo_consulta="primera";
 }else{
 	echo '<center><h2>CONSULTA MÉDICA SUBSECUENTE</h2></center>';
 	$tipo_consulta="subsecuente";
 }
 ?>
<form class="form" id="frm_nueva_consulta">
<input type="hidden" name="tipo_consulta" value="<?php echo $tipo_consulta;?>">
<input type="hidden" name="id_paciente" value="<?php echo $_GET['id_expediente'];?>">
<input type="hidden" name="pase_cons" value="<?php echo $data['pase_id'];?>">
<h3>INFORMACIÓN BÁSICA</h3>
<table class="table" style="width:100%;">
<tr>
<td>
<label>N° de expediente: </label> <?php echo $data['id_paciente']; ?>
</td>
<td>
<label>N° de consulta: </label> <?php echo ($num_cons+1); ?>
<input type="hidden" name="no_cons" value="<?php echo ($num_cons+1); ?>">
</td>
<td>
<label>Fecha: </label> <input type="date" class="form-control" style="30%;" name="fecha_cons" value="<?php echo date('Y-m-d'); ?>">
</td>
</tr>
<tr>
<td>
<label>Nombre: </label> <?php echo $data['nombre_emp']; ?>
</td>
<td>
<label>A. Paterno: </label> <?php echo $data['paterno_paci']; ?>
</td>
<td>
<label>A. Materno: </label> <?php echo $data['materno_paci']; ?>
</td>
</tr>
<tr>
<td>
<label>Sexo: </label> <?php echo $data['sex_paci']; ?>
</td>
<td>
<label>Fecha de nacimiento: </label> <?php echo $data['naci_paci']; ?>
</td>
<td>
<label>Edad: </label><input type="number" name="edad_cons" value="<?php echo calcularEdad($data['naci_paci']); ?>" required>
</td>
</tr>
</table>
<label>Pase: </label><?php echo $data['pase_id']; ?> <label>Usado: </label><?php echo $num_pase; ?> de <?php echo $data['pase_tot']; ?>
<center><h3>DATOS PARA LA HISTORIA CLÍNICA</h3>
</center>

<table class="table" style="width:100%;">
<tr>
<td>
<label>Peso (kg)</label><br>
<input type="text" name="hc_peso" class="form_control" value="<?php echo $data['hc_peso']; ?>" />
</td>
<td>
<label>Talla (m,cm)</label><br>
<input type="text" name="hc_talla" class="form_control" value="<?php echo $data['hc_talla']; ?>" />
</td>
<td>
<label>T.A.</label><br>
<input type="text" name="hc_ta" class="form_control" value="<?php echo $data['hc_ta']; ?>" />
</td>
</tr>
<tr>
<td>
<label>F.C. /min</label><br>
<input type="text" name="hc_fc" class="form_control" value="<?php echo $data['hc_fc']; ?>" />
</td>
<td>
<label>F.R. /min</label><br>
<input type="text" name="hc_fr" class="form_control" value="<?php echo $data['hc_fr']; ?>" />
</td>
<td>
<label>Temperatura °C</label><br>
<input type="text" name="hc_tem" class="form_control" value="<?php echo $data['hc_tem']; ?>" />
</td>
</tr>
</table>
<?php if ($data['sex_paci']=='M'): ?>
<?php 
if($num_cons<=0)
{
	$enable="";
	$name="fum_cons";
}else{
	$enable="disabled";
	$name="x";
}
 ?>
<label>Fecha última de menstruación: </label>
<input type="date" name="<?php echo $name; ?>" class="form_control" value="<?php echo $data['hc_fum']; ?>"<?php echo $enable ?>/>
<br><br>
<?php endif ?>

<table class="table" style="width:100%;">
<tr>
<td>
<label>Antecedentes familiares</label><br>
<textarea class="form-control" name="hc_ant_fam">
<?php echo $data['hc_ant_fam']; ?>
</textarea>
</td>
</tr>
<tr>
<td>
<label>Antecedentes personales no patológicos</label><br>
<textarea class="form-control" name="hc_ant_per_no_p">
<?php echo $data['hc_ant_per_no_p']; ?>
</textarea>
</td>
</tr>
<tr>
<td>
<label>Antecedentes personales patológicos</label><br>
<textarea class="form-control" name="hc_ant_per_p">
<?php echo $data['hc_ant_per_p']; ?>
</textarea>
</td>
</tr>
<tr>
<td>
<label>Padecimiento actual</label><br>
<textarea rows="9" class="form-control" name="hc_pad">
<?php echo $data['hc_pad']; ?>
</textarea>
</td>
</tr>
<tr>
<td>
<label>Exploracion fisica</label><br>
<textarea rows="6" class="form-control" name="hc_exp_fis">
<?php echo $data['hc_exp_fis']; ?>
</textarea>
</td>
</tr>
<tr>
<td>
<label>Otros datos</label><br>
<textarea class="form-control" name="hc_otros">
<?php echo $data['hc_otros']; ?>
</textarea>
</td>
<td>
</tr>
<tr>
<td>
<label>RX</label><br>
<textarea rows="6" class="form-control" name="hc_rx">
<?php echo $data['hc_rx']; ?>
</textarea>
</td>
</tr>
<tr>
<td>
<label>Diagnóstico (DX)</label><br>
<textarea rows="5" class="form-control" name="hc_dx">
<?php echo $data['hc_dx']; ?>
</textarea>
</td>
</tr>
<tr>
<td>
<label>Tratamiento (TX)</label><br>
<textarea rows="5" class="form-control" name="hc_tx">
<?php echo $data['hc_tx']; ?>
</textarea>
</td>
</tr>
</table>
<?php if ($num_cons>0): ?>
<center> <h3>EVOLUCIONES ANTERIORES</h3> </center>

<div id="txt_contenedor_evoluciones" style="width:100%;padding:5px;height:500px;overflow:scroll;overflow-x:hidden;">
<table class="table" style="width:100%;">
<?php 
$sql="SELECT * FROM consulta WHERE id_paciente=$_GET[id_expediente] AND no_evo > 0 ORDER BY no_evo ASC";
$datos = $con->select($sql);
$contador=0;
while ($fila=mysqli_fetch_array($datos)) {
	$fecha = explode('-', $fila['fecha_cons']);
	$fecha = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];
	echo '<tr><td>
			<label>Evolución n° '.$fila['no_evo'].' ('.$fecha.')</label><br>
			<textarea rows="5" class="form-control" readonly>'.$fila['desc_evo'].'</textarea>
		</td></tr>';
		$contador++;
}
if($contador<=0)echo '<center>Aún no hay evoluciones</center>';
 ?>
</table>
</div>
<br>
<table class="table" style="width:100%;">
<tr>
<td> <label>Evolución N°: </label><?php echo $contador+1; ?></td>
<input type="hidden" name="no_evo" value="<?php echo $contador+1; ?>">
<?php if ($data['sex_paci']=='M'): ?>
<td> <label>Fecha de última menstruación: </label><input type="date" class="form-control" style="width:40%;" name="fum_cons" value="<?php echo $data['hc_fum']; ?>"></td>	
<?php endif ?>

</tr>
<tr>
<td colspan="2">
<label>Descripción</label>
<textarea rows="5" class="form-control" name="desc_evo"></textarea>
</td>
</tr>
</table>
<?php endif ?>
<input type="submit" class="btn btn-primary" style="width:100%;" value="Guardar consulta">
</form>
</div>
