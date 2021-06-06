<?php
//mengambil json
$dataC = file_get_contents('datacovidProvinsi.json');
$dataPenyebaran = json_decode($dataC, true);
$dataPenyeb = $dataPenyebaran[0];
$prov1 = $dataPenyebaran[1];
$prov2 = $dataPenyebaran[2];
$prov3 = $dataPenyebaran[3];
$prov4 = $dataPenyebaran[4];
$prov5 = $dataPenyebaran[5];
$prov6 = $dataPenyebaran[6];
$prov7 = $dataPenyebaran[7];
$prov8 = $dataPenyebaran[8];
$prov9 = $dataPenyebaran[9];
$prov10 = $dataPenyebaran[10];
$prov11 = $dataPenyebaran[11];
$prov12 = $dataPenyebaran[12];
$prov13 = $dataPenyebaran[13];
$prov14 = $dataPenyebaran[14];
$prov15 = $dataPenyebaran[15];
$prov16 = $dataPenyebaran[16];
$prov17 = $dataPenyebaran[17];
$prov18 = $dataPenyebaran[18];
$prov19 = $dataPenyebaran[19];
$prov20 = $dataPenyebaran[20];
$prov21 = $dataPenyebaran[21];
$prov22 = $dataPenyebaran[22];
$prov23 = $dataPenyebaran[23];



?>
<h4><span class="iconify" data-icon="fluent:data-histogram-24-regular" data-inline="false"></span> Data Penyebaran Covid Di indonesia</h4>

