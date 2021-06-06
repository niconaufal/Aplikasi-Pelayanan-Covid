<?php
//mengambil json
$data = file_get_contents('provinsi.json');
$dataP = json_decode($data, true);
$dataProv = $dataP["provinsi"];
?>
<br>
<h4><span class="iconify" data-icon="clarity:users-solid-alerted" data-inline="false"></span> Daftar Pendaftar Covid Menurut Provinsi</h4>
<div class="btn-group">
  <a href="index.php?dataPendaftarCovid" class="btn btn-primary active" aria-current="page"><span class="iconify" data-icon="carbon:data-table-reference" data-inline="false"></span> Table</a>
  <a href="index.php?grafik" class="btn btn-primary"><span class="iconify" data-icon="bx:bx-line-chart" data-inline="false"></span> Grafik</a>
  <a href="index.php?jenisKelamin" class="btn btn-warning"><span class="iconify" data-icon="bi:gender-trans" data-inline="false"></span> Jenis Kelamin</a>
  <a href="index.php?status" class="btn btn-secondary"><span class="iconify" data-icon="foundation:male-female" data-inline="false"></span> Status</a>
  <a href="index.php?statusHasil" class="btn btn-light"><span class="iconify" data-icon="akar-icons:plus" data-inline="false"></span> / <span class="iconify" data-icon="akar-icons:plus" data-inline="false"></span>Status Negatif / Positif</a>
</div>

<table id="example" class="table table-bordered table-striped table-hover table-sm">
<thead>
        <tr>
            <th>No</th>
            <th>Provinsi</th>
            <th>Single</th>
            <th>Menikah</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $no=1;
        foreach($dataProv as $dp){
            //hitung jumlah user pada setiap Prov
            $jumlahLajang = mysqli_query($conn,"SELECT COUNT(nama) as jumlahLajang FROM tbl_register WHERE provinsi='$dp[nama]' AND status='lajang' ");
                $totalLajang = mysqli_fetch_array($jumlahLajang);
            $jumlahMenikah = mysqli_query($conn,"SELECT COUNT(nama) as jumlahMenikah FROM tbl_register WHERE provinsi='$dp[nama]' AND status='menikah' ");
                $totalMenikah = mysqli_fetch_array($jumlahMenikah);

            echo"<tr>
                <td>$no</td>
                <td>$dp[nama]</td>
                <td align='center'>$totalLajang[jumlahLajang]</td>
                <td align='center'>$totalMenikah[jumlahMenikah]</td>
            </tr>";
            $no++;
        } 
    ?>
    </tbody>
</table>