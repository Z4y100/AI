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
	  $usuario= mysqli_real_escape_string($conexion, $_POST['usuario']);
	  $contraseña= mysqli_real_escape_string($conexion, $_POST['contraseña']);
	  
	  $query = mysqli_query($conexion, "SELECT u.id_usuario,
	  u.usuario,u.correo,u.fecha_creacion,
	  r.id_rol,r.nombre, t.id_proyecto,t.nombre_proyecto FROM usuarios u 
	  INNER JOIN roles r ON u.rol = r.id_rol  
	  INNER JOIN tipo_proyecto t ON u.tipo_proyecto = t.id_proyecto 
	   WHERE u.usuario = '$usuario' AND u.contraseña = '$contraseña'");
      mysqli_close($conexion);
      $resultado = mysqli_num_rows($query);
      if ($resultado > 0) {
        $dato = mysqli_fetch_array($query);
        $_SESSION['active'] = true;
        $_SESSION['id_usuario'] = $dato['id_usuario'];
        $_SESSION['usuario'] = $dato['usuario'];
        $_SESSION['correo'] = $dato['correo'];
        $_SESSION['fecha'] = $dato['fecha_creacion'];
        $_SESSION['nombre_proyecto'] = $dato['nombre_proyecto'];
		$_SESSION['id_proyecto'] = $dato['id_Proyecto'];
        $_SESSION['id_rol'] = $dato['id_rol'];
        $_SESSION['rol_name'] = $dato['nombre'];
	} 
	if($dato['id_rol']==3){
	  header('location: Master/home.php');
	}
	elseif($dato['id_rol']<=2){
	  header('location: AC/home.php');

	}
	 else {
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