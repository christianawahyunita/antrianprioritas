<?php
function open_connection() {
$host = "localhost";
$user = "root";
$pass = "";
$database = "antrian_prioritas";
$connect = mysql_connect($host,$user,$pass) or die("Koneksi gagal");
$pilih_db = mysql_select_db($database) or die("Database tidak ada");
}
?>