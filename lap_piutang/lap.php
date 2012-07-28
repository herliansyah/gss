<?php
require_once '../config.inc.php';

if($_POST[pilihan]=='cetak'){
    header('Content-type: application/ms-excel');   
    header('Content-Disposition: attachment; filename=LaporanPiutang.xls');
}
$bulan = $_POST['selBulan'];
$tahun = $_POST['selTahun'];


$sql = "
	SELECT 
		 *
	FROM 
		tbl_warga    
	ORDER BY id
";
$rs = $oDb->execute($sql);


?>
<link href="<?=$config['base_url']?>/inc/style_report.css" rel="stylesheet" type="text/css">
  	<div id="sectionReportTitle" align="center"><b>Laporan Piutang Perusahaan Tahun <?=$tahun?> sampai dengan Bulan <?=number_to_bulan($bulan)?></b></div>
	<table border="0" width="100%" id="b3" cellspacing="0">
		<thead>
		<tr style="background-color: #E2E2E2;">
			<td>No.</td>
            <td >Nama Warga</td>
            <td >Alamat</td>
            <td >Blok</td>
            <td >No Rumah</td>
            <td >Gol Tarif</td>
            <td >Bulan Sudah Bayar</td>
            <td >Total Piutang</td>
		</tr>
		</thead>
		<tbody>
			<?php
			if ($rs->recordCount()) {
				$idx = 1;
				$odd = true;
				//$jumlah = 0;
				while (!$rs->EOF) {
					$class = $odd ? 'odd_row' : 'even_row';
					$odd = !$odd;
					$idwarga = $rs->fields['id'];
					$tarif = getData("tarif", "tbl_tarif", "id",$rs->fields['id_tarif']);
					
			?>			
		<tr class="<?=$class?>">
			<td><?= $idx ?>.</td>
			<td><div id="<?=$rs->fields['id']?>"><?=$rs->fields['nama']?></div></td>
            <td><?= $rs->fields['alamat'] ?></td>
            <td><?= $rs->fields['blok'] ?></td>
            <td><?= $rs->fields['no_rumah'] ?></td>
            <td><?= $tarif ?></td>
            <td><?
				$sqlb = "SELECT bulan
						FROM tbl_pembayaran_ipl p
						JOIN tbl_bayar_detail l ON p.invoice_no = l.invoice_no
						WHERE l.tahun = '$tahun' AND bulan > '$bulan' and id_warga = '$idwarga' ";
				
				$resb = mysql_query($sqlb);	
				
				$jum = mysql_num_rows($resb);
				while($rowb = mysql_fetch_array($resb)){
					echo number_to_bulan($rowb['bulan']);
					echo "<br>";
				}
			?></td>
            <td>
            	<?
                $total = $tarif * $jum;
				echo uang($total);	
				
				$total_semua = $total_semua + $total;
				?>
            </td>
		</tr>
			<?php
					$rs->MoveNext();
					$idx = $idx +1;
	
						
				}
		?>
        <tr>
        	<td></td><td></td><td></td><td></td><td></td><td></td><td><b>Total</b></td>
			<td><b><?=uang($total_semua)?></b></td>
		</tr>	
        <?
			}
			else{
			?>
		<tr>
			<td colspan="2" height="20" align="center">Tidak ada data</td>
		</tr>
		
			<?
			}	
			?>
		</tbody>	
  </table>
  <div align="right">Dicetak oleh <?= $session->userName ?>, <?= date("j M Y H:i") ?></div>