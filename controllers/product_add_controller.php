<?php
require_once '../models/product.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productName = $_POST['product-name'];
    $productPrice = $_POST['product-price'];
    $isProductExist = productNameExists($productName);
    $redirect = '';
    if (!$isProductExist) {
        addProduct($productName, $productPrice);
        $redirect = 'Location: ../index.php';
    } else {
        error_log('Product already exist');
        $redirect = 'Location: ../views/product_add_view.php';
    }
    header($redirect);
}
