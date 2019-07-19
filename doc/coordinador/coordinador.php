<?php require_once ("../hf/header.php"); ?>
<?php if (!isset($_SESSION['coordinador'])){
echo "<center><h2>No tiene acceso al sistema</h2></center> ";
die();
}
?>

<!-- Menu -->
<nav id="menu">
<h2>Menu</h2>
<ul>
<li><a href="solicitud_materiales.php">Solicitar materiales</a></li>
<li><a href="solicitud_repuesto.php">Solicitar repuestos</a></li>
<li><a href="solicitud_equipoinf.php">Solicitar equipo</a></li>
<li><a href="revisar_solicitudes.php">Aprobar / Rechazar solicitudes</a></li>
<li><a href="nota_retiro.php">Notas de retiro</a></li>
<li><a href="historico_solicitudes.php">Historicos de solicitudes</a></li>					
<li><a href="coordinador.php">Pantalla principal</a></li>				
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
<article class="style3">
<span class="image">
<img src="../../images/pic01.jpg" alt="" />
</span>
<a href="solicitud_materiales.php">
<h2>Crear solicitud</h2>
<div class="content">
<p>Generar una nueva solicitud de insumos</p>
</div>
</a>
</article>
<article class="style8">
<span class="image">
<img src="../../images/pic02.jpg" alt="" />
</span>
<a href="revisar_solicitudes.php">
<h2>Aprobar solicitudes</h2>
<div class="content">
<p>Aprueba o rechaza la solicitud de insumos</p>
</div>
</a>
</article>

<article class="style2">
<span class="image">
<img src="../../images/pic02.jpg" alt="" />
</span>
<a href="nota_retiro.php">
<h2>Notas de retiro</h2>
<div class="content">
<p>Imprimir notas de retiro para el almacen</p>
</div>
</a>
</article>

<article class="style1">
<span class="image">
<img src="../../images/pic02.jpg" alt="" />
</span>
<a href="historico_solicitudes.php">
<h2>Historico de solicitudes</h2>
<div class="content">
<p>Muestra el historico de las solicitudes</p>
</div>
</a>
</article>		
</section>
</div>
</div>

<!-- Footer -->
<?php require_once ("../hf/footer.php"); ?>			
</body>
</html>