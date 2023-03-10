<?php				
	session_start();
	$usuario= $_SESSION['usuario'];

    require("../funciones/db.php");
    $id = $_GET['EDITAR_ID'];
    $sele = "SELECT * from usuarios  where id_usuario ='$id'";
    $result = $conexion->query($sele);
    $row = mysqli_fetch_assoc($result);  
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EDITAR USUARIOS</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/sweetalert2.css">
	<link rel="stylesheet" href="css/material.min.css">
	<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="css/main.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="js/material.min.js" ></script>
	<script src="js/sweetalert2.min.js" ></script>
	<script src="js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="js/main.js" ></script>

    <!-- Aqui empieza lo de editar usuarios -->
       
    <link rel="stylesheet" href="css/editar_usuario.css"/>
    <script language="javascript" type="text/javascript">
    function windowClose() {
    window.open('','_parent','');
    window.close();
    }
</script> 
    <!-- Aqui termina lo de editar usuarios -->

</head>
<body>
	
	<!-- navLateral -->
	<section class="full-width navLateral">
		<div class="full-width navLateral-bg btn-menu"></div>
		<div class="full-width navLateral-body">
			<div class="full-width navLateral-body-logo text-center tittles">
				<i class="zmdi zmdi-close btn-menu"></i> AITECH 
			</div>
			<figure class="full-width navLateral-body-tittle-menu">
				<div>
					<img src="assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
				</div>
				<figcaption>
					<span>
					<?php
						echo $usuario;
						?><br>
						<small><?php echo $_SESSION['rol_name']; ?></small>
					</span>
				</figcaption>
			</figure>
			<nav class="full-width">
				<ul class="full-width list-unstyle menu-principal">
					<li class="full-width">
						<a href="home.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-view-dashboard"></i>
							</div>
							<div class="navLateral-body-cr">
								INICIO
							</div>
						</a>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-case"></i>
							</div>
							<div class="navLateral-body-cr">
								CLIENTES
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="company.html" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-balance"></i>
									</div>
									<div class="navLateral-body-cr">
										REGISTRADOS
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="providers.html" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-truck"></i>
									</div>
									<div class="navLateral-body-cr">
										SEGUIMIENTO
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="payments.html" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-card"></i>
									</div>
									<div class="navLateral-body-cr">
										PAYMENTS
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="categories.html" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-label"></i>
									</div>
									<div class="navLateral-body-cr">
										CATEGORIES
									</div>
								</a>
							</li>
						</ul>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-face"></i>
							</div>
							<div class="navLateral-body-cr">
								USUARIOS
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="usuarios.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-account"></i>
									</div>
									<div class="navLateral-body-cr">
										VER USUARIOS
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="Rusuario.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-accounts"></i>
									</div>
									<div class="navLateral-body-cr">
										REGISTRAR USUARIO
									</div>
								</a>
							</li>
						</ul>
					</li>
										
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-wrench"></i>
							</div>
							<div class="navLateral-body-cr">
								AJUSTES
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="#!" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr">
										OPTION
									</div>
								</a>
							</li>
							
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</section>
	<!-- pageContent -->
	<section class="full-width pageContent">
		<!-- navBar -->
		<div class="full-width navBar">
			<div class="full-width navBar-options">
				<i class="zmdi zmdi-swap btn-menu" id="btn-menu"></i>	
				<div class="mdl-tooltip" for="btn-menu">Hide / Show MENU</div>
				<nav class="navBar-options-list">
					<ul class="list-unstyle">
						<li class="btn-Notification" id="notifications">
							<i class="zmdi zmdi-notifications"></i>
							<div class="mdl-tooltip" for="notifications">Notifications</div>
						</li>
						<li class="btn-exit" id="btn-exit">
							<i class="zmdi zmdi-power"></i>
							<div class="mdl-tooltip" for="btn-exit">LogOut</div>
						</li>
						<li class="text-condensedLight noLink" ><small><?php
						echo $usuario;
						?><br></small></li>
						<li class="noLink">
							<figure>
								<img src="assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
							</figure>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<section class="full-width text-center" style="padding: 40px 0;">
			
			<!-- Tiles -->

            <?php
