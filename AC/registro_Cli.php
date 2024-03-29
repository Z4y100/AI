<?php 
  include "../funciones/db.php";
  if (!empty($_POST)) {
    $alert = "";
	  /* Se verifica que ningun dato se encuentre vacio */
    if (empty($_POST['Telefono'])  || empty($_POST['Ubicacion']) || empty($_POST['Tipo_proyecto']) || empty($_POST['Procedencia']) ||empty($_POST['Necesidad']) ||empty($_POST['Fecha_registro'])) {
      $alert = '<div class="alert alert-danger" role="alert" style="color: #FF0000; background:#FFCDD2; font-size:20px; text-align: center;">
                Todos los campos son obligatorios
              </div>';
    } else {
/* Se guardan los datos ingresados en el formulario */
	$nombre=$_POST['Nombre'];
        $telefono=$_POST['Telefono'];
        $ubicacion=$_POST['Ubicacion'];
        $proyecto=$_POST['Tipo_proyecto'];
        $procedencia=$_POST['Procedencia'];
        $necesidad=$_POST['Necesidad'];
        $fecha=$_POST['Fecha_registro'];
		$usuario=$_POST['Id_Usuario'];
		
      

		
        $query = mysqli_query($conexion, "SELECT * FROM clientes where Telefono = '$telefono'"); /* Consulta para verificar que el numero de telefono no se encuentre ya registrado */
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        Este número de teléfono ya esta registrado
                    </div>';
        }else{

      $query_insert = mysqli_query($conexion, "INSERT INTO clientes(Nombre,Telefono,Ubicacion,Tipo_proyecto,Procedencia,Necesidad,Fecha_registro,Id_Usuario)
	   values ('$nombre','$telefono','$ubicacion', '$proyecto', '$procedencia', '$necesidad','$fecha','$usuario')"); /* Consulta para registrar los datos  en la base de datos */
      if ($query_insert) {
        $alert = '<div class="alert alert-success" role="alert" style="color: #0000FF; background:#90CAF9; font-size:20px; text-align: center;">
                Cliente Registrado
              </div>';
      } else {
        $alert = '<div class="alert alert-danger" role="alert" style="color: #FF0000;">
                Error al registrar 
              </div>';
      }}
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
	<link rel="stylesheet" href="../Sistema/css/main.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
	<link rel="icon" href="../Sistema/assets/img/avatar-aitech.png"/>
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
								<form action="" method="POST">
						
								<?php echo isset($alert) ? $alert : ''; ?>
									  
										<div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text"  name="Nombre" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="Nombre">
												<label class="mdl-textfield__label" for="Nombre">NOMBRE</label>
												<span class="mdl-textfield__error">Invalido solo ingresar letras.</span>
											</div>
									    </div>
									
										
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="tel" pattern="^[-+()/\s\d]{10,}$" name="Telefono"  id="TelefonoCliente">
												<label class="mdl-textfield__label" for="TelefonoCliente">NÚMERO DE TELÉFONO</label>
												<span class="mdl-textfield__error">Número de teléfono invalido</span>
											</div>
										<div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" name="Ubicacion" id="UbicacionCliente">
												<label class="mdl-textfield__label" for="UbicacionCliente">UBICACIÓN</label>
											</div>
									    </div>
										<div>

										<label>TIPO DE PROYECTO:</label>
											<select id="proyecto" name="Tipo_proyecto" class="mdl-list">
											<option value="">--Selecciona una opción--</option>
											<?php 
												include_once('..funciones/db.php'); /*Consulta para llamar la conexion a la base de datos */
												
												$sql='SELECT * FROM tipo_proyecto'; /* Consulta para seleccionar los datos de la tabla tipo_proyecto */
												$query=mysqli_query($conexion,$sql);
												while($row=mysqli_fetch_array($query)){
													
													$nombreproyecto=$row['Nombre_Proyecto']; /* Aqui se selecciona el campo nombre_proyecto de la tabla */
												?>
													<option value="<?php echo $nombreproyecto ?>"><?php echo $nombreproyecto ?></option> 
												<?php
												}
											
           									 ?>
            
        
											</select>
										</div>
										
										
										<div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text"  name="Procedencia" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="ProcedenciaCliente">
												<label class="mdl-textfield__label" for="ProcedenciaCliente">DE DONDE VIENE</label>
												<span class="mdl-textfield__error">Invalido solo ingresar letras.</span>
											</div>
									    </div>
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" name="Necesidad" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NecesidadCliente">
												<label class="mdl-textfield__label" for="NecesidadCliente">NECESIDAD</label>
												<span class="mdl-textfield__error">Invalido solo ingrese letras</span>
											</div>
									    </div>
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<label for="FechaRegistroCliente">FECHA DE REGISTRO</label>
												<input class="mdl-textfield__input" type="date" name="Fecha_registro" id="FechaRegistroCliente">
										
											</div>
									    </div>
									<div>
											<label   for="usuarios">¿Quién registró?</label>
												<select class="mdl-list" name="Id_Usuario">
														<option value="">--Selecciona una opción--</option>
														<?php 
															include_once('..funciones/db.php');
															
															$sql='SELECT * FROM usuarios'; 
															$query=mysqli_query($conexion,$sql);
															while($row=mysqli_fetch_array($query)){
																$id_usuario=$row['Id_Usuario'];
																$nombreusuario=$row['Usuario'];
															?>
																<option value="<?php echo $id_usuario ?>"><?php echo $nombreusuario ?></option>
															<?php
															}
											
           												 ?>
												</select>
													
										</div>
                                                                               
										
										<p class="text-center">
											<button class="button" name="btnGuardar">GUARDAR</button>
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
