<?php
include_once "../../app/config.php";
include_once("../../app/BrandController.php");
include_once("../../app/CategoryController.php");
include_once("../../app/CatalogController.php");
$brandController = new BrandController();
$categoryController = new CategoryController();
$catalogController = new CatalogController();

$brands = $brandController->get();
$tags = $catalogController->getTags();
$categories = $categoryController->get();
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
                <h2 class="mb-0">Crea un nuevo producto</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->

      <!-- [ Main Content ] start -->
      <div class="row">
        <form method="POST" action="<?= BASE_PATH ?>api-products" enctype="multipart/form-data">
          <!-- [ sample-page ] start -->
          <div class="col-xl-6">
            <div class="card">
              <div class="card-header">
                <h5>Descripción del producto</h5>
              </div>
              <div class="card-body">
                <input type="text" hidden name="action" value="add_product">
                <input type="text" name="global_token" value=<?= $_SESSION['global_token'] ?> hidden>
                <div class="mb-3">
                  <label class="form-label">Nombre</label>
                  <input type="text" name="name" value="" class="form-control" placeholder="" />
                </div>
                <div class="mb-3">
                  <label class="form-label">Slug</label>
                  <input type="text" name="slug" class="form-control" id="slug_input" value="" placeholder="" />
                </div>
                <div class="mb-3">
                  <label class="form-label">Marca</label>
                  <select class="form-select" name="brand_id" id="brand_selector">
                    <?php if (isset($brands) && sizeof($brands)): ?>
                      <?php foreach ($brands as $brand) : ?>
                        <option value="<?= $brand->id ?>"><?= $brand->name ?></option>
                      <?php endforeach ?>
                  </select>
                <?php endif; ?>
                </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">Categorias</label>
                  <div id="category_container mt-2">
                    <div id="category_selector container" >
                      <div class="row" id="category_selector">
                        <div class="col d-flex">
                          <select class="col form-select mt-2" name="categories[]" >
                            <?php if (isset($categories) && sizeof($categories)): ?>
                              <?php foreach ($categories as $category) : ?>
                                <option value="<?= $category->id ?>"><?= $category->name ?></option>
                              <?php endforeach ?>
                          </select>
                        </div>
                        <div class="col mt-2">
                          <button onclick='deleteCombobox(event)' type="button" class="col btn btn-danger h-100 fw-bolder">X</button>
                        </div>
                      </div>
                    </div>
                    <div id="more-categories">
                    </div>
                    <button onclick='addCategory()' type="button" class="btn btn-secondary mt-4">Agregar categoria</button>
                  </div>
                <?php endif; ?>
                </div>
                <div class="mb-3">
                  <label class="form-label">Etiquetas</label>
                  <div id="tag_container mt-2">
                    <div id="tag_selector container" >
                      <div class="row" id="tag_selector">
                        <div class="col d-flex">
                          <select class="col form-select mt-2" name="tags[]" >
                            <?php if (isset($tags) && sizeof($tags)): ?>
                              <?php foreach ($tags as $tag) : ?>
                                <option value="<?= $tag->id ?>"><?= $tag->name ?></option>
                              <?php endforeach ?>
                          </select>
                        </div>
                        <div class="col mt-2">
                          <button onclick='deleteCombobox(event)' type="button" class="col btn btn-danger h-100 fw-bolder">X</button>
                        </div>
                      </div>
                    </div>
                    <div id="more-tags">
                    </div>
                    <button onclick='addTag()' type="button" class="btn btn-secondary mt-4">Agregar etiqueta</button>
                  </div>
                <?php endif; ?>
                </div>
                <div class="mb-0 mt-4">
                  <label class="form-label">Descripción del producto</label>
                  <textarea class="form-control" name="description" placeholder=""></textarea>
                </div>
                <div class="mb-0 mt-4">
                  <label class="form-label">Caracteristicas del producto</label>
                  <textarea class="form-control" name="features" placeholder=""></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6">
            <div class="card">
              <div class="card-header">
                <h5>Imagen del producto</h5>
              </div>
              <div class="card-body">
                <div class="mb-0">
                  <label class="btn btn-outline-secondary" for="flupld"><i class="ti ti-upload me-2"></i> Click to Upload</label>
                  <input type="file" name="cover" id="flupld" class="d-none" />
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body  btn-page flex d-flex">
          <a href="<?=BASE_PATH?>products" type="submit" class="btn btn-secondary mb-0">Cancelar</a>
                <button type="submit" class="btn btn-primary mb-0 ms-auto">Crear producto</button>
              </div>
            </div>
          </div>
          <!-- [ sample-page ] end -->

        </form>

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

  <script>
    const slug = document.getElementById('slug_input');
    const category = document.getElementById('category_selector');
    const tag = document.getElementById('tag_selector');
    const categoryContainer = document.getElementById('category_container');
    const appendingCategories = document.getElementById('more-categories');
    const appendingTags = document.getElementById('more-tags');
    const brand = document.getElementById('brand_selector');

    function addCategory() {
      const clone = category.cloneNode(true);
      console.log(category);
      appendingCategories.appendChild(clone);
    }

    function addTag() {
      const clone = tag.cloneNode(true);
      appendingTags.appendChild(clone);

    }

    function deleteCombobox(e) {
      e.target.parentElement.parentElement.remove();
    }

  </script>

  <?php

  include "../layouts/modals.php";

  ?>

</body>
<!-- [Body] end -->

</html>
