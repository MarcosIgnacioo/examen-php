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
                      <th>Fecha</th>
                      <th>Cliente</th>
                      <th>Total</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>#1001</td>
                      <td>2024-11-10</td>
                      <td>Juan Pérez</td>
                      <td>$150.00</td>
                      <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editOrdenModal">Editar</button>
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                        <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#detailOrdenModal">Ver Mas</button>

                      </td>
                    </tr>
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

      <div class="modal fade" id="detailOrdenModal" tabindex="-1" aria-labelledby="detailOrdenModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5>Detalles del pedido</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">
              <h5 class="modal-title">Información del pedido</h5>
              <p><strong>ID de pedido: </strong> #1001</p>
              <p><strong>Fecha:</strong> 2024-11-10</p>
              <p><strong>Total:</strong> $150.00</p>

              <h5 class="mt-4">Purchased Products</h5>
              <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                  <thead>
                    <tr>
                      <th>Producto</th>
                      <th>Cantidad</th>
                      <th>Precio unitario</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Producto A</td>
                      <td>2</td>
                      <td>$30.00</td>
                      <td>$60.00</td>
                    </tr>
                  </tbody>
                </table>
              </div>


              <h5 class="mt-4">Información del cliente</h5>
              <p><strong>Nombre:</strong> Juan Pérez</p>
              <p><strong>Email:</strong> juan.perez@example.com</p>

              <h5 class="mt-4">Dirección de envío</h5>
              <p>123 Fake Street, Example City</p>

              <h5 class="mt-4">Cupón aplicado</h5>
              <p><strong>Código de cupón:</strong> CUPON50</p>
              <p><strong>Descuento aplicado: </strong> $50.00</p>
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

</html>