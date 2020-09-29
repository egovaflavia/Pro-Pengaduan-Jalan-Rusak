<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "dbahp";

	// Create connection
	$conn = mysql_connect($server,$user,$password) or die ("Gagal Koneksi Ke Database". mysql_error());
$db=mysql_select_db($database, $koneksi) or die ("Gagal Membuka Database".mysql_error());
?>
