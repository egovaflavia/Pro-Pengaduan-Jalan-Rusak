	</div>
	</div>

	<div class="sidebar" id="sidebar">

		<?php if ($_SESSION['level'] == 'Admin') { ?>
			<h2>ENTRI DATA</h2>
			<ul>


				<li class="pensil"><a href="admin_petugas.php"><span>Entri Petugas</span></a></li>
				<li class="pensil"><a href="admin_status.php"><span>Dari Kabid </span></a></li>
				<li class="pensil"><a href="admin_ubah.php"><span>Dari Kadis</span></a></li>
				<li class="pensil"><a href="admin_tindakan.php"><span>Entri Data Tindakan</span></a></li>
			</ul>
		<?php } ?>

		<?php if ($_SESSION['level'] == 'Kabid') { ?>
			<h2>ENTRI DATA</h2>
			<ul>
				<li class="pensil"><a href="admin_pengaduan.php"><span>Pilih Pengaduan</span></a></li>
			</ul>
		<?php } ?>

		<?php if ($_SESSION['level'] == 'Kadis') { ?>
			<h2>ENTRI DATA</h2>
			<ul>
				<li class="pensil"><a href="admin_acc.php"><span>Setujui Pengaduan</span></a></li>
			</ul>
		<?php } ?>

		<h2>LAPORAN</h2>
		<ul>

			<li class="laporan"><a href="admin_lappengaduan.php"><span>Laporan Pengaduan</span></a></li>
			<li class="laporan"><a href="admin_lappelapor.php"><span>Laporan Pelapor</span></a></li>
			<li class="laporan"><a href="admin_setting.php"><span>Setting Password</span></a></li>
			<li class="laporan"><a href="logout.php"><span>Logout</span></a></li>

	</div>


	<div class="cl"></div>

	</div>

	<div id="footer">
		<div class="shell">
			<span class="left">&copy; 2020 - <?php echo $sitename; ?></span>
			<span class="right">

			</span>
		</div>
	</div>
	</div>
	<!-- End Footer -->

	</body>

	</html>