<?php 
session_start();
require "function.php";

if(isset($_COOKIE["cookie"])){
  if($_COOKIE["cookie"]== 'true'){
    $_SESSION["login"] = true;
  }
}


if (isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}

if (isset ($_POST["signin"])){
  $email=$_POST["email"];
  $pass=$_POST["password"];
  $panggil=mysqli_query($con,"SELECT * FROM user WHERE email = '$email'");

  if(mysqli_num_rows($panggil)===1){

    $row=mysqli_fetch_assoc($panggil);
    if(password_verify($pass,$row["password"])){

      $_SESSION["login"]= true;

      if(isset($_POST['remember'])){
        setcookie("cookie","true", time()+60);

      }
        if($row["status"]=== "Admin"){
          
          header("location: admin.php");
          exit;
        }
        else{
          
          header("location: index.php");
          exit;
        }
        
          
    }
      
  }
  $error=true;
}
 ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <link rel="stylesheet" href="login.css">

</head>
<body>
<form action="#" method="post">

<section>
  <div class="form-box">
    
    <div class="form-value">
      <form action="">
      <h2>Iskandar Rental</h2>
        <h2>Login</h2>
        <div class="inputbox">
          <ion-icon name="mail-outline"></ion-icon>
          <input type="text" id ="email"name="email"required>
          <label for="email">Email</label>
        </div>
        <div class="inputbox">
          <ion-icon name="lock-closed-outline"></ion-icon>
          <input type="password" name="password" id="password"required>
          <label for="password">Password</label>
        </div>
        <?php if(isset($error)): ?>
          <h6 style="color: red; font-style: italic;">username atau password salah</h6>
        <?php endif ?>
        <div class="forget">
          <label>
            <input type="checkbox" name="remember"> Remember me
          </label>
        </div>
        <button type="submit" name="signin">Log in</button>
        <div class="register">
          <p>Don't have a account ? <a href="registrasi.php">Register</a></p>
        </div>
      </form>
    </div>
  </div>
</section>

</form>

<!-- partial
  <script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js'></script>
<script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js'></script> -->
</body>
</html>
