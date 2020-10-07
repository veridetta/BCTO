<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bagja College Try Out</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
  #carouselExampleIndicators .nav a small
  {
      display: block;
  }
  #carouselExampleIndicators .nav
  {
      background: ;
      padding:8px;
  }
  #carouselExampleIndicators .nav li
  {
      padding:8px;
  }
  .nav-justified > li > a
  {
      color:black;
      border-radius: 0px;
  }
  .nav-pills>li[data-slide-to="0"].active  { background-color: #16a085; }
  .nav-pills>li[data-slide-to="1"].active  { background-color: #e67e22; }
  .nav-pills>li[data-slide-to="2"].active  { background-color: #2980b9; }

  .nav-pills>li[data-slide-to="0"].active a { color:white; }
  .nav-pills>li[data-slide-to="1"].active a { color:white; }
  .nav-pills>li[data-slide-to="2"].active a { color:white; }
  .footer{
    background-color:#3f3f3f;
    padding:26px;
  
  }
  .footer p, h1, h2, h3, a{
    color:white;
    margin-bottom:10px;
  }
  .footer p{
    margin-bottom:4px !important;
  }
  </style>
</head>
<body>
<?php include 'header.php';?>
<div class="jumbotron text-center">
  <h1>BC TRYOUT</h1>
  <p>Situs Try Out Online Relevan dan Terupdate</p> 
</div>
  
<div class="container">
  <div class="col-12" style="min-height:100vh;" id="tentang" name="tentang">
    <p class="display-4 text-center">Apa sih BC-Tryout itu?</p>
    <hr>
    <div class="row">
      <div class="col-5"></div>
      <div class="col-7">
          <p class="h1">BC Tryout</p>
          <p class="text">Media belajar berbasis teknologi yang terfokus pada kemampuan menjawab soal untuk persiapan ujianmu yang lebih baik. Dengan sistem yang selalu berkembang sesuai kebutuhan, Eduka hadir untuk menjadi teman berjuang ke perjalanan impianmu.</p>
          <button class="btn btn-primary">Selengkapnya</button>
      </div>
    </div>
  </div>
  <div class="col-12 " style="min-height:100vh" id="produk" name="produk">
    <p class="display-4 text-center">Produk Kami</p>
    <hr>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="col-12 row justify-content-center">
          <div class="col-8">
            <ul class="nav nav-pills nav-justified nav-tabs">
              <li data-target="#carouselExampleIndicators" class="text-center active" data-slide-to="0" ><a href="#">Try Out UTBK</a></li>
              <li data-target="#carouselExampleIndicators" class="text-center" data-slide-to="1"><a href="#">Try Out Simak UI</a></li>
              <li data-target="#carouselExampleIndicators" class="text-center" data-slide-to="2"><a href="#">Lainnya</a></li>
            </ul>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="card" style="padding:30px 20px 20px 30px">
                    <div class="card-body">
                    <p class="h1 text-primary">Tryout UTBK</p>
                    Platform pendidikan terdepan bagi pelajar Indonesia dengan sistem teknologi terkini untuk bantu kamu gapai PTN impian.
                    </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="card" style="padding:30px 20px 20px 30px">
                    <div class="card-body">
                    <p class="h1 text-primary">Tryout SIMAK UI</p>
                    Platform pendidikan terdepan bagi pelajar Indonesia dengan sistem teknologi terkini untuk bantu kamu gapai PTN impian.
                    </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="card" style="padding:30px 20px 20px 30px">
                    <div class="card-body">
                    <p class="h1 text-primary">Tryout Lainnya</p>
                    Platform pendidikan terdepan bagi pelajar Indonesia dengan sistem teknologi terkini untuk bantu kamu gapai PTN impian.
                    </div>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
    </div>
     <!--END-->
  </div>
</div>


<script>
  $(document).ready( function() {
      $('#carouselExampleIndicators').carousel({
        interval:   4000
    });
    
    var clickEvent = false;
    $('#carouselExampleIndicators').on('click', '.nav a', function() {
        clickEvent = true;
        $('.nav li').removeClass('active');
        $(this).parent().addClass('active');		
    }).on('slid.bs.carousel', function(e) {
      if(!clickEvent) {
        var count = $('.nav').children().length -1;
        var current = $('.nav li.active');
        current.removeClass('active').next().addClass('active');
        var id = parseInt(current.data('slide-to'));
        if(count == id) {
          $('.nav li').first().addClass('active');	
        }
      }
      clickEvent = false;
    });
  });
</script>
</body>
</html>