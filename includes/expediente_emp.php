 <?php 
include "../control/conexion.php";
$con = new Conexion();
$sql = "SELECT * FROM paciente WHERE id_paciente=".$_GET['id_expediente'];
$datos = $con->select($sql);
$data;
if($fila=mysqli_fetch_array($datos)) $data = $fila;
//ESTO PARA QUE FUNCIONE EL TIPO DE USUARIO CON LA VARIABLE $_SESSION
$sql = "SELECT count(*) as num_cons FROM consulta WHERE id_paciente=".$_GET['id_expediente'];
$datos = $con->select($sql);
$num_cons;
if($fila=mysqli_fetch_array($datos)) $num_cons = $fila['num_cons'];
//TERMINA
?>
<center><h2 id="up">EXPEDIENTE DE EMPLEADO</h2></center>
<div class="expediente">
<!--MENU DEL EXPEDIENTE-->
<table style="width:110%;">
<tr>
<td> <button onclick="agregarBuzon(<?php echo $_GET['id_expediente']; ?>);" class="btn btn-primary">
<span class="icon-bell"></span> Enviar a buzón</button> </td>
<td> <button onclick="expediente_editar(<?php echo $_GET['id_expediente']; ?>);" class="btn btn-primary"> <span class="icon-pencil"></span>Editar Expediente</button> </td>
<td><button onclick="incapacidad(<?php echo $_GET['id_expediente']; ?>);" class="btn btn-primary">
<span class="icon-bullhorn"></span> Incacidad</button> </td>
<td> <button onclick="examen_pruebas(<?php echo $_GET['id_expediente']; ?>);" class="btn btn-primary">
<span class="icon-lab"></span> Examenes</button> </td>
<td> <button onclick="controlsalud(<?php echo $_GET['id_expediente']; ?>);" class="btn btn-primary">
<span class="icon-heart"></span> Control Salud</button> </td>
<?php 
//ESTO ME SIRVE PARA SEGUIR TRAYENDO EL TIPO DE USUARIO EN SESION ACTUAL
//Y PODER CONDICIONAR LO QUE PUEDE VER EN "Archivos" SEGUN SEA UN USUARIO o ADMIN
session_start();
if($_SESSION['tipo_usu']=='Admin')
{  
	echo '
<td><button onclick="archivosadmin('.$_GET['id_expediente'].');"  class="btn btn-primary">
<span class="icon-books"></span> Archivos</button></td>';
}
      else {
      	echo '<td> <button onclick="archivosusuario('.$_GET['id_expediente'].');"  class="btn btn-primary">
<span class="icon-books"></span> Archivos</button></td>'; 
      		}
?>
<td> <button onclick="catalogo();"  class="btn btn-warning" style="">Cerrar</button> </td>
 </tr>
</table>
<!--termina MENU DEL EXPEDIENTE-->
<br><center><a href="../enfermeria/includes/reportespdf/expedienteempleado.php?id=<?php echo $_GET['id_expediente']; ?>" target="popup" onClick="window.open(this.href, this.target, 'width=860px,height=690px'); return false;"><img src="image/pdf.png" style="width:4%;height:4%"></a></center>

<table class="table" style="width:100%">
<tr>
<td style="padding:1.5px;" colspan="1"><label style="color:blue;float:right;">Estado: </label> </td>
<td colspan="1"> <label style="float:left;"><?php echo $data['edo_exp']; ?></label></td>
<td colspan="4"></td>
</tr>
<tr>
<td style="padding:2px;" colspan="1"><label style="color:blue;float:right;">No. Expediente: </label> </td>
<td colspan="1"> <label style="padding:2px; float:left;"> <?php echo $data['id_paciente'];?></label></td>
<td colspan="4"></td>
</tr>
<tr>
<td style="padding:0.5px;" colspan="1"><label style="color:blue;float:right;">Nombre: </label></td>
<td colspan="2"><label style="float:left;"> <?php echo $data['nombre_emp']; ?></label></td>
<td style="padding:0.5px;" colspan="1"><label style="color:blue;float:left">IMSS:</label>
<label style="float:right;"><?php echo $data['imss']; ?></label></td>
<td style="padding:0.5px;" colspan="1"><label style="color:blue;float:right">Grupo y RH: </label></td>
<td colspan="1"><label style="float:left;"><?php echo $data['tipo_sangre']; ?></label></td>
</tr>
<tr>
<td style="padding:1px;"><label style="color:blue;float:right">Sexo: </label></td>
<td><?php echo $data['sex_paci']; ?></td>
<td style="padding:1px;"><label style="color:blue;float:right"> Fecha Nacimiento: </label></td>
<td><?php echo $data['naci_paci']; ?></td>
<td style="padding:1px;"><label style="color:blue;float:right"> Edad: </label></td>
<td><?php echo $data['edad_paci']; ?></td>
</tr>
<tr>
<td style="padding:1.5px;"><label style="color:blue;float:right">Lugar Nacimiento: </label></td>
<td><?php echo $data['lugar_paci']; ?></td>
<td style="padding:1.5px;"><label style="color:blue;float:right"> Religion: </label></td>
<td><?php echo $data['reli']; ?></td>
<td style="padding:1.5px;"><label style="color:blue;float:right"> Estado Civil: </label></td>
<td><?php echo $data['edo_civ']; ?></td>
</tr>

