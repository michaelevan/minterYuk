<?php
session_start();
include("../Bootstrap/b.php");
include("../System/connect.php");
include("../System/check.php");
$id;
if(isset($_GET['id'])){
    $id= $_GET['id'];
   
}
else{
    header("Location:customer_admin.php?");
}
echo $id;   
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
        <div class='container '>
            <div class="table-responsive-lg">
                <table class="table table-striped"   id="cust">
                <thead  class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kelas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $n = 1;
                    $datacust = $conn->query("SELECT `kelas`.`nama_kelas` from `customer`,`kelas`,`transaksi`,`user` where 
                    `customer`.id_cust= '".$id."' and
                    `user`.id_user =`customer`.fk_user and 
                    `user`.id_user =`transaksi`.fk_user and 
                    `transaksi`.fk_kelas =`kelas`.id_kelas")->fetchAll();
                    for ($i = 0; $i < count($datacust); $i++) {
                    ?>
                        <form action="" method="POST">
                            <tr>
                                <td><?= $n ?></td>
                                <td><?= $datacust[$i]["nama_kelas"] ?></td>
                            </tr>
                        </form>

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