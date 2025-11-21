<?php
/**
 * ==========================================================
 *  📦 GESTOR DE SESIONES - SECUNDARIA TÉCNICA 101
 * ==========================================================
 *  Archivo: Principal_php.php
 *  Descripción:
 *      Controla las operaciones de autenticación seguras
 *      (inicio y cierre de sesión) para el portal de la
 *      Secundaria Técnica 101.
 *
 *  Características:
 *   - Gestión segura de sesiones PHP.
 *   - Soporte para solicitudes JSON (AJAX) y POST clásicas.
 *   - Cabeceras anti-caché para mayor seguridad.
 *   - Respuestas uniformes en formato JSON.
 *
 *  Autor: [Guillermo Eliseo Guzman Lopez]
 *  Fecha: 2025
 * ==========================================================
 */

session_start();
header('Content-Type: application/json');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');

try {

    // ==========================================================
    // 🧭 Validación del método HTTP
    // ==========================================================
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Método no permitido');
    }

    // ==========================================================
    // 🚪 Cierre de sesión (Logout clásico)
    // ==========================================================
    if (!empty($_POST['action']) && $_POST['action'] === 'logout') {
        session_unset();
        session_destroy();

        echo json_encode([
            'success' => true,
            'message' => 'Sesión cerrada correctamente.'
        ]);
        exit;
    }

    // ==========================================================
    // 🔐 Inicio de sesión (Login mediante JSON)
    // ==========================================================
    $input = json_decode(file_get_contents('php://input'), true);

    if (!isset($input['username'], $input['password'])) {
        throw new Exception('Datos inválidos');
    }

    $username = $input['username'];
    $password = $input['password'];

    // ==========================================================
    // 🧩 Validación de credenciales
    // (En producción deben obtenerse desde una base de datos)
    // ==========================================================
    $hash = password_hash('Tecnica101', PASSWORD_DEFAULT);

    if ($username === 'Maestro_Tecnica' && password_verify($password, $hash)) {
        $_SESSION['user_id'] = 1;

        echo json_encode(['success' => true]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Credenciales incorrectas'
        ]);
    }

} catch (Exception $e) {

    // ==========================================================
    // ⚠️ Manejo de errores y excepciones
    // ==========================================================
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}

exit;