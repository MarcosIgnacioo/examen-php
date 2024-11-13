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
                <li class="breadcrumb-item"><a href="javascript: void(0)">Catalogs</a></li>
                <li class="breadcrumb-item" aria-current="page">Catalog Management</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Gestión de catálogos</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->

      <!-- [ Main Content ] start -->
      <div class="row">
        <!-- CRUD de Categorías -->
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h5>Categoría CRUD</h5>
            </div>
            <div class="card-body">
              <h5 class="card-title">Agregar nueva categoría</h5>
              <div class="mb-3">
                <label for="category-name" class="form-label">Nombre de la categoría</label>
                <input type="text" class="form-control" id="category-name" placeholder="Nombre">
              </div>
              <button class="btn btn-success">Guardar Categoría</button>

              <h5 class="mt-4">Lista de categorías</h5>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Categoria ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Electronica</td>
                    <td>
                      <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editCategoryModal">Editar</button>
                      <button class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- CRUD de Marcas -->
        <div class="col-sm-12 mt-4">
          <div class="card">
            <div class="card-header">
              <h5>Marca CRUD</h5>
            </div>
            <div class="card-body">
              <h5 class="card-title">Agregar nueva marca</h5>
              <div class="mb-3">
                <label for="brand-name" class="form-label">Nombre de marca</label>
                <input type="text" class="form-control" id="brand-name" placeholder="Nombre">
              </div>
              <button class="btn btn-success">Guardar</button>

              <h5 class="mt-4">Lista de marcas</h5>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Marca ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Apple</td>
                    <td>
                      <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editMarcaModal">Editar</button>
                      <button class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- CRUD de Tags -->
        <div class="col-sm-12 mt-4">
          <div class="card">
            <div class="card-header">
              <h5>Tag CRUD</h5>
            </div>
            <div class="card-body">
              <h5 class="card-title">Agregar nueva etiqueta</h5>
              <div class="mb-3">
                <label for="tag-name" class="form-label">Nombre de la etiqueta</label>
                <input type="text" class="form-control" id="tag-name" placeholder="Nombre">
              </div>
              <button class="btn btn-success">Guardar</button>

              <h5 class="mt-4">Lista de Etiquetas</h5>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Tag ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>New Arrival</td>
                    <td>
                      <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editTagModal">Editar</button>
                      <button class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal para Editar Categoría -->
      <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalLabel">Editar Categoría</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="edit-category-name" class="form-label">Nombre de la categoría</label>
                  <input type="text" class="form-control" id="edit-category-name" placeholder="Nombre de la categoría">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" >Guardar cambios</button>
              </div>
            </div>
          </div>
        </div>
       
        <!-- Modal para Editar Marca -->
        <div class="modal fade" id="editMarcaModal" tabindex="-1" aria-labelledby="editMarcaModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editMarcaModalLabel">Editar Marca</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="edit-marca-name" class="form-label">Nombre de la Marca</label>
                  <input type="text" class="form-control" id="edit-marca-name" placeholder="Marca">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" >Guardar cambios</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal para Editar Tag -->
        <div class="modal fade" id="editTagModal" tabindex="-1" aria-labelledby="editTagModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editTagModalLabel">Editar Etiqueta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="edit-tag-name" class="form-label">Nombre de la Etiqueta</label>
                  <input type="text" class="form-control" id="edit-tag-name" placeholder="Etiqueta">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" >Guardar cambios</button>
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
