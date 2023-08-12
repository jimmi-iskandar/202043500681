<?php 

$con = mysqli_connect("localhost","root","","pwl");

function query($query){

    global $con;

        $result = mysqli_query($con, $query);
        $wadah =[];
        
        while($x = mysqli_fetch_assoc($result)){
            $wadah[]=$x;
        }


        return $wadah;
 }
 
 function registrasi($data){

    global $con;
 
    $username = strtolower(stripslashes($data["username"]));
    $email= strtolower(stripcslashes($data["email"]));
    $pass = mysqli_real_escape_string($con, $data["password"]);
    $pass2 = mysqli_real_escape_string($con, $data["password2"]);
    $status = mysqli_real_escape_string($con, $data["status"]);
 
    $wadah = mysqli_query($con,"SELECT email FROM user WHERE email ='$email'");
 
    if (mysqli_fetch_assoc($wadah)){
 
       echo "
          <script>
             alert ('username sudah ada');
          
          </script>
       ";
       return false;
    }
 
    if($pass !== $pass2){
 
       echo "
       <script>
             alert ('konfirmasi password tidak sesuai');
       </script>
       ";
       return false;
    }
    $pass1 = password_hash ($pass, PASSWORD_DEFAULT);
    mysqli_query($con, "INSERT INTO user VALUES ('','$username','$email','$pass1','$status')");
 
    return mysqli_affected_rows($con);
  }

  function tambah ($data){

   global $con;
   //ambil data dari tiap elemen form
   $judul = htmlspecialchars( $data["judul"]);
   $spoiler= htmlspecialchars($data["spoiler"]) ;
   //uploadgambar
   $cover= upload();
   if(!$cover){
     return false;
   }
   $harga =$data["harga"];

   $query= "INSERT INTO tabelfilm VALUES ('','$cover','$judul','$spoiler','$harga')";
   //query insert data
   mysqli_query($con,$query);

   return mysqli_affected_rows($con);

}
function upload(){
  $namafile=$_FILES['cover']['name'];
  $ukuranfile=$_FILES['cover']['size'];
  $error=$_FILES['cover']['error'];
  $tmpnama=$_FILES['cover']['tmp_name'];

  //cek apakah ada gambar yang diupload

  if($error===4){
     echo "
        <script>
        alert('pilih gambar terlebih dahulu');
        </script>
     ";
     return false;
     }
     //cek file adalah gambar
     $gambarvalid=['jpg','jpeg','png'];
     $namavalid= explode('.',$namafile);
     $namavalid= strtolower(end($namavalid)) ;
     if(!in_array($namavalid,$gambarvalid) ){

        echo "
        <script>
        alert('yang anda upload bukan gambar');
        </script>
     ";
     return false;
     }
   
     if ($ukuranfile > 1000000) {
        echo "
        <script>
        alert('ukuran gambar terlalu besar');
        </script>
     ";
     return false;
     }
   //   lolos pengecekan gambar
   //   generate nama baru
    $namafilebaru= uniqid();
    $namafilebaru .='.';
    $namafilebaru .= $namavalid;

    move_uploaded_file($tmpnama,'gambar/upload/' .$namafilebaru);

    return $namafilebaru;
}



// edit
function ubah($data){
   global $con;
    //ambil data dari tiap elemen form
    $id=$data["id"];
    $filelama = htmlspecialchars($data['filelama']);  

    $cover= htmlspecialchars($data["cover"]);
    if($_FILES['cover']['error']===4){
      $cover = $filelama;
    }else{
      $cover = upload();
      return false;
    }
    $judul = htmlspecialchars( $data["judul"]);
    $spoiler = htmlspecialchars($data["spoiler"]) ;
    $harga = htmlspecialchars($data["harga"]);
    $query = "UPDATE tabelfilm SET cover='$cover',judul='$judul',spoiler='$spoiler',harga='$harga' WHERE id= $id";
    //query insert data
    mysqli_query($con,$query);

    return mysqli_affected_rows($con);


 }
//  hapus
function hapus($id){
   global $con;
   mysqli_query($con,"DELETE FROM tabelfilm WHERE id = $id");
   
   return mysqli_affected_rows($con);

}
function cari($keyword){
   $query = "SELECT * FROM tabelfilm WHERE judul LIKE '$keyword%' OR harga LIKE'$keyword'";
   
   return query($query);

}
?>