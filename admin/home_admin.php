<?php
session_start();
include("../System/check.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php include("../System/head.php") ?>
    <style>
        body {
            background-color: #343f4b;
        }
    </style>
</head>

<body>
    <div id="preloader">
        <div class="preloader">
            <img src="../Bootstrap/images/preloader.gif" alt="preloader">
        </div>
    </div>
    <?php include("../System/nav3.php") ?>
    <section class="hero-section overlay bg-cover" data-background="../Bootstrap/images/img/courses-03.jpg">
        <div class="container">
            <div class="hero-slider">
                <!-- slider item -->
                <div class="hero-slider-item">
                    <div class="row">
                        <div class="col-md-8">
                            <h1 class="text-white" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".1">Hai Admin! Bagaimana kabarmu hari ini??</h1>
                      </div>
                    </div>
                </div>
                <!-- slider item -->
                <div class="hero-slider-item">
                    <div class="row">
                        <div class="col-md-8">
                            <h1 class="text-white" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".1">Hai Admin! Bagaimana kabarmu hari ini??</h1>
  
                        </div>
                    </div>
                </div>
                <!-- slider item -->
                <div class="hero-slider-item">
                    <div class="row">
                        <div class="col-md-8">
                            <h1 class="text-white" data-animation-out="fadeOutDown" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">Hai Admin! Bagaimana kabarmu hari ini??</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<!-- about us -->
<section class="section" style="background-color: white;">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 order-2 order-md-1">
          <h2 class="section-title">About MinterYuk</h2>
          <p style="text-align: justify;"> MinterYuk adalah sebuah website yang dibuat oleh kelompok mahasiswa di institut terkenal di Surabaya bernama Institut Sains dan Teknologi Terpadu Surabaya (ISTTS). MinterYuk merupakan website yang menunjang kebutuhan para pelajar untuk bisa mendalami tentang materi yang sedang mereka pelajari atau ingin merek dalami lagi. Pada web ini terdapat beberapa topik yang sangat menarik dan disajikan dalam bentuk video. Video yang ditampikanpun juga sangat menarik baik kontennya dan sang mentorpun juga rata-rata merupakan orang yang sudah dikenal di Indonesia. Dan cara penyampaian yang diberikan oleh mentor sangat bagus. Sehingga customer tidak merasa bosan dengan materi yang disampaikan oleh para mentor. Keuntungan yang didapatkan dari menggunakan web ini ialah kalian bisa belajar dengan mudah tanpa harus mengeluarkan biaya yang besar dan video juga bisa diliat berulang - ulang.</p>
          <a href="General/about.php" class="btn btn-primary-outline">Learn more</a>
        </div>
        <div class="col-md-6 order-1 order-md-2 mb-4 mb-md-0">
          <img class="img-fluid w-100" src="../Bootstrap/images/img/Online-Courses.jpg" alt="about image">
        </div>
      </div>
    </div>
  </section>
  <!-- /about us -->
  <section class="section bg-cover" data-background="../Bootstrap/images/backgrounds/success-story.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-sm-4 position-relative success-video">
          <a class="play-btn venobox" href="https://youtu.be/nA1Aqp0sPQo" data-vbtype="video">
            <i class="ti-control-play"></i>
          </a>
        </div>
        <div class="col-lg-6 col-sm-8">
          <div class="bg-white p-5">
            <h2 class="section-title">Success Stories of MinterYuk</h2>
            <p>Dibalik terbentuknya aplikasi ini memiliki banyak kisah. Web ini dibuat pada awalnya adalah sekumpulan mahasiswa yang merasa bingung akan membuat tugas proyek seperti apa. Pada akhirnya, mereka memliki pikiran yaitu untuk membuat sebuah web yang dapat menunjang pembelajaran para pelajar secara mudah dan cepat. Banyak lika - liku yang harus dihadapi dikarenakan salah satu anggotanya bisa dikatakan sangat membingungkan karena para anggota kelompok yang lainnya harus menuruti yang ia mau. Akan tetapi, pada akhirnya mereka semua memiliki jalan keluar dan terbentuklah sebuah web ini.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
    <?php
    include("../System/footer.php");
    include("../System/bot.php");
    ?>
     <script src="../System/jquery.js"></script>
  <script>
    for (let index = 1; index < 7; index++) {
      if (index == 1) {
        $("#n" + index).addClass("active");
      } else {
        $("#n" + index).removeClass("active");
      }
    }
  </script>