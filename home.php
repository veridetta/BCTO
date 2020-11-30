<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bagja College Try Out</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-color:#f8f8f8">
<?php include 'header.php';?>
<?php 
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
    header('location:/bcto/index.php');
}?>
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
        <div class="col-12" style="background-color:white;padding:20px;">
            <p class="h4 text-warning"><i class="fa fa-calendar"></i> Event Terbaru</p>
            <hr>
            <div class="col-12 row">
            <form method="post"  id="form_buy" name="form_buy">
                <input type="hidden" name="id_paket_soal" id="id_paket_soal" value="">
                <input type="hidden" name="id_user" id="id_user" value="<?php echo $id;?>">
                <input type="submit" name="sb_buy" id="sb_buy" style="display:none;" value="ada">
            </form>
            <?php 
                //status user :
                //0 === tidak terdaftar
                //1 === belum mengerjakan
                //2 === sedang mengerjakan
                //3 === sudah
                //status soal
                //0 === idle
                //1 === siap
                //2 === mulai
                //3 === stop/masa lalu
                //4 === sesi pembahasan
                $qu=mysqli_query($con, "select * from paket_soal where status <3");
                $hit=mysqli_num_rows($qu);
                if($hit<1){
                    ?>
                    <div class="col-12 row" style="min-height:30px;">
                        <p class="h4 text-muted">Belum ada event terbaru</p>
                    </div>
                    <?php
                }
                while($query=mysqli_fetch_array($qu)){
                    $nama=$query['nama'];
                    $kategori=$query['kategori'];
                    $keterangan=$query['keterangan'];
                    $status=$query['status'];
                    $id_paket=$query['id'];
                    $tgl_mulai="2";
                    $tgl_selesai="3";
                    $us=mysqli_query($con, "select * from peserta_paket where id_paket='$id_paket' and id_user='$id' LIMIT 1");
                    $userx=mysqli_fetch_assoc($us);
                    $us_status=$userx['status'];
                    if($us_status===""){
                        $us_status=0;
                    }

            ?>
                <div class="col-3">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-title h4 text-center"><?php echo $nama;?></p>
                        </div>
                        <div class="card-body">
                            <p class="display-1 text-center"><i class="fa fa-file-o"></i></p>
                            <p class="text-center font-weight-bold" style="margin-bottom:0px;"><?php echo $kategori;?></p>
                            <p class="text-center" style="margin-bottom:0px;"><?php echo $keterangan;?></p>
                            <p class="text-center" style="margin-bottom:0px;"><?php echo $tgl_mulai." - ".$tgl_selesai;?></p>
                        </div>
                        <div class="card-footer">
                            <?php 
                            if($status==1 and $us_status==1){
                            ?>
                            <form method="post" action="start/launch.php">
                                <button class="btn button btn-success btn-block">Mulai Mengerjakan</button>
                            </form>
                            <?php    
                            }else if($us_status==0){ 
                                ?>
                                <button class="btn button btn-primary btn-block btn-buy" id="btn-buy<?php echo $id_paket;?>" paket="<?php echo $id_paket;?>">Daftar (98 <i class="text-warning fa fa-star"></i>)</button>
                                <?php
                            }else {
                                ?>
                                <button class="btn button btn-disabled btn-block">Sudah Terdaftar</button>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php
            };
            ?>
            </div>
        </div>
        <div class="col-12" style="background-color:white;padding:20px;margin-top:12px;">
            <p class="h4 text-secondary"><i class="fa fa-history"></i> Event Terakhir</p>
            <hr>
            <div class="col-12 row">
            <?php 
                //status user :
                //0 === tidak terdaftar
                //1 === belum mengerjakan
                //2 === sedang mengerjakan
                //3 === sudah
                //status soal
                //0 === idle
                //1 === siap
                //2 === mulai
                //3 === stop/masa lalu
                //4 === sesi pembahasan
                $qu2=mysqli_query($con, "select * from paket_soal where status >2");
                while($query2=mysqli_fetch_array($qu2)){
                    $nama2=$query2['nama'];
                    $kategori2=$query2['kategori'];
                    $keterangan2=$query2['keterangan'];
                    $status2=$query2['status'];
                    $id_paket2=$query2['id'];
                    $tgl_mulai2="2";
                    $tgl_selesai2="3";
                    $us2=mysqli_query($con, "select * from peserta_paket where id_paket='$id_paket2' and id_user='$id' LIMIT 1");
                    $userx2=mysqli_fetch_assoc($us2);
                    $us_status2=$userx2['status'];
                    if($us_status2===""){
                        $us_status2=0;
                    }

            ?>
                <div class="col-3">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-title h4 text-center"><?php echo $nama2;?></p>
                        </div>
                        <div class="card-body">
                            <p class="display-1 text-center"><i class="fa fa-file-o"></i></p>
                            <p class="text-center font-weight-bold" style="margin-bottom:0px;"><?php echo $kategori2;?></p>
                            <p class="text-center" style="margin-bottom:0px;"><?php echo $keterangan2;?></p>
                            <p class="text-center" style="margin-bottom:0px;"><?php echo $tgl_mulai2." - ".$tgl_selesai2;?></p>
                        </div>
                        <div class="card-footer">
                            <?php 
                            if($status2==4 and $us_status2==3){
                            ?>
                            <form method="post" action="pembahasan.php">
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                <input type="hidden" name="id_paket" value="<?php echo $id_paket2;?>">
                                <button class="btn button btn-primary btn-block">Lihat Pembahasan</button>
                            </form>
                            <?php    
                            }else if($status2==3 and $us_status2==3){ 
                                ?>
                                <button class="btn button btn-disabled btn-block">Menunggu Pembahasan</button>
                                <?php
                            }else {
                                ?>
                                <button class="btn button btn-disabled btn-block">Tidak Terdaftar</button>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php
            };
            ?>
            </div>
        </div>
    </div>
    <?php include 'footer.php';?>
   <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="judul">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <span id="pesan"></span>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
    <script>
    $(".btn-buy").click(function(e){
        var vale = $(this).attr("paket");
        $("#id_paket_soal").val(vale);
        $("#sb_buy").trigger("click");
    })
    $('#form_buy').submit(function(e){
        e.preventDefault();
        $.ajax({
        url: 'action/buy.php',
        type: 'POST',
            data: $(this).serialize(),
            dataType: "json"
            })
        .done(function(data){
            if(data.success) {
                $('#myModal').modal('show'); 
                setTimeout(function() {
                    window.location.replace("home.php");
                }, 1500);
            } else {
                //info.html(data.pesan).css('color', 'red').slideDown();
                $('#myModal').modal('show'); 
            }
            $("#judul").html(data.judul);
            $("#pesan").html(data.pesan);
        })
        .fail(function(){
            alert('Maaf, submit gagal..');
        });
    });

    </script>
</body>
</html>