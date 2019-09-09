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
//$sql = "SELECT count(*) as num_cons FROM consulta WHERE id_paciente=".$_POST['id_expediente'];
//$datos = $con->select($sql);
//$num_cons;
//if($fila=mysqli_fetch_array($datos)) $num_cons = $fila['num_cons'];
?>
<center><h2 id="up">EDICION DE EXPEDIENTE</h2></center>
<center>
<div class="info_gral">
<table style="width:100%;">
<tr>
<td><button onclick="seccion2(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion II</button></td>
<td><button onclick="seccion3(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion III</button></td>
<td><button onclick="seccion4(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion IV</button></td>
<td><button onclick="seccion5(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion V</button></td>
<td><button onclick="seccion6(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion VI</button></td>
<td><button onclick="seccion7(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion VII</button></td>
<td><button onclick="seccion8(<?php echo $_POST['id_expediente']; ?>);" class="btn btn-primary"><span class="icon-pencil"></span> Seccion VIII</button></td>
<td> <button onclick="abrirExpedienteALL(<?php echo $_POST['id_expediente']; ?>);"  class="btn btn-warning" style="">Cerrar</button> </td>
</tr>
</table>

<form class="form" id="form_actualizar_expediente">
<input type="hidden" name="id_paciente" value="<?php echo $data['id_paciente']; ?>">
<br>
<label> Estatus del expediente:</label><span class="item-subtitle">
<?php 
if($data['edo_exp']=="Activo")
{
  $edo_exp_activo="selected";
  $edo_exp_inactivo="";
}else{
  $edo_exp_activo="";
  $edo_exp_inactivo="selected";
}
?>
<select name="edo_exp" style="border:none;">
<option value="Activo" <?php echo $edo_exp_activo; ?> >Activo</option>
<option value="Inactivo" <?php echo $edo_exp_inactivo; ?> >Inactivo</option>
</select></span>
<br>
<label>Fecha de registro: <?php echo $data['fecha_reg']; ?> </label><br>

<table class="table" style="width:100%">
<tr><td colspan="4" style="text-align:center;"><label><span class="texto-colorfondo">I.- INFORMACION GENERAL</span></label></td>
<tr>
<td colspan="2"><label>Nombre Completo</label>
<input type="text" name="nombre_emp" value="<?php echo $data['nombre_emp']; ?>" class="form-control" required>
</td>
<td colspan="1">
<label>IMSS</label>
<input type="text" name="imss" value="<?php echo $data['imss']; ?>" class="form-control" required>
</td>
<td colspan="1">
<label>GRUPO y RH</label>
<input type="text" name="tipo_sangre" value="<?php echo $data['tipo_sangre']; ?>" class="form-control">
</td>
</tr>
<tr>
<td colspan="1">
<label>Sexo</label>
<?php 
if($data['sex_paci']=='H'){
  $sex_paci_h = "selected";
  $sex_paci_m = "";
}else{
  $sex_paci_h = "";
  $sex_paci_m = "selected";
}
 ?>
<select  name="sex_paci" class="form-control">
<option value="Masculino" <?php echo $sex_paci_h; ?>>Masculino</option><option value="Femenino" <?php echo $sex_paci_m; ?>>Femenino</option>
</select>
</td>
<td colspan="1">
<label>Fecha de nacimiento</label>
<input type="date" name="naci_paci" value="<?php echo $data['naci_paci']; ?>" class="form-control" required>
</td>
<td colspan="0.5">
<label>Edad</label>
<input type="number" name="edad_paci" value="<?php echo $data['edad_paci']; ?>" class="form-control">
</td>
<td colspan="1">
<label>Lugar de nacimiento</label>
<select name="lugar_paci" id="cbo_lugar_paci" class="form-control" required>
<?php include 'options_estados_republica.php'; ?>
</select>
</td>
</tr>
<tr>
<td colspan="1">
<label>Religión</label>
<select name="reli" class="form-control" id="cbo_religion_nuevo" onchange="agregarReligion(this.value);" required>
<?php
$con = new Conexion();
$sql = "SELECT * FROM religion ORDER BY religion";
$datos = $con->select($sql);
echo "<option value='' >--Seleccione religión--</option>";
while($fila=mysqli_fetch_array($datos))
{
if(isset($_POST['selected']))
{
  if($fila['religion']==$_POST['selected'])
  {
    echo "<option value='".utf8_encode($fila['religion'])."' selected>".utf8_encode($fila['religion'])."</option>";
  }else{
    echo "<option value='".utf8_encode($fila['religion'])."'>".utf8_encode($fila['religion'])."</option>";
  }
}else{
  echo "<option value='".utf8_encode($fila['religion'])."' >".utf8_encode($fila['religion'])."</option>";
}
}
 ?>
 <option value="agregar">--Agregar religión--</option>
