<?php
include_once "../../app/config.php";

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
          <div class="card bg-primary">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="flex-grow-1 me-3">
                  <h3 class="text-white">Email de Verificacion</h3>
                  <p class="text-white text-opacity-75 text-opa mb-0">Tu correo electrónico no está confirmado. Por favor revisa tu bandeja de entrada.
                    <a href="#" class="link-light"><u>Reenviar confirmación</u></a>
                  </p>
                </div>
                <div class="flex-shrink-0">
                  <img src="../assets/images/application/img-accout-alert.png" alt="img" class="img-fluid wid-80">
                </div>
              </div>
            </div>
          </div>
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
            <a href="lisDCustomer.php" class="btn-primary">Regresar</a>
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
                      <a  class="avtar  text-white bg-amazon">
                            <i class="bi bi-star-fill"></i>
                          </a>
                          <p>Nivel</p>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="nav flex-column nav-pills list-group list-group-flush account-pills mb-0" id="user-set-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link list-group-item list-group-item-action active" id="user-set-profile-tab" data-bs-toggle="pill" href="#user-set-profile" role="tab" aria-controls="user-set-profile" aria-selected="true">
                    <span class="f-w-500"><i class="ph-duotone ph-user-circle m-r-10"></i>Descripción general</span>
                  </a>
                  <a class="nav-link list-group-item list-group-item-action" id="user-set-information-tab" data-bs-toggle="pill" href="#user-set-information" role="tab" aria-controls="user-set-information" aria-selected="false" tabindex="-1">
                    <span class="f-w-500"><i class="ph-duotone ph-clipboard-text m-r-10"></i>Infomacion Personal</span>
                  </a>
                  <a class="nav-link list-group-item list-group-item-action" id="user-set-account-tab" data-bs-toggle="pill" href="#user-set-account" role="tab" aria-controls="user-set-account" aria-selected="false" tabindex="-1">
                    <span class="f-w-500"><i class="ph-duotone ph-notebook m-r-10"></i>Infomacion de Cuenta</span>
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
                <div class="tab-pane fade" id="user-set-account" role="tabpanel" aria-labelledby="user-set-account-tab">
                  <div class="card">
                    <div class="card-header">
                      <h5>General Settings</h5>
                    </div>
                    <div class="card-body">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0 pt-0">
                          <div class="row mb-0">
                            <label class="col-form-label col-md-4 col-sm-12 text-md-end">Username <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-12">
                              <input type="text" class="form-control" value="Ashoka_Tano_16">
                              <div class="form-text">
                                Your Profile URL: <a href="#" class="link-primary">https://pc.com/Ashoka_Tano_16</a>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item px-0">
                          <div class="row mb-0">
                            <label class="col-form-label col-md-4 col-sm-12 text-md-end">Account Email <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-12">
                              <input type="text" class="form-control" value="demo@sample.com">
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item px-0">
                          <div class="row mb-0">
                            <label class="col-form-label col-md-4 col-sm-12 text-md-end">Language</label>
                            <div class="col-md-8 col-sm-12">
                              <select class="form-control">
                                <option>Washington</option>
                                <option>India</option>
                                <option>Africa</option>
                                <option>New York</option>
                                <option>Malaysia</option>
                              </select>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item px-0 pb-0">
                          <div class="row mb-0">
                            <label class="col-form-label col-md-4 col-sm-12 text-md-end">Sign in Using <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-12">
                              <select class="form-control">
                                <option>Password</option>
                                <option>Face Recognition</option>
                                <option>Thumb Impression</option>
                                <option>Key</option>
                                <option>Pin</option>
                              </select>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h5>Advance Settings</h5>
                    </div>
                    <div class="card-body">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0 pt-0">
                          <div class="d-flex align-items-center justify-content-between">
                            <div>
                              <p class="mb-1">Secure Browsing</p>
                              <p class="text-muted text-sm mb-0">Browsing Securely ( https ) when it's necessary</p>
                            </div>
                            <div class="form-check form-switch p-0">
                              <input class="form-check-input h4 position-relative m-0" type="checkbox" role="switch" checked="">
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item px-0">
                          <div class="d-flex align-items-center justify-content-between">
                            <div>
                              <p class="mb-1">Login Notifications</p>
                              <p class="text-muted text-sm mb-0">Notify when login attempted from other place</p>
                            </div>
                            <div class="form-check form-switch p-0">
                              <input class="form-check-input h4 position-relative m-0" type="checkbox" role="switch" checked="">
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item px-0 pb-0">
                          <div class="d-flex align-items-center justify-content-between">
                            <div>
                              <p class="mb-1">Login Approvals</p>
                              <p class="text-muted text-sm mb-0">Approvals is not required when login from unrecognized devices.</p>
                            </div>
                            <div class="form-check form-switch p-0">
                              <input class="form-check-input h4 position-relative m-0" type="checkbox" role="switch" checked="">
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h5>Recognized Devices</h5>
                    </div>
                    <div class="card-body">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0 pt-0">
                          <div class="d-flex align-items-center justify-content-between">
                            <div class="me-2">
                              <div class="d-flex align-items-center">
                                <div class="avtar bg-light-primary">
                                  <i class="ph-duotone ph-desktop f-24"></i>
                                </div>
                                <div class="ms-2">
                                  <p class="mb-1">Celt Desktop</p>
                                  <p class="mb-0 text-muted">4351 Deans Lane</p>
                                </div>
                              </div>
                            </div>
                            <div class="">
                              <div class="text-success d-inline-block me-2">
                                <i class="fas fa-circle f-10 me-2"></i>
                                Current Active
                              </div>
                              <a href="#!" class="text-danger"><i class="feather icon-x-circle"></i></a>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item px-0">
                          <div class="d-flex align-items-center justify-content-between">
                            <div class="me-2">
                              <div class="d-flex align-items-center">
                                <div class="avtar bg-light-primary">
                                  <i class="ph-duotone ph-device-tablet-camera f-24"></i>
                                </div>
                                <div class="ms-2">
                                  <p class="mb-1">Imco Tablet</p>
                                  <p class="mb-0 text-muted">4185 Michigan Avenue</p>
                                </div>
                              </div>
                            </div>
                            <div class="">
                              <div class="text-muted d-inline-block me-2">
                                <i class="fas fa-circle f-10 me-2"></i>
                                Active 5 days ago
                              </div>
                              <a href="#!" class="text-danger"><i class="feather icon-x-circle"></i></a>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item px-0 pb-0">
                          <div class="d-flex align-items-center justify-content-between">
                            <div class="me-2">
                              <div class="d-flex align-items-center">
                                <div class="avtar bg-light-primary">
                                  <i class="ph-duotone ph-device-mobile-camera f-24"></i>
                                </div>
                                <div class="ms-2">
                                  <p class="mb-1">Albs Mobile</p>
                                  <p class="mb-0 text-muted">3462 Fairfax Drive</p>
                                </div>
                              </div>
                            </div>
                            <div class="">
                              <div class="text-muted d-inline-block me-2">
                                <i class="fas fa-circle f-10 me-2"></i>
                                Active 1 month ago
                              </div>
                              <a href="#!" class="text-danger"><i class="feather icon-x-circle"></i></a>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h5>Active Sessions</h5>
                    </div>
                    <div class="card-body">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0 pt-0">
                          <div class="d-flex align-items-center justify-content-between">
                            <div class="me-2">
                              <div class="d-flex align-items-center">
                                <div class="avtar bg-light-primary">
                                  <i class="ph-duotone ph-desktop f-24"></i>
                                </div>
                                <div class="ms-2">
                                  <p class="mb-1">Celt Desktop</p>
                                  <p class="mb-0 text-muted">4351 Deans Lane</p>
                                </div>
                              </div>
                            </div>
                            <button class="btn btn-link-danger">Logout</button>
                          </div>
                        </li>
                        <li class="list-group-item px-0 pb-0">
                          <div class="d-flex align-items-center justify-content-between">
                            <div class="me-2">
                              <div class="d-flex align-items-center">
                                <div class="avtar bg-light-primary">
                                  <i class="ph-duotone ph-device-tablet-camera f-24"></i>
                                </div>
                                <div class="ms-2">
                                  <p class="mb-1">Moon Tablet</p>
                                  <p class="mb-0 text-muted">4185 Michigan Avenue</p>
                                </div>
                              </div>
                            </div>
                            <button class="btn btn-link-danger">Logout</button>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body text-end">
                      <button class="btn btn-outline-dark me-2">Clear</button>
                      <button class="btn btn-primary">Update Profile</button>
                    </div>
                  </div>
                </div>
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
                  <div class="card">
                    <div class="card-header">
                      <h5>Email Settings</h5>
                    </div>
                    <div class="card-body">
                      <h6 class="mb-3">Setup Email Notification</h6>
                      <div class="d-flex align-items-center justify-content-between mb-1">
                        <div>
                          <p class="text-muted mb-0">Email Notification</p>
                        </div>
                        <div class="form-check form-switch p-0">
                          <input class="m-0 form-check-input h5 position-relative" type="checkbox" role="switch" checked="">
                        </div>
                      </div>
                      <div class="d-flex align-items-center justify-content-between mb-0">
                        <div>
                          <p class="text-muted mb-0">Send Copy To Personal Email</p>
                        </div>
                        <div class="form-check form-switch p-0">
                          <input class="m-0 form-check-input h5 position-relative" type="checkbox" role="switch">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h5>Activity Related Emails</h5>
                    </div>
                    <div class="card-body">
                      <h6 class="mb-3">When to email?</h6>
                      <div class="d-flex align-items-center justify-content-between mb-1">
                        <div>
                          <p class="text-muted mb-0">Have new notifications</p>
                        </div>
                        <div class="form-check form-switch p-0">
                          <input class="m-0 form-check-input h5 position-relative" type="checkbox" role="switch" checked="">
                        </div>
                      </div>
                      <div class="d-flex align-items-center justify-content-between mb-1">
                        <div>
                          <p class="text-muted mb-0">You're sent a direct message</p>
                        </div>
                        <div class="form-check form-switch p-0">
                          <input class="m-0 form-check-input h5 position-relative" type="checkbox" role="switch">
                        </div>
                      </div>
                      <div class="d-flex align-items-center justify-content-between mb-1">
                        <div>
                          <p class="text-muted mb-0">Someone adds you as a connection</p>
                        </div>
                        <div class="form-check form-switch p-0">
                          <input class="m-0 form-check-input h5 position-relative" type="checkbox" role="switch" checked="">
                        </div>
                      </div>
                      <hr class="my-2 border border-secondary-subtle">
                      <h6 class="mb-3">When to escalate emails?</h6>
                      <div class="d-flex align-items-center justify-content-between mb-1">
                        <div>
                          <p class="text-muted mb-0">Upon new order</p>
                        </div>
                        <div class="form-check form-switch p-0">
                          <input class="m-0 form-check-input h5 position-relative" type="checkbox" role="switch" checked="">
                        </div>
                      </div>
                      <div class="d-flex align-items-center justify-content-between mb-1">
                        <div>
                          <p class="text-muted mb-0">New membership approval</p>
                        </div>
                        <div class="form-check form-switch p-0">
                          <input class="m-0 form-check-input h5 position-relative" type="checkbox" role="switch">
                        </div>
                      </div>
                      <div class="d-flex align-items-center justify-content-between mb-0">
                        <div>
                          <p class="text-muted mb-0">Member registration</p>
                        </div>
                        <div class="form-check form-switch p-0">
                          <input class="m-0 form-check-input h5 position-relative" type="checkbox" role="switch" checked="">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h5>Updates from System Notification</h5>
                    </div>
                    <div class="card-body">
                      <h6 class="mb-3">Email you with?</h6>
                      <div class="d-flex align-items-center justify-content-between mb-1">
                        <div>
                          <p class="text-muted mb-0">News about PCT-themes products and feature updates</p>
                        </div>
                        <div class="form-check form-switch p-0">
                          <input class="m-0 form-check-input h5 position-relative" type="checkbox" role="switch" checked="">
                        </div>
                      </div>
                      <div class="d-flex align-items-center justify-content-between mb-1">
                        <div>
                          <p class="text-muted mb-0">Tips on getting more out of PCT-themes</p>
                        </div>
                        <div class="form-check form-switch p-0">
                          <input class="m-0 form-check-input h5 position-relative" type="checkbox" role="switch" checked="">
                        </div>
                      </div>
                      <div class="d-flex align-items-center justify-content-between mb-1">
                        <div>
                          <p class="text-muted mb-0">Things you missed since you last logged into PCT-themes</p>
                        </div>
                        <div class="form-check form-switch p-0">
                          <input class="m-0 form-check-input h5 position-relative" type="checkbox" role="switch">
                        </div>
                      </div>
                      <div class="d-flex align-items-center justify-content-between mb-1">
                        <div>
                          <p class="text-muted mb-0">News about products and other services</p>
                        </div>
                        <div class="form-check form-switch p-0">
                          <input class="m-0 form-check-input h5 position-relative" type="checkbox" role="switch">
                        </div>
                      </div>
                      <div class="d-flex align-items-center justify-content-between mb-0">
                        <div>
                          <p class="text-muted mb-0">Tips and Document business products</p>
                        </div>
                        <div class="form-check form-switch p-0">
                          <input class="m-0 form-check-input h5 position-relative" type="checkbox" role="switch">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body text-end btn-page">
                      <div class="btn btn-outline-secondary">Cancel</div>
                      <div class="btn btn-primary">Update Profile</div>
                    </div>
                  </div>
                </div>
              </div>
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