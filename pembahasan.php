<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bagja College Try Out</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-color:#f8f8f8">
<?php include 'header.php';?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<?php 
$gagal=0;
if($_SESSION){
    $nama=$_SESSION['nama'];
    $id=$_SESSION['id'];
    $ref=$_SESSION['ref'];
}else{
     $gagal=1;
}
// cek status paket soal
$tp=mysqli_query($con, "select * from paket_soal where status='4'");
$tps=mysqli_fetch_assoc($tp);
$hitung=mysqli_num_rows($tp);
if($hitung<1){
    $gagal=1;
    echo $hitung;
}
if($_POST){
    $id_paket=mysqli_real_escape_string($con,$_POST['id_paket']);
    $ce=mysqli_query($con, "select * from nilai_siswa where id_siswa='$id' and id_paket='$id_paket'");
    $hi=mysqli_num_rows($ce);
    if($hi<1){
        $so=mysqli_query($con, "select * from sesi_soal where id_paket_soal='$id_paket'");
        while($soal=mysqli_fetch_array($so)){
            $jawa=mysqli_query($con, "select j.id_paket, j.kunci, j.id_siswa, j.jawabanSiswa, j.id_soal, s.id, s.score from user_jawaban j inner join soal s on s.id=j.id_soal where j.id_sesi='$soal[id]' and j.id_siswa='$id'");
            $jawaq=mysqli_num_rows($jawa);
            $nilai=0;
            $benar=0;
            $salah=0;
            while($jawaban=mysqli_fetch_array($jawa)){
                if($jawaban['jawabanSiswa']==$jawaban['kunci']){
                    $nilai+=$jawaban['score'];
                    $benar++;
                }else{
                    $salah++;
                }
            }
            $in=mysqli_query($con, "insert into nilai_siswa(id_siswa, id_paket, id_soal, benar, salah, nilai, nama_sesi) values('$id','$id_paket','$soal[id]','$benar','$salah','$nilai','')");
            if($in){
                $nilai=0;
                $benar=0;
                $salah=0;
            }else{
                echo mysqli_error($con);
            }
        }
    }
    $nila=mysqli_query($con, "select n.id_siswa, n.id_paket, n.id_soal, n.benar, n.salah, n.nilai, s.id, s.nama_sesi from nilai_siswa n inner join sesi_soal s on s.id=n.id_soal where n.id_siswa='$id' and n.id_paket='$id_paket'");
    $niq=mysqli_num_rows($nila);
    $mapel=array();
    $nilaie=array();
    while($nilai=mysqli_fetch_array($nila)){
        $mapel[]=$nilai['nama_sesi'];
        $nilaie[]=$nilai['nilai'];
    }
}else{
    $gagal=1;
}
if($gagal>0){
    header('location:/bcto/home.php');
}
?>
<div class="col-12 row row-imbang primary" style="margin-top:60px;">
    <div class="col-12 row row-imbang" style="background-color:white;padding:20px;margin-bottom:12px;">
        <div class="col-12">
            <p class="h4 text-danger"><i class="fa fa-bar-chart"></i> Grafik Nilai</p>
            <hr>   
            <canvas id="bar-chart" width="800" height="450"></canvas>
        </div>
    </div>
    <script>  
        // Bar chart
        new Chart(document.getElementById("bar-chart"), {
            type: 'bar',
            data: {
            labels: <?php echo json_encode($mapel); ?>,
            datasets: [
                {
                label: "Population (millions)",
                backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9"],
                data: <?php echo json_encode($nilaie); ?>
                }
            ]
            },
            options: {
            legend: { display: false },
            title: {
                display: true,
                text: 'Try Out Curi Start 01'
            }
            }
        });
    </script>  
</div>