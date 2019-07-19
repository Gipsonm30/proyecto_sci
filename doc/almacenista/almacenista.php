<?php require_once ("../hf/header.php"); ?>
<?php if (!isset($_SESSION['almacenista'])){
echo "<center><h2>No tiene acceso al sistema</h2></center> ";
die();
}
?>

<!-- Menu -->
<nav id="menu">
<h2>Menu</h2>
<ul>
<li><a href="ingresar_materiales.php">Registrar material</a></li>
<li><a href="ingresar_repuestos.php">Registrar Repuestos</a></li>
<li><a href="ingresar_equipoinf.php">Registrar equipos informaticos</a></li>
<li><a href="listado_materiales.php">Inventario materiales</a></li>
<li><a href="listado_repuestos.php">Inventario repuestos</a></li>
<li><a href="listado_equipos.php">Inventario equipos</a></li>
<li><a href="solicitudes_aprobadas.php">Procesar solicitudes</a></li>		
<li><a href="solicitudes_procesadas.php">Imprimir nota de entrega</a></li>							
<li><a href="almacenista.php">Pantalla principal</a></li>						
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
<a href="ingresar_materiales.php">
<h2>Registro de piezas</h2>
<div class="content">
<p>Permite elejir que tipo de piezas ingresara al almacen</p>
</div>
</a>
</article>

<article class="style8">
<span class="image">
<img src="../../images/pic02.jpg" alt="" />
</span>
<a href="solicitudes_aprobadas.php">
<h2>Procesar solicitudes</h2>
<div class="content">
<p>Realizar entrega de insumos</p>
</div>
</a>
</article>							

<article class="style9">
<span class="image">
<img src="../../images/pic02.jpg" alt="" />
</span>
<a href="listado_materiales.php">
<h2>Listado de inventario</h2>
<div class="content">
<p>Genera un informe del estado actual del inventario</p>
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