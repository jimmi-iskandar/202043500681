<?php 
session_start();
if ( !isset($_SESSION["login"]) ){

    header("Location: login.php");
    exit;
}

require "function.php";
//cek tombol sudah ditekan apa belom
if(isset($_POST["back"])){
    header("location: admin.php");
}
if(isset ($_POST["submit"])){
    
    //cek apakah data behasil di tambahkan atau tidak
    if ( tambah($_POST) > 0){
        echo "<script>
                alert('data berhasi ditambahkan');
                document.location.href='admin.php';
        
            </script>";
    }else {
        echo "<script>
            alert('data gagal ditambahkan');
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
    <form action="#"method="post" enctype="multipart/form-data">
    <div class="container justify-content-center">
    <div class="login-left w-100 h-100">
          <div class="row justify-content-center align-items-center mt-5 h-100">
            <div class="col-5 mt-5 border border-info rounded-4 bg-dark bg-opacity-75" style="color: white">
              <div class="header">
                  <h1>Tambah Data</h1>
              </div>
                <div class="login-form">
                    <label for="judul" class="form-label">judul</label>
                    <input type="text" class="form-control" id="judul" placeholder="judul" name="judul">
                    <label for="text" class="form-label">spoiler</label>
                    <input type="spoiler" class="form-control" id="spoiler" placeholder="spoiler" name="spoiler">
                    <label for="harga" class="form-label">harga</label>
                    <input type="number" class="form-control" id="harga" placeholder="harga" name="harga">
                    <label for="gambar" class="form-label" >gambar</label>
                    <input type="file" name="cover" class="form-control"id="gambar"> 
                    
                    <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg col-5 m-2" name="submit">Tambah Data</button>
                    <button type="submit" class="btn btn-primary btn-lg col-5 m-2" name="back">Back</button>
                    </div>
                    
                </div>
              </div>
            </div>
        </div>
    </div>
  
    </form>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>

