<?php require_once ("../hf/header.php"); ?>
<?php if (!isset($_SESSION['ddespacho'])){
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
<li><a href="solicitud_materiales.php">Solicitar materiales</a></li>
<li><a href="solicitud_repuestos.php">Solicitar repuesto</a></li>
<li><a href="solicitud_equipoinf.php">Solicitar equipos</a></li>
<li><a href="revisar_solicitudes.php">Aprobar / Rechazar solicitudes</a></li>
<li><a href="nota_retiro.php">Notas de retiro</a></li>
<li><a href="historico_solicitudes.php">Historico de solicitudes</a></li>	
<li><a href="listado_materiales.php">Inventario materiales</a></li>		
<li><a href="listado_repuestos.php">Inventario repuesto</a></li>
<li><a href="listado_equipos.php">Inventario equipos</a></li>				
<li><a href="ddespacho.php">Pantalla principal</a></li>
<li><a href="../login/cerrar_sesion.php">Salir del sistema</a></li>			
</ul>
</nav>

<!-- Main -->
<div id="main">	
<center><h3>Listado de repuestos</h3></center>				
<table  id="tablalog" class="display compact">
<thead>
<tr>
<th>Serial Repuesto</th>
<th>Descripcion</th>
<th>Marca</th>
<th>Fabricante</th>
<th>Cantidad</th>            
</tr>
</thead>
<tbody>
<?php         
$query = "SELECT * FROM repuestos";
$resultado = pg_query($dbconn, $query);    
while($row = pg_fetch_assoc($resultado)) { ?>
<tr>
<td><?php echo $row['serial']; ?></td>
<td><?php echo $row['descripcion']; ?></td>
<td><?php echo $row['marca']; ?></td>
<td><?php echo $row['fabricante']; ?></td>
<td><?php echo $row['cant']; ?></td>         

</tr> 	 	
<?php	} auditoria:: registro_evento($id_usuario=$_SESSION['ddespacho'],$fecha=date("d/m/Y"),$hora=date("G:i:s"),$host=$_SERVER["SERVER_ADDR"],$tipo="Consulta inventario");?>

</tbody>
</table>

<center>
<input type="radio" id="demo-priority-low" name="materiales" onclick="location.href='listado_materiales.php'">
<label for="demo-priority-low">Inventario materiales</label>

<input type="radio" id="demo-priority-normal" name="equipo" onclick="location.href='listado_repuestos.php'">
<label for="demo-priority-normal">Inventario equipos</label>

<input type="radio" id="demo-priority-higth" name="equipo" onclick="location.href='../pdf/imprimir_repuestos.php'">
<label for="demo-priority-higth">Imprimir lista de repuesto</label>

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