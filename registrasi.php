<?php 

require "function.php";
if(isset($_POST["back"])){
    header("location: login.php");
}
if (isset ($_POST["regis"])){

    if (registrasi($_POST) > 0){
        echo "
        <script>
        alert ('berhasil registrasi');
        </script>
        ";
        header ("location: login.php");
    }else {

        echo mysqli_error($con);
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
    <form action="#"method="post">
    <div class="container justify-content-center">
    <div class="login-left w-100 h-100">
          <div class="row justify-content-center align-items-center mt-5 h-100">
            <div class="col-5 mt-5 border border-info rounded-4 bg-dark bg-opacity-75" style="color: white">
              <div class="header">
                  <h1>Halaman Registrasi</h1>
              </div>
                <div class="login-form">
                    <label for="Username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="Username" placeholder="username" name="username">
                    <label for="email" class="form-label">email</label>
                    <input type="email" class="form-control" id="email" placeholder="email" name="email">
                    <label for="password" class="form-label">Password</label>
                    <input type="Password" class="form-control" id="password" placeholder="password" name="password">
                    <label for="password2" class="form-label">Konfirmasi password</label>
                    <input type="password" class="form-control" id="password2" placeholder="Konfirmasi" name="password2">
                    <div class="mb-3">
                      <label for="disabledSelect" class="form-label">Daftar Sebagai :</label>
                      <select id="disabledSelect" class="form-select" name ="status">
                        <option value="Admin">Admin</option>
                        <option value="user">User</option>
                      </select>
                    </div>
                    
                    <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg col-5 m-2" name="regis">Registrasi</button>
                    <button type="submit" class="btn btn-primary btn-lg col-5 m-2 " name="back">Back</button>
                        <!-- <button type="submit" class="regis" name="regis">Registrasi</button>
                        <button type="submit" class="regis" name="back">Back</button> -->
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