<tr>
<td style="padding:1.5px;"><label style="color:blue;float:right">Teléfono de casa: </label></td>
<td><?php echo $data['tel_cas']; ?></td>
<td style="padding:1.5px;"><label style="color:blue;float:right"> Teléfono de Celular: </label></td>
<td><?php echo $data['tel_cel']; ?></td>
<td colspan="2"></td>
</tr>

<tr>
<td style="padding:1.5px;"><label style="color:blue;float:right">Estado: </label></td>
<td><?php echo $data['edo_dir']; ?></td>
<td style="padding:1.5px;"><label style="color:blue;float:right"> Municipio: </label></td>
<td><?php echo $data['mun']; ?></td>
<td style="padding:1.5px;"><label style="color:blue;float:right"> Colonia: </label></td>
<td><?php echo $data['col']; ?></td>
</tr>

<tr>
<td style="padding:1.5px;"><label style="color:blue;float:right">Calle: </label></td>
<td><?php echo $data['calle']; ?></td>
<td style="padding:1.5px;"><label style="color:blue;float:right"> No. Exterior: </label></td>
<td><?php echo $data['no_ext']; ?></td>
<td style="padding:1.5px;"><label style="color:blue;float:right"> No. Interior: </label></td>
<td><?php echo $data['no_int']; ?></td>
</tr>

<tr><td colspan="6" style="text-align:center;color:blue">**Contacto en caso de emergencia**</td></tr>

<tr>
<td style="padding:1.5px;"><label style="color:blue;float:right">Nombre de Contacto: </label></td>
<td><?php echo $data['nom_cont']; ?></td>
<td style="padding:1.5px;"><label style="color:blue;float:right"> Parentezco: </label></td>
<td><?php echo $data['par_cont']; ?></td>
<td style="padding:1.5px;"><label style="color:blue;float:right"> Telefono: </label></td>
<td><?php echo $data['tel_cont']; ?></td>
</tr>
</table>

<table class="table" style="width:100%">
<tr><td colspan="5" style="text-align:center;" class="texto-colorfondo">II.-ANTECEDENTES PERSONALES</td></tr>
<tr><td colspan="5" style="color:blue;"><label> A)¿Padece Actualmente Alguna Enfermedad?</label></td></tr>
<tr>
<td><?php echo $data['enfermedad']; ?></td>
</tr>
<td style="padding:1.5px;" colspan="1"><label style="color:blue;"> Otros:  </label></td>
<td colspan="4"><?php echo $data['otro_opc_a']; ?></td>
</tr>

<tr>
<td style="padding:1.5px;" colspan="3"><label style="color:blue;float:left;"> B) En los Ultimos 12 meses, ¿Ha Consultado algun medico?: </label></td>
<td colspan="2"><?php echo $data['pers_opc_b']; ?></td>
</tr>

<tr>
<td style="padding:1.5px;" colspan="3"><label style="color:blue;float:left;"> C) ¿Esta Usted Sujeto a un Tratamiento Medico?:
</label></td>
<td colspan="2"><?php echo $data['pers_opc_c']; ?></td>
</tr>
<!--  Esta pregunta no estaba mostrada se agrego porque falto-->
<tr>
<td style="padding:1.5px;" colspan="3">
<label style="color:blue;float:left;">En caso Afirmativo, cual es el Tratamiento?</label></td>
<td colspan="2"><?php echo $data['pers_opc_ccual']; ?></td>
</tr>
<!-- FIN de la pregunta que falto-->
</table>

