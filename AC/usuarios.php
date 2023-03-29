<?php
require_once("../funciones/db.php");
?>
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="js/material.min.js" ></script>
	<script src="js/sweetalert2.min.js" ></script>
	<link rel="icon" href="../Sistema/assets/img/avatar-aitech.png"/>
	<script src="js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="js/main.js" ></script>
	<style>
    .oculto {
      display: none;
    }
  </style>
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
					USUARIOS
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
								Lista de  Usuarios
							</div>
							<div class="full-width panel-content">
							
								<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
									<div class="table-responsive">
									<table id="tablax" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
											<thead>
												<tr class="text-center-header">
													
													<th class="text-center">Id</th>
													<th class="text-center">Usuario</th>
													<th class="text-center">Correo</th>
													<th onclick="alternarColumna(4)"><img src="../assets/icons/passverde.png" height ="20" width="20" /></th>
													<th  class="oculto">Contraseña</th>
													<th  class="text-center">Tipo_Proyecto</th>
													<th  class="text-center">Rol</th>
													<th  class="text-center">Fecha Creacion</th>
													<th  class="text-center"></th>
													<th  class="text-center"></th>
													
												</tr>
											</thead>
										
											<tbody>
											
											<?php
											include "../funciones/db.php";
											
											$consulta = mysqli_query($conexion, "SELECT usuarios.Id_Usuario,usuarios.Usuario, usuarios.Correo, usuarios.`Contraseña`, tipo_proyecto.Nombre_Proyecto, roles.Nombre, usuarios.Fecha_Creacion from usuarios inner join tipo_proyecto on usuarios.Tipo_Proyecto=tipo_proyecto.Id_Proyecto inner join roles on usuarios.Rol = roles.Id_Rol" );
											$resultado = mysqli_num_rows($consulta);
											
											if ($resultado > 0) {
												while ($data = mysqli_fetch_assoc($consulta)) { ?>
													<tr class="text-center">
												
														<td class="text-center"><?php echo $data['Id_Usuario']; ?></td>
														<td  class="text-center"><?php echo $data['Usuario']; ?></td>
														<td class="text-center"><?php echo $data['Correo']; ?></td>
														<td></td>
														<td class="oculto"><?php echo $data['Contraseña']; ?></td>
														<td class="text-center"><?php echo $data['Nombre_Proyecto']; ?></td>
														<td class="text-center"><?php echo $data['Nombre']; ?></td>
														<td class="text-center"><?php echo $data['Fecha_Creacion']; ?></td>
														<td class="text-center ">
															<a href="editar_Usu.php?id=<?php echo $data['Id_Usuario'];?>" class="boton verde"><i class="zmdi zmdi-border-color"></i></a>
															<td><a href="ConfirmarEliminacionMaster.php?id=<?php echo $data['Id_Usuario']; ?>" class="boton rojo"><i class="zmdi zmdi-delete"></i></a></td>
                                                            
															
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
			
		</div>
			</div>
		</div>
	</section>
	<script>
    function alternarColumna(numeroColumna) {
      var tabla = document.getElementById("tablax");
      var columnas = tabla.getElementsByTagName("th");
      var celdas = tabla.getElementsByTagName("td");

      for (var i = 0; i < columnas.length; i++) {
        if (i === numeroColumna) {
          if (columnas[i].classList.contains("oculto")) {
            columnas[i].classList.remove("oculto");
            for (var j = i; j < celdas.length; j += columnas.length) {
              celdas[j].classList.remove("oculto");
            }
          } else {
            columnas[i].classList.add("oculto");
            for (var j = i; j < celdas.length; j += columnas.length) {
              celdas[j].classList.add("oculto");
            }
          }
        } else {
          columnas[i].classList.remove("oculto");
          for (var j = i; j < celdas.length; j += columnas.length) {
            celdas[j].classList.remove("oculto");
          }
        }
      }
    }
  </script>
		
</body>
</html>