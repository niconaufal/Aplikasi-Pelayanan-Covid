<?php
include_once"../koneksi.php";
    if($_POST['idx']) {
        $nik = $_POST['idx'];
        //user 
        $user = mysqli_query($conn,"SELECT * FROM tbl_register WHERE nik='$nik' ");
            $rowUser = mysqli_fetch_array($user);
        $jawaban = mysqli_query($conn,"SELECT * FROM tbl_jawaban WHERE nik='$nik' ");
            $rowJawaban = mysqli_fetch_array($jawaban);

?>
<ul class="list-group">
  <li class="list-group-item active" aria-current="true">Hasil Dari Jawaban : <span class="badge bg-info text-dark"><?php echo $rowUser['nama'];?></span></li>
  <li class="list-group-item">Benar : <?php echo $rowJawaban['benar'];?></li>
  <li class="list-group-item">Salah : <?php echo $rowJawaban['salah'];?></li>
  <li class="list-group-item">Kosong: <?php echo $rowJawaban['kosong'];?></li>
  <li class="list-group-item">Nilai : <?php echo $rowJawaban['nilai'];?></li>
</ul>
<?php
    }
?>