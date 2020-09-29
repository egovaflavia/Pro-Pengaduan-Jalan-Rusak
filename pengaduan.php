<?php 
date_default_timezone_set('Asia/Jakarta');

	include "./config/koneksi.php"; 
	include "fungsi.php"; 
	include "header.php";
	
	function transaksi_id($param='P') {
	$dataMax = mysql_fetch_assoc(mysql_query("SELECT MAX(CONVERT(SUBSTRING(kd_pengaduan, 2, 4),UNSIGNED INTEGER))  as ID from pengaduan")); 
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
			$var2		= date("Y-m-d");
			$var3		= $_SESSION['userid'];
			$var4		= trim($_POST['var4']);
			$var5		= trim($_POST['var5']);
			$var6		= trim($_POST['var6']);
			$var7		= trim($_POST['var7']);
			$var8		= "Baru";
			

			
			list($width, $height) = getimagesize($_FILES['foto']['tmp_name']);
			$ekstensi	= $_FILES['foto']['type'];
			$ekstensi	= str_replace("image/", "", $ekstensi);
			$namafoto	= date("dmyhis").'_'.bersihkan_nama(trim($_POST['namabarang'])).".".$ekstensi;
			
		

			$loc=$_FILES['foto']['tmp_name'];
			$des="admin/foto/".$namafoto;
			if (move_uploaded_file($loc, $des))
				  {  $pesan='. Foto berhasil dikirim'; }
			else
				  { $pesan='. Foto asli gagal di upload'; }
			  
			  

		  
				  mysql_query("INSERT INTO pengaduan VALUES ('$var1','$var2','$var3','$var4','$var5','$var6','$namafoto','$var8')") or die (mysql_error());

					?>
					<div style="margin:30px; border:1px solid #CCC; padding:30px;">
					<div class="msg msg-ok">
						<p><strong>DATA TELAH DISIMPAN</strong></p>
					</div>
						<h3>Terimakasih atas laporan data kami akan segera melakukan tindakan.</h3>
					</div>
					<?php
		  
	}




?>
		

  

  

   <div style="padding:10px">	
			<form name="form" action="?aksi=add" method="post"  onsubmit="return cek_kosong();" enctype="multipart/form-data">	
								
				<div class="loginform" style="min-height:100px; border:1px solid #DDD; padding:20px 30px;">
				<h3 style="color:#032f55; font-size:16px; margin:-2px 0px; font-weight:bold;">FORM PENGADUAN</h3>	
				<p style="font-size:12px; line-height:24px; border-bottom:1px solid #333; padding-bottom:10px; margin-bottom:20px;">Silahkan lengkapi form dibawah ini.</p>	

				
				<table>
					
					
					
					
					
					
					<tr>
						<td>
							<div class="loginform_row">
								<label>Pengaduan </label>
								<input type="text" class="loginform_input"  name="var4"   required/>
							</div>
						</td>
						
					</tr>
					
					<tr>
						<td>
							<div class="loginform_row">
								<label>Lokasi </label>
								<input type="text" class="loginform_input"  name="var6"  required/>
							</div>
						</td>
						
					</tr>
					
					<tr>
						<td>
							<div class="loginform_row">
								<label>Keterangan </label>
								<input type="text" class="loginform_textarea"  name="var5"  required/>
							</div>
						</td>
						
					</tr>
					
					<tr>
						<td>
							<div class="loginform_row">
								<label>Foto </label>
								<input type="file" class="loginform_input"  id="foto" name="foto" enctype="multipart/form-data" required/>
							</div>
						</td>
						
					</tr>
					
					
					
					<tr>
						<td>
							<div class="loginform_row">
								<input type="submit" name="submit" class="submit" value="Kirim Pengaduan" />				
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