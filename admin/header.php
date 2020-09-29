<?php include "./config/koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel | <?php echo $sitename; ?></title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
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
</script><link type="text/css" href="js/themes/base/ui.all.css" rel="stylesheet" />   
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>	
	<script type="text/javascript" src="js/ui/ui.datepicker.js"></script>
	<script type="text/javascript" src="js/ui/i18n/ui.datepicker-id.js"></script>
	<script type="text/javascript"> 
		  $(document).ready(function(){
			$("#tanggal").datepicker({
						dateFormat  : 'yy-mm-dd',        
			  changeMonth : true,
			  changeYear  : true					
			});
		  });
    </script>
	
	<script type="text/javascript"> 
		  $(document).ready(function(){
			$("#tanggal2").datepicker({
						dateFormat  : 'yy-mm-dd',        
			  changeMonth : true,
			  changeYear  : true					
			});
		  });
    </script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>
<body>
<div class="panel">
<!-- Header -->
<div id="header">
	<div class="shell" style="background:none;">
		<!-- Logo + Top Nav -->
		<div id="top">
				<a href="#"></a>
			
			
		</div>
		  
   
		

	<div class="cl">&nbsp;</div>
		<div id="place-nav">
		<ul id="nav">
	
			<li><a href="admin_home.php"><span>Beranda</span></a></li>
			<li><a href="profil.php"><span>Profil</span></a></li>
			<li><a href="admin_setting.php" ><span>Setting</span></a></li>
			<li><a href="logout.php" ><span>Logout</span></a></li>
					
		</ul>
		</div> 
		<div class="cl">&nbsp;</div>
			
		
		
	</div>
</div>
<!-- End Header -->
	<div class="cl">&nbsp;</div>

 <div class="center_content">   
<div id="right_wrap">
    <div id="right_content">
	<div style="padding:5px;  margin-bottom:10px; color:#F00;">
	 
	 </div>
	
	
	 