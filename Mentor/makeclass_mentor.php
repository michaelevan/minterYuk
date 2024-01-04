<?php
session_start(); 
include("../Bootstrap/b.php");
include("../System/connect.php");
include("../System/check.php");
$id=$_SESSION['id_user'] ;

$stmt   = $conn->query("select * from kelas");
$jum    = $stmt->rowCount() + 1;
$kodekelas = "KA" . str_pad($jum, 3, "0", STR_PAD_LEFT);

if (isset($_POST['btnsimpan'])) {
    $namafile = basename($_FILES['txtfotokelas']['name']);
    if (move_uploaded_file($_FILES['txtfotokelas']['tmp_name'], "../Bootstrap/images/class/" . $namafile)) {
        $namakelas = $_POST['txtnamakelas'];
        $hargakelas = $_POST['txthargakelas'];
        $desc      = $_POST['txtdeskripsi'];

        // cari idmentor 
        $stmt   = $conn->query("select * from mentor where fk_user = '" . $_SESSION['id_user'] . "'");
        foreach ($stmt as $row) {
            $idmentor = $row['id_mentor'];
        }
        $conn->query("insert into kelas values('$kodekelas','$namakelas','$idmentor','$hargakelas',0,'',0,'$desc','$namafile')");
    } else {
        echo "anda belum memilih upload file logo";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Class</title>
    <?php include("../System/head.php") ?>
    <link rel="stylesheet" href="../Bootstrap/modal.css">
    <style>
        body {
            background-color: #343f4b;
        }

        .container2 {
            margin-top: 15vw;
            width: 100%;
            height: 600px;
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
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="#">Make Class</a></li>
                        <li class="list-inline-item text-white h3 font-secondary "></li>
                    </ul>
                    <p class="text-lighten">Pada Halaman ini kalian sebagai mentor bisa membuat kelas yang kalian ingin buat. Pastikan materi yang anda buat sudah sesuai dengan kemampuan yang kalian miliki ya. Semangat mengajar para mentor MinterYuk!.</p>
                </div>
            </div>
        </div>
    </section>

    <form method="POST" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mb-4 mb-lg-0 mt-4">
                <br>
                <h1>Add Class</h1>
                    <div class="form-group">
                        <label>Id Kelas : </label>
                        <input type="text" class="form-control" name="txtidkelas" value="<?php echo "$kodekelas"?>" style="font-size:14pt;" required disabled>
                    </div>
                    <div class="form-group">
                        <label>Nama Kelas : </label>
                        <input type="text" class="form-control" name="txtnamakelas" style="font-size:14pt;" required>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Harga Kelas : </label>
                                <input type="number" class="form-control" name="txthargakelas" style="font-size:14pt;" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Deskripsi Kelas : </label>
                                <textarea rows=6 cols=100 name='txtdeskripsi' class='form-control'></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Foto Kelas : </label>
                                <input type='file' name='txtfotokelas' class='form-control'>
                            </div>
                        </div>
                    </div>
                    <div class="col text-center">
                        <button class="col-5 btn btn-primary" style="background-color: #162238;" id="btnsimpan" name="btnsimpan">Buat Kelas</button><br>
                    </div>
                </div>
                <div class="col-lg-5">
                <br><br>
                   <h1>Daftar kelas</h1>
                   <ul style="list-style-type:disc">
                   <?php 
                    $datakelas = $conn->query("SELECT * FROM kelas,mentor where mentor.fk_user='$id' and mentor.id_mentor=kelas.fk_mentor")->fetchAll(PDO::FETCH_ASSOC);
                    for ($i = 0; $i < count($datakelas); $i++) { 
                         echo"<li>".$datakelas[$i]['nama_kelas']."</li>";
                    }
                   ?>
                   </ul>
                </div>
            </div>
        </div>
    </form>
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id='success'>
        <div class="modal-dialog modal-sm">
            <div class="modal-content bg-light">
                <br>
                <div class="success-animation">
                    <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                    </svg>
                </div>
                <div class="modal-body" id="misi">
                    <h5 style="color:green;text-align: center;" id="sc">Success</h5>
                </div>
            </div>
        </div>
    </div>
    <?php
    include("../System/footer.php");
    include("../System/bot.php");
    if (isset($_POST['btnsimpan'])) {
        echo "<script> $('#success').modal('show');</script>";
    }
    ?>

    <script src="../System/jquery.js"></script>
    <script>
        function klik() {

            window.location = "../Mentor/popupmateri_mentor.php";
        }
        for (let index = 1; index < 7; index++) {
    if (index == 3) {
        $("#n" + index).addClass("active");
    } else {
        $("#n" + index).removeClass("active");
    }
}
    </script>