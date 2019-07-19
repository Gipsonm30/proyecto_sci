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
<center><h3>Agregar repuestos</h3></center>
<section class="formulario"> 
<form method="POST" class="gestion_user">	
<input type="text" maxlength="15" placeholder="Numero de factura"name="id_factura">
<input type="text" list="items" maxlength="10" placeholder="Serial Repuesto"name="id_repuesto">
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
<input type="text"  maxlength="44" placeholder="Proveedor" name="proveedor">
<input type="text"  maxlength="44" placeholder="Descripcion" name="descripcion">
<input type="text"  maxlength="7" placeholder="Cantidad" name="cantidad">

<button type="submit" value="ingresar" name="btn1" class="button small">Registrar</button>

<input type="radio" id="demo-priority-low" name="materiales" onclick="location.href='ingresar_materiales.php'">
<label for="demo-priority-low">Ingresar materiales </label>

<input type="radio" id="demo-priority-normal" name="equipo" onclick="location.href='ingresar_equipoinf.php'">
<label for="demo-priority-normal">Ingresar equipo informatico </label>

<?php
include ("../../clases/clase_almacen.php"); 
if (isset($_POST['btn1'])) 
{			
$serial_factura= $_POST['id_factura'];
$fecha=date("d/m/Y");
$serial_repuesto = $_POST['id_repuesto'];
$proveedor = $_POST['proveedor'];
$descripcion = $_POST['descripcion'];				
$cantidad=$_POST['cantidad'];
$doc = $_SESSION['almacenista'];
gestion_almacen::agregar_repuesto($serial_factura,$fecha,$serial_repuesto,$proveedor,$descripcion,$cantidad,$doc);  	
}	 
?>
</form>
</section>

<!--fotter-->
<?php require_once ("../hf/footer.php"); ?>
</body>
</html>