<?php
include_once"koneksi.php";
//mengambil json
$data = file_get_contents('provinsi.json');
$menu = json_decode($data, true);
$menu = $menu["provinsi"];

    $nik      = $_GET['nik'];
    //cek nik di database
    $cekNik = mysqli_query($conn,"SELECT * FROM  tbl_register WHERE nik LIKE '%".$nik."%' ");
        if(mysqli_num_rows($cekNik)>0){
            echo"<br><div class='form-group'>
            <button name='masukUser' type='submit' class='btn btn-primary'>Masuk Sekarang Dengan Nik</button>
            </div>";
        }else{
            echo"<div class='row'>
                    <div class='col-sm'>
                        <div class='form-group'>
                            <label>Nama</label>
                            <input type='text' name='nama' class='form-control' placeholder='Isikan Nama Anda' required/>
                        </div>
                        <div class='form-group'>
                        <label>Provinsi</label>
                        <select name='provinsi' id='provinsi' class='form-control'>";
                          foreach($menu as $row){
                              echo"<option value='$row[nama]'>$row[nama]</option>";
                          }
                        echo"
                        </select></div>
                    </div>
                    <div class='col-sm'>
                        <div class='form-group'>
                            <label>Tanggal Lahir</label>
                            <input type='date' name='tanggalLahir' class='form-control' required/>
                        </div>
                        <div class='form-group'>
                        <label>Tempat Lahir</label>
                            <textarea name='alamat' class='form-control' cols='' rows=''></textarea>
                        </div>

                    </div>
            </div>
            <button name='regsiterUser' type='submit' class='btn btn-primary'>Register Sekarang</button>";
        }
?>
