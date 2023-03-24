<?php 
  include "../funciones/db.php";
$fecha_actual=date("Y-m-d");
  if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['Usuario']) ||empty($_POST['Correo'])  || empty($_POST['Contraseña']) || empty($_POST['Tipo_Proyecto']) || empty($_POST['Rol'])) {
      $alert = '<div class="alert alert-danger" role="alert" style="color: #FF0000; background:#FFCDD2; font-size:20px; text-align: center;">
                Todos los campos son obligatorios
              </div>';
    } else {

		$usuarioo=$_POST['Usuario'];
        $correo=$_POST['Correo'];
        $contraseña=$_POST['Contraseña'];
        $proyecto=$_POST['Tipo_Proyecto'];
        $rol=$_POST['Rol'];
        $fecha=$fecha_actual;
		
      

		
        $query = mysqli_query($conexion, "SELECT * FROM usuarios where Usuario = '$usuarioo'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        Este usuario ya esta registrado
                    </div>';
        }else{

      $query_insert = mysqli_query($conexion, "INSERT INTO usuarios(Usuario,Correo,Contraseña,Tipo_Proyecto,Rol,Fecha_Creacion)
	   values ('$usuarioo','$correo','$contraseña', '$proyecto', '$rol', '$fecha')");
      if ($query_insert) {
        $alert = '<div class="alert alert-success" role="alert" style="color: #0000FF; background:#90CAF9; font-size:20px; text-align: center;">
                Usuario Registrado
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
												<input class="mdl-textfield__input" type="text"  name="Usuario" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="Usuario">
												<label class="mdl-textfield__label" for="Usuario">NOMBRE</label>
												<span class="mdl-textfield__error">Invalido solo ingresar letras.</span>
											</div>
									    </div>
									
										
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text"  name="Correo"  id="CorreoUsuario">
												<label class="mdl-textfield__label" for="CorreoUsuario">CORREO</label>
												<span class="mdl-textfield__error">Correo invalido</span>
											</div>
										<div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" name="Contraseña" id="ContraseñaUsuario">
												<label class="mdl-textfield__label" for="ContraseñaUsuario">CONTRASEÑA</label>
											</div>
									    </div>
										




										<div class="form-group">
              								 <label>TIPO DE PROYECTO:</label>
			   
												<select class="mdl-list" name="Tipo_Proyecto">
														<option value="">--Selecciona una opción--</option>
														<?php 
															include_once('..funciones/db.php');
															
															$sql='SELECT * FROM tipo_proyecto';
															$query=mysqli_query($conexion,$sql);
															while($row=mysqli_fetch_array($query)){
																$proyecto=$row['Id_Proyecto'];
																$nombreproyecto=$row['Nombre_Proyecto'];
															?>
																<option value="<?php echo $proyecto ?>"><?php echo $nombreproyecto ?></option>
															<?php
															}
											
           												 ?>
												</select>
             							</div>



										
										<div class="form-group">
              								 <label>ROL:</label>
			   
												<select class="mdl-list" name="Rol">
														<option value="">--Selecciona una opción--</option>
														<?php 
															include_once('..funciones/db.php');
															
															$sql='SELECT * FROM roles';
															$query=mysqli_query($conexion,$sql);
															while($row=mysqli_fetch_array($query)){
																$rol=$row['Id_Rol'];
																$nombrerol=$row['Nombre'];
															?>
																<option value="<?php echo $rol ?>"><?php echo $nombrerol ?></option>
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