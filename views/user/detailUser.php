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
                                <h2 class="mb-0">Info Del Usuario</h2>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->


            <!-- [ Main Content ] start -->


                    <div class="row">
                        <div class="row justify-content-between ali mb-3 g-3">
                            <a href='user/' class='btn-primary col-sm-auto'>Regresar</a>
                        </div>
                        <div class="col-lg-5 col-xxl-3">
                            <div class="card overflow-hidden">
                                <div class="card-body position-relative">
                                    <div class="text-center mt-3">
                                        <div class="chat-avtar d-inline-flex mx-auto">
                                            <!--aqui va imagen del usuario-->
                                            <img class="rounded-circle img-fluid wid-150 img-thumbnail" src="" alt="User image">
                                            <i class="chat-badge bg-success me-2 mb-2"></i>
                                        </div>
                                        <h5 class="mb-0" id="userName"></h5>
                                        <!--aqui va nombre del usuario-->
                                        <p class="text-muted text-sm">IG <a href="" class="link-primary">  </a></p>
                                    </div>
                                </div>
                                <div class="nav flex-column nav-pills list-group list-group-flush account-pills mb-0" id="user-set-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link list-group-item list-group-item-action active" id="user-set-profile-tab" data-bs-toggle="pill" href="#user-set-profile" role="tab" aria-controls="user-set-profile" aria-selected="true">
                                        <span class="f-w-500"><i class="ph-duotone ph-user-circle m-r-10"></i>Descripción general</span>
                                    </a>
                                    <a class="nav-link list-group-item list-group-item-action" id="user-set-information-tab" data-bs-toggle="pill" href="#user-set-information" role="tab" aria-controls="user-set-information" aria-selected="false" tabindex="-1">
                                        <span class="f-w-500"><i class="ph-duotone ph-clipboard-text m-r-10"></i>Infomacion Personal</span>
                                    </a>
                                    <a class="nav-link list-group-item list-group-item-action" id="user-set-passwort-tab" data-bs-toggle="pill" href="#user-set-passwort" role="tab" aria-controls="user-set-passwort" aria-selected="false" tabindex="-1">
                                        <span class="f-w-500"><i class="ph-duotone ph-key m-r-10"></i>Cambiar Contraseña</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 col-xxl-9">
                            <div class="tab-content" id="user-set-tabContent">
                                <div class="tab-pane fade show active" id="user-set-profile" role="tabpanel" aria-labelledby="user-set-profile-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Descripcion General</h5>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item px-0 pt-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Nombre(s)</p>
                                                            <p class="mb-0" id="firstName"></p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Apellidos</p>
                                                            <p class="mb-0" id="lastName"></p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Telefono</p>
                                                            <p class="mb-0" id="phone"></p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Pais</p>
                                                            <p class="mb-0" id="country"></p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Correo</p>
                                                            <p class="mb-0" id="email"></p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0 pb-0">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Codigo Postal</p>
                                                        <p class="mb-0" id="postalCode"></p>
                                                    </div>
                                                    <p class="mb-1 text-muted">Direccion</p>
                                                    <p class="mb-0" id="address"></p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                <!--informacion personal, editar usuario-->
                                </div>
                                <div class="tab-pane fade" id="user-set-information" role="tabpanel" aria-labelledby="user-set-information-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Informacion Personal</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nombre(s)</label>
                                                        <input type="text" class="form-control" id="editFirstName">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Apellidos</label>
                                                        <input type="text" class="form-control" id="editLastName">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Correo <span class="text-danger">*</span></label>
                                                        <input type="email" class="form-control" id="editEmail">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Telefono</label>
                                                        <input type="text" class="form-control" id="editPhone">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Pais</label>
                                                        <input type="text" class="form-control" id="editCountry">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Direccion</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Codigo Postal</label>
                                                        <input type="text" class="form-control" id="editPostalCode">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="mb-0">
                                                        <label class="form-label">Ciudad</label>
                                                        <input type="text" class="form-control" id="editCity">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="mb-0">
                                                        <label class="form-label">Calle 1</label>
                                                        <input type="text" class="form-control" id="editStreet">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="mb-0">
                                                        <label class="form-label">NO. de Casa</label>
                                                        <input type="text" class="form-control" id="editHouseNumber">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-end btn-page">
                                        <div class="btn btn-outline-secondary">Cancelar</div>
                                        <div class="btn btn-primary">Actualizar Perfil</div>
                                    </div>
                                </div>

                                
                                <!--cambiar contrase;a-->
                                <div class="tab-pane fade" id="user-set-passwort" role="tabpanel" aria-labelledby="user-set-passwort-tab">
                                    <div class="card alert alert-warning p-0">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 me-3">
                                                    <h4 class="alert-heading">Alert!</h4>
                                                    <p class="mb-2">Your Password will expire in every 3 months. So change it periodically.</p>
                                                    <a href="#" class="alert-link"><u>Do not share your password</u></a>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <img src="../assets/images/application/img-accout-password-alert.png" alt="img" class="img-fluid wid-80">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Cambiar Contraseña</h5>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item pt-0 px-0">
                                                    <div class="row mb-0">
                                                        <label class="col-form-label col-md-4 col-sm-12 text-md-end">Contraseña Actual <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-md-8 col-sm-12">
                                                            <input type="password" class="form-control">
                                                            <div class="form-text"> Olidaste tu Contraseña? <a href="#" class="link-primary">Click here</a> </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <div class="row mb-0">
                                                        <label class="col-form-label col-md-4 col-sm-12 text-md-end">Nueva Contraseña <span class="text-danger">*</span></label>
                                                        <div class="col-md-8 col-sm-12">
                                                            <input type="password" class="form-control">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item pb-0 px-0">
                                                    <div class="row mb-0">
                                                        <label class="col-form-label col-md-4 col-sm-12 text-md-end">Confirmar Contraseña <span class="text-danger">*</span></label>
                                                        <div class="col-md-8 col-sm-12">
                                                            <input type="password" class="form-control">
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body text-end">
                                            <div class="btn btn-outline-secondary me-2">Cancelar</div>
                                            <div class="btn btn-primary">Cambiar Contraseña</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ sample-page ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>


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
        const pathParts = window.location.pathname.split('/');
        const userId = pathParts[pathParts.length - 1];
        
        fetchUserDetails(userId);
    });

    function fetchUserDetails(userId) {
        fetch('../../api-user', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `action=user_details&id=${userId}&global_token=<?= $_SESSION["global_token"]; ?>`
        })
        .then(response => response.json())
        .then(user => {
            // para imagen
            if (user.avatar) {
                document.querySelector('.wid-150').src = user.avatar;
            }
            
            // userdetails
            document.getElementById('userName').textContent = `${user.name} ${user.lastname || ''}`;
            document.getElementById('firstName').textContent = user.name || 'No disponible';
            document.getElementById('lastName').textContent = user.lastname || 'No disponible';
            document.getElementById('phone').textContent = user.phone_number || 'No disponible';
            document.getElementById('country').textContent = user.address?.country || 'No disponible';
            document.getElementById('email').textContent = user.email || 'No disponible';
            document.getElementById('postalCode').textContent = user.address?.postal_code || 'No disponible';
            document.getElementById('address').textContent = formatAddress(user.address) || 'No disponible';

            // seccion de editar
            document.getElementById('editFirstName').value = user.name || '';
            document.getElementById('editLastName').value = user.lastname || '';
            document.getElementById('editEmail').value = user.email || '';
            document.getElementById('editPhone').value = user.phone || '';
            document.getElementById('editCountry').value = user.country || '';
            document.getElementById('editPostalCode').value = user.postalCode || '';
            document.getElementById('editCity').value = user.city || '';
            document.getElementById('editStreet').value = user.street || '';
            document.getElementById('editHouseNumber').value = user.houseNumber || '';
        })
        .catch(error => {
            console.error("Error fetching user details:", error);
            alert("Error al cargar los detalles del usuario");
        });
    }

    function formatAddress(address) {
        if (!address) return 'No disponible';
        
        const parts = [];
        if (address.street_and_use_number) parts.push(address.street_and_use_number);
        if (address.city) parts.push(address.city);
        if (address.state) parts.push(address.state);
        
        return parts.length > 0 ? parts.join(', ') : 'No disponible';
    }
    </script>
</body>
<!-- [Body] end -->

</html>
