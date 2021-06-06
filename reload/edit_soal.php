<?php
include_once"../koneksi.php";
    if($_POST['idx']) {
        $id_soal = $_POST['idx'];
        $soal = mysqli_query($conn,"SELECT * FROM tbl_soal WHERE id_soal='$id_soal' ");
            $rowSoal = mysqli_fetch_array($soal);
?>
<input type="hidden" name="id_soal" value="<?php echo $id_soal;?>">
<div class="row">
    <div class="col-sm">
        <div class="form-group">
            <label for="">Soal</label>
            <textarea name="soal" id="soal" cols="" rows="" class="form-control"><?php echo $rowSoal['soal'];?></textarea>
        </div>
        <div class="form-group">
            <label for="">Kunci Jawaban</label>
            <select name="knc_jawaban" id="" class="form-control">
                <option value="<?php echo $rowSoal['knc_jawaban'];?>"><?php echo $rowSoal['knc_jawaban'];?></option>
                <?php
                    $huruf = array('a','b','c','d');
                        foreach($huruf as $h){
                            echo"<option value='$h'>$h</option>";
                        }
                ?>
            </select>
        </div>
    </div>
    <div class="col-sm">
        <div class="form-group">
            <label for="">Jawaban A</label>
            <textarea name="a" id="a" cols="" rows="" class="form-control"><?php echo $rowSoal['a'];?></textarea>
        </div>
        <div class="form-group">
            <label for="">Jawaban b</label>
            <textarea name="b" id="b" cols="" rows="" class="form-control"><?php echo $rowSoal['b'];?></textarea>
        </div>
        <div class="form-group">
            <label for="">Jawaban C</label>
            <textarea name="c" id="c" cols="" rows="" class="form-control"><?php echo $rowSoal['c'];?></textarea>
        </div>
        <div class="form-group">
            <label for="">Jawaban D</label>
            <textarea name="d" id="d" cols="" rows="" class="form-control"><?php echo $rowSoal['d'];?></textarea>
        </div>
    </div>
</div>

<?php
    }
?>