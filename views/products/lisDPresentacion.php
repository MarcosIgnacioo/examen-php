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

            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Presentaciones</h2>
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
              <h3>Lista de Presentaciones</h3>
            </div>
            <div class="card-body">

              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <thead class="table-dark">
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Stock</th>
                      <th>Precio</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Presentación 1</td>
                      <td>50</td>
                      <td>$10.00</td>
                      <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editPresentationModal">Editar</button>
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailsModal">Ver Detalles</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>
          </div>



        </div>
        <!-- Modal para Ver Detalles -->
        <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="detailsModalLabel">Detalles de la Presentación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p><strong>ID:</strong> 1</p>
                <p><strong>Nombre:</strong> Presentación 1</p>
                <p><strong>Stock:</strong> 50</p>
                <p><strong>Precio:</strong> $10.00</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Editar Presentación -->
        <div class="modal fade" id="editPresentationModal" tabindex="-1" aria-labelledby="editPresentationLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editPresentationLabel">Editar Presentación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="mb-3">
                    <label for="editPresentationName" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="editPresentationName" required>
                  </div>
                  <div class="mb-3">
                    <label for="editPresentationStock" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="editPresentationStock" required>
                  </div>
                  <div class="mb-3">
                    <label for="editPresentationPrice" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="editPresentationPrice" step="0.01" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
              </div>
            </div>
          </div>
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