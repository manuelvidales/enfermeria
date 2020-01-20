<?php
ini_set('display_errors', 0);
date_default_timezone_set('America/Mexico_City');
if(isset($_GET['e']))
{
	switch ($_GET['e']) {
	/*	case 'cargarNumBuzon': cargarNumBuzon(); break; -->No se usa por el momento*/
	/*	case 'calcularRfc': calcularRfc(); break; -->No usar por el momento*/
		case 'CalcularEdad': echo CalcularEdad($_POST['value']); break;
		case 'eliminarExpediente': eliminarExpediente(); break;
		case 'actualizarPacienteHc': actualizarPacienteHc(); break;
		case 'actualizarExpediente': actualizarExpediente(); break;
		//case 'validarPase': validarPase(); break;
		case 'buscarExpediente': buscarExpediente(); break;
		case 'removerBuzon': removerBuzon(); break;
		case 'agregarBuzon': agregarBuzon(); break;
		case 'cargarBuzon': cargarBuzon(); break;
		case 'Expedientenuevo': Expedientenuevo(); break; /*PARTE I*/
//		case 'Expedienteparte2': Expedienteparte2(); break; /*PARTE II*/
		case 'Expedienteparte3': Expedienteparte3(); break; /*PARTE III*/
		case 'Expedienteparte4': Expedienteparte4(); break; /*PARTE IV*/
		case 'Expedienteparte5': Expedienteparte5(); break; /*PARTE V*/
		case 'Expedienteparte6': Expedienteparte6(); break; /*PARTE VI*/
		case 'Expedienteparte7': Expedienteparte7(); break; /*PARTE VII*/
		case 'Expedienteparte8': Expedienteparte8(); break; /*PARTE VIII*/
		case 'nuevoExpediente': nuevoExpediente(); break; /*Este es el Completo fomulariodemo.php*/
		case 'selectExpedientes': selectExpedientes(); break;
	}
}
function cargarNumBuzon()
{
	include 'conexion.php';
	$con = new Conexion();
	$sql="SELECT count(*) as contador FROM paciente WHERE ref_exp != '' ORDER BY ref_exp";
	$datos=$con->select($sql);
	$contador="";
	while($fila=mysqli_fetch_array($datos))
	{
		if($fila['contador']>0)
		{
			$contador="( ".$fila['contador']." ) ";
		}
	}
	echo $contador;
}
/*
function calcularRfc()
{
	require_once 'Unirest.php';
	$response = Unirest\Request::get("https://jfhe88-rfc-generator-mexico.p.mashape.com/rest1/rfc/get?apellido_materno=".urlencode($_POST['materno_paci'])."&apellido_paterno=".urlencode($_POST['paterno_paci'])."&fecha=".urlencode($_POST['fecha_paci'])."&nombre=".urlencode($_POST['nombre_paci'])."&solo_homoclave=0",
	  array(
	    "X-Mashape-Key" => "7oBF4jVvEymshc41oYkO1Zdyim3tp1e42hCjsnyZCOv2m6ohc7",
	    "Accept" => "application/json"
	  )
	);
	echo json_encode($response);
}
*/
function eliminarExpediente()
{
	include "conexion.php";
	$con = new Conexion();
	$sql="DELETE FROM paciente WHERE id_paciente=".$_POST['id_expediente'];
	if($con->delete($sql))
	{
		echo "Registro eliminado";
	}else{
		echo 'error: '.$sql;
	}
}
function actualizarPacienteHc()
{
	include 'conexion.php';
	$con = new Conexion();
	if(isset($_POST['hc_fum'])>0)
	{
		$hc_fum = $_POST['hc_fum'];
	}else{
		$hc_fum = NULL;
	}
	$sql="UPDATE paciente SET
		hc_peso='$_POST[hc_peso]',
		hc_talla='$_POST[hc_talla]',
		hc_ta='$_POST[hc_ta]',
		hc_fc='$_POST[hc_fc]',
		hc_fr='$_POST[hc_fr]',
		hc_tem='$_POST[hc_tem]',
		hc_fum='$hc_fum',
		hc_ant_fam='$_POST[hc_ant_fam]',
		hc_ant_per_no_p='$_POST[hc_ant_per_no_p]',
		hc_ant_per_p='$_POST[hc_ant_per_p]',
		hc_pad='$_POST[hc_pad]',
		hc_exp_fis='$_POST[hc_exp_fis]',
		hc_otros='$_POST[hc_otros]',
		hc_rx='$_POST[hc_rx]',
		hc_dx='$_POST[hc_dx]',
		hc_tx='$_POST[hc_tx]'
		WHERE id_paciente=".$_POST['id_paciente'];
		if($con->update($sql))
		{
			echo "Información actualizada!";
		}else{
			echo 'error: '.$sql;
		}
}

