<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registro</title>
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
				<h3>
					REGISTRAR NUEVO SEGUIMIENTO
				</h3>
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabNewAdmin" class="mdl-tabs__tab is-active">Nuevo seguimiento</a>
				
			</div>
			<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--12-col">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Atención a Clientes
							</div>
							<div class="full-width panel-content">
								<form>
									
									    <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="FechaLlegada">
												<label class="mdl-textfield__label" for="FechaLlegada">Fecha de llegada</label>
												<span class="mdl-textfield__error">Fecha Invalida</span>
											</div>
									    </div>
										
										<div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="tel" pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="NombreCliente">
												<label class="mdl-textfield__label" for="NombreCliente">Nombre</label>
												<span class="mdl-textfield__error">Nombreinvalido</span>
											</div>
										</div>
										<div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text"  id="ClienteDe">
												<label class="mdl-textfield__label" for="ClienteDe">Cliente de</label>
											</div>
									    </div>
                                        <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="tel" pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="TelefonoCliente">
												<label class="mdl-textfield__label" for="TelefonoCliente">Número de teléfono</label>
												<span class="mdl-textfield__error">Número de teléfono invalido</span>
											</div>
										</div>
                                        <div>
											<label   for="proyectos">Revisión</label>
												<select class="mdl-list" id="proyectos" name="proyectoslist" form="proyectosform">
													<option value="1">Selecciona una opcion</option>
													<option value="2" style="background-color: #7FBCAB;">VERDADERO</option>
													<option value="3" style="background-color: #E57373;">FALSO</option>
												
												</select>
											</div>

                                        <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text"  id="UbicacionCliente">
												<label class="mdl-textfield__label" for="UbicacionCliente">Ubicación</label>
											</div>
									    </div>

										
										</div>
										
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text"  id="Descripción">
												<label class="mdl-textfield__label" for="Descripción">Descripción</label>
											</div>
									    </div>
										
											   
											   
									<p class="text-center">
										
                                        <button class="mdl-button mdl-js-button  mdl-js-ripple-effect mdl-button--colored bg-primary" style="color: #FFFFFF;"id="btn-addClient">
										Guardar
										</button>
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