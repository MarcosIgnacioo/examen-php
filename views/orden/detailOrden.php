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

  <!-- [ Main Content michelle vieth ] start -->
  <div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Orders</a></li>
                <li class="breadcrumb-item" aria-current="page">Gestión de pedidos</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Gestión de pedidos</h2>
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
              <h5>Order CRUD</h5>
            </div>
            <div class="card-body">
              <h5 class="card-title">Agregar Nuevo Pedido</h5>
              <div class="mb-3">
                <label for="order-id" class="form-label">ID de pedido:</label>
                <input type="text" class="form-control" id="order-id" placeholder="Order ID">
              </div>
              <div class="mb-3">
                <label for="client-name" class="form-label">Nombre del cliente</label>
                <input type="text" class="form-control" id="client-name" placeholder="Nombre del cliente">
              </div>
              <div class="mb-3">
                <label for="client-name" class="form-label">Total</label>
                <input type="text" class="form-control" id="client-name" placeholder="total">
              </div>
              <button class="btn btn-success">Guardar Pedido</button>

              <h5 class="mt-4">Order List</h5>
              <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Folio</th>
                      <th>Cliente</th>
                      <th>Total</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    include_once "../../app/orderController.php"; 
                    include_once "../../app/config.php";
                    
                    $orderController = new OrderController();
                    $orders = $orderController->getAllOrders(); 

                    if (!empty($orders)) {
                        foreach ($orders as $order) {
                            echo "<tr>
                                <td>{$order->id}</td>
                                <td>{$order->folio}</td>
                                <td>{$order->client->name}</td>
                                <td>$" . number_format($order->total, 2) . "</td>
                                <td>
                                    <button class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#editOrdenModal'>Editar</button>
                                    </button>
                                    <button class='btn btn-danger btn-sm'>Eliminar</button>
                                    <button 
                                        class='btn btn-secondary btn-sm view-order-details' 
                                        data-bs-toggle='modal' 
                                        data-bs-target='#detailOrdenModal'
                                        data-order-id='{$order->id}'
                                        data-folio='{$order->folio}'
                                        data-total='{$order->total}'
                                        data-client-name='" . htmlspecialchars($order->client->name, ENT_QUOTES) . "'
                                        data-client-email='" . htmlspecialchars($order->client->email, ENT_QUOTES) . "'
                                        data-address-street='" . htmlspecialchars($order->address->street_and_use_number, ENT_QUOTES) . "'
                                        data-address-city='" . htmlspecialchars($order->address->city, ENT_QUOTES) . "'
                                        data-address-province='" . htmlspecialchars($order->address->province, ENT_QUOTES) . "'
                                        data-address-postal='" . htmlspecialchars($order->address->postal_code, ENT_QUOTES) . "'
                                        data-coupon-code='" . ($order->coupon ? htmlspecialchars($order->coupon->code, ENT_QUOTES) : '') . "'
                                        data-coupon-discount='" . ($order->coupon ? htmlspecialchars($order->coupon->percentage_discount, ENT_QUOTES) : '') . "'
                                        data-presentations='" . htmlspecialchars(json_encode($order->presentations), ENT_QUOTES, 'UTF-8') . "'                >
                                        Ver Más
                                    </button>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr>
                                <td colspan='5'>No orders found.</td>
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
      <!-- [ Modal ]  -->
      <div class="modal fade" id="editOrdenModal" tabindex="-1" aria-labelledby="editOrdenModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editOrdenModalLabel">Editar</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <h5 class="card-title">Editar Pedido</h5>
              <div class="mb-3">
                <label for="order-id" class="form-label">ID de pedido:</label>
                <input type="text" class="form-control" id="order-id" placeholder="Order ID">
              </div>
              <div class="mb-3">
                <label for="client-name" class="form-label">Nombre del cliente</label>
                <input type="text" class="form-control" id="client-name" placeholder="Nombre del cliente">
              </div>
              <div class="mb-3">
                <label for="client-name" class="form-label">Total</label>
                <input type="text" class="form-control" id="client-name" placeholder="total">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
      </div>

      <!--modal para ver detalles de orden-->
      <div class="modal fade" id="detailOrdenModal" tabindex="-1" aria-labelledby="detailOrdenModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Detalles del pedido</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 class="modal-title">Información del pedido</h5>
                <p><strong>ID de pedido: </strong><span id="order-id-display"></span></p>
                <p><strong>Folio: </strong><span id="order-folio-display"></span></p>
                <p><strong>Total: </strong><span id="order-total-display"></span></p>

                <h5 class="mt-4">Productos Comprados</h5>
                <div class="table-responsive">
                    <table id="purchased-products" class="table table-striped table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Código</th>
                                <th>Cantidad</th>
                                <th>Precio unitario</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

                <h5 class="mt-4">Información del cliente</h5>
                <p><strong>Nombre: </strong><span id="client-name-display"></span></p>
                <p><strong>Email: </strong><span id="client-email-display"></span></p>

                <h5 class="mt-4">Dirección de envío</h5>
                <p id="shipping-address-display"></p>

                <div id="coupon-section">
                    <h5 class="mt-4">Cupón aplicado</h5>
                    <p><strong>Código de cupón: </strong><span id="coupon-code-display"></span></p>
                    <p><strong>Descuento aplicado: </strong><span id="coupon-discount-display"></span></p>
                </div>
            </div>
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
<script>
 const detailOrdenModal = document.getElementById('detailOrdenModal');

    detailOrdenModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const data = button.dataset;
        
        document.getElementById('order-id-display').textContent = data.orderId;
        document.getElementById('order-folio-display').textContent = data.folio;
        document.getElementById('order-total-display').textContent = `$${parseFloat(data.total).toFixed(2)}`;
        
        document.getElementById('client-name-display').textContent = data.clientName;
        document.getElementById('client-email-display').textContent = data.clientEmail;
        
        document.getElementById('shipping-address-display').textContent = 
            `${data.addressStreet}, ${data.addressCity}, ${data.addressProvince}, ${data.addressPostal}`;
        
        const couponSection = document.getElementById('coupon-section');
        if (data.couponCode) {
            document.getElementById('coupon-code-display').textContent = data.couponCode;
            document.getElementById('coupon-discount-display').textContent = `${data.couponDiscount}%`;
            couponSection.style.display = 'block';
        } else {
            couponSection.style.display = 'none';
        }
        
        const productsTableBody = document.querySelector('#purchased-products tbody');
        productsTableBody.innerHTML = ''; 
        
        try {
            const presentations = JSON.parse(data.presentations);
            if (presentations && presentations.length > 0) {
                presentations.forEach(item => {
                    const total = parseFloat(item.current_price.amount) * parseInt(item.pivot.quantity);
                    const row = `
                        <tr>
                            <td>${item.description}</td>
                            <td>${item.code}</td>
                            <td>${item.pivot.quantity}</td>
                            <td>$${parseFloat(item.current_price.amount).toFixed(2)}</td>
                            <td>$${total.toFixed(2)}</td>
                        </tr>
                    `;
                    productsTableBody.innerHTML += row;
                });
            } else {
                productsTableBody.innerHTML = '<tr><td colspan="5">No products found for this order.</td></tr>';
            }
        } catch (error) {
            console.error('Error parsing presentations:', error);
            productsTableBody.innerHTML = '<tr><td colspan="5">Error loading products.</td></tr>';
        }
    });
</script>
</html>