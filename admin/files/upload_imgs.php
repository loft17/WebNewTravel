<?php
include $_SERVER['DOCUMENT_ROOT'] . '/admin/includes/auth/protect.php';
include '../includes/templates/head.php';  // Asegúrate de que head.php tenga los elementos <head> y <meta> adecuados.
include '../includes/functions/upload_img.php';  // Incluir la función para subir imágenes

// Inicializamos las variables para los mensajes
$mensaje = '';
$clase = ''; // Clase para los estilos de éxito o error

// Comprobar si se ha enviado el archivo y llamar a la función para subirlo
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $resultado = procesarSubidaImagen($_FILES['image']);  // Llamar a la función desde upload_img.php

    // Asignar el mensaje y la clase según el resultado
    $mensaje = $resultado['mensaje'];
    $clase = ($resultado['status'] == 'success') ? 'alert-success' : 'alert-danger';  // Establecer la clase para el mensaje
}
?>

<!doctype html>
<html class="no-js" lang="en">
<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <?php include '../includes/templates/sidebar.php'; ?>
        <?php include '../includes/templates/user-profile.php'; ?>

        <!-- main content area start -->
        <div class="main-content">
            <div class="main-content-inner">
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="header-title">Subir imagen</div>
                                <!-- Formulario para subir imagen -->
                                <form action="upload_imgs.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="image">Selecciona una imagen</label>
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Subir imagen</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
                    <!-- Mostrar mensaje de error o éxito -->
                    <?php if ($mensaje): ?>
                        <div id="copyNotification" class="alert <?php echo $clase; ?>" role="alert">
                            <?php echo $mensaje; ?>
                        </div>
                    <?php endif; ?>
            </div>
        </div>
    </div>
    <?php include '../includes/templates/footer.php'; ?>
    <?php include '../includes/libraries/scripts.php'; ?>

</body>
</html>
