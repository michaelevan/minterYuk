<?php
//include("../Bootstrap/b.php");
include("../System/connect.php");
session_start();
if ($_POST['jenis'] == "forumshow") {
    $fk_kel = $_POST['id'];
    $sort = $_POST['Sort'];
    $suka = $_POST['search'];
    $query2 = $conn->prepare("SELECT  * FROM `h_forum` where fk_kelas=:fk and nama_ulasan like ('%$suka%') group by `tanggalpost`" . $sort . "");
    $query2->execute(["fk" => $fk_kel]);
    foreach ($query2 as $row) {
        $ii = $row['id_hforum'];
        $id = $row['fk_customer'];
        $query3 = $conn->prepare("SELECT  * FROM `customer` where `customer`.id_cust='$id'");
        $query3->execute();
        foreach ($query3 as $rows) {
            $nama = $rows['nama_lengkapcust'];
        }
        $tgl =  date("d F,Y", strtotime($row['tanggalpost']));
        $jdl = $row['nama_ulasan'];
        $tanya = $row['deskripsi'];
        $query = $conn->prepare("SELECT  count(id_dforum) as jum  FROM `d_forum` where `d_forum`.fk_hforum='$ii'");
        $query->execute();
        $jum = 0;
        foreach ($query as $jm) {
            $jum = $jm['jum'];
        }
        echo "<div class='card-body p-2 p-sm-3'>
        <div class='media forum-item'>
        
            <a href='#' data-toggle='collapse' data-target='.forum-content'><img src='https://bootdey.com/img/Content/avatar/avatar1.png' class='mr-3 rounded-circle' width='50' alt='User' /></a>
            <div class='media-body'>
           <h6><a href='#' data-toggle='collaps' data-target='.forum-content' class='text-body'>" . $jdl . "</a></h6>
                <p class='text-secondary'> " . $tanya . "</p> 
                <div>" . $tgl . "</div>
                <div id='namapeserta'>" . $nama . "</div><br>
                <div id='reply'><a href='forum_detail.php?id=$ii'>Reply</a></div>
            </div>
            <div class='text-muted small text-center align-self-center'>
                <span class='d-none d-sm-inline-block'><i class='far fa-eye'></i> " . rand(10, 100) . "</span>
                <span><i class='far fa-comment ml-2' onclick='pencet()'></i> " . $jum . "</span>
            </div>
        </div>
    </div>";
    }
}
if ($_POST['jenis'] == "forumdetail") {
    $fk_kel = $_POST['id'];
    $query2 = $conn->prepare("SELECT  * FROM `h_forum` where id_hforum=:fk ");
    $query2->execute(["fk" => $fk_kel]);
    foreach ($query2 as $row) {
        //         $ii = $row['id_hforum'];
        $id = $row['fk_customer'];
        $query3 = $conn->prepare("SELECT  * FROM `customer` where `customer`.id_cust='$id'");
        $query3->execute();
        foreach ($query3 as $rows) {
            $nama = $rows['nama_lengkapcust'];
        }
        $tgl =  date("d F,Y", strtotime($row['tanggalpost']));
        $jdl = $row['nama_ulasan'];
        $tanya = $row['deskripsi'];
        $query = $conn->prepare("SELECT  count(id_dforum) as jum FROM `d_forum` where `d_forum`.fk_hforum='$fk_kel'");
        $query->execute();
        $jum = 0;
        foreach ($query as $jm) {
            $jum = $jm['jum'];
        }
        echo "<div class='card-body p-2 p-sm-3'>
        <div class='media forum-item'>
            <a href='#' data-toggle='collapse' data-target='.forum-content'><img src='https://bootdey.com/img/Content/avatar/avatar1.png' class='mr-3 rounded-circle' width='50' alt='User' /></a>
            <div class='media-body'>
           <h6><a href='#' data-toggle='collaps' data-target='.forum-content' class='text-body'>" . $jdl . "</a></h6>
                <p class='text-secondary'> " . $tanya . "</p> 
                <div>" . $tgl . "</div>
                <div id='namapeserta'>" . $nama . "</div><br>
                <div id='reply'><a href='#replyModal' onclick=bukareply('$fk_kel',0)>Reply</a></div>
                <div id='kotakreply0' style='display:none;'>
                    <textarea rows='3' cols='50' onkeyup='isikomen()' id='txtreply0'></textarea>
                    <br><br>
                    <button type='button' class='btn btn-sm btn-primary' onclick='post(0)'>Submit Comment</button>
                </div>
            </div>
            <div class='text-muted small text-center align-self-center'>
                <span class='d-none d-sm-inline-block'><i class='far fa-eye'></i> " . rand(10, 100) . "</span>
                <span><i class='far fa-comment ml-2'></i> " . $jum . "</span>
            </div>
        </div>
    </div>";
        $query4 = $conn->prepare("SELECT  * FROM `d_forum` where`d_forum`.fk_hforum='$fk_kel'");
        $query4->execute();
        $ctr = 1;
        $n=2;
        foreach ($query4 as $rw) {
            $user = $rw['fk_user'];
            $query5 = $conn->prepare("SELECT  * FROM `user` where `user`.id_user='$user'");
            $query5->execute();
            foreach ($query5 as $r) {
                $idx = $rw['fk_user'];
                if ($r['role'] == 0) {
                    $query6 = $conn->prepare("SELECT  * FROM `customer` where `customer`.fk_user='$idx'");
                    $query6->execute();
                    foreach ($query6 as $rr) {
                        $nama = $rr['nama_lengkapcust'];
                    }
                } else {
                    $query6 = $conn->prepare("SELECT  * FROM `mentor` where `mentor`.fk_user='$idx'");
                    $query6->execute();
                    foreach ($query6 as $rr) {
                        $nama = $rr['namalengkap_mentor'];
                    }
                }
            }
            $tgl = date("d F,Y", strtotime($rw['tanggal']));
            $tanya = $rw['ulasan'];
            $teks="avatar".$n+1;
            if($n>9){
                $n=2;
            }
            else{
                $n++;
            }
            echo "<div class='card-body p-2 p-sm-3 ' style='margin-left:7vw;>
            <div class='media forum-item'>
                <a href='#' data-toggle='collapse' data-target='.forum-content'><img src='https://bootdey.com/img/Content/avatar/".$teks.".png' class='mr-3 rounded-circle' width='50' alt='User' style='float:left'/>
                    <p class='text' style='float:left;color:black;'> " . $tanya . "</p> </a>
                <div class='media-body' style='clear:both;margin-left:6vw'>
                    <div>" . $tgl . "</div>
                    <div id='namapeserta'>" . $nama . "</div><br>
                    <div id='reply'><a href='#replyModal' onclick=bukareply('$fk_kel',$ctr)>Reply</a></div>
                    <div id='kotakreply" . $ctr . "' style='display:none;'>
                    <textarea rows='3' cols='50' onkeyup='isikomen()' id='txtreply".$ctr."'></textarea>
                    <br><br>
                    <button type='button' class='btn btn-sm btn-primary' onclick='post($ctr)'>Submit Comment</button>
                    </div>
                </div>
            </div>
        </div>";
            $ctr++;
        }
    }
}
if ($_POST['jenis'] == "post") {
    $pertanyaan = $_POST['ques'];
    $ang =   $_POST['id'];
    $query4 = $conn->prepare("INSERT INTO d_forum VALUES (0,:fk,:fkh,NOW(),:ulasan,0)");
    $query4->execute(["fk" => $_SESSION['id_user'], "fkh" => $ang, "ulasan" => $pertanyaan]);
    echo "sukses";
}

