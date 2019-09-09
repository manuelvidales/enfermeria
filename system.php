<?php set_time_limit(3000); ?>
<?php date_default_timezone_set('America/Mexico_City'); ?>
<?php session_start(); ?>
<?php 
	if(!isset($_SESSION['tipo_usu']))
{
	header('Location: index.php');
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="img/icon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/font.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link href="css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<input type="hidden" id="id_expediente" value="0">
	<div class="menu">
		
		<label class="item-menu" onclick="inicio();"><h2> <span class="icon-home"></span></h2></label>
		<hr>
		<label class="item-menu" onclick="expedientenuevo();"><span class="icon-user"></span> ALTA</label>
		<br><br>
		<label class="item-menu" onclick="catalogo();"><span class="icon-users"></span> CATÁLOGO</label>
		<br><br>
<!--		<label class="item-menu" onclick="medicamentos();"><span class="icon-drawer"></span> MEDICAMENTOS</label>
		<br><br>
		<label class="item-menu" onclick="botiquin();"><span class="icon-briefcase"></span> BOTIQUIN</label>
		<br><br>-->
		<label class="item-menu" onclick="dashboard();"><span class="icon-stats-bars"></span> DASHBOARD</label>
		<br><br>
<!--		<?php // if ($_SESSION['tipo_usu']=='Admin'): ?>
	<label class="item-menu" onclick="exportar();"><span class="icon-file-excel"></span> EXPORTAR</label>
	<br><br> -->
		<?php if ($_SESSION['tipo_usu']=='Admin'): ?>
		<label class="item-menu" onclick="ajustes();"><span class="icon-wrench"></span> AJUSTES</label>
		<?php endif ?>
		<br><br>
		<label class="item-menu" onclick="cerrarSesion();"><span class="icon-exit"></span> SALIR</label>
		<br><br>
		<br><br>
		<br><br>
		<br><br>
		<br><br>
		<br><br>
		<label class="item-menu" onclick="acercade();"><span class="icon-info"></span> Acercade</label>
	</div>
	<div class="buzon">
		<center>
			<h2>BUZON</h2>
			<hr>
		</center>
		<div class="item-box" id="buzon">
			<!--Carga de items del buzón-->
		</div>
	</div>
	<div class="contenedor" id="contenedor">
		<!--Carga de contenido seleccionado-->
	</div>
	<div class="buscador">
		<label style="width:100%;text-align:right;"><?php echo $_SESSION['tipo_usu'].': '.$_SESSION['nombre'] ?></label>
		<center><input type="text" class="form-buscador"  id="tags" placeholder="Escriba el nombre de un Empleado para buscar el expediente..." onkeyup="buscarExpediente(this.value);">
		</center>
	</div>
	<div class="busqueda">
	</div>
<?php include 'forms/frm_ver_usuarios.php'; ?>
<?php include 'forms/frm_ver_expedientes.php'; ?>
<?php include 'forms/frm_nuevo_usuario.php'; ?>
<?php include 'forms/frm_actualizar_usuario.php'; ?>
<?php include 'forms/frm_importar_bd.php'; ?>
<?php include 'forms/frm_load.php'; ?>
<div id=movetxt><!--texto en movimiento -->
<label>DEPARTAMENTO DE ENFERMERIA</label>
</div>

<div class="backdrop"></div>
<div class="box"><div class="close"><span class="icon-cross"></span></div>
<div id="content_ligth_box">
<div>
<!--	<img src="img/fondo.jpg" style="width:120%;height:160%;"> -->
</div>
<audio id="tono_mensaje" src="sound/tono.mp3"></audio>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="dist/sweetalert.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<!-- prueba para PDF -->
	<script src="js/jspdf.js"></script>
	<script src="js/pdfFromHTML.js"></script>
<!-- Termina PDF-->

<!-- ===pusher para envia en tiempo real online peticiones y conexiones simultaneas=== -->
<!--
<script src="https://js.pusher.com/4.1/pusher.min.js"></script>
<script>
    Pusher.logToConsole = true;
    var notif;
    var pusher = new Pusher('a53ce913127d8c4400c0', {
      cluster: 'us2',
      useTLS: true
/*      encrypted: true */
    });
	var channel = pusher.subscribe('enfermeria');
    channel.bind('e_nuevo_paciente', function(data) {
      	document.getElementById('tono_mensaje').play();
 		cargarBuzon();
	});
  </script>

===Termina Pusher -->

<script type="text/javascript">
$(document).ready(function(){
	inicio();
	cargarBuzon();
});
</script>

<?php if (isset($_GET['id_expediente'])): ?>
<script type="text/javascript">
$(function(){
	swal('Aviso','El proceso se realizo con éxito');
	abrirExpedienteALL(<?php echo $_GET['id_expediente']; ?>);
});
</script>	
<?php endif ?>
</div>
</div>
</body>


</html>
