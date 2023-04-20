<?php
    session_start();
    require "koneksi.php";
    $username = $_SESSION['username'];
    if($username == '' ){
        header('location:../login.php');
    }else{
    if(isset($_POST["tambah"])){
        $judul = $_POST["judul"];
        $tanggal = $_POST["tanggal"];
        $isi = $_POST["isi"];
        $target_dir = "uploads/";
        // Definisikan nama file dan path-nya
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Hanya file gambar yang diperbolehkan.";
            exit;
        }
        
        // Pindahkan file yang diupload ke direktori yang dituju
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            // Simpan alamat gambar ke database
            $query = "INSERT INTO berita VALUES('', '$username' ,'$target_file', '$judul', '$tanggal', '$isi')";
            if (mysqli_query($conn, $query)) {
                echo "Gambar berhasil diunggah.";
            } else {
                echo "Terjadi kesalahan saat menyimpan data ke database.";
            }
        } else {
            echo "Terjadi kesalahan saat mengunggah gambar.";
        }
        echo "<script>
            alert('Berhasil');
            document.location.href='../index.php';    
        </script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>COFFEE</title>
<link rel="stylesheet" href="../assets/style.css">
<script src="https://kit.fontawesome.com/5c90e171df.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
crossorigin="anonymous">
</head>
<body>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-white" style="margin-bottom:5px;">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">
        <img src="../assets/Image/icon.png" style="width:180px;" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown" style="font-weight:bold;">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php">Beranda</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../main/menu.php">Berita</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Profile
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
            </ul>
        </li>
        </ul>
    </div>
    </div>
</nav>
</header>
<body>
<div class="container">
    <h1 style="text-align:center; margin-bottom:5px;">Tambah Data</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="gambar" accept=".gif,.jpg,.jpeg,.png">
        <br>
        Judul
        <input type="text" name="judul">
        <br>
        Tanggal
        <input type="date" name="tanggal">
        <br>
        Isi
        <textarea name="isi" style="width:100%;" rows="40" id="isi"></textarea>
        <br>
        <button class="btn btn-success" type="submit" name="tambah" style="margin:10px; float:right;">Upload</button>
        <!-- <button type="submit" name="tambah">Tambah</button> -->
    </form>
<?php }?>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet"> 
<footer style="margin-left:50px; margin-top:10%;">
  <div class="footers container-fluid" style="padding-left:50px; padding-bottom:10%;">
    <div class="row justify-content-center">
      <div class="col-sm-4">
        <img src="../assets/Image/icon.png" style="width:180px;" alt="">
        <br>
        <a style="font-size:medium;">Puji syukur kita panjatkan Kehadirat Tuhan Yang Maha Esa sehubungan dengan telah berfungsinya Website Kejaksaan Tinggi Kalimantan Timur yang merupakan salah satu langkah upaya penerapan teknologi informasi menuju reformasi birokrasi kejaksaan untuk Indonesia lebih maju.</a>
      </div>
      <div class="col-md-3">
        <h6 style="font-weight: bold; font-size:larger;">Kontak Kami</h6>
        <ul class="social-icons">
          <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a>@username</li>
          <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
          <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
        </ul>
      </div>
      <div class="col-md-2">
        <h6 style="font-weight: bold; font-size:larger;">Alamat</h6>
        <ul class="footer-links">
          <a href="" style="text-decoration:none; color:black;">Lokasi</a>
        </ul>
      </div>
      <div class="col-md-3">
        <h6 style="font-weight: bold; font-size:larger;">Permohonan Informasi</h6>
        <ul class="footer-links">
          <a href="" style="text-decoration:none; color:black;">PPID</a>
        </ul>
      </div>
    </div>
  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
crossorigin="anonymous"></script>
</body>
