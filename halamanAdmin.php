<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><span class="iconify" data-icon="carbon:user-admin" data-inline="false"></span> Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php"><span class="iconify" data-icon="bx:bx-home" data-inline="false"></span> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?hasil"><span class="iconify" data-icon="foundation:results" data-inline="false"></span> Hasil</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <span class="iconify" data-icon="whh:filemanager" data-inline="false"></span> Manage Data
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="index.php?dataRegistrasi"><span class="iconify" data-icon="la:users" data-inline="false"></span> Data Registrasi</a></li>
            <li><a class="dropdown-item" href="index.php?dataPendaftarCovid"><span class="iconify" data-icon="la:users" data-inline="false"></span> Data Pendaftar Covid</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?soal" tabindex="-1" aria-disabled="true"><span class="iconify" data-icon="bi:list-check" data-inline="false"></span> Soal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php" tabindex="-1" aria-disabled="true"><span class="iconify" data-icon="akar-icons:toggle-off" data-inline="false"></span> Log Out</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div class="container-fluid">
    <?php
      if(isset($_GET['dataRegistrasi'])){
        include_once"halamanAdmin/dataRegistrasi.php";
      }else
      if(isset($_GET['hapusRegister'])){
        $id_register  = $_GET['hapusRegister'];
        mysqli_query($conn,"DELETE FROM tbl_register WHERE id_register='$id_register' ");
        header('location:index.php?dataRegistrasi');
      }else
      if(isset($_GET['dataPendaftarCovid'])){
        include_once"halamanAdmin/dataPendaftarCovid.php";  
      }else
      if(isset($_GET['soal'])){
          include_once"halamanAdmin/soal.php";
      }else
      if(isset($_GET['hasil'])){
          include_once"halamanAdmin/hasil.php";
      }else
      if(isset($_GET['jenisKelamin'])){
        include_once"halamanAdmin/jenisKelamin.php";
      }else
      if(isset($_GET['status'])){
        include_once"halamanAdmin/status.php";
      }else 
      if(isset($_GET['grafik'])){
        include_once"halamanAdmin/grafik.php";
      }else
      if(isset($_GET['statusHasil'])){
          include_once"halamanAdmin/statusHasil.php";  
      }else{
        include_once"halamanAdmin/home.php";
      }
    ?>
</div>
    
   
  </body>
</html>