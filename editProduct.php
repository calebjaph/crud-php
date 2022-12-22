<?php

// CONFIG DB

include("./app/config/config.php");
include("./app/core/editProduct.php");

if (isset($_POST["editProduct"])) {

    $name = $_POST["name"];
    $brand = $_POST["brand"];
    $price = $_POST["price"];
    $url = $_POST["url"];
    $imageUrl = $_POST["urlImage"];
    $category = $_POST["category"];
    $idProduct = $_GET["id"];

    editProduct($name, $price, $category, $url, $brand, $imageUrl, $idProduct, $CONFIG);
}

if (!isset($_GET["id"])) {
    header("location: http://localhost/crud/index.php");
}

$fetchProduct = "SELECT * FROM products WHERE id = $_GET[id]";
$result = mysqli_query($CONFIG, $fetchProduct);
while ($product = mysqli_fetch_array($result)) {

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
            <h1>Edit Product</h1>
            <small>Code Product: <b><?php
                                    if ($product['codeProduct'] === "N/A") {
                                        echo "Unregistered product 🚫";
                                    } else {
                                        echo $product['codeProduct'];
                                    }

                                    ?></b></small>
            <br>
            <br>
            <form class="row g-3" action="" method="post" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $product['nameProduct'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Brand</label>
                    <input type="text" class="form-control" name="brand" value="<?php echo $product['brand'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Price</label>
                    <input type="text" class="form-control" name="price" value="<?php echo $product['price'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">URL Image</label>
                    <input type="text" class="form-control" name="urlImage" value="<?php echo $product['imageUrl'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">URL Page</label>
                    <input type="text" class="form-control" name="url" value="<?php echo $product['urlProduct'] ?>">
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Categories</label>
                    <select id="inputState" name="category" class="form-select">
                        <?php
                        $fetchCategories = "SELECT * FROM categories WHERE active = 1 order by name = '$product[category]' desc";
                        $result = mysqli_query($CONFIG, $fetchCategories);
                        while ($category = mysqli_fetch_array($result)) {
                            echo '<option>' . $category['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" name="editProduct" class="btn btn-primary">Edit Product</button>
                </div>
            </form>
        </div>
    <?php } ?>
    </body>

    </html>