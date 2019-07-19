<?php
session_start();
if (!isset($_SESSION['ddespacho'])){
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
$this->SetFont('Arial','',12);
// Movernos a la derecha
$this->Cell(60);
// Título
$this->Cell(60,10,'Listado de equipos',0,0,'C');
// Salto de línea
$this->Ln(15);
$this->Cell(30,5,'Serial',1,0,'C',0 );
$this->Cell(40,5,'Decripcion',1,0,'C',0 );
$this->Cell(40,5,'Marca',1,0,'C',0 );
$this->Cell(40,5,'Fabricante',1,0,'C',0 );
$this->Cell(40,5,'Cantidad',1,1,'C',0 );
}

// Pie de página
function Footer()
{
// Posición: a 1,5 cm del final
$this->SetY(-15);
// Arial italic 8
$this->SetFont('Arial','I',8);
// Número de página
$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$query = "SELECT * FROM equipo_inf ORDER BY cod_inventario ";
$resultado = pg_query($dbconn, $query);    

$pdf = new PDF();
$pdf ->aliasnbpages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

while($row = pg_fetch_assoc($resultado)) { 
$pdf->Cell(30,5,$row['cod_inventario'],1,0,'C',0 );
$pdf->Cell(40,5,$row['descripcion'],1,0,'C',0 );
$pdf->Cell(40,5,$row['marca'],1,0,'C',0 );
$pdf->Cell(40,5,$row['modelo'],1,0,'C',0 );
$pdf->Cell(40,5,$row['cant'],1,1,'C',0 );
}
pg_close($dbconn);
$pdf->Output();
?>