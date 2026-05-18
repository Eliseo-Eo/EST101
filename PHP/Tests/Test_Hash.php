<?php
$pass_plana = "Admin123";
$hash_bd = '$2y$10$8.ZpYv6E4W6B8Q5Z2X7Y8uG1/kI5V3J6S2P9Q0R1S2T3U4V5W6X7Y';

if (password_verify($pass_plana, $hash_bd)) {
    echo "✅ PHP verifica el hash correctamente.";
} else {
    echo "❌ PHP no reconoce el hash. Intentemos generar uno nuevo en este servidor: <br>";
    echo password_hash("Admin123", PASSWORD_DEFAULT);
}