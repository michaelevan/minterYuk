<?php
session_start();
include("../Bootstrap/b.php");
include("../System/connect.php");
include("../System/check.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafik</title>
    <?php include("../System/head.php") ?>
    
    <style>
        body {
            background-color: #343f4b;
        }

        .container2 {
            padding: 0% 0% 15% 0%;
            width: 100%;
            height: 100vh;
        }

        .container3 {
            padding-bottom: 5%;
        }

        #timeToRender {
            position: absolute;
            top: 10px;
            font-size: 20px;
            font-weight: bold;
            background-color: #d85757;
            padding: 0px 4px;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <div id="preloader">
        <div class="preloader">
            <img src="../Bootstrap/images/preloader.gif" alt="preloader">
        </div>
    </div>
    <?php include("../System/nav3.php") ?>
    <section class="page-title-section overlay" data-background="../Bootstrap/images/backgrounds/page-title.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-inline custom-breadcrumb">
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Grafik</a></li>
                        <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container2">
        <div class="card  p-0  rounded-0 hover-shadow" style="width:80%;margin-left:10%;margin-top:10vh;">
            <div class="card-header">
                <h4 class="card-title text-center">Grafik Penjualan</h4>
            </div>
            <div class="card-body ">
                <div id="chartContainer" style="height: 400px; width: 80%;margin-left:10%;"></div>
            </div>
        </div>
    </div>
    <?php
    include("../System/footer.php");
    include("../System/bot.php");
    ?>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="../System/jquery.js"></script>
    <script>
        function GetData() {
            $.post("../System/ajax_grafik.php", {
                    jenis: "data"
                },
                function(evt) {
                    //alert(evt); 
                    var dtchart = JSON.parse(evt);
                    showgrafik(dtchart);
                });
        }

        function showgrafik(dtchart) {
            //alert(dtchart.length); 
            var data = [{
                type: "line",
                dataPoints: dtchart //
            }];

            //Better to construct options first and then pass it as a parameter
            var options = {
                zoomEnabled: true,
                animationEnabled: true,
                axisY: {
                    lineThickness: 1
                },
                data: data // random data
            };

            var chart = new CanvasJS.Chart("chartContainer", options);
            var startTime = new Date();
            chart.render();
            //var endTime = new Date();
            //document.getElementById("timeToRender").innerHTML = "Time to Render: " + (endTime - startTime) + "ms";
        }

        window.onload = function() {
            GetData();
        }
        for (let index = 1; index < 7; index++) {
            if (index == 2) {
                $("#n" + index).addClass("active");
            } else {
                $("#n" + index).removeClass("active");
            }
        }
    </script>
      