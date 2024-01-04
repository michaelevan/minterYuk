<?php
session_start();
include("../System/connect.php");
include("../System/check.php");

$id = $_SESSION['id_user'];
$email = $_SESSION['email'];
$query = $conn->prepare("SELECT  * FROM `user` where`user`.email=:em ");
$query->execute(["em" => $email]);
foreach ($query as $row) {
    $email = $row['email'];
}
$query2 = $conn->prepare("SELECT  * FROM `customer` where`customer`.fk_user=:id");
$query2->execute(["id" => $id]);
foreach ($query2 as $rows) {
    $id_cust = $rows['id_cust'];
    $nama = $rows['nama_lengkapcust'];
    $alamat = $rows['alamat_cust'];
    $profesi = $rows['profesi'];
    $telp = $rows['notelp_cust'];
    $jk = $rows['jk_user'];
    $tgl = $rows['tgllahir_cust'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <?php include("../System/head.php") ?>
    <style>
        .content {
            width: 80%;
            height: auto;
            margin-left: 12%;
            font-size: x-large;
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
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Profile</a></li>
                        <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="section-title">Profile</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Nama Lengkap : </label>
                            <input type="text" class="form-control" name="nama_lengkap" value='<?php echo $nama ?>' style="font-size:14pt;">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir" value='<?php echo $tgl ?>' style="font-size:14pt;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" name="alamat" value='<?php echo $alamat ?>' style="font-size:14pt;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label><br>
                            <select name="jeniskelamin" id="jeniskelamin" class="form-control" style="font-size:14pt;">
                                <?php
                                if ($jk == "L") {
                                    echo "<option value='L'>Laki- Laki</option>";
                                    echo "<option value='P'>Perempuan</option>";
                                } else {
                                    echo "<option value='P'>Perempuan</option>";
                                    echo "<option value='L'>Laki- Laki</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pekerjaan</label>
                            <input type="text" class="form-control" name="pekerjaan" value='<?php echo $profesi ?>' style="font-size:14pt;">
                        </div>
                        <div class="form-group">
                            <label>No. Telepon</label>
                            <input type="text" class="form-control" name="notelp" value='<?php echo $telp ?>' style="font-size:14pt;">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" id="email" onkeyup="Ganti()" value='<?php echo $email ?>' style="font-size:14pt;">
                            <div id="info" style='font-size: 4px; color: red;'></div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" id="password1" name="password" value="" style="font-size:14pt;">
                            <input type="checkbox" onclick="myFunction(1)"> Show Password
                        </div>
                        <div id="edit">
                            <div class="col text-center">
                                Jika ada yang anda edit <br>
                                <button class="col-5 btn btn-success" type="button" onclick="pencet()" id="btnedit" style="font-size:14pt;">Edit</button><br>
                            </div>
                        </div>
                        <div id="update" style="display:none;">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" id="password2" name="cpassword" style="font-size:14pt;">
                                <input type="checkbox" onclick="myFunction(2)" style="font-size:14pt;"> Show Password
                            </div>
                            <div class="col text-center">
                                Jika data yang anda isi telah benar silahkan klik submit <br>
                                <button class="col-5 btn btn-success" type="submit" name="btnSubmit">Submit</button><br>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5">
                <img class="img-fluid w-100 mb-4 mt-5" src="../Bootstrap/images/img/prof.png" style="height: 60vh;width:60vw;" alt="about image">
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id='success'>
        <div class="modal-dialog modal-sm">
            <div class="modal-content bg-light">
                <br>
                <i class="fa fa-check-circle" style="font-size:48px;color:green;text-align: center;"></i>
                <div class="modal-body" id="misi">
                    <h5 style="color:green;text-align: center;" id="sc">Success</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id='wrong'>
        <div class="modal-dialog modal-sm">
            <div class="modal-content bg-light">
                <br>
                <i class="fa fa-times-circle" style="font-size:48px;color:red;text-align: center;"></i>
                <div class="modal-body" id="misi">
                    <h5 style="color:red;text-align: center;">Email Atau Password Anda Salah</h5>
                </div>
            </div>
        </div>
    </div>
    <?php
    include("../System/footer.php");
    include("../System/bot.php");
    ?>
    <!-- <script src="../System/jquery.js"></script> -->
    <script>
        function myFunction(a) {
            var x = document.getElementById("password" + a);
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function pencet() {
            var a1 = document.getElementById("edit");
            a1.style.display = "none";
            var a2 = document.getElementById("update");
            a2.style.display = "block";
        }
    </script>
<?php
if (isset($_POST['btnSubmit'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jeniskelamin'];
    $pekerjaan = $_POST['pekerjaan'];
    $notelp = $_POST['notelp'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $date = new DateTime($_POST['tanggal_lahir']);
    $tanggal = date_format($date, "Y-m-d");
    if ($password == $cpassword) {
        //update user
        $pwnew= password_hash($password, PASSWORD_DEFAULT);
        $query4 = $conn->prepare("update user set email=:email,password=:password where id_user=:id");
        $query4->execute(["id" => $id, "email" => $email, "password" => $pwnew]);
        //insert ke table customer
        $query5 = $conn->prepare("update customer set nama_lengkapcust=:nama,profesi=:profesi,notelp_cust=:telp,jk_user=:jk,tgllahir_cust=:tgl,alamat_cust=:alamat 
         where fk_user=:id");
        $result = $query5->execute([
            "id" => $id, "nama" => $nama_lengkap,
            "profesi" => $pekerjaan, "telp" => $notelp, "jk" => $jenis_kelamin, "tgl" => $tanggal, "alamat" => $alamat
        ]);
        echo "<script> $('#success').modal('show');</script>";
    } else {
        echo "<script>  $('#wrong').modal('show');</script>";
    }
}
?>