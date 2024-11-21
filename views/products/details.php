<?php
include_once "../../app/config.php";
include_once("../../app/ProductController.php");
$productController = new ProductController();
$link = $_SERVER['REQUEST_URI'];
$link_array = explode('/', $link);
$slug = end($link_array);
$product = $productController->getProductBySlug($slug);
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
                <h2 class="mb-0"><?= $product->name ?></h2>
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
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="sticky-md-top product-sticky">
                    <div id="carouselExampleCaptions" class="carousel slide ecomm-prod-slider" data-bs-ride="carousel">
                      <div class="carousel-inner bg-light rounded position-relative">
                        <div class="carousel-item active">
                          <img src=<?= $product->cover ?> class="d-block w-100" alt="Product images" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <span class="badge bg-success f-14">In stock</span>
                  <h5 class="my-3"><?= $product->name ?></h5>
                  <div class="star f-18 mb-3">
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star-half-alt text-warning"></i>
                    <i class="far fa-star text-muted"></i>
                    <span class="text-sm text-muted">(4.0)</span>
                  </div>
                  <h5 class="mt-4 mb-sm-3 mb-2 f-w-500">About this item</h5>
                  <ul>
                    <li class="mb-2">
                      <?= $product->features ?>
                    </li>

                  </ul>

                  <h3 class="mb-4">$<?= $product->presentations[0]->price[0]->amount ?></h3>
                  <div class="row">
                    <div class="col-6">
                      <div class="d-grid">
                        <button type="button" class="btn btn-primary">Buy Now</button>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="d-grid">
                        <button type="button" class="btn btn-outline-secondary">Add to cart</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header pb-0">
              <ul class="nav nav-tabs profile-tabs mb-0" id="myTab" role="tablist">
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    id="ecomtab-tab-1"
                    data-bs-toggle="tab"
                    href="#ecomtab-1"
                    role="tab"
                    aria-controls="ecomtab-1"
                    aria-selected="true">Features
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    id="ecomtab-tab-2"
                    data-bs-toggle="tab"
                    href="#ecomtab-2"
                    role="tab"
                    aria-controls="ecomtab-2"
                    aria-selected="true">Specifications
                  </a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane show active" id="ecomtab-1" role="tabpanel" aria-labelledby="ecomtab-tab-1">
                  <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                      <tbody>
                        <tr>
                          <?= $product->description ?>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="tab-pane" id="ecomtab-2" role="tabpanel" aria-labelledby="ecomtab-tab-2">
                  <div class="row gy-3">
                    <div class="col-md-6">
                      <h5>Product Category</h5>
                      <hr class="mb-3 mt-1" />
                      <div class="table-responsive">
                        <table class="table mb-0">
                          <tbody>
                            <?php foreach ($product->categories as $category) : ?>
                              <td class="py-1"><?= $category->name ?></td>
                            <?php endforeach ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-md-6">
                      <h5>Product Tags</h5>
                      <hr class="mb-3 mt-1" />
                      <div class="table-responsive">
                        <table class="table mb-0">
                          <tbody>
                            <?php foreach ($product->tags as $tag) : ?>
                              <td class="py-1"><?= $tag->name ?></td>
                            <?php endforeach ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            
            
            <div class="container mt-4">
              <a href="<?= BASE_PATH ?>views\products\lisDPresentacion.php" class="btn btn-sm float-end">Ver Lista </a>
              <h2>Gestión de Presentaciones y Órdenes</h2>
              <ul class="nav nav-tabs" id="tabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="presentations-tab" data-bs-toggle="tab" data-bs-target="#presentations" type="button" role="tab" aria-controls="presentations" aria-selected="true">Lista</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="crud-tab" data-bs-toggle="tab" data-bs-target="#crud" type="button" role="tab" aria-controls="crud" aria-selected="false">Presentaciones</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="orders-tab" data-bs-toggle="tab" data-bs-target="#orders" type="button" role="tab" aria-controls="orders" aria-selected="false">Órdenes</button>
                </li>
              </ul>
              <div class="tab-content mt-3" id="tabsContent">
                <div class="tab-pane fade show active" id="presentations" role="tabpanel" aria-labelledby="presentations-tab">
                  <h3>Lista de Presentaciones</h3>
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <thead class="table-dark">
                        <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Stock</th>
                          <th>Precio</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Presentación 1</td>
                          <td>50</td>
                          <td>$10.00</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Presentación 2</td>
                          <td>100</td>
                          <td>$8.50</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="tab-pane fade" id="crud" role="tabpanel" aria-labelledby="crud-tab">
                  <h3>Presentaciones</h3>
                  <button class="btn btn-primary mb-3" data-bs-toggle="modal"
                    data-bs-target="#addPresentationModal">Agregar Presentación</button>
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
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                              data-bs-target="#editPresentationModal">Editar</button>
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                  <h3>Tabla de Órdenes</h3>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID Orden</th>
                          <th>Cliente</th>
                          <th>Fecha</th>
                          <th>Total</th>
                          <th>Estado</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>101</td>
                          <td>El pansho</td>
                          <td>2024-11-20</td>
                          <td>$150.00</td>
                          <td>Completada</td>
                          <td> <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#orderDetailsModal">Ver Detalles</button></td>
                        <tr>
                          <td>102</td>
                          <td>Yooo</td>
                          <td>2024-11-19</td>
                          <td>$250.00</td>
                          <td>Pendiente</td>
                          <td> <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#orderDetailsModal">Ver Detalles</button></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal Agregar Presentación -->
            <div class="modal fade" id="addPresentationModal" tabindex="-1" aria-labelledby="addPresentationLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="addPresentationLabel">Agregar Presentación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-toggle="modal"
                      data-bs-target="#presentacionModal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="mb-3">
                        <label for="presentationName" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="presentationName" required>
                      </div>
                      <div class="mb-3">
                        <label for="presentationStock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="presentationStock" required>
                      </div>
                      <div class="mb-3">
                        <label for="presentationPrice" class="form-label">Precio</label>
                        <input type="number" class="form-control" id="presentationPrice" step="0.01" required>
                      </div>
                      <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#presentacionModal">Guardar</button>
                    </form>
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-toggle="modal"
                      data-bs-target="#presentacionModal" aria-label="Close"></button>
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
                      <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#presentacionModal">Actualizar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal de Detalles de Orden -->
            <div class="modal fade" id="orderDetailsModal" tabindex="-1" aria-labelledby="orderDetailsModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="orderDetailsModalLabel">Detalles de la Orden</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-toggle="modal"
                      data-bs-target="#presentacionModal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <h6>ID de la Orden:</h6>
                    <p>101</p>
                    <h6>Cliente:</h6>
                    <p>EL marcosss</p>
                    <h6>Fecha:</h6>
                    <p>2024-11-20</p>
                    <h6>Total:</h6>
                    <p>$150.00</p>
                    <h6>Estado:</h6>
                    <p>Completada</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-toggle="modal"
                      data-bs-target="#presentacionModal">Cerrar</button>
                    <div class="card-body"> </div>
                  </div>
                </div>
                <!-- [ sample-page ] end -->
              </div>
              <!-- [ Main Content ] end -->
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


  <!-- [Page Specific JS] start -->
  <script>
    // scroll-block
    var tc = document.querySelectorAll('.scroll-block');
    for (var t = 0; t < tc.length; t++) {
      new SimpleBar(tc[t]);
    }
    // quantity start
    function increaseValue(temp) {
      var value = parseInt(document.getElementById(temp).value, 10);
      value = isNaN(value) ? 0 : value;
      value++;
      document.getElementById(temp).value = value;
    }

    function decreaseValue(temp) {
      var value = parseInt(document.getElementById(temp).value, 10);
      value = isNaN(value) ? 0 : value;
      value < 1 ? (value = 1) : '';
      value--;
      document.getElementById(temp).value = value;
    }
    // quantity end
  </script>

  <?php

  include "../layouts/modals.php";

  ?>

</body>
<!-- [Body] end -->

</html>