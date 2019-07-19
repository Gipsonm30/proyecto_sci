<?php require_once ("../hf/header.php"); ?>
<?php if (!isset($_SESSION['seguridad'])){
echo "<center><h2>No tiene acceso al sistema</h2></center> ";
die();
}
?>
<?php include ("../../clases/clase_usuarios.php");?>
<?php include ("../../clases/conexiondb.php"); ?>

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
<center><h3>Gestion de usuarios</h3></center>
<a href='agregar_usuarios.php' class='button small'>Agregar</a>	
<table id="tablalog" class="display compact">
<thead>
<tr>
<th>Cedula</th>
<th>Perfil</th>
<th>Nombre</th>
<th>Apellido</th>
<th>Ubicacion</th>
<th>Extencion</th>
<th>Estatus</th>
<th>Cargo</th>
<th>Accion</th>
</tr>
</thead>
<tbody>

<?php
$query = "SELECT * FROM usuarios";
$resultado = pg_query($dbconn, $query);    
while($row = pg_fetch_assoc($resultado)) { ?>
<tr>
<td><?php echo $row['id_usuario']; ?></td>
<td><?php echo $row['cod_perfil']; ?></td>
<td><?php echo $row['nombre']; ?></td>
<td><?php echo $row['apellido']; ?></td>
<td><?php echo $row['ubicacion']; ?></td>
<td><?php echo $row['ext']; ?></td>
<td><?php echo $row['status_user']; ?></td>
<td><?php echo $row['cargo']; ?></td>  
<td><a href="editar_usuarios.php?id=<?php echo $row['id_usuario']?>">Editar</a>
</td>       
</tr>
<?php } ?>
</tbody>
</table>
</div>	

<!--fotter-->
<?php require_once ("../hf/footer.php"); ?>
<script type="text/javascript">
var table = $('#tablalog').DataTable({
dom: 'Brtip',
buttons: ['excel', 'pdf'],
}
);
</script>
</body>
</html>