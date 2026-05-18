<?php
// Incluimos tu configuración actual
require_once 'Config.php'; 

try {
    // 1. Verificar si la variable $pdo existe
    if (isset($pdo)) {
        echo "✅ Conexión establecida con éxito a la base de datos: <b>" . $db . "</b><br>";
        
        // 2. Intentar una consulta simple para ver si las tablas existen
        $stmt = $pdo->query("SELECT COUNT(*) as total FROM Usuarios");
        $row = $stmt->fetch();
        
        echo "📊 Conexión a la tabla 'Usuarios' operativa. Total de usuarios registrados: " . $row['total'];
    }
} catch (PDOException $e) {
    echo "❌ Error de conexión: " . $e->getMessage();
}