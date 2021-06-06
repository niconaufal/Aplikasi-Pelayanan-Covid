<?php
include_once"../koneksi.php";
    if($_POST['idx']) {
        $id_register = $_POST['idx'];
        $user = mysqli_query($conn,"SELECT * FROM tbl_register WHERE id_register='$id_register' ");
            $rowUser = mysqli_fetch_array($user);
            if($rowUser['hasil_pemeriksaan']=="negatif"){
                $status ="positif";
            }else{
                $status ="negatif";
            }
?>
<input type="hidden" name="id_register" value="<?php echo $id_register;?>">
<select name="hasil_pemeriksaan" id="hasil_pemeriksaan" class="form-control">
    <?php 
        echo"<option value='$rowUser[hasil_pemeriksaan]'>$rowUser[hasil_pemeriksaan]</option>";
        echo"<option value='$status'>$status</option>";
    ?>  
</select>
<?php
    }
?>