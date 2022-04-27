<link rel="stylesheet" href="assets/css/main.css">
<div class="add">
    <a href="views/product_add_view.php">Add Product +</a>
</div>
<div class="container">
    <?php
    require_once 'models/product.php';
    $products = getProducts();
    foreach ($products as $product) :
    ?>
        <div class="card">
            <h1><?= $product['name'] ?></h1>
            <h2><?= $product['price'] ?> $</h2>
            <a href="views/product_edit_view.php?id=<?= $product['pro_id'] ?>" class="action orange">Edit</a>
            <a href="controllers/product_remove_controller.php?id=<?= $product['pro_id'] ?>" class="action red">Remove</a>
        </div>
    <?php endforeach; ?>
</div>