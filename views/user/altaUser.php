<?php
include_once "../../app/config.php";

?>
<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>

    <?php

    include "../layouts/head.php";

    ?>

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">


    <?php

    include "../layouts/sidebar.php";

    ?>
    <?php

    include "../layouts/nav.php";

    ?>




    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Agregar</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->


            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Register User</h5>
                        </div>
                        <div class="card-body">
                            <form action="../../api-user" method="POST">
                                <input type="hidden" name="action" value="create_user">

                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Correo electronico</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>

                                <div class="form-group">
                                    <label for="phone_number">Numero telefonico</label>
                                    <input type="tel" class="form-control" id="phone_number" name="phone_number" pattern="[0-9]{10}" maxlength="10" required>
                                    <small class="form-text text-muted">introduzca un numero telefonico de 10 digitos</small>
                                </div>

                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input type="password" class="form-control" id="password" name="password" minlength="6" required>
                                </div>

                                <div class="form-group">
                                    <label for="confirmpassword">Confirmar contraseña</label>
                                    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" minlength="6" required>
                                </div>

                                <div>
                                <input type="hidden" name="global_token" value="<?php echo $_SESSION['global_token']; ?>">

                                    <a href='lisDUser.php' class="btn btn-danger">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->

    <?php

    include "../layouts/footer.php";

    ?>
    <?php

    include "../layouts/scripts.php";

    ?>

    <?php

    include "../layouts/modals.php";

    ?>

</body>
<!-- [Body] end -->

</html>