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
                        <form method="POST" action="./api-coupons" enctype="multipart/form-data">
                            <input type="text" name="action" value="create_coupon">
                            <label for="name">Nombre del cupón:</label>
                            <input type="text" id="name" name="name" value="cupon OP 20%" required>

                            <label for="code">Código:</label>
                            <input type="text" id="code" name="code" value="ASDFasdf" required>

                            <label for="percentage_discount">Descuento (%) :</label>
                            <input type="number" id="percentage_discount" name="percentage_discount" value="20" required>

                            <label for="min_amount_required">Monto mínimo requerido:</label>
                            <input type="number" id="min_amount_required" name="min_amount_required" value="100" required>

                            <label for="min_product_required">Cantidad mínima de productos requerida:</label>
                            <input type="number" id="min_product_required" name="min_product_required" value="1" required>

                            <label for="start_date">Fecha de inicio:</label>
                            <input type="date" id="start_date" name="start_date" value="2022-10-04" required>

                            <label for="end_date">Fecha de fin:</label>
                            <input type="date" id="end_date" name="end_date" value="2022-10-14" required>

                            <label for="max_uses">Usos máximos:</label>
                            <input type="number" id="max_uses" name="max_uses" value="100" required>

                            <label for="count_uses">Conteo de usos:</label>
                            <input type="number" id="count_uses" name="count_uses" value="0" required>

                            <label for="valid_only_first_purchase">Válido solo para primera compra:</label>
                            <input type="checkbox" id="valid_only_first_purchase" name="valid_only_first_purchase" value="1" checked>

                            <label for="status">Estado:</label>
                            <select id="status" name="status" required>
                                <option value="1" selected>Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                            <input type="hidden" name="global_token" value="<?php echo $_SESSION['global_token']; ?>">

                            <button type="submit">Enviar</button>
                            </form>

                        <h5 class="mt-4">Lista de Cupones</h5>
                            <div class="table-responsive">

                            <table class="table table-striped table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Codigo del Cupon</th>
                                        <th>Cantidad</th>
                                        <th>Fecha de Expiracion</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                
                                    include_once "../../app/couponController.php"; 
                                    include_once "../../app/config.php";
                                    $couponController = new CouponController();
                                    $coupons = $couponController->getAllCoupons();

                                    if (!empty($coupons)) {
                                        foreach ($coupons as $coupon) {
                                            echo "<tr>
                                                    <td>{$coupon->name}</td>
                                                    <td>\${$coupon->percentage_discount}</td>
                                                    <td>{$coupon->end_date}</td>
                                                    <td>
                                                        <button class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#editCouponModal'>Editar</button>
                                                        <button class='btn btn-danger btn-sm'>Eliminar</button>
                                                        <button class='btn btn-secondary btn-sm' data-bs-toggle='modal' data-bs-target='#detailCouponModal' data-coupon-id='<?php echo $coupon->id; ?>'>Ver Mas</button>
                                                    </td>
                                                </tr>";
                                        }
                                    } else {
                                        echo "<tr>
                                                <td colspan='4'>No coupons found.</td>
                                            </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- [ Modal ] end -->                                         
            <!--Editar el cupon-->
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


                                <!--Ver mas del cupon-->
                                <div class="modal fade" id="detailCouponModal" tabindex="-1" aria-labelledby="detailCouponModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detailCouponModalLabel">Detalles</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h5 class="modal-title">Informacion</h5>
                                    <p><strong>Codigo del Cupon:</strong> <span id="coupon-code"></span></p>
                                    <p><strong>Descuento:</strong> <span id="coupon-discount"></span></p>
                                    <p><strong>Fecha de Expiracion:</strong> <span id="coupon-expiration"></span></p>

                                    <h5 class="mt-4">Total de Descuento</h5>
                                    <p><span id="total-discount"></span></p>

                                    <h5 class="mt-4">Pedidos que utilizaron este Cupón</h5>
                                    <table class="table table-striped" id="orders-table">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Cliente</th>
                                                <th>Fecha</th>
                                                <th>Descuento Aplicado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Orders will be inserted here by JS -->
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


