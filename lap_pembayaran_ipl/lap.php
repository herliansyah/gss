<?php
require_once '../config.inc.php';

if($_POST[pilihan]=='cetak'){
    header('Content-type: application/ms-excel');   
    header('Content-Disposition: attachment; filename=LaporanPembayaran.xls');
}

$bulan1 = sprintf('%02d',$_POST['selBulan']);
$tahun1 = $_POST['selTahun'];
$periode1 =  $tahun1."-".$bulan1."-01";

$bulan2 = sprintf('%02d',$_POST['selBulan2']);
$tahun2 = $_POST['selTahun2'];
$periode2 = $tahun2."-".$bulan2."-31";

$blok = $_POST['selBlok'];

$periode = " AND (tanggal >= '$periode1' AND tanggal <= '$periode2' )";



$sql = "
	SELECT *
	FROM tbl_pembayaran_ipl  
	WHERE 1=1 $periode 
	ORDER BY invoice_no";

$rs = $oDb->execute($sql);

?>


<link href="<?=$config['base_url']?>/inc/style_report.css" rel="stylesheet" type="text/css">

<div id="sectionHeader">Laporan Pembayaran IPL</div>
<br>
		<form name="frm" method="post">
		<table border="0" cellpadding="2" cellspacing="0" id="b1">
			<thead>
			<tr style="background-color: #E2E2E2;">
				<td>No.</td>
				<td >Invoice No</td>
				<td >Tgl</td>
				<td >Nama Warga</td>
				<td >Alamat</td>
                <td >Blok</td>
                <td>No Rumah</td>
                <td >Bulan Bayar</td>
                <td >Gol Tarif</td>
                <td >Penagih</td>
				<td >Bendahara</td>
			</tr>
			</thead>
			<tbody>
			<?php
			if ($rs->recordCount()) {
				$idx = 1;
				$odd = true;
				while (!$rs->EOF) {
					$class = $odd ? 'odd_row' : 'even_row';
					$odd = !$odd;
				?>
				<tr class="<?=$class?>">
					<td><?=$idx?>.</td>
					<td><div id="<?=$rs->fields['id']?>"><?=$rs->fields['invoice_no']?></div></td>
                    <td><?=$rs->fields['tanggal']?></td>
					<td><?=getData("nama", "tbl_warga", "id",$rs->fields['id_warga'])?></td>
					<td><?=getData("alamat", "tbl_warga", "id",$rs->fields['id_warga'])?></td>
                    <td><?=getData("blok", "tbl_warga", "id",$rs->fields['id_warga'])?></td>
                    <td><?=getData("no_rumah", "tbl_warga", "id",$rs->fields['id_warga'])?></td>
                     <td><?
							$inv = $rs->fields['invoice_no'];
						 	$sqli = "select * from tbl_bayar_detail where free is null and invoice_no = $inv";
							$rsi = mysql_query($sqli);
							while($rowi=mysql_fetch_array($rsi)){
								echo number_to_bulan($rowi['bulan']) . "-" . $rowi['tahun']."|";	
							}
						 ?>
                    </td><td><?=getData("tarif", "tbl_tarif", "id",$rs->fields['id_tarif'])?></td>
                    <td><?=getData("penagih", "tbl_penagih", "id",$rs->fields['id_penagih'])?></td>
                    <td><?=getData("bendahara", "tbl_bendahara", "id",$rs->fields['id_bendahara'])?></td>
				</tr>
				<?php
					$rs->MoveNext();
					$idx++;
				}
						$sql2 = "
							SELECT 
								 sum(tarif) as jumlahall
							FROM 
								 tbl_pembayaran_ipl p 
								 left join 
								 tbl_warga w on p.id_warga = w.id 
								 left join 
								 tbl_tarif t on t.id = p.id_tarif 
								 left join 
								 tbl_bayar_detail b on p.invoice_no = b.invoice_no
							where   
								 free is null $periode    
							ORDER BY p.invoice_no
						";
						$rs2 = $oDb->execute($sql2);
					?>
				<tr>
					<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>Total : </td>
					<td height="20"><b><?=$rs2->fields['jumlahall']?></b></td>
				</tr>				
				<?
			}
			else {
				?>
				<tr>
					<td colspan="16" style="padding:10px; text-align:center">Tidak ada data</td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
		</form>
