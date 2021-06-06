<h4>
<span class="iconify" data-icon="bx:bxs-pie-chart-alt" data-inline="false"></span>
Data Penyebaran COVID-19
</h4>

<canvas id="doughnutChart" width="400" height="100"></canvas>

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
