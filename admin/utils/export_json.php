<?php
include '../includes/templates/head.php';  // Asegúrate de que head.php tenga los elementos <head> y <meta> adecuados.
// Asegúrate de usar include_once para evitar duplicados
include_once '../../config.php';  // Incluir config.php una sola vez
include_once '../includes/functions/export-json.php';  // Incluir el archivo de funciones

if (isset($_POST['exportar_json'])) {
    // Llamamos a la función que está en export-json.php para exportar los datos
    exportar_a_json($conn);  // Llamamos a la función exportar_a_json
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
            
        <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <!-- No gutters start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="header-title">Exportar todas las tablas</div>
                                
                                <!-- Aquí va el botón para exportar los datos -->
                                <form method="POST">
                                    <button type="submit" name="exportar_json" class="btn btn-primary">Exportar todas las tablas a JSON</button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- No gutters end -->
                    
                    
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
