<?php

function login($username, $password, $config)
{
    $password = md5($_POST["password"]);
    $user_id = null;
    $sql1 = "select * from users where (username=\"$username\" and pass=\"$password\")";

    $query = $config->query($sql1);
    while ($r = $query->fetch_array()) {
        $user_id = $r["id"];
        break;
    }
    if ($user_id == null) {
        header("location: index.php?response=notFound");
    } else {
        session_start();
        $_SESSION["user_id"] = $user_id;
        setcookie("Session", $user_id);
        header("location: index.php");
    }
}
