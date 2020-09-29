<?php 
session_start();
if (ISSET($_SESSION['username'])) {
include "header.php"; 
include "fungsi.php";
function transaksi_id($param='T') {
$dataMax = mysql_fetch_assoc(mysql_query("SELECT MAX(CONVERT(SUBSTRING(kd_tindakan, 2, 2),UNSIGNED INTEGER))  as ID from tindakan")); 
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
?>

<?php if($_GET['aksi']=='add2') { //PROSES ?>


		
<?php }elseif($_GET['aksi']=='edit2') { //UPDATE POSTING ?>	
<?php

	$kode		= trim($_POST['kode']);	
	$var1		= trim($_POST['var1']);
	$var2		= trim($_POST['var2']);
	$var3		= trim($_POST['var3']);
	$var4		= trim($_POST['var4']);
	$var5		= trim($_POST['var5']);

	mysql_query("DELETE FROM tindakan where kd_pengaduan='$kode'")or die(mysql_error());
	
		$query = "INSERT INTO tindakan VALUES ('$var1','$var2','$var3','$var4','$var5')";
		if(mysql_query($query)) {
		?>
		<div class="msg msg-ok"><!-- Message OK -->
			<p><strong>Data Berhasil Disimpan!</strong></p>
		</div><!-- End Message OK -->
		<?php
		} else {
		?>
		<div class="msg msg-error"><!-- Message Error -->
			<p><strong>Data Gagal Disimpan!</strong></p>
		</div><!-- End Message Error -->
		<?php
		} //end proses add
		?>
		
		
<?php }elseif($_GET['aksi']=='del') { //DEL POSTING ?>	
			

		
			<?php } //AKHIR PROSES ?>

<?php if($_GET['aksi']=='add') {  
$id		= trim($_GET['id']);
$query	= mysql_query("SELECT a.*,b.* FROM 
				pengaduan a, pelapor b where a.kd_pelapor=b.kd_pelapor  and  a.kd_pengaduan='$id'");
$data	= mysql_fetch_array($query);
$query2	= mysql_query("SELECT * FROM tindakan where kd_pengaduan='$id'");
$data2	= mysql_fetch_array($query2);
?>		
<form name="form" action="?aksi=edit2" method="post" enctype="multipart/form-data" onsubmit="return cek_kosong();">	
<!-- Box  -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2>Entri Data Tindakan</h2>
					</div>
					<!-- Form -->
						<div class="form">								
							
                <table>
					
					<tr>
					
					
					
					<tr>
						<td colspan='6'>
							<p style="font-size:12px; line-height:24px; border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:20px;">A. DATA PELAPOR</p>	

						
						</td>
						
					</tr>
					
						
					<tr>
						<td>
							<div class="loginform_row">
								<label>Kode Pelapor </label>
								<input type="text" class="loginform_input"value="<?php echo $data['kd_pelapor']?>" disabled />
								<input type="hidden" class="loginform_input" name="kode" value="<?php echo $data['kd_pengaduan']?>"  />
								
							</div>
						</td>						
					</tr>
					<tr>
					

				

								
					<tr>
						<td>
							<div class="loginform_row">
								<label>Nama Pelapor </label>
								<input type="text" class="loginform_input" name="" value="<?php echo $data['nm_pelapor']?>" disabled  />
							</div>
						</td>						
					</tr>
					
					
					<tr>
						<td>
							<div class="loginform_row">
								<label>Alamat</label>
								<input type="text" class="loginform_input"   name="" value="<?php echo $data['alamat']?>" disabled />
							</div>
						</td>
						
					</tr>
					
					
					<tr>
						<td>
							<div class="loginform_row">
								<label>Telpon </label>
								<input type="text" class="loginform_input"  name="" value="<?php echo $data['tlp_pelapor']?>" disabled />
							</div>
						</td>
						
					</tr>
					
					
					<tr>
						<td>
							<div class="loginform_row">
								<label>Email</label>
								<input type="text" class="loginform_input"  name="" value="<?php echo $data['email']?>" disabled />
							</div>
						</td>
						
					</tr>
					
					
				
					
					
					<tr>
						<td colspan='6'>
							<p style="font-size:12px; line-height:24px; border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:20px;">B. DATA PENGADUAN</p>	

						
						</td>
						
					</tr>
					
					<tr>
						<td>
							<div class="loginform_row">
								<label>Kode </label>
								<input type="text" class="loginform_input" name="" value="<?php echo $data['kd_pengaduan']?>" disabled  />
							</div>
						</td>						
					</tr>
					
					
					<tr>
						<td>
							<div class="loginform_row">
								<label>Tanggal</label>
								<input type="text" class="loginform_input"   name="" value="<?php echo $data['tgl_pengaduan']?>" disabled />
							</div>
						</td>
						
					</tr>
					
					
					<tr>
						<td>
							<div class="loginform_row">
								<label>Pengaduan</label>
								<input type="text" class="loginform_input"  name="" value="<?php echo $data['jdl_pengaduan']?>" disabled />
							</div>
						</td>
						
					</tr>
					
					
					<tr>
						<td>
							<div class="loginform_row">
								<label>Keterangan</label>
								<input type="text" class="loginform_input"  name="" value="<?php echo $data['keterangan']?>" disabled />
							</div>
						</td>
						
					</tr>
					
					<tr>
						<td>
							<div class="loginform_row">
								<label>Lokasi</label>
								<input type="text" class="loginform_input"  name="" value="<?php echo $data['lokasi']?>" disabled />
							</div>
						</td>
						
					</tr>
					
					<tr>
						<td>
							<div class="loginform_row">
								<label>Status</label>
								<input type="text" class="loginform_input"  name="" value="<?php echo $data['status']?>" disabled />
							</div>
						</td>
						
					</tr>
					
				
					<tr>
						<td>
							<div class="loginform_row">
								<label>Foto</label>
								<img src="foto/<?php echo $data['foto']?>" width="200">
							</div>
						</td>						
					</tr>
					

					
					<tr>
						<td colspan='6'>
							<p style="font-size:12px; line-height:24px; border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:20px;">C. ENTRI DATA TINDAKAN</p>	

						
						</td>
						
					</tr>
					
					<tr>
						<td>
							<div class="loginform_row">
								<label>Kode Tindakan</label>
								<input type="text" class="loginform_input" name="var1" value="<?php echo transaksi_id()?>"   />
							</div>
						</td>						
					</tr>
					
					
					<tr>
						<td>
							<div class="loginform_row">
								<label>Kode Pengaduan</label>
								<input type="text" class="loginform_input" name="var2" value="<?php echo $data['kd_pengaduan']?>"   />
							</div>
						</td>						
					</tr>
					
					
					<tr>
						<td>
							<div class="loginform_row">
								<label>Tanggal</label>
								<input type="text" class="loginform_input"   name="var3" id="tanggal" value="<?php echo $data2['tgl_tindakan']?>" />
							</div>
						</td>
						
					</tr>
					
					
					<tr>
						<td>
							<div class="loginform_row">
								<label>Petugas</label>
								<select class="loginform_input" name="var4" required>
								<option value="" <?php echo $selek[$i];?>></option>
										<?php //ambil kat
										$query	= mysql_query("SELECT * FROM petugas");
										$i	= 1;
										while( $row = mysql_fetch_array($query) ){
										if($data2['kd_petugas']==$row['kd_petugas']) $selek[$i]='selected';
										?>
										<option value="<?php echo $row['kd_petugas']; ?>" <?php echo $selek[$i];?>><?php echo $row['nama']; ?></option>
										<?php
										$i++;
										} //end ambil kat
										?>
									</select>		
							</div>
						</td>
						
					</tr>
					
					
					<tr>
						<td>
							<div class="loginform_row">
								<label>Tindakan</label>
								<input type="text" class="loginform_input"   name="var5" value="<?php echo $data2['keterangan']?>" />
							</div>
						</td>
						
					</tr>
					
					
					
				</table>
                               
                              

							   <div class="cl">&nbsp;</div>
																																						
						</div>
						
						<div class="buttons">
							<input type="submit" class="button" value="Simpan Data" />
						</div>
						
				</div>
				<!-- End Box  -->	
</form>							
<?php } elseif($_GET['aksi']=='edit') {  ?>

<?php } else { //TAMPIL TABEL =========================================================================================== ?>					
<!-- Box -->
				
				<div class="scroll">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Entri Data Tindakan</h2>						
					</div>
						<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>		<th width="13">No</th>
								<th>Kode</th>
								<th>Tanggal</th>
								<th>Judul Laporan</th>
								<th>Lokasi</th>
								<th>Keterangan</th>
								<th>Tindakan</th>					
								<th>Aksi</th>						
												
								 
							</tr>
<?php 
    $thispage = $PHP_SELF ;
	$query = mysql_query("SELECT a.*,b.*,a.keterangan as ket1, a.kd_pengaduan as kode1, 
	b.keterangan as ket2 FROM pengaduan a left join tindakan b on (a.kd_pengaduan=b.kd_pengaduan) 
	order by a.kd_pengaduan DESC");
    $num = mysql_num_rows($query); // number of items in list
    $per_page = 10000; // Number of items to show per page
	$start = $_GET['start'];
    if(empty($start))$start=0;  // Current start position

    $max_pages = ceil($num / $per_page); // Number of pages
    $cur = ceil($start / $per_page)+1; // Current page number

$sql = mysql_query("SELECT a.*,b.*,a.keterangan as ket1, a.kd_pengaduan as kode1, 
	b.keterangan as ket2 FROM pengaduan a left join tindakan b on (a.kd_pengaduan=b.kd_pengaduan) 
	order by a.kd_pengaduan DESC  LIMIT $start,$per_page"); 
$i=$start+1;
while($row = mysql_fetch_array($sql)) {		
		if($i%2==1) { $klas=' class="odd"'; } else { $klas=''; }	
	?>							
							<tr<?php echo $klas;?>>
								<td><?php echo $i;?>.</td>
								<td><h3><a href="?"><?php echo $row['kode1']; ?></a></h3></td>
								<td><h3><a href="?"><?php echo $row['tgl_pengaduan']; ?></a></h3></td>
								<td><?php echo $row['jdl_pengaduan']; ?></td>
								<td><?php echo $row['lokasi']; ?></td>
								<td><?php echo $row['ket1']; ?></td>							
								<td><?php echo $row['ket2']; ?></td>							
								<td><a href="?aksi=add&id=<?php echo $row['kode1']; ?>">Tindakan</a></td>
								</td>
								
							</tr>
<?php $i++; } ?>							
						</table>
						
						
						<!-- Pagging -->
						<div class="pagging">
							<div class="left">Menampilkan <?php print($cur);?> dari <?php print($max_pages);?> ( <?php print($num);?> data )</div>
							<div class="right">
							<?php
if(($start-$per_page) >= 0)
{
    $next = $start-$per_page;
?>
<a href="<?php print("$thispage".($next>=0?("?start=").$next:""));?>">sebelumnya</a> 
<?php
}
?>

<?php 
if($start+$per_page<$num)
{
?>
<a href="<?php print("$thispage?start=".max(0,$start+$per_page));?>">berikutnya</a> 
<?php
}
?>
							</div>
						</div>
						<!-- End Pagging -->
						
					</div>
					<!-- Table -->
					
				</div>
				<!-- End Box LIST -->
<?php } //AKHIR =========================================================================================== ?>			
												
<?php
include "footer.php"; 
} else { 
	//SESSION KOSONG
	header("location: index.php");
} 
?>						