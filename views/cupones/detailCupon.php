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
                            <h5 class="card-title">Añadir Cupón</h5>
                            <form method="POST" action="./api-coupon" enctype="multipart/form-data">
                                <input type="hidden" name="action" value="create_coupon">

                                <div class="mb-3">
                                    <label for="name" class="form-label">Nombre del cupón:</label>
                                    <input type="text" class="form-control" id="name" name="name" value="cupon OP 20%" required>
                                </div>

                                <div class="mb-3">
                                    <label for="code" class="form-label">Código:</label>
                                    <input type="text" class="form-control" id="code" name="code" value="ASDFasdf" required>
                                </div>

                                <div class="mb-3">
                                    <label for="percentage_discount" class="form-label">Descuento (%):</label>
                                    <input type="number" class="form-control" id="percentage_discount" name="percentage_discount" value="20" required>
                                </div>

                                <div class="mb-3">
                                    <label for="min_amount_required" class="form-label">Monto mínimo requerido:</label>
                                    <input type="number" class="form-control" id="min_amount_required" name="min_amount_required" value="100" required>
                                </div>

                                <div class="mb-3">
                                    <label for="min_product_required" class="form-label">Cantidad mínima de productos requerida:</label>
                                    <input type="number" class="form-control" id="min_product_required" name="min_product_required" value="1" required>
                                </div>

                                <div class="mb-3">
                                    <label for="start_date" class="form-label">Fecha de inicio:</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" value="2022-10-04" required>
                                </div>

                                <div class="mb-3">
                                    <label for="end_date" class="form-label">Fecha de fin:</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date" value="2022-10-14" required>
                                </div>

                                <div class="mb-3">
                                    <label for="max_uses" class="form-label">Usos máximos:</label>
                                    <input type="number" class="form-control" id="max_uses" name="max_uses" value="100" required>
                                </div>

                                <div class="mb-3">
                                    <label for="count_uses" class="form-label">Conteo de usos:</label>
                                    <input type="number" class="form-control" id="count_uses" name="count_uses" value="0" required>
                                </div>

                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="valid_only_first_purchase" name="valid_only_first_purchase" value="1" checked>
                                    <label class="form-check-label" for="valid_only_first_purchase">Válido solo para primera compra</label>
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Estado:</label>
                                    <select class="form-select" id="status" name="status" required>
                                        <option value="1" selected>Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>

                                <input type="hidden" name="global_token" value="<?php echo $_SESSION['global_token']; ?>">
                                <button type="submit" class="btn btn-success">Enviar</button>
                            </form>
                        </div>


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
                                                <button 
                                                    class='btn btn-warning btn-sm' 
                                                    data-bs-toggle='modal' 
                                                    data-bs-target='#editCouponModal'
                                                    data-coupon_id='{$coupon->id}'
                                                    data-name='{$coupon->name}'
                                                    data-code='{$coupon->code}'
                                                    data-percentage_discount='{$coupon->percentage_discount}'
                                                    data-min_amount_required='{$coupon->min_amount_required}'
                                                    data-min_product_required='{$coupon->min_product_required}'
                                                    data-start_date='{$coupon->start_date}'
                                                    data-end_date='{$coupon->end_date}'
                                                    data-max_uses='{$coupon->max_uses}'
                                                    data-count_uses='{$coupon->count_uses}'
                                                    data-valid_only_first_purchase='{$coupon->valid_only_first_purchase}'
                                                    data-status='{$coupon->status}'
                                                >
                                                    Editar
                                                </button>
                                                    <button 
                                                        class='btn btn-danger btn-sm' 
                                                        data-bs-toggle='modal' 
                                                        data-bs-target='#deleteCouponModal'
                                                        data-coupon-id='{$coupon->id}'
                                                    >
                                                        Eliminar
                                                    </button>   
                                                    <button 
                                                    class='btn btn-secondary btn-sm' 
                                                    data-bs-toggle='modal' 
                                                    data-bs-target='#detailCouponModal' 
                                                    data-name='{$coupon->name}'
                                                    data-code='{$coupon->code}'
                                                    data-percentage_discount='{$coupon->percentage_discount}'
                                                    data-min_amount_required='{$coupon->min_amount_required}'
                                                    data-min_product_required='{$coupon->min_product_required}'
                                                    data-start_date='{$coupon->start_date}'
                                                    data-end_date='{$coupon->end_date}'
                                                    data-max_uses='{$coupon->max_uses}'
                                                    data-count_uses='{$coupon->count_uses}'
                                                    data-valid_only_first_purchase='{$coupon->valid_only_first_purchase}'
                                                    data-status='{$coupon->status}'
                                                     data-orders='" . json_encode($coupon->orders) . "'
                                                    >
                                                    Ver Más
                                                </button>

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
                        <form method="POST" action="./api-coupon" enctype="multipart/form-data" id="editCouponForm">
                            <input type="hidden" name="action" value="update_coupon">
                            <input type="hidden" name="coupon_id" id="edit-coupon-id">

                                <div class="mb-3">
                                    <label for="edit-name" class="form-label">Nombre del cupón:</label>
                                    <input type="text" class="form-control" id="edit-name" name="name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="edit-code" class="form-label">Código:</label>
                                    <input type="text" class="form-control" id="edit-code" name="code" required>
                                </div>

                                <div class="mb-3">
                                    <label for="edit-percentage_discount" class="form-label">Descuento (%):</label>
                                    <input type="number" class="form-control" id="edit-percentage_discount" name="percentage_discount" required>
                                </div>

                                <div class="mb-3">
                                    <label for="edit-min_amount_required" class="form-label">Monto mínimo requerido:</label>
                                    <input type="number" class="form-control" id="edit-min_amount_required" name="min_amount_required" required>
                                </div>

                                <div class="mb-3">
                                    <label for="edit-min_product_required" class="form-label">Cantidad mínima de productos requerida:</label>
                                    <input type="number" class="form-control" id="edit-min_product_required" name="min_product_required" required>
                                </div>

                                <div class="mb-3">
                                    <label for="edit-start_date" class="form-label">Fecha de inicio:</label>
                                    <input type="date" class="form-control" id="edit-start_date" name="start_date" required>
                                </div>

                                <div class="mb-3">
                                    <label for="edit-end_date" class="form-label">Fecha de fin:</label>
                                    <input type="date" class="form-control" id="edit-end_date" name="end_date" required>
                                </div>

                                <div class="mb-3">
                                    <label for="edit-max_uses" class="form-label">Usos máximos:</label>
                                    <input type="number" class="form-control" id="edit-max_uses" name="max_uses" required>
                                </div>

                                <div class="mb-3">
                                    <label for="edit-count_uses" class="form-label">Conteo de usos:</label>
                                    <input type="number" class="form-control" id="edit-count_uses" name="count_uses" required>
                                </div>

                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="edit-valid_only_first_purchase" name="valid_only_first_purchase" value="1">
                                    <label class="form-check-label" for="edit-valid_only_first_purchase">Válido solo para primera compra</label>
                                </div>

                                <div class="mb-3">
                                    <label for="edit-status" class="form-label">Estado:</label>
                                    <select class="form-select" id="edit-status" name="status" required>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>

                                <input type="hidden" name="global_token" value="<?php echo $_SESSION['global_token']; ?>">
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->

                <!--Ver mas del cupon-->
                <div class="modal fade" id="detailCouponModal" tabindex="-1" aria-labelledby="detailCouponModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="detailCouponModalLabel">Detalles del Cupón</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Nombre del cupón:</label>
                                    <span id="coupon-name"></span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Código:</label>
                                    <span id="coupon-code"></span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Descuento (%):</label>
                                    <span id="coupon-percentage_discount"></span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Monto mínimo requerido:</label>
                                    <span id="coupon-min_amount_required"></span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Cantidad mínima de productos:</label>
                                    <span id="coupon-min_product_required"></span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Fecha de inicio:</label>
                                    <span id="coupon-start_date"></span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Fecha de fin:</label>
                                    <span id="coupon-end_date"></span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Usos máximos:</label>
                                    <span id="coupon-max_uses"></span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Conteo de usos:</label>
                                    <span id="coupon-count_uses"></span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Válido solo para primera compra:</label>
                                    <span id="coupon-valid_only_first_purchase"></span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Estado:</label>
                                    <span id="coupon-status"></span>
                                </div>
                                
                            </div>
                            <h5 class="mt-4">Pedidos que utilizaron este Cupón</h5>
                                <table class="table table-striped" id="orders-table">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Cliente</th>
                                            <th>Folio</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

           </div>
           

        <div class="modal fade" id="deleteCouponModal" tabindex="-1" aria-labelledby="deleteCouponModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteCouponModalLabel">Confirmar Eliminación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Está seguro que desea eliminar este cupón?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <form action="./api-coupon" method="POST" style="display: inline;">
                            <input type="hidden" name="action" value="delete_coupon">
                            <input type="hidden" name="coupon_id" id="delete-coupon-id">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                            <input type="hidden" name="global_token" value="<?php echo $_SESSION['global_token']; ?>">

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->

        <?php include "../layouts/footer.php"; ?>
        <?php include "../layouts/scripts.php"; ?>
        <?php include "../layouts/modals.php"; ?>
        </div>
    </div>
    <!-- [ Body ] end -->
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const editCouponModal = document.getElementById('editCouponModal');
        editCouponModal.addEventListener('show.bs.modal', (event) => {
            const button = event.relatedTarget; 
            const modal = editCouponModal;

            modal.querySelector('#edit-coupon-id').value = button.getAttribute('data-id');
            modal.querySelector('#edit-name').value = button.getAttribute('data-name');
            modal.querySelector('#edit-code').value = button.getAttribute('data-code');
            modal.querySelector('#edit-percentage_discount').value = button.getAttribute('data-percentage_discount');
            modal.querySelector('#edit-min_amount_required').value = button.getAttribute('data-min_amount_required');
            modal.querySelector('#edit-min_product_required').value = button.getAttribute('data-min_product_required');
            modal.querySelector('#edit-start_date').value = button.getAttribute('data-start_date');
            modal.querySelector('#edit-end_date').value = button.getAttribute('data-end_date');
            modal.querySelector('#edit-max_uses').value = button.getAttribute('data-max_uses');
            modal.querySelector('#edit-count_uses').value = button.getAttribute('data-count_uses');
            modal.querySelector('#edit-valid_only_first_purchase').checked = button.getAttribute('data-valid_only_first_purchase') == '1';
            modal.querySelector('#status').value = button.getAttribute('data-status');
        });
    });

    const deleteCouponModal = document.getElementById('deleteCouponModal');
    deleteCouponModal.addEventListener('show.bs.modal', (event) => {
        const button = event.relatedTarget;
        const couponId = button.getAttribute('data-coupon-id');
        deleteCouponModal.querySelector('#delete-coupon-id').value = couponId;
    });


    const detailCouponModal = document.getElementById('detailCouponModal');

    detailCouponModal.addEventListener('show.bs.modal', function(event) {
    const button = event.relatedTarget;
    const data = button.dataset;

    document.getElementById('coupon-name').textContent = data.name;
    document.getElementById('coupon-code').textContent = data.code;
    document.getElementById('coupon-percentage_discount').textContent = data.percentage_discount;
    document.getElementById('coupon-min_amount_required').textContent = data.min_amount_required;
    document.getElementById('coupon-min_product_required').textContent = data.min_product_required;
    document.getElementById('coupon-start_date').textContent = data.start_date;
    document.getElementById('coupon-end_date').textContent = data.end_date;
    document.getElementById('coupon-max_uses').textContent = data.max_uses;
    document.getElementById('coupon-count_uses').textContent = data.count_uses;
    document.getElementById('coupon-valid_only_first_purchase').textContent = data.valid_only_first_purchase == 1 ? 'Sí' : 'No';
    document.getElementById('coupon-status').textContent = data.status == 1 ? 'Activo' : 'Inactivo';

    const ordersTableBody = document.querySelector('#orders-table tbody');
    ordersTableBody.innerHTML = ''; 

    const orders = JSON.parse(data.orders); 
    if (orders.length > 0) {
        orders.forEach(order => {
            const row = `
                <tr>
                    <td>${order.id}</td>
                    <td>${order.client_id}</td>
                    <td>${order.folio}</td>
                    <td>$${parseFloat(order.total).toFixed(2)}</td>
                </tr>
            `;
            ordersTableBody.innerHTML += row;
        });
    } else {
        ordersTableBody.innerHTML = '<tr><td colspan="4">No orders found for this coupon.</td></tr>';
    }
});



</script>

</body>
</html>
