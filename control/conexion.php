<?php

$obj = new Conexion();
//$obj->exportarBD('*');
//phpinfo();
if(isset($_GET['e']))
{
switch ($_GET['e']) {
	case 'existeBD': $obj->existeBD(); break;
	case 'crearBase': $obj->crearBase(); break;
	case 'exportarBD': $obj->exportarBD('usuario,paciente,consulta,archivo,religion,edo_civil,causas_incap,controlsalud,examenes,grupo_examen,incapacidades,nutricion,tipo_controlsalud,tipo_examen'); break;
	case 'importarBD': $obj->importarBD(); break;
}	
}

class Conexion
{
	public $host = "localhost";
	public $user = "root";
	public $pass = "password";
	public $base = "enfermeria";
function getConexion(){
	return NEW mysqli($this->host,$this->user,$this->pass);
}
function insert($sql){
	$con = NEW mysqli($this->host,$this->user,$this->pass);
	$con->select_db($this->base);
	$con->query($sql);
	if($con->error)
	{
		return 0;
	}else{
		return $con->insert_id;
	}
}
function select($sql){
	$con = NEW mysqli($this->host,$this->user,$this->pass);
	$con->select_db($this->base);
	$datos = $con->query($sql);
	if($con->error)
	{
		return $con->error;
	}else{
		return $datos;
	}
	
}
function update($sql){
	$con = NEW mysqli($this->host,$this->user,$this->pass);
	$con->select_db($this->base);
	$con->query($sql);
	if($con->error)
	{
		return false;
	}else{
		return true;
	}
}
function delete($sql){
	$con = NEW mysqli($this->host,$this->user,$this->pass);
	$con->select_db($this->base);
	$con->query($sql);
	if($con->error)
	{
		return false;
	}else{
		return true;
	}
}
function importarBD()
{
	$conexion = NEW mysqli($this->host,$this->user,$this->pass);
	$conexion->query("CREATE DATABASE $this->base");
	if($conexion->error)
	{
		if(strpos($conexion->error,'database exist')!==false)//si la base de datos existe se elimina y se carga de nuevo
		{
			$conexion->query("DROP DATABASE  $this->base");
			if($conexion->error)
			{
				echo $conexion->error;
			}else{
				$conexion->query("CREATE DATABASE $this->base");
				if($conexion->error)
				{
					echo 'Ocurrió un error durante la operación intente de nuevo, si el problema persiste contacte con el desarrollador.';
				}else{
					//subir archivo y ejecutar su script
					//comprobamos que sea una petición ajax
					if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
					{
					 
					    //obtenemos el archivo a subir
					    $file = $_FILES['archivo']['name'];
					 	//comprobamos si el archivo ha subido
					    if ($file && move_uploaded_file($_FILES['archivo']['tmp_name'],$file))
					    {
					       //se sublio el archivo
					    	$archivo = fopen($file,'r') or die("Problemas al cargar el script!");
							$sql="";
							while(!feof($archivo)){
								$sql .= fgets($archivo);
							}
							$sentencias = explode(";",$sql);
							$conexion->select_db($this->base);
							$contador = 0;
							set_time_limit(8000);
							foreach($sentencias as $sentencia) {
								//echo $sentencia.";<br><br>";
								if($conexion->query($sentencia.";"))
								{
									//La consulta se ejecutó con éxito
								}else{
									if($conexion->error!='Query was empty')
									{
										$contador++;
										echo 'Ocurrió un error al crear las tablas!';
										echo $conexion->error;
									}
								}

							}
							
							echo "Se importó la base de datos con éxito";
					    }
					}else{
					    throw new Exception("Error Processing Request", 1);   
					}
					//echo 'La base de datos se importo con éxito! de nuevo';
				}
				
			}
		}
		
	}else{// ya creada la bd se ejecuta el script para su primer uso 
		$archivo = fopen('control/enfermeria.sql','r') or die("Problemas al cargar el script!");
		$sql="";
		while(!feof($archivo)){
			$sql .= fgets($archivo);
		}
		$sentencias = explode(";",$sql);
		$conexion->select_db($this->base);
		$contador = 0;
		foreach($sentencias as $sentencia) {
			echo $sentencia.";<br><br>";
			if($conexion->query($sentencia.";"))
			{
				//La consulta se ejecutó con éxito
			}else{
				if($conexion->error!='Query was empty')
				{
					$contador++;
					//echo 'Ocurrió un error al crear las tablas!';
					echo $conexion->error;
				}
			}

		}
		
		echo "Se importó la base de datos";
	}
}
function crearBase(){
	$conexion = NEW mysqli($this->host,$this->user,$this->pass);
	$conexion->query("CREATE DATABASE $this->base");
	$archivo = fopen('enfermeria.sql','r') or die("Problemas al cargar el script!");
		$sql="";
		while(!feof($archivo)){
			$sql .= fgets($archivo);
		}
		$sentencias = explode(";",$sql);
		$conexion->select_db($this->base);
		$contador = 0;
		foreach($sentencias as $sentencia) {
			//echo $sentencia.";<br><br>";
			if($conexion->query($sentencia.";"))
			{
				//La consulta se ejecutó con éxito
			}else{
				if($conexion->error!='Query was empty')
				{
					$contador++;
					echo 'Ocurrió un error al crear las tablas!';
					echo $conexion->error;
				}
			}

		}
		if($conexion->query("INSERT INTO usuario (tipo_usu,nom_usu,con_usu,nombre_usu,ape_pat,ape_mat) VALUES (
			'$_POST[tipo_usuario]','$_POST[usuario]','$_POST[contrasena]','".strtoupper($_POST['nombre'])."','".strtoupper($_POST['apaterno'])."','".strtoupper($_POST['amaterno'])."'
		)"))
		{
			echo json_encode(array('error'=>'0','mensaje'=>"Se importó la base de datos.\nPor favor inicie sesión con la cuenta que acaba de crear!"));
		}else{
			echo json_encode(array('error'=>'1','mensaje'=>$conexion->error));
		}
		

}

function exportarBD($tables)
{
   
   $link = mysqli_connect($this->host,$this->user,$this->pass);
   mysqli_select_db($link,$this->base);
   
   //get all of the tables
   if($tables == '*')
   {
      $tables = array();
      $result = mysqli_query($link,'SHOW TABLES');
      while($row = mysqli_fetch_row($result))
      {
         $tables[] = $row[0];
      }
   }
   else
   {
      $tables = is_array($tables) ? $tables : explode(',',$tables);
   }
   
   //cycle through
   date_default_timezone_set('America/Mexico_City');
   $return="";
   foreach($tables as $table)
   {
      $result = mysqli_query($link,'SELECT * FROM '.$table);
      $num_fields = mysqli_num_fields($result);
      
      $return.= 'DROP TABLE IF EXISTS '.$table.';';
      $row2 = mysqli_fetch_row(mysqli_query($link,'SHOW CREATE TABLE '.$table));
      $return.= "\n\n".$row2[1].";\n\n";
      
    for ($i = 0; $i < $num_fields; $i++)
      {
         while($row = mysqli_fetch_row($result))
         {
            $return.= 'INSERT INTO '.$table.' VALUES(';
            for($j=0; $j<$num_fields; $j++) 
            {
               $row[$j] = addslashes($row[$j]);
               //$row[$j] = preg_replace("\n","\\n",$row[$j]);
               if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
               if ($j<($num_fields-1)) { $return.= ','; }
            }
            $return.= ");\n";
         }
      }
      $return.="\n\n\n";
   }
   
   //save file
   $fileName = 'db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql';
   $handle = fopen($fileName,'w+');
   fwrite($handle,$return);
   fclose($handle);
   echo $fileName;
   if(header('Location: '.$fileName))
   {
   	if(unlink($fileName)){  }
   	header('Location: ../administrador.php');
   }
   
}

function existeBD(){
	$conexion = NEW mysqli($this->host,$this->user,$this->pass);
	echo $conexion->select_db($this->base);
}

}



 ?>

