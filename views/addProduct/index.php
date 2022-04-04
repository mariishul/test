<?php
use models\Product;
use controllers\ParamsOfProductsController;

$title = 'Product Add';
include_once(__DIR__ . "/../header.php");

?>

<form action="/save" method="post" class="form" id="product_form">
    <p>
        <input type="submit" class="btn btn-primary my-2" value="Save" name="save">
        <a href="/" class="btn btn-secondary my-2">Cancel</a>
    </p>

    <div class="mb-3">
        <label for="sku" class="form-label">SKU</label>
        <input class="form-control"  id="sku" type="text" name="sku" required>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input class="form-control"  id="name" type="text" name="name" required>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price ($)</label>
        <input class="form-control"  id="price" type="text" name="price">
    </div>

    <label for="type" class="form-label">Type Switcher</label>
    <select name="select" id="productType" class="form-select" onchange="switcher(this)" required>
        <option  label="Please select" value="" selected disabled hidden autocomplete="off">Please select</option>
        <option value="1" >DVD</option>
        <option value="2">Book</option>
        <option value="3">Furniture</option>
    </select>

    <div id="selection1" class="selection">
        <div class="mb-3">
            <label for="dvd" class="form-label">Size (MB)</label>
            <input class="form-control"  id="size" type="text" name="size">
        </div>
        <div>Please provide product size.</div>
    </div>

    <div id="selection2" class="selection">
        <div class="mb-3">
            <label for="weight" class="form-label">Weight (KG)</label>
            <input class="form-control"  id="weight" type="text" name="weight">
        </div>
        <div>Please provide product weight.</div>
    </div>


    <div id="selection3" class="selection">
    <div class="mb-3">
        <label for="height" class="form-label">Height (CM)</label>
        <input class="form-control"  id="height" type="text" name="height">
    </div>
    <div class="mb-3">
        <label for="width" class="form-label">Width (CM)</label>
        <input class="form-control"  id="width" type="text" name="width">
    </div>
    <div class="mb-3">
        <label for="length" class="form-label">Length (CM)</label>
        <input class="form-control"  id="length" type="text" name="length">
    </div>
        <div>Please provide product dimensions.</div>
    </div>
</form>

<?php include_once(__DIR__ . "/../footer.php"); ?>

