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
                                <h2 class="mb-0">Info De Usuarios</h2>
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
                    <div class="row justify-content-between ali mb-3 g-3">

                        <a href='altaUser.php' class='btn btn-sm btn-primary col-sm-auto'>Agregar</a>
                    </div>
                    <div class="card">
                        <div class="card-header ">
                            <div class="card-body">
                                <h3>Lista de usuario</h3>
                                <div class="row justify-content-between ali mb-3 g-3">
                                    <div class="col-sm-auto">
                                        <form class="form-search">
                                            <i class="ph-duotone ph-magnifying-glass icon-search"></i>
                                            <input type="search" class="form-control" placeholder="Search...">
                                            <button class="btn btn-light-secondary btn-search">Search</button>
                                        </form>

                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover mb-0">
                                        <thead>
                                            <tr>

                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Email</th>
                                                <th>Fecha de Creación</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>
                                                    <div class="align-items-center">
                                                        <p>01</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="align-items-center">
                                                        <div class="col">
                                                            <h5 class="mb-1">Martin Eduardo</h5>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="align-items-center">
                                                        <h5 class="mb-1">mlopez_21@alu.uabcs.mx</h5>

                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="align-items-center">
                                                        <div class="col">
                                                            <h5 class="mb-1"> 01/04/2003</h5>
                                                        </div>
                                                    </div>

                                                </td>
                                                <td>
                                                    <a class='btn btn-danger btn-sm col-sm-auto' data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="elimiar">Eliminar</a>
                                                    <a href='detailUser.php' class='btn btn-sm col-sm-8'>Ver mas</a>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>4</td>
                                                <td>
                                                    <a class='btn btn-danger btn-sm col-sm-auto' data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="elimiar">Eliminar</a>
                                                    <a href='detailUser.php' class='btn btn-sm col-sm-8'>Ver mas</a>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>4</td>
                                                <td>
                                                    <a class='btn btn-danger btn-sm col-sm-auto' data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="elimiar">Eliminar</a>
                                                    <a href='detailUser.php' class='btn btn-sm col-sm-8'>Ver mas</a>

                                                </td>
                                            </tr>


                                        </tbody>

                                    </table>
                                </div>
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