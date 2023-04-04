<?php
require("../funciones/db.php");
// Verificar si se ha enviado un ID válido para eliminar
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    // Preparar la consulta preparada
    $consulta1 = $conexion->prepare("DELETE FROM clientes WHERE Id_Usuario = ?");
    $consulta = $conexion->prepare("DELETE FROM usuarios WHERE Id_Usuario = ?");
    
    // Vincular el ID como parámetro a la consulta
    $consulta1->bind_param("i", $id);
    $consulta->bind_param("i", $id);
    
    // Ejecutar la consulta y posteriormente mostrar alerta en pantalla
    if ($consulta1->execute() && $consulta->execute()) {
        

        echo '<script type="text/javascript">'; 
        echo 'alert("ELIMINACION CORRECTA. YA PUEDE CERRAR ESTA VENTANA ");'; 
        echo 'window.location = "javascript:history.back(1)";';
        echo '</script>';

        
    } else {
        echo "Error al eliminar el registro: " . $conexion->error;
    }
    
    // Cerrar la consulta
    $consulta->close();
} else {
    echo "ID inválido para eliminar.";
}
?>
