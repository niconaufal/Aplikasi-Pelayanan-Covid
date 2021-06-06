<?php
//mengambil json
$data = file_get_contents('provinsi.json');
$dataP = json_decode($data, true);
$dataProv = $dataP["provinsi"];
?>

<h4><span class="iconify" data-icon="fluent:data-histogram-24-regular" data-inline="false"></span> Data Penyebaran Covid di indonesia</h4>


<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><span class="iconify" data-icon="carbon:data-table-reference" data-inline="false"></span> Table</button>
    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false"><span class="iconify" data-icon="bx:bx-line-chart" data-inline="false"></span> Grafik</button>
  </div>
</nav>

<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <table id="example" class="table table-bordered table-striped table-hover table-sm">
            <thead>
                <tr>
                    <th rowspan="2">Provinsi</th>
                    <th colspan="2"><center>Kasus</center></th>
                </tr>
                <tr>
                    <th>Positif</th>
                    <th>Negatif</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($dataProv as $dp){
                    //hitung jumlah user pada setiap Prov
                    $jumlahUser = mysqli_query($conn,"SELECT COUNT(nama) as jumlahUser FROM tbl_register WHERE provinsi='$dp[nama]' ");
                        $totalUser = mysqli_fetch_array($jumlahUser);
                    $negatif = mysqli_query($conn,"SELECT COUNT(id_register) as jumlahNegatif FROM tbl_register WHERE hasil_pemeriksaan='negatif' AND provinsi='$dp[nama]' ");
                        $jumlahNegatif = mysqli_fetch_array($negatif);
                    $positif = mysqli_query($conn,"SELECT COUNT(id_register) as jumlahPositif FROM tbl_register WHERE hasil_pemeriksaan='positif' AND provinsi='$dp[nama]' ");
                        $jumlahPositif = mysqli_fetch_array($positif);    
                    echo"<tr>
                        <td>$dp[nama]</td>
                        <td align='center'>$jumlahNegatif[jumlahNegatif] / Jiwa</td>
                        <td align='center'>$jumlahPositif[jumlahPositif] / Jiwa</td>
                    </tr>";
                } 
            ?>
            </tbody>
        </table>
  </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
    <canvas id="lineChart" width="400" height="100"></canvas>
  </div>
</div>

<script>
//line
var ctxL = document.getElementById("lineChart").getContext('2d');
var myLineChart = new Chart(ctxL, {
type: 'line',
data: {
labels: [<?php
        foreach($dataProv as $dp){
            echo '"' . $dp['nama'] . '",';
        }
        ?>],
datasets: [{
label: "Negatif",
data: [<?php
        foreach($dataProv as $dp){
            //hitung jumlah user pada setiap Prov
            $jumlahUser = mysqli_query($conn,"SELECT COUNT(nama) as jumlahUser FROM tbl_register WHERE provinsi='$dp[nama]' AND hasil_pemeriksaan='negatif' ");
            $totalUser = mysqli_fetch_array($jumlahUser);
            echo $totalUser['jumlahUser']. ', ';
        }
    ?>],
backgroundColor: [
'rgba(105, 0, 132, .2)',
],
borderColor: [
'rgba(200, 99, 132, .7)',
],
borderWidth: 2
},
{
label: "Positif",
data: [<?php
        foreach($dataProv as $dp){
            //hitung jumlah user pada setiap Prov
            $jumlahUser = mysqli_query($conn,"SELECT COUNT(nama) as jumlahUser FROM tbl_register WHERE provinsi='$dp[nama]' AND hasil_pemeriksaan='positif' ");
            $totalUser = mysqli_fetch_array($jumlahUser);
            echo $totalUser['jumlahUser']. ', ';
        }
    ?>],
backgroundColor: [
'rgba(0, 137, 132, .2)',
],
borderColor: [
'rgba(0, 10, 130, .7)',
],
borderWidth: 2
}
]
},
options: {
responsive: true
}
});
</script>

