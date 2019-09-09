<?php
	var_dump($_POST);
	require("conexion.php");
	$con = new Conexion();
	$id = $_POST['id_paciente'];
	$enfermedad= '';
	if (isset($_POST['enfermedad'])){
		$enfermedad=implode(' - ', $_POST['enfermedad']);
	}
	$otro_opc_a = $_POST['otro_opc_a'];
	$pers_opc_b = $_POST['pers_opc_b'];
	$pers_opc_c = $_POST['pers_opc_c'];
	$pers_opc_ccual = $_POST['pers_opc_ccual'];

	$sql = "UPDATE paciente SET enfermedad='$enfermedad', otro_opc_a='$otro_opc_a', pers_opc_b='$pers_opc_b', pers_opc_c='$pers_opc_c', pers_opc_ccual='$pers_opc_ccual' WHERE id_paciente='$id'";
	
	if($con->update($sql))
		{
			echo "La informacion se guardó con éxito!";
			header("Location: ../system.php?id_expediente=".$_POST['id_paciente']);
		}else{
			echo 'error: No se guardo informacion';
			}
?>
