<?php
include_once "../../app/config.php";

include_once("../../app/clientController.php");
$clientFields = [
  "name" => "Nombres",
  "email" => "Correo",
  "password" => "Contraseña",
  "phone_number" => "Número telefónico",
  "is_suscribed" => "¿Esta suscrito?",
  "level_id" => "Nivel",
]

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
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Other</a></li>
                <li class="breadcrumb-item" aria-current="page">Sample Page</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Agregar</h2>
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
            <div class="card-header">
              <h5>Registrar Cliente</h5>

            </div>
            <div class="card-body">
              <form action="../api-client" method="POST">
                <input type="text" hidden name="action" value="create_client">
                <input type="text" name="global_token" value=<?= $_SESSION['global_token'] ?> hidden>
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="name" value="">
                </div>
                <div class="form-group">
                  <label for="email">Correo Electrónico</label>
                  <input type="email" class="form-control" id="email" name="email" value="">
                </div>
                <div class="form-group">
                  <label for="password">Contraseña</label>
                  <input type="password" class="form-control" id="password" name="password" value="">
                </div>
                <div class="form-group">
                  <label for="phone_number">Número de teléfono</label>
                  <input type="text" class="form-control" id="phone_number" name="phone_number" value="">
                </div>
                <div class="form-group">
                  <label for="phone_number">¿Esta suscritó?</label>
                  <select class="form-control" id="is_suscribed" name="is_suscribed">
                    <option value="1">Si</option>
                    <option value="2">No</option>
                  </select>
                </div>
                <span>LEVELS CRUD FALTA</span>
                <!---
<div class="form-group">
                  <label for="is_suscribed">Nivel</label>
                  <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
-->
                <div class="mt-2 form-group">
                  <a href='/customer' class="btn btn-danger">Cancelar</a>
                  <button type="submit" href='lisDCustomer.php' class="btn btn-primary">Registrar</button>
                </div>
              </form>
            </div>


          </div>
        </div>
        <!-- [ sample-page ] end -->
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

  <?php

  include "../layouts/modals.php";

  ?>

</body>
<!-- [Body] end -->

</html>
