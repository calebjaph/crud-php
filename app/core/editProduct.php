<?php

function editProduct($name, $price, $category, $url, $brand, $imageUrl, $idProduct, $config)
{
    $fetchProduct = "SELECT * FROM products WHERE id = $idProduct";
    $result = mysqli_query($config, $fetchProduct);
    while ($product = mysqli_fetch_array($result)) {

        if ($product['codeProduct'] === "N/A") {

            $randomString = uniqid();

            $sql = "UPDATE products SET nameProduct = '$name', price = '$price', category = '$category', imageUrl = '$imageUrl', brand = '$brand', urlProduct = '$url', codeProduct = '$randomString' WHERE id = $idProduct";

            $query = $config->query($sql);
            if ($query != null) {
                header("location: http://localhost/crud/index.php");
            } else {
                echo '<div class="alert alert-danger" role="alert">Error Description ' . mysqli_error($config) . '</div>';
            }
        } else {

            $sql = "UPDATE products SET nameProduct = '$name', price = '$price', category = '$category', imageUrl = '$imageUrl', brand = '$brand', urlProduct = '$url' WHERE id = $idProduct";

            $query = $config->query($sql);
            if ($query != null) {
                header("location: http://localhost/crud/index.php");
            } else {
                echo '<div class="alert alert-danger" role="alert">Error Description ' . mysqli_error($config) . '</div>';
            }
        }
    }
}
