<?php

$serverName = "127.0.0.1:3306";
$dBUsername = "u463909974_exam";
$dBPassword = "Ekg123321";
$dBName = "u463909974_portal";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}


/* try {
     $conn = new PDO("mysql:host=$serverName;dbname=$dBName", $dBUsername, $dBPassword);
 } catch(PDOException $e) {
     // Handle any database connection errors
     die("Database connection failed: " . $e->getMessage());
 }

/*

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "phptest";


$serverName = "127.0.0.1:3306";
$dBUsername = "u463909974_exam";
$dBPassword = "Ekg123321";
$dBName = "u463909974_portal";

*/