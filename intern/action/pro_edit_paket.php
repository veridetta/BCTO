<?php
if($_POST){
    include '../../config/connect.php';
    header('Content-Type: application/json');
    $paket_id=mysqli_real_escape_string($con,$_POST['ide']);
    $status=mysqli_real_escape_string($con,$_POST['kategori']);
    $bintang=mysqli_real_escape_string($con,$_POST['harga']);
    $mulai=mysqli_real_escape_string($con,$_POST['mulai']);
    $akhir=mysqli_real_escape_string($con,$_POST['akhir']);
    $keterangan=mysqli_real_escape_string($con,$_POST['keterangan']);
    $return_arr= array(
        "id" => '',
        "pesan" => '',
        "success" => false);
        $qu=mysqli_query($con, "update paket_soal set status='$status', bintang='$bintang', tgl_mulai='$mulai', tgl_selesai='$akhir', keterangan='$keterangan' where id='$paket_id'");
        if($qu){
            $pesan = "Berhasil, Soal berhasil dibuat";
            $return_arr['pesan']=$pesan;
            $return_arr['success']=true;
            $output = json_encode($return_arr);
            die($output);
        }else{
            $pesan = "Gagal, silahkan coba lagi.";
            $return_arr['pesan']=$pesan;
            $return_arr['success']=false;
            $output = json_encode($return_arr);
            die($output);
        }
    }

?>