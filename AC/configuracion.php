<?php 
  include "../funciones/db.php";
  if (!empty($_POST)) {
    $alert = "";
    if ( empty($_POST['Contraseña']) || empty($_POST['Nueva_Contraseña'])  )  {
      $alert = '<div class="alert alert-danger" role="alert" style="color: #FF0000; background:#FFCDD2; font-size:20px; text-align: center;">
                Todos los campos son obligatorios
              </div>';
    } else {
		$usuario= $_SESSION['usuario'];
        $contrasena_actual = $_POST["Contraseña"];
  $nueva_contrasena = $_POST["Nueva-Contraseña"];
  $query = "SELECT Contraseña FROM usuarios WHERE Usuario = '$usuario'";
  $resultado = $conexion->query($query);

  if ($resultado->num_rows > 0) {
    // Obtener la fila de resultados
    $fila = $resultado->fetch_assoc();
    // Verificar si la contraseña actual es correcta
    if ($contrasena_actual == $fila["Contraseña"]) {
      // La contraseña es correcta, actualizar la contraseña en la base de datos
      $query = "UPDATE usuarios SET Contraseña = '$nueva_contrasena' WHERE Usuario = '$usuario'";
      if ($conexion->query($query) === TRUE) {

    
        $alert = '<div class="alert alert-success" role="alert" style="color: #0000FF; background:#90CAF9; font-size:20px; text-align: center;">
                Seguimiento Modificado
              </div>';

			} else {
				echo "Error al actualizar la contraseña: " . $conexion->error;
			  }
			} else {
			  // La contraseña actual es incorrecta, mostrar un mensaje de error
			  echo "La contraseña actual es incorrecta";
			}
		  } else {
			// No se encontró al usuario en la base de datos, mostrar un mensaje de error
			echo "Error: usuario no encontrado";
		  }
		
		  // Cerrar la conexión con la base de datos
		  $conexion->close();
      } 
  }
  ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CONFIGURACION</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/sweetalert2.css">
	<link rel="stylesheet" href="css/material.min.css">
	<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="../Sistema//css/style.css">
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
<div class="mdl-tabs__panel" id="tabListPayment">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Cambiar Contraseña
							</div>
							<div class="full-width panel-content">


                            <div class="mdl-list">
									<div class="mdl-list__item mdl-list__item--two-line">
										<span class="mdl-list__item-primary-content">
									
											<span  style="font-weight:bold;font-size: 20px;">Usuario: </span> <span  style="font-size: 25px;"><?php echo $_SESSION['usuario']; ?></span>
										
										</span>
										
									</div>
									<li class="full-width divider-menu-h"></li>
									<div class="mdl-list__item mdl-list__item--two-line">
										<span class="mdl-list__item-primary-content">
										
											<span  style="font-weight:bold;font-size: 20px;">Rol del usuario: </span> <span style="font-size: 25px;"><?php echo $_SESSION['rol_name']; ?></span>
										
										</span>
										
									</div>
									<li class="full-width divider-menu-h"></li>
									<div class="mdl-list__item mdl-list__item--two-line">
										<span class="mdl-list__item-primary-content">
										
											<span  style="font-weight:bold; font-size: 20px;">Correo: </span> <span style="font-size: 25px;"><?php echo $_SESSION['correo']; ?></span>
											
										</span>
										
									</div>

                            <form action="cambiar-contrasena.php" method="post">
                            <?php echo isset($alert) ? $alert : ''; ?>
                                    <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="password"  id="Contraseña" name="Contraseña">
                                            <label class="mdl-textfield__label" for="Contraseña">Contraseña actual</label>
                                          
                                        </div>
                                      
                                    </div>
                                    <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="password"  id="Nueva-Contraseña" name="Nueva-Contraseña">
                                            <label class="mdl-textfield__label" for="Nueva-Contraseña">Contraseña nueva</label>
                                          
                                        </div>
                                   
                                    </div>
									
									
                                    <p class="text-center">
									
										<input style="color: #FFFFFF;"  type="submit" value="Cambiar contraseña" class="mdl-button mdl-js-button  mdl-js-ripple-effect mdl-button--colored bg-primary">
										<div class="mdl-tooltip" >Cambiar</div>
									</p>
                            </form>

								
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</body></html>