if ($_POST['jenis'] == 'searchclass'){
    $search = $_POST['search'];
    if ($search == ' '){
        $datakelas = $conn->query("SELECT * FROM kelas")->fetchAll(PDO::FETCH_ASSOC);
    }
    else{
    $datakelas = $conn->query("SELECT * FROM kelas where kelas.nama_kelas  like ('%$search%')")->fetchAll(PDO::FETCH_ASSOC);
    }
        if(count($datakelas) == 0){
            echo "Kelas Tidak Ditemukan";
        }
        else{
            for ($i = 0; $i < count($datakelas); $i++) {
                $id = $datakelas[$i]['id_kelas'];
                echo "<div class='col-lg-4 col-sm-6 mb-5'>
                    <div class='card p-0 rounded-0 hover-shadow'>
                    <div>
                        <img style='width:22.65vw; height: 28vh;' class='card-img-top rounded-0' src='../Bootstrap/images/class/".$datakelas[$i]['img']."'>
                    </div>
                        <div class='card-body'>
                            <ul class='list-inline mb-2'>
                            </ul>
                            <a href='../Customer/desc_customer.php?id=$id'>
                                <h5>". $datakelas[$i]['nama_kelas'] ."</h5>
                            </a>
                            <p class='card-text mb-4' style='overflow: hidden; white-space: nowrap; text-overflow: ellipsis; max-width: 100%;'>". $datakelas[$i]['ket_kelas'] ."</p>
                            <h4>Rp. ". $datakelas[$i]['harga_kelas'] ."</h4>
                            
                            <a href='../Customer/desc_customer.php?id=$id' class='btn btn-primary btn-sm'>Apply now</a>
                        </div>
                    </div>
                </div>";
            }
    
}
}
if ($_POST['jenis'] == 'materi'){
    $id=$_POST['id'];
    $datakelas = $conn->query("SELECT * FROM materi where materi.fk_kelas='$id'")->fetchAll(PDO::FETCH_ASSOC);
    for ($i = 0; $i < count($datakelas); $i++) { 
        if($i==0){
         echo"<li>".$datakelas[$i]['nama_materi']."</li>";
        }
    }
}