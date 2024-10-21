<?php
require_once __DIR__ . "/connection.php";

if (isset($_POST["submit"])) {
    $email = $_POST["txt_email"];
    $password = $_POST["txt_password"];
    $name = $_POST["txt_name"];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user_detail VALUES(NULL, '$email', '$passwordHash', '$name', 3)";
    $result = mysqli_query($koneksi, $sql);

    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <form action="register.php" method="post">
        <p>Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" name="txt_email"></p>
        <p>Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="password" name="txt_password"></p>
        <p>Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" name="txt_name"></p>
        <button type="submit" name="submit">Sign Up</button>
    </form>
</body>

</html>