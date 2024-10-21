<?php

require_once __DIR__ . "/Koneksi.php";
require_once __DIR__ . "/query.php";

$obj = new crud;

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["txt_email"];
    $password = $_POST["txt_password"];

    if (!empty(trim($email)) && !empty(trim($password))) {
        $num = 0;
        if ($row = $obj->getDataByEmail($email)) {
            $id = $row["id"];
            $user_email = $row["user_email"];
            $user_fullname = $row["user_fullname"];
            $user_password = $row["user_password"];
            $level = $row["level"];
            $num++;
        }

        if ($num != 0) {
            if (password_verify($password, $user_password)) {
                header("Location: home.php");
            } else {
                $error = "User atau password salah";
                echo $error;
            }
        } else {
            $error = "User tidak ditemukan";
            echo $error;
        }
    } else {
        $error = "Data tidak boleh kosong";
        echo $error;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
        <p>Email &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="text" name="txt_email"></p>
        <p>Password &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="password" name="txt_password"></p>
        <button type="submit" name="submit">Sign In</button>
    </form>
</body>

</html>