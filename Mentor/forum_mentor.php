<?php
session_start();
include("../Bootstrap/b.php");
include("../System/connect.php");
include("../System/check.php");
session_start();
$id=$_SESSION['id_user'] ;


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <?php include("../System/head.php") ?>
    <style>
            .container2 {
            margin-top: 20px;
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
            height: 200vh;
        }

        .inner-wrapper {
            position: relative;
            height: calc(100vh - 3.5rem);
            transition: transform 0.3s;
            height: 200vh;
        }

        @media (min-width: 992px) {
            .sticky-navbar .inner-wrapper {
                height: calc(100vh - 3.5rem - 48px);
            }
        }

        .inner-main,
        .inner-sidebar {
            position: absolute;
            top: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
        }

        .inner-sidebar {
            left: 0;
            width: 235px;
            border-right: 1px solid #cbd5e0;
            background-color: #fff;
            z-index: 1;
        }

        .inner-main {
            right: 0;
            left: 235px;
        }

        .inner-main-footer,
        .inner-main-header,
        .inner-sidebar-footer,
        .inner-sidebar-header {
            height: 3.5rem;
            border-bottom: 1px solid #cbd5e0;
            display: flex;
            align-items: center;
            padding: 0 1rem;
            flex-shrink: 0;
        }

        .inner-main-body,
        .inner-sidebar-body {
            padding: 1rem;
            overflow-y: auto;
            position: relative;
            flex: 1 1 auto;
        }

        .inner-main-body .sticky-top,
        .inner-sidebar-body .sticky-top {
            z-index: 999;
        }

        .inner-main-footer,
        .inner-main-header {
            background-color: #fff;
        }

        .inner-main-footer,
        .inner-sidebar-footer {
            border-top: 1px solid #cbd5e0;
            border-bottom: 0;
            height: auto;
            min-height: 3.5rem;
        }

        @media (max-width: 767.98px) {
            .inner-sidebar {
                left: -235px;
            }

            .inner-main {
                left: 0;
            }

            .inner-expand .main-body {
                overflow: hidden;
            }

            .inner-expand .inner-wrapper {
                transform: translate3d(235px, 0, 0);
            }
        }

        .nav .show>.nav-link.nav-link-faded,
        .nav-link.nav-link-faded.active,
        .nav-link.nav-link-faded:active,
        .nav-pills .nav-link.nav-link-faded.active,
        .navbar-nav .show>.nav-link.nav-link-faded {
            color: #3367b5;
            background-color: #c9d8f0;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #467bcb;
        }

        .nav-link.has-icon {
            display: flex;
            align-items: center;
        }

        .nav-link.active {
            color: #467bcb;
        }

        .nav-pills .nav-link {
            border-radius: .25rem;
        }

        .nav-link {
            color: #4a5568;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }
    </style>
</head>
<body id="body">
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
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="#">Forum</a></li>
                        <li class="list-inline-item text-white h3 font-secondary "></li>
                    </ul>
                    <p class="text-lighten">Pada halaman ini kalian bisa menjawab pertanyaan dari para customer minterYuk. Ayo jawab pertanyaan para customer yaa!</p>
                </div>
            </div>
        </div>
    </section>
    <div class="container2">
        <div class="main-body p-0">
            <div class="inner-wrapper">
                <!-- Inner sidebar -->
                <div class="inner-sidebar">
                    <!-- Inner sidebar header -->
                    <!-- /Inner sidebar header -->

                    <!-- Inner sidebar body -->
                    <div class="inner-sidebar-body p-0">
                        <div class="p-3 h-100" data-simplebar="init">
                            <div class="simplebar-wrapper" style="margin: -16px;">
                                <div class="simplebar-height-auto-observer-wrapper">
                                    <div class="simplebar-height-auto-observer"></div>
                                </div>
                                <div class="simplebar-mask">
                                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                        <div class="simplebar-content-wrapper" style="height: 100%;">
                                            <div class="simplebar-content" style="padding: 16px;">
                                                <nav class="nav nav-pills nav-gap-y-1 flex-column">
                                                  <?php

                                                   $datakelas = $conn->query("SELECT * FROM kelas,mentor where mentor.fk_user='$id' and mentor.id_mentor=kelas.fk_mentor")->fetchAll(PDO::FETCH_ASSOC);
                                                   for ($i = 0; $i < count($datakelas); $i++) { 
                                                       if($i==0){
                                                        echo"<a href='javascript:void(0)' onclick='fn($i, \"".strval($datakelas[$i]['id_kelas'])."\")' class='nav-link nav-link-faded has-icon active ' id='$i'>".$datakelas[$i]['nama_kelas']."</a>";
                                                       }
                                                       else{
                                                        echo"<a href='javascript:void(0)' onclick='fn($i, \"".strval($datakelas[$i]['id_kelas'])."\")' class='nav-link nav-link-faded has-icon ' id='$i'>".$datakelas[$i]['nama_kelas']."</a>";
                                                       }
                                                       
                                                   }
                                                   echo "<input type='hidden' id='idx' name='idx' value=".$datakelas[0]['id_kelas'].">";
                                                   ?>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="simplebar-placeholder" style="width: 234vh; height: 200vh"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /Inner sidebar body -->
                </div>
                <!-- /Inner sidebar -->

                <!-- Inner main -->
                <div class="inner-main">
                    <!-- Inner main header -->
                    <div class="inner-main-header">
                        <a class="nav-link nav-icon rounded-circle nav-link-faded mr-3 d-md-none" href="#" data-toggle="inner-sidebar"><i class="material-icons">arrow_forward_ios</i></a>
                        <select class="custom-select custom-select-sm w-auto mr-1" id="cmb" >
                            <option selected="1">Newest</option>
                            <option >Lastest</option>
                        </select>
                        <span class="input-icon input-icon-sm ml-auto w-auto">
                            <input type="text"  id="src"class="form-control form-control-sm bg-gray-200 border-gray-200 shadow-none mb-4 mt-4"  style="height:8vh;"placeholder="Search forum"  onchange="search()"/>
                        </span>
                    </div>
                    <!-- /Inner main header -->

                    <!-- Inner main body -->

                    <!-- Forum List -->
                    <div class="inner-main-body p-2 p-sm-3 collapse forum-content show">
                    
                        <div id="content">

                        </div>
                        <div class="simplebar-placeholder" style="width: 234vh; height: 200vh"></div>
                        <!-- <ul class="pagination pagination-sm pagination-circle justify-content-center mb-0">
                            <li class="page-item disabled">
                                <span class="page-link has-icon"><i class="material-icons">Left</i></span>
                            </li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">1</a></li>
                            <li class="page-item active"><span class="page-link">2</span></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                            <li class="page-item">
                                <a class="page-link has-icon" href="javascript:void(0)"><i class="material-icons">Right</i></a>
                            </li>
                        </ul> -->
                    </div>
                    <!-- /Forum List -->

                    <!-- /Inner main body -->
                </div>
                <!-- /Inner main -->
            </div>
            <div class="modal fade" id="threadModal" tabindex="-1" role="dialog" aria-labelledby="threadModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form method="POST">
                            <div class="modal-header d-flex align-items-center bg-primary text-white">
                                <h6 class="modal-title mb-0" id="threadModalLabel">New Discussion</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" id="threadTitle" name="txtjd" placeholder="Enter title" autofocus="" />
                                </div>
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select name="cmb" id="" class="form-control">
                                        <?php
                                        $datakelas = $conn->query("SELECT * FROM kelas")->fetchAll(PDO::FETCH_ASSOC);
                                        for ($i = 0; $i < count($datakelas); $i++) { ?>
                                            <option value="<?= $datakelas[$i]["id_kelas"] ?>"><?= $datakelas[$i]["nama_kelas"] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label>Deskripsi</label>
                                    <textarea name="txtques" id="" class="form-control" cols="30" rows="10" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                <div class="form-group">
                                    <button type="submit" name="btnTambah" class="btn btn-primary">Post</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include("../System/footer.php");
    include("../System/bot.php");
    ?>
    <script src="../System/jquery.js"></script>
    <script>
        var aktif = 0; 
        var sort;
        function showforum() {
            var a=$("#cmb").val();
            var lik=$("#src").val();
            // alert(lik)
            if(a=="Newest"){
                sort="DESC";
            }
            else{
                sort="ASC";
            }
            console.log(lik);
            var idkel =   $('#idx').val();
            $.post("../System/ajax_forum.php", {
                    jenis: "forumshow",
                    id : idkel,
                    Sort:sort,
                    search:lik
                },
                function(result) {
                    $("#content").html(result);
                }
            );
        }
        function fn(idx, a){
            $('#idx').val(a+"");
            $("#" + aktif).removeClass("active"); 
            aktif = idx; 
            $("#" + aktif).addClass("active"); 
           //showforum();
        }
        var myVar = setInterval("showforum()", 1000);
        for (let index = 1; index < 7; index++) {
            if(index==4){
                $("#n"+index).addClass("active");
            }
            else{
                $("#n"+index).removeClass("active");
            }   
        }
    </script>