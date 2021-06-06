<h3><span class="iconify" data-icon="foundation:results-demographics" data-inline="false"></span> Hasil Dari Pemeriksaan</h3>

<div class="btn-group">
  <a href="index.php?dataPendaftarCovid" class="btn btn-primary active" aria-current="page"><span class="iconify" data-icon="carbon:data-table-reference" data-inline="false"></span> Table</a>
  <a href="index.php?grafik" class="btn btn-primary"><span class="iconify" data-icon="bx:bx-line-chart" data-inline="false"></span> Grafik</a>
  <a href="index.php?jenisKelamin" class="btn btn-warning"><span class="iconify" data-icon="bi:gender-trans" data-inline="false"></span> Jenis Kelamin</a>
  <a href="index.php?status" class="btn btn-secondary"><span class="iconify" data-icon="foundation:male-female" data-inline="false"></span> Status</a>
  <a href="index.php?statusHasil" class="btn btn-light"><span class="iconify" data-icon="akar-icons:plus" data-inline="false"></span> / <span class="iconify" data-icon="akar-icons:plus" data-inline="false"></span>Status Negatif / Positif</a>
</div>
<br><br>
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><span class="iconify" data-icon="carbon:data-table-reference" data-inline="false"></span> Table</button>
    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><span class="iconify" data-icon="ant-design:pie-chart-outlined" data-inline="false"></span> Grafik</button>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <table id="example" class="table table-bordered table-striped table-hover table-sm">
            <thead>
                <tr>
                    <th><span class="iconify" data-icon="ant-design:minus-circle-outlined" data-inline="false"></span> Negatif</th>
                    <th><span class="iconify" data-icon="akar-icons:circle-plus" data-inline="false"></span> Positif</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $negatif = mysqli_query($conn,"SELECT COUNT(id_register) as jumlahNegatif FROM tbl_register WHERE hasil_pemeriksaan='negatif' ");
                        $jumlahNegatif = mysqli_fetch_array($negatif);
                    $positif = mysqli_query($conn,"SELECT COUNT(id_register) as jumlahPositif FROM tbl_register WHERE hasil_pemeriksaan='positif' ");
                        $jumlahPositif = mysqli_fetch_array($positif);
                ?>
                <tr>
                    <td align='center'><?php echo $jumlahNegatif['jumlahNegatif'];?> / <span class="iconify" data-icon="bx:bx-user" data-inline="false"></span> Jiwa</td>
                    <td align='center'><?php echo $jumlahPositif['jumlahPositif'];?> / <span class="iconify" data-icon="bx:bx-user" data-inline="false"></span> Jiwa</td>
                </tr>
            </tbody>
        </table>
  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  <canvas id="doughnutChart" width="400" height="100"></canvas>
  </div>
</div>

<script>
//doughnut
var ctxD = document.getElementById("doughnutChart").getContext('2d');
var myLineChart = new Chart(ctxD, {
type: 'doughnut',
data: {
labels: ["Negatif", "Positif"],
datasets: [{
data: [<?php
      $negatif = mysqli_query($conn,"SELECT COUNT(id_register) as jumlahNegatif FROM tbl_register WHERE hasil_pemeriksaan='negatif' ");
      $jumlahNegatif = mysqli_fetch_array($negatif);
        $jNegatif  = $jumlahNegatif['jumlahNegatif'];
      $positif = mysqli_query($conn,"SELECT COUNT(id_register) as jumlahPositif FROM tbl_register WHERE hasil_pemeriksaan='positif' ");
      $jumlahPositif = mysqli_fetch_array($positif);
        $jPositif = $jumlahPositif['jumlahPositif'];  
?>
    <?php echo $jNegatif;?>, <?php echo $jPositif;?>
],
backgroundColor: ["#F7464A", "#46BFBD"],
hoverBackgroundColor: ["#FF5A5E", "#5AD3D1"]
}]
},
options: {
responsive: true
}
});
</script>
