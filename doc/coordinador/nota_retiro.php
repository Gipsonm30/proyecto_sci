<?php require_once ("../hf/header.php"); ?>
<?php if (!isset($_SESSION['coordinador'])){
echo "<center><h2>No tiene acceso al sistema</h2></center> ";
die();
}
?>
<?php include ("../../clases/conexiondb.php");?>
<?php include ("../../clases/auditoria.php");?>

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
<div id="main">		
<center><h3>Notas de retiro</h3></center>				
<table id="tablalog" class="display">
<thead>
<tr>
<th>Id Solicitud</th>
<th>Codigo Material</th>
<th>Descripcion</th>
<th>Extencion</th>
<th>Cantidad Solicitada</th>
<th>Fecha Solicitud</th>
<th>Fecha Autorizacion</th>
<th>Estatus</th>   
<th>Accion</th>                                    
</tr>
</thead>
<tbody>
<?php
$doc = $_SESSION['coordinador'];
$query = "SELECT id_usuario FROM solicitudes WHERE id_usuario ='$doc' ";        
$validar= pg_query ($dbconn,$query);

$query = "SELECT id_solic, sol.serial_material,mat.descripcion,id_usuario, unidad_sol, ext_sol, sol.cant, fecha_auto, fecha_entrega, fecha_solicitud, estatus, tipo
	FROM public.solicitudes sol, public.materiales mat
	where estatus='Aprobado' and id_usuario='$doc'
	and
	sol.serial_material=mat.serial_material
	union
	SELECT id_solic, sol.serial_material,rep.descripcion,id_usuario, unidad_sol, ext_sol, sol.cant, fecha_auto, fecha_entrega, fecha_solicitud, estatus, tipo
	FROM public.solicitudes sol, public.repuestos rep
	where estatus='Aprobado' and id_usuario='$doc'
	and
	sol.serial_material=rep.serial
	union
	SELECT id_solic, sol.serial_material,eq.descripcion,id_usuario, unidad_sol, ext_sol, sol.cant, fecha_auto, fecha_entrega, fecha_solicitud, estatus, sol.tipo
	FROM public.solicitudes sol, public.equipo_inf eq
	where estatus='Aprobado' and id_usuario='$doc'
	and
	sol.serial_material=eq.cod_inventario;";

$resultado = pg_query($dbconn, $query);    
while($row = pg_fetch_assoc($resultado)) { ?>
<tr>
<td><?php echo $row['id_solic']; ?></td>
<td><?php echo $row['serial_material']; ?></td>
<td><?php echo $row['descripcion']; ?></td>
<td><?php echo $row['ext_sol']; ?></td>
<td><?php echo $row['cant']; ?></td>
<td><?php echo $row['fecha_solicitud']; ?></td>
<td><?php echo $row['fecha_auto']; ?></td>
<td><?php echo $row['estatus']; ?></td>  
<td><a target="_blank" href="../pdf/nota_retiro_coordinador.php?id=<?php echo $row['id_solic']?>">Imprimir</a>
</td>
</tr> 	 	
<?php	}  auditoria:: registro_evento ($id_usuario="$doc",$fecha=date("d/m/Y"),$hora=date("G:i:s"),$host=$_SERVER["SERVER_ADDR"],$tipo="Consulta Solicitudes");  ?>
</tbody>
</table>
</div>

<!-- Footer -->
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