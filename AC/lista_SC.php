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
			
			</div>
			<div class="full-width header-well-text">
				<h3>
					SEGUIMIENTOS REGISTRADOS

					
				</h3>
				
			</div>
		</section>
		<div class="full-width divider-menu-h"></div>
		
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
				<div class="table-responsive">
			
					<table id="tablax"  class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive" class="col-lg-12">
					
						<thead>
							<tr>
							<th wi style="text-align: center; width:20%;">Id</th>
							<th style="text-align: center;">Fecha de llegada</th>
								<th style="text-align: center;" >Nombre</th>
								<th style="text-align: center;">N° teléfono</th>
					
								<th style="text-align: center;">Ubicación</th>
                                <th style="text-align: center;">Descripción</th>
                                <th></th>
                                <th style="text-align: center;" >Comunicación</th>
                                <th style="text-align: center;">Estatus cliente</th>
                               <th style="text-align: center;">Cotización entregada</th>
                               <th style="text-align: center;">Cerrado</th>
                               
								<th style="text-align: center;">Editar</th>
						
								<th style="text-align: center;">Generar estatus</th>
								
							</tr>
						</thead>
					
                        <tbody>
						<?php
                         require ("../funciones/db.php");
						 $sql = $conexion ->query("SELECT * FROM seguimiento 
						 INNER JOIN clientes ON seguimiento.id_cliente = clientes.id_cliente  
						 INNER JOIN estatus_cliente ON seguimiento.id_estatus = estatus_cliente.id_estatus ORDER BY clientes.Fecha_registro DESC
						  ");
						 
						  $result = mysqli_num_rows($sql);
						  if($result > 0 ){
						 while($resultado = mysqli_fetch_assoc($sql)){
                         ?>
						 <tr style="width: 100%;" >
						 <td style="text-align: center;"><?php echo $resultado['Id_Seguimiento']; ?></td>
                         <td style="text-align: center;"><?php echo $resultado['Fecha_registro']; ?></td>
									<td style="text-align: center;"><?php echo $resultado['Nombre']; ?></td>
									<td style="text-align: center;"><?php echo $resultado['Telefono']; ?></td>
									<td style="text-align: center;"><?php echo $resultado['Ubicacion']; ?></td>
									<td style="text-align: center;"><?php echo $resultado['Descripcion']; ?></td>
                                    <td></td>
                                    <td style="text-align: center;"><?php echo $resultado['Comunicacion']; ?></td>
									<td style="text-align: center;"><?php echo $resultado['Nombre_Estatus']; ?></td>
                                    <td style="text-align: center;"><?php echo $resultado['Cotizacion_Entrega']; ?></td>
									<td style="text-align: center;"><?php echo $resultado['Cerrado']; ?></td>
								
						       <td style="text-align: center;"> 
							   <a href="editar_SC.php?id=<?php echo $resultado['Id_Seguimiento']; ?>" class="boton verde"><i class="zmdi zmdi-border-color"></i></a>
							   </td>
							  
							   <td style="text-align: center;" >
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
            });
        });
    </script>
</body>
</html>