<?php
// Verificar si se ha enviado un ID válido para eliminar
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    // Mostrar una ventana emergente de confirmación con js
    echo "<script>
        var confirmar = confirm('¿Estás seguro de eliminar este registro?');
        if (confirmar) {
            window.location.href = 'borrarU.php?id=' + " . $id . ";
        } else {
            window.location.href = 'usuarios.php';
        }
    </script>";
} else {
    echo "ID inválido para eliminar.";
}
?>