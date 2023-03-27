<?php 
  include "../funciones/db.php";
  if (!empty($_POST)) {
    
		$id_usuario=$_GET['id'];
		$uusuario=$_POST['Usuario'];
		$correo=$_POST['Correo'];
        $contraseña=$_POST['Contraseña'];
        $proyecto=$_POST['Tipo_Proyecto'];
        $rol=$_POST['Rol'];
        
        
      

      $query_update = mysqli_query($conexion, "UPDATE usuarios SET 
	 Usuario='$uusuario',
	    Correo ='$correo',
      Contraseña = '$contraseña', 
	  Tipo_Proyecto = '$proyecto', 
      Rol = '$rol' WHERE Id_Usuario = $id_usuario");
      
	  $alert = '<div class="alert alert-success" role="alert" style="color: #0000FF; background:#90CAF9; font-size:20px; text-align: center;">
	  Cliente Modificado
	</div>';
	  
	
	  
  }

// Validar seguimiento

if (empty($_REQUEST['id'])) {
    header("Location: usuarios.php");
  }
  $id_usuario = $_REQUEST['id'];
  $sql = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Id_Usuario = $id_usuario");
  $result_sql = mysqli_num_rows($sql);
  if ($result_sql == 0) {
    header("Location:usuarios.php");
  } else {
    if ($data = mysqli_fetch_array($sql)) {
      $id_usuario = $data['Id_Usuario'];
      $uusuario = $data['Usuario'];
      $correo = $data['Correo'];
      $contraseña = $data['Contraseña'];
      $proyecto = $data['Tipo_Proyecto'];
      $rol = $data['Rol'];
	  
    }
  }
  

  ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editar Clientes</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/sweetalert2.css">
	<link rel="stylesheet" href="css/material.min.css">
	<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="../Sistema/css/main.css">
	<link rel="icon" href="../Sistema/assets/img/avatar-aitech.png"/>
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
				<i class="zmdi zmdi-account"></i>
			</div>
			<div class="full-width header-well-text">
				<h3>
					MODIFICAR USUARIO
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
												<input class="mdl-textfield__input" type="text"  name="Usuario" value="<?php echo $uusuario; ?>" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="Usuario">
												<label class="mdl-textfield__label" for="Nombre">NOMBRE</label>
												<span class="mdl-textfield__error">Invalido solo ingresar letras.</span>
											</div>
									    </div>
									
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="email" name="Correo" value="<?php echo $correo;?>" id="Correo">
												<label class="mdl-textfield__label" for="CorreoUsuario">CORREO</label>
												<span class="mdl-textfield__error">Correo invalido</span>
											</div>

										<div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="password"  minlength="6" name="Contraseña" id="Contraseña" value="<?php echo $contraseña; ?>">
												<label class="mdl-textfield__label" for="UbicacionCliente">CONTRASEÑA</label>
												<span class="mdl-textfield__error" id="password-error">La contraseña debe tener al menos 6 caracteres.</span>
										
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
										
										
										
										

										
										<center>
										<button class="button" name="btnGuardar">ACTUALIZAR</button>
											<div class="mdl-tooltip" for="btn-addAdmin">Actualizar</div>
										<input type="button" class="button" name="btnRegresar" value="REGRESAR" onclick="document.location.href='usuarios.php';">
											
										</center>
										
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