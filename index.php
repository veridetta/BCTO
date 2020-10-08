<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bagja College Try Out</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
<?php include 'footer.php';?>
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