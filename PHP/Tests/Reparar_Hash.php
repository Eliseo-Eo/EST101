<?php
// Forzamos que los errores salgan en pantalla en lugar de dar Error 500
error_reporting(E_ALL);
ini_set('display_errors', 1);

// AJUSTA ESTA RUTA: Si reparar.php está en la raíz, debe ser 'PHP/Config.php'
// Si reparar.php está dentro de la carpeta PHP, debe ser 'Config.php'
require_once '../Config.php';

try {
    $pass = 'Admin123';
    $hash = password_hash($pass, PASSWORD_DEFAULT);

    $sql = "UPDATE Maestros SET Password = ? WHERE Usuario = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$hash, 'Admin']);

    echo "<h1>¡LISTO!</h1>";
    echo "<p>El hash ha sido actualizado en la base de datos.</p>";
    echo "<p>Hash generado: <code>$hash</code></p>";
    echo "<a href='index.php'>Volver al Login</a>";

} catch (Exception $e) {
    echo "<h1>Error de ejecución:</h1>" . $e->getMessage();
}
