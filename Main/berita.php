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
      <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white" >
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
                  <a class="nav-link" href="info.php">Berita</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    More
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="db/tambah.php">Myprofile</a></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="collapse navbar-collapse" style="justify-content:right;">
            <ul class="navbar-nav">
              <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="login.php">Login</a>
                </li>
            </ul>
            </div>
          </div>
        </nav>
  </header>
  <?php
    session_start();
    require "../db/koneksi.php";
    if (isset($_GET['judul'])) {
    $judul = $_GET['judul'];
    $result = mysqli_query($conn,"SELECT*FROM berita WHERE Judul ='$judul'");
    }
  ?>
<div style="width:100%;">
<br>
<h1 style="text-align:center; padding: 3%; font-weight:bold;">BERITA</h1>
<main>
<div id="content" style="margin-left:1%; width:70%;">
<article class="card">
<?php 
while($row=mysqli_fetch_assoc($result)){
    echo "<img src='../db/".$row['Gambar']."' style='width:100%' class='featured-image' alt=''>
    <h6>".$judul."</h6>        
    <p>".$row["Isi"]."</p>";
}?>
</article>
</div>
<aside style="width:29%;">
<div style="padding: 5%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
    <div class="input-group mb-3">
        <button class="btn btn-outline-secondary" type="button" id="button-addon1">Cari</button>
        <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
    </div>
</div>
<br>
<div class="card" >
  <div class="card-header">
    Berita Terbaru
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">An item</li>
    <li class="list-group-item">A second item</li>
    <li class="list-group-item">A third item</li>
  </ul>
</div>
</aside>
</main>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet"> 
<footer>
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
</html>