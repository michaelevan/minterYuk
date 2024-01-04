<?php
session_start();
include("../Bootstrap/b.php");
include("../System/connect.php");
include("../System/check.php");

$datakelas = $conn->query("SELECT * FROM kelas")->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class</title>
    <?php include("../System/head.php") ?>
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
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="#">Class</a></li>
                        <li class="list-inline-item text-white h3 font-secondary "></li>
                    </ul>
                    <p class="text-lighten">Pada halaman ini kalian bisa memilih kelas yang kalian ingin pelajari. Silahkan pilih materi pelajaran yang ingin anda pelajari ya!</p>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="inner-main">
            <!-- Inner main header -->
            <div class="inner-main-header">
                <span class="input-icon input-icon-sm ml-auto w-auto">
                    <input type="text"  id="src"class="form-control form-control-sm bg-gray-200 border-gray-200 shadow-none mb-4 mt-4"  style="height:8vh; width:20vw; margin-left:75px"placeholder="Search Class"  onchange="searchclass()"/>
                </span>
            </div>
        </div>
        <div class="container">
            <!-- course list -->
            <!--<div class="tambahkelas" style="margin-left:60vw;"><button class="btn btn-success">Tambah</button></div>-->
            <div class="row justify-content-center" id=kelas>
                <?php
                for ($i = 0; $i < count($datakelas); $i++) {
                    $id = $datakelas[$i]['id_kelas'];
                ?>
                    <div class="col-lg-4 col-sm-6 mb-5">
                        <div class="card p-0 rounded-0 hover-shadow">
                        <div>
                            <?php
                             echo "<img style='width:22.65vw; height: 28vh;' class='card-img-top rounded-0' src='../Bootstrap/images/class/".$datakelas[$i]["img"]."'>";
                            ?>
                        </div>
                            <div class="card-body">
                                <ul class="list-inline mb-2">
                                </ul>
                                <a href="../Customer/desc_customer.php?id=<?= $id ?>">
                                    <h5><?= $datakelas[$i]["nama_kelas"] ?></h5>
                                </a>
                                <p class="card-text mb-4" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis; max-width: 100%;"><?= $datakelas[$i]["ket_kelas"] ?></p>
                                <h4>Rp. <?= $datakelas[$i]["harga_kelas"] ?></h4>
                                
                                <a href="../Customer/desc_customer.php?id=<?=$id?>" class="btn btn-primary btn-sm">Apply now</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        </div>
    </section>
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
        }
        function searchclass() {
            var lik=$("#src").val();
            $.post("../System/ajax_forum.php", {
                    jenis: "searchclass",
                    search:lik
                },
                function(result) {
                    $("#kelas").html(result);
                }
            );}
    </script>