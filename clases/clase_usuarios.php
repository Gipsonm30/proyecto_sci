<?php

class gestion_user { 
public static function agregar_usuarios($doc,$perfil,$nombre,$apellido,$ubicacion,$ext,$estatus,$password,$correo,$id_empleado,$cargo)
{
include ("conexiondb.php");
include ("auditoria.php");

$query_perfil = "SELECT cod_perfil FROM perfiles WHERE cod_perfil ='$perfil' ";        
$validar_perfil= pg_query ($dbconn,$query_perfil);   

$query = "SELECT id_usuario FROM usuarios WHERE id_usuario ='$doc' ";        
$validar= pg_query ($dbconn,$query);        
switch (true) {  

// validacion de que el campo cedula no contiene letras 
case (!is_numeric($doc)):
echo'<script>
swal({title:"",text:"El campo cedula no debe contener letras",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break;   

// validacion de que el campo nombre no contiene numeros 
case (is_numeric($nombre)):
echo'<script>
swal({title:"",text:"El campo nombre no debe contener numeros",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break;   

// validacion de que el campo apellido no contiene letras 
case (is_numeric($apellido)):
echo'<script>
swal({title:"",text:"El campo apellido no debe contener numeros",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break;   

// validacion de que los campos del formulario no estan vacios 
case $doc=='' or $perfil=='' or $nombre=='' or $apellido=='' or $ubicacion=='' or $ext=='' or $estatus=='' or $password=='' or $correo='' or $id_empleado='' or $cargo=='';

echo'<script>
swal({title:"",text:"Ninguno de los campos obligatorios debe estar vacio",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break;    

// validacion de que el combo box no fue manipulado
case pg_num_rows($validar_perfil)==0;
echo'<script>	
swal({title:"",text:"Funcion no permitida",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break;       

// validacion que el usuarios no exista ya creado en la base de datos
case pg_num_rows($validar);
echo'<script>swal({title:"",text:"El registro ya existe",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break;

// se ingresan los datos del nuevo usuario 
case $query1= "INSERT INTO usuarios (id_usuario,cod_perfil,nombre,apellido,ubicacion,ext,status_user,password,correo,id_empleado,cargo) values ('$doc','$perfil','$nombre','$apellido','$ubicacion','$ext','$estatus','$password', '$correo', '$id_empleado','$cargo')";      
$resultado= pg_query($dbconn,$query1);   

// Se registra el evento en el log de auditoria  
auditoria:: registro_evento ($id_usuario=$_SESSION['seguridad'],$fecha=date("d/m/Y"),$hora=date("G:i:s"),$host=$_SERVER["SERVER_ADDR"],$tipo="Registro Usuario");

echo'<script> swal({title:"",text:"El registro fue creado exitosamente",timer: 3000,confirmButtonColor:"#2E64FE",showConfirmButton:true}); 
</script>';           
break;
}     
}

// funcion para editar usuarios
public static function editar_usuarios($doc,$perfil,$nombre,$apellido,$ubicacion,$ext,$estatus,$password,$correo,$id_empleado,$cargo)
{
include ("conexiondb.php");
include ("auditoria.php");

$query_perfil = "SELECT cod_perfil FROM perfiles WHERE cod_perfil ='$perfil' ";        
$validar_perfil= pg_query ($dbconn,$query_perfil);           

switch (true) {        

// validacion de que los campos del formulario no estan vacios   
case $doc=='' or $perfil=='' or $nombre=='' or $apellido=='' or $ubicacion=='' or $ext=='' or $estatus=='' or $password=='' or $correo='' or $id_empleado='' or $cargo=='';

echo'<script>
swal({title:"",text:"Ninguno de los campos obligatorios debe estar vacio",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break;    

// validacion de que el combo box no fue manipulado
case pg_num_rows($validar_perfil)==0;
echo'<script>	
swal({title:"",text:"Funcion no permitida",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break;       

// validacion de que el campo nombre no contiene numeros 
case (is_numeric($nombre)):
echo'<script>
swal({title:"",text:"El campo nombre no debe contener numeros",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break;   

// validacion de que el campo apellido no contiene letras 
case (is_numeric($apellido)):
echo'<script>
swal({title:"",text:"El campo apellido no debe contener numeros",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break;   

// se editan los datos del usuario 
case $query1= "UPDATE usuarios
SET id_usuario='$doc', cod_perfil='$perfil', nombre='$nombre', apellido='$apellido', ubicacion='$ubicacion', ext='$ext', status_user='$estatus', password='$password', correo='$correo', id_empleado='$id_empleado', cargo='$cargo' WHERE id_usuario='$doc' ";

$resultado= pg_query($dbconn,$query1);   
// Se registra el evento en el log de auditoria  
auditoria:: registro_evento ($id_usuario=$_SESSION['seguridad'],$fecha=date("d/m/Y"),$hora=date("G:i:s"),$host=$_SERVER["SERVER_ADDR"],$tipo="Usuario Editado");
echo'<script> swal({title:"",text:"El registro fue Editado exitosamente",timer: 3000,confirmButtonColor:"#2E64FE",showConfirmButton:true}); 
</script>';        
break;
}
}
}
?>


