<?php
$server="localhost";
$user="root";
$password="";
$database="db_lap_jalanrusak";
$sitename="Dinas Perumahan Rakyat Kawasan Permukiman dan Pertanahan Kota Padang";


$koneksi= mysql_connect($server,$user,$password) or die ("Gagal Koneksi Ke Database". mysql_error());
$db=mysql_select_db($database, $koneksi) or die ("Gagal Membuka Database".mysql_error());