function actualizarExpediente()
{
	include 'conexion.php';
	$con = new Conexion();
	if(strlen($_POST['edad_paci'])>0)
	{
		$edad=$_POST['edad_paci'];
	}else{
		$edad = CalcularEdad($_POST['naci_paci']);
	}
	$sql="UPDATE paciente SET
		nombre_emp='$_POST[nombre_emp]',
		imss='$_POST[imss]',
		tipo_sangre='$_POST[tipo_sangre]',
		sex_paci='$_POST[sex_paci]',
		naci_paci='$_POST[naci_paci]',
		edad_paci='$edad',
		lugar_paci='$_POST[lugar_paci]',
		reli='$_POST[reli]',
		edo_civ='$_POST[edo_civ]',
		tel_cas='$_POST[tel_cas]',
		tel_cel='$_POST[tel_cel]',
		edo_dir='$_POST[edo_dir]',
		mun='$_POST[mun]',
		col='$_POST[col]',
		calle='$_POST[calle]',
		no_ext='$_POST[no_ext]',
		no_int='$_POST[no_int]',
		nom_cont='$_POST[nom_cont]',
		par_cont='$_POST[par_cont]',
		tel_cont='$_POST[tel_cont]',
		edo_exp='$_POST[edo_exp]'
		
		WHERE id_paciente=".$_POST['id_paciente'];

		if($con->update($sql))
		{
			echo "Información actualizada!";
		}else{
			echo 'error: '.$sql;
		}

}

