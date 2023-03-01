<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lista Atención a Clientes</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/sweetalert2.css">
	<link rel="stylesheet" href="css/material.min.css">
	<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="../Sistema//css/style.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="js/material.min.js" ></script>
	<script src="js/sweetalert2.min.js" ></script>
	<script src="js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="js/main.js" ></script>
</head>
<body>
<?php include_once "../Sistema/includes/header.php"; ?>
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
			
			</div>
			<div class="full-width header-well-text">
				<h3>
					SEGUIMIENTOS REGISTRADOS
				</h3>
			</div>
		</section>
		<div class="full-width divider-menu-h"></div>
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
				<div class="table-responsive">
					<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive" >
						<thead>
							<tr>
							<th style="text-align: center;">Id</th>
							<th style="text-align: center;">Fecha de llegada</th>
								<th style="text-align: center;" >Nombre</th>
								<th style="text-align: center;">N° teléfono</th>
					
								<th style="text-align: center;">Ubicación</th>
                                <th style="text-align: center;">Descripción</th>
                                <th></th>
                                <th style="text-align: center;" >Comunicación</th>
                                <th style="text-align: center;">Estatus cliente</th>
                               <th style="text-align: center;">Cotización entregada</th>
                               <th style="text-align: center;">Cerrado</th>
                               
								<th style="text-align: center;">Editar</th>
								<th style="text-align: center;" >Nuevo  seguimiento</th>
								<th style="text-align: center;">Generar estatus</th>
							</tr>
						</thead>
					
                        <tbody>
						<?php
                         require ("../funciones/db.php");
						 $sql = $conexion ->query("SELECT * FROM seguimiento
						 INNER JOIN clientes ON seguimiento.id_seguimiento = clientes.id_seguimiento 
						 
						  ");
						 
						 while($resultado = $sql->fetch_assoc()){
                         ?>
						 <tr style="width: 100%;" >
						 <td style="text-align: center;"><?php echo $resultado['Id_Seguimiento']; ?></td>
                         <td style="text-align: center;"><?php echo $resultado['Fecha_registro']; ?></td>
									<td style="text-align: center;"><?php echo $resultado['Nombre']; ?></td>
									<td style="text-align: center;"><?php echo $resultado['Telefono']; ?></td>
									<td style="text-align: center;"><?php echo $resultado['Ubicacion']; ?></td>
									<td style=" width: 10%;"><?php echo $resultado['Descripcion']; ?></td>
                                    <td></td>
                                    <td style="text-align: center;"><?php echo $resultado['Comunicacion']; ?></td>
									<td style="text-align: center;"><?php echo $resultado['Estatus_Cliente']; ?></td>
                                    <td style="text-align: center;"><?php echo $resultado['Cotizacion_Entrega']; ?></td>
									<td style="text-align: center;"><?php echo $resultado['Cerrado']; ?></td>
								
						       <td style="text-align: center;"> <a  class="boton verde"><i class="zmdi zmdi-border-color"></i></a>
							   </td>
							   <td style="text-align: center;"> <a  class="boton azul"><i class="zmdi zmdi-plus"></i></i></a>
							   </td>
							    
	
									<td style="text-align: center;"><a class="boton rojo"><i class="zmdi zmdi-file-text"></i></a></td>
						 </tr>		
                        <?php
						 }
						 ?>
						
					</tbody>
					</table>
				</div>
			</div>
		</div>
		
	</section>
</body>
</html>