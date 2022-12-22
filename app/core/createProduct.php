<?php

function createProduct($name, $price, $category, $url, $brand, $imageUrl, $stock, $config)
{
    $randomString = uniqid();

    $sql = "INSERT INTO products(nameProduct, brand, imageUrl, price, category, urlProduct, codeProduct, stock, creationDate) 
    VALUE (\"$name\", \"$brand\", \"$imageUrl\", \"$price\", \"$category\", \"$url\", \"$randomString\", \"$stock\", NOW())";

    $query = $config->query($sql);
    if ($query != null) {
        header("location: http://localhost/crud/index.php");
    } else {
        echo '<div class="alert alert-danger" role="alert">Error Description ' . mysqli_error($config) . '</div>';
    }
}
