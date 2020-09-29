<?php 
session_start();
if (ISSET($_SESSION['username'])) {
$menu	="lap1";
include "header.php"; 
include "fungsi.php"; 

//SESSION OK
$entri	= $_SESSION['userid'];
?>

<?php if($_GET['aksi']=='cari'){ ?>
<div class="box">
<div class="box-head" >
						<h2 class="left">Laporan Pengaduan</h2>						
					</div>
			  <form action="?aksi=cari" method="post">
				<div class="form">
						<p class="inline-field" >
						<label>Bulan<span>(wajib di isi)</span></label>						
						<select name="bulan" class="field size3">
						<option value="01" <?php if($_POST['bulan']=='01') {echo "selected";} ?>>Januari</option>
						<option value="02" <?php if($_POST['bulan']=='02') {echo "selected";} ?>>Februari</option>
						<option value="03" <?php if($_POST['bulan']=='03') {echo "selected";} ?>>Maret</option>
						<option value="04" <?php if($_POST['bulan']=='04') {echo "selected";} ?>>April</option>
						<option value="05" <?php if($_POST['bulan']=='05') {echo "selected";} ?>>Mei</option>
						<option value="06" <?php if($_POST['bulan']=='06') {echo "selected";} ?>>Juni</option>
						<option value="07" <?php if($_POST['bulan']=='07') {echo "selected";} ?>>Juli</option>
						<option value="08" <?php if($_POST['bulan']=='08') {echo "selected";} ?>>Agustus</option>
						<option value="09" <?php if($_POST['bulan']=='09') {echo "selected";} ?>>September</option>
						<option value="10" <?php if($_POST['bulan']=='10') {echo "selected";} ?>>Oktober</option>
						<option value="11" <?php if($_POST['bulan']=='11') {echo "selected";} ?>>November</option>
						<option value="12" <?php if($_POST['bulan']=='12') {echo "selected";} ?>>Desember</option>
					</select>
					
					
					<select name="tahun" class="field size2">
					
					<option value="2019" <?php if($_POST['tahun']=='2019') {echo "selected";} ?>>2019</option>
					<option value="2020" <?php if($_POST['tahun']=='2020') {echo "selected";} ?>>2020</option>
					<option value="2021" <?php if($_POST['tahun']=='2021') {echo "selected";} ?>>2021</option>
					<option value="2022" <?php if($_POST['tahun']=='2022') {echo "selected";} ?>>2022</option>
					<option value="2023" <?php if($_POST['tahun']=='2023') {echo "selected";} ?>>2023</option>
					<option value="2024" <?php if($_POST['tahun']=='2024') {echo "selected";} ?>>2024</option>
					</select>
					</p>
				<p class="inline-field" >
						<label>Pimpinan<span>(wajib di isi)</span></label>
						<input type="text" name="pimpinan" value="<?php echo $_POST['pimpinan'];?>" class="field size4">             
				</select>
				</p>
				<input type="submit" class="button" value="View">
				<a href="print_lappengaduan.php?bulan=<?php echo $_POST['bulan']; ?>&tahun=<?php echo $_POST['tahun'];?>&pimpinan=<?php echo $_POST['pimpinan'];?>" target="new"><input type="button" class="button" value="Cetak"></a>
                </form>
               
 </div>            
          
		

					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Laporan Pengaduan</h2>						
					</div>
						<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>		<th width="13">No</th>
								<th>Kode</th>
								<th>Tanggal</th>
								<th>Judul Laporan</th>
								<th>Keterangan</th>
								<th>Lokasi</th>
								<th>Status</th>	
							</tr>
<?php 
    $thispage = $PHP_SELF ;
	$query = mysql_query("SELECT a.*,b.* FROM 
				pengaduan a, pelapor b where a.kd_pelapor=b.kd_pelapor 
				and month(a.tgl_pengaduan)='".$_POST['bulan']."' and  
				year(a.tgl_pengaduan)='".$_POST['tahun']."'  
				order by a.kd_pengaduan DESC");
    $num = mysql_num_rows($query); // number of items in list
    $per_page = 10000; // Number of items to show per page
	$start = $_GET['start'];
    if(empty($start))$start=0;  // Current start position

    $max_pages = ceil($num / $per_page); // Number of pages
    $cur = ceil($start / $per_page)+1; // Current page number

$sql = mysql_query("SELECT a.*,b.* FROM 
				pengaduan a, pelapor b where a.kd_pelapor=b.kd_pelapor 
				and month(a.tgl_pengaduan)='".$_POST['bulan']."' and  
				year(a.tgl_pengaduan)='".$_POST['tahun']."'  
				order by a.kd_pengaduan DESC  LIMIT $start,$per_page"); 
$i=$start+1;
while($row = mysql_fetch_array($sql)) {		
		if($i%2==1) { $klas=' class="odd"'; } else { $klas=''; }	
	?>							
							<tr<?php echo $klas;?>>
								<td><?php echo $i;?>.</td>
								<td><h3><a href="?"><?php echo $row['kd_pengaduan']; ?></a></h3></td>
								<td><h3><a href="?"><?php echo $row['tgl_pengaduan']; ?></a></h3></td>
								<td><?php echo $row['jdl_pengaduan']; ?></td>
								<td><?php echo $row['keterangan']; ?></td>
								<td><?php echo $row['lokasi']; ?></td>
								<td><?php echo $row['status']; ?></td>							
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


<?php } else { ?>

<div class="box">
<div class="box-head" >
						<h2 class="left">Laporan Pengaduan</h2>						
					</div>
			  <form action="?aksi=cari" method="post">
				<div class="form">
						<p class="inline-field" >
						<label>Bulan<span>(wajib di isi)</span></label>						
						<select name="bulan" class="field size3">
						<option value="01" <?php if($_POST['bulan']=='01') {echo "selected";} ?>>Januari</option>
						<option value="02" <?php if($_POST['bulan']=='02') {echo "selected";} ?>>Februari</option>
						<option value="03" <?php if($_POST['bulan']=='03') {echo "selected";} ?>>Maret</option>
						<option value="04" <?php if($_POST['bulan']=='04') {echo "selected";} ?>>April</option>
						<option value="05" <?php if($_POST['bulan']=='05') {echo "selected";} ?>>Mei</option>
						<option value="06" <?php if($_POST['bulan']=='06') {echo "selected";} ?>>Juni</option>
						<option value="07" <?php if($_POST['bulan']=='07') {echo "selected";} ?>>Juli</option>
						<option value="08" <?php if($_POST['bulan']=='08') {echo "selected";} ?>>Agustus</option>
						<option value="09" <?php if($_POST['bulan']=='09') {echo "selected";} ?>>September</option>
						<option value="10" <?php if($_POST['bulan']=='10') {echo "selected";} ?>>Oktober</option>
						<option value="11" <?php if($_POST['bulan']=='11') {echo "selected";} ?>>November</option>
						<option value="12" <?php if($_POST['bulan']=='12') {echo "selected";} ?>>Desember</option>
					</select>
					
					
					<select name="tahun" class="field size2">
					
					<option value="2019" <?php if($_POST['tahun']=='2019') {echo "selected";} ?>>2019</option>
					<option value="2020" <?php if($_POST['tahun']=='2020') {echo "selected";} ?>>2020</option>
					<option value="2021" <?php if($_POST['tahun']=='2021') {echo "selected";} ?>>2021</option>
					<option value="2022" <?php if($_POST['tahun']=='2022') {echo "selected";} ?>>2022</option>
					<option value="2023" <?php if($_POST['tahun']=='2023') {echo "selected";} ?>>2023</option>
					<option value="2024" <?php if($_POST['tahun']=='2024') {echo "selected";} ?>>2024</option>
					</select>
					</p>
				<p class="inline-field" >
						<label>Pimpinan<span>(wajib di isi)</span></label>
						<input type="text" name="pimpinan" class="field size4">             
				</select>
				</p>
				<input type="submit" class="button" value="View">
				 </form>
               
 </div>            
          
		

					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Laporan Pengaduan</h2>						
					</div>
						<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>		<th width="13">No</th>
								<th>Kode</th>
								<th>Tanggal</th>
								<th>Judul Laporan</th>
								<th>Keterangan</th>
								<th>Lokasi</th>
								<th>Status</th>	
							</tr>
<?php 
    $thispage = $PHP_SELF ;
	$query = mysql_query("SELECT a.*,b.* FROM 
				pengaduan a, pelapor b where a.kd_pelapor=b.kd_pelapor order by a.kd_pengaduan DESC");
    $num = mysql_num_rows($query); // number of items in list
    $per_page = 10000; // Number of items to show per page
	$start = $_GET['start'];
    if(empty($start))$start=0;  // Current start position

    $max_pages = ceil($num / $per_page); // Number of pages
    $cur = ceil($start / $per_page)+1; // Current page number

$sql = mysql_query("SELECT a.*,b.* FROM 
				pengaduan a, pelapor b where a.kd_pelapor=b.kd_pelapor order by a.kd_pengaduan DESC  LIMIT $start,$per_page"); 
$i=$start+1;
while($row = mysql_fetch_array($sql)) {		
		if($i%2==1) { $klas=' class="odd"'; } else { $klas=''; }	
	?>							
							<tr<?php echo $klas;?>>
								<td><?php echo $i;?>.</td>
								<td><h3><a href="?"><?php echo $row['kd_pengaduan']; ?></a></h3></td>
								<td><h3><a href="?"><?php echo $row['tgl_pengaduan']; ?></a></h3></td>
								<td><?php echo $row['jdl_pengaduan']; ?></td>
								<td><?php echo $row['keterangan']; ?></td>
								<td><?php echo $row['lokasi']; ?></td>
								<td><?php echo $row['status']; ?></td>							
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

<?php } ?>
				
<?php
include "footer.php"; 
} else { 
	//SESSION KOSONG
	header("location: index.php");
} 
?>								