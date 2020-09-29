<?php
include "./config/koneksi.php";

include "header.php";
?>

<div class="box">
	<h1>Riwayat Pengaduan</h1>
	<table border="0" cellpadding=0;>
		<?php
		$thispage = $PHP_SELF;
		$query = mysql_query("SELECT a.*,b.* FROM pengaduan a left join tindakan b on (a.kd_pengaduan=b.kd_pengaduan) where a.kd_pelapor='" . $_SESSION['userid'] . "'");
		$num = mysql_num_rows($query); // number of items in list
		$per_page = 7; // Number of items to show per page
		$start = $_GET['start'];
		if (empty($start)) $start = 0;  // Current start position

		$max_pages = ceil($num / $per_page); // Number of pages
		$cur = ceil($start / $per_page) + 1; // Current page number

		$no = 0;
		$hasil = mysql_query("SELECT a.*,b.*,a.keterangan as ket1, a.kd_pengaduan as kode1, b.keterangan as ket2 FROM pengaduan a left join tindakan b on (a.kd_pengaduan=b.kd_pengaduan) where a.kd_pelapor='" . $_SESSION['userid'] . "' order by a.kd_pengaduan DESC LIMIT $start,$per_page");
		while ($data = mysql_fetch_assoc($hasil)) {
			$no++; ?>
			<tr>
				<td rowspan="4"><img src="admin/foto/<?php echo $data['foto']; ?>" width="190" height="150" style="padding-right:24px;"></td>
				<td><a href="detail.php?id=<?php echo $data['kode1']; ?>" style="text-decoration:none; font-size:16px;"><?php echo $data['jdl_pengaduan']; ?></a></td>
			</tr>
			<tr>
				<td><strong>Tanggal : </strong><?php echo date('d-m-Y', strtotime($data['tgl_pengaduan'])); ?></td>
			</tr>
			<tr>
				<td><strong>Keterangan : </strong><?php echo substr($data['ket1'], 0, 170); ?> ....<div class="clear"></div>
				</td>
			</tr>
			<tr>
				<td><strong>Status : </strong><?php echo substr($data['status'], 0, 170); ?> <div class="clear"></div>
				</td>
			</tr>
			<tr>
				<td><strong>Tindakan : </strong><?php echo substr($data['ket2'], 0, 170); ?> <div class="clear"></div>
				</td>
			</tr>

		<?php } ?>
	</table>



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



</div>
</div>


<?php
include "footer.php";
?>