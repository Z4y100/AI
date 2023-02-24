<?php
$alert = '';
session_start();
if (!empty($_SESSION['active'])) {
  header('location: ../');
} else {
  if (!empty($_POST)) {
    if (empty($_POST['usuario']) || empty($_POST['contraseña'])) {
      $alert = '<div class="alert alert-danger" style="color: #FF0000;" role="alert" >
  Ingrese su usuario y su contraseña
</div>';
    } else {
      require_once "funciones/db.php";
	  $usuario=$_POST['usuario'];
	  $contraseña=$_POST['contraseña'];
	  
	  $_SESSION['usuario']=$usuario;
	  
	  
	  $consulta="SELECT*FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";
	  $resultado=mysqli_query($conexion,$consulta);
	  
	  $filas=mysqli_fetch_array($resultado);
	  
	  if($filas){
	  
	  if($filas['Id_Rol']==1){ //administrador
		  header("location:Admin/home.php");
	  
	  }else
	  if($filas['Id_Rol']==2){ //cliente
	  header("location:AC/home.php");
	  }
	  else
	  if($filas['Id_Rol']==3){ //Master
			  header("location:Master/home.php");
			  }
		  } else {
        $alert = '<div class="alert alert-danger" style="color: #FF0000;" role="alert">
              Usuario o Contraseña Incorrecta
            </div>';
        session_destroy();
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" href="Master/css/normalize.css">
	<link rel="stylesheet" href="Master/css/sweetalert2.css">
	<link rel="stylesheet" href="Master/css/material.min.css">
	<link rel="stylesheet" href="Master/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="Master/css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="Master/css/main.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="Master/js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="Master/js/material.min.js" ></script>
	<script src="Master/js/sweetalert2.min.js" ></script>
	<script src="Master/js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="Master/js/main.js" ></script>
</head>
<body>
	<div class="login-wrap cover">
		<div class="container-login">
			<p class="text-center" style="font-size: 80px;">
				<i class="zmdi zmdi-account-circle"></i>
			</p>
			<p class="text-center text-condensedLight">Iniciar Sesión</p>

			<form class="user" method="POST">
			<?php echo isset($alert) ? $alert : ""; ?>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				    <input class="mdl-textfield__input" type="text" name="usuario" id="usuario">
				    <label class="mdl-textfield__label" for="">Usuario</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				    <input class="mdl-textfield__input" type="password" name="contraseña" id="contraseña">
				    <label class="mdl-textfield__label" for="">Contraseña</label>
				</div>
				<button type="submit" class="mdl-button mdl-js-button mdl-js-ripple-effect" value ="LISTO" style="color: #3F51B5; margin: 0 auto; display: block;">
					INICIAR
				</button>
			</form>
		</div>
	</div>
</body>
</html>