/*-------------------------------------------------------------*/
/*
function validarPase()
{
	include "conexion.php";
	$con = new Conexion();
	$sql = "SELECT * FROM paciente WHERE id_paciente=".$_POST['id_expediente'];
	$datos = $con->select($sql);
	$data;
	if($fila=mysqli_fetch_array($datos)) $data = $fila;
	$sql = "SELECT count(*) as num_pase FROM consulta WHERE pase_cons = '".$data['pase_id']."'";
	$datos = $con->select($sql);
	$num_pase;
	if($fila=mysqli_fetch_array($datos))
	{
		$total=$fila['num_pase'].' de '.$data['pase_tot'];
		if($fila['num_pase']>=$data['pase_tot'])
		{
			echo json_encode(array('pase'=>0,'total'=>$total));
		}else{
			echo json_encode(array('pase'=>1,'total'=>$total));
		}
	}
}
*/
function buscarExpediente()
{
	include "conexion.php";
	$con = new Conexion();
	$sql = "SELECT * FROM paciente WHERE nombre_emp  LIKE '%$_POST[value]%'";
	$datos=$con->select($sql);
	$contador=0;
	while ($fila=mysqli_fetch_array($datos))
	{
		echo '<div onclick="abrirExpedienteALL('.$fila['id_paciente'].');" class="item-busqueda"><span class="icon-user"></span> '.$fila['nombre_emp'].'</div>';
		$contador++;
	}
	if($contador<=0){ echo '<div class="item-busqueda"><span class="icon-cross"></span> No se encontraron resultados...</div>'; }
}
function removerBuzon()
{
	include 'conexion.php';
	$con = new Conexion();
	$sql = "UPDATE paciente SET ref_exp=NULL WHERE id_paciente=".$_POST['id_expediente'];
	if($con->update($sql))
	{
		/*require 'ctrl_notificacion.php';*/
		//enviarNotificacion('');
		echo "Expediente removido del buzón.";
	}else{
		echo "Error: ".$sql;
	}
}
function agregarBuzon()
{
	include 'conexion.php';
	$con = new Conexion();
	$ref_exp=date('Y-m-d H:i:s');
	$sql = "UPDATE paciente SET ref_exp='".$ref_exp."' WHERE id_paciente=".$_POST['insert_id'];
	if($con->update($sql))
	{
		//require 'ctrl_notificacion.php';
		//enviarNotificacion('');
		echo "Expediente agregado a lista de Buzon.";
	}else{
		echo "Error: ".$sql;
	}
}
function numConsultas($id_paciente,$con)
{
	$sql="SELECT * FROM consulta WHERE id_paciente=".$id_paciente;
	$datos=$con->select($sql);
	$contador=0;
	while($fila=mysqli_fetch_array($datos))
	{
		$contador++;
	}
	return $contador;
}
function cargarBuzon()
{
	include 'conexion.php';
	$con = new Conexion();
	$sql="SELECT * FROM paciente WHERE ref_exp != '' ORDER BY ref_exp";
	$datos=$con->select($sql);
//	$contador=0;
	while($fila=mysqli_fetch_array($datos))
	{
	//	if(numConsultas($fila['id_paciente'],$con)<=0)
	//	{
			$opciones = '
			<!--(Primer consulta)<br>-->
			<table style="width:100%;">
			<tr>
			<td><a href="#" onclick="iniciarConsulta('.$fila['id_paciente'].');">Abrir Exp.</a></td>
			</tr>
			</table>
			';
	//	}else{
	//		$opciones = '
	//		<table style="width:100%;">
	//		<tr>
	//		<td><a href="#" onclick="iniciarConsulta('.$fila['id_paciente'].');">Abrir Exp.</a></td></tr>
	//		</table>
	//		';
	//	}
		//Eliminar opción de iniciar consulta al asistente
/*		session_start();
		if($_SESSION['tipo_usu']=='Asistente')$opciones='';
*/		$dateTime = explode(' ',$fila['ref_exp']);
		$date =explode('-',$dateTime[0]);
		$time = explode(':',$dateTime[1]);
		
		echo '
		<span onclick="removerBuzon('.$fila['id_paciente'].');" class="icon-cross" title="Remover del buzón..." style="float:right;color:gray;cursor:pointer;"></span><br>
		<div class="item-buzon">
			<label>'.$fila['nombre_emp'].' </label>
		<br>
			'.$date[2].'-'.$date[1].'-'.$date[0].' a las '.$time[0].':'.$time[1].' Hrs.
		<br>
		'.$opciones.'
		</div>
		<hr>
		';
//		$contador++;
	}
/*	if($contador<=0)
	{
		echo '<center><label>AÚN NO HAY EXPEDIENTES</label></center>';
	}
*/
}
/*============================ INICIA CAPTURA EXPEDIENTE POR PARTES ================================*/
					/*PARTE (I)*/
