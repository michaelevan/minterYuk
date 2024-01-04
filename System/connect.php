<?php
$hostname = "db-webserver.cxf3ofbfchfx.us-east-1.rds.amazonaws.com";
$username = "admin";
$password = "admin123";
$database = "minteryuk";

// connect ke database
$conn = new PDO("mysql:host=$hostname;dbname=".$database, $username, $password);
?>