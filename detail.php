<?php
session_start();
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $detail = null;

    foreach($_SESSION["data_siswa"] as $key => $data){
        if ($key == $id){
            $detail = $data;
        }
    }

    if($detail == null){
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            text-align: left;
        }

        h3 {
            margin-bottom: 10px;
            color: #007bff;
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
    </style>
</head>
<body>
<div class="container">
    <a href="index.php"><button type="submit">Go Back</button></a>

    <h3>Detail Siswa</h3>
    <table>
        <tr>
            <th>Nama</th>
            <td><?= $detail["nama"]; ?></td>
        </tr>
        <tr>
            <th>NIS</th>
            <td><?= $detail["nis"]; ?></td>
        </tr>
        <tr>
            <th>Rayon</th>
            <td><?= $detail["rayon"]; ?></td>
        </tr>
    </table>
</div>
</body>
</html>
