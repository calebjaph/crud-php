<?php

function createProduct($name, $price, $category, $url, $brand, $imageUrl, $config)
{
    $randomString = uniqid();

    $sql = "INSERT INTO products(nameProduct, brand, imageUrl, price, category, urlProduct, codeProduct, creationDate) 
          VALUE (\"$name\", \"$brand\", \"$imageUrl\", \"$price\", \"$category\", \"$url\", \"$randomString\", NOW())";

    $query = $config->query($sql);
    if ($query != null) {
        header("location: http://localhost/crud/index.php");
    } else {
        echo '<div class="alert alert-danger" role="alert">Error Description ' . mysqli_error($config) . '</div>';
    }
}
