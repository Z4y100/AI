<?php 
  include "../funciones/db.php";
  if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['Nombre']) ||  empty($_POST['Telefono']) || empty($_POST['Ubicación'])
	 ||empty($_POST['Tipo_proyecto'])  || empty($_POST['Procedencia']) || empty($_POST['Necesidad']) ) {
      $alert = '<div class="alert alert-danger" role="alert" style="color: #FF0000; background:#FFCDD2; font-size:20px; text-align: center;">
                Todos los campos son obligatorios
              </div>';
    } 
	else 
	{
      $nombre = $_POST['Nombre_cliente'];
      $telefono = $_POST['Telefono'];
      $ubicacion = $_POST['Ubicacion'];
      $tipo_proyecto = $_POST['Tipo_proyecto'];
	  $procedencia = $_POST['Procedencia'];
      $nececidad = $_POST['Necesidad'];
      $cliente = $_SESSION['Id_Cliente'];

      $query_insert = mysqli_query($conexion, "INSERT INTO clientes(Nombre,Telefono,Ubicacion,Tipo_proyecto,Procedencia,Necesidad,Id_Cliente)
	   values ('$nombre', '$telefono', '$ubicacion', '$tipo_proyecto','$procedencia', '$nececidad', '$cliente')");
      if ($query_insert) {
        $alert = '<div class="alert alert-success" role="alert" style="color: #0000FF; background:#90CAF9; font-size:20px; text-align: center;">
                Cliente Registrado
              </div>';
      } else {
        $alert = '<div class="alert alert-danger" role="alert" style="color: #FF0000;">
                Error al registrar
              </div>';
      }
    }
  }
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
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="js/material.min.js" ></script>
	<script src="js/sweetalert2.min.js" ></script>
	<script src="js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="js/main.js" ></script>
</head>
<body>
<?php include_once('header.php')?>
	<!-- pageContent -->
	
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-account"></i>
			</div>
			<div class="full-width header-well-text">
				<h3>
					REGISTRAR
				</h3>
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabNewAdmin" class="mdl-tabs__tab is-active">Nuevo</a>
				
			</div>
			<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--12-col">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								DATOS
							</div>
							<div class="full-width panel-content">
								<form action="" method="post">
									
									    <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NombreCliente">
												<label class="mdl-textfield__label" for="NombreCliente">NOMBRE</label>
												<span class="mdl-textfield__error">Nombre Invalido</span>
											</div>
									    </div>
										
										<div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="tel" pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="TelefonoCliente">
												<label class="mdl-textfield__label" for="TelefonoCliente">NÚMERO DE TELÉFONO</label>
												<span class="mdl-textfield__error">Número de teléfono invalido</span>
											</div>
										</div>
										<div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text"  id="UbicacionCliente">
												<label class="mdl-textfield__label" for="UbicacionCliente">UBICACIÓN</label>
											</div>
									    </div>

										<div>
											<label   for="proyectos">TIPO DE PROYECTO:</label>
												<select class="mdl-list" id="proyectos" name="proyectoslist" form="proyectosform">
													<option value="Domos">Domos</option>
													<option value="Proyecto_Ejecutivo">Proyecto Ejecutivo</option>
													<option value="Reality_Capture">Reality Capture</option>
													<option value="Sin_Asignacion">Sin Asignación</option>
												</select>
											</div>

										</div>
										
										<div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="ProcedenciaCliente">
												<label class="mdl-textfield__label" for="ProcedenciaCliente">DE DONDE VIENE</label>
												<span class="mdl-textfield__error">Invalido solo ingresar letras.</span>
											</div>
									    </div>
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NecesidadCliente">
												<label class="mdl-textfield__label" for="NecesidadCliente">NECESIDAD</label>
												<span class="mdl-textfield__error">Invalido solo ingrese letras</span>
											</div>
									    </div>
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="datetime"  id="FechaRegistroCliente">
												<label class="mdl-textfield__label" for="FechaRegistroCliente">FECHA DE REGISTRO</label>
											</div>
									    </div>
											   
											   
									<p class="text-center">
										<button class="button">GUARDAR</button>
										<div class="mdl-tooltip" for="btn-addAdmin">Registrar</div>
									</p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		
		</div>
	</section>
</body>
</html>
