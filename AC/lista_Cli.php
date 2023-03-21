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
	<link rel="stylesheet" href="../Sistema//css/style.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="../Sistema/assets/img/avatar-aitech.png"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
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
							
								<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
									<div class="table-responsive">
									<table id="tablax" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
											<thead>
												<tr class="text-center-header">
													
													<th class="text-center">Nombre</th>
													<th class="text-center">Teléfono</th>
													<th class="text-center">Ubicación</th>
													<th></th>
													<th  class="text-center">Tipo de Proyecto</th>
													<th class="text-center">Procedencia</th>
													<th  class="text-center">Necesidad</th>
													<th  class="text-center">Fecha Registro</th>
													<th  class="text-center">Usuario</th>
													<th  class="text-center">Editar</th>
												
													<?php if ($_SESSION['id_rol'] ==1) { ?>
															<th  class="text-center">Agregar segumiento</th> 	<?php } ?>
													
												</tr>
											</thead>
										
											<tbody>
											
											<?php
											include "../funciones/db.php";
											
											$consulta = mysqli_query($conexion, "SELECT * FROM clientes  INNER JOIN usuarios ON clientes.id_usuario = usuarios.id_usuario  ORDER BY clientes.Fecha_registro ASC
											 " );
											$resultado = mysqli_num_rows($consulta);
											
											if ($resultado > 0) {
												while ($data = mysqli_fetch_assoc($consulta)) { ?>
													<tr class="text-center">
												
														<td class="text-center"><?php echo $data['Nombre']; ?></td>
														<td  class="text-center"><?php echo $data['Telefono']; ?></td>
														<td class="text-center"><?php echo $data['Ubicacion']; ?></td>
														<td></td>
														<td class="text-center"><?php echo $data['Tipo_proyecto']; ?></td>
														<td class="text-center"><?php echo $data['Procedencia']; ?></td>
														<td class="text-center text-gran-body"><?php echo $data['Necesidad']; ?></td><!-- tiene un estilo diferente porque contiene mucho texto-->
														<td class="text-center"><?php echo $data['Fecha_registro']; ?></td>
														<td class="text-center"><?php echo $data['Usuario']; ?></td>
														<td style="text-align: center;">
															<a href="editar_Cli.php?id=<?php echo $data['Id_Cliente'];?>" class="boton verde"><i class="zmdi zmdi-border-color"></i></a>
															
														</td>

														<?php if ($_SESSION['id_rol'] ==1) { ?>
														<td style="text-align: center;">
															<a href="registro_SC.php?id=<?php echo $data['Id_Cliente'];?>"   class="boton azul"><i class="zmdi zmdi-plus"></i></i></a>
															
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
	<!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
        </script>
    <!-- DATATABLES -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
    </script>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">
    </script>
    <script>
        $(document).ready(function () {
            $('#tablax').DataTable({
                language: {
                    processing: "Tratamiento en curso...",
                    search: "Buscar&nbsp;:",
                    lengthMenu: "Mostar de _MENU_ items",
                    info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
                    infoEmpty: "No existen datos.",
                    infoFiltered: "(filtrado de _MAX_ elementos en total)",
                    infoPostFix: "",
                    loadingRecords: "Cargando...",
                    zeroRecords: "No se encontraron datos con tu busqueda",
                    emptyTable: "No hay datos disponibles en la tabla.",
                    paginate: {
                        first: "Primero",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Ultimo"
                    },
                    aria: {
                        sortAscending: ": active para ordenar la columna en orden ascendente",
                        sortDescending: ": active para ordenar la columna en orden descendente"
                    }
                },
                
                lengthMenu: [ [10, 25, -1], [10, 25, "Todos"] ],
				order: [[1, 'desc']] // Ordenar por la primera
            });
        });
    </script>
</body>
</html>