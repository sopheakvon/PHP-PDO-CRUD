<?php require_once '../templates/header.php'; ?>
<link rel="stylesheet" href="../assets/css/main.css">
<div class="form-container">
    <?php 
        require_once '../models/product.php';
        $productId = $_GET['id'];
        $product = getProductById($productId);
    ?>
    <form action="../controllers/product_edit_controller.php" method="post">
        <input type="hidden" name="product-id" value="<?= $product['pro_id'] ?>">
        <input type="text" name="product-name" placeholder="Product Name" value="<?= $product['name'] ?>">
        <input type="number" name="product-price" placeholder="Product Price" value="<?= $product['price'] ?>">
        <button type="submit" class="btn">Edit Product</button>
    </form>
</div>
<?php require_once '../templates/footer.php'; ?>