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
<li><a href="seguridad.php">Pantalla principal</a></li>							
<li><a href="../login/cerrar_sesion.php">Salir del sistema</a></li>									
</ul>
</nav>

<!-- Main -->
<div id="main">
<div class="inner">
<header>
<center><h1>Bienvenido</h1></center>
</header>
<section class="tiles">
<article class="style2">
<span class="image">
<img src="../../images/pic01.jpg" alt="" />
</span>
<a href="gestion_usuarios.php">
<h2>Gestion de usuarios</h2>
<div class="content">
<p>Administracion de los usuarios de la aplicacion</p>
</div>
</a>
</article>

<article class="style4">
<span class="image">
<img src="../../images/pic02.jpg" alt="" />
</span>
<a href="visor_logs.php">
<h2>Logs de seguridad</h2>
<div class="content">
<p>Visualizar eventos de seguridad</p>
</div>
</a>
</article>			
	
</section>
</div>
</div>

<!--fotter-->
<!--Prueba github-->
<?php require_once ("../hf/footer.php"); ?>
</body>
</html>