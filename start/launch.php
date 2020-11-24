<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bagja College Try Out</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-color:#f8f8f8">
<?php include '../header.php';?>
<?php 
$gagal=0;
if($_SESSION){
    $nama=$_SESSION['nama'];
    $id=$_SESSION['id'];
    $ref=$_SESSION['ref'];
    //status riwayat
    //1 topup
    //2 pembelian
    $sa=mysqli_query($con, "select * from riwayat_bintang where id_users='$id' order by id desc limit 1");
    $sal=mysqli_fetch_assoc($sa);
    $hitung=mysqli_num_rows($sa);
    $saldo=$sal['saldo'];
    if($hitung<1){
        $saldo=0;
    }
}else{
     $gagal=1;
}
// cek status paket soal
$tp=mysqli_query($con, "select * from paket_soal where status='1'");
$tps=mysqli_fetch_assoc($tp);
$hitung=mysqli_num_rows($tp);
if($hitung<1){
    $gagal=1;
    echo $hitung;
}
if($gagal>0){
    header('location:/bcto/home.php');
}
?>
<div class="col-12 row row-imbang primary" style="margin-top:60px;">
    <div class="col-12 row row-imbang" style="background-color:white;padding:20px;margin-bottom:12px;">
        <div class="col-12">
            <p class="h4 text-danger"><i class="fa fa-user"></i> Profile</p>
            <hr>   
        </div>            
        <div class="col-6">
            <p class="h4"><?php echo $nama;?></p>
            <p class="h6">Code Referal : <?php echo $ref;?></p>
        </div>
        <div class="col-6 text-right">
            <span class="h4 text-right"><i class="text-warning fa fa-star"></i> <?php echo $saldo;?></span>
            <button class="btn btn-outline-warning h4">Tambah</button>
        </div>
        <hr>
    </div>
    <div class="col-12 row row-imbang" style="background-color:white;padding:20px;margin-bottom:12px;">
        <div class="col-12">
            <p class="h4 text-danger"><i class="fa fa-book"></i> TO Curi Start 01</p>
            <hr>   
        </div>            
        <div class="col-6">
            <p class="h4">Tes Pengetahuan Skolastik</p>
            <hr>
        </div>
        <div class="col-12 row justify-content-center">
            <?php
                $tpp=mysqli_query($con,"select * from sesi_soal where id_paket_soal='$tps[id]'");
                $notps=0;
                while($tpps=mysqli_fetch_array($tpp)){
                    $status=mysqli_query($con,"select * from user_ujian where id_soal='$tpps[id]' and id_siswa='$id'");
                    $status_siswa=mysqli_fetch_assoc($status);
                    $hitung_so=mysqli_query($con, "select * from soal where id_sesi_soal='$tpps[id]'");
                    $hitung_soal=mysqli_num_rows($hitung_so);
                    $hitung_sesi=mysqli_num_rows($status);
                    if($notps<1){
                        if($hitung_sesi<1){
                            ?>
                            <div class="col-3" style="margin-bottom:12px;">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <p class="card-title"><?php echo $tpps['nama_sesi'];?></p>
                                        </div>
                                        <div class="card-body">
                                        <p>Total Soal : <?php echo $hitung_soal;?> Soal
                                            <p>Durasi : <?php echo $tpps['durasi'];?> Menit</p>
                                        </div>
                                        <div class="card-footer">
                                            <form method="post" action="start.php" name="mulai" id="mulai">
                                                <input type="hidden" name="durasi" value="<?php echo $tpps['durasi'];?>">
                                                <input type="hidden" name="idsoal" value="<?php echo $tpps['id'];?>">
                                                <input type="hidden" name="idsiswa" value="<?php echo $id;?>">
                                                <input type="hidden" name="idpaket" value="<?php echo $tps['id'];?>">
                                                <button class="btn btn-primary btn-block">Mulai</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <?php
                        }else{
                            
                        }
                    }else{
                        if($status_siswa['status']==1){
    
                        }else if($status_siswa['status']==2){
    
                        }else if($status_siswa['status']==3){
                            ?>
                            <div class="col-3" style="margin-bottom:12px;">
                                <div class="col-12">
                                    <div class="tutup card row" style="width:85%; min-height: 100px;position: absolute;background: black;opacity:0.4;">
                                        <p class="text-center my-auto text-white">Selesai</p>
                                    </div>
                                    <div class="card buka" style="position:initial;">
                                        <div class="card-header">
                                            <p class="card-title"><?php echo $tpps['nama_sesi'];?></p>
                                        </div>
                                        <div class="card-body">
                                            <p>Total Soal : <?php echo $hitung_soal;?> Soal
                                            <p>Durasi : <?php echo $tpps['durasi'];?> Menit</p>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-disabled btn-block">Mulai</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }else{
                            ?>
                            <div class="col-3" style="margin-bottom:12px;">
                                <div class="col-12">
                                    <div class="tutup card row" style="width:85%; min-height: 100px;position: absolute;background: black;opacity:0.4;">
                                        <p class="text-center my-auto text-white">Belum</p>
                                    </div>
                                    <div class="card buka" style="position:initial;">
                                        <div class="card-header">
                                            <p class="card-title"><?php echo $tpps['nama_sesi'];?></p>
                                        </div>
                                        <div class="card-body">
                                            <p>Total Soal : <?php echo $hitung_soal;?> Soal
                                            <p>Durasi : <?php echo $tpps['durasi'];?> Menit</p>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-disabled btn-block">Mulai</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    $notps++;
            ?>
           <?php
                }
           ?>
        </div>
        <hr>
    </div>
</div>
<script>
$(document).ready(function(){
    var tinggi = $('.buka').height();
    $('.tutup').height(tinggi);
})
</script>