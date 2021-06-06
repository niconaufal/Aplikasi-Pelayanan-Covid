<?php
if(isset($_POST['editBiodata'])){
    $nik        = $_POST['nik'];
    $nama       = $_POST['nama'];
    $tanggallahir   = $_POST['tanggallahir'];
    $alamat         = $_POST['alamat'];
    $provinsi       = $_POST['provinsi'];
    $jk             = $_POST['jk'];
    $status         = $_POST['status'];

    $editBio = mysqli_query($conn,"UPDATE tbl_register SET nama='$nama', tanggallahir='$tanggallahir', alamat='$alamat', provinsi='$provinsi', jk='$jk', status='$status'
                                WHERE nik='$nik' ");
        if($editBio){
            $pesan ='<div class="alert alert-primary" role="alert">
           Berhasil Mengubah Data!
          </div>';
        }else{  
            $pesan ='<div class="alert alert-danger" role="alert">
           gagal Mengubah Data!
          </div>';
        }
        echo $pesan;

}
//mengambil json
    $data = file_get_contents('provinsi.json');
    $menu = json_decode($data, true);
    $menu = $menu["provinsi"];

    $user = mysqli_query($conn,"SELECT * FROM tbl_register WHERE nik='$_SESSION[nik]' ");
        $rowUser = mysqli_fetch_array($user);
?>
<div class=" mb-3" style="max-width: 100%;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="images/undraw_Wall_post_re_y78d.svg" class="card-img-top" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><span class="iconify" data-icon="clarity:form-line" data-inline="false"></span> Biodata</h5>
        <form action="" method="post">
        <input type="hidden" name="nik" value="<?php echo $_SESSION['nik'];?>">
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" value="<?php echo $rowUser['nama'];?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" name="tanggallahir" value="<?php echo $rowUser['tanggallahir'];?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="" rows="" class="form-control"><?php echo $rowUser['alamat'];?></textarea>
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="">Provinsi</label>
                    <select name="provinsi" id="provinsi" class="form-control">
                    <option value="<?php echo $rowUser['provinsi'];?>"><?php echo $rowUser['provinsi'];?></option>
                    <?php
                      foreach($menu as $row){
                          echo"<option value='$row[nama]'>$row[nama]</option>";
                      }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for=""><span class="iconify" data-icon="bi:gender-trans" data-inline="false"></span> Jenis Kelamin</label>
                    <br>
                    <?php
                      if($rowUser['jk']=="pria"){
                        echo"<p><input type='radio' name='jk' value='pria' checked='checked' />Pria</p>
                        <p><input type='radio' name='jk' value='perempuan' />Wanita</p>";
                      }else{
                        echo"<p><input type='radio' name='jk' value='pria' />Pria</p>
                        <p><input type='radio' name='jk' value='perempuan' checked='checked'/>Wanita</p>";
                      }
                    ?>
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <br>
                    <?php
                    if($rowUser['status']=="lajang"){
                      echo'<input type="radio" name="status" value="lajang" class="btn-check" name="options" id="option1" autocomplete="off" checked>
                      <label class="btn btn-secondary" for="option1">Lajang</label>
                      <input type="radio" name="status" value="menikah" class="btn-check" name="options" id="option2" autocomplete="off">
                      <label class="btn btn-secondary" for="option2">Menikah</label>';
                    }else{
                      echo'<input type="radio" name="status" value="lajang" class="btn-check" name="options" id="option1" autocomplete="off" >
                      <label class="btn btn-secondary" for="option1">Lajang</label>
                      <input type="radio" name="status" value="menikah" class="btn-check" name="options" id="option2" autocomplete="off" checked>
                      <label class="btn btn-secondary" for="option2">Menikah</label>';
                    }
                    ?>
                </div>
            </div>
            <button name="editBiodata" type="submit" class="btn btn-primary">Simpan Biodata</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>