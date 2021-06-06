<?php
    include_once"modal/modal_lihat_jawaban.php";
?>
<h3><span class="iconify" data-icon="bi:list-check" data-inline="false"></span>Hasil Jawaban Dari User</h3>

<table id="example" class="table table-bordered table-striped table-hover table-sm">
    <thead>
        <tr>
            <th>No</th>
            <th>Pendaftar</th>
            <th>Status Ujian</th>
            <th><span class="iconify" data-icon="clarity:checkbox-list-line" data-inline="false"></span> Nilai Akhir</th>
            <th>Menu</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $users = mysqli_query($conn,"SELECT * FROM tbl_register ");
            $no=1;
            while($rowUsers = mysqli_fetch_array($users)){
                //status ujian 
                $statusUjian = mysqli_query($conn,"SELECT * FROM tbl_jawaban WHERE nik='$rowUsers[nik]' ");
                    if(mysqli_num_rows($statusUjian)>0){
                        $rowStatusUjian = mysqli_fetch_array($statusUjian);
                        $status ='<span class="badge bg-success">Sudah Mengikuti</span>';
                        $menu = "<a class='btn btn-success' title='Lihat Jawaban' href='#lihat_jawaban' data-toggle='modal' data-id='$rowUsers[nik]'><span class='iconify' data-icon='fluent:eye-show-12-regular' data-inline='false'></span></a>";
                        $nilaiAkhir = $rowStatusUjian['nilai'];
                    }else{
                        $status ='<span class="badge bg-danger">Belum Mengisi Form Soal</span>';
                        $menu ="";
                        $nilaiAkhir ="";
                    }
                echo"<tr>
                    <td>$no</td>
                    <td>$rowUsers[nama]</td>
                    <td align='center'>$status</td>
                    <td align='center'>$nilaiAkhir</td>
                    <td align='center'>$menu</td>
                </tr>";
                $no++;
            }
    ?>
    </tbody>
</table>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="js/lihat_jawaban.js"></script>
