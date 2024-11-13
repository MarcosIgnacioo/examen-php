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
                <h2 class="mb-0">Catalog Management</h2>
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
              <h5>Category CRUD</h5>
            </div>
            <div class="card-body">
              <h5 class="card-title">Add New Category</h5>
              <div class="mb-3">
                <label for="category-name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="category-name" placeholder="Category Name">
              </div>
              <button class="btn btn-success">Save Category</button>

              <h5 class="mt-4">List of Categories</h5>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Category ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Electronics</td>
                    <td>
                      <button class="btn btn-warning btn-sm">Edit</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
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
              <h5>Brand CRUD</h5>
            </div>
            <div class="card-body">
              <h5 class="card-title">Add New Brand</h5>
              <div class="mb-3">
                <label for="brand-name" class="form-label">Brand Name</label>
                <input type="text" class="form-control" id="brand-name" placeholder="Brand Name">
              </div>
              <button class="btn btn-success">Save Brand</button>

              <h5 class="mt-4">List of Brands</h5>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Brand ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Apple</td>
                    <td>
                      <button class="btn btn-warning btn-sm">Edit</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
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
              <h5 class="card-title">Add New Tag</h5>
              <div class="mb-3">
                <label for="tag-name" class="form-label">Tag Name</label>
                <input type="text" class="form-control" id="tag-name" placeholder="Tag Name">
              </div>
              <button class="btn btn-success">Save Tag</button>

              <h5 class="mt-4">List of Tags</h5>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Tag ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>New Arrival</td>
                    <td>
                      <button class="btn btn-warning btn-sm">Edit</button>
                      <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- [ Main Content ] end -->
    </div>
  </div>
  <!-- [ Main Content ] end -->

  <?php include "../layouts/footer.php"; ?>
  <?php include "../layouts/scripts.php"; ?>
  <?php include "../layouts/modals.php"; ?>

</body>
<!-- [Body] end -->
</html>
