<?php if (isset($products) && sizeof($products)) ?>
<select class="form-control">
  <?php foreach ($products as $product) : ?>
    <option value="<?= $product->id ?>">
      <?= $product->name ?>
    </option>
  <?php endforeach ?>
</select>
<?endif?>
<div class="mb-3">
  <label class="form-label">Categorias</label>
  <div id="category_container mt-2">
    <div id="category_selector container">
      <?php if (isset($productCategories) && sizeof($productCategories)): ?>
        <?php foreach ($productCategories as $productCategory) : ?>
          <div class="row" id="">
            <div class="col d-flex">
              <?php if (isset($categories) && sizeof($categories)): ?>
                <select class="col form-select mt-2" name="categories[]">
                  <?php foreach ($categories as $category) : ?>
                    <option <?= $isSelected = ($productCategory->id == $category->id) ? "selected" : "" ?> value="<?= $category->id ?>"><?= $category->name ?></option>
                </select>
              <?php endforeach ?>
            <?php endif; ?>
            </div>
          <?php endforeach ?>
          <div class="col mt-2">
          </div>
          </div>
    </div>
  <?php endif; ?>
  <div id="more-categories">
  </div>
  </div>
  <button onclick='addCategory()' type="button" class="btn btn-secondary mt-4">Agregar categoria</button>
</div>


<div class="mb-3 mt-4">
  <label class="form-label">Etiquetas</label>
  <div id="tag_container mt-2">
    <div id="container">
      <?php if (isset($producttags) && sizeof($producttags)): ?>
        <?php foreach ($productTags as $producttag) : ?>
          <div class="row" id="tag_selector">
            <div class="col d-flex">
              <?php if (isset($tags) && sizeof($tags)): ?>
                <select class="col form-select mt-2" name="tags[]">
                  <?php foreach ($tags as $tag) : ?>
                    <option <?= $isSelected = ($productTag->id == $tag->id) ? "selected" : "" ?> value="<?= $tag->id ?>"><?= $tag->name ?></option>
                </select>
              <?php endforeach ?>
            <?php endif; ?>
            </div>
          <?php endforeach ?>
          <div class="col mt-2">
          </div>
          </div>
    </div>
  <?php endif; ?>
  <div id="more-tags">
  </div>
  <button onclick='addTag()' type="button" class="btn btn-secondary mt-4">Agregar etiqueta</button>
  </div>
</div>
<div class="mb-0 mt-4">
  <label class="form-label">Descripción del producto</label>
  <textarea class="form-control" name="description" placeholder="descipcion">
                    <?= $product->description ?>
                  </textarea>
</div>
<div class="mb-0">
  <label class="form-label">Caracteristicas del productos</label>
  <textarea class="form-control" name="features" placeholder="es un pink pony club">
                    <?= $product->features ?>
                </textarea>
</div>
</div>
<div class="card-body btn-page">
  <button type="submit" class="btn btn-primary mb-0">Save product</button>
</div>
</div>