function Expedientenuevo()
{
	include 'conexion.php';
	$con = new Conexion();
	if(strlen($_POST['edad_paci'])>0)
	{
		$edad=$_POST['edad_paci'];
	}else{
		$edad = CalcularEdad($_POST['naci_paci']);
	}
	$sql="INSERT INTO paciente (
		fecha_reg,
		no_emp,
		nombre_emp,
		imss,
		tipo_sangre,
		sex_paci,
		naci_paci,
		edad_paci,
		lugar_paci,
		reli,
		edo_civ,
		tel_cas,
		tel_cel,
		edo_dir,
		mun,
		col,
		calle,
		no_ext,
		no_int,
		nom_cont,
		par_cont,
		tel_cont,
		edo_exp) VALUES (
		'$_POST[fecha_reg]',
		'$_POST[no_emp]',
		'$_POST[nombre_emp]',
		'$_POST[imss]',
		'$_POST[tipo_sangre]',
		'$_POST[sex_paci]',
		'$_POST[naci_paci]',
		'$edad',
		'$_POST[lugar_paci]',
		'$_POST[reli]',
		'$_POST[edo_civ]',
		'$_POST[tel_cas]',
		'$_POST[tel_cel]',
		'$_POST[edo_dir]',
		'$_POST[mun]',
		'$_POST[col]',
		'$_POST[calle]',
		'$_POST[no_ext]',
		'$_POST[no_int]',
		'$_POST[nom_cont]',
		'$_POST[par_cont]',
		'$_POST[tel_cont]',
		'Activo')";
	$insert_id = $con->insert($sql);
	if($insert_id > 0)
	{
		echo json_encode(array('error'=>0,'msg'=>'Se guardó el expediente con éxito ¿Desea enviar este expediente al buzón?','insert_id'=>$insert_id));
	}else{
		echo json_encode(array('error'=>1,'msg'=>'Ocurrió un error al guardar en la base de datos: '.$sql,'insert_id'=>0));
	}
}
					/*PARTE (II)*/

function Expedienteparte2()
{
	var_dump($_POST);
	include 'conexion.php';
	$con = new Conexion();
	$enfermedad= '';
	if (isset($_POST['enfermedad'])){
		$enfermedad=implode(' - ', $_POST['enfermedad']);
	}
	$otro_opc_a = $_POST['otro_opc_a'];
	$pers_opc_b = $_POST['pers_opc_b'];
	$pers_opc_c = $_POST['pers_opc_c'];
	$pers_opc_ccual = $_POST['pers_opc_ccual'];

	$sql = "UPDATE paciente SET enfermedad='$enfermedad', otro_opc_a='$otro_opc_a', pers_opc_b='$pers_opc_b', pers_opc_c='$pers_opc_c', pers_opc_ccual='$pers_opc_ccual' WHERE id_paciente=".$_POST['id_paciente'];
	
	if($con->update($sql))
		{
			echo "La informacion se guardó con éxito!";
		}else{
			echo 'error: No se guardo informacion';
		}
}
					/*PARTE (III)*/
function Expedienteparte3()
{
	var_dump($_POST);
	include 'conexion.php';
	$con = new Conexion();
	$antecedfami= '';
	if (isset($_POST['antecedfami'])){
		$antecedfami=implode(' - ', $_POST['antecedfami']);
	}
	$antecedfamquien = $_POST['antecedfamquien'];
	$sql = "UPDATE paciente SET antecedfami='$antecedfami', antecedfamquien ='$antecedfamquien' WHERE id_paciente=".$_POST['id_paciente'];
	
	if($con->update($sql))
		{
			echo "La informacion se guardó con éxito!";
			header("Location: ../system.php?id_expediente=".$_POST['id_paciente']);
		}else{
			echo 'error: No se guardo informacion';
		}
}

					/*PARTE (IV)*/
function Expedienteparte4()
{
	include 'conexion.php';
	$con = new Conexion();

	$sql="UPDATE paciente SET
		padre_vive='$_POST[padre_vive]',
		padre_edad='$_POST[padre_edad]',
		madre_vive='$_POST[madre_vive]',
		madre_edad='$_POST[madre_edad]',
		hermanos='$_POST[hermanos]',
		hermanos_cant='$_POST[hermanos_cant]',
		conyu_si='$_POST[conyu_si]',
		conyu_edad='$_POST[conyu_edad]',
		hijos='$_POST[hijos]',
		hijos_cant='$_POST[hijos_cant]'
		WHERE id_paciente=".$_POST['id_paciente'];

		if($con->update($sql))
		{
			echo "La informacion se guardó con éxito!";
			header("Location: ../system.php?id_expediente=".$_POST['id_paciente']);
		}else{
			echo 'error: No se guardo informacion';
		}
}
					/*PARTE (V)*/
