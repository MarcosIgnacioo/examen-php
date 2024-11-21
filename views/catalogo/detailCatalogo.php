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
            <div class="container mt-4">
              <h2>Gestión </h2>

              <!-- Nav Tabs -->
              <ul class="nav nav-tabs" id="catalogTabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="categories-tab" data-bs-toggle="tab" data-bs-target="#categories" type="button" role="tab" aria-controls="categories" aria-selected="true">Categorías</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="brands-tab" data-bs-toggle="tab" data-bs-target="#brands" type="button" role="tab" aria-controls="brands" aria-selected="false">Marcas</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="tags-tab" data-bs-toggle="tab" data-bs-target="#tags" type="button" role="tab" aria-controls="tags" aria-selected="false">Tags</button>
                </li>
              </ul>

             
              <div class="tab-content mt-3" id="catalogTabsContent">
                
                <div class="tab-pane fade show active" id="categories" role="tabpanel" aria-labelledby="categories-tab">
                  <h3>CRUD de Categorías</h3>
                  <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Agregar Categoría</button>
                  <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                      <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Electrónica</td>
                        <td>Productos electrónicos</td>
                        <td>
                          <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editCategoryModal">Editar</button>
                          <button class="btn btn-danger btn-sm">Eliminar</button>
                          <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailsModal" >Detalles</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <div class="tab-pane fade" id="brands" role="tabpanel" aria-labelledby="brands-tab">
                  <h3>CRUD de Marcas</h3>
                  <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addBrandModal">Agregar Marca</button>
                  <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                      <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>País de Origen</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Samsung</td>
                        <td>Corea del Sur</td>
                        <td>
                          <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editBrandModal" >Editar</button>
                          <button class="btn btn-danger btn-sm">Eliminar</button>
                          <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailsBrandModal" >Detalles</button>
                        </td>
                      </tr>
                    </tbody>

                  </table>
                </div>

                <div class="tab-pane fade" id="tags" role="tabpanel" aria-labelledby="tags-tab">
                  <h3>CRUD de Tags</h3>
                  <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addTagModal">Agregar Tag</button>
                  <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                      <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Ofertas</td>
                        <td>Productos con descuento</td>
                        <td>
                          <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editTagModal" onclick="fillEditTag('1', 'Ofertas', 'Productos con descuento')">Editar</button>
                          <button class="btn btn-danger btn-sm">Eliminar</button>
                          <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailsTagModal" onclick="showTagDetails('1', 'Ofertas', 'Productos con descuento')">Detalles</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- Modales Generales -->
            <!-- Modal Agregar Categoría -->
            <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Agregar Categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="mb-3">
                        <label for="categoryName" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="categoryName" required>
                      </div>
                      <div class="mb-3">
                        <label for="categoryDescription" class="form-label">Descripción</label>
                        <textarea class="form-control" id="categoryDescription" rows="3" required></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal Editar Categoría -->
            <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryModalLabel">Editar Categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="mb-3">
                        <label for="editCategoryName" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="editCategoryName" required>
                      </div>
                      <div class="mb-3">
                        <label for="editCategoryDescription" class="form-label">Descripción</label>
                        <textarea class="form-control" id="editCategoryDescription" rows="3" required></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal Detalles -->
            <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="detailsModalLabel">Detalles del Elemento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p><strong>ID:</strong> <span id="detailsId"></span></p>
                    <p><strong>Nombre:</strong> <span id="detailsName"></span></p>
                    <p><strong>Descripción:</strong> <span id="detailsDescription"></span></p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal Editar Marca -->
            <div class="modal fade" id="editBrandModal" tabindex="-1" aria-labelledby="editBrandModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editBrandModalLabel">Editar Marca</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="mb-3">
                        <label for="editBrandName" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="editBrandName" required>
                      </div>
                      <div class="mb-3">
                        <label for="editBrandOrigin" class="form-label">País de Origen</label>
                        <input type="text" class="form-control" id="editBrandOrigin" required>
                      </div>
                      <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal Detalles Marca -->
            <div class="modal fade" id="detailsBrandModal" tabindex="-1" aria-labelledby="detailsBrandModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="detailsBrandModalLabel">Detalles de la Marca</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p><strong>ID:</strong> <span id="detailsBrandId"></span></p>
                    <p><strong>Nombre:</strong> <span id="detailsBrandName"></span></p>
                    <p><strong>País de Origen:</strong> <span id="detailsBrandOrigin"></span></p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal Editar Tag -->
            <div class="modal fade" id="editTagModal" tabindex="-1" aria-labelledby="editTagModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editTagModalLabel">Editar Tag</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="mb-3">
                        <label for="editTagName" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="editTagName" required>
                      </div>
                      <div class="mb-3">
                        <label for="editTagDescription" class="form-label">Descripción</label>
                        <textarea class="form-control" id="editTagDescription" rows="3" required></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal Detalles Tag -->
            <div class="modal fade" id="detailsTagModal" tabindex="-1" aria-labelledby="detailsTagModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="detailsTagModalLabel">Detalles del Tag</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p><strong>ID:</strong> <span id="detailsTagId"></span></p>
                    <p><strong>Nombre:</strong> <span id="detailsTagName"></span></p>
                    <p><strong>Descripción:</strong> <span id="detailsTagDescription"></span></p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>
<!-- Modal Agregar Marca -->
<div class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="addBrandModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addBrandModalLabel">Agregar Marca</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addBrandForm">
          <div class="mb-3">
            <label for="addBrandName" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="addBrandName" required>
          </div>
          <div class="mb-3">
            <label for="addBrandOrigin" class="form-label">País de Origen</label>
            <input type="text" class="form-control" id="addBrandOrigin" required>
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal Agregar Tag -->
<div class="modal fade" id="addTagModal" tabindex="-1" aria-labelledby="addTagModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addTagModalLabel">Agregar Tag</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addTagForm">
          <div class="mb-3">
            <label for="addTagName" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="addTagName" required>
          </div>
          <div class="mb-3">
            <label for="addTagDescription" class="form-label">Descripción</label>
            <textarea class="form-control" id="addTagDescription" rows="3" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
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

</html>