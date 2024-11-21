<?php
include_once "../../app/config.php";
include_once("../../app/clientController.php");
include_once("../../app/productController.php");
include_once("../../app/couponController.php");

$clientController = new ClientController();
$clients = $clientController->getAllClients();

$productController = new ProductController();
$products = $productController->get();

$couponController = new CouponController();
$coupons = $couponController->getAllCoupons();
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

  <!-- [ Main Content michelle vieth ] start -->
  <div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Gestión de pedidos</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->

      <!-- [ Main Content ] start -->
      <!-- crear orden -->

      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h5>Order CRUD</h5>
            </div>
            <div class="card-body">
              <h5 class="card-title">Agregar Nuevo Pedido</h5>
              <div class="mb-3">
                <label for="order-id" class="form-label">ID de pedido:</label>
                <input type="text" class="form-control" id="order-id" placeholder="Order ID">
              </div>
              <div class="mb-3">
                <label for="order-id" class="form-label">Folio de pedido:</label>
                <input type="text" class="form-control" id="order-id" placeholder="Order ID">
              </div>
              <div class="mb-3">
            <label for="client-id" class="form-label">ID del cliente</label>
                <input type="text" class="form-control" id="client-id" placeholder="ID del cliente">
            </div>
            <div class="mb-3">
                <label for="client-name" class="form-label">Nombre del cliente</label>
                <input type="text" class="form-control" id="client-name" placeholder="Nombre del cliente" readonly>
                <div class="mb-3">
            <label for="product-combobox" class="form-label">Productos a comprar</label>
            <select id="product-combobox" class="form-control">
            </select>
          </div>
            <div id="product-list" class="mb-3">
          </div> 
              <div class="mb-3">
                <label for="client-name" class="form-label">Dirección de facturación "que saque las direcciones del cliente en api cliente"</label>
                <input type="text" class="form-control" id="client-name" placeholder="total">
              </div>
              <div class="mb-3">
                  <label for="coupon-input" class="form-label">Coupon Code</label>
                  <input type="text" class="form-control" id="coupon-input">
                  <button id="apply-coupon" class="btn btn-secondary mt-2">Apply Coupon</button>
              </div>
              <div class="mb-3">
                  <label for="total-price" class="form-label">Total</label>
                  <input type="text" class="form-control" id="total-price" readonly>
              </div>
              <button class="btn btn-success">Guardar Pedido</button>
      <!-- lista de ordenes -->

              <h5 class="mt-4">Order List</h5>
              <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Folio</th>
                      <th>Cliente</th>
                      <th>Total</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    include_once "../../app/orderController.php"; 
                    include_once "../../app/config.php";
                    
                    $orderController = new OrderController();
                    $orders = $orderController->getAllOrders(); 

                    if (!empty($orders)) {
                        foreach ($orders as $order) {
                            echo "<tr>
                                <td>{$order->id}</td>
                                <td>{$order->folio}</td>
                                <td>{$order->client->name}</td>
                                <td>$" . number_format($order->total, 2) . "</td>
                                <td>
                                    <button class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#editOrdenModal'>Editar</button>
                                    </button>
                                    <button class='btn btn-danger btn-sm'>Eliminar</button>
                                    <button 
                                        class='btn btn-secondary btn-sm view-order-details' 
                                        data-bs-toggle='modal' 
                                        data-bs-target='#detailOrdenModal'
                                        data-order-id='{$order->id}'
                                        data-folio='{$order->folio}'
                                        data-total='{$order->total}'
                                        data-client-name='" . htmlspecialchars($order->client->name, ENT_QUOTES) . "'
                                        data-client-email='" . htmlspecialchars($order->client->email, ENT_QUOTES) . "'
                                        data-address-street='" . htmlspecialchars($order->address->street_and_use_number, ENT_QUOTES) . "'
                                        data-address-city='" . htmlspecialchars($order->address->city, ENT_QUOTES) . "'
                                        data-address-province='" . htmlspecialchars($order->address->province, ENT_QUOTES) . "'
                                        data-address-postal='" . htmlspecialchars($order->address->postal_code, ENT_QUOTES) . "'
                                        data-coupon-code='" . ($order->coupon ? htmlspecialchars($order->coupon->code, ENT_QUOTES) : '') . "'
                                        data-coupon-discount='" . ($order->coupon ? htmlspecialchars($order->coupon->percentage_discount, ENT_QUOTES) : '') . "'
                                        data-presentations='" . htmlspecialchars(json_encode($order->presentations), ENT_QUOTES, 'UTF-8') . "'                >
                                        Ver Más
                                    </button>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr>
                                <td colspan='5'>No orders found.</td>
                            </tr>";
                    }
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>


      </div>
      <!-- [ Modal ]  -->
      <div class="modal fade" id="editOrdenModal" tabindex="-1" aria-labelledby="editOrdenModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editOrdenModalLabel">Editar</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <h5 class="card-title">Editar Pedido</h5>
              <div class="mb-3">
                <label for="order-id" class="form-label">ID de pedido:</label>
                <input type="text" class="form-control" id="order-id" placeholder="Order ID">
              </div>
              <div class="mb-3">
                <label for="client-name" class="form-label">Nombre del cliente</label>
                <input type="text" class="form-control" id="client-name" placeholder="Nombre del cliente">
              </div>
              <div class="mb-3">
                <label for="client-name" class="form-label">Total</label>
                <input type="text" class="form-control" id="client-name" placeholder="total">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
      </div>

      <!--modal para ver detalles de orden-->
      <div class="modal fade" id="detailOrdenModal" tabindex="-1" aria-labelledby="detailOrdenModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Detalles del pedido</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="modal-title">Información del pedido</h5>
                    <p><strong>ID de pedido: </strong><span id="order-id-display"></span></p>
                    <p><strong>Folio: </strong><span id="order-folio-display"></span></p>
                    <p><strong>Total: </strong><span id="order-total-display"></span></p>

                    <h5 class="mt-4">Productos Comprados</h5>
                    <div class="table-responsive">
                        <table id="purchased-products" class="table table-striped table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Código</th>
                                    <th>Cantidad</th>
                                    <th>Precio unitario</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                  <h5 class="mt-4">Información del cliente</h5>
                  <p><strong>Nombre: </strong><span id="client-name-display"></span></p>
                  <p><strong>Email: </strong><span id="client-email-display"></span></p>

                  <h5 class="mt-4">Dirección de envío</h5>
                  <p id="shipping-address-display"></p>

                  <div id="coupon-section">
                      <h5 class="mt-4">Cupón aplicado</h5>
                      <p><strong>Código de cupón: </strong><span id="coupon-code-display"></span></p>
                      <p><strong>Descuento aplicado: </strong><span id="coupon-discount-display"></span></p>
                </div>
            </div>
        </div>
    </div>
</div>


    </div>
  </div>
  <!-- [ Main Content ] end -->

  <?php include "../layouts/footer.php"; ?>
  <?php include "../layouts/scripts.php"; ?>
  <?php include "../layouts/modals.php"; ?>

</body>
<!-- [Body] end -->
<script>
 const detailOrdenModal = document.getElementById('detailOrdenModal');

    detailOrdenModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const data = button.dataset;
        
        document.getElementById('order-id-display').textContent = data.orderId;
        document.getElementById('order-folio-display').textContent = data.folio;
        document.getElementById('order-total-display').textContent = `$${parseFloat(data.total).toFixed(2)}`;
        
        document.getElementById('client-name-display').textContent = data.clientName;
        document.getElementById('client-email-display').textContent = data.clientEmail;
        
        document.getElementById('shipping-address-display').textContent = 
            `${data.addressStreet}, ${data.addressCity}, ${data.addressProvince}, ${data.addressPostal}`;
        
        const couponSection = document.getElementById('coupon-section');
        if (data.couponCode) {
            document.getElementById('coupon-code-display').textContent = data.couponCode;
            document.getElementById('coupon-discount-display').textContent = `${data.couponDiscount}%`;
            couponSection.style.display = 'block';
        } else {
            couponSection.style.display = 'none';
        }
        
        const productsTableBody = document.querySelector('#purchased-products tbody');
        productsTableBody.innerHTML = ''; 
        
        try {
            const presentations = JSON.parse(data.presentations);
            if (presentations && presentations.length > 0) {
                presentations.forEach(item => {
                    const total = parseFloat(item.current_price.amount) * parseInt(item.pivot.quantity);
                    const row = `
                        <tr>
                            <td>${item.description}</td>
                            <td>${item.code}</td>
                            <td>${item.pivot.quantity}</td>
                            <td>$${parseFloat(item.current_price.amount).toFixed(2)}</td>
                            <td>$${total.toFixed(2)}</td>
                        </tr>
                    `;
                    productsTableBody.innerHTML += row;
                });
            } else {
                productsTableBody.innerHTML = '<tr><td colspan="5">No products found for this order.</td></tr>';
            }
        } catch (error) {
            console.error('Error parsing presentations:', error);
            productsTableBody.innerHTML = '<tr><td colspan="5">Error loading products.</td></tr>';
        }
    });

    const clientsData = <?php echo json_encode($clients); ?>;
    
    document.addEventListener('DOMContentLoaded', function() {
        const clientIdInput = document.getElementById('client-id');
        const clientNameInput = document.getElementById('client-name');
        
        clientNameInput.readOnly = true;
        
        clientIdInput.addEventListener('input', function(e) {
            const clientId = e.target.value.trim();
            
            if (!clientId) {
                clientNameInput.value = '';
                return;
            }
            
            const client = clientsData.find(client => client.id === parseInt(clientId));
            
            if (client) {
                clientNameInput.value = client.name;
            } else {
                clientNameInput.value = '';
            }
        });
    });



    //cargar productos

    document.addEventListener('DOMContentLoaded', function() {
    const productsData = <?php echo json_encode($products); ?>;
    
    const productCombobox = document.getElementById('product-combobox');
    const productListContainer = document.getElementById('product-list');
    const totalPriceElement = document.getElementById('total-price');
    
    function populateProductCombobox() {
        productCombobox.innerHTML = '<option value="">Seleccionar Producto</option>';
        productsData.forEach(product => {
            const option = document.createElement('option');
            option.value = product.id;
            
            const price = product.presentations[0]?.price[0]?.amount || 'Precio no disponible';
            
            option.textContent = `${product.name} - $${price}`;
            productCombobox.appendChild(option);
        });
    }
    
    let selectedProducts = [];
    
    function addProductToList(productId) {
        const product = productsData.find(p => p.id === parseInt(productId));
        if (!product) return;
        
        const existingProductIndex = selectedProducts.findIndex(p => p.id === product.id);
        
        if (existingProductIndex !== -1) {
            selectedProducts[existingProductIndex].quantity++;
        } else {
            selectedProducts.push({
                ...product,
                quantity: 1
            });
        }
        
        renderProductList();
    }
    
    function renderProductList() {
        productListContainer.innerHTML = '';
        
        selectedProducts.forEach((product, index) => {
            const productPrice = product.presentations[0]?.price[0]?.amount || 0;
            
            const productElement = document.createElement('div');
            productElement.className = 'product-item d-flex align-items-center mb-2';
            productElement.innerHTML = `
                <span class="me-2">${product.name}</span>
                <div class="btn-group me-2" role="group">
                    <button type="button" class="btn btn-sm btn-outline-secondary decrease-qty" data-index="${index}">-</button>
                    <span class="btn btn-sm btn-outline-primary">${product.quantity}</span>
                    <button type="button" class="btn btn-sm btn-outline-secondary increase-qty" data-index="${index}">+</button>
                </div>
                <span>$${(productPrice * product.quantity).toFixed(2)}</span>
                <button type="button" class="btn btn-sm btn-danger ms-2 remove-product" data-index="${index}">X</button>
            `;
            
            productListContainer.appendChild(productElement);
        });
        
        updateTotalPrice();
        
        attachProductListeners();
    }
    
    function updateTotalPrice() {
        const total = selectedProducts.reduce((sum, product) => {
            const price = product.presentations[0]?.price[0]?.amount || 0;
            return sum + (price * product.quantity);
        }, 0);
        
        totalPriceElement.value = total.toFixed(2);
    }
    
    function attachProductListeners() {
        // auymentar cantidad de productos
        document.querySelectorAll('.increase-qty').forEach(button => {
            button.addEventListener('click', function() {
                const index = this.getAttribute('data-index');
                selectedProducts[index].quantity++;
                renderProductList();
            });
        });
        
        // disminuir productos
        document.querySelectorAll('.decrease-qty').forEach(button => {
            button.addEventListener('click', function() {
                const index = this.getAttribute('data-index');
                if (selectedProducts[index].quantity > 1) {
                    selectedProducts[index].quantity--;
                } else {
                    selectedProducts.splice(index, 1);
                }
                renderProductList();
            });
        });
        
        document.querySelectorAll('.remove-product').forEach(button => {
            button.addEventListener('click', function() {
                const index = this.getAttribute('data-index');
                selectedProducts.splice(index, 1);
                renderProductList();
            });
        });
    }
    
    productCombobox.addEventListener('change', function() {
        const selectedProductId = this.value;
        if (selectedProductId) {
            addProductToList(selectedProductId);
            this.value = ''; 
        }
    });
    
    populateProductCombobox();
});



  //añadir cupones

