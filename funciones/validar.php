<?php
require 'db.php';
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;


$consulta="SELECT*FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas){

if($filas['Id_Rol']==1){ //administrador
    header("location:../Admin/home.html");

}else
if($filas['Id_Rol']==2){ //cliente
header("location:../AC/cliente.php");
}
else
if($filas['Id_Rol']==3){ //Master
        header("location:../Master/home.html");
        }
    }
else{
    ?>
    <?php
    
    include("../index.php");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php
}

mysqli_free_result($resultado);
mysqli_close($conexion);
    ?>