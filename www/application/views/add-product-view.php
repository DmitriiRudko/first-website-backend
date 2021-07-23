<?php
/** @var array $data */
$notValid = $data;
?>
<div class="container">
    <form class="row g-3" action="/AddProduct/addProduct" method="POST">
        <div class="col-md-4">
            <label for="validationServer01" class="form-label">Product name</label>
            <input type="text" class="form-control <?= $notValid['nameErr'] ? 'is-invalid' : ''; ?>"
                   id="validationServer01" name="name"
                   value="<?= $notValid['name'] ? $notValid['name'] : '' ?>" required>
            <div class="invalid-feedback">
                <?= $notValid['nameErr'] ? $notValid['nameErr'] : '' ?>
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationServer02" class="form-label">Price</label>
            <input type="text" class="form-control <? echo $notValid['priceErr'] ? 'is-invalid' : '' ?> "
                   id="validationServer02" name="price"
                   value="<?= $notValid['price'] ? $notValid['price'] : '' ?>" required>
            <div class="invalid-feedback">
                <?= $notValid['priceErr'] ? $notValid['priceErr'] : '' ?>
            </div>
        </div>

        <div class="col-md-4">
            <label for="validationServer02" class="form-label">Barcode</label>
            <input type="text" class="form-control <?= $notValid['barcodeErr'] ? 'is-invalid' : '' ?>"
                   id="validationServer02" name="barcode"
                   value="<?= $notValid['barcode'] ? $notValid['barcode'] : '' ?>" required>
            <div class="invalid-feedback">
                <?= $notValid['barcodeErr'] ? $notValid['barcodeErr'] : '' ?>
            </div>
        </div>
        <div class="form-floating col-md-8">
            <textarea class="form-control <?= $notValid['descriptionErr'] ? 'is-invalid' : '' ?>" id="floatingTextarea2"
                      name="description"
                      required><?= $notValid['description'] ? $notValid['description'] : '' ?></textarea>
            <label for="floatingTextarea2">Description</label>
            <div id="floatingTextarea2" class="invalid-feedback">
                <?= $notValid['descriptionErr'] ? $notValid['descriptionErr'] : '' ?>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </form>
</div>