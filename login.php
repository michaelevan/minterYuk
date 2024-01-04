<?php
include "System/connect.php";
session_start();
$cek = -1;
if (isset($_SESSION['id_user'])) {
    unset($_SESSION['id_user']);
}
// $query2 = $conn->prepare("SELECT  * FROM `user` ");
// $query2->execute();
// foreach($query2 as $rw){
//     $pwnew= password_hash('abc123', PASSWORD_DEFAULT);
//     $id=$rw['id_user'];
//     $query1 = $conn->prepare("update user set password=:password where id_user=:id");
//     $query1->execute(["id" => $id, "password" => $pwnew]);
// }
if (isset($_REQUEST["btnLogin"])) {
    $txtusername = $_POST['username'];
    $txtpw = $_POST['password'];
    if ($txtusername == "admin" && $txtpw == "admin") {
        $_SESSION['id_user'] = 'admin';
        header("location:admin/home_admin.php");
    } else {
        $query2 = $conn->prepare("SELECT  * FROM `user` where`user`.email=:em");
        $query2->execute(["em" => $txtusername]);
        if ($query2->rowCount() > 0) {
            $ketemu = 0;
            foreach ($query2 as $row) {
                if (password_verify($txtpw, $row['password'])) {
                    $ketemu = 1;
                    $userid = $row['id_user'];
                    $email = $row['email'];
                    $role = $row['role'];
                }
            }
            echo $ketemu;
            if ($ketemu == 1) {
                if ($role == 0) {
                    $_SESSION['id_user'] = $userid;
                    $_SESSION['role'] = "cust";
                    $_SESSION['email'] =  $email;
                    header("location:Customer/home_customer.php");
                } else if ($role == 1) {
                    $_SESSION['id_user'] = $userid;
                    $_SESSION['role'] = "mentor";
                    $_SESSION['email'] =  $email;
                    header("location:Mentor/home_mentor.php");
                }
            } else {
                $cek = 2;
            }
        } else {
            $cek = 1;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="Bootstrap/images/img/logo minteryuk.png" type="image/x-icon">
    <link rel="icon" href="Bootstrap/images/img/logo minteryuk.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Bootstrap/modal.css">
    <style>
        .form-group {
            margin-bottom: 10px;
        }

        .btn-primary {
            margin-top: 3%;
        }

        .container {
            font-size: x-large;
        }

        .col-md-6 {

            border-radius: 2%;
            background-color: white;
            padding-left: 4%;
            padding-right: 4%;
            padding-top: 2%;
            padding-bottom: 2%;
            box-shadow: 2px 2px 8px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        #background {
            background-image: url("Bootstrap/images/img/asset1.jpg");
            background-size: 100%;
            width: 100vw;
            height: 100vh;
            opacity: 70%;
            position: fixed;
        }

        .logo {
            margin-left: 2vw;
        }
    </style>

</head>

<body>
    <div id="background"></div>
    <div class="form">
        <form method="POST">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-center">
                            Welcome To
                            <img src="Bootstrap/images/img/logo minteryuk.png" alt="" width="150vw" height="150vh" class="logo">
                        </h2>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="username" style="font-size:14pt;">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" id="password" style="font-size:14pt;">
                            <input type="checkbox" onclick="myFunction()"> Show Password
                        </div>
                        <div class="col text-center">
                            <button class="col-5 btn btn-primary center-block" style="background-color: #162238;" type="submit" name="btnLogin">LOGIN</button><br>
                            Belum punya akun?
                            <a href="General/register.php">
                                Daftarkan sekarang!
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
                    <h5 style="color:red;text-align: center;">Email Anda Salah</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id='wrong2'>
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
                    <h5 style="color:red;text-align: center;">Password Anda Salah</h5>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script src="System/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<?php
if ($cek == 1) {
    echo "<script>  
    $('#wrong').modal('show');
    setTimeout(function(){ $('.trigger').toggleClass('drawn'); }, 1000);</script>";
    $cek = -1;
} else if ($cek == 2) {
    echo "<script>  
    $('#wrong2').modal('show');
    setTimeout(function(){ $('.trigger').toggleClass('drawn'); }, 1000);</script>";
    $cek = -1;
}
?>