<!DOCTYPE HTML>
<html>
<head>
<title>Sistema de inventario</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<link rel="stylesheet" href="assets/css/main.css"/>	
<link rel="stylesheet" href="assets/css/highcharts.css"/>	
<link rel="stylesheet" type="text/css" href="assets/css/sweetalert.css"  />
<script src="assets/js/sweetalert.min.js"></script>	
<link rel="stylesheet" type="text/css" href="assets/datatables/DataTables-1.10.18/css/jquery.dataTables.css"/>
<link rel="stylesheet" type="text/css" href="assets/datatables/Buttons-1.5.6/css/buttons.dataTables.css"/>
<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>			
</head>
<body class="is-preload">
<!-- Wrapper -->
<div id="wrapper">
<!-- Header -->
<header id="header">

<div class="inner">
<!-- Logo -->
<img src="images/banner.jpg" alt="">
<!-- Nav -->
<nav>
<ul>
<li><a href="#menu">Menu</a></li>
</ul>
</nav>
</div>
<!-- Menu -->					

<!-- Main -->
<section class="formulariolog">						
<form method="POST" class="ingreso" name="form1">
<label for="usuario">Usuario</label>
<input type="text" name="id" placeholder="Escriba su usuario" maxlength="10">	
<label for="Password"> Password </label>
<input type="password" name="password" placeholder="Escriba su password" maxlength="19">
<input type="submit" class="button small" value="Ingresar" name="btn1">
<center><a href="doc/login/recovery_password.php" >Olvido su contrasena</a></center>

<?php
include ("clases/clase_log.php");
if (isset($_POST['btn1'])) 
{	
$id = $_POST['id'];
$password=$_POST['password'];
log::ingreso_usuario($id,$password);
}
?>
</form>
</section>

<!-- Footer -->
<footer id="footer">
<div class="inner">
<section>
<h2>Contactanos</h2>
<form method="post" action="#">
<div class="fields">
<div class="field half">
<input type="text" name="name" id="name" placeholder="Nombre" />
</div>
<div class="field half">
<input type="email" name="email" id="email" placeholder="Email" />
</div>
<div class="field">
<textarea name="message" id="message" placeholder="Mensaje"></textarea>
</div>
</div>
<ul class="actions">
<li><input type="submit" value="Enviar" class="primary" /></li>
</ul>
</form>
</section>
<section>
<h2>Siguenos</h2>
<ul class="icons">
<li><a href="#" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
<li><a href="#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
<li><a href="#" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>	
<li><a href="#" class="icon style2 fa-phone"><span class="label">Phone</span></a></li>
<li><a href="#" class="icon style2 fa-envelope-o"><span class="label">Email</span></a></li>
</ul>
</section>							
</div>
</footer>
</div>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>