<table class="table" style="width:100%">
<tr><td colspan="4" style="text-align:center;" class="texto-colorfondo">III.-ANTECEDENTES PATOLOGICOS FAMILIARES</td></tr>

<tr><td colspan="4" style="color:blue;"><label> A)¿En su Familia casos de?</label></td></tr>
<tr>
<td><?php echo $data['antecedfami']; ?></td>
</tr>
	<!-- SE GAREGA ESTA PARTE NO EXISTIA  -->
<tr><td colspan="4" style="color:blue;"><label> En caso afirmativo: ¿Quien de sus Familiares?:</label></td></tr>
<tr><td><?php echo $data['antecedfamquien']; ?></td>
</tr>
	<!-- FIN  -->

</table>

<table class="table" style="width:100%">
<tr><td colspan="4" style="text-align:center;" class="texto-colorfondo">IV.-HISTORIA FAMILIARES</td></tr>

<tr><td colspan="2" style="color:blue;"><label> PARENTESCO:</label></td></tr>
<tr>
<td style="padding:1.5px;"><label style="color:blue;float:right">A) Padre?: </label></td>
<td><?php echo $data['padre_vive']; ?></td>
<td style="padding:1.5px;"><label style="color:blue;float:right"> Edad: </label></td>
<td><?php echo $data['padre_edad']; ?></td>
</tr>

<tr>
<td style="padding:1.5px;"><label style="color:blue;float:right">B) Madre?: </label></td>
<td><?php echo $data['madre_vive']; ?></td>
<td style="padding:1.5px;"><label style="color:blue;float:right"> Edad: </label></td>
<td><?php echo $data['madre_edad']; ?></td>
</tr>

<tr>
<td style="padding:1.5px;"><label style="color:blue;float:right">C) Hermanos?: </label></td>
<td><?php echo $data['hermanos']; ?></td>
<td style="padding:1.5px;"><label style="color:blue;float:right"> Cantidad: </label></td>
<td><?php echo $data['hermanos_cant']; ?></td>
</tr>

<tr>
<td style="padding:1.5px;"><label style="color:blue;float:right">D) Conyuge?: </label></td>
<td><?php echo $data['conyu_si']; ?></td>
<td style="padding:1.5px;"><label style="color:blue;float:right"> Edad: </label></td>
<td><?php echo $data['conyu_edad']; ?></td>
</tr>

<tr>
<td style="padding:1.5px;"><label style="color:blue;float:right">E) Hijos?: </label></td>
<td><?php echo $data['hijos']; ?></td>
<td style="padding:1.5px;"><label style="color:blue;float:right"> Cantidad: </label></td>
<td><?php echo $data['hijos_cant']; ?></td>
</tr>
</table>

<table class="table" style="width:100%">
<tr><td colspan="5" style="text-align:center;" class="texto-colorfondo">V.-ANTECEDENTES PSICO-SOCIALES</td></tr>

<tr><td colspan="5"><label>V.I.- TABACO</label></td></tr>
<tr>
<td style="padding:1.5px;"><label style="color:blue;float:left;">A) ¿Fuma Actualmente?:</label></td>
<td><?php echo $data['fuma']; ?></td>
<td style="padding:1.5px;"><label style="color:blue;float:left;">En caso de ser Negativo,¿Fumaba Anteriormente?:</label></td>
<td><?php echo $data['fuma_antes_si']; ?></td>
</tr>
<tr>
<td style="padding:1.5px;"><label style="color:blue;float:left;">B) ¿A que edad empezo a fumar?:</label></td>
<td><?php echo $data['fuma_empezo']; ?></td>
<td style="padding:1.5px;"><label style="color:blue;float:left;">D) ¿En que año dejo de fumar?:</label></td>
<td><?php echo $data['fuma_dejo']; ?></td>
</tr>
<tr>
<td style="padding:1.5px;"><label style="color:blue;float:left;">C) ¿Numero de Cigarrillos que fuma o fumaba?:</label></td>
<td><?php echo $data['fuma_cant']; ?></td>
<td style="padding:1.5px;"><label style="color:blue;float:left;">E) ¿Porque razon?:</label></td>
<td><?php echo $data['fuma_razon']; ?></td>
</tr>

