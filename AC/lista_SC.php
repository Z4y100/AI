<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lista Seguimientos</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/sweetalert2.css">
	<link rel="stylesheet" href="css/material.min.css">
	<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="../Sistema//css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="js/material.min.js" ></script>
	<script src="js/sweetalert2.min.js" ></script>
	<link rel="icon" href="../Sistema/assets/img/avatar-aitech.png"/>
	<script src="js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="js/main.js" ></script>
</head>
<body>
<body>
<?php include_once "../Sistema/includes/header.php"; ?>
<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-accounts"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					SEGUIMIENTOS
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabListClient" class="mdl-tabs__tab is-active">LISTA</a>
			</div>
			
			<div class="mdl-tabs__panel is-active" id="tabListClient">
			<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--11-col-desktop mdl-cell--1-offset-desktop">
						<div class="full-width panel mdl-shadow--4dp">
							<div class="full-width panel-tittle bg-success text-center tittles">
								Lista de Seguimientos
							</div>
							<div class="full-width panel-content">
							
								<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
									<div class="table-responsive">
									
					<table id="tablax"  class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive" class="col-lg-12">
					
					<thead>
						<tr>
					
						<th class="text-center">Fecha de llegada</th>
							<th class="text-center" >Nombre</th>
							<th class="text-center">N° teléfono</th>
				
							<th class="text-center">Ubicación</th>
							<th class="text-center">Descripción</th>
							<th></th>
							<th class="text-center" >Comunicación</th>
							<th class="text-center">Estatus cliente</th>
						   <th class="text-center">Cotización entregada</th>
						   <th class="text-center">Cerrado</th>
						   <th class="text-center">Notas</th>
						   <?php if ($_SESSION['id_rol'] ==3) {?><th class="text-center">Usuario</th>
							<?php } ?>
						   <th class="text-center">Editar</th>
					
							<th class="text-center">Generar estatus</th>
							
						</tr>
					</thead>
				
					<tbody>
					<?php



					 if ($_SESSION['id_rol'] !=3) {

					 require ("../funciones/db.php");
					 $sql = $conexion ->query("SELECT * FROM seguimiento /**Se obtienen todos los datos de la tabla seguimiento*/ 
					 INNER JOIN clientes ON seguimiento.id_cliente = clientes.id_cliente  /** Se combinan los datos de la tabla clientes con la tabla la deseguimiento mediante el id del cliente */  
					 INNER JOIN estatus_cliente ON seguimiento.estatus_cliente = estatus_cliente.nombre_estatus /** Se combinan los datos de la tabla estatus cliente con la de seguimiento mediante el estatus cliente, que es el nombre del mismo */ 
					 INNER JOIN usuarios ON seguimiento.id_usuario = usuarios.id_usuario WHERE Usuario = '$usuario' /**Se combian los datos de la tabla usuarios con la de seguimiento mediante el id del usuario y solo se mostraran los datos que contengan el nombre el usuario*/ 
					  ");
					 } else {
						require ("../funciones/db.php");
						$sql = $conexion ->query("SELECT * FROM seguimiento 
						INNER JOIN clientes ON seguimiento.id_cliente = clientes.id_cliente 
						INNER JOIN estatus_cliente ON seguimiento.estatus_cliente = estatus_cliente.nombre_estatus 
						INNER JOIN usuarios ON seguimiento.id_usuario = usuarios.id_usuario"); 

					 }
					 
					  $result = mysqli_num_rows($sql);
					  if($result > 0 ){
					 while($resultado = mysqli_fetch_assoc($sql)){
					 ?>
					 <tr style="width: 100%;" >
				
					 <td class="text-center"><?php echo $resultado['Fecha_registro']; ?></td>
								<td class="text-center"><?php echo $resultado['Nombre']; ?></td>
								<td class="text-center"><?php echo $resultado['Telefono']; ?></td>
								<td class="text-center"><?php echo $resultado['Ubicacion']; ?></td>
								<td class="text-center text-gran-body"><?php echo $resultado['Descripcion']; ?></td>
								<td></td>
								<td class="text-center"><?php echo $resultado['Comunicacion']; ?></td>
								<td class="text-center"><?php echo $resultado['Nombre_Estatus']; ?></td>
								<td class="text-center"><?php echo $resultado['Cotizacion_Entrega']; ?></td>
								<td class="text-center"><?php echo $resultado['Cerrado']; ?></td>
								<td class="text-center text-gran-body"><?php echo $resultado['Notas']; ?></td>
								<?php if ($_SESSION['id_rol'] ==3) {?><td class="text-center"><?php echo $resultado['Usuario']; ?></td>
									<?php } ?>
						   <td class="text-center"> 
						   <a href="editar_SC.php?id=<?php echo $resultado['Id_Seguimiento']; ?>" class="boton verde"><i class="zmdi zmdi-border-color"></i></a>
						   </td>
						  
						   <td class="text-center" >
						   <a  href="pdf.php?id=<?php echo $resultado['Id_Seguimiento']; ?>" class="boton morado "><i class="zmdi zmdi-file-text"></i></a>
						  
								</td >
						  
					 </tr>		
					<?php
					 }
					}
					 ?>
					
				</tbody>
				</table>
				</div>
			</div>
		</div>
			
			</div>
			
		</div>
			</div>
		</div>
	</section>
	<!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
        </script>
    <!-- DATATABLES -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
    </script>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">
    </script>
    <script>
        $(document).ready(function () {
            $('#tablax').DataTable({
                language: {
                    processing: "Tratamiento en curso...",
                    search: "Buscar&nbsp;:",
                    lengthMenu: "Mostrar de _MENU_ items",
                    info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
                    infoEmpty: "No existen datos.",
                    infoFiltered: "(filtrado de _MAX_ elementos en total)",
                    infoPostFix: "",
                    loadingRecords: "Cargando...",
                    zeroRecords: "No se encontraron datos con tu busqueda",
                    emptyTable: "No hay datos disponibles en la tabla.",
                    paginate: {
                        first: "Primero",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Ultimo"
                    },
                    aria: {
                        sortAscending: ": active para ordenar la columna en orden ascendente",
                        sortDescending: ": active para ordenar la columna en orden descendente"
                    }
                },
                
                lengthMenu: [ [10, 25, -1], [10, 25, "Todos"] ],
				order: [[1, 'desc']] // Ordenar por la primera
            });
        });
    </script>
</body>
</html>
