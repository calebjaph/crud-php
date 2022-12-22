<?php

// CONFIG DB

include("./app/config/config.php");
include("./app/helpers/tableContent.php");

if (!isset($_SESSION["user_id"])) {
    header("location: login.php");
    session_destroy();
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
    <title>CRUD - PHP</title>
</head>

<body>
    <div style="width: 95%; margin: 0 auto;">
        <br>
        <h1><b>CRUD</b> Basic</h1>
        <small>Product System made in PHP | Order by Price</small> <br><br>
        <a href="createProduct.php">
            <button type="button" class="btn btn-primary">Add Product</button>
        </a>

        <br><br>
        <?php TableProducts($CONFIG); ?>

    </div>
    <br><br><br>
</body>

</html>