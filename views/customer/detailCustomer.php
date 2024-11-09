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
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Other</a></li>
                                <li class="breadcrumb-item" aria-current="page">Sample Page</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Info Del Cliente</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->


            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ sample-page ] start -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header ">
                            <h5>Detalle Del Cliente</h5>
                            <a href='lisDCustomer.php' class='btn btn-sm btn-primary'>Lista Del Cliente
                        </div>
                        <div class="card-body">


                            <h6 class="card-title">Nombre</h6>
                            <p class="card-text">fty</p>

                            <h6 class="card-title">Correo Electrónico</h6>
                            <p class="card-text">correo</p>

                            <h6 class="card-title">Rol</h6>
                            <p class="card-text"></p>

                            <h6 class="card-title">Fecha de Registro</h6>
                            <p class="card-text">fgergr</p>
                            <h6 class="card-title">Nombre</h6>
                            <p class="card-text">rgtrgtrt</p>

                            <h6 class="card-title">Correo Electrónico</h6>
                            <p class="card-text">correo</p>

                            <h6 class="card-title">Rol</h6>
                            <p class="card-text">ythtyry</p>

                            <h6 class="card-title">Fecha de Registro</h6>
                            <p class="card-text">yhrthrt</p>
                            



                            <a href='editCustomer.php' class="btn btn-sm btn-primary">Editar Usuario</a>
                            <a class='btn btn-danger btn-sm' data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="elimiar">Eliminar</a>

                            <!-- Modal -->
                            <div class="modal fade modal-animate" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Estás seguro de que deseas eliminar este usuario?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <a href="#" id="confirmDeleteBtn" class="btn btn-danger">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                        </div>

                    </div>
                </div>
                <!-- [ sample-page ] end -->
            </div>
            <!-- [ Main Content ] end -->
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