<table id="example" class="table table-bordered table-striped table-hover table-sm">
    <thead>
        <tr>
            <th rowspan="2">Provinsi</th>
            <th colspan="3"><center>Kasus</center></th>
        </tr>
        <tr>
            <th>Positif</th>
            <th>Sembuh</th>
            <th>Meninggal</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach($dataPenyeb as $db){
            echo"<tr>
            <td>$db[Provinsi]</td>
            <td>$db[Kasus_Posi]</td>
            <td>$db[Kasus_Semb]</td>
            <td>$db[Kasus_Meni]</td>
            </tr>";
        }
        foreach($prov1 as $p1){
            echo"<tr>
            <td>$p1[Provinsi]</td>
            <td>$p1[Kasus_Posi]</td>
            <td>$p1[Kasus_Semb]</td>
            <td>$p1[Kasus_Meni]</td>
            </tr>";
        }
        foreach($prov2 as $p2){
            echo"<tr>
            <td>$p2[Provinsi]</td>
            <td>$p2[Kasus_Posi]</td>
            <td>$p2[Kasus_Semb]</td>
            <td>$p2[Kasus_Meni]</td>
            </tr>";
        }
        foreach($prov3 as $p3){
            echo"<tr>
            <td>$p3[Provinsi]</td>
            <td>$p3[Kasus_Posi]</td>
            <td>$p3[Kasus_Semb]</td>
            <td>$p3[Kasus_Meni]</td>
            </tr>";
        }
        foreach($prov4 as $p4){
            echo"<tr>
            <td>$p4[Provinsi]</td>
            <td>$p4[Kasus_Posi]</td>
            <td>$p4[Kasus_Semb]</td>
            <td>$p4[Kasus_Meni]</td>
            </tr>";
        }
        foreach($prov5 as $p5){
            echo"<tr>
            <td>$p5[Provinsi]</td>
            <td>$p5[Kasus_Posi]</td>
            <td>$p5[Kasus_Semb]</td>
            <td>$p5[Kasus_Meni]</td>
            </tr>";
        }
        foreach($prov6 as $p6){
            echo"<tr>
            <td>$p6[Provinsi]</td>
            <td>$p6[Kasus_Posi]</td>
            <td>$p6[Kasus_Semb]</td>
            <td>$p6[Kasus_Meni]</td>
            </tr>";
        }
        foreach($prov7 as $p7){
            echo"<tr>
            <td>$p7[Provinsi]</td>
            <td>$p7[Kasus_Posi]</td>
            <td>$p7[Kasus_Semb]</td>
            <td>$p7[Kasus_Meni]</td>
            </tr>";
        }
        foreach($prov8 as $p8){
            echo"<tr>
            <td>$p8[Provinsi]</td>
            <td>$p8[Kasus_Posi]</td>
            <td>$p8[Kasus_Semb]</td>
            <td>$p8[Kasus_Meni]</td>
            </tr>";    
        }
        foreach($prov9 as $p9){
            echo"<tr>
            <td>$p9[Provinsi]</td>
            <td>$p9[Kasus_Posi]</td>
            <td>$p9[Kasus_Semb]</td>
            <td>$p9[Kasus_Meni]</td>
            </tr>";    
        }
        foreach($prov10 as $p10){
            echo"<tr>
            <td>$p10[Provinsi]</td>
            <td>$p10[Kasus_Posi]</td>
            <td>$p10[Kasus_Semb]</td>
            <td>$p10[Kasus_Meni]</td>
            </tr>";    
        }
        foreach($prov11 as $p11){
            echo"<tr>
            <td>$p11[Provinsi]</td>
            <td>$p11[Kasus_Posi]</td>
            <td>$p11[Kasus_Semb]</td>
            <td>$p11[Kasus_Meni]</td>
            </tr>";    
        }
        foreach($prov12 as $p12){
            echo"<tr>
            <td>$p12[Provinsi]</td>
            <td>$p12[Kasus_Posi]</td>
            <td>$p12[Kasus_Semb]</td>
            <td>$p12[Kasus_Meni]</td>
            </tr>";    
        }
        foreach($prov13 as $p13){
            echo"<tr>
            <td>$p13[Provinsi]</td>
            <td>$p13[Kasus_Posi]</td>
            <td>$p13[Kasus_Semb]</td>
            <td>$p13[Kasus_Meni]</td>
            </tr>";    
        }
        foreach($prov14 as $p14){
            echo"<tr>
            <td>$p14[Provinsi]</td>
            <td>$p14[Kasus_Posi]</td>
            <td>$p14[Kasus_Semb]</td>
            <td>$p14[Kasus_Meni]</td>
            </tr>";    
        }
        foreach($prov15 as $p15){
            echo"<tr>
            <td>$p15[Provinsi]</td>
            <td>$p15[Kasus_Posi]</td>
            <td>$p15[Kasus_Semb]</td>
            <td>$p15[Kasus_Meni]</td>
            </tr>";    
        }
        foreach($prov16 as $p16){
            echo"<tr>
            <td>$p16[Provinsi]</td>
            <td>$p16[Kasus_Posi]</td>
            <td>$p16[Kasus_Semb]</td>
            <td>$p16[Kasus_Meni]</td>
            </tr>";    
        }
        foreach($prov17 as $p17){
            echo"<tr>
            <td>$p17[Provinsi]</td>
            <td>$p17[Kasus_Posi]</td>
            <td>$p17[Kasus_Semb]</td>
            <td>$p17[Kasus_Meni]</td>
            </tr>";    
        }
        foreach($prov18 as $p18){
            echo"<tr>
            <td>$p18[Provinsi]</td>
            <td>$p18[Kasus_Posi]</td>
            <td>$p18[Kasus_Semb]</td>
            <td>$p18[Kasus_Meni]</td>
            </tr>";    
        }
        foreach($prov19 as $p19){
            echo"<tr>
            <td>$p19[Provinsi]</td>
            <td>$p19[Kasus_Posi]</td>
            <td>$p19[Kasus_Semb]</td>
            <td>$p19[Kasus_Meni]</td>
            </tr>";    
        }
        foreach($prov20 as $p20){
            echo"<tr>
            <td>$p20[Provinsi]</td>
            <td>$p20[Kasus_Posi]</td>
            <td>$p20[Kasus_Semb]</td>
            <td>$p20[Kasus_Meni]</td>
            </tr>";    
        }
    ?>  
    </tbody>
</table>

