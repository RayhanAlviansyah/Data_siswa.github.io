<?php
    session_start();
    $buttonHapus = null;
    $Buttonprint = null;

    $dataSiswa = null;
    if(isset($_POST["btn"])){
        $nama = $_POST["nama"];
        $nis = $_POST["nis"];
        $rayon = $_POST["rayon"];
        $dataAwal = false;


        if(isset($_SESSION["data_siswa"])) {
            foreach($_SESSION["data_siswa"] as $data) {
                if($data ["nis"] == $nis ){
                    $dataAwal = true;
                    break;
                }
            }
        }

        if($dataAwal) {
            echo'<div class="alert alert-danger" role="alert">
            Data Sudah ada
        </div>';
        }else {
            $_SESSION["data_siswa"][] = [
                "nama" => $nama,
                "nis" => $nis,
                "rayon" => $rayon
            ];
        }
    }


    if(isset($_SESSION["data_siswa"]) && !empty($_SESSION["data_siswa"])) {
        $buttonHapus = '<a href="hapusALL.php"><button type="submit">ALL</button></a>';
        $Buttonprint = '<a href="print.php"><button type="submit">print</button></a>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Halaman Index</title>
</head>

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

.alert {
    padding: 15px;
    background-color: #f44336;
    color: white;
    margin-bottom: 15px;
    border-radius: 5px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 12px;
    border: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
    font-weight: bold;
}

a {
    text-decoration: none;
    color: #007bff;
}

a:hover {
    text-decoration: underline;
}

    </style>

<body>
<div class = "container">

<form action="" method="post">
    <div style="display: flex; justify-content: space-between;">
        <div style="flex: 1; margin-right: 10px;">
            <label for="nama">Nama Siswa</label>
            <input type="text" name="nama" id="nama" required>
        </div>
        <div style="flex: 1; margin-right: 10px;">
            <label for="nis">Nis</label>
            <input type="number" name="nis" id="nis" required>
        </div>
        <div style="flex: 1;">
            <label for="rayon">Rayon</label>
            <input type="text" name="rayon" id="rayon" required>
        </div>
    </div>
    <button type="submit" name="btn" id="btn">Input Data</button>
</form>
        <?= $buttonHapus; ?>
        <?= $Buttonprint; ?>

    <table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Nis</th>
        <th>Rayon</th>
        <th>aksi</th>
    </tr>
    <?php $i = 1;?>
    <?php if(isset($_SESSION["data_siswa"]) && is_array($_SESSION["data_siswa"])):?>
    <?php foreach ($_SESSION["data_siswa"] as $key => $item) :?>
    <tr>
        <td><?= $i++;?></td>
        <td><?= htmlspecialchars($item["nama"]) ?></td>
        <td><?= htmlspecialchars($item["nis"] )?></td>
        <td><?= htmlspecialchars($item["rayon"]) ?></td>
        <td><a href="hapus.php?id=<?= $key ; ?>">Hapus</a>
        <br><a href="detail.php?id=<?= $key ; ?>">Detail</a>
        <br><a href="edit.php?id=<?= $key ; ?>">Edit</a></td>
    </tr>
    <?php endforeach;?>
    <?php endif; ?>
</table>
</div>
</body>
</html>

