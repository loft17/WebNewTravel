<?php
include '../includes/auth/protect.php';
include '../includes/templates/head.php';  // Asegúrate de que head.php tenga los elementos <head> y <meta> adecuados.
include '../includes/functions/get_images.php'; // Incluir el archivo para obtener las imágenes

// Obtener las imágenes
$images = getImagesFromDirectory($_SERVER['DOCUMENT_ROOT'] . '/content/uploads/');
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
                                <div class="header-title">Imagenes</div>

                                <?php displayImages($images); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main content area end -->

    </div>
    <!-- page container area end -->

    <?php include '../includes/templates/footer.php'; ?>
    <?php include '../includes/libraries/scripts.php'; ?>
</body>

</html>

<?php
// Función para mostrar las imágenes
function displayImages($images) {
    echo '<div style="display: flex; flex-wrap: wrap;">';
    foreach ($images as $image) {
        $relativePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', $image); // Ruta relativa a la carpeta web
        echo '<div style="margin: 10px; width: 200px; text-align: center;">';
        echo '<img src="' . $relativePath . '" alt="Image" style="width: 100%; max-width: 180px; height: auto;"/>';
        echo '<p>' . basename($image) . '</p>';
        echo '</div>';
    }
    echo '</div>';
}
?>
