<?php
session_start();
include("../Bootstrap/b.php");
include("../System/connect.php");
include("../System/check.php");

$id;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("location: forum_customer.php");
}
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
        #content{
            width: 100%;
            height: 500vh;
        }
    </style>
</head>

<body id="body">
    <input type='hidden' id='id' value='<?php echo $id; ?>'>
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
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="#">Forum</a></li>
                        <li class="list-inline-item text-white h3 font-secondary "></li>
                    </ul>
                    <p class="text-lighten">Our courses offer a good compromise between the continuous assessment favoured by some universities and the emphasis placed on final exams by others.</p>
                </div>
            </div>
        </div>
    </section>
    <div id="content">  </div>
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id='success'>
        <div class="modal-dialog modal-sm">
            <div class="modal-content bg-light">
                <br>
                <i class="fa fa-times-circle" style="font-size:48px;color:red;text-align: center;"></i>
                <div class="modal-body" id="misi">
                    <h5 style="color:red;text-align: center;">Sukses Post</h5>
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
        var counter = 0; 
        function isikomen() {
            counter = 10; 
        }
        function bukareply(a,ctr) {
            // alert(ctr);
            $("#kotakreply" + ctr).css("display", "block"); 
            counter = 10; 
        }
        function showDetail() {
            if(counter == 0) {
                var a = $("#id").val();
                $.post("../System/ajax_forum.php", {
                        jenis: "forumdetail",
                        id: a
                    },
                    function(result) {
                        $("#content").html(result);
                    }
                );
            }
            else { counter-=1; }
        }
        function post(ctr){
            var txt=$("#txtreply"+ctr).val();
            var a = $("#id").val();
                $.post("../System/ajax_forum.php", {
                        jenis: "post",
                        id: a,
                        ques:txt
                    },
                    function(result) {
                        if(result=="sukses"){
                            counter=0;
                            // $('#success').modal('show');
                        }
                    }
                );
        }
        var myVar = setInterval("showDetail()", 1000);
    </script>