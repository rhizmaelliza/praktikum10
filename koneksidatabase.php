<?php
// Membuat Koneksi Database
$host="localhost";
$user="root";
$password="";
$dbname="praktek10";
$koneksi=mysqli_connect($host, $user, $password, $dbname);
if(!$koneksi){
    echo 'Error : '.mysqli_connnect_error($koneksi);
}
?>

