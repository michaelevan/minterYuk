<?php
session_start();
include("../System/connect.php");
include("../System/check.php");

if (isset($_POST['bayar'])) {
    header('Location: transaction-customer.php');
}
if (isset($_SESSION["id_user"])) {
    $iduser = $_SESSION["id_user"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Transaction</title>
    <?php include("../System/head.php") ?>
    <style>
        body {
            background-color: #343f4b;
        }

        .konten {
            height: 100vh;
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
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="#">Transaction</a></li>
                        <li class="list-inline-item text-white h3 font-secondary "></li>
                    </ul>

                </div>
            </div>
        </div>
    </section>


    <section class="section">
        <div class='container'>
            <div class="table-responsive-lg">
                <table class="table table-striped" id="trans">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Customer</th>
                            <th scope="col">Nama Kelas</th>
                            <th scope="col">Tanggal Transaksi</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $n = 1;
                        // $datatrans = $conn->query("SELECT * FROM transaksi WHERE fk_user = '$iduser'")->fetchAll();
                        $mentor = $conn->query("SELECT * FROM mentor WHERE fk_user = '$iduser'")->fetchAll();
                        $idmentor = $mentor[0]["id_mentor"];
                        // $kelas = $conn->query("SELECT * FROM kelas WHERE fk_mentor = '$idmentor'")->fetchAll();
                        $datatrans = $conn->query("SELECT kelas.nama_kelas,customer.nama_lengkapcust,
                    transaksi.tgl_trans,transaksi.subtotal FROM transaksi,kelas,customer,mentor where transaksi.status=1 and  transaksi.fk_kelas=kelas.id_kelas and 
                    transaksi.fk_user=customer.fk_user and kelas.fk_mentor=mentor.id_mentor and mentor.fk_user = '$iduser' group by kelas.nama_kelas,customer.nama_lengkapcust,
                    transaksi.tgl_trans")->fetchAll();
                        for ($i = 0; $i < count($datatrans); $i++) {
                        ?>
                            <tr>
                                <td><?= $n ?></td>
                                <!-- <td><?= $datatrans[$i]["id_trans"] ?></td> -->
                                <td><?= $datatrans[$i]["nama_lengkapcust"] ?></td>
                                <td><?= $datatrans[$i]["nama_kelas"] ?></td>
                                <td><?php $date=date_create($datatrans[$i]["tgl_trans"]); 
                                echo date_format($date,'Y-F-d'); ?></td>
                                <td><?= "Rp. " . number_format($datatrans[$i]["subtotal"] * 0.3) ?></td>
                            </tr>
                        <?php
                            $n++;
                        }
                        ?>
                        <!-- for ($i=0; $i < count($kelas); $i++) { 
                         $transaksi = $conn->query("SELECT * FROM transaksi")->fetchAll();
                         for ($j=0; $j < count($transaksi); $j++) { 
                             if ($transaksi[$j]["fk_kelas"] == $kelas[$i]["id_kelas"]) {
                                
                             }  
                         }
                    } -->
                    </tbody>
                </table>
                <br>
                <input type="button" style="margin-left:95%" class="btn btn-lightgray" onclick="printDiv('print')" value="Print" />
            </div>
        </div>
    </section>
    <div id="print" style="display:none;">
        <h1 style="text-align:center;" id="report">Report Penjualan</h1>
        <br>
        <div class="table-responsive-lg">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Customer</th>
                        <th scope="col">Nama Kelas</th>
                        <th scope="col">Tanggal Transaksi</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $n = 1;
                    $total = 0;
                    $mentor = $conn->query("SELECT * FROM mentor WHERE fk_user = '$iduser'")->fetchAll();
                    $idmentor = $mentor[0]["id_mentor"];
                    $datatrans = $conn->query("SELECT  kelas.nama_kelas,customer.nama_lengkapcust,
                    transaksi.tgl_trans,transaksi.subtotal FROM transaksi,kelas,customer,mentor where  transaksi.status=1 and transaksi.fk_kelas=kelas.id_kelas and 
                    transaksi.fk_user=customer.fk_user and kelas.fk_mentor=mentor.id_mentor and mentor.fk_user = '$iduser' ")->fetchAll();
                    for ($i = 0; $i < count($datatrans); $i++) {
                    ?>
                        <tr>
                            <td><?= $n ?></td>
                            <!-- <td><?= $datatrans[$i]["id_trans"] ?></td> -->
                            <td><?= $datatrans[$i]["nama_lengkapcust"] ?></td>
                            <td><?= $datatrans[$i]["nama_kelas"] ?></td>
                            <td><?= $datatrans[$i]["tgl_trans"] ?></td>
                            <td><?= "Rp. " . number_format($datatrans[$i]["subtotal"] * 0.3) ?></td>
                        </tr>
                    <?php
                        $n++;
                        $total += $datatrans[$i]["subtotal"];
                    }
                    ?>
                </tbody>
            </table>
            <br>
            <h5>Total: <?php echo "Rp. " . number_format($total); ?></h5>
        </div>
    </div>
    <?php
    include("../System/footer.php");
    include("../System/bot.php");
    ?>
    <link rel="stylesheet" href="../Bootstrap/dataTables.bootstrap4.min.css">
    <script src="../Bootstrap/jquery.dataTables.js"></script>
    <script src="../Bootstrap/dataTables.bootstrap4.min.js"></script>
    <script>
        $("#trans").DataTable();
    </script>
    <script src="../System/jquery.js"></script>
    <script>
        for (let index = 1; index < 7; index++) {
            if (index == 6) {
                $("#n" + index).addClass("active");
            } else {
                $("#n" + index).removeClass("active");
            }
        }

        function printDiv(divName) {
            document.getElementById('print').style.display = "block";
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
            document.getElementById('print').style.display = "none";
        }

        function pencet() {
            window.location = "../Customer/transaction-customer.php";

        }
    </script>