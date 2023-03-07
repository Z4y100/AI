<?php
  include "../funciones/db.php";
  session_start();
  if (empty($_SESSION['active'])) {
      header('location: ../index.php');
  }
  // Obtener el nombre de usuario del usuario actual
  $usuario= $_SESSION['usuario'];

  // Obtener la contraseña actual y la nueva contraseña del formulario
  $contrasena_actual = $_POST["Contraseña"];
  $nueva_contrasena = $_POST["Nueva-Contraseña"];

  // Consultar la base de datos para obtener la contraseña actual del usuario
  $query = "SELECT Contraseña FROM usuarios WHERE Usuario = '$usuario'";
  $resultado = $conexion->query($query);

  // Verificar si la consulta fue exitosa
  if ($resultado->num_rows > 0) {
    // Obtener la fila de resultados
    $fila = $resultado->fetch_assoc();
    // Verificar si la contraseña actual es correcta
    if ($contrasena_actual == $fila["Contraseña"]) {
      // La contraseña es correcta, actualizar la contraseña en la base de datos
      $query = "UPDATE usuarios SET Contraseña = '$nueva_contrasena' WHERE Usuario = '$usuario'";
      if ($conexion->query($query) === TRUE) {
        echo "Contraseña actualizada correctamente";
      } else {
        echo "Error al actualizar la contraseña: " . $conexion->error;
      }
    } else {
      // La contraseña actual es incorrecta, mostrar un mensaje de error
      echo "La contraseña actual es incorrecta";
    }
  } else {
    // No se encontró al usuario en la base de datos, mostrar un mensaje de error
    echo "Error: usuario no encontrado";
  }

  // Cerrar la conexión con la base de datos
  $conexion->close();
?>
