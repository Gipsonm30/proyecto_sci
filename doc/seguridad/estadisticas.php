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
<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
</div>      	             

<!-- Footer -->
<?php require_once ("../hf/footer.php"); ?>
<script type="text/javascript">
Highcharts.chart('container', {
chart: {
plotBackgroundColor: null,
plotBorderWidth: null,
plotShadow: false,
type: 'pie'
},
title: {
text: 'Estadisticas de logs'
},
tooltip: {
pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
},
plotOptions: {
pie: {
allowPointSelect: true,
cursor: 'pointer',
dataLabels: {
enabled: true,
format: '<b>{point.name}</b>: {point.percentage:.1f} %',
style: {
color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
}
}
}
},
series: [{
name: 'Logs',
colorByPoint: true,
data: [

<?php
$query = "SELECT count (tipo_a) fROM auditorias WHERE tipo_a='Registro Usuario' ";
$resultado = pg_query($dbconn, $query);
$query = "SELECT count (tipo_a) fROM auditorias WHERE tipo_a='Consulta Solicitudes' ";
$resultado2 = pg_query($dbconn, $query);
while($row = pg_fetch_assoc($resultado)) { ?>                 
['<?php echo $resultado; ?>' , 1],
['<?php echo $resultado2; ?>' , 1],


<?php } ?>
]
}]
});
</script>	
</body>
</html>	
