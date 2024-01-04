<?php
include("../System/connect.php");
if($_POST['jenis']=="data"){
    $arr = []; 
    $jumarr = 0; 
    for($bulan = 1; $bulan <= 12; $bulan++) {
        $query = $conn->prepare("SELECT SUM(`subtotal`) as sub FROM `transaksi` where month(`tgl_trans`) = $bulan and status=1" );
        $query->execute();
    
        $arr[$jumarr]['x'] = $bulan; 
        $arr[$jumarr]['y'] = 0; 
        foreach($query as $rows){
            if($rows['sub'] != null) { $arr[$jumarr]['y'] = intval($rows['sub']); }
        }        
        $jumarr+=1; 
    }

    echo json_encode($arr); 
}
?>