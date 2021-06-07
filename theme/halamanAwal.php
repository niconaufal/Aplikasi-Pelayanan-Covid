
<div id="overlayer"></div>
<div class="loader">
<div class="spinner-border text-primary" role="status">
    <span class="sr-only">Loading...</span>
</div>
</div>

<div class="site-wrap">

<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
    <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
    </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>
    
    <header class="site-navbar light js-sticky-header site-navbar-target" role="banner">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-6 col-xl-2">
            <div class="mb-0 site-logo"><a href="index.html" class="mb-0">Covid<span class="text-primary">.</span> </a></div>
          </div>

          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active"><a href="index.php" class="nav-link">Home</a></li>
              <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="index.php?dataPenyebaranCovid"><span class="iconify" data-icon="carbon:data-vis-3" data-inline="false"></span> Data Penyebaran Covid</a></li>

                <?php
                  if(!empty($_SESSION['nik'])){
                    echo"<li><a href='index.php?biodata' class='nav-link'><span class='iconify' data-icon='ant-design:user-outlined' data-inline='false'></span> Hello <b>$_SESSION[nama]</b></a></li>";
                  }
                ?>
                <?php
                  if(!empty($_SESSION['nik'])){
                    echo'<li class="text-danger"><a href="logout.php" class="nav-link"><span class="iconify" data-icon="eva:log-in-outline" data-inline="false"></span> Logout</a></li>';
                    //cek apakah sudah mengisi soal
                    $cekJawaban = mysqli_query($conn,"SELECT * FROM tbl_jawaban WHERE nik='$_SESSION[nik]' ");
                      if(mysqli_num_rows($cekJawaban)>0){
                        echo'
                        <li><a href="index.php?hasilJawaban" class="nav-link"><span class="iconify" data-icon="foundation:results-demographics" data-inline="false"></span> Hasil Soal</a></li>';
                      }else{
                        echo'<li><a href="index.php?isiForm" class="nav-link"><span class="iconify" data-icon="clarity:form-line" data-inline="false"></span> Isi Form</a></li>';
                      }
                  }else{
                    echo'<li><a href="index.php?registrasi" class="nav-link"><span class="iconify" data-icon="ic:baseline-how-to-reg" data-inline="false"></span> Registrasi</a></li>
                    <li><a href="index.php?masuk" class="nav-link"><span class="iconify" data-icon="jam:log-in" data-inline="false"></span> Masuk</a></li>';
                  }
                ?>
            </ul>
            </nav>
          </div>
          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3 text-black"></span></a></div>
        </div>
      </div>

    </header>

    <div class="hero-v1">
        <div class="container">
        <?php
        if(isset($_POST['masukUser'])){
          $nik  = $_POST['nik'];
          $cekNik = mysqli_query($conn,"SELECT * FROM tbl_register WHERE nik LIKE '%".$nik."%' ");
            $rowCekNik = mysqli_fetch_array($cekNik);
            $_SESSION['nik']  = $nik;
            $_SESSION['nama'] = $rowCekNik['nama'];
            header("location:index.php");
        }else
        if(isset($_POST['regsiterUser'])){
          $nik  = $_POST['nik'];
          $nama = $_POST['nama'];
          $tanggalLahir = $_POST['tanggalLahir'];
          $alamat       = $_POST['alamat'];
          $provinsi     = $_POST['provinsi'];
          
          $registrasi = mysqli_query($conn,"INSERT INTO tbl_register (nik,nama,tanggalLahir,usia,alamat,provinsi) 
                        VALUES ('$nik','$nama','$tanggalLahir','','$alamat','$provinsi')");
              if($registrasi){
                $_SESSION['nik']  = $nik;
                $_SESSION['nama'] = $nama;
                $pesan ="<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Berhasil !</strong> Mendaftar <u>$_SESSION[nama]</u> Silahkan Isi Form Registrasi. <a href='index.php'>Klik Sekarang !</a>.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>";
              }else{
                $pesan ="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Gagal Mendaftar! </strong> Silahkan daftar ulang  .
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>";
              }
              echo $pesan;
        }else   
        if(isset($_POST['jawab'])){
          $pilihan=$_POST["pilihan"];
          $id_soal=$_POST["id"];
          $jumlah=$_POST['jumlah'];
          $score=0;
          $benar=0;
          $salah=0;
          $kosong=0;
          for ($i=0;$i<$jumlah;$i++){
              //id nomor soal
              $nomor=$id_soal[$i];
              //jika user tidak memilih jawaban
              if (empty($pilihan[$nomor])){
                  $kosong++;
              }else{
                  //jawaban dari user
                  $jawaban=$pilihan[$nomor];  
                  //cocokan jawaban user dengan jawaban di database
                  $query=mysqli_query($conn, "select * from tbl_soal where id_soal='$nomor' and knc_jawaban='$jawaban'");
                  $cek=mysqli_num_rows($query);
                  if($cek){
                      //jika jawaban cocok (benar)
                      $benar++;
                  }else{
                      //jika salah
                      $salah++;
                  }
              } 
              /*RUMUS
              Jika anda ingin mendapatkan Nilai 100, berapapun jumlah soal yang ditampilkan 
              hasil= 100 / jumlah soal * jawaban yang benar
              */
              $result=mysqli_query($conn, "select * from tbl_soal WHERE aktif='Y'");
              $jumlah_soal=mysqli_num_rows($result);
              $score = 100/$jumlah_soal*$benar;
              $hasil = number_format($score,1);
          }

        //Lakukan Penyimpanan Kedalam Database
        echo"<div class='btn-group'>
        <a href='#' class='btn btn-primary active' aria-current='page'>Hasil</a>
        <a href='#' class='btn btn-primary'>Benar : $benar</a>
        <a href='#' class='btn btn-primary'>Salah : $salah</a>
        <a href='#' class='btn btn-primary'>Kosong : $kosong</a>
        <a href='#' class='btn btn-primary'>Score : $score</a>
        </div>
        <br><br>";
        echo"<a href='index.php' class='btn btn-success'><span class='iconify' data-icon='clarity:success-line' data-inline='false'></span> Terima kasih Telah Menjawab Soal. Silahkan Kembali Ke Halaman Awal </a>";
        echo"</div>";
          //masukan hasil kedb
          $insertHasil = mysqli_query($conn,"INSERT INTO tbl_jawaban (nik,benar,salah,kosong,nilai) 
                                  VALUES('$_SESSION[nik]','$benar','$salah','$kosong','$score')");
        }else    
          if(isset($_GET['registrasi'])){
            include_once"halaman/registrasi.php";
          }else
          if(isset($_GET['registrasiUser'])){
            include_once"halaman/registrasiUser.php";
          }else
          if(isset($_GET['dataPenyebaranCovid'])){
            include_once"halaman/dataPenyebaranCovid.php";
          }else
          if(isset($_GET['isiForm'])){
            include_once"halaman/isiForm.php";
          }else
          if(isset($_GET['masuk'])){
            include_once"halaman/masuk.php";
          }else 
          if(isset($_GET['hasilJawaban'])){
            include_once"halaman/hasilJawaban.php";
          }else
          if(isset($_GET['biodata'])){
            include_once"halaman/biodata.php";
          }else
          if(isset($_GET['pendataan_penyebaran_covid'])){
            include_once"halaman/pendataan_penyebaran_covid.php";
          }else
          if(isset($_GET['berbagai_cara_penyebaran_covid'])){
            include_once"halaman/berbagai_cara_penyebaran_covid.php";
          }else{
            include_once"halaman/home.php";  
          }
        ?>

     <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-7 mx-auto text-center">
            <h2 class="footer-heading mb-4">Tentang Website</h2>
            <p>Website ini merupakan website edukasi kesehatan kepada masyarakat mengenai COVID-19. Diharapkan dengan adanya website ini mampu mengedukasi masyarakat mengenai gejala-gejala COVID-19 dan cara mencegahnya</p>
            <div class="row mb-5">
          <div class="col-lg-7 mx-auto text-center">
              <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
            </div>
          </div>
        <div class="row text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p class="copyright"><small>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></small></p>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div> <!-- .site-wrap -->
