<?php
include "connect.php";
if($_POST['jenis']=="register"){
    $searchWord = $_POST['searchWord'];
    $query  = $conn->prepare("
            select * from user 
            where  email   = '$searchWord'");
    $query->execute();
    if ($query->rowCount() == 0) {
        echo "<h5 style='color: green;'>Email ini belum terdaftar</h5>";
    } else {
        echo "<div>";
        echo "<h5  style=' color: red;'>Email ini Sudah Terdaftar Silahkan Gunakan Email Lain</h5>";
        echo "</div>";
    }
    
}
