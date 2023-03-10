<?php
require("../funciones/db.php");
$id = $_GET['BORRAR_ID'];
$eliminar = "DELETE FROM usuarios where Id_Usuario='$id'";
$eliminar= $conexion->query($eliminar);
header("location:usuarios.php");
$conexion->close();
?>
