<?php require_once ("../hf/header.php"); ?>
<?php if (!isset($_SESSION['root'])){
echo "<center><h2>No tiene acceso al sistema</h2></center> ";
die();
}
?>

<!-- Menu -->
<nav id="menu">
<h2>Menu</h2>
<ul>
<li><a href="../analista/analista.php">Analista</a></li>
<li><a href="../coordinador/coordinador.php">Cordinador</a></li>
<li><a href="../ddespacho/ddespacho.php">Director de despacho</a></li>
<li><a href="../almacenista/almacenista.php">Almacenista</a></li>
<li><a href="../seguridad/seguridad.php">Seguridad</a></li>				
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
<a href="../analista/analista.php">
<h2>Analista</h2>
<div class="content">
<p>Opciones del analista de sistema</p>
</div>
</a>
</article>
<article class="style2">
<span class="image">
<img src="../../images/pic02.jpg" alt="" />
</span>
<a href="../coordinador/coordinador.php">
<h2>Coordinador</h2>
<div class="content">
<p>Opciones del coordinador del sistema</p>
</div>
</a>
</article>

<article class="style3">
<span class="image">
<img src="../../images/pic01.jpg" alt="" />
</span>
<a href="../ddespacho/ddespacho.php">
<h2>Director de despacho</h2>
<div class="content">
<p>Opciones del director de despacho</p>
</div>
</a>
</article>

<article class="style4">
<span class="image">
<img src="../../images/pic02.jpg" alt="" />
</span>
<a href="../almacenista/almacenista.php">
<h2>Almacenista</h2>
<div class="content">
<p>Opciones del encargado del almacen</p>
</div>
</a>
</article>
<article class="style5">
<span class="image">
<img src="../../images/pic02.jpg" alt="" />
</span>
<a href="../seguridad/seguridad.php">
<h2>Seguridad</h2>
<div class="content">
<p>Opciones de seguridad del sistema</p>
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