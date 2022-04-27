<?php require_once '../templates/header.php'; ?>
<link rel="stylesheet" href="../assets/css/main.css">
<div class="form-container">
    <form action="../controllers/product_add_controller.php" method="post">
        <input type="text" name="product-name" placeholder="Product Name">
        <input type="number" name="product-price" placeholder="Product Price">
        <button type="submit">Add Product</button>
    </form>
</div>
<?php require_once '../templates/footer.php'; ?>