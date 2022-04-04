<?php
use models\Product;
use controllers\ParamsOfProductsController;
$title = 'Product List';
include_once(__DIR__ . "/../header.php");

?>
<form action="/delete" method="post">
<p>
    <a href="/add-product" id="delete-product-btn" class="btn btn-primary my-2">ADD</a>
    <input type="submit" class="btn btn-secondary my-2" value="MASS DELETE" name="delete">
</p>


<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            <?php foreach($productList as $product): ?>
    <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
            <input class="delete-checkbox" type="checkbox" name="sku[]" value="<?= $product['sku']; ?>">
            <div class="card-body">
                <ul class="list-unstyled mt-3 mb-4">
                    <li><?= $product['sku'] ?></li>
                    <li><?= $product['name'] ?></li>
                    <li><?=  number_format($product['price'], 2, '.',' '); ?>$</li>
                    <li><?= $product ['description']?></li>
                </ul>
            </div>
        </div>
    </div>
                <?php endforeach; ?>

</div>
</form>

<?php include_once(__DIR__ . "/../footer.php"); ?>
