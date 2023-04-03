<?php 
  include "../funciones/db.php";
  if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['Descripcion'])  || empty($_POST['Comunicacion']) || empty($_POST['Estatus_Cliente']) || empty($_POST['Cotizacion_Entrega']) ||empty($_POST['Cerrado']) ) {
      $alert = '<div class="alert alert-danger" role="alert" style="color: #FF0000; background:#FFCDD2; font-size:20px; text-align: center;">
                Todos los campos son obligatorios
              </div>';/** 	Son los campos que forzosamente deben estar llenos o que son importantes*/
    } else {
		$id_cliente=$_GET['id'];/** Es el id que se toma del cliente al que se le hara el seguimiento, es una forma para que el usuario se evite la molestia de volver a llenar todos los campos*/
	
      $descripcion = $_POST['Descripcion'];
	  $comunicacion = $_POST['Comunicacion'];
      $estatus = $_POST['Estatus_Cliente'];
	  $cotizacion_entrega = $_POST['Cotizacion_Entrega'];
      $cerrado = $_POST['Cerrado'];
	  $notas = $_POST['Notas'];
      $usuario=$_POST['Id_Usuario'];
		

      $query_insert = mysqli_query($conexion, "INSERT INTO seguimiento(Id_Cliente,Descripcion,Comunicacion,Estatus_Cliente,Cotizacion_Entrega,Cerrado,Notas,Id_Usuario) 
	   values ('$id_cliente','$descripcion','$comunicacion', '$estatus', '$cotizacion_entrega', '$cerrado','$notas','$usuario')");
      if ($query_insert) {
        $alert = '<div class="alert alert-success" role="alert" style="color: #0000FF; background:#90CAF9; font-size:20px; text-align: center;">
                Seguimiento Registrado
              </div>';/** Solo se registrarán los datos que pertenecen a la tabla seguimiento */
      } else {
        $alert = '<div class="alert alert-danger" role="alert" style="color: #FF0000;">
                Error al registrar el seguimiento
              </div>';/**Esta alerta aparecería en caso de agregar un campo que no existe o agregar y que no sea la tabla correcta*/
      }
    }
  }
  ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registro Seguimiento</title>
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
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
			
			</div>
			<div class="full-width header-well-text">
				<h3>
					REGISTRAR NUEVO SEGUIMIENTO
				</h3>
			</div>
			
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabNewAdmin" class="mdl-tabs__tab is-active">Nuevo seguimiento</a>
				
			</div>
			<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--12-col">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Seguimiento a Clientes
							</div>
							<div class="full-width panel-content">
								<form  method="post" action="">
                                

								<?php echo isset($alert) ? $alert : ''; ?>




								
								<div>
											<label   for="usuarios">¿QUIÉN REGISTRA?</label>
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
						  
                                        <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text"  id="Descripcion" name="Descripcion">
												<label class="mdl-textfield__label" >DESCRIPCIÓN</label>
											</div>
									    </div>



										
								<div>	
								<label   >COMUNICACIÓN</label>
										<select class="mdl-list" name="Comunicacion" id="Comunicacion">
    									<option value="">--Selecciona una opción--</option>
										<option value="SI">SI</option>
										<option value="NO">NO</option>
									</select>
								</div>
									<br>	
										

										<div>
											<label   >ESTATUS CLIENTE</label>
												<select class="mdl-list" name="Estatus_Cliente" id="estatus">
														<option value="">--Selecciona una opción--</option>
														<?php 
															include_once('..funciones/db.php');
															
															$sql='SELECT * FROM estatus_cliente';
															$query=mysqli_query($conexion,$sql);
															while($row=mysqli_fetch_array($query)){
																$Nombre_Estatus=$row['Nombre_Estatus'];
																
															?>
																<option value="<?php echo $Nombre_Estatus ?>"><?php echo $Nombre_Estatus ?></option>
															<?php
															}
											
           												 ?>
												</select>
													
										</div>
										<br>
								<div>	
								<label   >COTIZACIÓN ENTREGADA</label>
										<select class="mdl-list" name="Cotizacion_Entrega" id="Cotizacion_Entrega">
    									<option value="">--Selecciona una opción--</option>
										<option value="SI">SI</option>
										<option value="NO">NO</option>
									</select>
								</div>
											<br>
								<div>	
								<label >CERRADO</label>
										<select class="mdl-list" name="Cerrado" id="Cerrado">
    									<option value="">--Selecciona una opción--</option>
										<option value="SI">SI</option>
										<option value="NO">NO</option>
									</select>
								</div>
								<div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text"  id="Notas" name="Notas">
												<label class="mdl-textfield__label" >Notas</label>
											</div>
									    </div>

										
										</div>
									   
									<p class="text-center">
									
										<input style="color: #FFFFFF;"  type="submit" value="Guardar" class="button">
										<div class="mdl-tooltip" >Registrar</div>
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
