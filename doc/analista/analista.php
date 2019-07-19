<?php require_once ("../hf/header.php"); ?>
<?php if (!isset($_SESSION['analista'])){
echo "<center><h2>No tiene acceso al sistema</h2></center> ";
die();
}
?>

<!-- Menu -->
<nav id="menu">
<h2>Menu</h2>
<ul>
<li><a href="solicitud_materiales.php">Solicitar Material</a></li>
<li><a href="solicitud_repuestos.php">Solicitar Repuesto</a></li>
<li><a href="control_solicitudes.php">Notas de retiro</a></li>			
<li><a href="analista.php">Pantalla Principal</a></li>
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
<article class="style1">
<span class="image">
<img src="../../images/pic01.jpg" alt="" />
</span>
<a href="solicitud_materiales.php">
<h2>Crear solicitud</h2>
<div class="content">
<p>Generar una nueva solicitud de insumo</p>
</div>
</a>
</article>

<article class="style2">
<span class="image">
<img src="../../images/pic02.jpg" alt="" />
</span>
<a href="control_solicitudes.php">
<h2>Notas de retiro</h2>
<div class="content">
<p>Imprimir notas de retiro para el almacen</p>
</div>
</a>
</article>
</section>
</div>
</div>

<!--fotter-->
<?php require_once ("../hf/footer.php"); ?>			
</body>
</html>