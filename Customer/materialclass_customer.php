<?php
session_start();
include("../System/connect.php");
include("../Bootstrap/b.php") ;
include("../System/check.php");
$id = $_GET["id"];
$kelas = $_GET["kelas"];
$datakelas = $conn->query("SELECT * FROM kelas k, materi m where m.fk_kelas = k.id_kelas and m.id_materi = '$id'")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Material</title>
    <?php include("../System/head.php") ?>
    <style>
        h1 {
            font-size: 30px;
        }

        .container2 {
            margin-top: 15vw;
            width: 100%;
            height: 600px;
        }

        .tengah {
            width: 100%;
            height: 100vh;
            color: black;
        }

        .video {
            width: 47%;
            margin-left: 78px;
            padding-top: 100px;
            float: left;
            height: 67vh;
        }

        .judul {
            color: #bdbdbd;
            font-family: gothammedium, sans-serif;
            font-size: 30px;
        }

        .deskripsi {
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            color: #5c5c77;
            font-size: 15px;
            line-height: 1.9;
        }

        .tanya {
            font-size: 15pt;
            float: left;
            margin-top: -30px;
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
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Material</a></li>
                        <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section-sm">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="btn-group dropleft" style="margin-top: -11vh;margin-left: 80vw;">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Materi
                        </button>
                        <div class="dropdown-menu">
                            <form action="" method="POST">
                            <?php
                                $stmt = $conn->prepare("SELECT * FROM materi WHERE fk_kelas = '$kelas'");
                                $stmt->execute();
                                foreach ($stmt as $rows) {
                                    echo "<li><a href='../Customer/materialclass_customer.php?id=" . $rows['id_materi'] ."&kelas=".$kelas."'><button type='button' class='btn btn-outline-primary' style='margin-bottom: 15px;'>" . $rows['nama_materi'] . "</button></a></li>";
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                    <!-- course thumb -->
                    <iframe width="100%" height='400px' src='<?= $datakelas[0]['url_youtube'] ?>' allowfullscreen>
                    </iframe>
                </div>
            </div>
            <!-- course info -->
            <div class="row align-items-center mb-5">
                <div class="col-xl-3 order-1 col-sm-6 mb-4 mb-xl-0">
                    <h2 style="width: 66vw;"><?= $datakelas[0]["nama_materi"] ?></h2>
                </div>
                <!-- border -->
                <div class="col-12 mt-4 order-4">
                    <div class="border-bottom border-primary"></div>
                </div>
            </div>
            <!-- course details -->
            <div class="row">
                <div class="col-12 mb-4">
                    <!-- codingdibawah sini -->
                    <p style="margin-top: -20px;"><?= $datakelas[0]["deskripsi_materi"] ?></p>
                </div>
                <a href="forum_customer.php?id=<?=$kelas?>">Tanyakan Pertanyaanmu Disini</a>
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
            if (index == 3) {
                $("#n" + index).addClass("active");
            } else {
                $("#n" + index).removeClass("active");
            }
        }
    </script>