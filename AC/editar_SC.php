<?php 
  include "../funciones/db.php";
  if (!empty($_POST)) {
    $alert = "";
    if ( empty($_POST['Descripcion']) || empty($_POST['Comunicacion']) 
    || empty($_POST['Estatus_Cliente'])
     || empty($_POST['Cotizacion_Entrega']) ||empty($_POST['Cerrado']) ||empty($_POST['Notas']) ) {/** 	Son los campos que forzosamente deben estar llenos */
      $alert = '<div class="alert alert-danger" role="alert" style="color: #FF0000; background:#FFCDD2; font-size:20px; text-align: center;">
                Todos los campos son obligatorios
              </div>';
    } else {
        $id_seguimiento = $_GET['id'];
	 
      $descripcion = $_POST['Descripcion'];
	  $comunicacion = $_POST['Comunicacion'];
      $estatus_cliente = $_POST['Estatus_Cliente'];
	  $cotizacion_entrega = $_POST['Cotizacion_Entrega'];
      $cerrado = $_POST['Cerrado'];
      $notas = $_POST['Notas'];

      $query_update = mysqli_query($conexion, "UPDATE seguimiento SET 
      Descripcion ='$descripcion',
      Comunicacion = '$comunicacion', Estatus_Cliente = '$estatus_cliente', 
      Cotizacion_Entrega = '$cotizacion_entrega',
      Cerrado ='$cerrado', Notas = '$notas' WHERE Id_Seguimiento = $id_seguimiento");/** Son los campos que se pueden actualizar */
      
        $alert = '<div class="alert alert-success" role="alert" style="color: #0000FF; background:#90CAF9; font-size:20px; text-align: center;">
                Seguimiento Modificado
              </div>';
      } 
  }
  
// Validar seguimiento

if (empty($_REQUEST['id'])) {
    header("Location: lista_SC.php");
  }
  $id_seguimiento = $_REQUEST['id'];
  $sql = mysqli_query($conexion, "SELECT * FROM seguimiento WHERE Id_Seguimiento = $id_seguimiento");
  $result_sql = mysqli_num_rows($sql);
  if ($result_sql == 0) {
    header("Location: lista_SC.php");
  } else {
    if ($data = mysqli_fetch_array($sql)) {
      $id_seguimiento = $data['Id_Seguimiento'];
      $descripcion = $data['Descripcion'];
      $comunicacion = $data['Comunicacion'];
      $estatus_cliente = $data['Estatus_Cliente'];
      $cotizacion_entrega = $data['Cotizacion_Entrega'];
      $cerrado = $data['Cerrado'];
	  $notas = $data['Notas'];
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
<?php include_once "../Sistema/includes/header.php"; ?> <!--  ver el menú -->
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
			
			</div>
			<div class="full-width header-well-text">
				<h3>
					MODIFICAR SEGUIMIENTO
				</h3>
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabNewAdmin" class="mdl-tabs__tab is-active">Modificar seguimiento</a>
				
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
                                

                                <?php echo isset($alert) ? $alert : ''; ?> <!-- Ayuda a ver las validaciones -->

                                        
                                        <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text"  id="Descripcion" name="Descripcion" value="<?php echo $descripcion; ?>">
												<label class="mdl-textfield__label" >Descripción</label>
											</div>
									    </div>
										<div>
											<label>COMUNICACIÓN</label>
											<select name="Comunicacion" id="Comunicacion" class="mdl-list">
												<option value="<?php echo $comunicacion; ?>"><?php echo $comunicacion?></option>
												<option value="SI">SI</option>
												<option value="NO">NO</option>
											</select>
										</div>
										<br>
										
										<div>

										<label>TIPO DE PROYECTO:</label>
											<select id="estatus" name="Estatus_Cliente" id="Estatus_Cliente" value="<?php echo $estatus_cliente; ?>" class="mdl-list">
											<option value="<?php echo $estatus_cliente; ?>"><?php echo$estatus_cliente; ?></option>
											<?php 
												include_once('..funciones/db.php');
												
												$sql='SELECT * FROM estatus_cliente';
												$query=mysqli_query($conexion,$sql);
												while($row=mysqli_fetch_array($query)){
													
													$nombreE=$row['Nombre_Estatus'];
												?>
													<option value="<?php echo $nombreE ?>"><?php echo $nombreE ?></option><!-- Muestra todos los datos disponibles-->
												<?php
												}
											
           									 ?>
            
        
											</select>
										</div>
										<br>
										<div>
											<label>COTIZACIÓN ENTREGADA</label>
											<select name="Cotizacion_Entrega" id="Cotizacion_Entrega" class="mdl-list">
												<option value="<?php echo $cotizacion_entrega; ?>"><?php echo $cotizacion_entrega?></option>
												<option value="SI">SI</option>
												<option value="NO">NO</option>
											</select>
										</div>
										<br>
										<div>
											<label>CERRADO</label>
											<select name="Cerrado" id="Cerrado" class="mdl-list">
												<option value="<?php echo $cerrado; ?>"><?php echo $cerrado?></option>
												<option value="SI">SI</option>
												<option value="NO">NO</option>
											</select>
										</div>
                                        <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text"  id="Notas" name="Notas" value="<?php echo $notas; ?>">
												<label class="mdl-textfield__label" >Notas</label>
											</div>
									    </div>

										
										</div>
									   
									<p class="text-center">
									
											<center>
										<button class="button" name="btnGuardar">ACTUALIZAR</button>
											<div class="mdl-tooltip" for="btn-addAdmin">Actualizar</div>
										<input type="button" class="button" name="btnRegresar" value="REGRESAR" onclick="document.location.href='lista_SC.php';">
											
										</center>
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
