<?php
class gestion_solicitud {

// funcion para solicitar materiales por director y coordinador
public static function solicitud_materiales ($serial,$doc,$unidad,$ext,$cantidad,$estatus,$fecha_actual,$tipo)
{
include ("conexiondb.php");
include ("auditoria.php");

$query = "SELECT cant FROM materiales WHERE serial_material ='$serial' "; 
$resultado= pg_query ($dbconn,$query);
$row = pg_fetch_assoc($resultado);
$cantidad_m=$row['cant'];


switch (true) {        
// validacion de que los campos del formulario no estan vacios 
case $serial=='' or $doc=='' or $unidad=='' or $ext=='' or $cantidad=='';
echo'<script>
swal({title:"",text:"Ninguno de los campos obligatorios debe estar vacio",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break; 

// validacion de que el combobox no fue manipulado
case pg_num_rows($resultado)==0;
echo'<script>swal({title:"",text:"Funcion no permitida",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';    
break;  

// validacion de que el campo cantidad no contenga letras 
case (!is_numeric($cantidad)):
echo'<script>
swal({title:"",text:"El campo cantidad no debe contener letras",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break;

// validacion de cantidad disponible en el almacen
case $cantidad > $cantidad_m;
echo'<script>swal({title:"",text:"La cantidad solicitada no esta disponible en almacen, intente una cantidad menor",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';    
break;  

// se ingresan los datos de la solicitud de piezas
case $query1= "INSERT INTO solicitudes(serial_material,id_usuario,unidad_sol,ext_sol,cant,fecha_auto,fecha_solicitud,estatus,tipo) values ('$serial','$doc','$unidad','$ext','$cantidad','$fecha_actual','$fecha_actual','$estatus','$tipo')";      
$resultado= pg_query($dbconn,$query1);  

//se resta el material solicitado
$cantidad_m = $cantidad_m - $cantidad;
$query2= "UPDATE materiales SET cant='$cantidad_m' WHERE serial_material='$serial' ";
$resultado2= pg_query($dbconn,$query2);

// Se registra el evento en el log de auditoria  
auditoria:: registro_evento ($id_usuario="$doc",$fecha=date("d/m/Y"),$hora=date("G:i:s"),$host=$_SERVER["SERVER_ADDR"],$tipo="Registro Solicitud");

echo'<script> swal({title:"",text:"El registro fue creado exitosamente",timer: 3000,confirmButtonColor:"#2E64FE",showConfirmButton:true}); 
</script>';           
break;
}
}      

// Funcion para solicitar repuestos por director y coordinador 
public static function solicitud_repuestos($serial,$doc,$unidad,$ext,$cantidad,$estatus,$fecha_actual,$tipo)
{
include ("conexiondb.php");
include ("auditoria.php");

$query = "SELECT cant FROM repuestos WHERE serial ='$serial' "; 
$resultado= pg_query ($dbconn,$query);
$row = pg_fetch_assoc($resultado);
$cantidad_r=$row['cant'];


switch (true) {        
// validacion de que los campos del formulario no estan vacios 
case $serial=='' or $doc=='' or $unidad=='' or $ext=='' or $cantidad=='';
echo'<script>
swal({title:"",text:"Ninguno de los campos obligatorios debe estar vacio",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break; 

// validacion de que el combobox no fue manipulado
case pg_num_rows($resultado)==0;
echo'<script>swal({title:"",text:"Funcion no permitida",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';    
break;  

// validacion de que el campo cantidad no contenga letras 
case (!is_numeric($cantidad)):
echo'<script>
swal({title:"",text:"El campo cantidad no debe contener letras",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break;

// validacion de cantidad disponible en el almacen
case $cantidad > $cantidad_r;
echo'<script>swal({title:"",text:"La cantidad solicitada no esta disponible en almacen, intente una cantidad menor",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';    
break;  

// se ingresan los datos de la solicitud de piezas
case $query1= "INSERT INTO solicitudes(serial_material,id_usuario,unidad_sol,ext_sol,cant,fecha_auto,fecha_solicitud,estatus,tipo) values ('$serial','$doc','$unidad','$ext','$cantidad', '$fecha_actual','$fecha_actual','$estatus','$tipo')";      
$resultado= pg_query($dbconn,$query1);  

//se resta el repuesto solicitado
$cantidad_r = $cantidad_r-$cantidad;
$query2= "UPDATE repuestos SET cant='$cantidad_r' WHERE serial ='$serial' ";
$resultado2= pg_query($dbconn,$query2);

// Se registra el evento en el log de auditoria  
auditoria:: registro_evento ($id_usuario="$doc",$fecha=date("d/m/Y"),$hora=date("G:i:s"),$host=$_SERVER["SERVER_ADDR"],$tipo="Registro Solicitud");

echo'<script> swal({title:"",text:"El registro fue creado exitosamente",timer: 3000,confirmButtonColor:"#2E64FE",showConfirmButton:true}); 
</script>';           
break;
} 
} 

// funcion para solicitar equipos por director y coordinador
public static function solicitud_equipos ($serial,$doc,$unidad,$ext,$cantidad,$estatus,$fecha_actual,$tipo)
{
include ("conexiondb.php");
include ("auditoria.php");

$query = "SELECT cant FROM equipo_inf WHERE cod_inventario ='$serial' "; 
$resultado= pg_query ($dbconn,$query);
$row = pg_fetch_assoc($resultado);
$cantidad_e=$row['cant'];

switch (true) {        
// validacion de que los campos del formulario no estan vacios 
case $serial=='' or $doc=='' or $unidad=='' or $ext=='' or $cantidad=='';
echo'<script>
swal({title:"",text:"Ninguno de los campos obligatorios debe estar vacio",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break; 

// validacion de que el combobox no fue manipulado
case pg_num_rows($resultado)==0;
echo'<script>swal({title:"",text:"Funcion no permitida",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';    
break;  

// validacion de que el campo cantidad no contenga letras 
case (!is_numeric($cantidad)):
echo'<script>
swal({title:"",text:"El campo cantidad no debe contener letras",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break;

// validacion de cantidad disponible en el almacen
case $cantidad > $cantidad_e;
echo'<script>swal({title:"",text:"La cantidad solicitada no esta disponible en almacen, intente una cantidad menor",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';    
break;  

// se ingresan los datos de la solicitud de piezas
case $query1= "INSERT INTO solicitudes(serial_material,id_usuario,unidad_sol,ext_sol,cant,fecha_auto,fecha_solicitud,estatus,tipo) values ('$serial','$doc','$unidad','$ext','$cantidad','$fecha_actual','$fecha_actual','$estatus','$tipo')";      
$resultado= pg_query($dbconn,$query1);  

//se resta el material solicitado
$cantidad_e = $cantidad_e - $cantidad;
$query2= "UPDATE equipo_inf SET cant='$cantidad_e' WHERE cod_inventario ='$serial' ";
$resultado2= pg_query($dbconn,$query2);

// Se registra el evento en el log de auditoria  
auditoria:: registro_evento ($id_usuario="$doc",$fecha=date("d/m/Y"),$hora=date("G:i:s"),$host=$_SERVER["SERVER_ADDR"],$tipo="Registro Solicitud");

echo'<script> swal({title:"",text:"El registro fue creado exitosamente",timer: 3000,confirmButtonColor:"#2E64FE",showConfirmButton:true}); 
</script>';           
break;
}   
}      

// funcion para solicitar materiales analista
public static function solicitud_materiales_a ($serial,$doc,$unidad,$ext,$cantidad,$estatus,$fecha_actual,$tipo)
{
include ("conexiondb.php");
include ("auditoria.php");

$query = "SELECT cant FROM materiales WHERE serial_material ='$serial' "; 
$resultado= pg_query ($dbconn,$query);
$row = pg_fetch_assoc($resultado);
$cantidad_ma=$row['cant'];

switch (true) {        
// validacion de que los campos del formulario no estan vacios 
case $serial=='' or $doc=='' or $unidad=='' or $ext=='' or $cantidad=='';
echo'<script>
swal({title:"",text:"Ninguno de los campos obligatorios debe estar vacio",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break; 

// validacion de que el combobox no fue manipulado
case pg_num_rows($resultado)==0;
echo'<script>swal({title:"",text:"Funcion no permitida",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';    
break;  

// validacion de que el campo cantidad no contenga letras 
case (!is_numeric($cantidad)):
echo'<script>
swal({title:"",text:"El campo cantidad no debe contener letras",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break;

// validacion de cantidad disponible en el almacen
case $cantidad > $cantidad_ma;
echo'<script>swal({title:"",text:"La cantidad solicitada no esta disponible en almacen, intente una cantidad menor",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';    
break;  

// se ingresan los datos de la solicitud de piezas
case $query1= "INSERT INTO solicitudes(serial_material,id_usuario,unidad_sol,ext_sol,cant,fecha_solicitud,estatus,tipo) values ('$serial','$doc','$unidad','$ext','$cantidad','$fecha_actual','$estatus','$tipo')";    
$resultado= pg_query($dbconn,$query1);  

//se resta el material solicitado
$cantidad_ma=$cantidad_ma-$cantidad;
$query2= "UPDATE materiales SET cant='$cantidad_ma' WHERE serial_material='$serial' ";
$resultado2= pg_query($dbconn,$query2);

// Se registra el evento en el log de auditoria  
auditoria:: registro_evento ($id_usuario="$doc",$fecha=date("d/m/Y"),$hora=date("G:i:s"),$host=$_SERVER["SERVER_ADDR"],$tipo="Registro Solicitud");

echo'<script> swal({title:"",text:"El registro fue creado exitosamente",timer: 3000,confirmButtonColor:"#2E64FE",showConfirmButton:true}); 
</script>';           
break;
} 
}      

// Funcion para solicitar repuestos analista
public static function solicitud_repuestos_a ($serial,$doc,$unidad,$ext,$cantidad,$estatus,$fecha_actual,$tipo)
{
include ("conexiondb.php");
include ("auditoria.php");

$query = "SELECT cant FROM repuestos WHERE serial ='$serial' "; 
$resultado= pg_query ($dbconn,$query);
$row = pg_fetch_assoc($resultado);
$cantidad_ra=$row['cant'];

switch (true) {        
// validacion de que los campos del formulario no estan vacios 
case $serial=='' or $doc=='' or $unidad=='' or $ext=='' or $cantidad=='';
echo'<script>
swal({title:"",text:"Ninguno de los campos obligatorios debe estar vacio",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break; 

// validacion de que el combobox no fue manipulado
case pg_num_rows($resultado)==0;
echo'<script>swal({title:"",text:"Funcion no permitida",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';    
break;  

// validacion de que el campo cantidad no contenga letras.
case (!is_numeric($cantidad)):
echo'<script>
swal({title:"",text:"El campo cantidad no debe contener letras",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break;

// validacion de cantidad disponible en el almacen.
case $cantidad > $cantidad_ra;
echo'<script>swal({title:"",text:"La cantidad solicitada no esta disponible en almacen, intente una cantidad menor",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';    
break;  

// se ingresan los datos de la solicitud de piezas.
case $query1= "INSERT INTO solicitudes(serial_material,id_usuario,unidad_sol,ext_sol,cant,fecha_solicitud,estatus,tipo) values ('$serial','$doc','$unidad','$ext','$cantidad','$fecha_actual','$estatus','$tipo')";      
$resultado= pg_query($dbconn,$query1);  

//se resta el repuesto solicitado
$cantidad_ra = $cantidad_ra-$cantidad;
$query2= "UPDATE repuestos SET cant='$cantidad_ra' WHERE serial ='$serial' ";
$resultado2= pg_query($dbconn,$query2);

// Se registra el evento en el log de auditoria  
auditoria:: registro_evento ($id_usuario="$doc",$fecha=date("d/m/Y"),$hora=date("G:i:s"),$host=$_SERVER["SERVER_ADDR"],$tipo="Registro Solicitud");
echo'<script> swal({title:"",text:"El registro fue creado exitosamente",timer: 3000,confirmButtonColor:"#2E64FE",showConfirmButton:true}); 
</script>';           
break;
}   
}

// funcion para aprobar / rechaar solicitudes.
public static function editar_solicitud($id,$fecha,$estatus,$doc)
{
include ("conexiondb.php");
require_once ("auditoria.php");    
switch (true) {
case $estatus=='Aprobado':

// se modifican los datos de la solicitud si es aprobada
$query1= "UPDATE solicitudes SET fecha_auto='$fecha',estatus='$estatus' WHERE id_solic='$id' ";
$resultado= pg_query($dbconn,$query1);   

// Se registra el evento en el log de auditoria  
auditoria:: registro_evento ($id_usuario="$doc",$fecha=date("d/m/Y"),$hora=date("G:i:s"),$host=$_SERVER["SERVER_ADDR"],$tipo="Solicitud Aprobada");
break;

// si la solicitud es rechazada 	
case $estatus='Rechazado';
$query2 = "SELECT serial_material,cant,tipo FROM solicitudes WHERE id_solic ='$id' "; 
$resultado= pg_query ($dbconn,$query2);
$row = pg_fetch_assoc($resultado);
$serial=$row['serial_material'];
$cantidad_solicitada=$row['cant'];
$tipo_solicitud=$row['tipo'];

// se consulta si la solicitud es de materiales para reponer los materiales 
if ($tipo_solicitud=='m')
{
$query3="SELECT cant FROM materiales WHERE serial_material='$serial'";
$resultado= pg_query ($dbconn,$query3);
$row = pg_fetch_assoc($resultado);
$cantidad_materiales=$row['cant'];
$cantidad_materiales=$cantidad_materiales+$cantidad_solicitada;
$query4= "UPDATE materiales SET cant='$cantidad_materiales' WHERE serial_material='$serial' ";
$resultado= pg_query($dbconn,$query4);  
}
// se consulta si la solicitud es de repuesto para reponer los repuestos
elseif ($tipo_solicitud=='r')
{
$query5="SELECT cant FROM repuestos WHERE serial ='$serial'";
$resultado= pg_query ($dbconn,$query5);
$row = pg_fetch_assoc($resultado);
$cantidad_repuesto=$row['cant'];
$cantidad_repuesto=$cantidad_repuesto+$cantidad_solicitada;
$query6= "UPDATE repuestos SET cant='$cantidad_repuesto' WHERE serial ='$serial' ";
$resultado= pg_query($dbconn,$query6); 
}
// se modifican los datos de la solicitud
$query7= "UPDATE solicitudes SET fecha_auto='$fecha',estatus='$estatus' WHERE id_solic='$id' ";
$resultado= pg_query($dbconn,$query7);   
// Se registra el evento en el log de auditoria          	
auditoria:: registro_evento ($id_usuario="$doc",$fecha=date("d/m/Y"),$hora=date("G:i:s"),$host=$_SERVER["SERVER_ADDR"],$tipo="Solicitud Rechazada");
break;
}
}  

// funcion para dar por entregdas las solicitudes 
public static function procesar_solicitud ($id,$fecha,$estatus,$doc){
include ("conexiondb.php");
require_once ("auditoria.php"); 

// se modifican los datos de la solicitud al ser procesada 
$query1= "UPDATE solicitudes SET fecha_entrega='$fecha',estatus='$estatus' WHERE id_solic='$id' ";
$resultado= pg_query($dbconn,$query1); 
echo "<a href=../pdf/orden_entrega.php?id=$id </a>";
// Se registra el evento en el log de auditoria  
auditoria:: registro_evento ($id_usuario="$doc",$fecha=date("d/m/Y"),$hora=date("G:i:s"),$host=$_SERVER["SERVER_ADDR"],$tipo="Solicitud Finalizada");
pg_close($dbconn);
}
}
?>





