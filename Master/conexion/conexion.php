<?php
$conexion = new mysqli("localhost", "root", "", "aitech");


/* comprueba la conexión */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>