<?php
include_once "../../app/config.php";
include_once("../../app/BrandController.php");
include_once("../../app/CategoryController.php");
include_once("../../app/ProductController.php");
include_once("../../app/CatalogController.php");
$brandController = new BrandController();
$categoryController = new CategoryController();
$catalogController = new CatalogController();
//
$brands = $brandController->get();
$categories = $categoryController->get();
$tags = $catalogController->getTags();
$productController = new ProductController();
$link = $_SERVER['REQUEST_URI'];
$link_array = explode('/', $link);
$slug = end($link_array);
$product = $productController->getProductBySlug($slug);
$productCategories = $product->categories;
$productTags = $product->tags;
// print_r();
// print_r($product->tags);
//
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
                <h2 class="mb-0">Edit product</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->

      <!-- [ Main Content ] start -->
      <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header">
              <h5>Product description</h5>
            </div>
            <form method="POST" action="../api-products" enctype="multipart/form-data">
              <div class="card-body">
                <input type="text" hidden name="action" value="update_product">
                <input type="text" hidden name="id" value=<?= $product->id ?>>
                <input type="text" name="global_token" value=<?= $_SESSION['global_token'] ?> hidden>
                <div class="mb-3">
                  <label class="form-label">Nombre del producto</label>
                  <input type="text" name="name" value="<?= $product->name ?>" class="form-control" placeholder="Nombre del producto" />
                </div>
                <div class="mb-3">
                  <label class="form-label">Slug</label>
                  <input type="text" name="slug" class="form-control" id="slug_input" value="<?= $product->slug ?>" placeholder="slug-del-producto" />
                </div>
                <div class="mb-3">
                  <label class="form-label">Brand</label>
                  <select class="form-select" name="brand_id" id="brand_selector">
                    <?php if (isset($brands) && sizeof($brands)): ?>
                      <?php foreach ($brands as $brand) : ?>
                        <option <?= $isSelected = ($product->brand->id == $brand->id) ? "selected" : "" ?> value="<?= $brand->id ?>"><?= $brand->name ?></option>
                      <?php endforeach ?>
                  </select>
                <?php endif; ?>
                </div>
                <div class="mb-3">
                  <label class="form-label">Categorias</label>
                  <div id="category_container mt-2">
                    <div id="category_selector container">
                      <?php if (isset($productCategories) && sizeof($productCategories)): ?>
                        <?php foreach ($productCategories as $productCategory) : ?>
                          <div class="mb-3">
                            <input type="text" class="form-control" id="slug_input" value="<?= $productCategory->name ?>" readonly />
                          </div>
                        <?php endforeach ?>
                    </div>
                  <?php endif; ?>
                  <div id="more-categories">
                  </div>
                  </div>
                  <button onclick='addCategory()' type="button" class="btn btn-secondary mt-4">Agregar categoria</button>
                </div>

                <div class="mb-3">
                  <label class="form-label">Etiquetas</label>
                  <div id="tag_container mt-2">
                    <div id="tag_selector container">
                      <?php if (isset($productTags) && sizeof($productTags)): ?>
                        <?php foreach ($productTags as $productTag) : ?>
                          <div class="mb-3">
                            <input type="text" class="form-control" id="slug_input" value="<?= $productTag->name ?>" readonly />
                          </div>
                        <?php endforeach ?>
                    </div>
                  <?php endif; ?>
                  <div id="more-tags">
                  </div>
                  </div>
                  <button onclick='addTag()' type="button" class="btn btn-secondary mt-4">Agregar etiqueta</button>
                </div>

                <div class="mb-0 mt-4">
                  <label class="form-label">Descripción del producto</label>
                  <textarea class="form-control" name="description" placeholder="descipcion"><?= $product->description ?>
                  </textarea>
                </div>
                <div class="mb-0">
                  <label class="form-label">Caracteristicas del productos</label>
                  <textarea class="form-control" name="features" placeholder="es un pink pony club"><?= $product->features ?>
                </textarea>
                </div>
              </div>

              <div class="card-body btn-page">
                <button type="submit" class="btn btn-primary mb-0">Guardar producto</button>
              </div>
          </div>

        </div>
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
    const categoryTemplate = `<div class="row" id="category_selector">
                        <div class="col d-flex">
                              <?php if (isset($categories) && sizeof($categories)): ?>
                                <select class="col form-select mt-2" name="categories[]">
                                    <?php foreach ($categories as $category) : ?>
                                      <option <?= $isSelected = ($productCategory->id == $category->id) ? "selected" : "" ?> value="<?= $category->id ?>"><?= $category->name ?></option>
                                    <?php endforeach ?>
                                </select>
                <?php endif; ?>
                        </div>
                        <div class="col mt-2">
                          <button onclick='deleteCombobox(event)' type="button" class="col btn btn-danger h-100 fw-bolder">X</butto>
                        </div>
                      </div>`
    const tagTemplate = `<div class="row" id="tag_selector">
                            <div class="col d-flex">
                              <?php if (isset($tags) && sizeof($tags)): ?>
                                <select class="col form-select mt-2" name="tags[]">
                                  <?php foreach ($tags as $tag) : ?>
                                    <option <?= $isSelected = ($productTag->id == $tag->id) ? "selected" : "" ?> value="<?= $tag->id ?>"><?= $tag->name ?></option>
                                  <?php endforeach ?>
                                </select>
                <?php endif; ?>
                            </div>
                            <div class="col mt-2">
                              <button onclick='deleteCombobox(event)' type="button" class="col btn btn-danger h-100 fw-bolder">X</button>
                            </div>
                          </div>`
    const slug = document.getElementById('slug_input');
    const tag = document.getElementById('tag_selector');
    const categoryContainer = document.getElementById('category_container');
    const appendingCategories = document.getElementById('more-categories');
    const appendingTags = document.getElementById('more-tags');
    const brand = document.getElementById('brand_selector');

    function addCategory() {
      const newCategoryRow = document.createElement('div');
      newCategoryRow.innerHTML = categoryTemplate;
      console.log(newCategoryRow);
      appendingCategories.appendChild(newCategoryRow);
    }

    function addTag() {
      const newCategoryRow = document.createElement('div');
      newCategoryRow.innerHTML = tagTemplate;
      console.log(newCategoryRow);
      appendingTags.appendChild(newCategoryRow);
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
