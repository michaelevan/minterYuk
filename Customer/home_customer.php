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
</head>

<body id="body">
  <div id="preloader">
    <div class="preloader">
      <img src="../Bootstrap/images/preloader.gif" alt="preloader">
    </div>
  </div>
  <?php include("../System/nav1.php") ?>
  <section class="hero-section overlay bg-cover" data-background="../Bootstrap/images/img/courses-03.jpg">
    <div class="container">
      <div class="hero-slider">
        <!-- slider item -->
        <div class="hero-slider-item">
          <div class="row">
            <div class="col-md-8">
              <h1 class="text-white" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".1">Hai kawan bagaimana kabar mu hari ini? Semoga kabarmu baik- baik saja ya!</h1>

              <!--<a href="contact.html" class="btn btn-primary" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".7">Apply now</a>-->
            </div>
          </div>
        </div>
        <!-- slider item -->
        <div class="hero-slider-item">
          <div class="row">
            <div class="col-md-8">
              <h1 class="text-white" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".1">Terima kasih telah mempercayakan MinterYuk sebagai pilihan belajar anda!</h1>
              <!--<a href="contact.html" class="btn btn-primary" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".7">Apply now</a>-->
            </div>
          </div>
        </div>
        <!-- slider item -->
        <div class="hero-slider-item">
          <div class="row">
            <div class="col-md-8">
              <h1 class="text-white" data-animation-out="fadeOutDown" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">Nikmati berbagai materi yang disediakan oleh kami!</h1>
              <!--<a href="contact.html" class="btn btn-primary" data-animation-out="fadeOutDown" data-delay-out="5" data-duration-in=".3" data-animation-in="zoomIn" data-delay-in=".7">Apply now</a>-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /hero slider -->



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

  <!-- events -->
  <!-- <section class="section bg-gray">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="d-flex align-items-center section-title justify-content-between">
            <h2 class="mb-0 text-nowrap mr-3">Upcoming Events</h2>
            <div class="border-top w-100 border-primary d-none d-sm-block"></div>
            <div>
              <a href="events.html" class="btn btn-sm btn-primary-outline ml-sm-3 d-none d-sm-block">see all</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center"> -->
  <!-- event -->
  <!-- <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
          <div class="card border-0 rounded-0 hover-shadow">
            <div class="card-img position-relative">
              <img class="card-img-top rounded-0" src="../Bootstrap/images/events/event-1.jpg" alt="event thumb">
              <div class="card-date"><span>18</span><br>December</div>
            </div>
            <div class="card-body"> -->
  <!-- location -->
  <!-- <p><i class="ti-location-pin text-primary mr-2"></i>Dhanmondi Lake, Dhaka</p>
              <a href="event-single.html">
                <h4 class="card-title">Lorem ipsum dolor amet, consectetur adipisicing.</h4>
              </a>
            </div>
          </div>
        </div> -->
  <!-- event -->
  <!-- <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
          <div class="card border-0 rounded-0 hover-shadow">
            <div class="card-img position-relative">
              <img class="card-img-top rounded-0" src="../Bootstrap/images/events/event-2.jpg" alt="event thumb">
              <div class="card-date"><span>21</span><br>December</div>
            </div>
            <div class="card-body"> -->
  <!-- location -->
  <!-- <p><i class="ti-location-pin text-primary mr-2"></i>Dhanmondi Lake, Dhaka</p>
              <a href="event-single.html">
                <h4 class="card-title">Lorem ipsum dolor amet, consectetur adipisicing.</h4>
              </a>
            </div>
          </div>
        </div> -->
  <!-- event -->
  <!-- <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
          <div class="card border-0 rounded-0 hover-shadow">
            <div class="card-img position-relative">
              <img class="card-img-top rounded-0" src="../Bootstrap/images/events/event-3.jpg" alt="event thumb">
              <div class="card-date"><span>23</span><br>December</div>
            </div>
            <div class="card-body"> -->
  <!-- location -->
  <!-- <p><i class="ti-location-pin text-primary mr-2"></i>Dhanmondi Lake, Dhaka</p>
              <a href="event-single.html">
                <h4 class="card-title">Lorem ipsum dolor amet, consectetur adipisicing.</h4>
              </a>
            </div>
          </div>
        </div>
      </div> -->
  <!-- mobile see all button -->
  <!-- <div class="row">
        <div class="col-12 text-center">
          <a href="course.html" class="btn btn-sm btn-primary-outline d-sm-none d-inline-block">sell all</a>
        </div>
      </div>
    </div>
  </section> -->
  <!-- /events -->

  <!-- teachers -->
  <section class="section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="section-title">Our Teachers</h2>
        </div>
        <!-- teacher -->
        <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
          <div class="card border-0 rounded-0 hover-shadow">
            <img class="card-img-top rounded-0" src="../Bootstrap/images/teachers/teachers4.jpg" alt="teacher" style="width: 300px;">
            <div class="card-body">
              <h4 class="card-title">Michelle Annabelle</h4>
              <div class="d-flex justify-content-between">
                <span>Programmer</span>
                <ul class="list-inline">
                  <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-facebook"></i></a></li>
                  <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
                  <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-google"></i></a></li>
                  <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-linkedin"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- teacher -->
        <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
          <div class="card border-0 rounded-0 hover-shadow">
            <img src="../Bootstrap/images/teachers/teachers6.jpg" alt="teacher" style="width: 300px;">
            <div class="card-body">
              <h4 class="card-title">Felia Gabriela</h4>
              <div class="d-flex justify-content-between">
                <span>Ceo of Business Company</span>
                <ul class="list-inline">
                  <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-facebook"></i></a></li>
                  <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
                  <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-google"></i></a></li>
                  <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-linkedin"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- teacher -->
        <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
          <div class="card border-0 rounded-0 hover-shadow">
            <img class="card-img-top rounded-0" src="../Bootstrap/images/teachers/teachers5.jpg" alt="teacher">
            <div class="card-body">
              <h4 class="card-title">Hans Leo</h4>
              <div class="d-flex justify-content-between">
                <span>Art Designer</span>
                <ul class="list-inline">
                  <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-facebook"></i></a></li>
                  <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
                  <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-google"></i></a></li>
                  <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-linkedin"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- blog -->
  <!-- <section class="section pt-0">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="section-title">Latest News</h2>
        </div>
      </div>
      <div class="row justify-content-center"> -->
  <!-- blog post -->
  <!-- <article class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
          <div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
            <img class="card-img-top rounded-0" src="../Bootstrap/images/blog/post-1.jpg" alt="Post thumb">
            <div class="card-body"> -->
  <!-- post meta -->
  <!-- <ul class="list-inline mb-3"> -->
  <!-- post date -->
  <!-- <li class="list-inline-item mr-3 ml-0">August 28, 2018</li> -->
  <!-- author -->
  <!-- <li class="list-inline-item mr-3 ml-0">By Somrat Sorkar</li> -->
  <!-- </ul>
              <a href="blog-single.html">
                <h4 class="card-title">Lorem ipsum dolor amet, adipisicing eiusmod tempor.</h4>
              </a>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicin</p>
              <a href="blog-single.html" class="btn btn-primary btn-sm">read more</a>
            </div>
          </div>
        </article> -->
  <!-- blog post -->
  <!-- <article class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
          <div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
            <img class="card-img-top rounded-0" src="../Bootstrap/images/blog/post-2.jpg" alt="Post thumb">
            <div class="card-body"> -->
  <!-- post meta -->
  <!-- <ul class="list-inline mb-3"> -->
  <!-- post date -->
  <!-- <li class="list-inline-item mr-3 ml-0">August 13, 2018</li> -->
  <!-- author -->
  <!-- <li class="list-inline-item mr-3 ml-0">By Jonathon Drew</li> -->
  <!-- </ul>
              <a href="blog-single.html">
                <h4 class="card-title">Lorem ipsum dolor amet, adipisicing eiusmod tempor.</h4>
              </a> -->
  <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicin</p>
              <a href="blog-single.html" class="btn btn-primary btn-sm">read more</a>
            </div>
          </div>
        </article> -->
  <!-- blog post -->
  <!-- <article class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
          <div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
            <img class="card-img-top rounded-0" src="../Bootstrap/images/blog/post-3.jpg" alt="Post thumb">
            <div class="card-body"> -->
  <!-- post meta -->
  <!-- <ul class="list-inline mb-3"> -->
  <!-- post date -->
  <!-- <li class="list-inline-item mr-3 ml-0">August 24, 2018</li> -->
  <!-- author -->
  <!-- <li class="list-inline-item mr-3 ml-0">By Alex Pitt</li> -->
  <!-- </ul>
              <a href="blog-single.html">
                <h4 class="card-title">Lorem ipsum dolor amet, adipisicing eiusmod tempor.</h4>
              </a>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicin</p>
              <a href="blog-single.html" class="btn btn-primary btn-sm">read more</a>
            </div>
          </div>
        </article>
      </div>
    </div>
  </section> -->
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