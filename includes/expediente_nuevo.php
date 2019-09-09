<?php date_default_timezone_set('America/Mexico_City'); ?>
<script type="text/javascript">
$(function(){

	$("#form_nuevo_expediente").submit(function(e){
    e.preventDefault();
    $.post('control/ctrl_expediente.php?e=Expedientenuevo',$("#form_nuevo_expediente").serialize(),function(data){
      var json = JSON.parse(data);
      if(json.error>0)
      {
      	swal('Aviso',);
      	console.log(json.msg);
      }else{
      	swal({
      	  html:false,	
		  title: "Aviso",
		  text: json.msg,
		  showCancelButton: true,
		  confirmButtonClass: "btn-primary",
		  confirmButtonText: "Enviar",
		  cancelButtonText:"No-Buzón",
		  closeOnConfirm: true
		},
		function(){
		  agregarBuzon(json.insert_id);
		});
      }
      expediente_editar(json.insert_id);
      //abrirExpedienteALL(json.insert_id);
      //window.open("control/conexion.php?e=exportarBD");
      //window.open("control/lista_excel.php");
      //$("#form_nuevo_paciente")[0].reset();
      });
  	});
});
</script>

<center><h2 id="up">NUEVO EXPEDIENTE (seccion I)</h2></center>

<form class="form" id="form_nuevo_expediente">
<label>Fecha Expediente:</label>
<input type="date" class="form-control" name="fecha_reg" style="width:20%; text-align: center;" value="<?php echo date('Y-m-d'); ?>" >
<br>
<table class="table" style="width:100%">
<tr><td colspan="4" style="text-align:center;"><label><span class="texto-colorfondo">I.-INFORMACION GENERAL</span></label></td>
</tr>

<tr>
<td colspan="1">
<label>Nombre Empleado</label>
<select name="nombre_emp" class="form-control" id="cbo_nom_emp_nuevo" required>
  <?php include "options_empleados.php"; ?>
</select></td>
<td colspan="1">
<label>No. Seguro Social</label>
<input type="text"  name="imss" class="form-control" placeholder="NSS" required>
</td>
<td colspan="1">
<label>Grupo y RH</label>
<input type="text"  name="tipo_sangre" class="form-control" placeholder="tipo de sangre" required>
</td>
</tr>

<tr>
<td colspan="1">
<label>Sexo</label>
<select  name="sex_paci" class="form-control">
<option value="Masculino">Hombre</option><option value="Femenino">Mujer</option>
</select>
</td>
<td colspan="1">
<label>Fecha de nacimiento</label>
<input type="date" name="naci_paci" id="cbo_fecha_nacimiento" style="border:solid 3px green" onchange="calcularEdad(this.value);"  class="form-control" required>
</td>
<td colspan="1">
<label>Edad</label>
<input type="number" name="edad_paci" id="txt_edad_generar" class="form-control" placeholder="Calculo automatico">
</td>
</tr>
<tr><td colspan="4"><h6>**Si el campo edad se encuentra vacio, el sistema calculará la edad automáticamente...</h6></td></tr>
<tr>
<td colspan="1">
<label>Lugar de nacimiento</label>
<input type="text"  name="lugar_paci" class="form-control" >
<!--
<select name="lugar_paci" class="form-control" required>
<?php // include 'options_estados_republica.php'; ?>
</select> -->

</td>
<td colspan="1">
  <label>Religión</label>
<select name="reli" class="form-control" id="cbo_religion_nuevo" onchange="agregarReligion(this.value);" required>
<?php include "options_religiones.php"; ?></select></td>
</td>
<td colspan="1">
<label>Estado civil</label>
<select name="edo_civ" class="form-control" id="cbo_edo_civ_nuevo" onchange="agregarEdoCiv(this.value);" required>
<?php include "options_edo_civil.php"; ?>
</select></td></tr>
<tr>
<td colspan="1">
<label>Teléfono de casa</label>
<input type="text"  name="tel_cas" class="form-control" >
</td>
<td colspan="1">
<label>Teléfono celular</label>
<input type="text"  name="tel_cel" class="form-control" >
</td>
</tr>
</table>


<table class="table" style="width:100%">
<tr><td colspan="3" style="text-align:center;"><label><span class="item-subtitle">**Domicilio Actual**</span></label></td></tr>
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
<input type="text"  name="col" class="form-control" >
</td>
</tr>
<tr>
<td>
<label>Calle</label>
<input type="text"  name="calle" class="form-control" >
</td>
<td>
<label>Número Ext</label>
<input type="text"  name="no_ext" class="form-control" >
</td>
<td>
<label>Número Int</label>
<input type="text"  name="no_int" class="form-control" >
</td>
</tr>
</table>

<table class="table" style="width:100%;">
<tr><td colspan="2" style="text-align:center;"><span class="item-subtitle">**Contacto en caso de emergencia**</span></td></tr>
<tr>
<td colspan="2">
<label>Nombre</label>
<input type="text"  name="nom_cont" class="form-control">
</td>
</tr>
<tr>
<td>
<label>Parentezco</label>
<input type="text"  name="par_cont" class="form-control">
</td>
<td>
<label>Teléfono</label>
<input type="text"  name="tel_cont" class="form-control">
</td>
</tr>
</table>
<input type="submit" class="btn btn-primary" value="Guardar Expediente" style="width:100%;">
</form>
<!--Este JS es para cargar automatico los Municipios Segun el Estado que Seleccione Primero -->
    <script type="text/javascript" src="js/municipios.js"></script>
    <script type="text/javascript" src="js/select_estados.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
          $('select').material_select();
        });
    </script>
