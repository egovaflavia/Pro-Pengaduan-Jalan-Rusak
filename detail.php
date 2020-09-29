<?php 
include "./config/koneksi.php"; 
include "header.php";
?>

<div class="box">	
<table>
<?php 
		$no=0;
		$hasil= mysql_query("SELECT a.*,b.*,a.keterangan as ket1, a.kd_pengaduan as kode1, c.*, b.keterangan as ket2 
		FROM pengaduan a left join tindakan b on (a.kd_pengaduan=b.kd_pengaduan) 
		left join pelapor c on (a.kd_pelapor=c.kd_pelapor) where a.kd_pengaduan='".$_GET['id']."' limit 1");
		while($data = mysql_fetch_array($hasil)){ $no++;?>
		<tr>
			<td colspan="3"><h3>Data Pelapor</h3></td>
		</tr>
		<tr>
			<td>Kode Pelapor</td>
			<td>:</td>
			<td><?php echo $data['kd_pelapor'];?></td>
		</tr>
		
		<tr>
			<td>Nama Pelapor</td>
			<td>:</td>
			<td><?php echo $data['nm_pelapor'];?></td>
		</tr>
		
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><?php echo $data['alamat'];?></td>
		</tr>
		<tr>
			<td>Telpon</td>
			<td>:</td>
			<td><?php echo $data['tlp_pelapor'];?></td>
		</tr>
		
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3"><h3>Data Pengaduan</h3></td>
		</tr>
		<tr>
			<td>Judul Laporan</td>
			<td>:</td>
			<td><?php echo $data['jdl_pengaduan'];?></td>
		</tr>
		<tr>
			<td>Tanggal</td>
			<td>:</td>
			<td><?php echo $data['tgl_pengaduan'];?></td>
		</tr>
		<tr>
			<td colspan="3"><img src="admin/foto/<?php echo $data['foto'];?>" width="400"></td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td>:</td>
			<td><?php echo $data['ket1'];?></td>
		</tr>
		<tr>
			<td>Tindakan</td>
			<td>:</td>
			<td><?php echo $data['ket2'];?></td>
		</tr>
		
				
		<?php echo $data['isi'];?>
		<?php }?>
</table>		
</div>
	  
       <!-- end image slider -->

     </div>
     </div><!-- end of right content-->
                      
<?php
include "footer.php"; 
?>						