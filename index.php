<?php
ob_start();
session_start();
include_once"koneksi.php";
?>
<!doctype html>
<html lang="en">
<head>
  <title>Covid &mdash; Website Template by Colorlib</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    

  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700;900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="fonts/flaticon-covid/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">

  <!-- iconfity -->
  <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <!-- bostrapp data tab -->
  <!-- Custom styles for this page -->
  <link href="css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <!-- Grafik -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>


</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

<?php
  	if(isset($_POST['login'])){ //fungsi login, metode pengiriman $_POST -> biasanya untuk sebuah button
    // $_GET -> mengirimkan data variabel
    // isset -> menjalankan fungsi sebuah value
		$username	= $_POST['username']; //fungsi username
        $password	= md5($_POST['password']);
        // dijadikan sebuah pemeriksaan
        $sql= mysqli_query($conn,"select * from tbl_admin where username='$username' and password='$password' ");
          // memeriksa variabe sql yang berisikan sebuah fungsi untuk mengecek tabel admin
            if(mysqli_num_rows($sql) > 0){
              $row_admin = mysqli_fetch_array($sql);
              // jadikan fungsi $_SESSION, namun harus membuat ob_star dan session_start terlebih dahulu
              $_SESSION['username']= $username;
              $_SESSION['password']= $password;
                header('location: index.php');
            }else{
                echo"<script>
                    alert('Password Dan Username Salah !!');
                </script>";
            }

    }

  //jika session masih kosong redirect halaman login
	if(empty($_SESSION['username']) && (empty($_SESSION['password'])) ){
	    include_once"theme/halamanAwal.php";
  }else{
    //redirect halaman
	  require_once"halamanAdmin.php";
  }
?>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/isotope.pkgd.min.js"></script>
  <script src="js/main.js"></script>
    
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  <!-- data tab -->
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

  <script>
  //data tab
  $(document).ready(function() {
      $('#example').DataTable();
  } );
  </script>   

</body>
</html>