document.addEventListener('DOMContentLoaded', function() {
    const productsData = <?php echo json_encode($products); ?>;
    
    const productCombobox = document.getElementById('product-combobox');
    const productListContainer = document.getElementById('product-list');
    const totalPriceElement = document.getElementById('total-price');
    const couponInput = document.getElementById('coupon-input');
    const couponFeedback = document.getElementById('coupon-feedback');
    const couponCloseBtn = document.getElementById('coupon-close');
    
    let availableCoupons = [];
    let validatedCoupon = null;

    function fetchCoupons() {
        fetch('path/to/couponController.php?action=list_coupons')
            .then(response => response.json())
            .then(coupons => {
                availableCoupons = coupons;
            })
            .catch(error => console.error('Error fetching coupons:', error));
    }

    function validateCoupon(couponCode) {
        const coupon = availableCoupons.find(c => c.name === couponCode);
        
        if (coupon) {
            validatedCoupon = coupon;
            couponInput.disabled = true;
            couponFeedback.textContent = 'Cupón válido';
            couponFeedback.classList.remove('text-danger');
            couponFeedback.classList.add('text-success');
            couponCloseBtn.style.display = 'inline-block';
        } else {
            couponFeedback.textContent = 'Cupón inválido';
            couponFeedback.classList.remove('text-success');
            couponFeedback.classList.add('text-danger');
            validatedCoupon = null;
        }
    }

    couponCloseBtn.addEventListener('click', function() {
        couponInput.value = '';
        couponInput.disabled = false;
        couponFeedback.textContent = '';
        couponFeedback.classList.remove('text-success', 'text-danger');
        couponCloseBtn.style.display = 'none';
        validatedCoupon = null;
    });

    couponInput.addEventListener('change', function() {
        const couponCode = this.value.trim();
        if (couponCode) {
            validateCoupon(couponCode);
        }
    });

    
    function populateProductCombobox() {
    }
    
    let selectedProducts = [];
    
    function addProductToList(productId) {
    }
    
    function renderProductList() {
    }
    
    function updateTotalPrice() {
        const total = selectedProducts.reduce((sum, product) => {
            const price = product.presentations[0]?.price[0]?.amount || 0;
            return sum + (price * product.quantity);
        }, 0);
        
        totalPriceElement.value = total.toFixed(2);
    }
    
    function attachProductListeners() {
  
    }
    
    productCombobox.addEventListener('change', function() {
        const selectedProductId = this.value;
        if (selectedProductId) {
            addProductToList(selectedProductId);
            this.value = ''; 
        }
    });
    
    populateProductCombobox();
    fetchCoupons();
});
</script>

<script>
        const productsData = <?php echo json_encode($products); ?>;
        const couponsData = <?php echo json_encode($coupons); ?>;
    </script>
    
</html>