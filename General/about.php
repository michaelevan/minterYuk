<?php

session_start();
include("../System/check.php");
$role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <?php include("../System/head.php") ?>
</head>

<body id="body">
    <div id="preloader">
        <div class="preloader">
            <img src="../Bootstrap/images/preloader.gif" alt="preloader">
        </div>
    </div>
    <?php
    if ($role == "cust") {
        include("../System/nav1.php");
    } else {
        include("../System/nav2.php");
    }
    ?>
    <section class="page-title-section overlay" data-background="../Bootstrap/images/backgrounds/page-title.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-inline custom-breadcrumb">
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">About Us</a></li>
                        <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- /page title -->

    <!-- about -->
    <input type="hidden" id="role" value=<?php echo $role;?>>
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img class="img-fluid w-100 mb-4" src="../Bootstrap/images/about/about-page.jpg" alt="about image">
                    <p> MinterYuk adalah sebuah website yang dibuat oleh kelompok mahasiswa di institut terkenal di Surabaya bernama Institut Sains dan Teknologi Terpadu Surabaya (ISTTS). MinterYuk merupakan website yang menunjang kebutuhan para pelajar untuk bisa mendalami tentang materi yang sedang mereka pelajari atau ingin merek dalami lagi. Pada web ini terdapat beberapa topik yang sangat menarik dan disajikan dalam bentuk video. Video yang ditampikanpun juga sangat menarik baik kontennya dan sang mentorpun juga rata-rata merupakan orang yang sudah dikenal di Indonesia. Dan cara penyampaian yang diberikan oleh mentor sangat bagus. Sehingga customer tidak merasa bosan dengan materi yang disampaikan oleh para mentor. Keuntungan yang didapatkan dari menggunakan web ini ialah kalian bisa belajar dengan mudah tanpa harus mengeluarkan biaya yang besar dan video juga bisa diliat berulang - ulang.</p>
                    <br><br><br>
                    <h2 style="color: red;">Ingin Pintar???<br>Langganan MinterYuk sekarang!</h2>
                    <img src="../Bootstrap/images/img/logo minteryuk.png" alt="" id="logokonten">
                </div>
            </div>
        </div>
    </section>
    <!-- /about -->

    <!-- funfacts -->
    <!-- <section class="section-sm bg-primary">
        <div class="container">
            <div class="row"> -->
                <!-- funfacts item -->
                <!-- <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                    <div class="text-center">
                        <h2 class="count text-white" data-count="60">0</h2>
                        <h5 class="text-white">TEACHERS</h5>
                    </div>
                </div> -->
                <!-- funfacts item -->
                <!-- <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                    <div class="text-center">
                        <h2 class="count text-white" data-count="50">0</h2>
                        <h5 class="text-white">COURSES</h5>
                    </div>
                </div> -->
                <!-- funfacts item -->
                <!-- <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                    <div class="text-center">
                        <h2 class="count text-white" data-count="1000">0</h2>
                        <h5 class="text-white">STUDENTS</h5>
                    </div>
                </div> -->
                <!-- funfacts item -->
                    <!-- <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                        <div class="text-center">
                            <h2 class="count text-white" data-count="3737">0</h2>
                            <h5 class="text-white">SATISFIED CLIENT</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
    <!-- /funfacts -->

    <!-- /success story -->

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
                            <h4 class="card-title" style="color:#007BFF">Michelle Annabelle</h4>
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
                        <img  src="../Bootstrap/images/teachers/teachers6.jpg" alt="teacher" style="width: 300px;">
                        <div class="card-body">
                            <h4 class="card-title" style="color:#007BFF">Felia Gabriela</h4>
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
                            <h4 class="card-title" style="color:#007BFF">Hans Leo</h4>
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
    <?php
    include("../System/footer.php");
    include("../System/bot.php");
    ?>
    <script src="../System/jquery.js"></script>
    <script>
    var temp= $("#role").val();
    if(temp=="cust"){
        for (let index = 1; index < 7; index++) {
            if(index==2){
                $("#n"+index).addClass("active");
            }
            else{
                $("#n"+index).removeClass("active");
            }   
        }
    }else if(temp=="mentor"){
        for (let index = 1; index < 7; index++) {
            if(index==2){
                $("#n"+index).addClass("active");
            }
            else{
                $("#n"+index).removeClass("active");
            }   
        }
    }
    </script>