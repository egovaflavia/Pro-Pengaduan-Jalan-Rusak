<?php include "./config/koneksi.php"; 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $sitename; ?></title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>	
	<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.tabify.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
	var $ = jQuery.noConflict();
	$(function() {
	$('#tabsmenu').tabify();
	$(".toggle_container").hide(); 
	$(".trigger").click(function(){
		$(this).toggleClass("active").next().slideToggle("slow");
		return false;
	});
	});
	</script>
	<script type="text/javascript" src="js/jquery-1.3.2.min.js" ></script>
	<script type="text/javascript" src="js/jquery-ui.min.js" ></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true);
	});
	</script>
</head>
<body>
<div id="panelwrap">
  	
	<div class="header">
	
    <div class="title"><a href="#"><img src="images/logo.png"></a></div>
	    <div id="top-navigation">
				
				</div><div class="clear"></div>
    </div>
    <div class="clear"></div>
	
  <div id="place-nav">
  <ul id="nav">
  
				<?php if (ISSET($_SESSION['username'])) { ?>
					<li><a href="index.php" <?php if($menu=="home") echo 'class="selected"'; ?>><span> Home</span></a></li>
					<li><a href="profil.php" <?php if($menu=="profil") echo 'class="selected"'; ?>><span> Profil</span></a></li>
					<li><a href="pengaduan.php" <?php if($menu=="pengaduan") echo 'class="selected"'; ?>><span>Pengaduan</span></a></li>
					<li><a href="riwayat.php" <?php if($menu=="riwayat") echo 'class="selected"'; ?>><span>Riwayat</span></a></li>
					<li><a href="logout.php" <?php if($menu=="logout") echo 'class="selected"'; ?> onClick="return confirm('Apakah anda ingin logout?')"><span>Logout</span></a></li>
				<?php } else { ?>
					<li><a href="index.php" <?php if($menu=="home") echo 'class="selected"'; ?>><span> Home</span></a></li>
					<li><a href="profil.php" <?php if($menu=="profil") echo 'class="selected"'; ?>><span> Profil</span></a></li>
					<li><a href="registrasi.php" <?php if($menu=="registrasi") echo 'class="selected"'; ?>><span>Registrasi</span></a></li>
					<li><a href="admin/index.php" <?php if($menu=="login") echo 'class="selected"'; ?>><span>Login</span></a></li>
					
				<?php } ?>
			   			
  </ul>
  </div>
	
	<div class="header_two"></div>	
	<div class="clear"></div>
    <div class="center_content">	
    <div id="right_wrap">
    <div id="right_content">             
	
		