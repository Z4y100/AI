<?php 
  include "../funciones/db.php";
  if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['Fecha_registro']) || empty($_POST['Nombre']) ||  empty($_POST['Telefono']) || empty($_POST['Ubicación'])
	 ||empty($_POST['Descripcion'])  || empty($_POST['Comunicacion']) || empty($_POST['Estatus_Cliente']) || empty($_POST['Cotizacion_Entrega']) ||empty($_POST['Cerrado']) ) {
      $alert = '<div class="alert alert-danger" role="alert" style="color: #FF0000; background:#FFCDD2; font-size:20px; text-align: center;">
                Todo los campos son obligatorios
              </div>';
    } else {
      $fecha_registro = $_POST['Fecha_registro'];
      $nombre = $_POST['Nombre'];
      $telefono = $_POST['Telefono'];
      $ubicacion = $_POST['Ubicacion'];
      $descripcion = $_POST['Descripcion'];
	  $comunicacion = $_POST['Comunicacion'];
      $estatus_cliente = $_POST['Estatus_Cliente'];
	  $cotizacion_entrega = $_POST['Cotizacion_Entrega'];
      $cerrado = $_POST['Cerrado'];
      $id_usuario = $_SESSION['Id_Usuario'];

      $query_insert = mysqli_query($conexion, "INSERT INTO producto(Fecha_registro,Nombre,Telefono,Ubicacion,Descripcion,Comunicacion,Estatus_Cliente,Cotizazion_Entrega,Cerrado,Id_Cliente)
	   values ('$fecha_registro','$nombre', '$telefono', '$ubicacion', '$descripcion','$comunicacion', '$estatus_cliente', '$cotizacion_entrega', '$cerrado','$id_usuario')");
      if ($query_insert) {
        $alert = '<div class="alert alert-success" role="alert" style="color: #0000FF; background:#90CAF9; font-size:20px; text-align: center;">
                Producto Registrado
              </div>';
      } else {
        $alert = '<div class="alert alert-danger" role="alert" style="color: #FF0000;">
                Error al registrar el producto
              </div>';
      }
    }
  }
  ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registro</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/sweetalert2.css">
	<link rel="stylesheet" href="css/material.min.css">
	<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/main.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
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
											<label   >Fecha llegada</label>
												<select class="mdl-list mb-3" id="Fecha_registro" name="Fecha_registro" >
													
													
													<option value="1">--Selecciona una opcion--</option>
												<?php 
												include("../funciones/db.php");
												$sql=$conexion->query(("SELECT * FROM clientes"));
												while($resultado=$sql->fetch_assoc()){
													echo "<option value='".$resultado['Id']."'>".$resultado
													['Fecha_registro']."</option>";
												}
												?>
													
													
												</select>
											</div>
											<div>
											<label   >Nombre</label>
												<select class="mdl-list mb-3" id="Nombre" name="Nombre" >
													
													
													<option value="1">--Selecciona una opcion--</option>
												<?php 
												include("../funciones/db.php");
												$sql=$conexion->query(("SELECT * FROM clientes"));
												while($resultado=$sql->fetch_assoc()){
													echo "<option value='".$resultado['Id']."'>".$resultado
													['Nombre']."</option>";
												}
												?>
													
													
												</select>
											</div>
									   
											<div>
											<label   >Teléfono</label>
												<select class="mdl-list mb-3" id="Telefono" name="Telefono" >
													
													
													<option value="1">--Selecciona una opcion--</option>
												<?php 
												include("../funciones/db.php");
												$sql=$conexion->query(("SELECT * FROM clientes"));
												while($resultado=$sql->fetch_assoc()){
													echo "<option value='".$resultado['Id']."'>".$resultado
													['Telefono']."</option>";
												}
												?>
													
													
												</select>
											</div>
										
											<div>
											<label   >Ubicación</label>
												<select class="mdl-list mb-3" id="Ubicacion" name="Ubicacion" >
													
													
													<option value="1">--Selecciona una opcion--</option>
												<?php 
												include("../funciones/db.php");
												$sql=$conexion->query(("SELECT * FROM clientes"));
												while($resultado=$sql->fetch_assoc()){
													echo "<option value='".$resultado['Id']."'>".$resultado
													['Ubicacion']."</option>";
												}
												?>
													
													
												</select>
											</div>
                                        
                                        
                                        <div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text"  id="Descripcion" name="Descripcion">
												<label class="mdl-textfield__label" >Descripción</label>
											</div>
									    </div>
                                       
                                            <div>
											<label   >Estatus cliente</label>
												<select class="mdl-list" id="Estatus_Cliente" name="Estatus_Cliente" >
													<option value="1">Selecciona una opcion</option>
													<option value="2"  id="Estatus_Cliente" name="Estatus_Cliente"  style="background-color: #7FBCAB;">En proceso</option>
													<option value="3"  id="Estatus_Cliente" name="Estatus_Cliente"  style="background-color: #E57373;"></option>
												
												</select>
											</div>
                                            <div>
											<label  >Cotización entregada</label>
												<select class="mdl-list" id="Cotizacion_Entrega" name="Cotizacion_Entrega" >
													<option value="1">Selecciona una opcion</option>
													<option  id="Cotizacion_Entrega" name="Cotizacion_Entrega" value="2" style="background-color: #7FBCAB;">SI</option>
													<option  id="Cotizacion_Entrega" name="Cotizacion_Entrega" value="3" style="background-color: #E57373;">NO</option>
												
												</select>
											</div>
                                            <div>
											<label   >Cerrado</label>
												<select class="mdl-list" id="Cerrado" name="Cerrado">
													<option value="1">Selecciona una opcion</option>
													<option id="Cerrado" name="Cerrado" value="2" style="background-color: #7FBCAB;">SI</option>
													<option  id="Cerrado" name="Cerrado" value="3" style="background-color: #E57373;">NO</option>
												
												</select>
											</div>
                                        

										
										</div>
									   
									<p class="text-center">
										
                                        <button class="mdl-button mdl-js-button  mdl-js-ripple-effect mdl-button--colored bg-primary" style="color: #FFFFFF;"id="btn-addClient">
										Guardar
										</button>
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