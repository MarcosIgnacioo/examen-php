<?php
include_once "../../app/config.php";
?>
<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
    <?php include "../layouts/head.php"; ?>
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">

    <?php include "../layouts/sidebar.php"; ?>
    <?php include "../layouts/nav.php"; ?>

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
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Cupones</a></li>
                                <li class="breadcrumb-item" aria-current="page">Gestion de Cupones</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Gestion de Cupones</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- CRUD de Cupones -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Cupon</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Añadir Cupon</h5>
                            <div class="mb-3">
                                <label for="coupon-code" class="form-label">Codigo del Cupon</label>
                                <input type="text" class="form-control" id="coupon-code" placeholder="Coupon Code">
                            </div>
                            <div class="mb-3">
                                <label for="discount" class="form-label">Cantidad de Descuento</label>
                                <input type="number" class="form-control" id="discount" placeholder="Discount Amount">
                            </div>
                            <div class="mb-3">
                                <label for="expiration-date" class="form-label">Fecha de Expiracion</label>
                                <input type="date" class="form-control" id="expiration-date">
                            </div>

                            <button class="btn btn-success">Gardar Cupon</button>

                            <h5 class="mt-4">Lista de Cupones</h5>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Codigo del Cupon</th>
                                        <th>Cantidad</th>
                                        <th>Fecha de Expiracion</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>CUPON50</td>
                                        <td>$50.00</td>
                                        <td>2024-12-31</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editCouponModal">Editar</button>
                                            <button class="btn btn-danger btn-sm">Eliminar</button>
                                            <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#detailCouponModal">Ver Mas</button>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
            <!-- [ Modal ] end -->
            <div class="modal fade" id="editCouponModal" tabindex="-1" aria-labelledby="editCouponModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editCouponModalLabel">Edit Coupon</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="edit-coupon-code" class="form-label">Coupon Code</label>
                                <input type="text" class="form-control" id="edit-coupon-code" value="CUPON50">
                            </div>
                            <div class="mb-3">
                                <label for="edit-discount" class="form-label">Discount Amount</label>
                                <input type="number" class="form-control" id="edit-discount" value="50.00">
                            </div>
                            <div class="mb-3">
                                <label for="edit-expiration-date" class="form-label">Expiration Date</label>
                                <input type="date" class="form-control" id="edit-expiration-date" value="2024-12-31">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="detailCouponModal" tabindex="-1" aria-labelledby="detailCouponModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailCouponModalLabel">Detalles </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                            <div class="modal-body">
                                <h5 class="modal-title">Informacion </h5>
                                <p><strong>Codigo del Cupon:</strong> CUPON50</p>
                                <p><strong>Descuento:</strong> $50.00</p>
                                <p><strong>Fecha de Expiracion:</strong> 2024-12-31</p>

                                <h5 class="mt-4">Total de Descuento</h5>
                                <p>$500.00</p>

                                <h5 class="mt-4">Pedidos que utilizaron este Cupón</h5>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Cliente</th>
                                            <th>Fecha</th>
                                            <th>Descuento Aplicado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#1001</td>
                                            <td>Juan Pérez</td>
                                            <td>2024-11-10</td>
                                            <td>$50.00</td>
                                        </tr>
                                        <tr>
                                            <td>#1002</td>
                                            <td>Maria Gómez</td>
                                            <td>2024-11-12</td>
                                            <td>$50.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->

        <?php include "../layouts/footer.php"; ?>
        <?php include "../layouts/scripts.php"; ?>
        <?php include "../layouts/modals.php"; ?>

</body>
<!-- [Body] end -->

</html>