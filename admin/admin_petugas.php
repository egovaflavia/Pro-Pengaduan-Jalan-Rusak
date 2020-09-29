<?php 
session_start();
if (ISSET($_SESSION['username'])) {

include "header.php"; 
include "fungsi.php"; 
function transaksi_id($param='P') {
$dataMax = mysql_fetch_assoc(mysql_query("SELECT MAX(CONVERT(SUBSTRING(kd_petugas, 2, 2),UNSIGNED INTEGER))  as ID from petugas")); 
            if($dataMax['ID']=='') { 
                $ID = $param."01";
            }else {
                $MaksID = $dataMax['ID'];
                $MaksID++;
                if($MaksID < 10) $ID = $param."0".$MaksID; 
                else if($MaksID < 100) $ID = $param."".$MaksID;                 
                else $ID = $MaksID; 
            }
            return $ID;
        } 
?>



<?php if($_GET['aksi']=='add2') { //PROSES ?>
<?php

	$var0		= transaksi_id();
	$var1		= trim($_POST['var1']);
	$var2		= trim($_POST['var2']);
	$var3		= trim($_POST['var3']);
	$var4		= trim($_POST['var4']);
	$var5		= trim($_POST['var5']);
	$var6		= trim($_POST['var6']);
	$var7		= trim($_POST['var7']);

		

		$query = "INSERT INTO petugas  VALUES ('$var0','$var1','$var2','$var3','$var4','$var5','$var6','$var7')";
		if(mysql_query($query)) {
		?>
		<div class="msg msg-ok"><!-- Message OK -->
			<p><strong>Data BERHASIL disimpan </strong></p>
		</div><!-- End Message OK -->
		<?php
		} else {
		?>
		<div class="msg msg-error"><!-- Message Error -->
			<p><strong>Data GAGAL disimpan </strong></p>
		</div><!-- End Message Error -->
		<?php
		} //end proses add
		?>
		
<?php }elseif($_GET['aksi']=='edit2') { //UPDATE POSTING ?>	
<?php
	$id			= trim($_GET['id']);
	$var1		= trim($_POST['var1']);
	$var2		= trim($_POST['var2']);
	$var3		= trim($_POST['var3']);
	$var4		= trim($_POST['var4']);
	$var5		= trim($_POST['var5']);
	$var6		= trim($_POST['var6']);
	$var7		= trim($_POST['var7']);
	
	
	
	
	


		$query = "UPDATE petugas SET  nama='$var1',
									alamat='$var2',
									telpon='$var3',
									email='$var4',
									username='$var5',
									password='$var6',
									level='$var7'
									WHERE kd_petugas='$id'";
		if(mysql_query($query)) {
		?>
		<div class="msg msg-ok"><!-- Message OK -->
			<p><strong>Data BERHASIL diupdate <?php echo $pesan; ?> </strong></p>
		</div><!-- End Message OK -->
		<?php
		} else {
		?>
		<div class="msg msg-error"><!-- Message Error -->
			<p><strong>Data GAGAL diupdate <?php echo $pesan; ?> </strong></p>
		</div><!-- End Message Error -->
		<?php
		} //end proses add
		?>
		
		
<?php }elseif($_GET['aksi']=='del') { //DEL POSTING ?>	
			<?php
			$id		= trim($_GET['id']);
			$query	= "DELETE FROM petugas WHERE kd_petugas='$id'  LIMIT 1";
			//
			if(mysql_query($query)) {
			?>
			<div class="msg msg-ok"><!-- Message OK -->
				<p><strong>Data BERHASIL dihapus</strong></p>
			</div><!-- End Message OK -->
			<?php
			} else {
			?>
			<div class="msg msg-error"><!-- Message Error -->
				<p><strong>Data GAGAL dihapus</strong></p>
			</div><!-- End Message Error -->
			<?php
			}
			?>		

		
			<?php } //AKHIR PROSES ?>

<?php if($_GET['aksi']=='add') { //ADD POSTING =========================================================================================== ?>		
<form name="form" action="?aksi=add2" method="post" enctype="multipart/form-data" onsubmit="return cek_kosong();">	
<!-- Box  -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2>Form Data petugas</h2>
					</div>
					<!-- End Box Head -->				
						
						<!-- Form -->
						<div class="form">								
								<p class="inline-field">
									<label>Nama petugas:</label>
									<input type="text" class="field size3" name="var1" required  />
								</p>
								
                                <p class="inline-field">
									<label>Alamat  :</label>
									<input type="text" class="field size9" name="var2" required />
								</p>
								
                           
								
                           
								<p class="inline-field">
									<label>Telpon :</label>
									<input type="text" class="field size2" name="var3" required />
								</p>
                               
                               
								<p class="inline-field">
									<label>Email :</label>
									<input type="text" class="field size4" name="var4" required />
								</p>
								
								
								<p class="inline-field">
									<label>username  :</label>
									<input type="text" class="field size2" name="var5" required />
								</p>
                               
                                <p class="inline-field">
									<label>Password  :</label>
									<input type="text" class="field size2" name="var6" required />
								</p>
                               
                                 <p class="inline-field">
									<label>Level  :</label>
									<select class="field size6" name="var7" required >
											<option value=""></option>
											<option value="Admin">Aministrator</option>
											<option value="Kabid">Kabid </option>	
											<option value="Kadis">Kadis </option>	
									</select>
								</p>
                               
                              

							   <div class="cl">&nbsp;</div>
																																						
						</div>
						
						<div class="buttons">
							<input type="submit" class="button" value="Simpan Data" />
						</div>
						<!-- End Form Buttons -->
					
				</div>
				<!-- End Box  -->	
</form>							
<?php } elseif($_GET['aksi']=='edit') { //EDIT POSTING =========================================================================================== ?>
<?php
$id		= trim($_GET['id']);
$query	= mysql_query("SELECT * FROM petugas WHERE kd_petugas='$id'");
$rows	= mysql_fetch_array($query);
?>	
<form name="form" action="?aksi=edit2&id=<?php echo $rows['kd_petugas']; ?>" method="post"  enctype="multipart/form-data" onsubmit="return cek_kosong();">
<!-- Box FORM -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2>Edit Data petugas</h2>
					</div>
					<!-- End Box Head -->				
						
						<!-- Form -->
						<div class="form">								
                                <p class="inline-field">
									<label>Nama petugas :</label>
									<input type="text" class="field size3" name="var1"  value="<?php echo $rows['nama']; ?>" required  />
								</p>
								
                                <p class="inline-field">
									<label>Alamat :</label>
									<input type="text" class="field size9" name="var2"  value="<?php echo $rows['alamat']; ?>" required />
								</p>						


								
                           
								<p class="inline-field">
									<label>Telpon :</label>
									<input type="text" class="field size2" name="var3"  value="<?php echo $rows['telpon']; ?>" required />
								</p>
                               
                               
								<p class="inline-field">
									<label>Email  :</label>
									<input type="text" class="field size4" name="var4"  value="<?php echo $rows['email']; ?>" required />
								</p>
								
								
								<p class="inline-field">
									<label>Username :</label>
									<input type="text" class="field size3" name="var5"  value="<?php echo $rows['username']; ?>" required />
								</p>
                               
                                <p class="inline-field">
									<label>Password :</label>
									<input type="text" class="field size3" name="var6"  value="<?php echo $rows['password']; ?>" required />
								</p>
                               
                                 <p class="inline-field">
									<label>Level :</label>
									<select class="field size6" name="var7" required >
											<option value=""></option>
											<option value="Admin"  <?php if ($rows['level']=='Admin') echo "selected"; ?>>Administrator</option>
											<option value="Kabid" <?php if ($rows['level']=='Kabid') echo "selected"; ?>>Kabid </option>												
											<option value="Kadis" <?php if ($rows['level']=='Kadis') echo "selected"; ?>>Kadis</option>												
											
									</select>
								</p>
                               
                              
                               
                             
							  
                                </div>
								<div class="cl">&nbsp;</div>
																																
						
						<!-- Form Buttons -->
						<div class="buttons">
							<input type="submit" class="button" value="Update Data" />
						</div>
						<!-- End Form Buttons -->
				</div>
				<!-- End Box FORM -->
<!-- End Box FORM -->
</form>	
		
<?php } else { //TAMPIL TABEL =========================================================================================== ?>					
<!-- Box -->
				<div class="box">				
					
					<div class="box-content">
						<a href="?aksi=add" class="add-button"><span>Tambah Data Baru</span></a>
						<div class="right">
							<label>Cari Data</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="cari" />
						</div>
						<div class="cl">&nbsp;</div>
					</div>
				</div>
				<!-- End Box -->
				
				<!-- Box LIST -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Data petugas</h2>						
					</div>
					<!-- End Box Head -->	

					<!-- Table -->
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th width="13">No</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Telpon</th>							
								<th>username</th>							
								<th>Level</th>							
								 <th width="110" class="ac">Pengaturan</th>
							</tr>
<?php 
    $thispage = $PHP_SELF ;
	$query = mysql_query("SELECT * from petugas");
    $num = mysql_num_rows($query); // number of items in list
    $per_page = 10; // Number of items to show per page
	$start = $_GET['start'];
    if(empty($start))$start=0;  // Current start position

    $max_pages = ceil($num / $per_page); // Number of pages
    $cur = ceil($start / $per_page)+1; // Current page number

$sql = mysql_query("SELECT * from petugas order by kd_petugas DESC LIMIT $start,$per_page"); 
$i=$start+1;
while($row = mysql_fetch_array($sql)) {		
		if($i%2==1) { $klas=' class="odd"'; } else { $klas=''; }	
	?>							
							<tr<?php echo $klas;?>>
								<td><?php echo $i;?>.</td>
								<td><h3><a href="?aksi=edit&id=<?php echo $row['kd_petugas']; ?>"><?php echo $row['nama']; ?></a></h3></td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['telpon']; ?></td>
								<td><?php echo $row['username']; ?></td>
								<td><?php echo $row['level']; ?></td>
								<td valign="top"><a href="?aksi=del&id=<?php echo $row['kd_petugas']; ?>" onClick="return confirm('Apakah anda ingin menghapus data ini ?')" class="ico del" >
								Hapus</a><a href="?aksi=edit&id=<?php echo $row['kd_petugas']; ?>" class="ico edit">Edit</a>
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