<?php 
session_start();
if (ISSET($_SESSION['username'])) {
$menu	="lap1";
include "fungsi.php"; 
include "config/koneksi.php";	
//SESSION OK
$entri	= $_SESSION['userid'];

$bulan=$_GET['bulan'];
$tahun=$_GET['tahun'];
$pimpinan=$_GET['pimpinan'];	
$tgl=date("d-m-Y");
?>		

<body   onLoad="javascript:window.print()" style="margin:10px auto; width:950px;">
			     <div style="width:950px; margin:0 auto; border:1px solid #ccc; padding:10px; text-align:center" >
                    		<img src="images/logo laporan.png" width="100%">
				<p style="text-align:center; margin-top:10px; padding-top:10px; font-size:18px;">Laporan Data Pelapor</p>

<?php if($bulan=="01"){ $bulan1="Januari";} ?>						
<?php if($bulan=="02"){ $bulan1="Februari";} ?>						
<?php if($bulan=="03"){ $bulan1="Maret";} ?>						
<?php if($bulan=="04"){ $bulan1="April";} ?>						
<?php if($bulan=="05"){ $bulan1="Mei";} ?>						
<?php if($bulan=="06"){ $bulan1="Juni";} ?>						
<?php if($bulan=="07"){ $bulan1="Juli";} ?>						
<?php if($bulan=="08"){ $bulan1="Agustus";} ?>						
<?php if($bulan=="09"){ $bulan1="September";} ?>						
<?php if($bulan=="10"){ $bulan1="Oktober";} ?>						
<?php if($bulan=="11"){ $bulan1="November";} ?>						
<?php if($bulan=="12"){ $bulan1="Desember";} ?>		
	
										
						
<h4 style="text-align:center; padding-bottom:0px; font-weight:normal;"> Bulan:<?PHP echo $bulan1;?><?php echo - $tahun;?></h4>
           

                                    
				      		<table width="100%" border="0" cellspacing="0" cellpadding="3" style="border:1px solid #000;">
							<tr style="background:#7cc623; color:#fff;">
								<th width="30" style="border-right:1px solid #000;" >No</th>
								<th style="border-right:1px solid #000;">Kode</th>
								<th style="border-right:1px solid #000;">Nama</th>
								<th style="border-right:1px solid #000;">Alamat</th>
								<th style="border-right:1px solid #000;">Telpon</th> 
								<th>Email</th>	
							</tr>
							
							
						
							
                            <?php 
							$sql = mysql_query("SELECT a.*,b.*,a.keterangan as ket1, a.kd_pengaduan as kode1, c.*, b.keterangan as ket2 
												FROM pengaduan a left join tindakan b on (a.kd_pengaduan=b.kd_pengaduan) 
												left join pelapor c on (a.kd_pelapor=c.kd_pelapor) where
												month(a.tgl_pengaduan)='$bulan' and  year(a.tgl_pengaduan)='$tahun' 
												ORDER BY a.kd_pengaduan DESC ");
							  $i=$start+1;							
                            while ($row1=mysql_fetch_array($sql)) {   
							
							?>
							
							<tr>
							<td  style="border-right:1px solid #000; border-top:1px solid #000; padding:3px; 5px;" align="center"> <?php echo $i;?>.</td>							
							<td  style="border-right:1px solid #000; border-top:1px solid #000;padding:3px;" align="center"><?php echo $row1['kd_pelapor'];?></td>	
							<td  style="border-right:1px solid #000; border-top:1px solid #000;padding:3px;"><?php echo $row1['nm_pelapor'];?></td>	
							<td  style="border-right:1px solid #000; border-top:1px solid #000;padding:3px;"><?php echo $row1['alamat'];?></td>	
							<td  style="border-right:1px solid #000; border-top:1px solid #000;padding:3px;"><?php echo $row1['tlp_pelapor'];?></td>	
							<td  style=" border-top:1px solid #000;padding:3px;"><?php echo $row1['email'];?></td>	
							</tr>
                            <?php $i++; } ?>							
							
                        </table>	
                         <table width="1000" border="0" cellspacing="0" cellpadding="0" style="margin-top:40px">
							<td style="padding-left:800px; padding-bottom:10px;">Padang, <?php echo date("d-m-Y")?></td>
                            <tr><td style="padding-left:800px; padding-bottom:50px;">Pimpinan.</td></tr>
							<tr><td style="padding-left:800px;"><?php echo $pimpinan;?></td></tr>
							<tr><td></td></tr>                            
                        </table>
                        </body>
						</div>
<?php }?>