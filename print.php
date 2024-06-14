<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print page</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 16px;
            text-align: left;
        }

        th, td {
            padding: 8px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        button[type="button"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        button[type="button"]:hover {
            background-color: #0056b3;
        }

        @media print {
            button[type="button"] {
                display: none;
            }
        }
    </style>

</head>
<body>
<a href="index.php"><button type="button">Go Back</button></a>
<button type="button" id="printBtn">Print</button>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIS</th>
            <th>Rayon</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php if(isset($_SESSION["data_siswa"]) && is_array($_SESSION["data_siswa"])):?>
        <?php foreach ($_SESSION["data_siswa"] as $key => $item) :?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= htmlspecialchars($item["nama"]) ?></td>
            <td><?= htmlspecialchars($item["nis"] )?></td>
            <td><?= htmlspecialchars($item["rayon"]) ?></td>
        </tr>
        <?php endforeach;?>
        <?php endif; ?>
    </tbody>
</table>
<script>
    document.getElementById('printBtn').addEventListener('click', function(){ 
        window.print();
    });
</script>
</body>
</html>
