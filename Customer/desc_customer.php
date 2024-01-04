<?php
session_start();
include("../Bootstrap/b.php");
include("../System/connect.php");
include("../System/check.php");
$id = $_GET["id"];
$id_user = $_SESSION['id_user'];
$sudahada = $conn->query("select * from transaksi where fk_kelas = '$id' and fk_user = '$id_user' and transaksi.status='1'");
$sudahjoin= $sudahada->rowCount(); 

$datakelas = $conn->query("SELECT * FROM kelas WHERE id_kelas = '$id'")->fetchAll(PDO::FETCH_ASSOC);
$judul = $datakelas[0]['nama_kelas'];
$ketkelas = $datakelas[0]['ket_kelas'];
$rating = $datakelas[0]['rating'];
$mentor = $datakelas[0]['fk_mentor'];
$gambar = $datakelas[0]['img'];
$hargakelas = $datakelas[0]['harga_kelas'];
$datamentor = $conn->query("SELECT * FROM mentor WHERE id_mentor = '$mentor'")->fetchAll(PDO::FETCH_ASSOC);
$namamentor = $datamentor[0]["namalengkap_mentor"];
$skillmentor = $datamentor[0]["skill"];
$imgmentor = $datamentor[0]["img"];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Description</title>
    <?php include("../System/head.php") ?>
    <style>
           .container{
            margin-left: 4vw;
            
        }
        .container1{
            margin-left: 55vw;
            
        }
        .container2{
            margin-left: 5vw;
            font-size: 30px;
        }
        .container3{
            position: fixed;
            background-color: aqua;
            top: 91%;
            left: 0px;
            width: 100%;
        }
    </style>
</head>

<body id="body">
    <div id="preloader">
        <div class="preloader">
            <img src="../Bootstrap/images/preloader.gif" alt="preloader">
        </div>
    </div>
    <?php include("../System/nav1.php") ?>
    <section class="page-title-section overlay" data-background="../Bootstrap/images/backgrounds/page-title.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-inline custom-breadcrumb">
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="#">Description Class</a></li>
                        <li class="list-inline-item text-white h3 font-secondary "></li>
                    </ul>
                    <p class="text-lighten">Kelas pembelajaran kami menawarkan layanan yang terbaik untuk kesenjangan pendidikan serta kerja sama dengan ratusan universitas</p>
                </div>
            </div>
        </div>
    </section>
    <section class="section-sm">
  <div class="container">
    <div class="row">
      <div class="col-12 mb-4">
        <!-- course thumb -->

        <?php
          echo "<img style='height: 73vh;' class='img-fluid w-100' src='../Bootstrap/images/class/".$gambar."'>";
        ?>
      </div>
    </div>
    <!-- course info -->
    <div class="row align-items-center mb-5">
      <div class="col-xl-3 order-1 col-sm-6 mb-4 mb-xl-0">
        <h2><?php echo $judul ?></h2>
      </div>
      <div class="col-xl-6 order-sm-3 order-xl-2 col-12 order-2">
        <ul class="list-inline text-xl-center">
          <li class="list-inline-item mr-4 mb-3 mb-sm-0">
            <div class="d-flex align-items-center">
              <i class="ti-book text-primary icon-md mr-2"></i>
              <div class="text-left">
                <h6 class="mb-0">COURSES</h6>
                <p class="mb-0">06 Month</p>
              </div>
            </div>
          </li>
          <li class="list-inline-item mr-4 mb-3 mb-sm-0">
            <div class="d-flex align-items-center">
              <i class="ti-alarm-clock text-primary icon-md mr-2"></i>
              <div class="text-left">
                <h6 class="mb-0">DURATION</h6>
                <p class="mb-0">03 Hours</p>
              </div>
            </div>
          </li>
          <li class="list-inline-item mr-4 mb-3 mb-sm-0">
            <div class="d-flex align-items-center">
              <i class="ti-wallet text-primary icon-md mr-2"></i>
              <div class="text-left">
                <h6 class="mb-0">FEE</h6>
                <p class="mb-0">From: Rp.<?php echo $hargakelas ?></p>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <div class="col-xl-3 text-sm-right text-left order-sm-2 order-3 order-xl-3 col-sm-6 mb-4 mb-xl-0">
      <a href="../Customer/transaction_customer.php?id=<?=$id?>" class="btn btn-primary">Buy now</a>
      </div>
      <!-- border -->
      <div class="col-12 mt-4 order-4">
        <div class="border-bottom border-primary"></div>
      </div>
    </div>
    <!-- course details -->
    <div class="row">
      <div class="col-12 mb-4">
        <h3>About Course</h3>
        <!-- codingdibawah sini -->
        <p><?php echo $ketkelas ?></p>
      </div>
      <div class="col-12 mb-4">
        <h3 class="mb-3">Material</h3>
        <ul class="list-styled">
        <!-- linkmateri -->
        <?php
          $stmt= $conn->prepare("SELECT * FROM materi WHERE fk_kelas = '$id'"); 
          $stmt->execute(); 
          foreach($stmt as $rows){
            if($sudahjoin == 1) {
              echo "<li><a href='../Customer/materialclass_customer.php?id=".$rows['id_materi']."&kelas=".$id."'>".$rows['nama_materi']."</a></li>";
            }
            else {
              echo "<li>".$rows['nama_materi']."</li>";
            }
          }
        ?>
        </ul>
      </div>
      <!-- teacher -->
      <div class="col-12">
        <h5 class="mb-3">Teacher</h5>
        <div class="d-flex justify-content-between align-items-center flex-wrap">
          <div class="media mb-2 mb-sm-0">
          <?php echo "<img style='width: 10vw;height: 20vh;' class='mr-4 img-fluid' src='../Bootstrap/images/teachers/".$imgmentor."'>";?>
            <div class="media-body">
              <h4 class="mt-0"><?= $namamentor?></h4>
              <?= $skillmentor?>
            </div>
          </div>
          <div class="social-link">
            <h6 class="d-none d-sm-block">Social Link</h6>
            <ul class="list-inline">
              <li class="list-inline-item"><a class="d-inline-block p-2" href="https://www.facebook.com/istts.page/"><i class="ti-facebook text-primary"></i></a></li>
              <li class="list-inline-item"><a class="d-inline-block p-2" href="https://twitter.com/"><i class="ti-twitter text-primary"></i></a></li>
              <li class="list-inline-item"><a class="d-inline-block p-2" href="https://www.linkedin.com/"><i class="ti-linkedin text-primary"></i></a></li>
              <li class="list-inline-item"><a class="d-inline-block p-2" href="https://www.instagram.com/haloistts/"><i class="ti-instagram text-primary"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="border-bottom border-primary mt-4"></div>
      </div>
    </div>
  </div>
