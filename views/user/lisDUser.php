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
                                <h2 class="mb-0">Sample Page</h2>
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
                        <div class="card-header">
                            <h5>Lista de usuario</h5>
                            <a href='ruta' class='btn btn-danger btn-sm' >Agregar</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Fecha de Creación</th>
                                        <th>Botonesss</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <tr>
                                    <td>1</td>
                                    <td>2</td> 
                                    <td>3</td> 
                                    <td>4</td>  
                                    <td>
          <a href='Ruta' class='btn btn-primary btn-sm'>Modificar</a> 
          <a href='ruta' class='btn btn-danger btn-sm' >Eliminar</a>
          </td>                          
                                   </tr>
                                   <tr>
                                    <td>1</td>
                                    <td>2</td> 
                                    <td>3</td> 
                                    <td>4</td>                                   
                                   </tr>
                                       
                                   
                                </tbody>
                            </table>
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