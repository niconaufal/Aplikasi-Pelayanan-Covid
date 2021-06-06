<?php
include_once"modal/menu_pemeriksaan.php";
if(isset($_POST['simpan_hasil'])){
    $id_register    = $_POST['id_register'];
    $hasil_pemeriksaan = $_POST['hasil_pemeriksaan'];
    $updateHasil = mysqli_query($conn,"UPDATE tbl_register SET hasil_pemeriksaan='$hasil_pemeriksaan' 
                                        WHERE id_register='$id_register' ");
        if($updateHasil){
            $pesan ='<div class="alert alert-primary" role="alert">
            Berhasil Mengubah Hasil Swab!
          </div>';
        }else{
            $pesan ='<div class="alert alert-danger" role="alert">
            Gagal Mengubah Hasil Swab!
          </div>';
        }
        echo $pesan;
}
?>

<table id="example" class="table table-bordered table-striped table-hover table-sm">
    <thead>
        <th>No</th>
        <th>Nik</th>
        <th>Nama</th>
        <th>Tanggal Lahir</th>
        <th>Usia</th>
        <th>Provinsi</th>
        <th>Alamat</th>
        <th>Jenis Kelamin</th>
        <th>Status</th>
        <th>Hasil Pemeriksaan</th>
        <th><center> Menu</center></th>
    </thead>
    <tbody>
        <?php
            $user = mysqli_query($conn,"SELECT * FROM tbl_register ");
                $no=1;
                while($rowUser = mysqli_fetch_array($user)){
                    $tanggal_lahir = new DateTime($rowUser['tanggallahir']);
                    $sekarang = new DateTime("today");
                    
                    $thn = $sekarang->diff($tanggal_lahir)->y;
                    echo"<tr>
                        <td>$no</td>
                        <td>$rowUser[nik]</td>
                        <td>$rowUser[nama]</td>
                        <td>$rowUser[tanggallahir]</td>
                        <td>$thn / thn</td>
                        <td>$rowUser[alamat]</td>
                        <td>$rowUser[provinsi]</td>
                        <td>$rowUser[jk]</td>
                        <td>$rowUser[status]</td>
                        <td>$rowUser[hasil_pemeriksaan]</td>
                        <td>
                        <a class='btn btn-success' title='Menu Pemeriksaan' href='#menu_pemeriksaan' data-toggle='modal' data-id='$rowUser[id_register]'><span class='iconify' data-icon='carbon:zoom-in' data-inline='false'></span></a>
                        <a onClick=\"return confirm('Anda Yakin Menghapus ?')\"  href='index.php?hapusRegister=$rowUser[id_register]' class='btn btn-danger'><span class='iconify' data-icon='bx:bx-trash' data-inline='false'></span></a>
                        </td>
                    </tr>";
                $no++;
                }
        ?>
    </tbody>
</table>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="js/menu_pemeriksaan.js"></script>
