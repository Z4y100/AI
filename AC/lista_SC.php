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
				<p class="text-condensedLight">
					SEGUIMIENTO A CLIENTES
			</div>
		</section>
        <div class="mdl-grid">
			<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
				<div class="table-responsive">
                <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
						<thead>
							<tr>
								<th class="mdl-data-table__cell--non-numeric">Fecha de llegada</th>
								<th>Nombre</th>
								<th>Clientes de</th>
								<th>N° teléfono</th>
                                <th>Ubicación</th>
                                <th></th>
                                <th>Comunicación</th>
                                <th>Estatus cliente</th>
                               <th>Cotización entregada</th>
                               <th>Cerrado</th>
                                <th>Acciones</th>
							</tr>
						</thead>
					
                        <tbody>
						<?php
						include "../funciones/db.php";

						$query = mysqli_query($conexion, "SELECT * FROM atencion_clientes");
						$result = mysqli_num_rows($query);
						if ($result > 0) {
							while ($data = mysqli_fetch_assoc($query)) { ?>
								<tr>
                                <td class="mdl-data-table__cell--non-numeric"></td>
									<td><?php echo $data['Nombre']; ?></td>
									<td><?php echo $data['Clientes_de']; ?></td>
									<td><?php echo $data['Telefono']; ?></td>
									<td><?php echo $data['Ubicacion']; ?></td>
                                    <td></td>
                                    <td><?php echo $data['Comunicacion']; ?></td>
									<td><?php echo $data['Estatus_Cliente']; ?></td>
                                    <td><?php echo $data['Cotización_Entregada']; ?></td>
									<td><?php echo $data['Cerrado']; ?></td>
										<?php if ($_SESSION['rol'] == 1) { ?>
									<td>
										<a href="agregar_producto.php?id=<?php echo $data['codproducto']; ?>" class="btn btn-primary"><i class='fas fa-audio-description'></i></a>

										<a href="editar_producto.php?id=<?php echo $data['codproducto']; ?>" class="btn btn-success"><i class='fas fa-edit'></i></a>

										<form action="eliminar_producto.php?id=<?php echo $data['codproducto']; ?>" method="post" class="confirmar d-inline">
											<button class="btn btn-danger" type="submit"><i class='fas fa-trash-alt'></i> </button>
										</form>
									</td>
										<?php } ?>
								</tr>
						<?php }
						} ?>
					</tbody>
					</table>
				</div>
			</div>
		</div>
		
	</section>
</body>
</html>