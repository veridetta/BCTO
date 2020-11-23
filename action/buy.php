<?php
    if($_POST){
        include '../config/connect.php';
        $return_arr= array(
                    "id" => '',
                    "pesan" => '',
                    "judul"=>'',
                    "success" => false);
        $id_paket = mysqli_real_escape_string($con,$_POST['id_paket_soal']);
        $id_user = mysqli_real_escape_string($con,$_POST['id_user']);
        $harga=98;
        $so=mysqli_query($con, "select * from paket_soal where id='$id_paket'");
        $soal=mysqli_fetch_assoc($so);
        $harga=$soal['bintang'];
        $sa=mysqli_query($con, "select * from riwayat_bintang where id_users='$id_user' order by id desc limit 1");
        $sal=mysqli_fetch_assoc($sa);
        $hitung=mysqli_num_rows($sa);
        $saldo=$sal['saldo'];
            if($hitung>=$harga){
                $sisa=$hitung-$harga;
                //status riwayat
                //1 topup
                //2 pembelian
                $be=mysqli_query($con, "insert into riwayat_bintang (id_users, nominal, status, saldo) values('$id_user','$harga','2','$sisa')");
                if($be){
                    //status user :
                    //0 === tidak terdaftar
                    //1 === belum mengerjakan
                    //2 === sedang mengerjakan
                    //3 === sudah
                    $pak=mysqli_query($con, "insert into peserta_paket (id_user, id_paket, status) values ('$id_user','$id_paket','1')");
                    if($pak){
                        $pesan = "Pembayaran Berhasil, kamu akan segera di alihkan ";
                        $judul="Pembelian berhasil";
                        $return_arr['pesan']=$pesan;
                        $return_arr['judul']=$judul;
                        $return_arr['success']=true;
                        $output = json_encode($return_arr);
                        die($output);
                    }else{
                        $pesan = "Error tidak diketahui ";
                        $judul="Pembelian gagal";
                        $return_arr['pesan']=$pesan;
                        $return_arr['judul']=$judul;
                        $return_arr['success']=false;
                        $output = json_encode($return_arr);
                        die($output);
                    }
                    
                }else{
                    $pesan = "Error tidak diketahui ";
                    $judul="Pembelian gagal";
                    $return_arr['pesan']=$pesan;
                    $return_arr['judul']=$judul;
                    $return_arr['success']=false;
                    $output = json_encode($return_arr);
                    die($output);
                }
            }else{
                $pesan = "Bintang kamu tidak mencukupi ";
                $judul="Pembelian gagal";
                $return_arr['pesan']=$pesan;
                $return_arr['judul']=$judul;
                $return_arr['success']=false;
                $output = json_encode($return_arr);
                die($output);
            }
        $qu = mysqli_query($con, "select * from user where email='$email' and password='$password'");
    }else{
        echo "no post";
    }
?>