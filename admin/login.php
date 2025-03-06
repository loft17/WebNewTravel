<?php
include 'includes/templates/head.php';  // Asegúrate de que head.php tenga los elementos <head> y <meta> adecuados.
?>

<!doctype html>
<html class="no-js" lang="en">

<body>
                   

    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    
    <!-- login area start -->
    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--100">
                <form action="includes/auth/auth.php" method="POST">
                    <!-- Campo oculto para el token CSRF -->
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">



                    <div class="login-form-head">
                        <h4>Acceder</h4>
                        <p>Hola, Inicia sesión y empieza a gestionar tu viaje.</p>
                    </div>

                    <!-- Mostrar mensaje de error si existe -->
                    <?php
                    if (isset($_SESSION['login_error'])) {
                        echo '<div class="alert alert-danger">' . $_SESSION['login_error'] . '</div>';
                        unset($_SESSION['login_error']); // Eliminar el mensaje después de mostrarlo
                    }
                    ?>
                    
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Dirección email</label>
                            <input type="email" id="exampleInputEmail1" name="email" required>
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Contraseña</label>
                            <input type="password" id="exampleInputPassword1" name="password" required>
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Recordarme</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <a href="#">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Entrar <i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>



        </div>
    </div>
    <!-- login area end -->


    <?php include 'includes/libraries/scripts.php'; ?>


</body>

</html>