?>
</select>
</td>
<td colspan="1">
<label>Estado civil</label>
<select name="edo_civ" class="form-control" id="cbo_edo_civ_nuevo" onchange="agregarEdoCiv(this.value);" required>
<?php 
$con = new Conexion();
$sql = "SELECT * FROM edo_civil ORDER BY edo_civil";
$datos = $con->select($sql);
echo "<option value='' >--Seleccione estado civil--</option>";
while($fila=mysqli_fetch_array($datos))
{
if(isset($_POST['selected']))
{
  if($fila['edo_civil']==$_POST['selected'])
  {
    echo "<option value='".utf8_encode($fila['edo_civil'])."' selected>".utf8_encode($fila['edo_civil'])."</option>";
  }else{
    echo "<option value='".utf8_encode($fila['edo_civil'])."'>".utf8_encode($fila['edo_civil'])."</option>";
  }
}else{
  echo "<option value='".utf8_encode($fila['edo_civil'])."' >".utf8_encode($fila['edo_civil'])."</option>";
}
}
 ?>
 <option value="agregar">--Agregar estado civil--</option>
?>
</select>
</td>
<td>
<label>Teléfono de casa</label>
<input type="text"  name="tel_cas" value="<?php echo $data['tel_cas']; ?>" class="form-control" >
</td>
<td>
<label>Teléfono celular</label>
<input type="text"  name="tel_cel" value="<?php echo $data['tel_cel']; ?>" class="form-control" >
</td>
</tr>
</table>

<table class="table" style="width:100%">
<tr><td colspan="3" style="text-align:center;"><span class="item-subtitle">**Domicilio Actual**</span></td></tr>
<tr>
<td>
<label>Estado</label>
<select id="estado" name="edo_dir" class="form-control" required></select>
</td>
<td>
<label>Municipio</label>
<select id="municipio" name="mun" class="form-control" required> </select>
</td>
<td>
<label>Colonia</label>
<input type="text"  name="col" value="<?php echo $data['col']; ?>" class="form-control" >
</td>
</tr>
<tr>
<td>
<label>Calle</label>
<input type="text"  name="calle" value="<?php echo $data['calle']; ?>" class="form-control" >
</td>
<td>
<label>Número Ext</label>
<input type="text"  name="no_ext" value="<?php echo $data['no_ext']; ?>" class="form-control" >
</td>
<td>
<label>Número Int</label>
<input type="text"  name="no_int" value="<?php echo $data['no_int']; ?>" class="form-control" >
</td>
</tr>
</table>

<table class="table" style="width:100%;">
<tr><td colspan="2" style="text-align:center;"><span class="item-subtitle">**Contacto en caso de emergencia**</span></td></tr>
<tr>
<td colspan="2">
<label>Nombre</label>
<input type="text"  name="nom_cont" value="<?php echo $data['nom_cont']; ?>"class="form-control">
</td>
</tr>
<tr>
<td>
<label>Parentezco</label>
<input type="text"  name="par_cont" value="<?php echo $data['par_cont']; ?>"class="form-control">
</td>
<td>
<label>Teléfono</label>
<input type="text"  name="tel_cont" value="<?php echo $data['tel_cont']; ?>"class="form-control">
</td>
</tr>
</table>

<input type="submit" class="btn btn-primary" value="Guardar cambios" style="width:100%;">
</form>
</div>
</center>

<script type="text/javascript">
$(document).ready(function(){
  $("#cbo_lugar_paci").prop('value','<?php echo $data["lugar_paci"]; ?>');
  $("#cbo_religion_nuevo").prop('value','<?php echo $data["reli"]; ?>');
  $("#cbo_edo_civ_nuevo").prop('value','<?php echo $data["edo_civ"]; ?>');
  $("#estado").prop('value','<?php echo $data["edo_dir"]; ?>');
  $("#municipio").prop('value','<?php echo $data["mun"]; ?>');
  $("#form_actualizar_expediente").submit(function(e){
    e.preventDefault();
    $.post('control/ctrl_expediente.php?e=actualizarExpediente',$("#form_actualizar_expediente").serialize(),function(data){
      swal('',data);
      abrirExpedienteALL(<?php echo $_POST['id_expediente']; ?>);

    });
  });
});

</script>
    <script type="text/javascript" src="js/municipios.js"></script>
    <script type="text/javascript" src="js/select_estados.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
          $('select').material_select();
        });
    </script>
</tr></table></form></div></center>
