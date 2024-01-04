<?php
include("../Bootstrap/b.php");
include("../System/connect.php");
$tot = 0;
if(isset($_POST["btnKirim"])){
    $idtrans = $_POST['idtrans']; 
    echo $idtrans; 
    $datatrans = $conn->exec("UPDATE transaksi set status = '1' where id_trans = '$idtrans'");
    header("location: transaction_admin.php"); 
}
?>
<!DOCTYPE html>
<html>

<head class="noPrint">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <?php include("../System/head.php") ?>
    <style>
        body {
            background-color: #343f4b;
        }

        @media print {
            .noPrint {
                display: hidden;
            }

            #report {
                display: block;
            }
        }
    </style>
</head>

<body>
    <div id="preloader" class="noPrint">
        <div class="preloader">
            <img src="../Bootstrap/images/preloader.gif" alt="preloader">
        </div>
    </div>
    <?php include("../System/nav3.php") ?>
    <section class="page-title-section overlay" data-background="../Bootstrap/images/backgrounds/page-title.jpg" class="noPrint">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-inline custom-breadcrumb">
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Transaction</a></li>
                        <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
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
                            <th scope="col" style="width:100px">Subtotal</th>
                            <th scope="col">Metode Pembayaran</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n = 1;
                        $datatrans = $conn->query("SELECT * FROM transaksi,kelas,customer where transaksi.fk_kelas=kelas.id_kelas and 
                    transaksi.fk_user=customer.fk_user")->fetchAll();
                        for ($i = 0; $i < count($datatrans); $i++) {
                            $idtrans = $datatrans[$i]["id_trans"];
                        ?>
                            <tr>
                                <td><?= $n ?></td>
                                <td><?= $datatrans[$i]["nama_lengkapcust"] ?></td>
                                <td><?= $datatrans[$i]["nama_kelas"] ?></td>
                                <td><?php $date=date_create($datatrans[$i]["tgl_trans"]); 
                                echo date_format($date,'Y-F-d'); ?></td>
                                <td><?= "Rp. ".number_format($datatrans[$i]["subtotal"] * 0.7) ?></td>
                                      <td><?= $datatrans[$i]["pembayaran"] ?></td>
                            <?php 
                            if($datatrans[$i]["status"] == '0'){
                                $datatrans[$i]["status"] = 'Menunggu Konfirmasi';
                            }
                            else if($datatrans[$i]["status"] == '1'){
                                $datatrans[$i]["status"] = 'Selesai';
                            }
                            ?>
                            <td><?= $datatrans[$i]["status"] ?></td>
                            <?php 
                                if($datatrans[$i]["status"] == 'Menunggu Konfirmasi'){?>
                                    <td><button <?php echo "onclick=bukaDialog('".$datatrans[$i]['id_trans']."-$i')"; ?>  name="btnAksi" type="button" class="btn  btn-secondary" data-toggle="modal" <?php echo "data-target='#myModal".$i."'"; ?>><i class="fa fa-eye" style="font-size:24px;"></i></button></td>
                                <?php
                                }
                                else if($datatrans[$i]["status"] == 'Selesai'){?>
                                    <td><button <?php echo "onclick=bukaDialog('".$datatrans[$i]['id_trans']."-$i')"; ?>  name="btnAksi" type="button" class="btn btn-secondary" data-toggle="modal" <?php echo "data-target='#myModal".$i."'"; ?>><i class="fa fa-eye" style="font-size:24px; display: block;"></i></button></td>
                                <?php
                                }
                            ?>
                            <div class="modal fade" <?php echo "id='myModal".$i."'"; ?> role="dialog" aria-labelledby="threadModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <form method="POST" enctype="multipart/form-data">
                                        <input type='hidden' name='idtrans' <?php echo "id='idtrans".$i."'"; ?> value=''>
                                        <div class="modal-header d-flex align-items-center bg-primary text-white" style="margin-top: -17px; margin-left:1px">
                                            <h6 class="modal-title mb-0" id="threadModalLabel">Konfirmasi Bukti Pembayaran</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                            <?php
                                                echo "<img style='height: 500px;' class='card-img-top rounded-0' src='../Bootstrap/images/img/".$datatrans[$i]["bukti"]."'>";
                                            ?>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                            <div class="form-group">
                                                <button type="submit" name="btnKirim" class="btn btn-primary" style="margin-top:15px;color:black">Confirm</button>
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
                        ?>
                    </tbody>
                </table>
                <br>
                <input type="button" style="margin-left:95%"class="btn btn-lightgray" onclick="printDiv('print')" value="Print" />
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
                    $datatrans = $conn->query("SELECT  kelas.nama_kelas,customer.nama_lengkapcust,
                    transaksi.tgl_trans,transaksi.subtotal FROM transaksi,kelas,customer where transaksi.fk_kelas=kelas.id_kelas and 
                    transaksi.fk_user=customer.fk_user")->fetchAll();
                    for ($i = 0; $i < count($datatrans); $i++) {
                        $tot += $datatrans[$i]["subtotal"];
                    ?>
                        <tr>
                            <td><?= $n ?></td>
                            <td><?= $datatrans[$i]["nama_lengkapcust"] ?></td>
                            <td><?= $datatrans[$i]["nama_kelas"] ?></td>
                            <td><?= $datatrans[$i]["tgl_trans"] ?></td>
                            <td><?= "Rp. ".number_format($datatrans[$i]["subtotal"] * 0.7) ?></td>
                        </tr>
                    <?php
                        $n++;
                    }
                    ?>
                   
                </tbody>
            </table>
            <br>
            <h5>Total: <?php echo "Rp. ".number_format($tot); ?></h5>
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
    function bukaDialog(idtrans) {
        //alert(idtrans); 
        var node = idtrans.split("-"); 
        $("#idtrans" + node[1]).val(node[0]); 
    }
        for (let index = 1; index < 7; index++) {
            if (index == 3) {
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
    </script>