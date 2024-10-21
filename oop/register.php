<?php
require_once __DIR__ . "/Koneksi.php";
require_once __DIR__ . "/query.php";

$obj = new crud;

if ($_SERVER["REQUEST_METHOD"] == "POST") :
    $email = $_POST["txt_email"];
    $pass = $_POST["txt_pass"];
    $name = $_POST["txt_name"];

    $passHash = password_hash($pass, PASSWORD_DEFAULT);
    if ($obj->insertData($email, $passHash, $name)) :
        echo '<div class="alert-success">Data berhasil disimpan</div>';
    else:
        echo '<div class="alert-success">Data gagal disimpan</div>';
    endif;
endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
        <p>Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="email" name="txt_email" require></p>
        <p>Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="password" name="txt_pass" require></p>
        <p>Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" name="txt_name" require></p>
        <button type="submit" name="submit">Register</button>
    </form>
    <a href="login.php">Sudah punya akun?login</a>
</body>

</html>