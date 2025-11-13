<?php
// archivo: listar_archivos.php

$directorio = "../ARCHIVOS"; // Cambia esta ruta a la carpeta donde están tus archivos

// Verifica si la carpeta existe
if (is_dir($directorio)) {
    
    $archivos = scandir($directorio);

    // Elimina las entradas "." y ".."
    $archivos = array_diff($archivos, array('.', '..'));

    // Devuelve los archivos y carpetas en formato JSON
    echo json_encode(array_values($archivos));
} else {
    echo json_encode(["error" => "El directorio no existe."]);
}
?>
