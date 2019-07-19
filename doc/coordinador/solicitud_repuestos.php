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
<li><a href="solicitud_repuestos.php">Solicitar repuestos</a></li>
<li><a href="solicitud_equipoinf.php">Solicitar equipo</a></li>
<li><a href="revisar_solicitudes.php">Aprobar / Rechazar solicitudes</a></li>
<li><a href="nota_retiro.php">Notas de retiro</a></li>
<li><a href="historico_solicitudes.php">Historicos de solicitudes</a></li>					
<li><a href="coordinador.php">Pantalla principal</a></li>				
<li><a href="../login/cerrar_sesion.php">Salir del sistema</a></li>	
</ul>
</nav>

<!-- Main -->
<center><h3>Solicitud de repuestos</h3></center>
<section class="formulario"> 
<form method="POST" class="gestion_user">	
<input type="text" list="items" maxlength="12" placeholder="Serial Repuesto"name="id_repuesto">
<datalist id="items">		
<option value="111154565">Disco duro</option>
<option value="111154566">Coll fan</option>
<option value="111154567">Monitor</option>
<option value="111154568">Cornetas</option>
<option value="111154569">Impresora</option>
<option value="111154570">Toner impresora</option>
<option value="111154571">Tarjeta usb</option>
<option value="111154572">Tarjeta de red</option>
<option value="111154573">Puerto serial</option>
<option value="111154574">Serial232</option>
<option value="111154575">Puerto red</option>
<option value="111154576">Puerto hdmi</option>
<option value="111154577">Boton power</option>
<option value="111154578">Boton wifi</option>
<option value="111154579">Puerto wifi</option>
<option value="111154580">Cargador laptop</option>
<option value="111154581">Cable monitor vga</option>
<option value="111154582">Cable power</option>
<option value="111154583">Bateria bios</option>
<option value="111154584">Bateria laptop</option>
<option value="111154585">Mouse</option>
<option value="111154586">Teclado</option>
<option value="111154587">Pendrive</option>
<option value="111154588">Cd</option>
<option value="111154589">Disco duro portable</option>
<option value="111154590">Tarjeta madre</option>
<option value="111154591">Case</option>
<option value="111154592">Cpu</option>
</datalist>

<input type="text" list="unidad"  maxlength="30" placeholder="Unidad a la cual pertenece"name="unidad">
<datalist id="unidad">
<option>Despacho de carga</option>
</datalist>		
<input type="text"  maxlength="30" placeholder="Extencion Telefonica" name="ext">				
<input type="text"  maxlength="30" placeholder="Cantidad a solicitar" name="cantidad">		

<button type="submit" value="ingresar" name="btn1" class="button small">Solicitar</button>

<input type="radio" id="demo-priority-low" name="materiales" onclick="location.href='solicitud_materiales.php'">
<label for="demo-priority-low">Solicitud materiales </label>

<input type="radio" id="demo-priority-normal" name="equipo" onclick="location.href='solicitud_equipoinf.php'">
<label for="demo-priority-normal">Solicitud equipo informatico </label>

<?php
include ("../../clases/clase_solicitud.php"); 
if (isset($_POST['btn1'])) 
{			
$serial= $_POST['id_repuesto'];
$doc = $_SESSION['coordinador'];
$unidad = $_POST['unidad'];
$ext = $_POST['ext'];
$cantidad = $_POST['cantidad'];				
$estatus = "Aprobado";
$fecha_actual=date("d/m/Y");
$fecha_actual=date("d/m/Y");
$tipo="r";
gestion_solicitud::solicitud_repuestos($serial,$doc,$unidad,$ext,$cantidad,$estatus,$fecha_auto,$fecha_actual,
$tipo);  	
}	 
?>
</form>
</section>

<!-- Footer -->
<?php require_once ("../hf/footer.php"); ?>
</body>
</html>