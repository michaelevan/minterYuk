<input id="query">
<div id=result></div>
<button id="btncari" type="button">Klik Load Hasil!</button>
<script src='http://code.jquery.com/jquery.js'></script>
<script>
$(function() {
    $("#btncari").click(function() {
        $.get("https://lite.duckduckgo.com/lite", 
            {q: $("#query").val()}, 
            function(e){
            $("#result").html(e);
        });
    });
});
</script>
<<style>
.header, .query, .submit, .extra {
    display: none;
}
</style>
<?php 
if (isset($_GET["query"])) {
    $ch = curl_init("https://lite.duckduckgo.com/lite");
    curl_setopt($ch, CURLOPT_POSTFIELDS, 
        http_build_query(["q" => "site:stts.edu ".$_GET["query"]]));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    echo $result;
}
?>