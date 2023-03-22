<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lista Atención a Clientes</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/sweetalert2.css">
	<link rel="stylesheet" href="css/material.min.css">
	<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="css/main.css">
	 <link rel="icon" href="../Sistema/assets/img/avatar-aitech.png"/>
	<link rel="stylesheet" href="../Sistema//css/style.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="js/material.min.js" ></script>
	<script src="js/sweetalert2.min.js" ></script>
	<script src="js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="js/main.js" ></script>
</head>

<body>
<?php include_once "../Sistema/includes/header.php"; ?><!--  ver el menú -->
<section class="full-width text-center" style="padding: 40px 0;">
			<h3 class="text-center tittles">BIENVENIDO</h3>
			<!-- Tiles -->
		<br><br>	
			<article  class="full-width tile">
			<a href="lista_Cli.php" >
				<div class="tile-text">
					<span class="text-condensedLight">
						<small>Atención a clientes</small>
					</span>
					 
				</div>
				</a>
				<i class="zmdi zmdi-accounts tile-icon"></i>
			</article>
			<?php if ($_SESSION['id_rol'] ==2) { ?><!-- Solo los usuarios de Atención a clientes podrán ver la parte de registrar clientes, es decir, se le asignan privilegios-->
			<article class="full-width tile">
			<a href="registro_Cli.php" >
				<div class="tile-text">
					<span class="text-condensedLight">
						<small>Registrar clientes</small>
					</span>
				</div>
				<i class="zmdi zmdi-accounts-add tile-icon"></i>
			</a>
			</article> 	<?php } ?>
			<?php if ($_SESSION['id_rol'] == 1) { ?> <!-- Solo los Administradores podrán ver la parte de Seguimiento a clientes, es decir, se le asignan privilegios-->
		
			<br>
			<article class="full-width tile">
			<a href="lista_SC.php" >
				<div class="tile-text">
					<span class="text-condensedLight">
						<small>Seguimiento a clientes</small>
					</span>
				</div>
			
				<i class="zmdi zmdi-file-text tile-icon"></i>
			</a>
			</article>
				<?php } ?>
		</section>
		
</body>
</html>