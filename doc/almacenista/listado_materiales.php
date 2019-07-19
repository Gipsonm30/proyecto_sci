<?php require_once ("../hf/header.php"); ?>
<?php if (!isset($_SESSION['almacenista'])){
echo "<center><h2>No tiene acceso al sistema</h2></center> ";
die();
}
?>
<?php require_once ("../hf/header.php"); ?>
<?php include ("../../clases/conexiondb.php");?>
<?php include ("../../clases/auditoria.php");?>

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
<center><h3>Listado de materiales</h3></center>				
<table  id="tablalog" class="display compact">
<thead>
<tr>
<th>Serial Material </th>
<th>Descripcion</th>
<th>Cantidad</th>            
</tr>
</thead>
<tbody>
<?php         
$query = "SELECT * FROM materiales";
$resultado = pg_query($dbconn, $query);    
while($row = pg_fetch_assoc($resultado)) { ?>
<tr>
<td><?php echo $row['serial_material']; ?></td>
<td><?php echo $row['descripcion']; ?></td>
<td><?php echo $row['cant']; ?></td>         

</tr> 	 	
<?php	} auditoria:: registro_evento($id_usuario=$_SESSION['almacenista'],$fecha=date("d/m/Y"),$hora=date("G:i:s"),$host=$_SERVER["SERVER_ADDR"],$tipo="Consulta inventario");?>

</tbody>
</table>

<center>
<input type="radio" id="demo-priority-low" name="materiales" onclick="location.href='listado_repuestos.php'">
<label for="demo-priority-low">Inventario Repuestos </label>

<input type="radio" id="demo-priority-normal" name="equipo" onclick="location.href='listado_equipos.php'">
<label for="demo-priority-normal">Inventario equipos</label>

<input type="radio" id="demo-priority-higth" name="equipo" onclick="location.href='../pdf/imprimir_materiales_a.php'">
<label for="demo-priority-higth">Imprimir lista</label>
</center>
</div>

<!--fotter-->
<?php require_once ("../hf/footer.php"); ?>
<script type="text/javascript">
var table = $('#tablalog').DataTable({
dom: 'Bfrtip',
buttons: [
'excel', 'pdf'
],
}
);
</script>
</body>
</html>