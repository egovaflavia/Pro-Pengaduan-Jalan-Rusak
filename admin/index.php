<?php include "./config/koneksi.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Login | <?php echo $sitename; ?></title>
	<link rel="stylesheet" href="css/login.css" type="text/css" media="all" />
</head>
<body>
<div id="login">
<!-- Box -->
				<div class="box">
					<img src="images/login.png">
					
					<form action="login.php" method="post">
						
						
						<div class="form">
								<p class="inline-field">
									<label>Username</label>
									<input type="text" class="field ukuran" name="username" maxlength="100" />
								</p>										
								<p class="inline-field">
									<label>Password</label>
									<input type="password" class="field ukuran" name="password" maxlength="20" />
								</p>
								<p class="inline-field">
								<label>Login Sebagai</label>
								<select class="field ukuran" class="loginform_input" name="level" style="width:278px;">
													<option value=""></option>
													<option value="Admin">Aministrator</option>
													<option value="Kabid">Kabid </option>												
													<option value="Kadis">Kadis </option>												
													<option value="Pelapor">Pelapor </option>												
																							
												</select>
								</p>
								<p class="inline-field">
									<input type="submit" class="button" value="LOGIN" />
									
								</p>
							
						</div>
						
					</form>
				</div>				
<?php
		if($_GET['pesan']!=''){  ?>
		
		<script language="JavaScript">
					alert("Username & Password tidak Valid");
					
				</script>
			
	<?php }



?>				
</div>				
</body>
</html>