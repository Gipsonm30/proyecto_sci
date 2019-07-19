<?php 

class auditoria 
  {	
	public static function registro_evento($id_usuario,$fecha,$hora,$host,$tipo)
	{
include ("conexiondb.php");
$query= "INSERT INTO auditorias(id_usuario,fecha_a,hora_a,host,tipo_a) values ('$id_usuario','$fecha','$hora','$host','$tipo')";
$resultado= pg_query($dbconn,$query);  
pg_close($dbconn);
	}     
  } 

?>

