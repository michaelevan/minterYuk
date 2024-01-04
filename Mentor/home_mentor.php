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
           .container2 {
            margin-top: 15vw;
            width: 100%;
            height: 600px;
        }
        section{
            padding: 2% 5% 2% 5%;
            height: 800px;
        }
        #full{
            padding: 2% 0px 0px 20%;
        }
        .isi{
            background-color: transparent;
            height: 30%;
            width: 70%;
            box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.3);
        }
        .textbaru{
            opacity: 50%;
            color: white;
        }
        .baris1{
            margin-bottom: 2%;
        }
        .kotak1{
            border: 3px solid grey;
            width: 15vw;
            height: 7vh;
            border-radius: 1vw;
            float: left;
        }
        .kotak2{
            border: 3px solid grey;
            margin-left: 5vw;
            width: 10vw;
            height: 7vh;
            border-radius: 1vw;
            float: left;
        }
        .kotakKelas{
            width: 20vw;
            height: 10vh;
            border-radius: 1vw;
            float: right;
        }
        #search{
            width: 100%;
            height: 100%;
        }
        #filter{
            width: 100%;
            height: 100%;
        }
        #btnKelas{
            width: 100%;
            height: 100%;
        }

        .kelas1{
            margin-top: 10%;
            width: 100%;
        }
        #cooking{
            width: 20vw;
            height: 20vh;
            float: left;
        }
        .subkelas1{
            margin-left: 25%;
            color: white;
        }
        .judul1{
            font-size: x-large;
            font-weight: bold;
        }
        .desc1{
            font-size: medium;
            border-radius: 1vw;
            border: 3px solid lightslategrey;
        }

        .kelas2{
            width: 100%;
            margin-top: 7%;
        }
        #foto{
            width: 20vw;
            height: 20vh;
            float: left;
        }
        .subkelas2{
            margin-left: 25%;
            color: white;
        }
        .judul2{
            font-size: x-large;
            font-weight: bold;
        }
        .desc2{
            font-size: medium;
            border-radius: 1vw;
            border: 3px solid lightslategrey;
        }

        .kelas3{
            width: 100%;
            margin-top: 7%;
        }
        #business{
            width: 20vw;
            height: 20vh;
            float: left;
        }
        .subkelas3{
            margin-left: 25%;
            color: white;
        }
        .judul3{
            font-size: x-large;
            font-weight: bold;
        }
        .desc3{
            font-size: medium;
            border-radius: 1vw;
            border: 3px solid lightslategrey;
        }
    </style>
</head>

<body id="body">
    <div id="preloader">
        <div class="preloader">
            <img src="../Bootstrap/images/preloader.gif" alt="preloader">
        </div>
    </div>
    <?php include("../System/nav2.php") ?>
    <section class="hero-section overlay bg-cover" data-background="../Bootstrap/images/img/courses-03.jpg">
  <div class="container">
    <div class="hero-slider">
      <!-- slider item -->
      <div class="hero-slider-item">
        <div class="row">
          <div class="col-md-8">
            <h1 class="text-white" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".1">Hai mentor bagaimana kabar mu hari ini? Semoga kabarmu baik- baik saja ya!</h1>
            <!--<a href="contact.html" class="btn btn-primary" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".7">Apply now</a>-->
          </div>
        </div>
      </div>
    </section>

<!-- ketika new home -->
    <!-- <div id="full">
      <div class="isi">
          <center>
          <button type="submit" name="make" id="make" class="btn btn-primary">+ Make a new Class</button><br>
          <img src="../Boothstrap/asset/study.png" id="study">
          <div class="textbaru">Anda belum memiliki kelas apapun</div>
          </center>
      </div>
    </div> -->
<!-- ketika sudah membuat kelas -->
<!-- <div id="container">
</div>
<div class="baris1">
    <div class="kotak1">
        <input type="text" name="search" id="search" placeholder="Cari kelas anda">
    </div>
    <div class="kotak2">
        <select name="filter" id="filter">
            <option value="terbaru">terbaru</option>
            <option value="terlama">terlama</option>
            <option value="tertinggi">tertinggi</option>
            <option value="terendah">terendah</option>
        </select>
    </div>
    <div class="kotakKelas">
        <button type="submit" id="btnKelas" name="btnKelas" class="btn btn-secondary">+ Buat Kelas</button>
    </div>
</div>

<div class="kelas1">
    <img src="../Boothstrap/asset/asset3.jpg" id="cooking">
    <div class="subkelas1">
        <div class="judul1">Cooking</div>
        <div class="desc1">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit praesentium commodi totam quo, et incidunt facilis qui suscipit id, minima rerum ipsum deleniti dolores accusamus quod. Animi id vero perspiciatis?</div>
    </div>
</div>

<div class="kelas2">
    <img src="../Boothstrap/asset/asset4.jpg" id="foto">
    <div class="subkelas2">
        <div class="judul2">photography</div>
        <div class="desc2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit praesentium commodi totam quo, et incidunt facilis qui suscipit id, minima rerum ipsum deleniti dolores accusamus quod. Animi id vero perspiciatis?</div>
    </div>
</div>

<div class="kelas3">
    <img src="../Boothstrap/asset/asset5.jpg" id="business">
    <div class="subkelas3">
        <div class="judul3">business</div>
        <div class="desc3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit praesentium commodi totam quo, et incidunt facilis qui suscipit id, minima rerum ipsum deleniti dolores accusamus quod. Animi id vero perspiciatis?</div>
    </div>
</div> -->
</section>
 <!-- about us -->
 <section class="section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 order-2 order-md-1">
          <h2 class="section-title">About MinterYuk</h2>
          <p style="text-align: justify;"> MinterYuk adalah sebuah website yang dibuat oleh kelompok mahasiswa di institut terkenal di Surabaya bernama Institut Sains dan Teknologi Terpadu Surabaya (ISTTS). MinterYuk merupakan website yang menunjang kebutuhan para pelajar untuk bisa mendalami tentang materi yang sedang mereka pelajari atau ingin merek dalami lagi. Pada web ini terdapat beberapa topik yang sangat menarik dan disajikan dalam bentuk video. Video yang ditampikanpun juga sangat menarik baik kontennya dan sang mentorpun juga rata-rata merupakan orang yang sudah dikenal di Indonesia. Dan cara penyampaian yang diberikan oleh mentor sangat bagus. Sehingga customer tidak merasa bosan dengan materi yang disampaikan oleh para mentor. Keuntungan yang didapatkan dari menggunakan web ini ialah kalian bisa belajar dengan mudah tanpa harus mengeluarkan biaya yang besar dan video juga bisa diliat berulang - ulang.</p>
          <a href="../General/about.php" class="btn btn-primary-outline">Learn more</a>
        </div>
        <div class="col-md-6 order-1 order-md-2 mb-4 mb-md-0">
          <img class="img-fluid w-100" src="../Bootstrap/images/img/Online-Courses.jpg" alt="about image">
        </div>
      </div>
    </div>
    
  </section>
  <!-- /about us -->


  <!-- success story -->
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
  <!-- /success story -->

 
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