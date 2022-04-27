<?php

require_once '../models/product.php';
$productId = $_GET['id'];

$isDeleted = removeProduct($productId);

if ($isDeleted)
{
    header('Location: ../index.php');
}