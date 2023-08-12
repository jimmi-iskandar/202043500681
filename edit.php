<?php 
session_start();
if ( !isset($_SESSION["login"]) ){

    header("Location: login.php");
    exit;
}

require "function.php";


if(isset($_POST["back"])){
    header("location: admin.php");
}

$id = $_GET["id"];

$tampil = query("SELECT * FROM TABELFILM WHERE ID = $id")[0];

if(isset ($_POST["submit"])){
    
    
    if ( ubah($_POST) > 0){
        echo "<script>
                alert('data berhasi diubah');
                document.location.href='admin.php';
        
            </script>";
    }else {
        echo "<script>
            alert('data gagal diubah');
            document.location.href='tambah.php';
        
            </script>";
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="regis.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
  <body>
    <div class="container justify-content-center">
      <div class="login-left w-100 h-100">
        <div class="row justify-content-center align-items-center mt-5 h-100">
            <div class="col-5 mt-5 border border-info rounded-4 bg-dark bg-opacity-75" style="color: white">
              <div class="header">
                  <h1>Ubah Data</h1>
              </div>
                  <form method="post" enctype="multipart/form-data">
                  <div class="login-form">
                    <input type="hidden" name="id" value="<?= $tampil["id"]?>">
                    <input type="hidden" name="filelama" value="<?= $tampil["cover"]?>">
                    <label for="judul" class="form-label">judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" require value="<?= $tampil["judul"];?>">
                    <label for="text" class="form-label">spoiler</label>
                    <input type="spoiler" class="form-control" id="spoiler" name="spoiler" value="<?= $tampil["spoiler"];?>">
                    <label for="harga" class="form-label">harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="<?= $tampil["harga"];?>">
                    <label for="gambar" class="form-label" >gambar</label>
                    <img src="gambar/upload/<?= $tampil['cover']; ?> "alt="gambar/upload/<?= $tampil['cover']; ?>" width="100"> <br>
                    <input type="file" name="cover" class="form-control"id="gambar"> 
                    
                      <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-lg col-5 m-2" name="submit">Ubah Data</button>
                        <button type="submit" class="btn btn-primary btn-lg col-5 m-2" name="back">Back</button>
                      </div>    
                  </div>
                  </form>
            </div>
        </div>
      </div>
    </div>
  
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>

