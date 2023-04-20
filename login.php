<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="assets/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
  rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
  crossorigin="anonymous">
</head>
<body>
  <header>
  <?php
      session_start();
      require "db/koneksi.php";

      $result = mysqli_query($conn,"SELECT*FROM admin");
      while($row=mysqli_fetch_assoc($result)){
        if(isset($_POST['submit'])) {
            $username = $_POST['nama'];
            $password = $_POST['password'];
            if(isset($_POST['role'])) { 
              $selectedOption = $_POST['role']; 
              $_SESSION['role'] = $selectedOption; 
            }
            if($username == $row["Username"] && $password == $row["Pass"]){
                $_SESSION['username'] = $row["ID_Admin"];
                header('Location: db/tambah.php');
            }
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Inputan salah bro")';  
            echo '</script>'; 
          }
      }
      ?>
      <nav class="navbar navbar-expand-md navbar-dark" style="background-color: black;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">COFFESHOP </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown" style="justify-content: right;">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Sign In</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="signup.php">Sign Up</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
  </header>
  <div style="min-height: 90.5vh; background-image: url(assets/image/bg3.jpg); background-size: cover;">
  <div style="padding-top: 8%; display: flex; height: 100%; justify-content: center; align-items: center;">
  <form method="POST" id="login">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Username</label>
      <input type="text" name="nama" class="form-control" >
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="float:right;">Submit</button>
  </form>
  </div>
    <!-- <div style="color: white; padding-top: 1%; text-align: center;">Dont have an account?
      <a href="signup.php" style="text-decoration: none;  color:#3498db;">Sign Up</a>
    </div> -->
    <footer>
      <div class="footers" style="position: absolute; bottom: 0; width: 100%;">
        <a href="#" style="color: white;"><i class="fa fa-facebook"></i></a>
        <a href="#" style="color: white;"><i class="fa fa-instagram"></i></a>
        <a href="#" style="color: white;"><i class="fa fa-youtube"></i></a>
        <a href="#" style="color: white;"><i class="fa fa-twitter"></i></a>
        <div class="cp" style="color: white;">Tasty and Healthy - Zakifr</div>
      </div>
    </footer>
  </div>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet"> 
  <!-- <script src="js/index.js"></script> -->
</body>
</html>