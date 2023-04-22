<?php
    session_start();
    require "../db/koneksi.php";
    $username = $_SESSION['username'];
    if($username == '' ){
        header('location:../login.php');
    }else{
    if(isset($_POST["tambah"])){
        $judul = $_POST["judul"];
        $tanggal = $_POST["tanggal"];
        $isi = $_POST["isi"];
        // Simpan alamat gambar ke database
        $query = "UPDATE profile_text SET Waktu = '$tanggal', Isi = '$isi' WHERE jenis='$judul'";
        if (mysqli_query($conn, $query)) {
            echo "<script>
                alert('Berhasil');
                document.location.href='../index.php';    
            </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>KEJAKSAAN</title>
<link rel="stylesheet" href="../assets/style.css">
<script src="https://kit.fontawesome.com/5c90e171df.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
crossorigin="anonymous">
</head>
<body>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-white" >
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
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Bidang
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="../bidang/pembinaan.php">Pembinaan</a></li>
        <li><a class="dropdown-item" href="../bidang/intelijen.php">Intelijen</a></li>
        <li><a class="dropdown-item" href="../bidang/umum.php">Tindak Pidana Umum</a></li>
        <li><a class="dropdown-item" href="../bidang/khusus.php">Tindak Pidanan Khusus</a></li>
        <li><a class="dropdown-item" href="../bidang/perdata.php">Perdata dan Tata Usaha</a></li>
        </ul>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Profile
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="struktur.php">Strutur Organisasi</a></li>
        <li><a class="dropdown-item" href="visimisi.php">Visi Misi</a></li>
        <li><a class="dropdown-item" href="perintah.php">Perintah Harian</a></li>
        <li><a class="dropdown-item" href="doktrin.php">Doktrin</a></li>
        <li><a class="dropdown-item" href="tugas.php">Tugas dan Wewenang</a></li>
        </ul>
    </li>
    </ul>
    <div class="collapse navbar-collapse" style="justify-content:right;">
    <ul class="navbar-nav">
    <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="EditText.php">Edit</a>
        </li>
    </ul>
    </div>
</div>
</div>
</nav>
</header>
<body>
<div class="container">
    <h1 style="text-align:center; margin-bottom:5px;">Edit Data</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        Pilih
        <select name="judul">
            <option value="VisiMisi">Visi dan Misi</option>
            <option value="Doktrin">Doktrin</option>
            <option value="Tugas">Tugas dan Wewenang</option>
        </select>
        <br>
        Tanggal
        <input type="date" name="tanggal">
        <br>
        Isi
        <textarea name="isi" style="width:100%; white-space: pre-wrap;" rows="40" id="isi" ></textarea>
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
