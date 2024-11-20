<div class="col-sm-6 col-xl-4">
  <div class="card product-card">
    <div class="card-img-top">
      <a href="<?= BASE_PATH . 'products/' . $product->slug ?>">
        <img src=<?= $product->cover ?> style="max-height: 150px;" alt="not image found" class="img-prod img-fluid" />
      </a>
      <div class="card-body position-absolute end-0 top-0">
        <div class="form-check prod-likes">
          <input type="checkbox" class="form-check-input" />
          <i data-feather="heart" class="prod-likes-icon"></i>
        </div>
      </div>
    </div>
    <div class="card-body">
      <a href="<?= BASE_PATH . 'products/' . $product->slug ?>">
        <p class="prod-content mb-0 text-muted"><?= $product->name ?></p>
      </a>
      <div class="d-flex align-items-center justify-content-between mt-2 mb-3 flex-wrap gap-1">
        <h4 class="mb-0 text-truncate"><b>$<?= $product->presentations[0]->price[0]->amount ?></b></h4>
        <div class="d-inline-flex align-items-center">
          <i class="ph-duotone ph-star text-warning me-1"></i>
          4.5 <small class="text-muted">/ 5</small>
        </div>
      </div>
      <div class="d-flex">
        <div class="flex-shrink-0">
          <a
            href="<?= BASE_PATH . 'products/' . $product->slug ?>"
            class="avtar avtar-s btn-link-secondary btn-prod-card"
            data-bs-toggle="offcanvas"
            data-bs-target="#productOffcanvas<?= $product->id ?>">
            <i class="ph-duotone ph-eye f-18"></i>
          </a>
        </div>
        <div class="flex-grow-1 ms-3">
          <div class="d-grid">
            <button class="btn btn-danger" onclick="deleteProduct(this)" data-id=<?= $product->id ?> data-product=<?= json_encode($product) ?>>Delete</button>
            <a class="btn btn-warning" href="<?= BASE_PATH ?>products/edit/<?= $product->slug ?>">Edit</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="offcanvas offcanvas-end" tabindex="-1" id="productOffcanvas<?= $product->id ?>" aria-labelledby="productOffcanvas<?= $product->id ?>Label">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="productOffcanvas<?= $product->id ?>Label">Detalles de <?= $product->name ?></h5>
      <a href="#" class="avtar avtar-s btn-link-danger btn-pc-default" data-bs-dismiss="offcanvas">
        <i class="ti ti-x f-20"></i>
      </a>
    </div>
    <div class="offcanvas-body">
      <div class="card product-card shadow-none border-0">
        <div class="card-img-top p-0">
          <a href="<?= BASE_PATH . 'products/' . $product->slug ?>">
            <img src="<?= $product->cover ?>" alt="image" class="img-prod img-fluid" />
          </a>
          <div class="card-body position-absolute end-0 top-0">
            <div class="form-check prod-likes">
              <input type="checkbox" class="form-check-input" />
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-heart prod-likes-icon">
                <path
                  d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
              </svg>
            </div>
          </div>
        </div>
      </div>
      <h5><?= $product->name ?></h5>
      <p class="text-muted"><?= $product->description ?></p>
      <ul class="list-group list-group-flush">
        <li class="list-group-item px-0">
          <div class="d-inline-flex align-items-center justify-content-between w-100">
            <p class="mb-0 text-muted me-1">Precio</p>
            <h4 class="mb-0"><b>$<?= $product->presentations[0]->price[0]->amount ?></b></h4>
          </div>
        </li>
        <li class="list-group-item px-0">
          <div class="d-inline-flex align-items-center justify-content-between w-100">
            <p class="mb-0 text-muted me-1">Categorias</p>
                            <?php foreach ($product->categories as $category) : ?>
            <h6 class="mb-0"><?= $category->name ?></h6>
                            <?php endforeach ?>
          </div>
        </li>
        <li class="list-group-item px-0">
          <div class="d-inline-flex align-items-center justify-content-between w-100">
            <p class="mb-0 text-muted me-1">Marca</p>
            <h6 class="mb-0"><?=$product->brand->name?></h6>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
