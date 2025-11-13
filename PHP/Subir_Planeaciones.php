<?php
// Comprobar si se recibió el turno, el mes y el archivo
if (isset($_POST['turno']) && isset($_POST['mes']) && isset($_FILES['archivo']) && $_FILES['archivo']['error'] == 0) {
    $turno = $_POST['turno'];
    $mes = $_POST['mes'];  // Obtener el mes seleccionado

    // Validar el turno recibido
    if (!in_array($turno, ['matutino', 'vespertino'])) {
        http_response_code(400);
        echo "Turno inválido.";
        exit;
    }

    // Validar el mes seleccionado
    if (!preg_match('/^\d{2}_[A-Za-z]+$/', $mes)) {
        http_response_code(400);
        echo "Mes inválido.";
        exit;
    }

    // Definir la ruta de destino según el turno
    if ($turno === 'matutino') {
        // Ruta fuera del directorio actual con el mes seleccionado
        $carpeta_destino = __DIR__ . "/../ARCHIVOS/T_MAT/PLANEACIONES/$mes/";
    } elseif ($turno === 'vespertino') {
        // Ruta fuera del directorio actual con el mes seleccionado
        $carpeta_destino = __DIR__ . "/../ARCHIVOS/T_VES/PLANEACIONES/$mes/";
    }

    // Crear la carpeta si no existe
    if (!file_exists($carpeta_destino)) {
        mkdir($carpeta_destino, 0777, true);  // Crear carpeta con permisos 0777
    }

    // Guardar el archivo
    $nombre_temporal = $_FILES['archivo']['tmp_name'];
    $nombre_final = basename($_FILES['archivo']['name']);
    $ruta_destino = $carpeta_destino . $nombre_final;

    // Mover el archivo a la carpeta destino
    if (move_uploaded_file($nombre_temporal, $ruta_destino)) {
        echo "Archivo subido correctamente a $turno en la carpeta $mes.";
    } else {
        http_response_code(500);
        echo "Error al mover el archivo. Verifique los permisos de la carpeta.";
    }
} else {
    http_response_code(400);
    echo "Faltan datos o el archivo no es válido.";
}
?>
