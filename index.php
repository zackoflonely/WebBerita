<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COFFEE</title>
  <link rel="stylesheet" href="assets/style.css">
  <script src="https://kit.fontawesome.com/5c90e171df.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
  rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
  crossorigin="anonymous">
</head>
<body>
  <header>
      <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white" style="margin-bottom:50px;">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">
              <img src="assets/Image/icon.png" style="width:180px;" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown" style="font-weight:bold;">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Beranda</a>
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
      require "db/koneksi.php";

      $result = mysqli_query($conn,"SELECT*FROM berita");
  ?>
<div style="height: 100%; background-image: url('assets/image/bg10.png'); background-size: cover;">
<img src="assets/Image/img1.jpg" style="width: 100%; margin-top:5%;" alt="">
<h1 style="text-align:center;padding: 3%; font-weight:bold;">BERITA</h1>
<div class="row" style="margin:0% 0 0 16%;">
<?php
// $panjang = count($_SESSION['nama_kopi']);
while($row=mysqli_fetch_assoc($result)){
$i = 0;
if($i<4){
  echo '<div class="col-sm-3" style="margin-right:1.5vw;">
    <div class="card" style="width: 18rem;">
      <img src="db/'.$row["Gambar"].'" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title text-center" id="nama">'.$row["Judul"].'</h5>
        <h6 class="card-title text-center" id="harga">'.implode(' ', array_slice(str_word_count($row["Isi"], 1), 0, 40)).'</h6>
      </div>
      </div>
      </div>';
      $i++;
  }
}
?>
</div>
<div style="margin-top:50px; text-align:center;">
  <button class="btn btn-primary" style="width:auto;">View All</button>
</div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet"> 
<footer style="margin-left:50px; margin-top:50px;">
      <div class="row">
        <div class="col-sm-8 col-md-4">
          <img src="assets/Image/icon.png" style="width:180px;" alt="">
          <br>
          <a>Puji syukur kita panjatkan Kehadirat Tuhan Yang Maha Esa sehubungan dengan telah berfungsinya Website Kejaksaan Tinggi Kalimantan Timur yang merupakan salah satu langkah upaya penerapan teknologi informasi menuju reformasi birokrasi kejaksaan untuk Indonesia lebih maju.</a>
        </div>
        <div class="col-xs-6 col-md-2">
          <h6 style="font-weight: bold;">Kontak Kami</h6>
          <ul class="social-icons">
            <li><a class="instagram" href="#"><i class="fa fa-instagram" style="margin-right:5px;"></i></a>@username</li>
            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
          </ul>
        </div>
        <div class="col-xs-6 col-md-3">
          <h6 style="font-weight: bold;">Categories</h6>
          <ul class="footer-links">
            <a href="" style="text-decoration:none; color:black;">Lokasi</a>
          </ul>
        </div>
        <div class="col-xs-6 col-md-2">
          <h6 style="font-weight: bold;">Permohonan Informasi</h6>
          <ul class="footer-links">
            <a href="" style="text-decoration:none; color:black;">PPID</a>
          </ul>
        </div>
      </div>
      <hr>
      <!-- <div class="row" style="text-align: center;">
          <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by 
          <a href="#"></a>.
          </p>
      </div> -->
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
crossorigin="anonymous"></script>
</body>
</html>