<?php
session_start();

if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $value = null;

    foreach($_SESSION["data_siswa"] as $key => $data) {
        if ($key == $id){
            $value = $data;
        }
    }

    if($value == null){
        header("Location: index.php");
        exit;
    }
}

if(isset($_POST["btn"])) {

    $nama = $_POST["nama"];
    $nis = $_POST["nis"];
    $rayon = $_POST["rayon"];

    $_SESSION["data_siswa"][$id] = [
        "nama" => $nama,
        "nis" => $nis,
        "rayon" => $rayon
    ];

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Gaya untuk tombol "Go Back" */
        button[type="button"] {
            background-color: #6c757d;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="button"]:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
<div class="container">
    <form action="" method="post">
        <label for="nama">Nama Siswa</label>
        <input type="text" name="nama" id="nama" value="<?= $value["nama"]; ?>" required>

        <label for="nis">NIS</label>
        <input type="number" name="nis" id="nis" value="<?= $value["nis"]; ?>" required>

        <label for="rayon">Rayon</label>
        <input type="text" name="rayon" id="rayon" value="<?= $value["rayon"]; ?>" required>

        <a href="index.php"><button type="button">Go Back</button></a>
        <button type="submit" name="btn" id="btn">Update Data</button>

    </form>
</div>
</body>
</html>
