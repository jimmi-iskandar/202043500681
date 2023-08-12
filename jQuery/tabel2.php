<?php 

require '../function.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM tabelfilm WHERE judul LIKE '$keyword%' OR harga LIKE'$keyword'";

$tabelfilm = query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="admin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body class="bg-dark">
<table class="table-dark  border border-info" id="container" >
        <?php
        $i=1;
        ?>

        <tr>
            <th>NO</th>
            <th>Alat</th>
            <th>Thumbnail</th>
            <th>Judul Film</th>
            <th>Description Film</th>
            <th>Harga</th>
        </tr>
        <?php foreach($tabelfilm as $tfilm): ?>
        <tr class=" border border-primary">
            <td class="p-4"><?= $i; ?></td>
            <td>
            <button type="button" class="btn btn-primary"><a href="edit.php?id=<?=$tfilm["id"];?>">edit</a></button>
            <button type="button" class="btn btn-primary"><a href="hapus.php?id=<?=$tfilm["id"];?>" onclick="return confirm('yakin?');">delete</a></button>
            </td>
            <td class="p-4">
              <div class="gambar">
              <img src="gambar/upload/<?= $tfilm['cover']; ?>">
              </div>
            </td> 
            <td class="p-4"><?= $tfilm['judul']; ?></td>
            <td class="p-4"><?= $tfilm['spoiler']; ?></td>
            <td class="p-4"><?= $tfilm['harga']; ?></td>    
            
        </tr>
           
        <?php $i++;
        endforeach ?>
    </table>
</body>
</html>