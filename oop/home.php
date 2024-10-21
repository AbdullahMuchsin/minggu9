<?php
require_once __DIR__ . "/koneksi.php";
require_once __DIR__ . "/query.php";
$name = isset($_GET["user_fullname"]) ? $_GET["user_fullname"] : "";
$obj = new crud;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <h1>Selamat datang <?= $name ?></h1>
    <table border="1" cellpadding="5">
        <tr>
            <td>No</td>
            <td>Email</td>
            <td>Nama</td>
            <td></td>
        </tr>
        <?php
        $data = $obj->lihatData();
        $no = 1;
        foreach ($data as $dt) : ?>
            <tr>
                <td><?= ++$no ?></td>
                <td><?= $dt["user_email"] ?></td>
                <td><?= $dt["user_fullname"] ?></td>
                <td>
                    <a href="edit.php?id=<?= $dt["id"]; ?>">Edit</a>
                    <a href="hapus.php?id=<?= $dt["id"]; ?>">Hapus</a>
                </td>
            </tr>
        <?php
        endforeach;
        ?>
    </table>

</body>

</html>