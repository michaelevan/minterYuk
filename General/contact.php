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
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Contact Us</a></li>
                        <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
                    </ul>
                    <p class="text-lighten">Apakah kalian punya pertanyaan atau saran mengenai aplikasi kami? Silahkan isi form dibawah ya!!</p>
                </div>
            </div>
        </div>
    </section>
    <!-- /page title -->
    <input type="hidden" id="role" value=<?php echo $role;?>>
    <!-- contact -->
    <section class="section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="section-title">Contact Us</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <form action="#">
                        <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Your Name">
                        <input type="email" class="form-control mb-3" id="mail" name="mail" placeholder="Your Email">
                        <input type="text" class="form-control mb-3" id="subject" name="subject" placeholder="Subject">
                        <textarea name="message" id="message" class="form-control mb-3" placeholder="Your Message"></textarea>
                        <button type="submit" value="send" class="btn btn-primary">SEND MESSAGE</button>
                    </form>
                </div>
                <div class="col-lg-5">
                    <p class="mb-5">Untuk kalian semua yang ingin menanyakan atau memberikan saran seputar MinterYuk maupun materi-materi kalian bisa menghubungi atau menanyakan kami dengan mengirimkan email kepada kami. Secepatnya kami akan membalas komentar atau pertanyaan dari kalian. Kami sangat berterima kasih karena kalian sudah mempercayakan aplikasi ini sebagai wadah pembelajaran kalian. Kami akan terus meningkatkan pelayanan kami agar kalian semakin senang untuk menggunakan aplikasi MinterYuk ini.</p>
                    <a href="tel:+8802057843248" class="text-color h5 d-block">+62 312140593</a>
                    <a href="mailto:yourmail@email.com" class="mb-5 text-color h5 d-block">minteryuk@gmail.com</a>
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
            if(index==5){
                $("#n"+index).addClass("active");
            }
            else{
                $("#n"+index).removeClass("active");
            }   
        }
    }    else if(temp=="mentor"){
        for (let index = 1; index < 7; index++) {
            if(index==5){
                $("#n"+index).addClass("active");
            }
            else{
                $("#n"+index).removeClass("active");
            }   
        }
    }
    </script>