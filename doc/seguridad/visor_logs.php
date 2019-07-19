<?php require_once ("../hf/header.php"); ?>
<?php if (!isset($_SESSION['seguridad'])){
echo "<center><h2>No tiene acceso al sistema</h2></center> ";
die();
}
?>
<?php require_once ("../../clases/auditoria.php"); ?>
<?php require_once ("../../clases/conexiondb.php"); ?>

<!-- Menu -->
<nav id="menu">
<h2>Menu</h2>
<ul>
<li><a href="gestion_usuarios.php">Gestion de usuarios</a></li>
<li><a href="visor_logs.php">Logs de seguridad</a></li>									
<li><a href="seguridad.php">Pantalla principal</a></li>							
<li><a href="../login/cerrar_sesion.php">Salir del sistema</a></li>					
</ul>
</nav>

<!-- Main -->
<div class="main">					
<table id="tablalog" class="display compact"  >
<thead>
<tr>
<th>Id evento</th>
<th>Cedula</th>
<th>Nombre</th>
<th>Apellido</th>
<th>Perfil</th>
<th>Fecha</th>
<th>Hora</th>
<th>Host</th>
<th>Tipo Evento</th>                       
</tr>
</thead>
<tbody>
<?php
$query = "SELECT id_auditoria, a.id_usuario, a.fecha_a, u.nombre,u.apellido,p.descripcion,a.hora_a, a.host, a.tipo_a
FROM public.auditorias a, public.usuarios u,perfiles p
where a.id_usuario=u.id_usuario
and u.cod_perfil=p.cod_perfil;";
$resultado = pg_query($dbconn, $query); 

while($row = pg_fetch_assoc($resultado)) { ?>
<tr>
<td><?php echo $row['id_auditoria']; ?></td>
<td><?php echo $row['id_usuario']; ?></td>
<td><?php echo $row['nombre']; ?></td>
<td><?php echo $row['apellido']; ?></td>
<td><?php echo $row['descripcion']; ?></td>
<td><?php echo $row['fecha_a']; ?></td>
<td><?php echo $row['hora_a']; ?></td>
<td><?php echo $row['host']; ?></td>
<td><?php echo $row['tipo_a']; ?></td>                                            
</tr>
<?php } pg_close($dbconn); ?>
</tbody>    
</table>
</div>       	   	                 

<!--fotter-->
<?php require_once ("../hf/footer.php"); ?>
<script type="text/javascript">
var table = $('#tablalog').DataTable({
dom: 'Bfrtip',
}
);
</script>

</body>
</html>