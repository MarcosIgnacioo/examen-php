<?php
include_once "../../app/config.php";

include_once("../../app/clientController.php");

$link = $_SERVER['REQUEST_URI'];
$link_array = explode('/', $link);
$id = end($link_array);

$clientController = new ClientController();
$client = $clientController->getClientDetails($id);
$orders = $client->orders;
$addresses = $client->addresses;
$addressFields = [
  "id" => "id",
  "first_name" => "Nombre",
  "last_name" => "Apellido",
  "street_and_use_number" => "Calle y número",
  "apartment" => "Apartamento",
  "postal_code" => "Código Postal",
  "city" => "Ciudad",
  "province" => "Provincia",
  "phone_number" => "Número de teléfono",
  "is_billing_address" => "¿Es dirección de facturación?",
  "client_id" => "ID del cliente"
];

// TODO: Poner que se puedan subir imagenes a la hora de crear un cliente aunque esto sea dependiente del servidor de xamp asi q buscar la manera en la que sea generico pa todos
// Poner los niveles a la hora de editar y crear un cliente
// y vaciar los valores de los campos
// quitar el direccion principal del informacion personal
// y creo que eso seria lo unico que le faltaria a este modulo
?>
<!doctype html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

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
                <h2 class="mb-0">Info Del Cliente</h2>
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
          <div class="row">
            <!-- Alta de cliente
            Modificaciones de cliente

            Vista de detalle del cliente: 

                Información del cliente
                Nivel, lista de ordenes
                Widgets totales de compras
                Direcciones registradas
                     Crud de direcciones
            -->

            <div class="row justify-content-between ali mb-3 g-3">

              <a href='lisDCustomer.php' class='btn-primary col-sm-auto'>Regresar</a>


            </div>
            <div class="col-lg-5 col-xxl-3">
              <div class="card overflow-hidden">
                <div class="card-body position-relative">
                  <div class="text-center mt-3">
                    <div class="chat-avtar d-inline-flex mx-auto">
                      <img class="rounded-circle img-fluid wid-150 img-thumbnail" src="https://pbs.twimg.com/media/EROXX7PVUAIqPGR?format=jpg&name=small" alt="User image">
                      <i class="chat-badge bg-success me-2 mb-2"></i>
                    </div>
                    <h5 class="mb-0"><?= $client->name ?></h5>
                    <p class="text-muted text-sm"><a mailto="<?= $client->email ?>" type="email" class="link-primary"> <?= $client->email ?></a></p>
                    <a href="" class='btn-primary' data-bs-toggle="modal" data-bs-target="#nivelModal">Nivel <?= $client->level->name ?></a>
                  </div>
                </div>
                <div class="nav flex-column nav-pills list-group list-group-flush account-pills mb-0" id="user-set-tab" role="tablist" aria-orientation="vertical">

                  <a class="nav-link list-group-item list-group-item-action active" id="user-set-profile-tab" data-bs-toggle="pill" href="#user-set-profile" role="tab" aria-controls="user-set-profile" aria-selected="true">
                    <span class="f-w-500"><i class="ph-duotone ph-user-circle m-r-10"></i>Descripción general</span>
                  </a>
                  <a class="nav-link list-group-item list-group-item-action" id="user-set-information-tab" data-bs-toggle="pill" href="#user-set-information" role="tab" aria-controls="user-set-information" aria-selected="false" tabindex="-1">
                    <span class="f-w-500"><i class="ph-duotone ph-clipboard-text m-r-10"></i>Infomacion Personal</span>
                  </a>
                  <a class="nav-link list-group-item list-group-item-action" id="user-set-orden-tab" data-bs-toggle="pill" href="#user-set-orden" role="tab" aria-controls="user-set-orden" aria-selected="false" tabindex="-1">
                    <span class="f-w-500"><i class="ph-duotone ph-notebook m-r-10"></i>Ordenes</span>
                  </a>
                  <a class="nav-link list-group-item list-group-item-action" id="user-set-passwort-tab" data-bs-toggle="pill" href="#user-set-passwort" role="tab" aria-controls="user-set-passwort" aria-selected="false" tabindex="-1">
                    <span class="f-w-500"><i class="ph-duotone ph-key m-r-10"></i>Cambiar Contraseña</span>
                  </a>
                  <a class="nav-link list-group-item list-group-item-action" id="user-set-email-tab" data-bs-toggle="pill" href="#user-set-email" role="tab" aria-controls="user-set-email" aria-selected="false" tabindex="-1">
                    <span class="f-w-500"><i class="ph-duotone ph-envelope-open m-r-10"></i>Direcciones</span>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-lg-7 col-xxl-9">
              <div class="tab-content" id="user-set-tabContent">
                <div class="tab-pane fade" id="user-set-ordenbutton" role="tabpanel" aria-labelledby="user-set-ordenbutton-tab">
                  <div class="card">
                    <div class="card-body">
                      <div class="card bg-primary text-white">
                        <div class="card-body">
                          <h5 class="card-title">Órdenes Totales</h5>
                          <h2>120</h2>
                          <button class="btn btn-light btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#ordenesTotalesModal">
                            Ver Detalle
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <div class="card bg-success text-white">
                        <div class="card-body">
                          <h5 class="card-title">Compras Completadas</h5>
                          <h2>95</h2>
                          <button class="btn btn-light btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#comprasCompletadasModal">
                            Ver Detalle
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-body">
                      <div class="card bg-warning text-dark">
                        <div class="card-body">
                          <h5 class="card-title">Órdenes Pendientes</h5>
                          <h2>15</h2>
                          <button class="btn btn-dark btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#ordenesPendientesModal">
                            Ver Detalle
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <div class="card bg-danger text-white">
                        <div class="card-body">
                          <h5 class="card-title">Órdenes Canceladas</h5>
                          <h2>10</h2>
                          <button class="btn btn-light btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#ordenesCanceladasModal">
                            Ver Detalle
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade show active" id="user-set-profile" role="tabpanel" aria-labelledby="user-set-profile-tab">
                  <div class="card">
                    <div class="card-header">
                      <h5>Descripcion General</h5>
                    </div>
                    <div class="card-body">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0 pt-0">
                          <div class="row">
                            <div class="col-md-6">
                              <p class="mb-1 text-muted">Nombre(s)</p>
                              <p class="mb-0"><?= $client->name ?></p>
                            </div>
                            <div class="col-md-6">
                              <p class="mb-1 text-muted">Email</p>
                              <p class="mb-0"><?= $client->email ?></p>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item px-0">
                          <div class="row">
                            <div class="col-md-6">
                              <p class="mb-1 text-muted">Telefono</p>
                              <p class="mb-0"><?= $client->phone_number ?></p>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="user-set-information" role="tabpanel" aria-labelledby="user-set-information-tab">
                  <form method="POST" action="api-client">
                    <input type="text" hidden name="action" value="update_client">
                    <input type="text" name="global_token" value=<?= $_SESSION['global_token'] ?> hidden>
                    <input name="id" hidden type="text" class="form-control" value="<?= $client->id ?>">
                    <div class="card">
                      <div class="card-header">
                        <h5>Informacion Personal</h5>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="mb-3">
                              <label class="form-label">Nombre(s)</label>
                              <input name="name" type="text" class="form-control" value="<?= $client->name ?>">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="mb-3">
                              <label class="form-label">Correo <span class="text-danger">*</span></label>
                              <input name="email" type="email" class="form-control" value="<?= $client->email ?>">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="mb-3">
                              <label class="form-label">Telefono</label>
                              <input name="phone_number" type="text" class="form-control" value="<?= $client->phone_number ?>">
                            </div>
                          </div>
