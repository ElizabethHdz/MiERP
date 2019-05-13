<?php
session_start();
require('../../fpdf/fpdf.php');
require('../../php/conexion.php');
$Folio = $_GET['Folio'];

$sqlv = "SELECT * FROM requisicion where Folio='$Folio'";
$reslv = $mysqli->query($sqlv);
$reslv = $reslv->fetch_assoc();

$sqldv = "SELECT * FROM detalle_requisicion where Folio_Requisicion='$Folio'";
$detalleReq = $mysqli->query($sqldv);

$idProv = $_GET['RFC'];

$sqlc = "SELECT * FROM direcciones WHERE RFC='$idProv'";
$reslc = $mysqli->query($sqlc);
$reslc = $reslc->fetch_assoc();


class PDF extends FPDF
{

// Cabecera de página
function Header()
{

    // Logo
    $this->Image('../../img/logo.png',10,8,20);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(25);
    // Título
    $this->Cell(10,10, 'Tec Lerdo S.A de C.V.',0,0,'L');
    $this->Ln(2);
    $this->SetFont('Arial','I',8);
    $this->Cell(25);
    $this->Cell(10,15, 'AV. Paseo del tecnologico',0,0,'L');
    $this->Cell(0,15, 'Fecha: '.date("Y-m-d"),0,0,'R');
    $this->Ln(3);
    $this->Cell(25);
    $this->Cell(10,15, 'Tel: 8712233909 C.P: 27900',0,0,'L');
    $this->Ln(3);
    $this->Cell(25);
    $this->Cell(10,15, 'Email: tec@gmail.com',0,0,'L');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-30);
    $this->SetFont('Arial','I',8);
    // Arial italic 8
    // Número de página
    $this->Cell(0,10,'Este no es una cotizacion valida, solo es con fines educativos.',0,0,'C');
    $this->Ln(5);
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

}

// Creación del objeto de la clase heredada
$pdf = new PDF();

$header = array('Producto', 'Cantidad', 'Importe', 'U. de medida','Total');
$pdf->SetTitle('CotizacionFolio:'.$Folio, true);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',16);
$pdf->Cell(0, 8,'Cotizacion', 0, 1, 'C');
$pdf->Cell(0, 9,'Datos del proveedor', 'B', 1, 'L');
$pdf->Ln(5);
$pdf->SetFont('Times','',10);
$pdf->Cell(0, 5,'RFC: '.$reslc['RFC'], 0, 1, 'L');
$pdf->Cell(0, 5,utf8_decode('Nombre fiscal: '.$reslc['Nombre_Fiscal']), 0, 1, 'L');
$pdf->Cell(0, 5,utf8_decode('Dirección: '.$reslc['Direccion']), 0, 1, 'L');
$pdf->Cell(0, 5,utf8_decode('Código Postal: '.$reslc['CP']), 0, 1, 'L');
$pdf->Cell(0, 5,utf8_decode('Teléfono: '.$reslc['Telefono']), 0, 1, 'L');
$pdf->Cell(0, 5,utf8_decode('Correo electrónico: '.$reslc['Email']), 0, 1, 'L');
$pdf->Ln(5);

$pdf->SetFont('Times','B',16);
$pdf->Cell(0, 9,'Detalles de cotizacion', 'B', 1, 'L');
$pdf->Ln(5);
$pdf->SetFillColor(0,0,150);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(.3);
$pdf->SetFont('Times','B', 12);
// Cabecera
$w = array(70, 20, 30, 30, 40);
for($i=0;$i<count($header);$i++)
    $pdf->Cell($w[$i],7,$header[$i],1,0,'C',true);
$pdf->Ln();
// Restauración de colores y fuentes
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');
$pdf->Ln(0);

$subtotal = 0;
$total = 0;


foreach ($_POST as $key => $value)
{
    if ($value > 0) {
      $idp = $key;
      $sqlp = "SELECT Nombre, Unidad_Medida FROM producto where Id_Producto='$idp'";
      $reslp = $mysqli->query($sqlp);
      $idp = $reslp->fetch_assoc();

      //Precio del producto
      $sql = "SELECT Q.Precio_Compra FROM producto P INNER JOIN producto_proveedor Q WHERE (P.Id_Producto=Q.Id_Producto AND P.Id_Producto='$key') AND Q.RFC_Direcciones='$idProv'";
      $consultaTotal = $mysqli->query($sql);
      $consultaTotal = $consultaTotal->fetch_assoc();

      $subtotal = $subtotal + ($consultaTotal['Precio_Compra'] * $value);
      $totalP = $consultaTotal['Precio_Compra'] * $value;
      //fin


      $pdf->Cell($w[0],6,utf8_decode($idp['Nombre']),'LR',0,'L');
      $pdf->Cell($w[1],6,utf8_decode($value),'LR',0,'L');
      $pdf->Cell($w[2],6,utf8_decode($consultaTotal['Precio_Compra']),'LR',0,'R');
      $pdf->Cell($w[3],6,utf8_decode($idp['Unidad_Medida']),'LR',0,'R');
      $pdf->Cell($w[4],6,utf8_decode($totalP),'LR',0,'R');
      $pdf->Ln();
    }

}

// // Línea de cierre
$pdf->Cell(array_sum($w),0,'','T');
$pdf->Ln(2);
$total = ((16 * $subtotal) / 100) + $subtotal ;
$pdf->Cell(160);
$pdf->Cell(10,15, 'Subtotal: '.$subtotal,0,0,'L');
$pdf->Ln(5);
$pdf->Cell(165);
$pdf->Cell(10,15, 'IVA: '.'16'.' %',0,0,'L');
$pdf->Ln(5);
$pdf->Cell(165);
$pdf->Cell(10,15, 'Total: '.$total,0,0,'L');

$pdf->Output();
?>
