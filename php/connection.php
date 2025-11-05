<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$database = "bimbelbabarsari"; //disesuaikan dengan nama database yang ingin dihubungkan
// kalo port mysql udah 3306, gaperlu pake port lagi
// $port = 3306;

$connect = new mysqli($hostname, $username, $password, $database); //disini kalo beda port, portnya juga ikut
if($connect->connect_error){
    die("Koneksi Gagal " . $connect->connect_error);
}
?>