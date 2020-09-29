<?php
session_start();
if (isset($_SESSION['username'])) {
	include "header.php";
	include "fungsi.php";
?>

	<?php if ($_GET['aksi'] == 'add2') { //PROSES 
	?>



	<?php } elseif ($_GET['aksi'] == 'edit2') { //UPDATE POSTING 
	?>
		<?php

		$kode		= trim($_POST['kode']);
		$var6		= trim($_POST['status']);



		$query = "UPDATE pengaduan SET  status='$var6'
									WHERE  kd_pengaduan='$kode'";
		if (mysql_query($query)) {
		?>
			<div class="msg msg-ok">
				<!-- Message OK -->
				<p><strong>Status Pengaduan Berhasil Disimpan!</strong></p>
			</div><!-- End Message OK -->
		<?php
		} else {
		?>
			<div class="msg msg-error">
				<!-- Message Error -->
				<p><strong>Status Pengaduan Gagal Disimpan!</strong></p>
			</div><!-- End Message Error -->
		<?php
		} //end proses add
		?>


	<?php } elseif ($_GET['aksi'] == 'del') { //DEL POSTING 
	?>



	<?php } //AKHIR PROSES 
	?>

	<?php if ($_GET['aksi'] == 'add') {
		$id		= trim($_GET['id']);
		$query	= mysql_query("SELECT a.*,b.* FROM 
				pengaduan a, pelapor b where a.kd_pelapor=b.kd_pelapor  and  a.kd_pengaduan='$id'");
		$data	= mysql_fetch_array($query);
	?>
		<form name="form" action="?aksi=edit2" method="post" enctype="multipart/form-data" onsubmit="return cek_kosong();">
			<!-- Box  -->
			<div class="box">
				<!-- Box Head -->
				<div class="box-head">
					<h2>Ubah Status Pengaduan</h2>
				</div>
				<!-- Form -->
				<div class="form">

					<table>

						<tr>



						<tr>
							<td colspan='6'>
								<p style="font-size:12px; line-height:24px; border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:20px;"> DATA PENGADUAN</p>


							</td>

						</tr>

						<tr>
							<td>
								<div class="loginform_row">
									<label>Kode </label>
									<input type="text" class="loginform_input" name="" value="<?php echo $data['kd_pengaduan'] ?>" disabled />
									<input type="hidden" class="loginform_input" name="kode" value="<?php echo $data['kd_pengaduan'] ?>" />
								</div>
							</td>
						</tr>


						<tr>
							<td>
								<div class="loginform_row">
									<label>Tanggal</label>
									<input type="text" class="loginform_input" name="" value="<?php echo $data['tgl_pengaduan'] ?>" disabled />
								</div>
							</td>

						</tr>


						<tr>
							<td>
								<div class="loginform_row">
									<label>Pengaduan</label>
									<input type="text" class="loginform_input" name="" value="<?php echo $data['jdl_pengaduan'] ?>" disabled />
								</div>
							</td>

						</tr>


						<tr>
							<td>
								<div class="loginform_row">
									<label>Keterangan</label>
									<input type="text" class="loginform_input" name="" value="<?php echo $data['keterangan'] ?>" disabled />
								</div>
							</td>

						</tr>

						<tr>
							<td>
								<div class="loginform_row">
									<label>Lokasi</label>
									<input type="text" class="loginform_input" name="" value="<?php echo $data['lokasi'] ?>" disabled />
								</div>
							</td>

						</tr>


						<tr>
							<td>
								<div class="loginform_row">
									<label>Foto</label>
									<img src="foto/<?php echo $data['foto'] ?>" width="200">
								</div>
							</td>
						</tr>






						<tr>
							<td>
								<div class="loginform_row" style="width:580px">
									<label>Status </label>
									<select class="loginform_input" name="status" required>
										<option value="Baru" <?php if ($data['status'] == 'Baru') {
																	echo "selected";
																} ?>>Baru</option>
										<option value="Dikonfirmasi" <?php if ($data['status'] == 'Dikonfirmasi') {
																			echo "selected";
																		} ?>>Dikonfirmasi</option>
										<option value="Proses" <?php if ($data['status'] == 'Proses') {
																	echo "selected";
																} ?>>Proses</option>
										<option value="Selesai" <?php if ($data['status'] == 'Selesai') {
																	echo "selected";
																} ?>>Selesai</option>
									</select>
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
	<?php } elseif ($_GET['aksi'] == 'edit') {  ?>

	<?php } else { //TAMPIL TABEL =========================================================================================== 
	?>
		<!-- Box -->

		<div class="scroll">
			<!-- Box Head -->
			<div class="box-head">
				<h2 class="left">Status Pengaduan</h2>
			</div>
			<div class="table">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<th width="13">No</th>
						<th>Kode</th>
						<th>Tanggal</th>
						<th>Judul Laporan</th>
						<th>Keterangan</th>
						<th>Lokasi</th>
						<th>Status</th>
						<!-- <th>Ubah</th> -->


					</tr>
					<?php
					$thispage = $PHP_SELF;
					$query = mysql_query("SELECT a.*,b.* FROM 
				pengaduan a, pelapor b where a.kd_pelapor=b.kd_pelapor order by a.kd_pengaduan DESC");
					$num = mysql_num_rows($query); // number of items in list
					$per_page = 10000; // Number of items to show per page
					$start = $_GET['start'];
					if (empty($start)) $start = 0;  // Current start position

					$max_pages = ceil($num / $per_page); // Number of pages
					$cur = ceil($start / $per_page) + 1; // Current page number

					$sql = mysql_query("SELECT a.*,b.* FROM 
				pengaduan a, pelapor b where a.kd_pelapor=b.kd_pelapor order by a.kd_pengaduan DESC  LIMIT $start,$per_page");
					$i = $start + 1;
					while ($row = mysql_fetch_array($sql)) {
						if ($i % 2 == 1) {
							$klas = ' class="odd"';
						} else {
							$klas = '';
						}
					?>
						<tr<?php echo $klas; ?>>
							<td><?php echo $i; ?>.</td>
							<td>
								<h3><a href="?"><?php echo $row['kd_pengaduan']; ?></a></h3>
							</td>
							<td>
								<h3><a href="?"><?php echo $row['tgl_pengaduan']; ?></a></h3>
							</td>
							<td><?php echo $row['jdl_pengaduan']; ?></td>
							<td><?php echo $row['keterangan']; ?></td>
							<td><?php echo $row['lokasi']; ?></td>
							<?php if ($row['status'] == 'Dipilih') { ?><td style="color:#009900"><?php echo $row['status']; ?></td>
							<?php } else if ($row['status'] == 'Disetujui') { ?><td style="color:#ff0000"><?php echo $row['status']; ?></td> <?php } else { ?>
								<td style="color:#ff9900"><?php echo $row['status']; ?></td> <?php }  ?>

							<!-- <td><a href="?aksi=add&id=<?php echo $row['kd_pengaduan']; ?>">Ubah</a></td> -->
							</td>

							</tr>
						<?php $i++;
					} ?>
				</table>


				<!-- Pagging -->
				<div class="pagging">
					<div class="left">Menampilkan <?php print($cur); ?> dari <?php print($max_pages); ?> ( <?php print($num); ?> data )</div>
					<div class="right">
						<?php
						if (($start - $per_page) >= 0) {
							$next = $start - $per_page;
						?>
							<a href="<?php print("$thispage" . ($next >= 0 ? ("?start=") . $next : "")); ?>">sebelumnya</a>
						<?php
						}
						?>

						<?php
						if ($start + $per_page < $num) {
						?>
							<a href="<?php print("$thispage?start=" . max(0, $start + $per_page)); ?>">berikutnya</a>
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
	<?php } //AKHIR =========================================================================================== 
	?>

<?php
	include "footer.php";
} else {
	//SESSION KOSONG
	header("location: index.php");
}
?>