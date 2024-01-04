<?php
session_start();
include("../Bootstrap/b.php");
include("../System/connect.php");
include("../System/check.php");
$id = $_SESSION['id_user'];
$stmt   = $conn->query("select * from materi");
$jum    = $stmt->rowCount() + 1;
$kodemateri = "MA" . str_pad($jum, 3, "0", STR_PAD_LEFT);

if (isset($_POST['btnsimpan'])) {

    $namakelas = $_POST['namakelas'];
    $namamateri = $_POST['txtnamamateri'];
    $url        = $_POST['txturlyoutube'];
    $desc      = $_POST['txtdeskripsi'];

    $conn->query("insert into materi values('$kodemateri','$namakelas','$namamateri','$url','$desc',0)");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Material</title>
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
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="#">Make Material</a></li>
                        <li class="list-inline-item text-white h3 font-secondary "></li>
                    </ul>
                    <p class="text-lighten">Pada Halaman ini kalian sebagai mentor bisa membuat materi yang kalian ingin buat. Pastikan materi yang anda buat sudah sesuai dengan kemampuan yang kalian miliki ya. Semangat mengajar para mentor MinterYuk!</p>
                </div>
            </div>
        </div>
    </section>

    <form method="POST">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mb-4 mb-lg-0 mt-4">
                <br>
            <h1>Add Materi</h1>
                    <div class=" form-group">
                    <label>Id Materi : </label>
                    <input type="text" class="form-control" name="txtidmateri" value="<?php echo "$kodemateri" ?>" style="font-size:14pt;" required disabled>
                </div>
                <div class="form-group">
                    <label>Nama Kelas : </label>
                    <select class="form-control" name="namakelas" id="namakelas">
                        <?php
                        $stmt2 = $conn->query("select * from mentor where fk_user = '$id' ");
                        foreach ($stmt2 as $i) {
                            $idx = $i['id_mentor'];
                            $stmt = $conn->query("select * from kelas where fk_mentor = '$idx' ");
                            foreach ($stmt as $rowkelas) {
                                echo "<option value= '" . $rowkelas['id_kelas'] . "'>" . $rowkelas['nama_kelas'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label>Nama Materi : </label>
                            <input type="text" class="form-control" name="txtnamamateri" style="font-size:14pt;" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label>URL Youtube : </label>
                            <input type="text" class="form-control" name="txturlyoutube" style="font-size:14pt;" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label>Deskripsi Materi : </label>
                            <textarea rows=6 cols=100 name='txtdeskripsi' class='form-control'></textarea>
                        </div>
                    </div>
                </div>
                <div class="col text-center">
                    <button class="col-5 btn btn-primary" style="background-color: #162238;" id="btnsimpan" name="btnsimpan">Buat Materi</button><br>
                </div>
            </div>
            <div class="col-lg-5">
            <br>
            <br>
                <select class="form-control" name="cmbkelas" id="cmbkelas" onchange="change()">
                    <?php
                    $stmt2 = $conn->query("select * from mentor where fk_user = '$id' ");
                    foreach ($stmt2 as $i) {
                        $idx = $i['id_mentor'];
                        $stmt = $conn->query("select * from kelas where fk_mentor = '$idx' ");
                        foreach ($stmt as $rowkelas) {
                            echo "<option value= '" . $rowkelas['id_kelas'] . "'>" . $rowkelas['nama_kelas'] . "</option>";
                        }
                    }
                    ?>
                </select>
                <h1>Daftar Materi</h1>
                <ul style="list-style-type:disc">
                    <div id="content"></div>
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
    <script>
        for (let index = 1; index < 7; index++) {
            if (index == 3) {
                $("#n" + index).addClass("active");
            } else {
                $("#n" + index).removeClass("active");
            }
        }
        change();
        function change() {
           idkel= $("#cmbkelas").val();
            $.post("../System/ajax_forum.php", {
                    jenis: "materi",
                    id : idkel
                },
                function(result) {
                    $("#content").html(result);
                }
            );
        }
    </script>