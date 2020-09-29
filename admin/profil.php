<?php 
session_start();
if (ISSET($_SESSION['username'])) {
include "header.php";  
?>		
		<div style="border:30px solid #EEE; padding:30px; background:#FFF; font-size:12px; line-height:24px;">
		
<h1>PROFIL</h1>
				<br><p style="text-align: justify;">Dinas Perumahan Rakyat, Kawasan Permukiman dan Pertanahan mempunyai Tugas Pokok melaksanakan Urusan Perumahan Rakyat dan Kawasan Permukiman serta Urusan Pertanahan</p>
				<br><h1>Fungsi</h1>
				<p style="text-align: justify;">Untuk menyelenggaran Tugas Pokok tersebut diatas Dinas Perumahan Rakyat, Kawasan Permukiman dan Pertanahan Provinsi Sumatera Barat mempunyai fungsi  :</p>
				<p style="text-align: justify;">1. Perumusan kebijakan teknis bidang Perumahan Rakyat, Kawasan Permukiman dan Pertanahan;</p>
				<p style="text-align: justify;">2. Penyelenggaraan urusan pemerintahan dan pelayanan umum bidang Perumahan Rakyat, Kawasan Permukiman dan Pertanahan </p>
				<p style="text-align: justify;">3. Pembinaan dan fasilitasi bidang Perumahan Rakyat, Kawasan Permukiman dan Pertanahan, lingkup provinsi dan kabupaten/kota;</p>
				<p style="text-align: justify;">4. Pelaksanaan kesekretariatan dinas;</p>
				<p style="text-align: justify;">Dalam menyelenggarakan tugas dan fungsi tersebut, Kepala Dinas Perumahan Rakyat, Kawasan Permukiman dan Pertanahan dibantu oleh Sekretariat, 3 (tiga) Bidang, dengan masing-masing uraian tugas sebagai berikut :</p>
				<br><h1>Sekretariat</h1>
				<p style="text-align: justify;">Sekretariat mempunyai tugas pokok merencanakan, melaksanakan, mengkoordinasikan dan mengendalikan kegiatan administrasi umum, kepegawaian, perlengkapan, hubungan masyarakat, protokol, penyusunan. program dan keuangan. Dengan rincian sebagai berikut : </p>
				<p style="text-align: justify;">1. Penyiapan bahan koordinasi kegiatan di lingkungan Dinas;</p>
				<p style="text-align: justify;">2. Penyiapan bahan koordinasi dan penyusunan rencana program dan kegiatan di lingkungan Dinas;</p>
				<p style="text-align: justify;">3. Penyiapan bahan pembinaan dan pemberian dukungan administrasi yang meliputi ketatausahaan, kepegawaian, hukum, keuangan, kerumahtanggaan, aset, kerja sama, kehumasan, kearsipan dan Dokumentasi di lingkungan Dinas;</p>
				<p style="text-align: justify;">4. Penyiapan bahan koordinasi, pembinaan dan penataan organisasi dan tatalaksana di lingkungan Dinas;</p>
				<p style="text-align: justify;">5. Penyiapan bahan koordinasi pelaksanaan sistem pengendalian intern Pemerintah dan pengelolaan informasi;</p>
				<p style="text-align: justify;">6. Penyiapan bahan pengelolaan barang milik/kekayaan Daerah dan pelayanan pengadaan barang/jasa di lingkungan Dinas;</p>
				<p style="text-align: justify;">7. Penyiapan bahan evaluasi dan pelaporan di lingkungan Dinas; dan</p>
				<p style="text-align: justify;">8. Pelaksanaan tugas lain yang diberikan oleh Kepala Dinas sesuai dengan tugas dan fungsinya. </p>
			
				
				
			</div>
<?php
include "footer.php"; 
} else { 
	header("location: index.php");
} 
?>						