function Expedienteparte5()
{
	var_dump($_POST);
	include 'conexion.php';
	$con = new Conexion();
	
	$fuma = $_POST['fuma'];
	$fuma_antes_si = $_POST['fuma_antes_si'];
	$fuma_empezo = $_POST['fuma_empezo'];
	$fuma_dejo = $_POST['fuma_dejo'];
	$fuma_cant = $_POST['fuma_cant'];
	$fuma_razon = $_POST['fuma_razon'];
	$toma = $_POST['toma'];
	$toma_inicio = $_POST['toma_inicio'];
	$tomafrecuencia= '';
	if (isset($_POST['tomafrecuencia'])){
		$tomafrecuencia=implode(' - ', $_POST['tomafrecuencia']);
	}
	$toma_acci_si = $_POST['toma_acci_si'];
	$toma_acci_com = $_POST['toma_acci_com'];
	$drogas = $_POST['drogas'];
	$drogas_coment = $_POST['drogas_coment'];

	$sql = "UPDATE paciente SET 
		fuma='$fuma',
		fuma_antes_si='$fuma_antes_si',
		fuma_empezo='$fuma_empezo',
		fuma_dejo='$fuma_dejo',
		fuma_cant='$fuma_cant',
		fuma_razon='$fuma_razon',
		toma='$toma',
		toma_inicio='$toma_inicio',
		tomafrecuencia='$tomafrecuencia',
		toma_acci_si='$toma_acci_si',
		toma_acci_com='$toma_acci_com',
		drogas='$drogas',
		drogas_coment='$drogas_coment' 
		WHERE id_paciente=".$_POST['id_paciente'];	

		if($con->update($sql))
		{
			echo "La informacion se guardó con éxito!";
			header("Location: ../system.php?id_expediente=".$_POST['id_paciente']);
		}else{
			echo 'error: No se guardo informacion';
		}
}
					/*PARTE (VI)*/
function Expedienteparte6()
{
	var_dump($_POST);
	include 'conexion.php';
	$con = new Conexion();
	
	$menarca = $_POST['menarca'];
	$ritmo = $_POST['ritmo'];
	$enferm_glandulas = $_POST['enferm_glandulas'];
	$enferm_ovarios = $_POST['enferm_ovarios'];
	$enferm_utero = $_POST['enferm_utero'];
	$embrazo = $_POST['embrazo'];
	$embrazo_sem = $_POST['embrazo_sem'];
	$fecha_regla = $_POST['fecha_regla'];
	$ginecoobst= '';
	if (isset($_POST['ginecoobst'])){
		$ginecoobst=implode(' - ', $_POST['ginecoobst']);
	}
	$mastografia = $_POST['mastografia'];
	$papanicolao = $_POST['papanicolao'];
	$anticonceptivo = $_POST['anticonceptivo'];
	$anticoncepcual = $_POST['anticoncepcual'];

	$sql = "UPDATE paciente SET 
		menarca='$menarca',
		ritmo='$ritmo',
		enferm_glandulas='$enferm_glandulas',
		enferm_ovarios='$enferm_ovarios',
		enferm_utero='$enferm_utero',
		embrazo='$embrazo',
		embrazo_sem='$embrazo_sem',
		fecha_regla='$fecha_regla',
		ginecoobst='$ginecoobst',
		mastografia='$mastografia',
		papanicolao='$papanicolao',
		anticonceptivo='$anticonceptivo',
		anticoncepcual='$anticoncepcual'
		WHERE id_paciente=".$_POST['id_paciente'];	

		if($con->update($sql))
		{
			echo "La informacion se guardó con éxito!";
			header("Location: ../system.php?id_expediente=".$_POST['id_paciente']);
		}else{
			echo 'error: No se guardo informacion';
		}
}
					/*PARTE (VII)*/
