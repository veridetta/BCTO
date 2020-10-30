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
    $ref=$_SESSION['ref'];
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
                <span class="h4 text-right"><i class="text-warning fa fa-star"></i> 300</span>
                <button class="btn btn-outline-warning h4">Tambah</button>
            </div>
            <hr>
        </div>
        <div class="col-12" style="background-color:white;padding:20px;">
            <p class="h4 text-warning"><i class="fa fa-calendar"></i> Event Terbaru</p>
            <hr>
            <div class="col-12 row">
                <div class="col-3">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-title">To UTBK 1</p>
                        </div>
                        <div class="card-body">
                            <p>20 Oktober 2020</p>
                        </div>
                        <div class="card-footer">
                            <button class="btn button btn-success btn-block">Daftar Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12" style="background-color:white;padding:20px;margin-top:12px;">
            <p class="h4 text-secondary"><i class="fa fa-history"></i> Event Terakhir</p>
            <hr>
            <div class="col-12 row">
                <div class="col-3">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-title text-secondary">To UTBK 1</p>
                        </div>
                        <div class="card-body">
                            <p class="text-secondary">20 Oktober 2020</p>
                        </div>
                        <div class="card-footer">
                            <button class="btn button btn-primary btn-block">Pembahasan</button>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-title text-secondary">To UTBK 1</p>
                        </div>
                        <div class="card-body">
                            <p class="text-secondary">20 Oktober 2020</p>
                        </div>
                        <div class="card-footer">
                            <button class="btn button btn-muted btn-block" disabled>Kamu tidak mengikuti event ini</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php';?>
</body>
</html>