<?php
session_start();
include("../Bootstrap/b.php");
include("../System/connect.php");
include("../System/check.php");

$id = $_GET["id"];
$id_user = $_SESSION['id_user'];
$datatrans = $conn->query("SELECT * FROM transaksi t, kelas k WHERE k.id_kelas = '$id' and k.id_kelas = t.fk_kelas and fk_user = '$id_user'")->fetchAll(PDO::FETCH_ASSOC);

if (count($datatrans) > 0) {
    $hargakelas = $datatrans[0]['harga_kelas'];
} else {
    $datakelas = $conn->query("SELECT * FROM kelas k WHERE k.id_kelas = '$id'")->fetchAll(PDO::FETCH_ASSOC);
    $hargakelas = $datakelas[0]['harga_kelas'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <?php include("../System/head.php") ?>
    <style>
        .container2 {
            margin-top: 15vw;
            width: 100%;
            height: 600px;
        }

        .container3 {
            margin-left: 500 px;
        }

        .konten {
            height: 120vh;
            margin-left: 10vw;
        }

        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: yellowgreen;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        <?php
        include("../System/nf.css"); ?>
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
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="#">Transaction </a></li>
                        <li class="list-inline-item text-white h3 font-secondary "></li>
                    </ul>
                    <p class="text-lighten">Buruan segera konfirmasi pemesanan anda dan nikmati semua layanan dari kelas kami untuk menambah wawasan anda!</p>
                </div>
            </div>
        </div>
    </section>
    <div class="konten">
        <form method="POST">
            <div class="content " style="flex: 1; width:100%;height:400px; ">
                <div class="card  bg-light" style="width: 28rem;float:left;margin-left:4%; margin-top:2%;">
                    <h1 style="margin:4%;">Pilih metode pembayaran</h1>
                    <div class="card-body">
                        <h5 class="card-title">
                            <button type="button" id="btnTransfer" class="btn btn default" style="width: 100%;">Pembayaran</button>
                        </h5>
                        <div id="bank" style="display: none;">
       
                            <div id="bkiri" style="float:left;">
                            <label>
                                <input type="radio" name="rb" value="Bca" >
                                <img src="../Bootstrap/images/img/asset1.png" width="100" height="100" layout="responsive" srcset="../Boothstrap/asset/asset1.png 200vw">
                            </label>
                            </div>
                            <div id="bkiri" style="margin-left:50px;float:left;">
                            <label>
                                <input type="radio" name="rb" value="Mandiri" >
                                <img src="../Bootstrap/images/img/asset2.png" width="100" height="100" layout="responsive" srcset="../Boothstrap/asset/asset2.png 200vw">
                            </label>
                                
                            </div>
                            <br><br>
                            <div id="ekiri" style="clear:both;float:left;">
                            <label>
                                <input type="radio" name="rb" value="Ovo" >
                                <img src="../Bootstrap/images/img/asset3.png" width="100" height="100" layout="responsive" srcset="../Boothstrap/asset/asset3.png 200vw">
                            </label>
                                
                            </div>
                            <div id="ekiri" style="margin-left:50px;float:left;">
                            <label>
                                <input type="radio" name="rb" value="ShopeePay" >
                                <img src="../Bootstrap/images/img/asset4.png" width="100" height="100" layout="responsive" srcset="../Boothstrap/asset/asset4.png 200vw">
                            </label>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card  bg-light" style="width: 40rem;float:left;margin-left:4%;margin-top:2%;">
                    <h1 style="margin:4%;">Konfirmasi Pembayaran</h1>
                    <h5>Harga&nbsp;&nbsp;: <span style="margin-left: 30vw;"> Rp.<?= $hargakelas ?></span></h5>
                    <h5>Diskon : <span style="margin-left: 30vw;"> Rp. - </span></h5>
                    <hr>
                    <h5>Total&nbsp;&nbsp;&nbsp;&nbsp;: <span style="margin-left: 30vw;"> Rp.<?= $hargakelas ?></span></h5>
                        <button type="submit" name="btnBayar" id="myBtn" class="btn btn-primary">Bayar</button>
                 


                </div>
            </div>
        </form>
        <div id="myModal" class="modal">
                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <h1 style="text-align: center;">Pembayaran Berhasil <img src="../Bootstrap/images/img/checklist.jpg" style="width: 50px; height: 50px; color: yellowgreen; background-color: yellowgreen; border-radius: 70%;"></h1>
                            <p style="text-align: center;">Telah dilakukan transaksi pada tanggal <?= date("Y-m-d"); ?>, sebesar<br></p>
                            <h1 style="text-align: center;" style="font-weight: bold; font-size: larger;"><?= "Rp. " . number_format($hargakelas) ?></h1><br><br>
                            <h6 style="text-align: center;"><a href="../Customer/transactionlist_customer.php?id=<?= $id ?>">Lihat Detail</a></h6>
                        </div>
                    </div>

                    <div id="modalwrong" class="modal">
                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <h1 style="text-align: center;">Gagal Melakukan Pembelian</h1>
                            <h6 style="text-align: center;">Sudah Pernah Membeli Kelas</h6>
                        </div>
                    </div>
    </div>
    <?php
    include("../System/footer.php");
    include("../System/bot.php");
    ?>
    <script>
        for (let index = 1; index < 7; index++) {
            if (index == 6) {
                $("#n" + index).addClass("active");
            } else {
                $("#n" + index).removeClass("active");
            }
        }

        $(document).ready(function() {
            let btnTransfer = document.getElementById("btnTransfer");
            let btnKredit = document.getElementById("btnKredit");
            let btnEwallet = document.getElementById("btnEwallet");
            btnTransfer.onclick = function() {
                let bank = document.getElementById("bank");
                $(bank).fadeTo(1000, 0);
                $(bank).fadeTo(1000, 1);
                $(bank).css("position", "relative");
                $(kartu).hide();
                $(emoney).hide();
            };
        })
    </script>
    <?php
    if (isset($_POST["btnBayar"])) {
        $date = date("Y-m-d");
        $bayar=$_POST['rb'];
        $query2 = $conn->prepare("SELECT  * FROM `transaksi` where`transaksi`.fk_kelas=:idkelas and `transaksi`.fk_user=:user");
        $query2->execute(["idkelas" => $id, "user" => $id_user]);
        if ($query2->rowCount() > 0) {
            echo "<script> $('#modalwrong').modal('show');</script>";
        } else {
            $pay = "INSERT into transaksi values('', '$id', '$date', '$hargakelas','$bayar', '0', '$id_user', '')";
            $datatrans = $conn->query($pay)->fetchAll(PDO::FETCH_ASSOC);
            echo "<script> $('#myModal').modal('show');</script>";
        }
    }
    ?>