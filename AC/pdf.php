<?php
	session_start();
	if(empty($_SESSION['active']))
	{
		header('location: ../');
	}
	include "../funciones/db.php";
	if(empty($_REQUEST['id']))
	{ 
		echo "No es posible generar el estatus.";
	}else{
		$id_seguimiento = $_REQUEST['id'];
		
		$sql = mysqli_query($conexion, "SELECT * FROM seguimiento 
		INNER JOIN clientes ON seguimiento.id_cliente = clientes.id_cliente 
		INNER JOIN estatus_cliente ON seguimiento.id_estatus = estatus_cliente.id_estatus 
		WHERE seguimiento.id_seguimiento = $id_seguimiento;
		");
		$result_sql = mysqli_num_rows($sql);


	
		 require('fpdf/fpdf.php');
		 class PDF extends FPDF
		 {
		 
			// Cabecera de página
			function Header()
			{
			   //include '../../recursos/Recurso_conexion_bd.php';//llamamos a la conexion BD
		 
			   //$consulta_info = $conexion->query(" select *from hotel ");//traemos datos de la empresa desde BD
			   //$dato_info = $consulta_info->fetch_object();
			   $this->Image('img/ai.jpg', 185, 5, 20); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
			   $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
			   $this->Cell(45); // Movernos a la derecha
			   $this->SetTextColor(64, 60, 60); //color
			   //creamos una celda o fila
			   $this->Cell(110, 15, utf8_decode('AITECH'), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
			   $this->Ln(10); // Salto de línea
			   $this->SetTextColor(103); //color
		 
			   /* UBICACION */
			   $this->Cell(5);  // mover a la derecha
			   $this->SetFont('Arial', 'B', 10);
			   $this->Cell(25, 10, utf8_decode("Ubicación: Av Benito Juárez 1105, Revolución, 42060 Pachuca de Soto, Hgo."), 0, 0, 'L', 0);
			   $this->Ln(5);
		      

			   
			   
			   
		 
			   /* TELÉFONO */
			   $this->Cell(5);  // mover a la derecha
			   $this->SetFont('Arial', 'B', 10);
			   $this->Cell(85, 10, utf8_decode("Teléfono: 771 273 9687 "), 0, 0, 'L', 0);
			   $this->Ln(10);
			   /* TELÉFONO */
			   $this->Cell(110);  // mover a la derecha
			   $this->SetFont('Arial', 'B', 10);
			   $this->Cell(85, 10, utf8_decode(" "), 0, 0, 'L', 0);
			   $this->Ln(10);
		 
			  
		 
			   /* TITULO DE LA TABLA */
			   //color
			   $this->SetTextColor(20, 144, 84);
			   $this->Cell(50); // mover a la derecha
			   $this->SetFont('Arial', 'B', 15);
			   $this->Cell(100, 10, utf8_decode("Estatus Cliente "), 0, 1, 'C', 0);
			   $this->Ln(7);
		 
			   /* CAMPOS DE LA TABLA */
			   //color
			   $this->SetFillColor(20, 144, 84); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 8);
	  $this->Cell(25, 10, utf8_decode('FECHA'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('NOMBRE'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('TELEFONO'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('UBICACION'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('TIPO DE PROYECTO'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('ESTATUS DEL PROYECTO'), 1, 1, 'C', 1);
			
			}
		 
			// Pie de página
			function Footer()
			{
			   $this->SetY(-15); // Posición: a 1,5 cm del final
			   $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
			   $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)
		 
			   $this->SetY(-15); // Posición: a 1,5 cm del final
			   $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
			   $hoy = date('d/m/Y');
			   $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
			}
		 }
$pdf = new PDF();
$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas




		
if ($data = mysqli_fetch_array($sql)) {
	$pdf->Cell(25, 5, utf8_decode($data['Fecha_registro']), 0, 0, 'C');
	$pdf->Cell(25, 5, utf8_decode($data['Nombre']), 0, 0, 'C');

	$pdf->Cell(25, 5, utf8_decode($data['Telefono']), 0, 0, 'C');
	$pdf->Cell(40, 5, utf8_decode($data['Ubicacion']), 0, 0, 'C');

	$pdf->Cell(40, 5, utf8_decode($data['Tipo_proyecto']), 0, 0, 'C');
	$pdf->Cell(40, 5, utf8_decode($data['Nombre_Estatus']), 0, 0, 'C');
  }

  
  $pdf->Output("Estatys.pdf", "I");	
		
	}
?>
