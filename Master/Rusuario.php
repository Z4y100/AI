<?php 
	session_start();
	$usuario= $_SESSION['usuario'];
  include "../funciones/db.php";
  if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['Usuario'])  ||empty($_POST['Correo'])  || empty($_POST['Contraseña']) || empty($_POST['Id_Proyecto']) || empty($_POST['Id_Rol']) ) {
      $alert = '<div class="alert alert-danger" role="alert" style="color: #FF0000; background:#FFCDD2; font-size:20px; text-align: center;">
                Todos los campos son obligatorios
              </div>';
    } else {
		$nombre=$_POST['Usuario'];
        $Correo=$_POST['Correo'];
        $Contraseña=$_POST['Contraseña'];
        $Proyecto=$_POST['Id_Proyecto'];
        $Rol=$_POST['Id_Rol'];
      
      

		
        $query = mysqli_query($conexion, "SELECT * FROM usuarios where Correo = '$Correo'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        Este correo ya esta registrado
                    </div>';
        }else{

      $query_insert = mysqli_query($conexion, "INSERT INTO usuarios(Usuario,Correo,Contraseña,Tipo_Proyecto,Rol)
	   values ('$nombre','$Correo','$Contraseña', '$Proyecto', '$Rol')");
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
	<title>INICIO</title>
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
	
	<!-- navLateral -->
	<section class="full-width navLateral">
		<div class="full-width navLateral-bg btn-menu"></div>
		<div class="full-width navLateral-body">
			<div class="full-width navLateral-body-logo text-center tittles">
				<i class="zmdi zmdi-close btn-menu"></i> AITECH 
			</div>
			<figure class="full-width navLateral-body-tittle-menu">
				<div>
					<img src="assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
				</div>
				<figcaption>
					<span>
					<?php
						echo $usuario;
						?><br>
						<small><?php echo $_SESSION['rol_name']; ?></small>
					</span>
				</figcaption>
			</figure>
			<nav class="full-width">
				<ul class="full-width list-unstyle menu-principal">
					<li class="full-width">
						<a href="home.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-view-dashboard"></i>
							</div>
							<div class="navLateral-body-cr">
								INICIO
							</div>
						</a>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-case"></i>
							</div>
							<div class="navLateral-body-cr">
								CLIENTES
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="Clientes_Registrados.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-balance"></i>
									</div>
									<div class="navLateral-body-cr">
										REGISTRADOS
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="Seguimientos.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-truck"></i>
									</div>
									<div class="navLateral-body-cr">
										SEGUIMIENTO
									</div>
								</a>
							</li>
							
						</ul>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-face"></i>
							</div>
							<div class="navLateral-body-cr">
								USUARIOS
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="usuarios.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-account"></i>
									</div>
									<div class="navLateral-body-cr">
										VER USUARIOS
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="Rusuario.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-accounts"></i>
									</div>
									<div class="navLateral-body-cr">
										REGISTRAR USUARIO
									</div>
								</a>
							</li>
						</ul>
					</li>
										
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-wrench"></i>
							</div>
							<div class="navLateral-body-cr">
								AJUSTES
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="#!" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr">
										OPTION
									</div>
								</a>
							</li>
							
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</section>
	<!-- pageContent -->
	<section class="full-width pageContent">
		<!-- navBar -->
		<div class="full-width navBar">
			<div class="full-width navBar-options">
				<i class="zmdi zmdi-swap btn-menu" id="btn-menu"></i>	
				<div class="mdl-tooltip" for="btn-menu">Hide / Show MENU</div>
				<nav class="navBar-options-list">
					<ul class="list-unstyle">
						<li class="btn-Notification" id="notifications">
							<i class="zmdi zmdi-notifications"></i>
							<div class="mdl-tooltip" for="notifications">Notifications</div>
						</li>
						<li class="btn-exit" id="btn-exit">
							<i class="zmdi zmdi-power"></i>
							<div class="mdl-tooltip" for="btn-exit">LogOut</div>
						</li>
						<li class="text-condensedLight noLink" ><small><?php
						echo $usuario;
						?><br></small></li>
						<li class="noLink">
							<figure>
								<img src="assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
							</figure>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<section class="full-width text-center" style="padding: 40px 0;">
			<h3 class="text-center tittles">REGISTRAR</h3>
			<!-- Tiles -->
			
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
												<label class="mdl-textfield__label" for="NombreCliente">NOMBRE</label>
												<span class="mdl-textfield__error">Nombre Invalido</span>
											</div>
									    </div>

										<?php echo isset($alert) ? $alert : ''; ?>
									    <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="email"  name="Correo"  id="Correo">
												<label class="mdl-textfield__label" for="Correo">CORREO</label>
												<span class="mdl-textfield__error">Correo Invalido</span>
											</div>
									    </div>


										<?php echo isset($alert) ? $alert : ''; ?>
									    <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text"  name="Contraseña"  id="Contraseña">
												<label class="mdl-textfield__label" for="NombreCliente">CONTRASEÑA</label>
												<span class="mdl-textfield__error">Contraseña Invalida</span>
											</div>
									    </div>

										<div>
											<label   for="usuarios">TIPO DE PROYECTO:</label>
												<select class="mdl-list" name="Id_Proyecto">
														<option value="">--Selecciona una opción--</option>
														<?php 
															include_once('..funciones/db.php');
															
															$sql='SELECT * FROM tipo_proyecto';
															$query=mysqli_query($conexion,$sql);
															while($row=mysqli_fetch_array($query)){
																$id_proyecto=$row['Id_Proyecto'];
																$nombreproyecto=$row['Nombre_Proyecto'];
															?>
																<option value="<?php echo $id_proyecto ?>"><?php echo $nombreproyecto ?></option>
															<?php
															}
											
           												 ?>
												</select>
													
										</div>


										<div>
											<label   for="usuarios">ROL:</label>
												<select class="mdl-list" name="Id_Rol">
														<option value="">--Selecciona una opción--</option>
														<?php 
															include_once('..funciones/db.php');
															
															$sql='SELECT * FROM roles';
															$query=mysqli_query($conexion,$sql);
															while($row=mysqli_fetch_array($query)){
																$id_rol=$row['Id_Rol'];
																$nombrerol=$row['Nombre'];
															?>
																<option value="<?php echo $id_rol ?>"><?php echo $nombrerol ?></option>
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
		
	</section>
</body>
</html>