</section>
<!-- /section -->

<!-- related course -->
<section class="section pt-0">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="section-title">Related Course</h2>
      </div>
    </div>
    <div class="row justify-content-center">
      <?php 
        $qry  = $conn->query("select * from kelas"); 

        $acak = []; 
        for($i = 0; $i < 3; $i++) {
           do {
            $valid = 1; 
            $angka = rand(0, $qry->rowCount() - 1);
            for($j = 0; $j < $i; $j++) { if($acak[$j] == $angka) { $valid = 0; }}
           } while($valid == 0); 

           $acak[] = $angka; 
        }
        $i = 0; 
        foreach($qry as $rows) {
          $cetak = 0; 
          for($j = 0; $j < 3; $j++) 
          { if($acak[$j] == $i) { $cetak = 1; } }

          if($cetak == 1) {
      ?>
          <!-- course item -->
          <div class="col-lg-4 col-sm-6 mb-5">
            <div class="card p-0 rounded-0 hover-shadow">
            <?php
              echo "<img style='width:22.65vw; height: 28vh;' class='card-img-top rounded-0' src='../Bootstrap/images/class/".$rows["img"]."' alt='course thumb'> ";
            ?>
              <div class="card-body">
                <ul class="list-inline mb-2">
                </ul>
                  <h4 class="card-title"><?php echo $rows['nama_kelas']; ?></h4>
                  <p class="card-text mb-4" style="overflow: hidden; height:15vh; text-overflow: ellipsis; max-width: 100%;"><?= $rows["ket_kelas"] ?></p>
                <!-- <p class="card-text mb-4"> </p> -->
                <a href="../Customer/desc_customer.php?id=<?=$rows['id_kelas']?>" class="btn btn-primary btn-sm">Apply now</a>
              </div>
            </div>
          </div>
      <?php 
          }
          $i++; 
        }
      ?>
    </div>
  </div>
</section>
</div>
    <?php
    include("../System/footer.php");
    include("../System/bot.php");
    ?> <script src="../System/jquery.js"></script>
      <script>
     for (let index = 1; index < 7; index++) {
            if(index==3){
                $("#n"+index).addClass("active");
            }
            else{
                $("#n"+index).removeClass("active");
            }   
        }</script>