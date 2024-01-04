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
    <title>Edit About Us</title>
    <?php include("../System/head.php") ?>
    <style>
        body {
            background-color: #343f4b;
        }
    </style>
</head>
<body>
	<?php include("../System/navbar3.php");?>
    <div id="preloader">
        <div class="preloader">
            <img src="../Bootstrap/images/preloader.gif" alt="preloader">
        </div>
    </div>
    <?php include("../System/nav3.php") ?>
    <section class="page-title-section overlay" data-background="../Bootstrap/images/backgrounds/page-title.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-inline custom-breadcrumb">
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link"> Edit About Us</a></li>
                        <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <form action="" method="POST">
        <center>
        <div class="form-group">
            <label>Deskripsi</label><br>
            <textarea name="deskripsi" id="" cols="200" rows="30"></textarea>
        </div>
        </center>
    </form>
    <?php
  include("../System/footer.php");
  include("../System/bot.php");
  ?>
   