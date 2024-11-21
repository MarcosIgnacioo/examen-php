<?php
include_once "../../app/config.php";

include_once("../../app/ProductController.php");
include_once("../../app/BrandController.php");

$productController = new ProductController();
$brandController = new BrandController();

$products = $productController->get();
$brands = $brandController->get();
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
                <h2 class="mb-0">Products</h2>
                <a class="btn btn-primary" href="<?=BASE_PATH?>products/create">Agregar producto</a>
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
          <div class="ecom-wrapper">
            <div class="ecom-content">
              <div class="row">
                <?php foreach ($products as $product) : ?>
                  <?php
                  include "../layouts/product-card.php";
                  ?>
                <?php endforeach ?>
              </div>
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
  </script>


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="sweetalert2.all.min.js"></script>
  <script>
    function deleteProduct(obj) {
      const id = obj.dataset.id;
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success",
          cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
      });
      swalWithBootstrapButtons.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {

          const myHeaders = new Headers();
          myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

          const body = new URLSearchParams({
            action: 'delete_product',
            id: id,
          });

          const requestOptions = {
            method: "POST",
            headers: myHeaders,
            body: body.toString(),
            redirect: "follow"
          };
          fetch(`http://localhost/products_php/api-products`, requestOptions)
            .then(response => response.text())
            .then(res => console.log(res))
            .catch(error => console.log('error', error));

          swalWithBootstrapButtons.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success"
          });
          location.reload();
        } else if (
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire({
            title: "Cancelled",
            text: "Your imaginary file is safe :)",
            icon: "error"
          });
        }
      });
    }
  </script>

  <?php

  include "../layouts/modals.php";

  ?>

</body>
<!-- [Body] end -->

</html>