function Expedienteparte7()
{
	include 'conexion.php';
	$con = new Conexion();

	$sql="UPDATE paciente SET
		talla='$_POST[talla]',
		cintura='$_POST[cintura]',
		peso='$_POST[peso]',
		fc='$_POST[fc]',
		t_a='$_POST[t_a]',
		glucemia='$_POST[glucemia]',
		ojo_dere='$_POST[ojo_dere]',
		cataratas='$_POST[cataratas]',
		ojo_izq='$_POST[ojo_izq]',
		pterigion='$_POST[pterigion]',		
		antidop_fecha='$_POST[antidop_fecha]',
		antidop_res='$_POST[antidop_res]',
		alcohol_fecha='$_POST[alcohol_fecha]',
		alcohol_res='$_POST[alcohol_res]',
		prueba_emb_fech='$_POST[prueba_emb_fech]',
		prueba_emb_res='$_POST[prueba_emb_res]',
		antidop_observ='$_POST[antidop_observ]'
		WHERE id_paciente=".$_POST['id_paciente'];

	if($con->update($sql))
		{
			echo "La informacion se guardó con éxito!";
			header("Location: ../system.php?id_expediente=".$_POST['id_paciente']);
		}else{
			echo 'error: No se guardo informacion';
		}
}
					/*PARTE (VIII)*/
function Expedienteparte8()
{
	include 'conexion.php';
	$con = new Conexion();

	$apto= '';
	if (isset($_POST['apto'])){
		$apto=implode(' - ', $_POST['apto']);
	}
	$noapto= '';
	if (isset($_POST['noapto'])){
		$noapto=implode(' - ', $_POST['noapto']);
	}

	$sql = "UPDATE paciente SET apto='$apto', noapto='$noapto' WHERE id_paciente=".$_POST['id_paciente'];

	if($con->update($sql))
	{
		echo "La informacion se guardó con éxito!";
		header("Location: ../system.php?id_expediente=".$_POST['id_paciente']);
	}else{
		echo 'error: No se guardo informacion';
	}
}


/*============================TERMINA CAPTURA EXPEDIENTE POR PARTES ================================*/


