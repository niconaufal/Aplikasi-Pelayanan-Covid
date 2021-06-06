<?php
    $jawaban = mysqli_query($conn,"SELECT * FROM tbl_jawaban WHERE nik='$_SESSION[nik]' ");
        $rowJawaban = mysqli_fetch_array($jawaban);
            if($rowJawaban['nilai']>=70){
                $status ="<font color='green'>Anda Berhasil Mendapatkan Nilai Minimal</font>";
                $gambar ='images/undraw_Successful_purchase_re_mpig.svg';
            }else{
                $status ="<font color='red'>Maaf Nilai Anda Kurang</font>";
                $gambar ='images/undraw_fresh_notification_bvtv.svg';
            }
?>
<div class="card mb-3" style="max-width: 100%;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?php echo $gambar;?>" class="card-img-top" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $status;?></h5>
        <?php
        echo"<div class='btn-group'>
        <a href='#' class='btn btn-primary active' aria-current='page'>Hasil</a>
        <a href='#' class='btn btn-primary'>Benar : $rowJawaban[benar]</a>
        <a href='#' class='btn btn-primary'>Salah : $rowJawaban[salah]</a>
        <a href='#' class='btn btn-primary'>Kosong : $rowJawaban[kosong]</a>
        <a href='#' class='btn btn-primary'>Score : $rowJawaban[nilai]</a>
        </div>";
        ?>
      </div>
    </div>
  </div>
</div>