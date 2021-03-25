<?php set_time_limit(30000); ?>
<?php
session_start();
if(isset($_SESSION['tipo_usu']))
{
	header('Location: system.php');
}?>
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
</head>
<body>
	<div class="contenedor2 text-center" id="contenedor" style="background-color:white;">
		
		</br></br></br>
		<img src="img/logo_halcon.png" style="width:25%;height:25%;">
		<img src="img/falconright.png" style="width:20%;height:25%;">		
		</br></br>
		<img src="img/enfemeria_login.png" style="width:75%;height:25%;">
		</br>

		<div class="login">
			<form id="form_login" class="form-group" method="POST">
				<div class="form-group">
					<div class="col-md-offset-4 col-md-4">
						<input type="text" name="usuario" class="form-control " placeholder="Ingrese su Usuario" required>
					</div>
					<br><br>
				</div>
				
				<div class="form-group">
					<div class="col-md-offset-4 col-md-4">
						<input type="password" name="contrasena" class="form-control " placeholder="Ingrese su Contraseña" required>
					</div>
					<br><br>
				</div>
				
				<div class="form-group">
					<div class=" col-md-offset-4 col-md-4">
						<input type="submit" class="btn btn-primary btn-block"  value="Iniciar sesión">
					</div>
					<div class="col-md-5"></div>
				</div>
			</form>
		</div>
	</div>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="dist/sweetalert.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<script type="text/javascript">
$(document).ready(function(){

		$.post('control/conexion.php?e=existeBD',{},function(data){
		if(data > 0)
		{
			//console.log("La base de datos ya existe!");
		}else{
			$.post('includes/instalacion.php',{},function(data){ $("#contenedor").html(data); });
		}
		});

	$("#form_login").submit(function(e){
		e.preventDefault();
		$.post('control/ctrl_usuario.php?e=iniciarSesion',$("#form_login").serialize(),function(data){
			var json = JSON.parse(data);
			if(json.error>0)
			{
				swal('Aviso',json.mensaje);
			}else{
				window.location='system.php';
			}
		});
	});
	
});
</script>
</html>