function nuevoExpediente()
{
	include 'conexion.php';
	$con = new Conexion();
/*
	if(strlen($_POST['pase_id'])>0)
	{
		$pase_id=$_POST['pase_id'];
		$pase_tot=$_POST['pase_tot'];
	}else{
		$pase_id = "AIH_".date('His');
		$pase_tot='10000';
	}
*/
	if(strlen($_POST['edad_paci'])>0)
	{
		$edad=$_POST['edad_paci'];
	}else{
		$edad = CalcularEdad($_POST['naci_paci']);
	}
	$sql="INSERT INTO paciente (
		fecha_reg,
		nombre_emp,
		sex_paci,
		naci_paci,
		edad_paci,
		lugar_paci,
		reli,
		edo_civ,
		tel_cas,
		tel_cel,
		edo_dir,
		mun,
		col,
		calle,
		no_ext,
		no_int,
		nom_cont,
		par_cont,
		tel_cont,
		diabet_pers,
		hipert_pers,
		hipoto_pers,
		asma_pers,
		hernia_pers,
		renales_pers,
		migrana_pers,
		gastrit_pers,
		alergias_pers,
		fractura_pers,
		nervios_pers,
		convulc_pers,
		paralis_pers,
		tubercul_pers,
		cirugias_pers,
		otro_opc_a,
		pers_opc_b,
		pers_opc_c,
		pers_opc_ccual,
		cancer_fam,
		diabet_fam,
		renal_fam,
		corazon_fam,
		nervios_fam,
		cereb_fam,
		hipert_fam,
		hipote_fam,
		padre_vive,
		padre_edad,
		madre_vive,
		madre_edad,
		hermanos,
		hermanos_cant,
		conyu_si,
		conyu_edad,
		conyu_no,
		hijos,
		hijos_cant,
		hijos_no,
		fuma,
		fuma_antes_si,
		fuma_antes_no,
		fuma_empezo,
		fuma_dejo,
		fuma_cant,
		fuma_razon,
		toma,
		toma_inicio,
		toma_dia,
		toma_sem,
		toma_quin,
		toma_mens,
		toma_acci_si,
		toma_acci_no,
		toma_acci_com,
		drogas,
		drogas_coment,
		menarca,
		ritmo,
		enferm_glandulas,
		enferm_ovarios,
		enferm_utero,
		embrazo,
		embrazo_sem,
		fecha_regla,
		gesta,
		abortos,
		partos,
		cesarea,
		mastografia,
		papanicolao,
		talla,
		cintura,
		peso,
		fc,
		t_a,
		glucemia,
		ojo_dere,
		cataratas,
		ojo_izq,
		pterigion,
		antidop_fecha,
		antidop_res,
		alcohol_fecha,
		alcohol_res,
		prueba_emb_fech,
		prueba_emb_res,
		antidop_observ,
		apto,
		noapto,

		edo_exp

	) VALUES (
		'$_POST[fecha_reg]',
		'".$_POST['nombre_emp']."',
		'$_POST[sex_paci]',
		'$_POST[naci_paci]',
		'$edad',
		'$_POST[lugar_paci]',
		'$_POST[reli]',
		'$_POST[edo_civ]',
		'$_POST[tel_cas]',
		'$_POST[tel_cel]',
		'$_POST[edo_dir]',
		'$_POST[mun]',
		'$_POST[col]',
		'$_POST[calle]',
		'$_POST[no_ext]',
		'$_POST[no_int]',
		'$_POST[nom_cont]',
		'$_POST[par_cont]',
		'$_POST[tel_cont]',
		'$_POST[diabet_pers]',
		'$_POST[hipert_pers]',
		'$_POST[hipoto_pers]',
		'$_POST[asma_pers]',
		'$_POST[hernia_pers]',
		'$_POST[renales_pers]',
		'$_POST[migrana_pers]',
		'$_POST[gastrit_pers]',
		'$_POST[alergias_pers]',
		'$_POST[fractura_pers]',
		'$_POST[nervios_pers]',
		'$_POST[convulc_pers]',
		'$_POST[paralis_pers]',
		'$_POST[tubercul_pers]',
		'$_POST[cirugias_pers]',
		'$_POST[otro_opc_a]',
		'$_POST[pers_opc_b]',
		'$_POST[pers_opc_c]',
		'$_POST[pers_opc_ccual]',
		'$_POST[cancer_fam]',
		'$_POST[diabet_fam]',
		'$_POST[renal_fam]',
		'$_POST[corazon_fam]',
		'$_POST[nervios_fam]',
		'$_POST[cereb_fam]',
		'$_POST[hipert_fam]',
		'$_POST[hipote_fam]',
		'$_POST[padre_vive]',
		'$_POST[padre_edad]',
		'$_POST[madre_vive]',
		'$_POST[madre_edad]',
		'$_POST[hermanos]',
		'$_POST[hermanos_cant]',
		'$_POST[conyu_si]',
		'$_POST[conyu_edad]',
		'$_POST[conyu_no]',
		'$_POST[hijos]',
		'$_POST[hijos_cant]',
		'$_POST[hijos_no]',
		'$_POST[fuma]',
		'$_POST[fuma_antes_si]',
		'$_POST[fuma_antes_no]',
		'$_POST[fuma_empezo]',
		'$_POST[fuma_dejo]',
		'$_POST[fuma_cant]',
		'$_POST[fuma_razon]',
		'$_POST[toma]',
		'$_POST[toma_inicio]',
		'$_POST[toma_dia]',
		'$_POST[toma_sem]',
		'$_POST[toma_quin]',
		'$_POST[toma_mens]',
		'$_POST[toma_acci_si]',
		'$_POST[toma_acci_no]',
		'$_POST[toma_acci_com]',
		'$_POST[drogas]',
		'$_POST[drogas_coment]',
		'$_POST[menarca]',
		'$_POST[ritmo]',
		'$_POST[enferm_glandulas]',
		'$_POST[enferm_ovarios]',
		'$_POST[enferm_utero]',
		'$_POST[embrazo]',
		'$_POST[embrazo_sem]',
		'$_POST[fecha_regla]',
		'$_POST[gesta]',
		'$_POST[abortos]',
		'$_POST[partos]',
		'$_POST[cesarea]',
		'$_POST[mastografia]',
		'$_POST[papanicolao]',
		'$_POST[talla]',
		'$_POST[cintura]',
		'$_POST[peso]',
		'$_POST[fc]',
		'$_POST[t_a]',
		'$_POST[glucemia]',
		'$_POST[ojo_dere]',
		'$_POST[cataratas]',
		'$_POST[ojo_izq]',
		'$_POST[pterigion]',
		'$_POST[antidop_fecha]',
		'$_POST[antidop_res]',
		'$_POST[alcohol_fecha]',
		'$_POST[alcohol_res]',
		'$_POST[prueba_emb_fech]',
		'$_POST[prueba_emb_res]',
		'$_POST[antidop_observ]',
		'$_POST[apto]',
		'$_POST[noapto]',
				
		'Activo'
	)";
	$insert_id = $con->insert($sql);
	//echo "Cons ".$insert_id;
	if($insert_id > 0)
	{
		echo json_encode(array('error'=>0,'msg'=>'Se guardó el expediente con éxito<br>¿Desea enviar este expediente al buzón?','insert_id'=>$insert_id));
	}else{
		echo json_encode(array('error'=>1,'msg'=>'Ocurrió un error en la petición a la base de datos: '.$sql,'insert_id'=>0));
	}
}

