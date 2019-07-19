<?php
session_start();
if (!isset($_SESSION['analista'])){
echo "<center><h2>No tiene acceso al sistema</h2></center> ";
die();
}

require('../../clases/conexiondb.php');
require('../../assets/fpdf/fpdf.php'); 

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
// Logo
$this->Image('../../imagenes/coorpoelec2.jpg',10,10,33);
// Arial bold 15
$this->SetFont('Arial','',15);
// Movernos a la derecha
$this->Cell(65);
// Título
$this->Cell(60,10,'Orden de retiro',0,0,'C');
// Salto de línea
$this->Ln(40);
$this->Cell(95,10,'N solicitud',1,1,'C',0 );
$this->Cell(95,10,'Serial',1,1,'C',0 );
$this->Cell(95,10,'Descripcion',1,1,'C',0 );
$this->Cell(95,10,'Cantidad',1,1,'C',0 );
$this->Cell(95,10,'Fecha aprobado',1,1,'C',0 );
$this->Cell(95,10,'Estatus',1,1,'C',0 );
$this->Cell(95,10,'Cedula',1,1,'C',0 );
$this->Cell(95,10,'Nombre',1,1,'C',0 );
$this->Cell(95,10,'Apellido',1,1,'C',0 );
$this->Cell(95,10,'Unidad',1,1,'C',0 );
$this->Cell(95,10,'Extension',1,1,'C',0 );
$this->Ln(-110);
}

// Pie de página
function Footer()
{

// Posición: a 1,5 cm del final
$this->SetY(-40);
// Arial italic 8
$this->SetFont('Arial','',18);
// Número de página
$this->Cell(0,10,'Firma y sello',0,0,'C');

// Posición: a 1,5 cm del final
$this->SetY(-15);
// Arial italic 8
$this->SetFont('Arial','I',15);
// Número de página
$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

if  (isset($_GET['id'])) {
$id = $_GET['id'];
$query = " SELECT id_solic, s.serial_material,m.descripcion,u.nombre,u.apellido, s.id_usuario, unidad_sol, ext_sol, s.cant, fecha_auto, fecha_entrega, fecha_solicitud, estatus, tipo
	FROM public.solicitudes s, public.usuarios u, public.materiales m 
	where s.id_usuario=u.id_usuario
	and s.id_solic='$id'
	and s.serial_material=m.serial_material
	union
	SELECT id_solic, s.serial_material,r.descripcion,u.nombre,u.apellido, s.id_usuario, unidad_sol, ext_sol, s.cant, fecha_auto, fecha_entrega, fecha_solicitud, estatus, tipo
	FROM public.solicitudes s, public.usuarios u, public.repuestos r
	where s.id_usuario=u.id_usuario
	and s.id_solic='$id'
	and s.serial_material=r.serial
	union
	SELECT id_solic, s.serial_material,eq.descripcion,u.nombre,u.apellido, s.id_usuario, unidad_sol, ext_sol, s.cant, fecha_auto, fecha_entrega, fecha_solicitud, estatus, s.tipo
	FROM public.solicitudes s, public.usuarios u, public.equipo_inf eq
	where s.id_usuario=u.id_usuario
	and s.id_solic='$id'
	and s.serial_material=eq.cod_inventario
	order by 1;
	";

$resultado = pg_query($dbconn, $query);  
$pdf = new PDF();
$pdf ->aliasnbpages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
while($row = pg_fetch_assoc($resultado))
{
$pdf->Cell(95); 
$pdf->Cell(95,10,$row['id_solic'],1,1,'C',0 );
$pdf->Cell(95);
$pdf->Cell(95,10,$row['serial_material'],1,1,'C',0 );
$pdf->Cell(95);
$pdf->Cell(95,10,$row['descripcion'],1,1,'C',0 );
$pdf->Cell(95);
$pdf->Cell(95,10,$row['cant'],1,1,'C',0 );
$pdf->Cell(95);
$pdf->Cell(95,10,$row['fecha_auto'],1,1,'C',0 );
$pdf->Cell(95);
$pdf->Cell(95,10,$row['estatus'],1,1,'C',0 );
$pdf->Cell(95);
$pdf->Cell(95,10,$row['id_usuario'],1,1,'C',0 );
$pdf->Cell(95);
$pdf->Cell(95,10,$row['nombre'],1,1,'C',0 );
$pdf->Cell(95);
$pdf->Cell(95,10,$row['apellido'],1,1,'C',0 );
$pdf->Cell(95);
$pdf->Cell(95,10,$row['unidad_sol'],1,1,'C',0 );
$pdf->Cell(95);
$pdf->Cell(95,10,$row['ext_sol'],1,1,'C',0 );
}
}
pg_close($dbconn);
$pdf->Output();
?>