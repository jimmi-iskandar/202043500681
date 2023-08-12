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
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
  <body>
  <form action="" method="post">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container ">
    <a class="navbar-brand" href="#">Iskandar DVD</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item d-flex">
        <input class="form-control me-2" type="text" name="keyword" placeholder="Search" aria-label="Search" 
        autofocus autocomplete="off" id="keyword">
        <button class="btn btn-outline-success" type="submit" name="cari" id="tombolcari">Search</button>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Log out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="p-3 bg-info bg-opacity-10 border border-info border-start-0  text-center mt-4" style="color: white">
<h5>Welcome to Rental DVD Iskandar </h5>
</div>
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="gambar/thumbnail.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="gambar/thumbnail2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="gambar/thumbnail3.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="gambar/thumbnail4.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
</div>

<!-- akhir -->
<div class="p-3 bg-info bg-opacity-10 border border-info border-start-0  text-center" style="color: white">
  <h5>Choose Your Faforit Movie</h5>
</div>


<div class="container mt-4">
<div class="col-15">
  <!-- awal -->
  <div class="container mt-5 text-center ">
    <div class="row gy-5 ms-5 mx-auto " id="container">
    <?php foreach($tabelfilm as $tfilm) : ?>
        <div class="card m-3 border border-info" style="width: 18rem; color: white; background-color: #000000" >
            <img src="gambar/upload/<?= $tfilm['cover'];?>" class="card-img-top mt-2" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?=$tfilm['judul'];?></h5>
                <p class="card-text" style="font-size: 10px"><?= $tfilm['spoiler'];?></p>
                <p class="card-text" style="font-size: 10px">Rp :<?= $tfilm['harga'];?></p>
                <a href="https://wa.me/628156805304?text=Halo%20saya%20ingin%20Memesan%20Film%20<?=$tfilm['judul'];?>%20Harga%20Rp%20:%20<?= $tfilm['harga'];?>" target="_blank" class="btn btn-dark">Checkout</a>
              </div>
          </div>
      <?php endforeach ?>
    </div>
  </div>
  </div>
  </div>
  </form>
      <script src="js/code.jquery.com_jquery-3.7.0.min.js"></script>
      <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>