<tr><td colspan="4"><label>V.II.- ALCOHOL</label></td></tr>
<tr>
<td style="padding:1.5px;"><label style="color:blue;float:left;">A) ¿Ingiere bebidas Alcoholicas?:</label></td>
<td><?php echo $data['toma']; ?></td>
<td style="padding:1.5px;"><label style="color:blue;float:left;">B) En caso de ser SI, ¿Desde Cuando?:</label></td>
<td><?php echo $data['toma_inicio']; ?></td>
</tr>
<tr>
<td style="padding:1.5px;" colspan="4"><label style="color:blue;float:left;">C) ¿Frecuencia?:</label></td></tr>
<tr>
<td><?php echo $data['toma_dia']; ?></td>
<td><?php echo $data['toma_sem']; ?></td>
<td><?php echo $data['toma_quin']; ?></td>
<td><?php echo $data['toma_mens']; ?></td>
</tr>
<tr>
<td style="padding:1.5px;" colspan="3"> <label style="color:blue;float:left;">D) ¿Ha tenido accidentes de transito o de trabajo por causa de la ingesta de Alcohol?:</label></td>
<td><label><?php echo $data['toma_acci_si']; ?></label></td>
</tr>
<tr>
<td style="padding:1.5px;"colspan="1"><label style="color:blue;float:left;">Comentarios:</label></td>
<td><label><?php echo $data['toma_acci_com']; ?></label></td>
</tr>

<tr><td colspan="4"><label>V.III.- DROGAS</label></td></tr>
<tr>
<td style="padding:1.5px;"><label style="color:blue;float:left;">A) ¿Alguna vez ha usado algun tipo de droga Psicoactiva?</label></td>
<td><?php echo $data['drogas']; ?></td>
</tr>

<tr>
<td style="padding:1.5px;" colspan="3"><label style="color:blue;float:left;">B) En caso que si, Señale Fecha de inicio, Tipo de Droga, Frecuencia y Ultima Ocasion:</label></td>
<td><?php echo $data['drogas_coment']; ?></td>
</tr>
</table>

<table class="table" style="width:100%;">
<tr><td colspan="5" style="text-align:center;" class="texto-colorfondo">VI.-HISTORIA, ENFERMEDADES O DX GINECOLOGICOS (Exclusivo Mujeres)</td></tr><br>
<tr colspan="5">
<td style="padding:1.5px;"><label style="color:blue;float:left;">A) Menarca: </label><?php echo $data['menarca']; ?></td>
<td style="padding:1.5px;"><label style="color:blue;float:left;">B) Ritmo:</label> <?php echo $data['ritmo']; ?></td>
</tr>

<tr colspan="5">
<td style="padding:1.5px;"><label style="color:blue;float:left;">C) ¿Enfermedades de las Glandulas Mamarias?</label>
<label><?php echo $data['enferm_glandulas']; ?></label></td>
<td style="padding:1.5px;"><label style="color:blue;float:left;">D) ¿Enfermedades en los Ovarios? </label>
<label><?php echo $data['enferm_ovarios']; ?></label></td>
</tr>
<tr colspan="5">
<td style="padding:1.5px;"><label style="color:blue;float:left;">E) ¿Enfermedades del Utero? </label>
<label><?php echo $data['enferm_utero']; ?></label></td>
</tr>
<tr colspan="5">
<td style="padding:1.5px;"><label style="color:blue;float:left;">F) ¿Esta Embrazada? </label>
<label><?php echo $data['embrazo']; ?></label></td>
</tr>

<tr colspan="5">
<td style="padding:1.5px;"><label style="color:blue;float:left;">En caso de Afirmativo cuantas Semanas tiene?:</label>
<label><?php echo $data['embrazo_sem']; ?></label></td>
<td style="padding:1.5px;"><label style="color:blue;float:left;">Fecha de ultima regla</label>
<label><?php echo $data['fecha_regla']; ?></label></td>
</tr>

<tr colspan="5">
<td style="padding:1.5px;"><label style="color:blue;">G) Antecedentes Gineco-Obstetricos:</label></td>
<td><label><?php echo $data['gesta']; ?></label> <td> <label><?php echo $data['abortos']; ?></label> </td>
<td><label><?php echo $data['partos']; ?></label><td> <label><?php echo $data['cesarea']; ?></label></td>
</tr>

<tr colspan="5">
<td style="padding:1.5px;"><label style="color:blue;float:left;">H) ¿Se le ha practicado alguna mastografia? </label>
<label><?php echo $data['mastografia']; ?></label></td>
</tr>

