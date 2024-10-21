<?php

require_once __DIR__ . "/connection.php";
if (isset($_POST["submit"])) {
    $userId = $_POST["txt_id"];
    $userMail = $_POST["txt_email"];
    $userPass = $_POST["txt_password"];
    $userName = $_POST["txt_name"];

    $userPassHash = password_hash($userPass, PASSWORD_DEFAULT);

    $query = "UPDATE user_detail SET user_password ='$userPassHash', user_fullname='$userName' WHERE id='$userId'";
    echo $query;
    $result = mysqli_query($koneksi, $query);
    header("Location: home.php");
    exit();
}
$id = $_GET["id"];
$query = "SELECT * FROM user_detail WHERE id='$id'";
$result = mysqli_query($koneksi, $query);

while ($row = mysqli_fetch_array($result)) {
    $id = $row["id"];
    $userMail = $row["user_email"];
    $userPass = $row["user_password"];
    $userName = $row["user_fullname"];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <form action="edit.php" method="post">
            <p><input type="hidden" name="txt_id" value="<?= $id; ?>"></p>
            <p>Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" name="txt_email" value="<?= $userMail ?>" readonly></p>
            <p>Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="password" name="txt_password" value="<?= $userPass ?>"></p>
            <p>Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" name="txt_name" value="<?= $userName ?>"></p>
            <button type="submit" name="submit">Update</button>
        </form>
        <p><a href="home.php">Kembali</a></p>
    </body>

    </html>
<?php } ?>