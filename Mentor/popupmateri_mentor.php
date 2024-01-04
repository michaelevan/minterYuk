<?php
session_start(); 
include("../Boothstrap/b.php");  
include("../System/check.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pop Up</title>
    <?php include("../System/head.php") ?>
    <style>
        body {
            background-color: #343f4b;
        }

        .section {
            margin-top: 15vw;
            width: 100%;
        }
        #full{
            padding: 2% 0px 0px 20%;
            height:800px;
        }
        .isi{
            background-color: transparent;
            height: 600px;
            width: 70%;
            box-shadow: 5px 5px 5px 5px rgba(0, 0, 0, 0.3);
        }
        .form-group{
            color: white;
        }
    </style>
</head>
<body>
<div id="preloader">
        <div class="preloader">
            <img src="../Bootstrap/images/preloader.gif" alt="preloader">
        </div>
    </div>
    <?php include("../System/nav2.php") ?>
    <section class="page-title-section overlay" data-background="../Bootstrap/images/backgrounds/page-title.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-inline custom-breadcrumb">
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="#">TRansaction</a></li>
                        <li class="list-inline-item text-white h3 font-secondary "></li>
                    </ul>
                    <p class="text-lighten">Our courses offer a good compromise between the continuous assessment favoured by some universities and the emphasis placed on final exams by others.</p>
                </div>
            </div>
        </div>
    </section>
<section>
    <div id="full">
        <div class="isi">
            <form action="#" method="post" style="padding: 20px;">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Upload File</label>
                            <input type="file" name="upload" style="width: 100%;" required>
                        </div>
                        <div class="form-group">
                            <label>Judul Materi</label>
                            <select name="judul" id="" style="width: 100%;" required></select>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Materi</label>
                            <textarea name="deskripsi" id="" cols="30" rows="10" style="width: 100%;" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="tipe" id="" style="width: 100%;" required></select>
                        </div>
                        <div class="form-group">
                            <center><button type="submit" name="btnTambah" class="btn btn-success">Finish</button></center>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php
    include("../System/footer.php");
    include("../System/bot.php");
    ?>
    
    
