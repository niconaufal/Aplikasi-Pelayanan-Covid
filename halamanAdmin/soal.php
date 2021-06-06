<?php
    include_once"modal/modalEditSoal.php";
    if(isset($_POST['edit_soal'])){
        $id_soal    = $_POST['id_soal'];
        $soal       = $_POST['soal'];
        $knc_jawaban    = $_POST['knc_jawaban'];
        $a          = $_POST['a'];
        $b          = $_POST['b'];
        $c          = $_POST['c'];
        $d          = $_POST['d'];
        $editSoal = mysqli_query($conn,"UPDATE tbl_soal SET soal='$soal', knc_jawaban='$knc_jawaban', a='$a', b='$b', c='$c', d='$d' 
                                    WHERE id_soal='$id_soal' ");
            if($editSoal){
                $pesan = '<div class="alert alert-primary" role="alert">
                    Berhasil Mengubah Soal
                </div>';
            }else{
                $pesan ='<div class="alert alert-danger" role="alert">
               Gagal Mengubah Soal
              </div>';
            }
            echo $pesan;
    }
?>
<table id="example" class="table table-bordered table-striped table-hover table-sm">
    <thead>
        <tr>
            <th>No</th>
            <th>Soal</th>
            <th>A</th>
            <th>B</th>
            <th>C</th>
            <th>D</th>
            <th>Yang Benar</th>
            <th>Menu</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(isset($_POST['edit_soal'])){
            $id_soal    = $_POST['id_soal'];
            $soal = mysqli_query($conn,"SELECT * FROM tbl_soal WHERE id_soal='$id_soal' ");
        }else{
            $soal = mysqli_query($conn,"SELECT * FROM tbl_soal ");
        }
                $no=1;
                while($rowSoal = mysqli_fetch_array($soal)){
                    $id_soal = $rowSoal['id_soal'];
                    echo"<tr>
                        <td>$no</td>
                        <td>$rowSoal[soal]</td>
                        <td>$rowSoal[a]</td>
                        <td>$rowSoal[b]</td>
                        <td>$rowSoal[c]</td>
                        <td>$rowSoal[d]</td>
                        <td align='center'>$rowSoal[knc_jawaban]</td>
                        <td>
                        <a class='btn btn-success' title='Edit Soal' href='#edit_soal' data-toggle='modal' data-id='$id_soal'><span class='iconify' data-icon='carbon:zoom-in' data-inline='false'></span></a>
                        </td>
                    </tr>";
                $no++;
                }
        ?>
    </tbody>
</table>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="js/edit_soal.js"></script>
