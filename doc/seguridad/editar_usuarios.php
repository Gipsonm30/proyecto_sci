<?php require_once ("../hf/header.php"); ?>
<?php if (!isset($_SESSION['seguridad'])){
echo "<center><h2>No tiene acceso al sistema</h2></center> ";
die();
}
?>
<?php include("../../clases/conexiondb.php"); ?>
<?php include("../../clases/clase_usuarios.php"); ?>

<!-- Menu -->
<nav id="menu">
<h2>Menu</h2>
<ul>
<li><a href="gestion_usuarios.php">Gestion de usuarios</a></li>
<li><a href="visor_logs.php">Logs de seguridad</a></li>								
<li><a href="seguridad.php">Pantalla principal</a></li>							
<li><a href="../login/cerrar_sesion.php">Salir del sistema</a></li>							
</ul>
</nav>

<!-- Main -->
<?php
if  (isset($_GET['id'])) {
$id = $_GET['id'];
$query = "SELECT * FROM usuarios WHERE id_usuario ='$id'";
$result = pg_query($dbconn, $query);
if (pg_num_rows($result)==1) {
$row = pg_fetch_array($result);
$id_usuario = $row['id_usuario'];
$perfil = $row['cod_perfil'];
$nombre = $row['nombre'];
$apellido = $row['apellido'];
$ubicacion = $row['ubicacion'];
$ext = $row['ext'];
$estatus = $row['status_user'];
$password = $row['password'];
$correo= $row['correo'];
$carnet = $row['id_empleado'];
$cargo = $row['cargo'];
}
}

if (isset($_POST['update'])) 
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
gestion_user::editar_usuarios($doc,$perfil,$nombre,$apellido,$ubicacion,$ext,$estatus,$password,$correo,$id_empleado,$cargo);	   	
}	
?>    
<section class="formulario"> 
<form method="POST" class="gestion_user">	
<input type="text" id="doc" maxlength="12" placeholder="Cedula" readonly="readonly"  name="doc" value="<?php echo $id_usuario; ?>">	
<input type="text" list="items" name="perfil" placeholder="Perfil" value="<?php echo $perfil; ?>">
<datalist id="items">
<option value="002">Director Despacho</option>
<option value="003">Coordinador</option>
<option value="004">Almacenista</option>
<option value="005">Seguridad</option>
<option value="006">Analista</option>           
</datalist>
<input type="text" id="nombre" maxlength="30" name="nombre" value="<?php echo $nombre; ?>">	
<input type="text" id="Apellido" maxlength="30" placeholder="Apellido"	name="apellido" value="<?php  echo $apellido; ?>">	
<select name="ubicacion" placeholder="Ubicacion" value="<?php echo $ubicacion;?>" >
<option value="San bernardino">San bernardino</option>
<option value="Guarenas">Guarenas</option>
<option value="Guatire">Guatire</option>
<option value="La mariposa">La mariposa</option>
<option value="tacoa">Tacoa</option>
</select>
<input type="text" id="ext" maxlength="30" placeholder="Extencion telefonica" name="ext" value="<?php echo $ext; ?> " >	
<select name="estatus" placeholder="Estatus" value=" <?php echo $estatus; ?>" >
<option value="Activo">Activo</option>
<option value="Desactivo">Desactivo</option>
</select>
<input type="password" id="password" maxlength="10" placeholder="Password"	name="password" value="<?php echo $password; ?>">	
<input type="text" id="correo" maxlength="100" placeholder="Correo" name="correo" value="<?php echo $correo; ?>">
<input type="text" id="idempleado" maxlength="30" placeholder="Codigo Empleado" name="idempleado" value="<?php echo $carnet; ?>">
<input type="text" id="cargo" maxlength="20" placeholder="Cargo" name="cargo" value="<?php echo $cargo; ?>" >	
<button class="button primary small" name="update"> Editar </button>
</form>
</section>   

<!--fotter-->
<?php require_once ("../hf/footer.php"); ?>	
</body>
</html>