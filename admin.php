<?php 
session_start();
require "function.php";

if ( !isset($_SESSION["login"]) ){

    header("Location: login.php");
    exit;
}

$tabelfilm = query("SELECT * FROM tabelfilm"); 

if(isset($_POST["cari"])){
  
    $tabelfilm = cari($_POST["keyword"]);

};
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="admin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    
</head>
  <body class="bg-dark">
  <form action="" method="post">
  <div class="p-3 bg-info bg-opacity-10 border border-info border-start-0  text-center" style="color: white">
  <h5>EDIT YOUR WEBSITE</h5>
  <div class="d-flex col-6 m-auto" role="search">
        <input class="form-control me-2" type="text" name="keyword" placeholder="Search" 
        aria-label="Search" autofocus autocomplete="off" id="keyword">
        <button class="btn btn-outline-success" type="submit" name="cari" id="tombolcari">Search</button>
  </div>
</div>
    <div class="container-fluid mt-5 ms-5">
    <button type="submit" class="btn btn-primary ms-auto mb-5"><a href="tambah.php">Tambah Data</a></button>
    <button type="submit" class="btn btn-primary ms-auto mb-5"><a href="logout.php">log out</a></button>
    
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
    </div>
  </form>


    <script src="js/code.jquery.com_jquery-3.7.0.min.js"></script>
    <script src="js/script2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    
  </body>
</html>