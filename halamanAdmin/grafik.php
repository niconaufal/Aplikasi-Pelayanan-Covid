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

<canvas id="myChart" width="400" height="130"></canvas>

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php
            foreach($dataProv as $dp){
                echo '"' . $dp['nama'] . '",';
            }
            ?>],
        datasets: [{
            label: '# of Votes',
            data: [<?php
                foreach($dataProv as $dp){
                    //hitung jumlah user pada setiap Prov
                    $jumlahUser = mysqli_query($conn,"SELECT COUNT(nama) as jumlahUser FROM tbl_register WHERE provinsi='$dp[nama]' ");
                    $totalUser = mysqli_fetch_array($jumlahUser);
                    echo $totalUser['jumlahUser']. ', ';
                }
            ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>