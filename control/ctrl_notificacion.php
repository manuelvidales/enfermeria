<?php 
function enviarNotificacion($mensaje){
require "Pusher.php"; 
$options = array(
    'cluster' => 'us2',
    'useTLS' => true
/*    'encrypted' => true     */
  );
  $pusher = new Pusher\Pusher(
    'a53ce913127d8c4400c0',
    '8d7bef4d5178a748c55f',
    '619911',
    $options
  );

  $data['mensaje'] = $mensaje;
  $pusher->trigger('enfermeria', 'e_nuevo_paciente', $data);  
/*$mensaje = echo "Hola mundo";*/

}
 ?>