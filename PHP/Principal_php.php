<?php
/**
 * ==========================================================
 *  📦 GESTOR DE SESIONES ADAPTADO A BD - TÉCNICA 101
 * ==========================================================
 */

session_start();
require_once 'Config.php'; // 👈 Importamos la conexión

header('Content-Type: application/json');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Método no permitido');
    }

    // CIERRE DE SESIÓN (Logout)
    // Nota: Para AJAX con JSON, el logout suele enviarse distinto, 
    // pero mantenemos tu lógica por compatibilidad.
    if (!empty($_POST['action']) && $_POST['action'] === 'logout') {
        session_unset();
        session_destroy();
        echo json_encode(['success' => true, 'message' => 'Sesión cerrada.']);
        exit;
    }

    // INICIO DE SESIÓN
    $input = json_decode(file_get_contents('php://input'), true);

    if (!isset($input['username'], $input['password'])) {
        throw new Exception('Datos inválidos');
    }

    $username = $input['username'];
    $password = $input['password'];

    // ==========================================================
    // 🧩 Lógica con Base de Datos
    // ==========================================================
    
    // Buscamos al usuario por su alias (eliseo_eo) o correo
    $stmt = $pdo->prepare("SELECT Id, Nombre_Completo, Usuario, Password, Rol FROM Maestros WHERE Usuario = ? LIMIT 1");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['Password'])) {
        // ✅ Credenciales correctas: Creamos la sesión con datos de la BD
        $_SESSION['User_Id'] = $user['Id'];
        $_SESSION['Nombre']  = $user['Nombre_Completo'];
        $_SESSION['Usuario'] = $user['Usuario'];
        $_SESSION['Rol']     = $user['Rol'];

        echo json_encode([
            'success' => true,
            'rol' => $user['Rol'] // Útil para redirecciones en JS
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Usuario o contraseña incorrectos'
        ]);
    }

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
exit;