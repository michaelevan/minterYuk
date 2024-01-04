<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="shortcut icon" href="../Bootstrap/images/img/logo minteryuk.png" type="image/x-icon">
    <link rel="icon" href="../Bootstrap/images/img/logo minteryuk.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Bootstrap/modal.css">
    <style>
        .btn-primary {
            margin-top: 3%;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .col-md-6 {
            border-radius: 2%;
            background-color: white;
            padding-left: 4%;
            padding-right: 4%;
            padding-top: 2%;
            padding-bottom: 2%;
            margin-top: 5%;
            box-shadow: 2px 2px 8px;
            margin-left: 25%;
        }

        #background {
            background-image: url("../Bootstrap/images/img/asset2.jpg");
            background-size: 100%;
            width: 100vw;
            height: 100vh;
            opacity: 70%;
            position: fixed;
        }

        .container {
            font-size: large;
        }
    </style>
</head>

<body>
    <div id="background"></div>
    <form method="POST">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="text-center">
                        Welcome To
                        <img src="../Bootstrap/images/img/logo minteryuk.png" alt="" width="150vw" height="150vh" class="logo">
                    </h2>
                    <div class="form-group">
                        <label>Nama Lengkap : </label>
                        <input type="text" class="form-control" name="nama_lengkap" style="font-size:14pt;" required>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" value='<?php echo $tgl ?>' style="font-size:14pt;" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat" style="font-size:14pt;" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label><br>
                        <select name="jeniskelamin" id="jeniskelamin" class="form-control" style="font-size:14pt;" required>
                            <option value="L">Laki- Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan" style="font-size:14pt;" required>
                    </div>
                    <div class="form-group">
                        <label>No. Telepon</label>
                        <input type="text" class="form-control" name="notelp" style="font-size:14pt;" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" id="email" onkeyup="Ganti()" style="font-size:14pt;" required>
                        <div id="info" style='font-size: 4px;'></div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="password1" style="font-size:14pt;" required>
                        <input type="checkbox" onclick="myFunction(1)"> Show Password
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword" id="password2" style="font-size:14pt;" required>
                        <input type="checkbox" onclick="myFunction(2)"> Show Password
                    </div>
                    <div class="col text-center">
                        <button class="col-5 btn btn-primary" style="background-color: #162238;" id="btnRegister" name="btnRegister">Daftar</button><br>
                        Sudah punya akun?
                        <a href="../login.php">
                            Login Sekarang!
                        </a>
                    </div>
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
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id='wrong'>
        <div class="modal-dialog modal-sm">
            <div class="modal-content bg-light">
                <br>
                <div class="trigger"></div>
                <svg version="1.1" id="tick" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 37 37" style="enable-background:new 0 0 37 37; color:red" xml:space="preserve">
                    <path class="circ path" style="fill:none;stroke:#FF0000;stroke-width:3;stroke-linejoin:round;stroke-miterlimit:10;" d="
	M30.5,6.5L30.5,6.5c6.6,6.6,6.6,17.4,0,24l0,0c-6.6,6.6-17.4,6.6-24,0l0,0c-6.6-6.6-6.6-17.4,0-24l0,0C13.1-0.2,23.9-0.2,30.5,6.5z" />
                    <polyline class="cross1 path" style="fill:none;stroke:#FF0000;stroke-width:3;stroke-linejoin:round;stroke-miterlimit:10;" points="
	 12.5,24.5 24.5,12.5 " />
                    <polyline class="cross2 path" style="fill:none;stroke:#FF0000;stroke-width:3;stroke-linejoin:round;stroke-miterlimit:10;" points="
	 12.5,12.5 24.5,24.5 " />
                </svg>
                <div class="modal-body" id="misi">
                    <h5 style="color:red;text-align: center;" id="wt"></h5>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script src="../System/jquery.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    function Ganti() {
        var searchWord = $("#email").val();
        var n = searchWord.indexOf("@");
        var n2 = searchWord.indexOf(".");
        if (n != -1 && n2 != -1) {
            $.post("../System/ajax_register.php", {
                    jenis: "register",
                    searchWord: searchWord
                },
                function(evt) {
                    $("#info").fadeOut('slow', function() {
                        $("#info").html(evt);
                        $("#info").fadeIn('slow');
                    });
                }
            );
        }

    }

    function myFunction(a) {
        var x = document.getElementById("password" + a);
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<?php
include("../System/connect.php");
include_once("../phpmailer/phpmailer-load.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['btnRegister'])) {
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
        $query2 = $conn->prepare("SELECT  * FROM `user` where`user`.email=:em ");
        $query2->execute(["em" => $email]);
        if ($query2->rowCount() > 0) {
            echo "<script>  
            $('#wt').html('Username Sudah Terdaftar');
                $('#wrong').modal('show');
               setTimeout(function(){ $('.trigger').toggleClass('drawn'); }, 1000);</script>";
        } else {
            $query = $conn->prepare("SELECT substr(max(id_user),-3,3) FROM `user`");
            $query->execute();
            foreach ($query as $rows) {
                $ang = $rows['substr(max(id_user),-3,3)'] + 1;
                $ang = str_pad($ang, 3, '0', STR_PAD_LEFT);
                $kode = "US" . $ang;
                $query4 = $conn->prepare("INSERT INTO user VALUES (:id,:email,:password,0)");
                $pwnew = password_hash($password, PASSWORD_DEFAULT);
                $query4->execute(["id" => $kode, "email" => $email, "password" =>  $pwnew]);
                //insert ke table customer
                $query3 = $conn->prepare("SELECT substr(max(id_cust),-3,3) FROM `customer`");
                $query3->execute();
                foreach ($query3 as $row) {
                    $ang2 = $row['substr(max(id_cust),-3,3)'] + 1;
                    $ang2 = str_pad($ang2, 3, '0', STR_PAD_LEFT);
                    $kode2 = "CU" . $ang2;
                    $query5 = $conn->prepare("INSERT INTO customer VALUES (:id,:fk,:nama,:profesi,:telp,:jk,:tgl,0,:al)");
                    $result = $query5->execute([
                        "id" => $kode2, "fk" =>  $kode, "nama" => $nama_lengkap,
                        "profesi" => $pekerjaan, "telp" => $notelp, "jk" => $jenis_kelamin, "tgl" => $tanggal, "al" => $alamat
                    ]);
                }
                $mail = new PHPMailer(true);
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;             // Enable verbose debug output
                $mail->isSMTP();                                   // Send using SMTP
                $mail->Host       = 'smtp.zoho.com';              // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                          // Enable SMTP authentication
                $mail->Username   = 'test@benyamin.xyz';            // SMTP username
                $mail->Password   = 'Test123$@benyamin.xyz';       // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                           // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                //Recipients
                $mail->setFrom('test@benyamin.xyz', 'Register Berhasil');
                $mail->addAddress($email, $nama_lengkap);     // Add a recipient
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = "Registrasi Berhasil";
                $mail->Body    = "Terima kasih telah join di MinterYuk silahkan untuk masuk di link ini  http://minteryuk.epizy.com/login.php ";
                $mail->AltBody = "Terima Kasih";
                $mail->send();
                echo "<script>  
                    $('#success').modal('show');</script>";
            }
        }
    } else {
        echo "<script>  
        $('#wt').html('Password dan ConPassword harus sama');
            $('#wrong').modal('show');
            setTimeout(function(){ $('.trigger').toggleClass('drawn'); }, 1000);
            </script>";
    }
}

?>