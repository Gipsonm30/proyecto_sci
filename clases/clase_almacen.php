<?php
class gestion_almacen {

// funcion agregar material 
public static function agregar_material ($serial_factura,$fecha,$serial_material,$proveedor,$descripcion,$cantidad,$doc)
{
include ("conexiondb.php");
include ("auditoria.php");

$query = "SELECT cant FROM materiales WHERE serial_material ='$serial_material' "; 
$resultado= pg_query ($dbconn,$query);
$row = pg_fetch_assoc($resultado);
$cantidad_material=$row['cant'];

// validacion de que los campos del formulario no estan vacios    
switch (true) {        
case $serial_factura=='' or $serial_material=='' or $proveedor=='' or $cantidad=='';
echo'<script>
swal({title:"",text:"Ninguno de los campos obligatorios debe estar vacio",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break; 

// validacion de que el combobox no fue manipulado
case pg_num_rows($resultado)==0;
echo'<script>swal({title:"",text:"Funcion no permitida",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';    
break;  

// validacion que la cantidad no tenga letras 
case (!is_numeric($cantidad));
echo'<script>swal({title:"",text:"La cantidad de material no debe contener letras",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';    
break;  

// validacion que el serial factura no tenga letras 
case (!is_numeric($serial_factura));
echo'<script>swal({title:"",text:"El serial de factura no debe contener letras ",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';    
break;  

// se ingresan los datos de los materiales nuevos
case $query1= "INSERT INTO ingre_material(id_factura_material,fecha_ingreso_mat,serial_ingreso_mat,proveedor_mat,desc_material,cant_ingreso_mat) values ('$serial_factura','$fecha','$serial_material','$proveedor','$descripcion','$cantidad')";      
$resultado1= pg_query($dbconn,$query1); 

// se actualiza la cantidad en la tabla materiales 
$cantidad_material=$cantidad_material+$cantidad;
$query2= "UPDATE materiales SET cant='$cantidad_material' WHERE serial_material='$serial_material'";
$resultado2= pg_query($dbconn,$query2);

// Se registra el evento en el log de auditoria  
auditoria:: registro_evento ($id_usuario="$doc",$fecha=date("d/m/Y"),$hora=date("G:i:s"),$host=$_SERVER["SERVER_ADDR"],$tipo="Registro material");

echo'<script> swal({title:"",text:"El registro fue creado exitosamente",timer: 3000,confirmButtonColor:"#2E64FE",showConfirmButton:true}); 
</script>';           
break;  
}
}      

// funcion agregar repuesto
public static function agregar_repuesto ($serial_factura,$fecha,$serial_repuesto,$proveedor,$descripcion,$cantidad,$doc)
{
include ("conexiondb.php");
include ("auditoria.php");

$query = "SELECT cant FROM repuestos WHERE serial ='$serial_repuesto' "; 
$resultado = pg_query ($dbconn,$query);
$row = pg_fetch_assoc($resultado);
$cantidad_repuesto = $row['cant'];

// validacion de que los campos del formulario no estan vacios    
switch (true) {        
case $serial_factura=='' or $serial_repuesto=='' or $proveedor=='' or $cantidad=='';
echo'<script>
swal({title:"",text:"Ninguno de los campos obligatorios debe estar vacio",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break; 

// validacion de que el combobox no fue manipulado
case pg_num_rows($resultado)==0;
echo'<script>swal({title:"",text:"Funcion no permitida",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';    
break;  

// validacion que la cantidad no tenga letras 
case (!is_numeric($cantidad));
echo'<script>swal({title:"",text:"La cantidad de material no debe contener letras",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';    
break;  

// validacion que el serial factura no tenga letras 
case (!is_numeric($serial_factura));
echo'<script>swal({title:"",text:"El serial de factura no debe contener letras ",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';    
break;  

// se ingresan los datos de los repuestos nuevos
case $query1= "INSERT INTO ingre_repuesto(id_factura,fecha_ingre_rep,serial_ing_rep,proveedor_ing_rep,desc_repuesto,cant_ingreso_rep) values ('$serial_factura','$fecha','$serial_repuesto','$proveedor','$descripcion','$cantidad')";
$resultado1= pg_query($dbconn,$query1);  
$cantidad_repuesto = $cantidad_repuesto + $cantidad;
 
// se actualiza la cantidad en la tabla repuesto 
$query2= "UPDATE repuestos SET cant='$cantidad_repuesto' WHERE serial ='$serial_repuesto' ";
$resultado2= pg_query($dbconn,$query2);

// Se registra el evento en el log de auditoria  
auditoria:: registro_evento ($id_usuario="$doc",$fecha=date("d/m/Y"),$hora=date("G:i:s"),$host=$_SERVER["SERVER_ADDR"],$tipo="Registro repuesto");

echo'<script> swal({title:"",text:"El registro fue creado exitosamente",timer: 3000,confirmButtonColor:"#2E64FE",showConfirmButton:true}); 
</script>';           
break;
}  
}

// funcion agregar equipo informatico 
public static function agregar_equipoinf ($serial_factura,$fecha,$serial_material,$proveedor,$descripcion,$cantidad,$doc)
{
include ("conexiondb.php");
include ("auditoria.php");

$query = "SELECT cant FROM equipo_inf WHERE cod_inventario ='$serial_material' "; 
$resultado= pg_query ($dbconn,$query);
$row = pg_fetch_assoc($resultado);
$cantidad_equipo=$row['cant'];

// validacion de que los campos del formulario no estan vacios    
switch (true) {        
case $serial_factura=='' or $serial_material=='' or $proveedor=='' or $cantidad=='';
echo'<script>
swal({title:"",text:"Ninguno de los campos obligatorios debe estar vacio",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break; 

// validacion de que el combobox no fue manipulado
case pg_num_rows($resultado)==0;
echo'<script>swal({title:"",text:"Funcion no permitida",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';    
break;  

// validacion que la cantidad no tenga letras 
case (!is_numeric($cantidad));
echo'<script>swal({title:"",text:"La cantidad de material no debe contener letras",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';    
break;  

// validacion que el serial factura no tenga letras 
case (!is_numeric($serial_factura));
echo'<script>swal({title:"",text:"El serial de factura no debe contener letras ",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';    
break;  

// se ingresan los datos del equipo nuevo
case $query1= "INSERT INTO ingreso_equipo (id_factura,fecha_ingre_equipo,cod_invet_ingre_equipo,proveedor_ing_equipo,equipo_desc_fact,cant_ingreso) values ('$serial_factura','$fecha','$serial_material','$proveedor','$descripcion','$cantidad')";      
$resultado1= pg_query($dbconn,$query1); 

// se actualiza la cantidad en la tabla equipo 
$cantidad_equipo=$cantidad_equipo + $cantidad;
$query2= "UPDATE equipo_inf SET cant='$cantidad_equipo' WHERE cod_inventario ='$serial_material' ";
$resultado2= pg_query($dbconn,$query2);

// Se registra el evento en el log de auditoria  
auditoria:: registro_evento ($id_usuario="$doc",$fecha=date("d/m/Y"),$hora=date("G:i:s"),$host=$_SERVER["SERVER_ADDR"],$tipo="Registro equipo");

echo'<script> swal({title:"",text:"El registro fue creado exitosamente",timer: 3000,confirmButtonColor:"#2E64FE",showConfirmButton:true}); 
</script>';           
break;
} 
}      
}
?>





