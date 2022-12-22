<?php

function createProduct($name, $price, $category, $url, $brand, $imageUrl, $config)
{
    $found = false;
    $queryDB = "select * from products where nameProduct=\"$name\" ";
    $query = $config->query($queryDB);
    while ($r = $query->fetch_array()) {
        $found = true;
        break;
    }
    if ($found) {
        header("location:  http://localhost/crud/createProduct.php?response=error");
    } else {
        $sql = "insert into products(nameProduct, brand, imageUrl, price, category, urlProduct, creationDate) 
          value (\"$name\", \"$brand\", \"$imageUrl\", \"$price\", \"$category\", \"$url\", NOW())";
        $query = $config->query($sql);
        if ($query != null) {
            header("location: http://localhost/crud/index.php");
        } else {
            echo "error";
        }
    }
}
