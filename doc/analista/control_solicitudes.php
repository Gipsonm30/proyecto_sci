<?php require_once ("../hf/header.php"); ?>
<?php if (!isset($_SESSION['analista'])){
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
<li><a href="solicitud_materiales.php">Solicitar Material</a></li>
<li><a href="solicitud_repuestos.php">Solicitar Repuesto</a></li>
<li><a href="control_solicitudes.php">Notas de retiro</a></li>			
<li><a href="analista.php">Pantalla Principal</a></li>
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
<th>Cantidad Solicitada</th>
<th>Fecha Solicitud</th>
<th>Fecha Autorizacion</th>
<th>Estatus</th>   
<th>Accion</th>                                    
</tr>
</thead>
<tbody>
<?php
$doc = $_SESSION['analista'];
$query = "SELECT id_usuario FROM solicitudes WHERE id_usuario ='$doc' ";        
$validar= pg_query ($dbconn,$query);

switch (true) {           
case pg_num_rows($validar)==0;
echo'<script>
swal({title:"",text:"No tiene solicitudes activas",timer: 3000, confirmButtonColor:"#2E64FE",showConfirmButton:true }); 
</script>';
break;       

case          
$query = "SELECT id_solic, sol.serial_material,mat.descripcion, ext_sol, sol.cant, fecha_auto,fecha_solicitud,fecha_entrega,estatus
FROM public.solicitudes sol, public.materiales mat where id_usuario='$doc'
and sol.serial_material=mat.serial_material
union
SELECT id_solic, sol.serial_material,rep.descripcion,ext_sol,sol.cant,fecha_auto,fecha_solicitud, fecha_entrega,estatus
FROM public.solicitudes sol, public.repuestos rep
where id_usuario='$doc' and sol.serial_material=rep.serial; ";

$resultado = pg_query($dbconn, $query);    
while($row = pg_fetch_assoc($resultado)) { ?>
<tr>
<td><?php echo $row['id_solic']; ?></td>
<td><?php echo $row['serial_material']; ?></td>
<td><?php echo $row['descripcion']; ?></td>
<td><?php echo $row['cant']; ?></td>
<td><?php echo $row['fecha_solicitud']; ?></td>
<td><?php echo $row['fecha_auto']; ?></td>
<td><?php echo $row['estatus']; ?></td>  
<td><a target="_blank" href="../pdf/orden_retiro.php?id=<?php echo $row['id_solic']?>">Imprimir</a>
</td>

</tr> 	 	
<?php	} } auditoria:: registro_evento ($id_usuario="$doc",$fecha=date("d/m/Y"),$hora=date("G:i:s"),$host=$_SERVER["SERVER_ADDR"],$tipo="Consulta Solicitudes");  ?>
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