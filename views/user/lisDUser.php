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
                        <a href='./user/create/' class='btn btn-sm btn-primary col-sm-auto'>Agregar</a>
                    </div>
                    <div class="card">
                        <div class="card-header">
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
                                                <th>Numero telefonico</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="userTableBody">
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
    <script>
            document.addEventListener("DOMContentLoaded", function() {
                fetchUserList();
            });

            function fetchUserList() {
                fetch('./api-user', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'action=list_users&global_token=<?= $_SESSION["global_token"]; ?>'
                })
                .then(response => response.json())
                .then(data => {
                    let userTableBody = document.getElementById("userTableBody");
                    userTableBody.innerHTML = "";

                    data.forEach(user => {
                        let row = document.createElement("tr");

                        row.innerHTML = `
                            <td>${user.id}</td>
                            <td>${user.name}</td>
                            <td>${user.email}</td>
                            <td>${user.phone_number}</td>
                            <td>
                                <a class='btn btn-danger btn-sm col-sm-auto' data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="elimiar">Eliminar</a>
                               <a href='user/details/${user.id}' class='btn btn-sm col-sm-8'>Ver mas</a>
                            </td>
                        `;
                        userTableBody.appendChild(row);
                    });
                })
                .catch(error => console.error("Error fetching user list:", error));
            }
    </script>
</body>
<!-- [Body] end -->

</html>