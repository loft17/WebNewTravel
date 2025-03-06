<?php
include $_SERVER['DOCUMENT_ROOT'] . '/admin/includes/auth/protect.php';
include_once '../../../config.php';  // Asegúrate de incluir la configuración de la base de datos

// Procesar el formulario cuando se envíe
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger los valores del formulario
    $name = $_POST['name'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];
    $active = isset($_POST['active']) ? 1 : 0;  // Verificar si 'active' está marcado
    $password = $_POST['password'];  // Nueva contraseña

    // Procesar la imagen
    $image_profile = null;
    if (isset($_FILES['image_profile']) && $_FILES['image_profile']['error'] == 0) {
        // Procesar la imagen usando la función que creaste para subir imágenes
        include_once '../../includes/functions/upload-img.php';
        $result = procesarSubidaImagen($_FILES['image_profile']);
        
        if ($result['status'] == 'success') {
            $image_profile = basename($result['ruta']); // Solo obtener el nombre del archivo
        } else {
            echo $result['mensaje'];
            exit();
        }
    }

    // Si el campo de la contraseña no está vacío, lo actualizamos
    if (!empty($password)) {
        // Cifrar la contraseña
        $password = password_hash($password, PASSWORD_DEFAULT);
        if ($image_profile) {
            $update_query = "UPDATE users SET name = ?, email = ?, rol = ?, active = ?, password = ?, image_profile = ? WHERE id = ?";
            $stmt = $conn->prepare($update_query);
            $stmt->bind_param("ssssssi", $name, $email, $rol, $active, $password, $image_profile, $user_id);
        } else {
            $update_query = "UPDATE users SET name = ?, email = ?, rol = ?, active = ?, password = ? WHERE id = ?";
            $stmt = $conn->prepare($update_query);
            $stmt->bind_param("sssssi", $name, $email, $rol, $active, $password, $user_id);
        }
    } else {
        // Si no se proporciona una nueva contraseña, solo actualizamos los otros campos
        if ($image_profile) {
            $update_query = "UPDATE users SET name = ?, email = ?, rol = ?, active = ?, image_profile = ? WHERE id = ?";
            $stmt = $conn->prepare($update_query);
            $stmt->bind_param("sssssi", $name, $email, $rol, $active, $image_profile, $user_id);
        } else {
            $update_query = "UPDATE users SET name = ?, email = ?, rol = ?, active = ? WHERE id = ?";
            $stmt = $conn->prepare($update_query);
            $stmt->bind_param("ssssi", $name, $email, $rol, $active, $user_id);
        }
    }

    // Ejecutar la consulta
    if ($stmt->execute()) {
        header("Location: ../../adm/show_users.php?message=Usuario%20actualizado%20correctamente.");
        exit();
    } else {
        echo "Error al actualizar el usuario.";
    }
}

?>
