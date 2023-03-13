<?php 
  include "../funciones/db.php";
  if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['Id_Cliente'])  ||empty($_POST['Descripcion'])  || empty($_POST['Comunicacion']) || empty($_POST['Estatus_Cliente']) || empty($_POST['Cotizacion_Entrega']) ||empty($_POST['Cerrado']) ) {
      $alert = '<div class="alert alert-danger" role="alert" style="color: #FF0000; background:#FFCDD2; font-size:20px; text-align: center;">
                Todos los campos son obligatorios
              </div>';
    } else {
		$id_cliente = $_POST['Id_Cliente'];
      $descripcion = $_POST['Descripcion'];
	  $comunicacion = $_POST['Comunicacion'];
      $estatus_cliente = $_POST['Estatus_Cliente'];
	  $cotizacion_entrega = $_POST['Cotizacion_Entrega'];
      $cerrado = $_POST['Cerrado'];
      

      $query_insert = mysqli_query($conexion, "INSERT INTO seguimiento(Id_Cliente,Descripcion,Comunicacion,Estatus_Cliente,Cotizacion_Entrega,Cerrado)
	   values ('$id_cliente','$descripcion','$comunicacion', '$estatus_cliente', '$cotizacion_entrega', '$cerrado')");
      if ($query_insert) {
        $alert = '<div class="alert alert-success" role="alert" style="color: #0000FF; background:#90CAF9; font-size:20px; text-align: center;">
                Seguimiento Registrado
              </div>';
      } else {
        $alert = '<div class="alert alert-danger" role="alert" style="color: #FF0000;">
                Error al registrar el seguimiento
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
	<title>Lista Atención a Clientes</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/sweetalert2.css">
	<link rel="stylesheet" href="css/material.min.css">
	<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="../Sistema//css/style.css">
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
								<div class="form-group">
               <label>Id Cliente</label>
               <?php
                $query_cliente = mysqli_query($conexion, "SELECT Id_Cliente, Nombre FROM clientes ORDER BY Id_Cliente ASC");
                $resultado_cliente = mysqli_num_rows($query_cliente);
                mysqli_close($conexion);
                ?>

               <select id="Id_Cliente" name="Id_Cliente" class="form-control">
			   <option >--Selecciona una opcion--</option>
                 <?php
                  if ($resultado_cliente > 0) {
                    while ($cliente = mysqli_fetch_array($query_cliente)) {
                      // code...
                  ?>
                     <option value="<?php echo $cliente['Id_Cliente']; ?>"><?php echo $cliente['Id_Cliente']; ?></option>
                 <?php
                    }
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
										<div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text"  id="Comunicacion" name="Comunicacion">
												<label class="mdl-textfield__label" >Comunicación</label>
											</div>
									    </div>
										<div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text"  id="Estatus_Cliente" name="Estatus_Cliente">
												<label class="mdl-textfield__label" >Estatus cliente</label>
											</div>
									    </div>
										<div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text"  id="Cotizacion_Entrega" name="Cotizacion_Entrega">
												<label class="mdl-textfield__label" >Cotización entregada</label>
											</div>
									    </div>
										<div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text"  id="Cerrado" name="Cerrado">
												<label class="mdl-textfield__label" >Cerrado</label>
											</div>
									    </div>
                                        

										
										</div>
									   
									<p class="text-center">
									
										<input style="color: #FFFFFF;"  type="submit" value="Guardar" class="mdl-button mdl-js-button  mdl-js-ripple-effect mdl-button--colored bg-primary">
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