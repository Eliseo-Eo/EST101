<?php
// PHP/Config.php
$host = 'localhost';
$db   = 'EST101'; // Tu base de datos
$user = 'root';
$pass = 'MySql151994?'; 
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     // Si falla la conexión, devolvemos un JSON para que el JS no se rompa
     header('Content-Type: application/json');
     echo json_encode(['success' => false, 'message' => 'Error de conexión: ' . $e->getMessage()]);
     exit;
}