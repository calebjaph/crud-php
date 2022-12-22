<?php

function editProduct($name, $price, $category, $url, $brand, $imageUrl, $idProduct, $config)
{
    $sql = "UPDATE products SET nameProduct = '$name', price = '$price', category = '$category', 
    imageUrl = '$imageUrl', brand = '$brand', urlProduct = '$url' WHERE id = $idProduct";

    $query = $config->query($sql);
    if ($query != null) {
        header("location: http://localhost/crud/index.php");
    } else {
        echo '<div class="alert alert-danger" role="alert">Error Description ' . mysqli_error($config) . '</div>';
    }
}
