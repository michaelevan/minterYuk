<?php
include("../Bootstrap/b.php");
include("../System/connect.php");
session_start();


if(isset($_GET['buyid'])) {
    $buyid = $_GET['buyid']; 
    $datakelas = $conn->query("SELECT * FROM kelas WHERE id_kelas = '$buyid'")->fetchAll(PDO::FETCH_ASSOC);
    if(count($datakelas) > 0) {
        $harga = $datakelas[0]["harga_kelas"];
        $date = date("Y-m-d H:i:s");
        $iduser = $_SESSION["id_user"];
        $q = $conn->prepare("INSERT INTO transaksi VALUES('', :fk_kelas, :tgl_trans, :subtotal, 0, :fk_user, :bukti)");
        $temp = $q->execute([
            "fk_kelas" => $buyid,
            "tgl_trans" => $date,
            "subtotal" => $harga,
            "fk_user" => $iduser,
            "bukti" => ""
        ]);    
        header("location: transactionlist_customer.php"); 
    }
}

if (isset($_SESSION["id_user"])) {
    $iduser = $_SESSION["id_user"];
}
if (empty($_GET["id"]) == false) {
    $id = $_GET["id"];
    $datakelas = $conn->query("SELECT * FROM kelas WHERE id_kelas = '$id'")->fetchAll(PDO::FETCH_ASSOC);
}
if (isset($_POST["btnTambah"])) {
    $harga = $datakelas[0]["harga_kelas"];
    $date = date("Y-m-d H:i:s");
    $q = $conn->prepare("INSERT INTO transaksi VALUES('', :fk_kelas, :tgl_trans, :subtotal, 1, :fk_user)");
    $temp = $q->execute([
        "fk_kelas" => $id,
        "tgl_trans" => $date,
        "subtotal" => $harga,
        "fk_user" => $iduser
    ]);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction List</title>
    <?php include("../System/head.php") ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .container2 {
            margin-top: 15vw;
            width: 100%;
            height: 600px;
        }

        .button {
            margin-left: 90%;
        }

        .konten {
            height: 100vh;
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
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="#">Transaction List</a></li>
                        <li class="list-inline-item text-white h3 font-secondary "></li>
                    </ul>
                    <p class="text-lighten">Lihat daftar histori transaksi dari kelas yang telah anda beli / daftar</p>
                </div>
            </div>
        </div>
    </section>
    <!-- <div class="modal fade" id="threadModal" tabindex="-1" role="dialog" aria-labelledby="threadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header d-flex align-items-center bg-primary text-white">
                        <h6 class="modal-title mb-0" id="threadModalLabel">Konfirmasi Pembayaran</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <h5 class="card-title">Nama Kelas : <?= $datakelas[0]["nama_kelas"] ?></h5>
                            <h5 class="card-title">Harga Kelas : <?= $datakelas[0]["harga_kelas"] ?></h5>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        <div class="form-group">
                            <button type="submit" name="btnTambah" class="btn btn-primary">Bayar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
    <!-- <div class="inner-sidebar-header left-content-left">
            <button class="btn btn-primary has-icon btn-block" type="button" data-toggle="modal" data-target="#threadModal" style="width: 14vw;height:6vh">
                NEW DISCUSSION
            </button>
        </div> -->
    <!-- <button type="btn btn-primary has-icon btn-block" type="button" data-toggle="modal" data-target="#threadModal" style="background-color: blueviolet; color: white; margin-left: 92%">Bayar</button> -->
    <!-- <div class="konten">
            
        <br><br><br>
        <table border="1" cellspacing="3px" width="950px" style="margin-left: 10%; color:black; border-color:black">
            <tr>
                <th style="text-align: center;">Id Transaksi</th>
                <th style="text-align: center;">Id Kelas</th>
                <th style="text-align: center;">Tanggal Transaksi</th>
                <th style="text-align: center;">Subtotal</th>
                <th style="text-align: center;">Status</th>
            </tr>
        </table>
    </div> -->
    <div class='container mt-5'>
        <table class="table table-striped" id="trans">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kelas</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $n = 1;
                $datatrans = $conn->query("SELECT * FROM transaksi t, kelas k WHERE t.fk_user = '$iduser' and k.id_kelas = t.fk_kelas")->fetchAll();
                for ($i = 0; $i < count($datatrans); $i++) {
                    $idtrans = $datatrans[$i]["id_trans"];
                ?>
                    <tr>
                        <td><?= $n?></td>
                        <td><?= $datatrans[$i]["nama_kelas"] ?></td>
                        <td><?php $date=date_create($datatrans[$i]["tgl_trans"]); 
                                echo date_format($date,'Y-F-d'); ?></td>
                        <td><?= "Rp. ".number_format($datatrans[$i]["subtotal"]) ?></td>
                        <?php 
                            if($datatrans[$i]["status"] == '0'){
                                $datatrans[$i]["status"] = 'Menunggu Konfirmasi';
                            }
                            else if($datatrans[$i]["status"] == '1'){
                                $datatrans[$i]["status"] = 'Selesai';
                            }
                        ?>
                        <td><?= $datatrans[$i]["status"] ?></td>
                        <td><button <?php echo "onclick=kirimbukti('".$datatrans[$i]['id_trans']."')"; ?> name="btnAksi" type="button" class="btn btn-secondary " data-toggle="modal" data-target="#myModal"><i class="fa fa-eye" style="font-size:24px;"></i></button></td>
                        <div class="modal fade" id="myModal" role="dialog" aria-labelledby="threadModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <form method="POST" enctype="multipart/form-data">
                                    <input type='hidden' name='idtrans' id='idtrans' value=''>
                                    <div class="modal-header d-flex align-items-center bg-primary text-white" style="margin-top: -17px; margin-left:-1px">
                                        <h6 class="modal-title mb-0" id="threadModalLabel">Kirim Bukti Pembayaran</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <h5 class="card-title">Upload Bukti Pembayaran : <input type="file" name="file"></h5>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                        <div class="form-group">
                                            <button type="submit" name="btnKirim" class="btn btn-primary" style="margin-top: 15px; color :black">Kirim</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </tr>
                <?php
                 $n++;
                }
                if(isset($_POST["btnKirim"])){
                    $idtrans = $_POST['idtrans']; 
                    $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
                    $tname = $_FILES["file"]["tmp_name"];
                    $uploads_dir = '../Bootstrap/images/img';
                    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
                    $datatrans = $conn->exec("UPDATE transaksi set bukti = '$pname' where id_trans = '$idtrans'");
                    $datatrans = $conn->exec("UPDATE transaksi set status = '0'     where id_trans = '$idtrans'");
                }
                ?>
            </tbody>
        </table>
        <br><input type="button" style="margin-left:95%" class="btn btn-lightgray" onclick="printDiv('print')" value="Print" /><br>
    </div><div id="print" style="display:none;">
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
        function kirimbukti(idtrans) {
            $("#idtrans").val(idtrans); 
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
            window.location = "../Customer/transaction_customer.php";

        }
        for (let index = 1; index < 7; index++) {
            if(index==6){
                $("#n"+index).addClass("active");
            }
            else{
                $("#n"+index).removeClass("active");
            }   
        }
    </script>