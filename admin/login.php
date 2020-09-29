<?php
session_start();
include "./config/koneksi.php" ;

$username = strip_tags(trim($_POST['username']));
$password = strip_tags(trim($_POST['password']));
$level = strip_tags(trim($_POST['level']));

if ($username!='' AND $password!='')
{ 

	if($level=="Pelapor"){
		
		$passmd5 = $password;
		$query = mysql_query("SELECT * FROM pelapor WHERE username='".$username."' AND password='".$passmd5."'") or die( mysql_error() );
		$login = mysql_fetch_array($query);

		if ( $login['kd_pelapor']!='' ) {			
			$_SESSION['username']	= $login['username'];
			$_SESSION['userid']		= $login['kd_pelapor'];
			$_SESSION['level']		= "Pelapor";
			
			header("location: ../login_berhasil.php"); 
		} else {			
			header("location: index.php?pesan='error'");
		}
		
		
	}else{
		$passmd5 = $password;
		$query = mysql_query("SELECT * FROM petugas WHERE username='".$username."' AND password='".$passmd5."' and level='".$level."'") or die( mysql_error() );
		$login = mysql_fetch_array($query);

		if ( $login['kd_petugas']!='' ) {			
			$_SESSION['username']	= $login['username'];
			$_SESSION['userid']		= $login['kd_petugas'];
			$_SESSION['level']		= $login['level'];
			
			header("location: admin_home.php"); 
		} else {			
			header("location: index.php?pesan='error'");
		}

	}
	
	
} else {
	//username atau password kosong
	echo "<div class='err'><strong>ERROR</strong><br />Karakter yang di izinkan hanya <strong>huruf</strong> dan <strong>angka</strong> tanpa spasi</div>";
}            
?>