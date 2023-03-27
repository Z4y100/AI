<?php				
	session_start();
	if (empty($_SESSION['active'])) {
		header('location: ../');
	}
	$usuario= $_SESSION['usuario'];
	
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Header</title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/sweetalert2.css">
	<link rel="stylesheet" href="../css/material.min.css">
	<link rel="stylesheet" href="../css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">
	<link rel="icon" href="../assets/img/avatar-aitech.png"/>
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="../js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="../js/material.min.js" ></script>
	<script src="../js/sweetalert2.min.js" ></script>
	<script src="../js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="../js/main.js" ></script>
</head>
<body>
	
<!-- navLateral -->

<section class="full-width navLateral">
		<div class="full-width navLateral-bg btn-menu"></div>
		<div class="full-width navLateral-body">
			<div class="full-width navLateral-body-logo text-center tittles" style="background:#81c784;">
				<i class="zmdi zmdi-close btn-menu"></i> AITECH
			</div>
			<figure class="full-width navLateral-body-tittle-menu">
				<div>
					<img src="assets/img/avatar-aitech.png" alt="Avatar" class="img-responsive">
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
					
					

					<?php if ($_SESSION['id_rol'] ==2) { ?><!--  Privilegios de atención a clientes-->
						<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="registro_cli.php"  class="full-width">
							<div class="navLateral-body-cl">
							<i class="zmdi zmdi-accounts-add"></i>
							</div>
							<div class="navLateral-body-cr">
							REGISTRO DE NUEVA ATENCIÓN 
							</div>
						</a>
					</li>
					<?php } ?>
					<?php if ($_SESSION['id_rol'] <=2||$_SESSION['id_rol'] == 3) { ?><!--  Privilegios de atención a clientes-->
						<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="lista_Cli.php" class="full-width">
							<div class="navLateral-body-cl">
							<i class="zmdi zmdi-accounts"></i>
							</div>
							<div class="navLateral-body-cr">
							ATENCIONES REGISTRADAS
							</div>
						</a>
					</li>
					<?php } ?>

					<?php if ($_SESSION['id_rol'] ==1||$_SESSION['id_rol'] == 3) { ?><!--  Privilegios de Administradores-->
						<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="lista_SC.php" class="full-width">
							<div class="navLateral-body-cl">
							<i class="zmdi zmdi-file-text"></i>
							</div>
							<div class="navLateral-body-cr">
								SEGUIMIENTOS REGISTRADOS
							</div>
						</a>
					</li>
					
					<?php } ?>

					<?php if ($_SESSION['id_rol'] ==3) { ?><!--  Privilegios de Administradores-->
						<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="usuarios.php" class="full-width">
							<div class="navLateral-body-cl">
							<i class="zmdi zmdi-account"></i>
							</div>
							<div class="navLateral-body-cr">
								USUARIOS REGISTRADOS
							</div>
						</a>
					</li>
					
					<?php } ?>

					<?php if ($_SESSION['id_rol'] ==3) { ?><!--  Privilegios de Master-->
						<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="Rusuario.php" class="full-width">
							<div class="navLateral-body-cl">
							<i class="zmdi zmdi-border-color"></i>
							</div>
							<div class="navLateral-body-cr">
								REGISTRAR NUEVO USUARIO
							</div>
						</a>
					</li>
					
					<?php } ?>
					
					
				
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="configuracion.php" class="full-width">
							<div class="navLateral-body-cl">
							<i class="zmdi zmdi-wrench"></i>
							</div>
							<div class="navLateral-body-cr">
								CONFIGURACIÓN
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
				<div class="mdl-tooltip" for="btn-menu">Ocultar/mostrar </div>
				<nav class="navBar-options-list">
					<ul class="list-unstyle">
						
						<li class="btn-exit" id="btn-exit">
							<i class="zmdi zmdi-power"></i>
							<div class="mdl-tooltip" for="btn-exit">Salir</div>
						</li>
						<li class="text-condensedLight noLink" ><small><?php echo $usuario;?></small></li>
						<li class="noLink">
							<figure>
								<img src="assets/img/avatar-aitech.png" alt="Avatar" class="img-responsive">
							</figure>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		
</body>
</html>
