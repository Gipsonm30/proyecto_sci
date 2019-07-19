<?php require_once ("../hf/header.php"); ?>
<?php if (!isset($_SESSION['ddespacho'])){
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
<center><h3>Aprobar / rechazar solicitudes</h3></center>	
<table  id="tablalog" class="display compact">
<thead>
<tr>
<th>Id Solicitud</th>
<th>Codigo Material</th>
<th>Descripcion</th>
<th>Cedula</th>
<th>Nombre</th>
<th>Apellido</th>
<th>Extencion</th>
<th>Cantidad</th>
<th>Fecha Solicitud</th>
<th>Estatus</th>   
<th>Aprobar</th>
<th>Rechazar</th>       
</tr>
</thead>
<tbody>
<?php
$query = "SELECT id_solic, s.serial_material,m.descripcion,u.nombre,u.apellido, s.id_usuario, unidad_sol, ext_sol, s.cant, fecha_auto, fecha_entrega, fecha_solicitud, estatus, tipo
	FROM public.solicitudes s, public.usuarios u, public.materiales m 
	where s.id_usuario=u.id_usuario
	and s.estatus='En proceso'
	and s.serial_material=m.serial_material
	union
	SELECT id_solic, s.serial_material,r.descripcion,u.nombre,u.apellido, s.id_usuario, unidad_sol, ext_sol, s.cant, fecha_auto, fecha_entrega, fecha_solicitud, estatus, tipo
	FROM public.solicitudes s, public.usuarios u, public.repuestos r
	where s.id_usuario=u.id_usuario
	and s.estatus='En proceso'
	and s.serial_material=r.serial
	union
	SELECT id_solic, s.serial_material,eq.descripcion,u.nombre,u.apellido, s.id_usuario, unidad_sol, ext_sol, s.cant, fecha_auto, fecha_entrega, fecha_solicitud, estatus, s.tipo
	FROM public.solicitudes s, public.usuarios u, public.equipo_inf eq
	where s.id_usuario=u.id_usuario
	and s.estatus='En proceso'
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
<td><?php echo $row['fecha_solicitud']; ?></td>
<td><?php echo $row['estatus']; ?></td>            	 
<td><a  class="butonn small" href="revisar_solicitudes.php?id=<?php echo $row['id_solic']?>">   
Aprobar         
</a></td>  
<td><a  class="butonn small" href="revisar_solicitudes.php?id2=<?php echo $row['id_solic']?>">   
Rechazar         
</a></td>    
</tr> 	    
<?php  } ?>  

<?php            	
if (isset($_GET['id'])){
$id = $_GET['id'];
$fecha=date("d/m/Y");
$estatus='Aprobado';
gestion_solicitud::editar_solicitud($id,$fecha,$estatus,$doc=$_SESSION['ddespacho']);
header("Location:revisar_solicitudes.php");  
}         	
?>	
<?php            	
if (isset($_GET['id2'])){
$id = $_GET['id2'];
$fecha=date("d/m/Y");
$estatus='Rechazado';
gestion_solicitud::editar_solicitud($id,$fecha,$estatus,$doc=$_SESSION['ddespacho']);  
header("Location:revisar_solicitudes.php"); 
}         	
?>	     
</tbody>
</table>
</div>

<!--fotter-->
<?php require_once ("../hf/footer.php"); ?>
<script type="text/javascript">
var table = $('#tablalog').DataTable({
dom: 'Bfrtip',
buttons: ['excel', 'pdf'],
}
);
</script>
</body>
</html>