function CalcularEdad( $fecha ) {
    list($Y,$m,$d) = explode("-",$fecha);
    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
}
/*
function normaliza ($cadena){
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞ
ßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuy
bsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($cadena);
    return utf8_encode($cadena);
}
*/

/*Inicia prueba Expedientes*/
function selectExpedientes()
{
include '../control/conexion.php';
$con = new Conexion();
$sql = "SELECT * FROM paciente WHERE edo_exp='Activo'";
$datos = $con->select($sql);
echo '<table class="table table-hover">
<center> <h4 class="modal-title" id="myModalLabel">Reporte de Expedientes "Activos"</h4></center><img src="image/logo1.png"> <br>
<tr>
<th>N° Expediente</th>
<th>Nombre Completo</th>
<th>Fecha de nacimiento</th>
<th>Edad</th>
<th>Visitas</th>
<th>Estatus</th>
</tr>';
while($fila=mysqli_fetch_array($datos))
{
$sql = "SELECT count(*) as num FROM consulta WHERE id_paciente=".$fila['id_paciente'];	
$datos2 = $con->select($sql);
if($fila2=mysqli_fetch_array($datos2))
{
	$numCons=$fila2['num'];
}
	$fecha=explode('-',$fila['naci_paci']);
	$fecha=$fecha[2].'-'.$fecha[1].'-'.$fecha[0];
	echo'
	<tr>
	<td>'.$fila['id_paciente'].'</td>
	<td>'.$fila['nombre_emp'].'</td>
	<td>'.$fecha.'</td>
	<td>'.$fila['edad_paci'].'</td>
	<td>'.$numCons.'</td>
	<td>'.$fila['edo_exp'].'</td>
	</tr>';
	}
echo '</table>';
}

/*Termina prueba expedientes*/

 ?>
