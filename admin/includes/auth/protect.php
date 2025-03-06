<?php
session_start();

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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página Administrativa</title>
</head>
<body>
    <h1>Bienvenido, Administrador</h1>
    <!-- Contenido específico para admins -->
</body>
</html>
