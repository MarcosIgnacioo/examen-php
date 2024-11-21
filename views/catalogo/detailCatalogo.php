<?php
include_once "../../app/config.php";
include_once "../../app/CatalogController.php";
$catalogController = new CatalogController();
$brands = $catalogController->getAllBrands();
$categories = $catalogController->getAllCategories();
$tags = $catalogController->getTags();
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
                  <h3>Categorías</h3>
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
                      <?php foreach ($categories as $category) : ?>
                        <tr>
                          <td><?= $category->id ?></td>
                          <td><?= $category->name ?></td>
                          <td><?= $category->description ?></td>
                          <td>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editCategoryModal<?= $category->id ?>">Editar</button>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal<?= $category->id ?>">Eliminar</button>
                            <div class="modal fade modal-animate" id="deleteCategoryModal<?= $category->id ?>" tabindex="-1" aria-labelledby="deleteTagLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="deleteCategoryLabel">Confirmar Eliminación</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <form method="POST" action="<?= BASE_PATH ?>api-catalog">
                                    <input type="text" hidden name="action" value="delete_category">
                                    <input type="text" name="global_token" value=<?= $_SESSION['global_token'] ?> hidden>
                                    <input name="category_id" hidden type="text" class="form-control" value="<?= $category->id ?>">
                                    <div class="modal-body">
                                      ¿Estás seguro de que deseas eliminar esta categoria?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                      <button type="submit" href="#" id="confirmDeleteBtn" class="btn btn-danger">Eliminar</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>

                            <!--COMIENZO EDITAR CATEGORIA-->
                            <div class="modal fade" id="editCategoryModal<?= $category->id ?>" tabindex="-1" aria-labelledby="editCategoryModal<?= $category->id ?>Label" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="editCategoryModal<?= $category->id ?>Label">Editar Categoría</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <form method="POST" action="<?= BASE_PATH ?>api-catalog">
                                      <input type="text" hidden name="action" value="update_category">
                                      <input type="text" name="global_token" value=<?= $_SESSION['global_token'] ?> hidden>
                                      <input type="text" name="id" value="<?= $category->id ?>" hidden>
                                      <input type="text" name="category_id" value="<?= $category->category_id ?>" hidden>

                                      <div class="mb-3">
                                        <label for="addTagName" class="form-label">Nombre</label>
                                        <input type="text" name="name" class="form-control" id="addTagName" required value="<?= $category->name ?>">
                                      </div>
                                      <div class="mb-3">
                                        <label for="addTagDescription" class="form-label">Descripción</label>
                                        <textarea class="form-control" id="addTagDescription" rows="3" name="description" required><?= $category->description ?></textarea>
                                      </div>
                                      <div class="mb-3">
                                        <label for="addTagSlug" class="form-label">Slug</label>
                                        <input type="text" name="slug" class="form-control" required value="<?= $category->slug ?>">
                                      </div>
                                      <button type="submit" class="btn btn-primary">Actualizar</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--FIN EDITAR CATEGORIA-->
                          </td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>

                <div class="tab-pane fade" id="brands" role="tabpanel" aria-labelledby="brands-tab">
                  <h3>Marcas</h3>
                  <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addBrandModal">Agregar Marca</button>
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
                      <?php foreach ($brands as $brand) : ?>
                        <tr>
                          <td><?= $brand->id ?></td>
                          <td><?= $brand->name ?></td>
                          <td><?= $brand->description ?></td>
                          <td>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editBrandModal<?= $brand->id ?>">Editar</button>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteBrandModal<?= $brand->id ?>">Eliminar</button>
                            <div class="modal fade modal-animate" id="deleteBrandModal<?= $brand->id ?>" tabindex="-1" aria-labelledby="deleteTagLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="deleteBrandLabel">Confirmar Eliminación</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <form method="POST" action="<?= BASE_PATH ?>api-catalog">
                                    <input type="text" hidden name="action" value="delete_brand">
                                    <input type="text" name="global_token" value=<?= $_SESSION['global_token'] ?> hidden>
                                    <input name="brand_id" hidden type="text" class="form-control" value="<?= $brand->id ?>">
                                    <div class="modal-body">
                                      ¿Estás seguro de que deseas eliminar esta marca?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                      <button type="submit" href="#" id="confirmDeleteBtn" class="btn btn-danger">Eliminar</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>

                            <div class="modal fade" id="editBrandModal<?= $brand->id ?>" tabindex="-1" aria-labelledby="editBrandModal<?= $brand->id ?>Label" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="editBrandModal<?= $brand->id ?>Label">Editar Marca</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <form method="POST" action="<?= BASE_PATH ?>api-catalog">
                                      <input type="text" hidden name="action" value="update_brand">
                                      <input type="text" name="global_token" value=<?= $_SESSION['global_token'] ?> hidden>
                                      <input type="text" name="id" value="<?= $brand->id ?>" hidden>
                                      <div class="mb-3">
                                        <label for="addTagName" class="form-label">Nombre</label>
                                        <input type="text" name="name" class="form-control" id="addTagName" required value="<?= $brand->name ?>">
                                      </div>
                                      <div class="mb-3">
                                        <label for="addTagDescription" class="form-label">Descripción</label>
                                        <textarea class="form-control" id="addTagDescription" rows="3" name="description" required><?= $brand->description ?></textarea>
                                      </div>
                                      <div class="mb-3">
                                        <label for="addTagSlug" class="form-label">Slug</label>
                                        <input type="text" name="slug" class="form-control" required value="<?= $brand->slug ?>">
                                      </div>
                                      <button type="submit" class="btn btn-primary">Actualizar</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>

                          </td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>

                  </table>
                </div>

                <div class="tab-pane fade" id="tags" role="tabpanel" aria-labelledby="tags-tab">
                  <h3>Tags</h3>
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
                      <?php foreach ($tags as $tag) : ?>
                        <tr>
                          <td><?= $tag->id ?></td>
                          <td><?= $tag->name ?></td>
                          <td><?= $tag->description ?></td>
                          <td>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editTagModal<?= $tag->id ?>">Editar</button>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteTagModal<?= $tag->id ?>">Eliminar</button>

                            <div class="modal fade modal-animate" id="deleteTagModal<?= $tag->id ?>" tabindex="-1" aria-labelledby="deleteTagLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="deleteTagLabel">Confirmar Eliminación</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <form method="POST" action="<?= BASE_PATH ?>api-catalog">
                                    <input type="text" hidden name="action" value="delete_tag">
                                    <input type="text" name="global_token" value=<?= $_SESSION['global_token'] ?> hidden>
                                    <input name="tag_id" hidden type="text" class="form-control" value="<?= $tag->id ?>">
                                    <div class="modal-body">
                                      ¿Estás seguro de que deseas eliminar esta etiqueta?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                      <button type="submit" href="#" id="confirmDeleteBtn" class="btn btn-danger">Eliminar</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>

                            <div class="modal fade" id="editTagModal<?= $tag->id ?>" tabindex="-1" aria-labelledby="editTagModal<?= $tag->id ?>Label" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="editTagModal<?= $tag->id ?>Label">Editar Etiqueta</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <form method="POST" action="<?= BASE_PATH ?>api-catalog">
                                      <input type="text" hidden name="action" value="update_tag">
                                      <input type="text" name="global_token" value=<?= $_SESSION['global_token'] ?> hidden>
                                      <input type="text" name="id" value="<?= $tag->id ?>" hidden>
                                      <div class="mb-3">
                                        <label for="addTagName" class="form-label">Nombre</label>
                                        <input type="text" name="name" class="form-control" id="addTagName" required value="<?= $tag->name ?>">
                                      </div>
                                      <div class="mb-3">
                                        <label for="addTagDescription" class="form-label">Descripción</label>
                                        <textarea class="form-control" id="addTagDescription" rows="3" name="description" required><?= $tag->description ?></textarea>
                                      </div>
                                      <div class="mb-3">
                                        <label for="addTagSlug" class="form-label">Slug</label>
                                        <input type="text" name="slug" class="form-control" required value="<?= $tag->slug ?>">
                                      </div>
                                      <button type="submit" class="btn btn-primary">Actualizar</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach ?>
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
                    <form method="POST" action="<?= BASE_PATH ?>api-catalog">
                      <input type="text" hidden name="action" value="add_category">
                      <input type="text" name="global_token" value=<?= $_SESSION['global_token'] ?> hidden>
                      <div class="mb-3">
                        <label for="addTagName" class="form-label">Nombre</label>
                        <input type="text" name="name" class="form-control" id="addTagName" required>
                      </div>
                      <div class="mb-3">
                        <label for="addTagDescription" class="form-label">Descripción</label>
                        <textarea class="form-control" id="addTagDescription" rows="3" name="description" required></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="addTagSlug" class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control" required>
                      </div>
                      <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal Editar Categoría -->


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
                    <form method="POST" action="<?= BASE_PATH ?>api-catalog">
                      <input type="text" hidden name="action" value="add_brand">
                      <input type="text" name="global_token" value=<?= $_SESSION['global_token'] ?> hidden>
                      <div class="mb-3">
                        <label for="addTagName" class="form-label">Nombre</label>
                        <input type="text" name="name" class="form-control" id="addTagName" required>
                      </div>
                      <div class="mb-3">
                        <label for="addTagDescription" class="form-label">Descripción</label>
                        <textarea class="form-control" id="addTagDescription" rows="3" name="description" required></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="addTagSlug" class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control" required>
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
                    <form method="POST" action="<?= BASE_PATH ?>api-catalog">
                      <input type="text" hidden name="action" value="add_tag">
                      <input type="text" name="global_token" value=<?= $_SESSION['global_token'] ?> hidden>
                      <div class="mb-3">
                        <label for="addTagName" class="form-label">Nombre</label>
                        <input type="text" name="name" class="form-control" id="addTagName" required>
                      </div>
                      <div class="mb-3">
                        <label for="addTagDescription" class="form-label">Descripción</label>
                        <textarea class="form-control" id="addTagDescription" rows="3" name="description" required></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="addTagSlug" class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control" required>
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
