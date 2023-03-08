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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<?php include_once('header.php')?>
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
							<div class="auto-width panel-content">
								<form action="busqueda_clientes.php" method="post">
									<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
									<input type="submit" class="btn-search" name="enviar" value="Buscar"><br>
									

								</form>
								<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
									<div class="table-responsive">
									<table class="text-center mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
											<thead>
												<tr>
													<th class="mdl-data-table__cell--non-numeric">Id Cliente</th>
													<th class="text-center">Nombre</th>
													<th class="text-center">Teléfono</th>
													<th class="text-center">Ubicación</th>
													<th></th>
													<th class="text-center">Tipo de Proyecto</th>
													<th class="text-center">Procedencia</th>
													<td></td>
													<th class="text-center">Fecha Registro</th>
													<th class="text-center">Id Usuario</th>
													<th class="text-center">Id Seguimiento</th>
													<th>Opciones</th>
												</tr>
											</thead>
										
											<tbody>
                                            <?php
                                            $busqueda = $_POST['busqueda'];
                                            include "../funciones/db.php";
                                            $consulta="SELECT * FROM clientes WHERE Tipo_proyecto like '$busqueda' '%' OR Nombre like '$busqueda' '%' OR Procedencia like '$busqueda' '%' OR Ubicacion like '$busqueda' '%' ";
                                            $resultado= mysqli_query($conexion,$consulta);
                                            while($data = mysqli_fetch_row($resultado))
                                                                                
                                            {?>
                                                <tr>
                                                    <td class="mdl-data-table__cell--non-numeric text-center"><?php echo $data['0']; ?></td>
                                                    <td class="text-center"><?php echo $data['1']; ?></td>
                                                    <td class="text-center"><?php echo $data['2']; ?></td>
                                                    <td class="text-center"><?php echo $data['3']; ?></td>
                                                    <td></td>
                                                    <td class="text-center"><?php echo $data['4']; ?></td>
                                                    <td class="text-center"><?php echo $data['5']; ?></td>
													
                                                    <td class="text-center"><?php echo $data['6']; ?></td>
                                                    <td class="text-center"><?php echo $data['7']; ?></td>
                                                    <td class="text-center"><?php echo $data['8']; ?></td>
													<td class="text-center"><?php echo $data['9']; ?></td>
													
													<td>
															<a href="editar_Cli.php?id=<?php echo $data['0'];?>" class="btn btn-info">Editar</a>
															
														</td>
                                                                                                        
                                                                                                        
                                                </tr>
                                            <?php }
                                            ?>
                                            </tbody>
										</table>
				</div>
							</div>
						</div>
			
			</div>
		</div>
			</div>
		</div>
	</section>
</body>
</html>
