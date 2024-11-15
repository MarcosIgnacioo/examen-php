<?php
include_once "../../app/config.php";

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
                    <h5 class="mb-0">PolloPajas</h5>
                    <p class="text-muted text-sm">IG <a href="https://www.instagram.com/pollopajas/" class="link-primary"> @pollopajas </a> 😍🥵🥵</p>
                    <ul class="list-inline mx-auto my-4">
                      <li class="list-inline-item">
                        <a class="avtar  text-white bg-amazon">
                          <i class="bi bi-star-fill"></i>
                        </a>
                      </li>
                    </ul>
                    <a href="" class='btn-primary' data-bs-toggle="modal" data-bs-target="#nivelModal">Nivel</a>
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
                              <p class="mb-0">Martin Eduardo</p>
                            </div>
                            <div class="col-md-6">
                              <p class="mb-1 text-muted">Apellidos</p>
                              <p class="mb-0">Lopez Garcia</p>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item px-0">
                          <div class="row">
                            <div class="col-md-6">
                              <p class="mb-1 text-muted">Telefono</p>
                              <p class="mb-0">+52 613 129 6340</p>
                            </div>
                            <div class="col-md-6">
                              <p class="mb-1 text-muted">Pais</p>
                              <p class="mb-0">Mexico</p>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item px-0">
                          <div class="row">
                            <div class="col-md-6">
                              <p class="mb-1 text-muted">Correo</p>
                              <p class="mb-0">mlopez_21@alu.uabcs.mx</p>
                            </div>

                          </div>
                        </li>
                        <li class="list-group-item px-0 pb-0">
                          <div class="col-md-6">
                            <p class="mb-1 text-muted">Codigo Postal</p>
                            <p class="mb-0">23085</p>
                          </div>
                          <p class="mb-1 text-muted">Direccion</p>
                          <p class="mb-0">Mar caspio #279</p>
                        </li>
                      </ul>
                    </div>
                  </div>

                </div>
                <div class="tab-pane fade" id="user-set-information" role="tabpanel" aria-labelledby="user-set-information-tab">
                  <div class="card">
                    <div class="card-header">
                      <h5>Informacion Personal</h5>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="mb-3">
                            <label class="form-label">Nombre(s)</label>
                            <input type="text" class="form-control" value="Martin Eduardo">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb-3">
                            <label class="form-label">Apellidos</label>
                            <input type="text" class="form-control" value="Lopez Garcia">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb-3">
                            <label class="form-label">Correo <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" value="mlopez_21@alu.uabcs.mx">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb-3">
                            <label class="form-label">Telefono</label>
                            <input type="text" class="form-control" value="+52 613 129 6340">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb-3">
                            <label class="form-label">Pais</label>
                            <input type="text" class="form-control" value="Mexico">
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
                            <input type="text" class="form-control" value="23085">
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="mb-0">
                            <label class="form-label">Cuidad</label>
                            <text class="form-control">La Paz</text>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="mb-0">
                            <label class="form-label">Calle 1</label>
                            <text class="form-control">Mar Caspio</text>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="mb-0">
                            <label class="form-label">NO. de Casa</label>
                            <text class="form-control">279</text>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-end btn-page">
                    <div class="btn btn-outline-secondary">Cancelar</div>
                    <div class="btn btn-primary">Acualizar Perfil</div>
                  </div>
                </div>
                <d class="tab-pane fade" id="user-set-orden" role="tabpanel" aria-labelledby="user-set-orden-tab">
                  <div class="card">
                    <div class="card-header">
                      <div class="row justify-content-between ali mb-3 g-3">
                        <h4 class="col-sm-auto">Lista de Órdenes</h4>
                        <a href='' class=' btn-primary col-sm-auto ' data-bs-toggle="modal" data-bs-target="#ordenModal">Total de Ordenes</a>
                      </div>
                      
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">

                        <table class="table table-striped table-hover mb-0">
                          <thead>
                            <tr>
                              <th>ID Orden</th>
                              <th>Fecha</th>
                              <th>Estado</th>
                              <th>Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>#1001</td>
                              <td>2024-11-12</td>
                              <td><span class="badge bg-success">Completada</span></td>
                              <td>$240.00</td>
                            </tr>
                            <tr>
                              <td>#1002</td>
                              <td>2024-11-10</td>
                              <td><span class="badge bg-warning">Pendiente</span></td>
                              <td>$120.00</td>
                            </tr>
                            <tr>
                              <td>#1003</td>
                              <td>2024-11-08</td>
                              <td><span class="badge bg-danger">Cancelada</span></td>
                              <td>$0.00</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </d>
                <div class="tab-pane fade" id="user-set-passwort" role="tabpanel" aria-labelledby="user-set-passwort-tab">
                  <div class="card alert alert-warning p-0">
                    <div class="card-body">
                      <div class="d-flex align-items-center">
                        <div class="flex-grow-1 me-3">
                          <h4 class="alert-heading">Alert!</h4>
                          <p class="mb-2">Your Password will expire in every 3 months. So change it periodically.</p>
                          <a href="#" class="alert-link"><u>Do not share your password</u></a>
                        </div>
                        <div class="flex-shrink-0">
                          <img src="../assets/images/application/img-accout-password-alert.png" alt="img" class="img-fluid wid-80">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h5>Cambiar Contraseña</h5>
                    </div>
                    <div class="card-body">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item pt-0 px-0">
                          <div class="row mb-0">
                            <label class="col-form-label col-md-4 col-sm-12 text-md-end">Contraseña Actual <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8 col-sm-12">
                              <input type="password" class="form-control">
                              <div class="form-text"> Olidaste tu Contraseña? <a href="#" class="link-primary">Click here</a> </div>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item px-0">
                          <div class="row mb-0">
                            <label class="col-form-label col-md-4 col-sm-12 text-md-end">Nueva Contraseña <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-12">
                              <input type="password" class="form-control">
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item pb-0 px-0">
                          <div class="row mb-0">
                            <label class="col-form-label col-md-4 col-sm-12 text-md-end">Confirmar Contraseña <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-12">
                              <input type="password" class="form-control">
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body text-end">
                      <div class="btn btn-outline-secondary me-2">Cancelar</div>
                      <div class="btn btn-primary">Cambiar Contraseña</div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="user-set-email" role="tabpanel" aria-labelledby="user-set-email-tab">
                  <div class="text-end btn-page">
                    <a href="" class='btn-primary' data-bs-toggle="modal" data-bs-target="#direccionModal">Añadir Direccion</a>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h5>Direcciones</h5>
                    </div>
                    <div class="card-body">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0 pt-0">
                          <div class="row">
                            <div class="col-md-6">
                              <h5>Direccion 1</h5>
                            </div>
                            <div class="col-md-6">
                              <p class="mb-1 text-muted">Codigo Postal</p>
                              <p class="mb-0">23085</p>
                            </div>
                            <div class="col-md-6">
                              <p class="mb-1 text-muted">Ciudad</p>
                              <p class="mb-0">La Paz</p>
                            </div>
                            <div class="col-md-6">
                              <p class="mb-1 text-muted">Calle 1</p>
                              <p class="mb-0">Mar caspio</p>
                            </div>
                            <div class="col-md-6">
                              <p class="mb-1 text-muted">No. de Casa</p>
                              <p class="mb-0">279</p>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item px-0 pt-0">
                          <div class="row">
                            <div class="col-md-6">
                              <h5>Direccion 2</h5>
                            </div>
                            <div class="col-md-6">
                              <p class="mb-1 text-muted">Codigo Postal</p>
                              <p class="mb-0">23085</p>
                            </div>
                            <div class="col-md-6">
                              <p class="mb-1 text-muted">Ciudad</p>
                              <p class="mb-0">La Paz</p>
                            </div>
                            <div class="col-md-6">
                              <p class="mb-1 text-muted">Calle 1</p>
                              <p class="mb-0">Mar caspio</p>
                            </div>
                            <div class="col-md-6">
                              <p class="mb-1 text-muted">No. de Casa</p>
                              <p class="mb-0">279</p>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item px-0 pt-0">
                          <div class="row">
                            <div class="col-md-6">
                              <h5>Direccion 3</h5>
                            </div>
                            <div class="col-md-6">
                              <p class="mb-1 text-muted">Codigo Postal</p>
                              <p class="mb-0">23085</p>
                            </div>
                            <div class="col-md-6">
                              <p class="mb-1 text-muted">Ciudad</p>
                              <p class="mb-0">La Paz</p>
                            </div>
                            <div class="col-md-6">
                              <p class="mb-1 text-muted">Calle 1</p>
                              <p class="mb-0">Mar caspio</p>
                            </div>
                            <div class="col-md-6">
                              <p class="mb-1 text-muted">No. de Casa</p>
                              <p class="mb-0">279</p>
                            </div>
                          </div>
                        </li>
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
              <div class="modal-header">
                <h5>Agregar Direccion</h5>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="mb-3">
                      <label class="form-label">Codigo Postal</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="mb-0">
                      <label class="form-label">Cuidad</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="mb-0">
                      <label class="form-label">Calle 1</label>
                      <input type="text" class="form-control">

                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="mb-0">
                      <label class="form-label">NO. de Casa</label>
                      <input type="text" class="form-control">

                    </div>
                  </div>
                </div>
              </div>
              <div class="text-end btn-page">
                <div class="btn btn-danger">Cancelar</div>
                <div class="btn btn-primary">Agregar</div>
              </div>
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

  <?php

  include "../layouts/modals.php";

  ?>

</body>
<!-- [Body] end -->

</html>