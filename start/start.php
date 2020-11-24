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
//POST SoAL 
date_default_timezone_set('Asia/Jakarta');
if($_POST){
    $id_sesi=mysqli_real_escape_string($con,$_POST['idsoal']);
    $id_paket=mysqli_real_escape_string($con,$_POST['idpaket']);
    $durasi=mysqli_real_escape_string($con,$_POST['durasi']);
    //cek sesi siswa
    $se=mysqli_query($con, "select * from user_ujian where id_siswa='$id' and id_soal='$id_sesi'");
    $se_hitung=mysqli_num_rows($se);
    if($se_hitung<1){
        $mulai = date('Y/m/d H:i:s');
        $akhir=date("Y/m/d H:i:s", strtotime("+".$durasi." minutes"));
        $insert_sesi=mysqli_query($con, "insert into user_ujian (id_siswa, id_paket, id_soal, mulai, akhir, status, percobaan) values ('$id', '$id_paket','$id_sesi','$mulai', '$akhir','1','1')");
    }
    // cek jawaban siswa
    $so=mysqli_query($con, "select * from user_jawaban where id_siswa='$id' and id_sesi='$id_sesi'");
    $so_hitung=mysqli_num_rows($so);
    $nomor_soal=1;
    if($so_hitung<1){
        $se=mysqli_query($con, "select * from soal where id_sesi_soal='$id_sesi' order by rand(UNIX_TIMESTAMP(NOW()))");
        while($sel=mysqli_fetch_array($se)){
            $kunci=$sel['kunci'];
            $jawabanSiswa="";
            $id_soal=$sel['id'];
            $in=mysqli_query($con, "insert into user_jawaban (id_siswa, id_paket, nomor_soal, kunci, jawabanSiswa, id_soal, id_sesi) Values('$id', '$id_paket', '$nomor_soal','$kunci','$jawabanSiswa', '$id_soal', '$id_sesi')");
            $nomor_soal++;
        }
    }
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
//cek paket soal yang aktif
$ak=mysqli_query($con, "select * from paket_soal where status='1'");
$aktif=mysqli_fetch_assoc($ak);
//cek user aktif
$us=mysqli_query($con, "select * from user_ujian where id_paket='$aktif[id]' and status='1'");
$user=mysqli_fetch_assoc($us);
//waktu ujian
$skrg = new DateTime(date('Y/m/d H:i:s'));
$akhir_ujian=$user['akhir'];
$sisa_waktu = $skrg->diff(new DateTime($akhir_ujian));
$menit=$sisa_waktu->i;
$detik=$sisa_waktu->s;
$total_sisa=$menit.":".$detik;
//cek sesi aktif
$nomor_sesi=mysqli_num_rows($us);
//select sesi aktif
$ses=mysqli_query($con, "select * from sesi_soal where id='$user[id_soal]'");
$sesi=mysqli_fetch_assoc($ses);
$soa=mysqli_query($con, "select j.id_paket, j.id_sesi, j.nomor_soal, s.isi, s.id, s.a, s.b, s.c, s.d, s.e from user_jawaban j inner join soal s on s.id=j.id_soal where j.id_sesi='$user[id_soal]' and j.nomor_soal='1' and j.id_siswa='$id'");
$soale=mysqli_fetch_assoc($soa);
?>
<div class="sticky-top" style="margin:20px 12px;">
    <div id=""><span class="bg-primary border border-warning text-white" id="timer" style="padding:10px 20px;"></span><span class="bg-primary border border-warning text-white" id="timer" style="padding:10px 20px;margin-left:12px;"><?php echo $soale['nomor_soal'];?></span></div>
</div>
<div class="col-12 row row-imbang primary" style="margin-top:60px;margin-bottom:60px;">
    <div id="soal" name="soal" class="col-12">
        <p class="h4"><?php echo $sesi['nama_sesi'];?></p>
        <p>Soal Nomor <?php echo $soale['nomor_soal'];?></p>
        <div class="col-12" id="isi-soal" name="isi-soal">
            <?php echo $soale['isi'];?>
        </div>
        <div class="col-12" id="opsi-soal" name="opsi-soal">
        <fieldset class="form-group">
            <div class="row">
                <div class="col-sm-10">
                <?php 
                $aj=array("A","B","C","D","E");
                $opsi=array($soale['a'],$soale['b'],$soale['c'],$soale['d'],$soale['e']);
                for($i=0;$i<5;$i++){
                    ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="opsi" id="opsi_<?php echo $aj[$i];?>" value="<?php echo $aj[$i];?>">
                        <label class="form-check-label" for="opsi_<?php echo $aj[$i];?>">
                            <?php echo $opsi[$i];?>
                        </label>
                    </div>
                    <?php
                    }?>
                </div>
            </div>
        </fieldset>
        </div>
    </div>
    <div id="footer" class="col-12 row justify-content-end">
        <button style="margin-right:12px;" class="btn btn-secondary">Sebelumnya</button><button class="btn btn-primary">Berikutnya</button>
    </div>
    <script>
        $(document).ready(function(){
            var timer2 = "<?php echo $total_sisa;?>";
            var interval = setInterval(function() {
            var timer = timer2.split(':');
            //by parsing integer, I avoid all extra string processing
            var minutes = parseInt(timer[0], 10);
            var seconds = parseInt(timer[1], 10);
            --seconds;
            minutes = (seconds < 0) ? --minutes : minutes;
            if (minutes < 0) clearInterval(interval);
            seconds = (seconds < 0) ? 59 : seconds;
            seconds = (seconds < 10) ? '0' + seconds : seconds;
            //minutes = (minutes < 10) ?  minutes : minutes;
            $('#timer').html(minutes + ':' + seconds);
            timer2 = minutes + ':' + seconds;
            }, 1000);
        })
    </script>
</div>