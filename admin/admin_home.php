<?php 
session_start();
if (ISSET($_SESSION['username'])) {
include "header.php";  
?>		
		<div style="border:30px solid #EEE; padding:30px; background:#FFF; font-size:12px; line-height:24px;">
				<marquee><h3 style="color:#e30450; font-size:16px; padding:30px 50px; ">Selamat datang di sistem informasi pengaduan jalan rusak pada <?php echo $sitename; ?></h3></marquee>
				
				<table cellpadding='10' cellspacing='10'>
					<tr>
						<td >Selamat datang di sistem informasi pengaduan jalan rusak pada <?php echo $sitename; ?>. Anda memiliki hak akses untuk mengolah data pelapor dan data pengaduan. pastikan anda logout sebelum meninggalkan sistem ini untuk menjaga keamanan data sistem informasi pengaduan jalan rusak pada <?php echo $sitename; ?>. Selamat Bekerja...</td>
					</tr>				
				</table>
				
				<table cellpadding='10' cellspacing='10' style="margin-top:20px">
					<tr>
						<td align="center"><a href="admin_petugas.php" ><img src="images/menu1.png" width="100"></a></td>
						<td align="center"><a href="admin_status.php" ><img src="images/menu2.png" width="100"></a></td>
						<td align="center"><a href="admin_lappengaduan.php" ><img src="images/menu3.png" width="100"></a></td>
						<td align="center"><a href="admin_lappelapor.php" ><img src="images/menu4.png" width="100"></a></td>
					</tr>	
					<tr>
						<td width="180" align="center"><a href="admin_petugas.php" >DATA PETUGAS</a></td>
						<td width="180" align="center"><a href="admin_status.php" >DATA PENGADUAN</a></td>
						<td width="180" align="center"><a href="admin_lappengaduan.php" >LAPORAN PENGADUAN</a></td>
						<td width="180" align="center"><a href="admin_lappelapor.php" >LAPORAN PELAPOR</a></td>
					</tr>						
				</table>
		
		</div>      
<?php
include "footer.php"; 
} else { 
	header("location: index.php");
} 
?>						