<tr colspan="5">
<td style="padding:1.5px;"><label style="color:blue;float:left;">I) ¿Se le ha practicado algun Papanicolao? </label>
<label><?php echo $data['papanicolao']; ?></label></td>
</tr>
<!--  ESTA PARTE NO SE AGREGA PORQUE NOEXISTIA -->
<tr>
<td style="padding:1.5px;"><label style="color:blue;float:left;">J) ¿Utiliza algun metodo anticonceptivo?</label>
<label><?php echo $data['anticonceptivo']; ?></label></td>
<td style="padding:1.5px;"><label style="color:blue;float:left;">En caso Afirmativo: ¿Que metodo utiliza?:</label>
<label><?php echo $data['anticoncepcual']; ?></label></td>
</tr>
<!-- FIN  -->
</table>

<table class="table" style="width:100%;">
<tr><td colspan="5" style="text-align:center;" class="texto-colorfondo">VII.-EXPLORACION FISICA</td></tr>
<tr colspan="5">
<td style="padding:1.5px;"><label style="color:blue;float:left;">TALLA:</label>
<label><?php echo $data['talla']; ?></label></td>
<td style="padding:1.5px;"><label style="color:blue;float:left;">CINTURA:</label>
<label><?php echo $data['cintura']; ?></label></td>
<td style="padding:1.5px;"><label style="color:blue;float:left;">PESO:</label>
<label><?php echo $data['peso']; ?></label></td>
<td style="padding:1.5px;"><label style="color:blue;float:left;">FC:</label>
<label><?php echo $data['fc']; ?></label></td>
</tr>

<tr colspan="4">
<td style="padding:1.5px;"><label style="color:blue;float:left;">T/A</label>
<label><?php echo $data['t_a']; ?></label></td>
<td style="padding:1.5px;"><label style="color:blue;float:left;">GLUCEMIA CAPILAR:</label>
<label><?php echo $data['glucemia']; ?></label></td>
</tr>

<tr><td colspan="5" style="text-align:center;color:blue">**AGUDEZA VIZUAL**</td></tr>
<tr colspan="5">
<td style="padding:1.5px;"><label style="color:blue;float:left;">OJO DERECHO:</label>
<label><?php echo $data['ojo_dere']; ?></label></td>
<td style="padding:1.5px;"><label style="color:blue;float:left;">OJO IZQUIERDO:</label>
<label><?php echo $data['ojo_izq']; ?></label></td>
</tr>
<tr colspan="5">
<td style="padding:1.5px;"><label style="color:blue;float:left;">CATARATAS:</label>
<label><?php echo $data['cataratas']; ?></label></td>
<td style="padding:1.5px;"><label style="color:blue;float:left;">PTERIGION (Carnosidad):</label>
<label><?php echo $data['pterigion']; ?></label></td>
</tr>

<tr><td colspan="6" style="text-align:center;color:blue">**EXAMENES ESPECIALES**</td></tr>
<tr>
<td style="padding:1.5px;"><label style="color:blue;float:left;">ANTIDOPING Fecha: </label>
<label><?php echo $data['antidop_fecha']; ?></label></td>
<td><label style="color:blue;float:left;">Resultados:</label><label><?php echo $data['antidop_res']; ?></label></td>
</tr>
<tr>
<td style="padding:1.5px;"><label style="color:blue;float:left;">ALCOHOLIMETRIA Fecha: </label>
<label><?php echo $data['alcohol_fecha']; ?></label></td>
<td><label style="color:blue;float:left;">Resultados:</label><label><?php echo $data['alcohol_res']; ?></label></td>
</tr>
<tr>
<td style="padding:1.5px;"><label style="color:blue;float:left;">PRUEBA EMBRAZO:</label>
<label><?php echo $data['prueba_emb_fech']; ?></label></td>
<td><label style="color:blue;float:left;">Resultados:</label><label><?php echo $data['prueba_emb_res']; ?></label></td>
</tr>

<tr>
<td style="padding:1.5px;"><label style="color:blue;float:left;">Observaciones:</label>
<label><?php echo $data['antidop_observ']; ?></label></td>
</tr>
</table>
<br>
<br>
<?php if ($_SESSION['tipo_usu']=='Admin'): ?>
  <a href="#" style="float:right;color:red;" onclick="eliminarExpediente(<?php echo $data['id_paciente']; ?>);">[Eliminar expediente]</a>
<?php endif ?>
<br>
</center>
