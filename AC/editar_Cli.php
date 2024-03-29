<?php 
  include "../funciones/db.php";
  if (!empty($_POST)) {
    $alert = "";
	  /*Verifica que ningun campo falte*/
    if (empty($_POST['Nombre'])  ||empty($_POST['Telefono'])  || empty($_POST['Ubicacion']) || empty($_POST['Tipo_proyecto']) || empty($_POST['Procedencia']) ||empty($_POST['Necesidad']) ||empty($_POST['Fecha_registro'])) {
      $alert = '<div class="alert alert-danger" role="alert" style="color: #FF0000; background:#FFCDD2; font-size:20px; text-align: center;">
                Todos los campos son obligatorios
              </div>';
    } else {
		$id_cliente=$_GET['id']; /* Este campo contiene el id del cliente que se selecciono para realizar modificaciones */
		$id_usuario=$_POST['Id_Usuario'];
		$nombre=$_POST['Nombre'];
        $telefono=$_POST['Telefono'];
        $ubicacion=$_POST['Ubicacion'];
        $proyecto=$_POST['Tipo_proyecto'];
        $procedencia=$_POST['Procedencia'];
        $necesidad=$_POST['Necesidad'];
        $fecha=$_POST['Fecha_registro'];
        
      
/*Consulta para actuzalizar los campos seleccionados en la base de datos */
      $query_update = mysqli_query($conexion, "UPDATE clientes SET 
	 Id_Usuario='$id_usuario',
	    Nombre ='$nombre',
      Telefono = '$telefono', 
	  Ubicacion = '$ubicacion', 
      Tipo_proyecto = '$proyecto', 
	  Procedencia = '$procedencia',
      Necesidad ='$necesidad', 
	  Fecha_registro ='$fecha' WHERE Id_Cliente = $id_cliente");
      
	  $alert = '<div class="alert alert-success" role="alert" style="color: #0000FF; background:#90CAF9; font-size:20px; text-align: center;">
	  Cliente Modificado
	</div>';
	  
	
	  
  }
}
// Validar seguimiento

if (empty($_REQUEST['id'])) {
    header("Location: clientes.php"); /* Se dirige a esta direccion para comprobar si se realizaron los cambios */
  }
  $id_cliente = $_REQUEST['id'];
  $sql = mysqli_query($conexion, "SELECT * FROM clientes WHERE Id_Cliente = $id_cliente");
  $result_sql = mysqli_num_rows($sql);
  if ($result_sql == 0) {
    header("Location:clientes.php");
  } else {
    if ($data = mysqli_fetch_array($sql)) {
      $id_cliente = $data['Id_Cliente'];
      $nombre = $data['Nombre'];
      $telefono = $data['Telefono'];
      $ubicacion = $data['Ubicacion'];
      $proyecto = $data['Tipo_proyecto'];
      $procedencia = $data['Procedencia'];
	  $necesidad = $data['Necesidad'];
	  $fecha = $data['Fecha_registro'];
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
					MODIFICAR CLIENTE
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
												<input class="mdl-textfield__input" type="text"  name="Nombre" value="<?php echo $nombre; ?>" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="Nombre">
												<label class="mdl-textfield__label" for="Nombre">NOMBRE</label>
												<span class="mdl-textfield__error">Invalido solo ingresar letras.</span>
											</div>
									    </div>
									
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="tel"   pattern="^[-+()/\s\d]{10,}$" name="Telefono" value="<?php echo $telefono;?>" id="TelefonoCliente">
												<label class="mdl-textfield__label" for="TelefonoCliente">NÚMERO DE TELÉFONO</label>
												<span class="mdl-textfield__error">Número de teléfono invalido</span>
											</div>

										<div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" name="Ubicacion" id="Ubicacion" value="<?php echo $ubicacion; ?>">
												<label class="mdl-textfield__label" for="UbicacionCliente">UBICACIÓN</label>
											</div>
									    </div>
										<div>

										<label>TIPO DE PROYECTO:</label>
											<select id="proyecto" name="Tipo_proyecto" id="Tipo_proyecto" value="<?php echo $proyecto; ?>" class="mdl-list">
											<option value="<?php echo $proyecto; ?>"><?php echo $proyecto; ?></option>
											<?php 
												include_once('..funciones/db.php');
												
												$sql='SELECT * FROM tipo_proyecto';
												$query=mysqli_query($conexion,$sql);
												while($row=mysqli_fetch_array($query)){
													
													$nombreproyecto=$row['Nombre_Proyecto'];
												?>
													<option value="<?php echo $nombreproyecto ?>"><?php echo $nombreproyecto ?></option>
												<?php
												}
											
           									 ?>
            
        
											</select>
										</div>
										
										
										<div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text"  name="Procedencia" value="<?php echo $procedencia; ?>" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="Procedencia">
												<label class="mdl-textfield__label" for="ProcedenciaCliente">DE DONDE VIENE</label>
												<span class="mdl-textfield__error">Invalido solo ingresar letras.</span>
											</div>
									    </div>
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" name="Necesidad" value="<?php echo $necesidad; ?>" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="Necesidad">
												<label class="mdl-textfield__label" for="NecesidadCliente">NECESIDAD</label>
												<span class="mdl-textfield__error">Invalido solo ingrese letras</span>
											</div>
									    </div>
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<label  for="FechaRegistroCliente">FECHA DE REGISTRO</label>
												<input class="mdl-textfield__input" type="date" name="Fecha_registro" id="Fecha_registro" value="<?php echo $fecha; ?>">
												
											</div>
									    </div>

										
										<div class="form-group">



										
               <label>CLIENTE DE:</label>
			   
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
			 
										<center>
										<button class="button" name="btnGuardar">ACTUALIZAR</button>
											<div class="mdl-tooltip" for="btn-addAdmin">Actualizar</div>
										<input type="button" class="button" name="btnRegresar" value="REGRESAR" onclick="document.location.href='lista_Cli.php';">
											
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
