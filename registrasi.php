<?php 
date_default_timezone_set('Asia/Jakarta');

	include "./config/koneksi.php"; 
	include "fungsi.php"; 
	include "header.php";
	
	function transaksi_id($param='P') {
	$dataMax = mysql_fetch_assoc(mysql_query("SELECT MAX(CONVERT(SUBSTRING(kd_pelapor, 2, 4),UNSIGNED INTEGER))  as ID from pelapor")); 
            if($dataMax['ID']=='') { 
                $ID = $param."0001";
            }else {
                $MaksID = $dataMax['ID'];
                $MaksID++;
                if($MaksID < 10) $ID = $param."000".$MaksID; 
                else if($MaksID < 100) $ID = $param."00".$MaksID;                 
                else if($MaksID < 1000) $ID = $param."0".$MaksID;                 
                else if($MaksID < 10000) $ID = $param."".$MaksID;                 
                else $ID = $MaksID; 
            }
            return $ID;
        } 
	
	
	
	
	 if($_GET['aksi']=='add'){
	
			$var1		= transaksi_id();
			$var2		= trim($_POST['var2']);
			$var3		= trim($_POST['var3']);
			$var4		= trim($_POST['var4']);
			$var5		= trim($_POST['var5']);
			$var6		= trim($_POST['var6']);
			$var7		= trim($_POST['var7']);
			
			
			$query	= mysql_query("SELECT * FROM pelapor WHERE email='$var5'");
			$rows	= mysql_fetch_array($query);
		  if($rows['email']!=''){ ?>
			  <div style="margin:30px; border:1px solid #CCC; padding:30px;">
					<div class="msg msg-ok">
						<p><strong>PENDAFTARAN GAGAL!</strong></p>
					</div>
						<h3>Email telah terdaftar silahkan gunakan email lain!.</h3>
					</div>
		<?php }else{
				  mysql_query("INSERT INTO pelapor VALUES ('$var1','$var2','$var3','$var4','$var5','$var6','$var7')") or die (mysql_error());

					?>
					<div style="margin:30px; border:1px solid #CCC; padding:30px;">
					<div class="msg msg-ok">
						<p><strong>DATA TELAH DISIMPAN</strong></p>
					</div>
						<h3>Data anda telah tersimpan dalam database kami. Silahkan Login.</h3>
					</div>
					<?php
					
		  }		
							
		  
		  
	}




?>
		

<script language="JavaScript">
function cek_kosong() {
if (document.getElementById('pass1').value != document.getElementById('pass2').value ) {
	alert("Periksa kembali password anda!");
	return false;
}


return true;
}
</script>
  

  

   <div style="padding:10px">	
			<form name="form" action="?aksi=add" method="post"  onsubmit="return cek_kosong();">	
								
				<div class="loginform" style="min-height:100px; border:1px solid #DDD; padding:20px 30px;">
				<h3 style="color:#032f55; font-size:16px; margin:-2px 0px; font-weight:bold;">FORM PENDAFTARAN</h3>	
				<p style="font-size:12px; line-height:24px; border-bottom:1px solid #333; padding-bottom:10px; margin-bottom:20px;">Silahkan lengkapi form dibawah ini.</p>	

				
				<table>
					
					
					
					
					
					
					<tr>
						<td>
							<div class="loginform_row">
								<label>Nama Lengkap </label>
								<input type="text" class="loginform_input"  name="var2"   required/>
							</div>
						</td>
						
					</tr>
					
					<tr>
						<td>
							<div class="loginform_row">
								<label>Alamat </label>
								<input type="text" class="loginform_input"  name="var3"  required/>
							</div>
						</td>
						
					</tr>
					
					<tr>
						<td>
							<div class="loginform_row">
								<label>Telpon </label>
								<input type="text" class="loginform_input"  name="var4"  required/>
							</div>
						</td>
						
					</tr>
					
					<tr>
						<td>
							<div class="loginform_row">
								<label>Email </label>
								<input type="text" class="loginform_input"  name="var5"  required/>
							</div>
						</td>
						
					</tr>
					
					<tr>
						<td>
							<div class="loginform_row">
								<label>Username </label>
								<input type="text" class="loginform_input"  name="var6"  required/>
							</div>
						</td>
						
					</tr>
					
					<tr>
						<td>
							<div class="loginform_row">
								<label>Password </label>
								<input type="password" class="loginform_input" id="pass1" name="var7"   required/>
							</div>
						</td>
						
					</tr>
					
					<tr>
						<td>
							<div class="loginform_row">
								<label>Ulangi Password</label>
								<input type="password" class="loginform_input" id="pass2" name="var8"   required/>
							</div>
						</td>
						
					</tr>
					
					<tr>
						<td>
							<div class="loginform_row">
								<input type="submit" name="submit" class="submit" value="Daftar" />				
							</div>
						</td>
						
					</tr>
					
				</table>
					
					
					
					<div class="clear"></div>
					</div>
				
			</div>
	  

 


       <!-- end image slider -->

     </div>
     </div><!-- end of right content-->
                      
<?php
include "footer.php"; 
?>						