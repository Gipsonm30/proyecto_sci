<?php
session_start();
class log
{	
public static function ingreso_usuario($id,$password)
{
include ("conexiondb.php");
include ("auditoria.php");
$query = "SELECT * FROM usuarios WHERE id_usuario='$id'";
$resultado = pg_query($dbconn, $query);    
while($row = pg_fetch_assoc($resultado)) {
$doc=$row['id_usuario'];
$perfil=$row['cod_perfil'];
$pass=$row['password'];
$estatus=$row['status_user'];
}

 // validacion de que el campo cedula no tenga letras 
switch (true) {     
case (!is_numeric($id)):
echo'<script>
swal({title:"",text:"El campo usuario no debe contener letras",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break;   

// validacion de que los campos del formulario no estan vacios
case $id=='' or $password=='';
echo'<script>
swal({title:"",text:"Ninguno de los campos obligatorios debe estar vacio",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break;       

// validacion que el usuarios no exista en la base de datos
case pg_num_rows ($resultado)==0;
echo'<script>swal({title:"",text:"El usuario no se encuentra registrado en el sistema",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';    
break;

// validacion que el usuario este activo
case $estatus == "Desactivo";
echo'<script>swal({title:"",text:"Su usuario esta Desactivado, comuniquese con el administrador",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';    
auditoria:: registro_evento ($id_usuario="$doc",$fecha=date("d/m/Y"),$hora=date("G:i:s"),$host=$_SERVER["SERVER_ADDR"],$tipo="Login Errado");
break;

// Verificacion del password ingresado
case $pass <> $password;
echo'<script>swal({title:"",text:"Los datos no coinciden",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';    
// Se registra el evento        
auditoria:: registro_evento ($id_usuario="$doc",$fecha=date("d/m/Y"),$hora=date("G:i:s"),$host=$_SERVER["SERVER_ADDR"],$tipo="Login Errado");
break;

// si el password coincide, se toma el tipo de perfil y se direcciona a la pagina 

case $pass == $password;  
if ($perfil==001) {
$_SESSION['root'] = $id;  
header("Location:doc/root/root.php");
// Se registra el evento
auditoria:: registro_evento ($id_usuario="$doc",$fecha=date("d/m/Y"),$hora=date("G:i:s"),$host=$_SERVER["SERVER_ADDR"],$tipo="Login Exitoso");  
}
else if ($perfil==002) {
$_SESSION['ddespacho'] = $id;  
header("Location:doc/ddespacho/ddespacho.php");

// Se registra el evento en el log de auditoria 
auditoria:: registro_evento ($id_usuario="$doc",$fecha=date("d/m/Y"),$hora=date("G:i:s"),$host=$_SERVER["SERVER_ADDR"],$tipo="Login Exitoso"); 
}   
else if ($perfil==003) {
$_SESSION['coordinador'] = $id;  
header("Location:doc/coordinador/coordinador.php");
// Se registra el evento
auditoria:: registro_evento ($id_usuario="$doc",$fecha=date("d/m/Y"),$hora=date("G:i:s"),$host=$_SERVER["SERVER_ADDR"],$tipo="Login Exitoso");  
}
else if ($perfil==004) {
$_SESSION['almacenista'] = $id;  
header("Location:doc/almacenista/almacenista.php");
// Se registra el evento
auditoria:: registro_evento ($id_usuario="$doc",$fecha=date("d/m/Y"),$hora=date("G:i:s"),$host=$_SERVER["SERVER_ADDR"],$tipo="Login Exitoso");  
}
else if ($perfil==005) {
$_SESSION['seguridad'] = $id;  
header("Location:doc/seguridad/seguridad.php");
// Se registra el evento
auditoria:: registro_evento ($id_usuario="$doc",$fecha=date("d/m/Y"),$hora=date("G:i:s"),$host=$_SERVER["SERVER_ADDR"],$tipo="Login Exitoso");  
}
else if ($perfil==006) {
$_SESSION['analista'] = $id;  
header("Location:doc/analista/analista.php");
// Se registra el evento
auditoria:: registro_evento ($id_usuario="$doc",$fecha=date("d/m/Y"),$hora=date("G:i:s"),$host=$_SERVER["SERVER_ADDR"],$tipo="Login Exitoso");  
}
break;
}  
}

// funcion para resetear password
public static function reset_password($id,$password1,$password2)
{
include ("conexiondb.php");
include ("auditoria.php");

$query = "SELECT id_usuario FROM usuarios WHERE id_usuario ='$id' ";        
$validar= pg_query ($dbconn,$query);         

switch (true) {  

// validacion de que los campos del formulario no estan vacios 
case $id=='' or $password1=='' or $password2=='';
echo'<script>
swal({title:"",text:"Ninguno de los campos obligatorios debe estar vacio",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break;      

// validacion de que el campo cedula no contiene letras 
case (!is_numeric($id)):
echo'<script>
swal({title:"",text:"El campo cedula no debe contener letras",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break;   

// validacion que el usuario esta creado en la base de datos
case pg_num_rows($validar)==0;
echo'<script>swal({title:"",text:"El usuario no se encuentra registrado en el sistema",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break;

// validacion que los password coincidan
case strcmp($password1, $password2);
echo'<script>swal({title:"",text:"Los password no coinciden",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break;

case $query1= "UPDATE usuarios SET password='$password1' WHERE id_usuario='$id' ";
$resultado= pg_query($dbconn,$query1);   

// Se registra el evento en el log de auditoria  
auditoria:: registro_evento ($id_usuario=$id,$fecha=date("d/m/Y"),$hora=date("G:i:s"),$host=$_SERVER["SERVER_ADDR"],$tipo="Reset Password");
echo'<script> swal({title:"",text:"Su password a sido cambiado",timer: 3000,confirmButtonColor:"#2E64FE",showConfirmButton:true}); 
</script>';  
break;
}
}

}
?>

