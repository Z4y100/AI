<?php
require('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    date_default_timezone_set('America/Mexico_City');
    $hoy= new DateTime();
    // Logo
    $this->Image('../assets/img/LogoAitech.png',10,5,30,20,'PNG','');
    // Arial bold 15
    $this->SetFont('Arial','B',16);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(60,10,' Reporte De Clientes Registrados');
    // Salto de línea
    $this->Ln();
    $this->SetFont('Arial','',8);
    $this->Cell(170,13,utf8_decode('Ubicación: Av.Benito Juárez 1105, Revolución,'),0,0,'R');
    $this->Ln(5);
    $this->Cell(170,13,utf8_decode('4206 Pachuca de Soto, Hgo.'),0,0,'R');
    $this->Ln(5);
    $this->Cell(170,13,utf8_decode('Fecha de impresion: ').$hoy->format('d/m/Y H:i:s'),0,0,'R');
    $this->SetDrawColor(61, 219, 159);
    $this->line(10,40,200,40);
    $this->Ln(5);
    
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
require '../../funciones/db.php';
$consulta="SELECT * FROM clientes";
$resultado=mysqli_query($conexion,$consulta);
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

    
$pdf->Ln(10);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(61, 219, 159);
$pdf->SetDrawColor(255,255,255);

$pdf->Cell(10,8,utf8_decode('ID'),1,0,'C',true);
$pdf->Cell(40,8,utf8_decode('Nombre'),1,0,'C',true);
$pdf->Cell(20,8,utf8_decode('Telefono'),1,0,'C',true);
$pdf->Cell(40,8,utf8_decode('Ubicación'),1,0,'C',true);
$pdf->Cell(30,8,utf8_decode('Tipo de Proyecto'),1,0,'C',true);
$pdf->Cell(40,8,utf8_decode('Fecha de Registro'),1,0,'C',true);
$pdf->Cell(20,8,utf8_decode('Usuario'),1,0,'C',true);
$pdf->Ln();
$pdf->SetFont('Arial','',9);
$pdf->SetTextColor(0,0,0);
while($row = $resultado->fetch_assoc())
{
    $pdf->Cell(10,8,utf8_decode($row['Id_Cliente']),1,0,'C',0);
    $pdf->Cell(40,8,utf8_decode($row['Nombre']),1,0,'C',0);
    $pdf->Cell(20,8,utf8_decode($row['Telefono']),1,0,'C',0);
    $pdf->Cell(40,8,utf8_decode($row['Ubicacion']),1,0,'C',0);
    $pdf->Cell(30,8,utf8_decode($row['Tipo_proyecto']),1,0,'C',0);
    $pdf->Cell(40,8,utf8_decode($row['Fecha_registro']),1,0,'C',0);
    $pdf->Cell(20,8,utf8_decode($row['Id_Usuario']),1,0,'C',0);
    $pdf->Ln();

    
}

$pdf->Output();

?>