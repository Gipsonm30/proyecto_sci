<?php require_once ("../hf/header.php"); ?>
<?php if (!isset($_SESSION['almacenista'])){
echo "<center><h2>No tiene acceso al sistema</h2></center> ";
die();
}
?>
<?php include ("../../clases/conexiondb.php");?>
<?php include ("../../clases/clase_solicitud.php");?>

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
<center><h3>Notas de entrega</h3></center>
<table id="tablalog" class="display compact">
<thead>
<tr>
<th>Id Solicitud</th>
<th>Codigo Material</th>
<th>Descripcion</th>
<th>Cedula</th>
<th>Nombre</th>
<th>Apellido</th>
<th>Extension</th>
<th>Cantidad</th>
<th>Fecha Entrega</th>
<th>Estatus</th>   
<th>Accion</th>
</tr>
</thead>
<tbody>
<?php
$query = " SELECT id_solic, s.serial_material,m.descripcion,u.nombre,u.apellido, s.id_usuario, unidad_sol, ext_sol, s.cant, fecha_auto, fecha_entrega, fecha_solicitud, estatus, tipo
	FROM public.solicitudes s, public.usuarios u, public.materiales m 
	where s.id_usuario=u.id_usuario
	and s.estatus='Procesado'
	and s.serial_material=m.serial_material
	union
	SELECT id_solic, s.serial_material,r.descripcion,u.nombre,u.apellido, s.id_usuario, unidad_sol, ext_sol, s.cant, fecha_auto, fecha_entrega, fecha_solicitud, estatus, tipo
	FROM public.solicitudes s, public.usuarios u, public.repuestos r
	where s.id_usuario=u.id_usuario
	and s.estatus='Procesado'
	and s.serial_material=r.serial
	union
	SELECT id_solic, s.serial_material,eq.descripcion,u.nombre,u.apellido, s.id_usuario, unidad_sol, ext_sol, s.cant, fecha_auto, fecha_entrega, fecha_solicitud, estatus, s.tipo
	FROM public.solicitudes s, public.usuarios u, public.equipo_inf eq
	where s.id_usuario=u.id_usuario
	and s.estatus='Procesado'
	and s.serial_material=eq.cod_inventario
	order by 1;
	 ";
$resultado = pg_query($dbconn, $query);    
while($row = pg_fetch_assoc($resultado)) { ?>
<tr>
<td><?php echo $row['id_solic']; ?></td>
<td><?php echo $row['serial_material']; ?></td>
<td><?php echo $row['descripcion']; ?></td>
<td><?php echo $row['id_usuario']; ?></td>
<td><?php echo $row['nombre']; ?></td>
<td><?php echo $row['apellido']; ?></td>
<td><?php echo $row['ext_sol']; ?></td>
<td><?php echo $row['cant']; ?></td>
<td><?php echo $row['fecha_entrega']; ?></td>
<td><?php echo $row['estatus']; ?></td>         	 
<td><a class="butonn small" target="_blank" href="../pdf/orden_entrega.php?id=<?php echo $row['id_solic']?>">
Imprimir</a></td>                            
</tr> 	
<?php  } ?> 

<?php            	
if (isset($_GET['id'])){
$id = $_GET['id'];
$fecha='date("d/m/Y")';
$estatus='Procesado';
gestion_solicitud::procesar_solicitud ($id,$fecha,$estatus,$doc=$_SESSION['almacenista']);  
header("Location:solicitudes_aprobadas.php");  
}  
?>	      
</tbody>
</table>
<center>
<input type="radio" id="demo-priority-low" name="demo-priority" onclick="location.href='solicitudes_aprobadas.php'">
<label for="demo-priority-low">Procesar solicitudes</label>	
</center>
</div>				

<?php require_once ("../hf/footer.php"); ?>
<script type="text/javascript">
var table = $('#tablalog').DataTable({
dom: 'Bfrtip',
buttons: [
'excel', 'pdf'
],
});
</script>
</body>
</html>