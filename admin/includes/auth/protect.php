<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario está logueado y si es admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    // Si el usuario no está logueado o no tiene el rol de admin, almacenar el mensaje de error en la sesión
    $_SESSION['login_error'] = "Acceso no autorizado. Necesitas ser administrador.";

    // Redirigir al login
    header("Location: /admin/login.php");
    exit();
}

// Si el usuario es admin, continúa con el código de la página
?>
