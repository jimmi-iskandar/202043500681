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
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body class="bg-dark">
<div class="container mt-4">
<div class="col-15">
  <div class="container mt-5 text-center ">
    <div class="row gy-5 ms-5 mx-auto " id="container">
    <?php foreach($tabelfilm as $tfilm) : ?>
        <div class="card m-3 border border-info" style="width: 18rem; color: white; background-color: #000000" >
            <img src="gambar/upload/<?= $tfilm['cover'];?>" class="card-img-top mt-2" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?=$tfilm['judul'];?></h5>
                <p class="card-text" style="font-size: 10px"><?= $tfilm['spoiler'];?></p>
                <a href="#" class="btn btn-dark">Go somewhere</a>
              </div>
          </div>
      <?php endforeach ?>
    </div>
  </div>
  </div>
  </div>
</body>
</html> 