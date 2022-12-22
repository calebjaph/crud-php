<?php

// CONFIG DB

include("./app/config/config.php");
include("./app/core/createProduct.php");

if (isset($_POST["createProduct"])) {

    $name = $_POST["name"];
    $brand = $_POST["brand"];
    $price = $_POST["price"];
    $url = $_POST["url"];
    $imageUrl = $_POST["urlImage"];
    $category = $_POST["category"];

    createProduct($name, $price, $category, $url, $brand, $imageUrl, $CONFIG);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Product Creation</title>
</head>

<body>
    <div class="container">
        <br><br>
        <h1>Product Creation</h1>
        <br>
        <form class="row g-3" action="" method="post" enctype="multipart/form-data">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Brand</label>
                <input type="text" class="form-control" name="brand">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Price</label>
                <input type="text" class="form-control" name="price">
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">URL Image</label>
                <input type="text" class="form-control" name="urlImage">
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">URL Page</label>
                <input type="text" class="form-control" name="url">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Categories</label>
                <select id="inputState" name="category" class="form-select">
                    <?php
                    $fetchCategories = "SELECT * FROM categories WHERE active = 1";
                    $result = mysqli_query($CONFIG, $fetchCategories);
                    while ($category = mysqli_fetch_array($result)) {
                        echo '<option>' . $category['name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" name="createProduct" class="btn btn-primary">Create Product</button>
            </div>
        </form>
    </div>
</body>

</html>