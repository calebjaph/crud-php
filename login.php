<?php

// CONFIG DB

include("./app/config/config.php");
include("./app/core/loginUser.php");


if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    login($username, $password, $CONFIG);
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
    <title>Login - CRUD</title>
</head>

<body>
    <div style="width: 30%; margin: 0 auto; margin-top: 15%">
        <h1><b>Login</b></h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" require>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" require>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>

</html>