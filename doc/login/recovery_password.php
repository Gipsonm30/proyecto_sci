<!DOCTYPE HTML>
<!--Header-->
<html>
<head>
<title>Sistema de inventario</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<link rel="stylesheet" href="../../assets/css/main.css"/>	
<link rel="stylesheet" href="../../assets/css/highcharts.css"/>	
<link rel="stylesheet" type="text/css" href="../../assets/css/sweetalert.css"  />
<script src="../../assets/js/sweetalert.min.js"></script>	
<link rel="stylesheet" type="text/css" href="../../assets/datatables/DataTables-1.10.18/css/jquery.dataTables.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/datatables/Buttons-1.5.6/css/buttons.dataTables.css"/>
<noscript><link rel="stylesheet" href="../../assets/css/noscript.css" /></noscript>			
</head>
<body class="is-preload">
<!-- Wrapper -->
<div id="wrapper">
<!-- Header -->
<header id="header">
<div class="inner">
<!-- Logo -->
<img src="../../images/banner.jpg" alt="">
<!-- Nav -->
<nav>
<ul>
<li><a href="#menu">Menu</a></li>
</ul>
</nav>
</div>


<!-- Menu -->	
<nav id="menu">
<h2>Menu</h2>
<ul>
<li><a href="../../index.php">Regresar</a></li>
</ul>
</nav>				

<!-- Main -->
<section class="formulario"> 
<form method="POST" class="gestion_user">	
<input type="text"  maxlength="11" placeholder="Ingrese su cedula" name="doc">				
<input type="password"  maxlength="19" placeholder="Nuevo password" name="password1">		
<input type="password"  maxlength="19" placeholder="Confirme nuevo password" name="password2">		
<button type="submit" name="btn1" class="button small">Procesar</button>
<button type="button" onclick="location.href='../../index.php'"class="button small">Regresar</button>

<?php
include ("../../clases/clase_log.php");
if (isset($_POST['btn1'])) 
{	
$id = $_POST['doc'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];
log::reset_password ($id,$password1,$password2);
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
<script type="text/javascript" language="javascript" src="../../assets/js/jquery-3.3.1.js"></script>
<script src="../../assets/js/highcharts.js"></script>
<script src="../../assets/js/exporting.js"></script>
<script src="../../assets/js/export-data.js"></script>
<script src="../../assets/js/browser.min.js"></script>
<script src="../../assets/js/breakpoints.min.js"></script>
<script src="../../assets/js/util.js"></script>
<script src="../../assets/js/main.js"></script>
<script type="text/javascript" src="../../assets/datatables/DataTables-1.10.18/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../../assets/datatables/Buttons-1.5.6/js/dataTables.buttons.js"></script>
<script type="text/javascript" src="../../assets/datatables/Buttons-1.5.6/js/buttons.flash.js"></script>
<script type="text/javascript" src="../../assets/datatables/JSZip-2.5.0/jszip.js"></script>
<script type="text/javascript" src="../../assets/datatables/pdfmake-0.1.36/pdfmake.js"></script>
<script type="text/javascript" src="../../assets/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="../../aseets/datatables/Buttons-1.5.6/js/buttons.html5.js"></script>
<script type="text/javascript" src="../../aseets/datatables/Buttons-1.5.6/js/buttons.print.js"></script>