<div class="col-sm-6">
                            <div class="mb-3">
                              <label class="form-label">Estado</label>
                              <input name="" type="text" class="form-control" value="<?= $address->province ?>">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header">
                        <h5>Direccion Principal</h5>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="mb-3">
                              <label class="form-label">Codigo Postal</label>
                              <input type="text" class="form-control" value="<?= $address->postal_code ?>">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="mb-0">
                              <label class="form-label">Cuidad</label>
                              <input class="form-control" value="<?= $address->city ?>"></input>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="mb-0">
                              <label class="form-label">Calle</label>
                              <input class="form-control" value="<?= $address->street_and_use_number ?>"></input>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="text-end btn-page">
                      <div class="btn btn-outline-secondary">Cancelar</div>
                      <button type="submit" class="btn btn-primary">Acualizar Perfil</button>
                    </div>

                  </form>
                </div>

                <div class="tab-pane fade" id="user-set-orden" role="tabpanel" aria-labelledby="user-set-orden-tab">
                  <div class="card">
                    <div class="card-header">
                      <div class="row justify-content-between ali mb-3 g-3">
                        <h4 class="col-sm-auto">Lista de órdenes</h4>
                        <a href='' class=' btn-primary col-sm-auto ' data-bs-toggle="modal" data-bs-target="#ordenModal">Total de Ordenes</a>
                      </div>

                    </div>
                    <div class="card-body">
                      <div class="table-responsive">

                        <table class="table table-striped table-hover mb-0">
                          <thead>
                            <tr>
                              <th>ID Orden</th>
                              <th>Estado</th>
                              <th>Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if (isset($orders) && sizeof($orders)) ?>
                            <?php foreach ($orders as $order) : ?>
                              <tr>
                                <td><?= $order->id ?></td>
                                <?php
                                switch ($order->order_status->slug) {
                                  case 'cancelled':
                                    echo '<td><span class="badge bg-danger">Cancelada</span></td>';
                                    break;
                                  case 'waiting_for_payment':
                                    echo '<td><span class="badge bg-warning text-white fw-bold">Pendiente de pago</span></td>';
                                    break;
                                  case 'pending_to_send':
                                    echo '<td><span class="badge bg-warning text-white fw-bold">Pendiente</span></td>';
                                    break;
                                  case 'sent':
                                    echo '<td><span class="badge bg-success">Completada</span></td>';
                                    break;
                                  case 'abandoned':
                                    echo '<td><span class="badge bg-info">Abandonada</span></td>';
                                    break;
                                  default:
                                    echo '<td><span class="badge bg-secondary"></span></td>';
                                    break;
                                } ?>

                                <td><?= $order->total ?></td>
                              </tr>
                            <?php endforeach ?>
                            <?endif?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="user-set-passwort" role="tabpanel" aria-labelledby="user-set-passwort-tab">
                  <div class="card">
                    <div class="card-header">
                      <h5>Cambiar Contraseña</h5>
                    </div>
                    <form method="POST" action="api-client">
                      <input type="text" hidden name="action" value="update_client">
                      <input type="text" name="global_token" value=<?= $_SESSION['global_token'] ?> hidden>
                      <input name="id" hidden type="text" class="form-control" value="<?= $client->id ?>">
                      <div class="card-body">
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item px-0">
                            <div class="row mb-0">
                              <label class="col-form-label col-md-4 col-sm-12 text-md-end">Nueva Contraseña <span class="text-danger">*</span></label>
                              <div class="col-md-8 col-sm-12">
                                <input name="password" type="password" class="form-control">

                                <button type="submit" class="ms-auto btn btn-primary">Cambiar Contraseña</button>
                              </div>

                            </div>
                          </li>
                        </ul>
                      </div>
                    </form>
                  </div>

                </div>

                <!--- no tenemos aun controlador d direcciones --->
                <div class="tab-pane fade" id="user-set-email" role="tabpanel" aria-labelledby="user-set-email-tab">
                  <div class="text-end btn-page">
                    <button href="" class='btn btn-primary' data-bs-toggle="modal" data-bs-target="#direccionModal">Añadir Direccion</button>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h5>Direcciones</h5>
                    </div>
                    <div class="card-body">
                      <ul class="list-group list-group-flush">
                        <?php if (isset($addresses) && sizeof($addresses)) ?>
                        <?php foreach ($addresses as $address) : ?>
                          <li class="list-group-item px-0 pt-0">
                            <div class="row">
                              <div class="col-md-6 mt-3">
                                <p class="mb-1 text-muted">Estado</p>
                                <p class="mb-0"><?= $address->province ?></p>
                              </div>
                              <div class="col-md-6 mt-3">
                                <p class="mb-1 text-muted">Código Postal</p>
                                <p class="mb-0"><?= $address->postal_code ?></p>
                              </div>
                              <div class="col-md-6">
                                <p class="mb-1 text-muted">Ciudad</p>
                                <p class="mb-0"><?= $address->city ?></p>
                              </div>
                              <div class="col-md-6">
                                <p class="mb-1 text-muted">Calle 1</p>
                                <p class="mb-0"><?= $address->street_and_use_number ?></p>
                              </div>
                              <div class="col-md-6">
                                <p class="mb-1 text-muted">No. de Casa</p>
                                <p class="mb-0">279</p>
                              </div>
                              <div class="col-md-6 mt-3">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#edit<?= $address->id ?>">
                                  Editar
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $address->id ?>">
                                  Borrar
                                </button>
                                <div class="modal fade" id="delete<?= $address->id ?>" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="editLabel">¿Está seguro que desea borrar esta dirección?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <form method="POST" action="api-literlamente no existe">
                                          <input type="text" hidden name="action" value="delete_address">
                                          <input type="text" name="global_token" value=<?= $_SESSION['global_token'] ?> hidden>
                                          <input name="client_id" hidden type="text" class="form-control" value="<?= $client->id ?>">
                                          <input hidden name="address_id" type="text" class="form-control" value="<?= $address->id ?>">
                                          <div class="d-flex justify-content-around">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                          </div>
                                      </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal fade" id="edit<?= $address->id ?>" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="editLabel">Editar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <form method="POST" action="api-client">
                                          <div class="card">
                                            <div class="card-body">
                                              <!---MANDATORY SHIT--->
                                              <input type="text" hidden name="action" value="update_address">
                                              <input type="text" name="global_token" value=<?= $_SESSION['global_token'] ?> hidden>
                                              <input name="client_id" hidden type="text" class="form-control" value="<?= $client->id ?>">
                                              <!---MANDATORY SHIT REMEMBER TO CHANGE THE ACTION NAME AND THE ID AND THE NAME OF THE ID FIELD JUST IN CASE EVERY TIME YOU COPYPASTE--->
                                              <div class="row">
                                                <div class="col-sm-12">
                                                  <?php foreach ($address as $key => $value) : ?>
                                                    <div class="mb-6">
                                                      <label <?= $isHidden = (str_contains($key, "id")) ? "hidden" : "" ?> class="form-label"><?= $addressFields[$key] ?></label>
                                                      <?php if (str_contains($key, "is_")) : ?>
                                                        <select class="form-control" id="<?= $key ?>" name="<?= $key ?>" value="<?= $value ?>">
                                                          <option <?= $isSelected = ($value == "1") ? "selected" : "" ?> value="1">Si</option>
                                                          <option <?= $isSelected = ($value == "0") ? "selected" : "" ?> value="0">No</option>
                                                        </select>
                                                      <?php else : ?>
                                                        <input <?= $isHidden = (str_contains($key, "id")) ? "hidden" : "" ?> name="<?= $key ?>" type="text" class="form-control <?= $key ?>" value="<?= $value ?>">
                                                      <?php endif; ?>
                                                    </div>
                                                  <?php endforeach; ?>
                                                </div>
                                                <div class="col-sm-6">
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                      </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                        <?php endforeach ?>
                        <?endif?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- [ sample-page ] end -->
        </div>
        <!-- [ Modals ]  -->
        <div class="modal fade modal-animate" id="nivelModal" tabindex="-1" aria-labelledby="nivelModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="card mb-4" style="width: 30rem;">
              <div class="card-header bg-info text-white text-center">
                <h5 class="mb-0">Nivel de Usuario</h5>
              </div>
              <div class="card-body text-center">
                <h6 class="card-title">Nivel: <strong>Plata</strong></h6>
                <p class="card-text">Beneficios: Envío gratis en pedidos superiores a $50.</p>
              </div>
            </div>

          </div>
        </div>

        <div class="modal fade modal-animate" id="direccionModal" tabindex="-1" aria-labelledby="direccionModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <form method="POST" action="api-client">
                <input type="text" hidden name="action" value="add_address">
                <input type="text" name="global_token" value=<?= $_SESSION['global_token'] ?> hidden>
                <input name="client_id" hidden type="text" class="form-control" value="<?= $client->id ?>">
                <div class="modal-header">
                  <h5>Agregar Direccion</h5>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <?php foreach ($addressFields as $key => $value) : ?>
                        <div class="mb-6">
                          <label <?= $isHidden = (str_contains($key, "id")) ? "hidden" : "" ?> class="form-label"><?= $value ?></label>
                          <?php if (str_contains($key, "is_")) : ?>
                            <select class="form-control" id="<?= $key ?>" name="<?= $key ?>" value="<?= $value ?>">
                              <option value="1">Si</option>
                              <option value="0">No</option>
                            </select>
                          <!--- cambiar esto a un == id quizas despues --->
                          <?php elseif (!str_contains($key, "id")) : ?>
                            <input name="<?= $key ?>" type="text" class="form-control <?= $key ?>" value="asdf">
                          <?php endif; ?>
                        </div>
                      <?php endforeach; ?>
                    </div>
                    <div class="col-sm-6">
                    </div>
                  </div>
                </div>
                <div class="text-end btn-page">
                  <div class="btn btn-danger">Cancelar</div>
                  <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
              </form>

            </div>

          </div>
        </div>

        <div class="modal fade modal-animate" id="ordenModal" tabindex="-1" aria-labelledby="ordenModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content ">

              <div class="modal-header">
                <h5>Ordenes</h5>
              </div>
              <div class="modal-body">
                <div class="bg-success text-white">
                  <h5 class="modal-title">Compras Completadas</h5>
                  <h4>95</h4>
                  <button class="btn btn-light btn-sm " data-bs-toggle="modal" data-bs-target="#comprasCompletadasModal">
                    Ver Detalle
                  </button>
                </div>
              </div>
              <div class="modal-body">
                <div class="bg-warning text-dark">
                  <h5 class="modal-title">Órdenes Pendientes</h5>
                  <h4>15</h4>
                  <button class="btn btn-dark btn-sm " data-bs-toggle="modal" data-bs-target="#ordenesPendientesModal">
                    Ver Detalle
                  </button>
                </div>
              </div>
              <div class="modal-body">
                <div class="bg-danger text-white">
                  <h5 class="modal-title">Órdenes Canceladas</h5>
                  <h4>10</h4>
                  <button class="btn btn-light btn-sm " data-bs-toggle="modal" data-bs-target="#ordenesCanceladasModal">
                    Ver Detalle
                  </button>
                </div>
              </div>

            </div>

          </div>
        </div>

        <div class="modal fade" id="comprasCompletadasModal" tabindex="-1" aria-labelledby="comprasCompletadasModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="comprasCompletadasModalLabel">Compras Completadas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Total</th>
                        <th>Fecha</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>$8,999.99</td>
                        <td>2024-11-01</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>$9,000.00</td>
                        <td>2024-11-02</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ordenModal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="ordenesPendientesModal" tabindex="-1" aria-labelledby="ordenesPendientesModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ordenesPendientesModalLabel">Órdenes Pendientes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Total</th>
                        <th>Fecha</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>$7,999.99</td>
                        <td>2024-11-04</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>$10,000.00</td>
                        <td>2024-11-05</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ordenModal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="ordenesCanceladasModal" tabindex="-1" aria-labelledby="ordenesCanceladasModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ordenesCanceladasModalLabel">Órdenes Canceladas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="table-responsive">
                  <table class="table  table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Total</th>
                        <th>Fecha</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>$12,000.00</td>
                        <td>2024-11-06</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>$15,000.00</td>
                        <td>2024-11-07</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ordenModal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>

      </div>
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
    const classes = ['.phone_number', '.postal_code']
    const phone_inputs = classes.flatMap((className) => Array.from(document.querySelectorAll(className)));
    console.log(phone_inputs);

    phone_inputs.forEach((phone) => {
      setInputFilter(phone, function(value) {
        return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp.
      }, "Solo digitos");
    })
  </script>

  <?php

  include "../layouts/modals.php";

  ?>

</body>
<!-- [Body] end -->

</html>
