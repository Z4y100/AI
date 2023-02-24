<?php

include "../funciones/db.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['Comunicacion']) || empty($_POST['Estatus_Cliente']) || empty($_POST['Cotizacion_Entrega']) || empty($_POST['Cerrado'])) {
        $alert = '<div class="alert alert-danger" role="alert">
                        Todos los campos son obligatorios
                    </div>';
    } else {
      
        $comunicacion = $_POST['Comunicacion'];
        $estatus_cliente = $_POST['Estatus_Cliente'];
        $cotizacion_entrega = $_POST['Cotizacion_Entrega'];
        $Cerrado = $_POST['Cerrado'];
        $id_cliente = $_SESSION['Id_Cliente'];
        $query_insert = mysqli_query($conexion, "INSERT INTO seguimiento(Comunicacion,Estatus_Cliente,Cotizacion_Entrega,Cerrado,Id_Cliente) values ('$comunicacion', '$estatus_cliente', '$cotizacion_entrega', '$Cerrado', '$id_cliente')");
        if ($query_insert) {
            $alert = '<div class="alert alert-primary" role="alert">
                        Seguimiento Registrado
                    </div>';
        } else {
            $alert = '<div class="alert alert-danger" role="alert">
                       Error al registrar seguimiento
                    </div>';
        }
        
    }
}
mysqli_close($conexion);
?>
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
								Seguimiento a Clientes
							</div>
							<div class="full-width panel-content">
								<form>
                                <?php echo isset($alert) ? $alert : ''; ?>
                                
									    <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="FechaLlegada">
												<label class="mdl-textfield__label" for="FechaLlegada">Fecha de llegada</label>
												<span class="mdl-textfield__error">Fecha Invalida</span>
											</div>
									    </div>
										
										<div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="tel" pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="Nombre">
												<label class="mdl-textfield__label" for="NombreCliente">Nombre</label>
												<span class="mdl-textfield__error">Nombreinvalido</span>
											</div>
										</div>
										
                                        <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="tel" pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="Telefono">
												<label class="mdl-textfield__label" for="TelefonoCliente">Número de teléfono</label>
												<span class="mdl-textfield__error">Número de teléfono invalido</span>
											</div>
										</div>
                                        <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text"  id="UbicacionCliente">
												<label class="mdl-textfield__label" for="UbicacionCliente">Ubicación</label>
											</div>
									    </div>
                                        <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text"  id="Descripcion">
												<label class="mdl-textfield__label" for="Descripcion">Descripcion</label>
											</div>
									    </div>
                                        <div>
											<label   for="proyectos">Comunicación</label>
												<select class="mdl-list" id="proyectos" name="proyectoslist" form="proyectosform">
													<option value="1">Selecciona una opcion</option>
													<option value="2" style="background-color: #7FBCAB;">SI</option>
													<option value="3" style="background-color: #E57373;">NO</option>
												
												</select>
											</div>
                                            <div>
											<label   for="proyectos">Estatus cliente</label>
												<select class="mdl-list" id="proyectos" name="proyectoslist" form="proyectosform">
													<option value="1">Selecciona una opcion</option>
													<option value="2" style="background-color: #7FBCAB;">En proceso</option>
													<option value="3" style="background-color: #E57373;"></option>
												
												</select>
											</div>
                                            <div>
											<label   for="proyectos">Cotización entregada</label>
												<select class="mdl-list" id="proyectos" name="proyectoslist" form="proyectosform">
													<option value="1">Selecciona una opcion</option>
													<option value="2" style="background-color: #7FBCAB;">SI</option>
													<option value="3" style="background-color: #E57373;">NO</option>
												
												</select>
											</div>
                                            <div>
											<label   for="proyectos">Cerrado</label>
												<select class="mdl-list" id="proyectos" name="proyectoslist" form="proyectosform">
													<option value="1">Selecciona una opcion</option>
													<option value="2" style="background-color: #7FBCAB;">SI</option>
													<option value="3" style="background-color: #E57373;">NO</option>
												
												</select>
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