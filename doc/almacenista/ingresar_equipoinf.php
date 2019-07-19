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
<center><h3>Agregar equipos informaticos</h3></center>
<section class="formulario"> 
<form method="POST" class="gestion_user">	
<input type="text" maxlength="15" placeholder="Numero de factura"name="id_factura">
<input type="text" list="items" maxlength="10" placeholder="Serial Material"name="id_equipo">
<datalist id="items">
<option value="2141512">equipo laptop1</option>
<option value="2141513">equipo pc1</option>
<option value="2141514">equipo laptop2</option>
<option value="2141515">equipo laptop3</option>
<option value="2141516">equipo laptop4</option>
<option value="2141517">equipo laptop5</option>
<option value="2141518">equipo laptop6</option>
<option value="2141519">equipo laptop7</option>
<option value="2141520">equipo laptop8</option>
<option value="2141521">equipo laptop9</option>
<option value="2141522">equipo laptop10</option>
<option value="2141523">equipo laptop11</option>
<option value="2141524">equipo laptop12</option>
<option value="2141525">equipo laptop13</option>
<option value="2141526">equipo laptop14</option>
<option value="2141527">equipo laptop15</option>
<option value="2141528">equipo laptop16</option>
<option value="2141529">equipo laptop17</option>
<option value="2141530">equipo laptop18</option>
<option value="2141531">equipo laptop19</option>
<option value="2141532">equipo laptop20</option>
<option value="2141533">equipo laptop21</option>
<option value="2141534">equipo laptop22</option>
<option value="2141535">equipo laptop23</option>
<option value="2141536">equipo laptop24</option>
<option value="2141537">equipo laptop25</option>
<option value="2141538">equipo laptop26</option>
<option value="2141539">equipo laptop27</option>
<option value="2141540">equipo laptop28</option>
<option value="2141541">equipo laptop29</option>
<option value="2141542">equipo laptop30</option>
<option value="2141543">equipo laptop31</option>
<option value="2141544">equipo laptop32</option>
<option value="2141545">equipo laptop33</option>
<option value="2141546">equipo laptop34</option>
</datalist>	
<input type="text"  maxlength="44" placeholder="Proveedor" name="proveedor">
<input type="text"  maxlength="30" placeholder="Descripcion" name="descripcion">
<input type="text"  maxlength="30" placeholder="Cantidad" name="cantidad">
<button type="submit" value="ingresar" name="btn1" class="button small">Registrar</button>

<input type="radio" id="demo-priority-low" name="demo-priority" onclick="location.href='ingresar_materiales.php'">
<label for="demo-priority-low">Ingresar materiales</label>											
<input type="radio" id="demo-priority-normal" name="demo-priority" onclick="location.href='ingresar_repuestos.php'">
<label for="demo-priority-normal">Ingresar repuestos</label>

<?php
include ("../../clases/clase_almacen.php"); 
if (isset($_POST['btn1'])) 
{			
$serial_factura= $_POST['id_factura'];
$fecha=date("d/m/Y");
$serial_material = $_POST['id_equipo'];
$proveedor = $_POST['proveedor'];
$descripcion = $_POST['descripcion'];				
$cantidad=$_POST['cantidad'];
$doc = $_SESSION['almacenista'];
gestion_almacen::Agregar_equipoinf($serial_factura,$fecha,$serial_material,$proveedor,$descripcion,$cantidad,$doc);  	
}	 
?>
</form>
</section>

<!--fotter-->
<?php require_once ("../hf/footer.php"); ?>
</body>
</html>