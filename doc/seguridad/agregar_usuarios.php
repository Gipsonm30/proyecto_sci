<?php require_once ("../hf/header.php"); ?>
<?php if (!isset($_SESSION['seguridad'])){
echo "<center><h2>No tiene acceso al sistema</h2></center> ";
die();
}
?>

<!-- Menu -->
<nav id="menu">
<h2>Menu</h2>
<ul>
<li><a href="gestion_usuarios.php">Gestion de usuarios</a></li>
<li><a href="visor_logs.php">Logs de seguridad</a></li>									
<li><a href="seguridad.php">Regresar</a></li>							
<li><a href="../login/cerrar_sesion.php">Salir del sistema</a></li>							
</ul>
</nav>

<!-- Main -->
<section class="formulario"> 
<form method="POST" class="gestion_user">		
<input type="text" id="doc" maxlength="11" placeholder="Cedula" name="doc">			
<input type="text" list="items" name="perfil" placeholder="Perfil">
<datalist id="items">
<option value="002">Director Despacho</option>
<option value="003">Coordinador</option>
<option value="004">Almacenista</option>
<option value="005">Seguridad</option>
<option value="006">Analista</option>           
</datalist>
<input type="text" id="nombre" maxlength="29" placeholder="Nombre" name="nombre">	
<input type="text" id="Apellido" maxlength="29" placeholder="Apellido"	name="apellido">	
<input type="text" id="Ubicacion" list="ubicacion" maxlength="29" placeholder="Ubicacion" name="ubicacion" >			
<datalist id="ubicacion">
<option> San Bernardino </option>	
<option> Guarenas </option>	
<option> Guatire </option>	
<option> La Mariposa </option>	
<option> Tacoa </option>	
</datalist>
<input type="text" id="ext" maxlength="30" placeholder="Extencion telefonica" name="ext">		
<input type="text" list="estatus" name="estatus" placeholder="Estatus">
<datalist id="estatus">
<option> Activo </option>	
<option> Desactivo </option>	
</datalist>

<input type="password" id="password" maxlength="19" placeholder="Password"	name="password">	
<input type="email" id="correo" maxlength="49" placeholder="Correo" name="correo">
<input type="text" id="idempleado" maxlength="29" placeholder="Codigo Empleado" name="idempleado">
<input type="text" id="cargo" maxlength="19" placeholder="Cargo" name="cargo">	

<button type="submit" value="ingresar" name="btn1" class="button small">Registrar</button>
<button type="reset="class="button small">Limpiar</button>	
<?php

include ("../../clases/clase_usuarios.php"); 
if (isset($_POST['btn1'])) 
{	
$doc = $_POST['doc'];
$perfil=$_POST['perfil'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$ubicacion = $_POST['ubicacion'];
$ext = $_POST['ext'];	
$estatus=$_POST['estatus'];
$password=$_POST['password'];
$correo = $_POST['correo'];
$id_empleado = $_POST['idempleado'];
$cargo = $_POST['cargo'];		
gestion_user::Agregar_usuarios($doc,$perfil,$nombre,$apellido,$ubicacion,$ext,$estatus,$password,$correo,$id_empleado,$cargo);	   	
}	 
?>
</form>
</form>	
</section>

<!--fotter-->
<?php require_once ("../hf/footer.php"); ?>				
</body>
</html>