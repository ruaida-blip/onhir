<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "campus";

$conn = mysqli_connect("localhost","root","","campus");

if(!$conn){
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>