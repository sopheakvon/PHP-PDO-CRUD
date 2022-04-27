<?php

require_once 'database.php';

/**
 * Create a product 
 * @param string $name :  		the product name
 * @param integer $price :  		the product price
 
 * @return true if deletion was successful, false otherwise
 */
function addProduct($name, $price)
{
    global $database;
    $query = "INSERT INTO products(name, price) VALUES (:name, :price)";
    $values = [":name" => $name, ":price" => $price];
    $statement = $database->prepare($query);
    $statement->execute($values);

    return $statement->rowCount() > 0;
}
/**
 * Get all products  
 * @return array of products 
 */
function getProducts()
{
    global $database;
    $query = "SELECT * FROM products ORDER BY pro_id DESC";
    $statement = $database->prepare($query);
    $statement->execute();

    return $statement->fetchAll();
}
/**
 * Get a single product
 * @param integer $id :  the product id
 * @return the product related to given product id
 */
function getProductById($id)
{
    global $database;
    $query = "SELECT * FROM products WHERE pro_id = :id";
    $values = [":id" => $id];
    $statement = $database->prepare($query);
    $statement->execute($values);

    return $statement->fetch();
}

/**
 * Update a product given its id and attibutes
 * @param integer $id :  		the product id
 * @param string $name :  		the product name
 * @param integer $price :  		the product price
 
 * @return true if deletion was successful, false otherwise
 */
function updateProduct($id, $name, $price)
{
    global $database;
    $query = "UPDATE products SET name = :name, price = :price WHERE pro_id = :id";
    $values = [":name" => $name, ":price" => $price, ":id" => $id];
    $statement = $database->prepare($query);
    $statement->execute($values);

    return $statement->rowCount() > 0;
}
/**
 * Remove   product related to given product id
 * @param integer $id :  the product id
 * @return true if deletion was successful, false otherwise
 */

function removeProduct($id)
{
    global $database;
    $query = "DELETE FROM products WHERE pro_id = :id";
    $values = [":id" => $id];
    $statement = $database->prepare($query);
    $statement->execute($values);

    return $statement->rowCount() > 0;
}

/**
 * Check product name existing in the database
 * @param string $productName :  the product name
 * @return true if product was existing, false otherwise
 */
function productNameExists($productName)
{
    global $database;
    $query = "SELECT * FROM products WHERE name = :name";
    $values = [":name" => $productName];
    $statement = $database->prepare($query);
    $statement->execute($values);
    $row = $statement->fetch();
    $isExist = false;
    if ($row != '')
    {
        $isExist = sizeof($row) > 0;
    }
    return $isExist;
}