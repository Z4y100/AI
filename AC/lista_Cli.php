<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administrators</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/sweetalert2.css">
	<link rel="stylesheet" href="css/material.min.css">
	<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="js/material.min.js" ></script>
	<script src="js/sweetalert2.min.js" ></script>
	<script src="js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="js/main.js" ></script>
</head>
<body>
	<?php include_once "../Sistema/includes/header.php"; ?>
	<!-- pageContent -->
	
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-accounts"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					CLIENTES
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabListClient" class="mdl-tabs__tab is-active">LISTA</a>
			</div>
			
			<div class="mdl-tabs__panel is-active" id="tabListClient">
			<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--11-col-desktop mdl-cell--1-offset-desktop">
						<div class="full-width panel mdl-shadow--4dp">
							<div class="full-width panel-tittle bg-success text-center tittles">
								Lista de  Clientes
							</div>
							<div class="full-width panel-content">
								<form action="busqueda_clientes.php" method="post">
									<input type="text"  autofocus name="busqueda" id="busqueda" placeholder="Buscar">
									<input type="submit" class="btn-search" name="enviar" value="Buscar"><br>
									

								</form>
								<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
									<div class="table-responsive">
									<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
											<thead>
												<tr class="text-center">
													<th class="mdl-data-table__cell--non-numeric">Id Cliente</th>
													<th class="text-center">Nombre</th>
													<th class="text-center">Teléfono</th>
													<th class="text-center">Ubicación</th>
													<th></th>
													<th>Tipo de Proyecto</th>
													<th class="text-center">Procedencia</th>
													<th>Necesidad</th>
													<th>Fecha Registro</th>
													<th>Id Usuario</th>
													<th>Id Seguimiento</th>
													<th>Opciones</th>
													
												</tr>
											</thead>
										
											<tbody>
											
											<?php
											include "../funciones/db.php";
											$usuario= $_SESSION['usuario'];
											$consulta = mysqli_query($conexion, "SELECT * FROM clientes INNER JOIN usuarios ON clientes.id_usuario = usuarios.id_usuario WHERE Usuario = '$usuario'");
											$resultado = mysqli_num_rows($consulta);
											if ($resultado > 0) {
												while ($data = mysqli_fetch_assoc($consulta)) { ?>
													<tr class="text-center">
													<td class="mdl-data-table__cell--non-numeric text-center"><?php echo $data['Id_Cliente']; ?></td>
														<td class="text-center"><?php echo $data['Nombre']; ?></td>
														<td><?php echo $data['Telefono']; ?></td>
														<td class="text-center"><?php echo $data['Ubicacion']; ?></td>
														<td></td>
														<td class="text-center"><?php echo $data['Tipo_proyecto']; ?></td>
														<td class="text-center"><?php echo $data['Procedencia']; ?></td>
														<td class="text-center"><?php echo $data['Necesidad']; ?></td>
														<td class="text-center"><?php echo $data['Fecha_registro']; ?></td>
														<td class="text-center"><?php echo $data['Usuario']; ?></td>
														<td class="text-center"><?php echo $data['Id_Seguimiento']; ?></td>
														
														<td>
															<a href="editar_Cli.php?id=<?php echo $data['Id_Cliente'];?>"  class="btn btn-info">Editar</a>
															
														</td>
															
															
													</tr>
											<?php }
											} ?>
											

									
										</tbody>
										</table>
				</div>
							</div>
						</div>
			
			</div>
			<br>
			<div class="col-12">
            <center>
                <input type="button" class="btn btn-dark" value="Descargar PDF" onclick="document.location.href='fpdf/exportarpdf.php';"/>
            </center>
        </div>
		</div>
			</div>
		</div>
	</section>
</body>
</html>
