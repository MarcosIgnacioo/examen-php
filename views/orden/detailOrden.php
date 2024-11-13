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
                <li class="breadcrumb-item"><a href="javascript: void(0)">Orders</a></li>
                <li class="breadcrumb-item" aria-current="page">Order Management</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Order Management</h2>
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
              <h5 class="card-title">Add New Order</h5>
              <div class="mb-3">
                <label for="order-id" class="form-label">Order ID</label>
                <input type="text" class="form-control" id="order-id" placeholder="Order ID">
              </div>
              <div class="mb-3">
                <label for="client-name" class="form-label">Client Name</label>
                <input type="text" class="form-control" id="client-name" placeholder="Client Name">
              </div>
              <button class="btn btn-success">Save Order</button>

              <h5 class="mt-4">Order List</h5>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Client</th>
                    <th>Total</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>#1001</td>
                    <td>2024-11-10</td>
                    <td>Juan Pérez</td>
                    <td>$150.00</td>
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
        
        <div class="col-sm-12 mt-4">
          <div class="card">
            <div class="card-header">
              <h5>Order Details</h5>
            </div>
            <div class="card-body">
              <h5 class="card-title">Order Information</h5>
              <p><strong>Order ID:</strong> #1001</p>
              <p><strong>Date:</strong> 2024-11-10</p>
              <p><strong>Total:</strong> $150.00</p>

              <h5 class="mt-4">Purchased Products</h5>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Product A</td>
                    <td>2</td>
                    <td>$30.00</td>
                    <td>$60.00</td>
                  </tr>
                </tbody>
              </table>

              <h5 class="mt-4">Client Information</h5>
              <p><strong>Name:</strong> Juan Pérez</p>
              <p><strong>Email:</strong> juan.perez@example.com</p>

              <h5 class="mt-4">Shipping Address</h5>
              <p>123 Fake Street, Example City</p>

              <h5 class="mt-4">Coupon Applied</h5>
              <p><strong>Coupon Code:</strong> CUPON50</p>
              <p><strong>Discount Applied:</strong> $50.00</p>
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
