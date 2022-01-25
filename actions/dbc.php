<?php 

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ondustrydb';

$conn = @new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Connect Error: ' . $conn->connect_error);
    
}

date_default_timezone_set("Europe/Lisbon");
mysqli_set_charset($conn,"utf8");

?>