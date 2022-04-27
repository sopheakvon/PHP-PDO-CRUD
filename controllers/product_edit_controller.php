<?php
require_once '../models/product.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productName = $_POST['product-name'];
    $productPrice = $_POST['product-price'];
    $productId = $_POST['product-id'];
    $isProductExist = productNameExists($productName);
    $redirect = '';
    if (!$isProductExist) {
        updateProduct($productId,$productName, $productPrice);
        $redirect = 'Location: ../index.php';
    } else {
        error_log('Product already exist');
        $redirect = 'Location: ../views/product_edit_view.php?id=' . $productId;
    }
    header($redirect);
}
