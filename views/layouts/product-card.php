<div class="col-sm-6 col-xl-4">
  <div class="card product-card">
    <div class="card-img-top">
      <a href="<?= BASE_PATH . 'products/' . $product->slug ?>">
        <img src=<?= $product->cover ?> style="max-height: 150px;" alt="not image found" class="img-prod img-fluid" />
      </a>
      <div class="card-body position-absolute end-0 top-0">
        <div class="form-check prod-likes">
          <input type="checkbox" class="form-check-input" />
          <i data-feather="heart" class="prod-likes-icon"></i>
        </div>
      </div>
    </div>
    <div class="card-body">
      <a href="<?= BASE_PATH . 'products/' . $product->slug ?>">
        <p class="prod-content mb-0 text-muted"><?= $product->name ?></p>
      </a>
      <div class="d-flex align-items-center justify-content-between mt-2 mb-3 flex-wrap gap-1">
        <h4 class="mb-0 text-truncate"><b>$<?= $product->presentations[0]->price[0]->amount ?></b></h4>
        <div class="d-inline-flex align-items-center">
          <i class="ph-duotone ph-star text-warning me-1"></i>
          4.5 <small class="text-muted">/ 5</small>
        </div>
      </div>
      <div class="d-flex">
        <div class="flex-shrink-0">
          <a
            href="<?= BASE_PATH . 'products/' . $product->slug ?>"
            class="avtar avtar-s btn-link-secondary btn-prod-card"
            data-bs-toggle="offcanvas"
            data-bs-target="#productOffcanvas<?= $product->id ?>">
            <i class="ph-duotone ph-eye f-18"></i>
          </a>
        </div>
        <div class="flex-grow-1 ms-3">
          <div class="d-grid">
            <button class="btn btn-danger" onclick="deleteProduct(this)" data-id=<?= $product->id ?> data-product=<?= json_encode($product) ?>>Delete</button>
            <a class="btn btn-warning" href="<?= BASE_PATH ?>products/edit/<?= $product->slug ?>">Edit</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal de Presentaciones -->
    <div class="modal fade" id="presentacionModal" tabindex="-1" aria-labelledby="presentacionModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="presentacionModalLabel">Gestión de Presentaciones y Órdenes</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Navegación por Tabs -->
            <ul class="nav nav-tabs" id="modalTabs" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="presentations-tab" data-bs-toggle="tab"
                  data-bs-target="#presentations" type="button" role="tab" aria-controls="presentations"
                  aria-selected="true">Lista</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="crud-tab" data-bs-toggle="tab" data-bs-target="#crud"
                  type="button" role="tab" aria-controls="crud" aria-selected="false">Presentaciones</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="orders-tab" data-bs-toggle="tab" data-bs-target="#orders"
                  type="button" role="tab" aria-controls="orders" aria-selected="false">Órdenes</button>
              </li>
            </ul>
            <div class="tab-content mt-3" id="modalTabsContent">
              <!-- Lista de Presentaciones -->
              <div class="tab-pane fade show active" id="presentations" role="tabpanel"
                aria-labelledby="presentations-tab">
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
              <!-- CRUD de Presentaciones -->
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
              <!-- Tabla de Órdenes -->
              <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                <h3>Tabla de Órdenes</h3>
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
                    </tr>
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
      </div>
    </div>
    <!-- Modal Agregar Presentación -->
    <div class="modal fade" id="addPresentationModal" tabindex="-1" aria-labelledby="addPresentationLabel"
      aria-hidden="true">
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
    <div class="modal fade" id="editPresentationModal" tabindex="-1" aria-labelledby="editPresentationLabel"
      aria-hidden="true">
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
          </div>
        </div>
      </div>
    </div>
    <!-- Fin del Modal -->
  </div>
<<<<<<< HEAD
  <div class="offcanvas offcanvas-end" tabindex="-1" id="productOffcanvas<?= $product->id ?>" aria-labelledby="productOffcanvas<?= $product->id ?>Label">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="productOffcanvas<?= $product->id ?>Label">Detalles de <?= $product->name ?></h5>
      <a href="#" class="avtar avtar-s btn-link-danger btn-pc-default" data-bs-dismiss="offcanvas">
        <i class="ti ti-x f-20"></i>
      </a>
    </div>
    <div class="offcanvas-body">
      <div class="card product-card shadow-none border-0">
        <div class="card-img-top p-0">
          <a href="<?= BASE_PATH . 'products/' . $product->slug ?>">
            <img src="<?= $product->cover ?>" alt="image" class="img-prod img-fluid" />
          </a>
          <div class="card-body position-absolute end-0 top-0">
            <div class="form-check prod-likes">
              <input type="checkbox" class="form-check-input" />
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-heart prod-likes-icon">
                <path
                  d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
              </svg>
            </div>
          </div>
        </div>
      </div>
      <h5><?= $product->name ?></h5>
      <p class="text-muted"><?= $product->description ?></p>
      <ul class="list-group list-group-flush">
        <li class="list-group-item px-0">
          <div class="d-inline-flex align-items-center justify-content-between w-100">
            <p class="mb-0 text-muted me-1">Precio</p>
            <h4 class="mb-0"><b>$<?= $product->presentations[0]->price[0]->amount ?></b></h4>
          </div>
        </li>
        <li class="list-group-item px-0">
          <div class="d-inline-flex align-items-center justify-content-between w-100">
            <p class="mb-0 text-muted me-1">Categorias</p>
                            <?php foreach ($product->categories as $category) : ?>
            <h6 class="mb-0"><?= $category->name ?></h6>
                            <?php endforeach ?>
          </div>
        </li>
        <li class="list-group-item px-0">
          <div class="d-inline-flex align-items-center justify-content-between w-100">
            <p class="mb-0 text-muted me-1">Marca</p>
            <h6 class="mb-0"><?=$product->brand->name?></h6>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
=======
</div>
>>>>>>> 103fbe6ef8e28f6b4fde59667f5d07f7a7459a72
