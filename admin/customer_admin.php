<?php
session_start();
include("../Bootstrap/b.php");
include("../System/connect.php");
include("../System/check.php");
if (isset($_POST['btnsub'])) {
    $id_cust = $_POST['idx'];
    header("Location:customer_detail.php?id=$id_cust");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
    <?php include("../System/head.php") ?>
    <style>
        body {
            background-color: #343f4b;
        }

        .table-bordered {
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
        }
    </style>
</head>

<body id="body">
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
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">List Customer</a></li>
                        <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section ">
        <div class='container'>
            <div class="table-responsive-lg">
                <table class="table table-striped"   id="cust">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">No Telp</th>
                            <th scope="col">Profesi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n = 1;
                        $datacust = $conn->query("SELECT * FROM customer")->fetchAll();
                        for ($i = 0; $i < count($datacust); $i++) {
                        ?>

                            <tr>
                                <td><?= $n ?></td>
                                <td><?= $datacust[$i]["nama_lengkapcust"] ?></td>
                                <td><?= $datacust[$i]["tgllahir_cust"] ?></td>
                                <td><?= $datacust[$i]["alamat_cust"] ?></td>
                                <td><?php if ($datacust[$i]["jk_user"] == "P") {
                                        echo "Perempuan";
                                    } else {
                                        echo "Laki-Laki";
                                    } ?></td>
                                <td><?= $datacust[$i]["notelp_cust"] ?></td>
                                <td><?= $datacust[$i]["profesi"] ?></td>
                                <td>
                                    <form action="" method="POST"><input type="hidden" name="idx" value=<?php echo $datacust[$i]["id_cust"] ?>>
                                        <button type="submit" name="btnsub" class="btn btn-dark">Lihat</button>
                                    </form>
                                </td>
                            </tr>

                        <?php
                            $n++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <?php
    include("../System/footer.php");
    include("../System/bot.php");
    ?>
    <link rel="stylesheet" href="../Bootstrap/dataTables.bootstrap4.min.css">
    <script src="../Bootstrap/jquery.dataTables.js"></script>
    <script src="../Bootstrap/dataTables.bootstrap4.min.js"></script>
    <script>
        $("#cust").DataTable();
    </script>
         <script src="../System/jquery.js"></script>
  <script>
    for (let index = 1; index < 7; index++) {
      if (index == 4) {
        $("#n" + index).addClass("active");
      } else {
        $("#n" + index).removeClass("active");
      }
    }
  </script>