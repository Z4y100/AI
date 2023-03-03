<?php
	session_start();
	if(empty($_SESSION['active']))
	{
		header('location: ../');
	}
	include "../../funciones/db.php";
	if(empty($_REQUEST['cl']) || empty($_REQUEST['se']))
	{
		echo "No es posible generar el estatus.";
	}else{
		$id_cliente = $_REQUEST['cl'];
		$id_seguimiento = $_REQUEST['se'];
		
		$clientes = mysqli_query($conexion, "SELECT * FROM clientes WHERE Id_Cliente = $id_cliente");
		$resul_clientes = mysqli_fetch_assoc($clientes);
		$seguimiento = mysqli_query($conexion, "SELECT * FROM seguimiento WHERE Id_Seguimiento = $id_seguimiento");
		$resul_seguimiento = mysqli_fetch_assoc($seguimiento);
		$estatus = mysqli_query($conexion, "SELECT * FROM seguimiento INNER JOIN clientes ON seguimiento.id_seguimiento = clientes.id_seguimiento ");
		require_once 'fpdf/fpdf.php';
		$pdf = new FPDF('P', 'mm', array(80, 200));
		$pdf->AddPage();
		$pdf->SetMargins(1, 0, 0);
		$pdf->SetTitle("Ventas");
		$pdf->SetFont('Arial', 'B', 9);
		$pdf->Cell(60, 5, utf8_decode($resultado['Nombre']), 0, 1, 'C');
		$pdf->Ln();
		$pdf->image("img/dos.jpg", 50, 18, 15, 15, 'JPG');
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Cell(15, 5, "Ruc: ", 0, 0, 'L');
		$pdf->SetFont('Arial', '', 7);
		$pdf->Cell(20, 5, $resultado['dni'], 0, 1, 'L');
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Cell(15, 5, utf8_decode("Teléfono: "), 0, 0, 'L');
		$pdf->SetFont('Arial', '', 7);
		$pdf->Cell(20, 5, $resultado['telefono'], 0, 1, 'L');
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Cell(15, 5, utf8_decode("Dirección: "), 0, 0, 'L');
		$pdf->SetFont('Arial', '', 7);
		$pdf->Cell(20, 5, utf8_decode($resultado['Direccion']), 0, 1, 'L');
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Cell(15, 5, "Ticked: ", 0, 0, 'L');
		$pdf->SetFont('Arial', '', 7);
		$pdf->Cell(20, 5, $noFactura, 0, 0, 'L');
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Cell(16, 5, "Fecha: ", 0, 0, 'R');
		$pdf->SetFont('Arial', '', 7);
		$pdf->Cell(25, 5, $result_venta['fecha'], 0, 1, 'R');
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Cell(60, 5, "Datos del cliente", 0, 1, 'L');
		$pdf->Cell(40, 5, "Nombre", 0, 0, 'L');
		$pdf->Cell(20, 5, utf8_decode("Teléfono"), 0, 0, 'L');
		$pdf->Cell(25, 5, utf8_decode("Dirección"), 0, 1, 'L');
		$pdf->SetFont('Arial', '', 7);
		if ($_GET['cl'] == 1) {
		$pdf->Cell(40, 5, utf8_decode("Público en general"), 0, 0, 'L');
		$pdf->Cell(20, 5, utf8_decode("-------------------"), 0, 0, 'L');
		$pdf->Cell(25, 5, utf8_decode("-------------------"), 0, 1, 'L');
		}else{
		$pdf->Cell(40, 5, utf8_decode($result_cliente['nombre']), 0, 0, 'L');
		$pdf->Cell(20, 5, utf8_decode($result_cliente['telefono']), 0, 0, 'L');
		$pdf->Cell(25, 5, utf8_decode($result_cliente['direccion']), 0, 1, 'L');
		}
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Cell(75, 5, "Detalle de Productos", 0, 1, 'L');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Cell(42, 5, 'Nombre', 0, 0, 'L');
		$pdf->Cell(8, 5, 'Cant', 0, 0, 'L');
		$pdf->Cell(15, 5, 'Precio', 0, 0, 'L');
		$pdf->Cell(15, 5, 'Total', 0, 1, 'L');
		$pdf->SetFont('Arial', '', 7);
		while ($row = mysqli_fetch_assoc($productos)) {
			$pdf->Cell(42, 5, utf8_decode($row['descripcion']), 0, 0, 'L');
			$pdf->Cell(8, 5, $row['cantidad'], 0, 0, 'L');
			$pdf->Cell(15, 5, number_format($row['precio'], 2, '.', ','), 0, 0, 'L');
			$importe = number_format($row['cantidad'] * $row['precio'], 2, '.', ',');
			$pdf->Cell(15, 5, $importe, 0, 1, 'L');
		}
		$pdf->Ln();
		$pdf->SetFont('Arial', 'B', 10);

		$pdf->Cell(76, 5, 'Total: ' . number_format($result_venta['totalfactura'], 2, '.', ','), 0, 1, 'R');
		$pdf->Ln();
		$pdf->SetFont('Arial', '', 7);
		$pdf->Cell(80, 5, utf8_decode("Gracias por su preferencia"), 0, 1, 'C');
		$pdf->Output("compra.pdf", "I");
		}

?>