$status = "";
if(isset($_POST["enviar"]))
{
$usuario= $_POST["Usuario"];
$correo= $_POST["Correo"];
$contraseña= $_POST["Contraseña"];
$tipo_proyecto= $_POST["Id_Proyecto"];
$rol= $_POST["Id_Rol"];
$fecha_creacion= $_POST["Fecha_Creacion"];
$id= $_POST["Id_Usuario"];
  
$update = 'UPDATE usuarios SET

Usuario=TRIM("'.$usuario.'"),

Correo=TRIM("'.$correo.'"),
      
Contraseña=TRIM("'.$contraseña.'"),

Tipo_Proyecto=TRIM("'.$tipo_proyecto.'"),

Rol=TRIM("'.$rol.'"),

Fecha_Creacion=TRIM("'.$fecha_creacion.'")
      
WHERE Id_Usuario=TRIM('.$id.')';
  
  
if ($conexion->query($update) === TRUE) 
{
echo '<script type="text/javascript">'; 
echo 'alert("EDICION CORRECTA. YA PUEDE CERRAR ESTA VENTANA ");'; 
echo 'window.location = "javascript:history.back(1)";';
echo '</script>';
 
}
else
{
 
echo '<script type="text/javascript">'; 
echo 'alert("ERROR REVISAR SI FALTAN DATOS");'; 
echo 'window.location = "javascript:history.back(1)";';
echo '</script>';
}
 
}

else {
 
?> 
  
  
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	<h3><a>EDITAR USUARIO </a></h3>
	<form id="form_18653" class="appnitro"  method="post" action="">
	<div class="form_description">
    <h4> MODIFIQUE LOS SIGUIENTES VALORES:</h4>
	
	</div>						
	
    <ul >
      
      
    <input id="Id_Usuario" name="Id_Usuario"  class="element text small" type="hidden" maxlength="255" value="<?php echo $row['Id_Usuario'];?>"/> 
		
			
	<li id="li_2" >
	<label class="description" for="producto">Usuario: </label>
	<div>
	<input id="Usuario" name="Usuario" class="element text medium" type="text" maxlength="255" value="<?php echo $row['Usuario'];?>"/> 
	</div> 
	</li>
      
    <li id="li_3" >
	<label class="description" for="serie">Correo: </label>
	<div>
	<input id="Correo" name="Correo" class="element text medium" type="text" maxlength="255" value="<?php echo $row['Correo'];?>"/> 
	</div> 
	</li>		


	<li id="li_4" >
	<label class="description" for="serie">Contraseña: </label>
	<div>
	<input id="Contraseña" name="Contraseña" class="element text medium" type="password" maxlength="255" value="<?php echo $row['Contraseña'];?>"/> 
	</div> 
	</li>	


	<li id="li_5" >
<div >
                                        <label   for="serie">TIPO DE PROYECTO:</label>
                                        <center><select class="mdl-list" name="Id_Proyecto">
                                                    <option value="">--Selecciona una opción--</option>
                                                    <?php 
                                                        include_once('..funciones/db.php');
                                                        
                                                        $sql='SELECT * FROM tipo_proyecto';
                                                        $query=mysqli_query($conexion,$sql);
                                                        while($arreglo=mysqli_fetch_array($query)){
                                                            $id_proyecto=$arreglo['Id_Proyecto'];
                                                            $nombreproyecto=$arreglo['Nombre_Proyecto'];
                                                        ?>
                                                            <option value="<?php echo $id_proyecto ?>"><?php echo $nombreproyecto ?></option>
                                                        <?php
                                                        }
                                        
                                                        ?>
                                            </select></center>
                                                
                                    </div>
</li>	


<li id="li_6" >

                                        <label   for="usuarios">ROL:</label>
                                        <center><select class="mdl-list" name="Id_Rol">
                                                    <option value="">--Selecciona una opción--</option>
                                                    <?php 
                                                        include_once('..funciones/db.php');
                                                        
                                                        $sql='SELECT * FROM roles';
                                                        $query=mysqli_query($conexion,$sql);
                                                        while($arreglo=mysqli_fetch_array($query)){
                                                            $id_rol=$arreglo['Id_Rol'];
                                                            $nombrerol=$arreglo['Nombre'];
                                                        ?>
                                                            <option value="<?php echo $id_rol ?>"><?php echo $nombrerol ?></option>
                                                        <?php
                                                        }
                                        
                                                        ?>
                                            </select></center>
                                                
                                    
</li>	


    <li id="li_7" >
	<label class="description" for="fechaing">Fecha de creacion: </label>
	<div>
	<input id="Fecha_Creacion" name="Fecha_Creacion" class="element text medium" type="text" maxlength="255" value="<?php echo $row['Fecha_Creacion'];?>"/> 
	</div> 
	</li>	
			
	
    <li class="buttons">
	<input type="hidden" name="form_id" value="18653" />
	<input id="saveForm" class="button_text" type="submit" name="enviar" value="Aceptar" />
    <input class="button_text" type="submit" onclick="javascript: form.action='usuarios.php';" value="Regresar" />      
                      
	</ul>
	</form>	
		
    <?php } ?>
      
	</div>
	</body>

    
			
		</section>
		
	</section>
</body>
</html>