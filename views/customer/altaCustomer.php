<?php
include_once "../../app/config.php";

include_once("../../app/clientController.php");
include_once("../../app/LevelController.php");
$levelController = new LevelController();

$levels = $levelController->getAllLevels();

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
              <div class="page-header-title">
                <h2 class="mb-0">Agregar</h2>
            <a href='<?=BASE_PATH?>customer' class='btn-primary col-sm-auto'>Regresar</a>
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
              <form action="<?= BASE_PATH ?>api-client" method="POST">
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
                  <input type="text" class="form-control phone_number" id="phone_number" name="phone_number" value="">
                </div>
                <div class="form-group">
                  <label for="phone_number">¿Esta suscritó?</label>
                  <select class="form-control" id="is_suscribed" name="is_suscribed">
                    <option value="1">Si</option>
                    <option value="2">No</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="level">Nivel</label>
                  <select class="form-control" id="level_id" name="level_id">
                    <?php if (isset($levels) && sizeof($levels)) ?>
                    <?php foreach ($levels as $level) : ?>
                      <option value="<?= $level->id ?>"><?= $level->name ?></option>
                    <?php endforeach ?>
                    <?endif?>
                  </select>
                </div>


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
                <a href='<?=BASE_PATH?>customer' class="btn btn-secondary">Cancelar</a>
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

<script>
    function setInputFilter(textbox, inputFilter, errMsg) {
      ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop", "focusout"].forEach(function(event) {
        textbox.addEventListener(event, function(e) {
          if (inputFilter(this.value)) {
            // Accepted value.
            if (["keydown", "mousedown", "focusout"].indexOf(e.type) >= 0) {
              this.classList.remove("input-error");
              this.setCustomValidity("");
            }

            this.oldValue = this.value;
            this.oldSelectionStart = this.selectionStart;
            this.oldSelectionEnd = this.selectionEnd;
          } else if (this.hasOwnProperty("oldValue")) {
            // Rejected value: restore the previous one.
            this.classList.add("input-error");
            this.setCustomValidity(errMsg);
            this.reportValidity();
            this.value = this.oldValue;
            this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
          } else {
            // Rejected value: nothing to restore.
            this.value = "";
          }
        });
      });
    }
  
    const classes = ['.phone_number']
    const phone_inputs = classes.flatMap((className) => Array.from(document.querySelectorAll(className)));

    phone_inputs.forEach((phone) => {
      setInputFilter(phone, function(value) {
        return /^\d{0,10}$/.test(value); // Allow digits and '.' only, using a RegExp.
      }, "Solo digitos, 10 como máximo");
    })

</script>

  <?php

  include "../layouts/modals.php";

  ?>

</body>
<!-- [Body] end -->

</html>
