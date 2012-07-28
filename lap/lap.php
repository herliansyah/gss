<?php
require_once '../config.inc.php';

if($_POST[pilihan]=='cetak'){
    header('Content-type: application/ms-excel');   
    header('Content-Disposition: attachment; filename=LaporanPendapatan.xls');
}


$bulan1 = sprintf('%02d',$_POST['selBulan']);
$tahun1 = $_POST['selTahun'];
$periode1 = $tahun1.$bulan1;

$bulan2 = sprintf('%02d',$_POST['selBulan2']);
$tahun2 = $_POST['selTahun2'];
$periode2 = $tahun2.$bulan2;

$blok = $_POST['selBlok'];

$periode = " AND (concat(tahun,if(LENGTH(bulan)=1,concat('0',bulan),bulan)) >= $periode1 AND concat(tahun,if(LENGTH(bulan)=1,concat('0',bulan),bulan)) <= $periode2 )";

// if($bulan == "" ? $bulan = "" : $bulan = " and bulan = '$bulan'" );
// if($tahun == "" ? $tahun = "" : $tahun = " and tahun = '$tahun'" );



if($blok == "" ? $blok = "" : $blok = " and blok = '$blok'" );


$sql = "
	SELECT 
		 * , concat(tahun,if(LENGTH(bulan)=1,concat('0',bulan),bulan)) as thnbulan
	FROM 
		 tbl_pembayaran_ipl p 
		 left join 
		 tbl_warga w on p.id_warga = w.id 
		 left join 
		 tbl_tarif t on t.id = p.id_tarif 
		 left join 
		 tbl_bayar_detail b on p.invoice_no = b.invoice_no
	where   
		 free is null $periode $blok	   
	ORDER BY p.invoice_no
";
$rs = $oDb->execute($sql);

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
		 free is null $periode $blok	   
	ORDER BY p.invoice_no
";
$rs2 = $oDb->execute($sql2);

?>
<link href="<?=$config['base_url']?>/inc/style_report.css" rel="stylesheet" type="text/css">
  	<div id="sectionReportTitle" align="center"><b>Laporan Penerimaan IPL Periode (<?=number_to_bulan($_POST['selBulan'])?>-<?=$tahun1?> s/d <?=number_to_bulan($_POST['selBulan2'])?>-<?=$tahun2?> )</b></div>
	<table border="0" width="100%" id="b3" cellspacing="0">
		<thead>
		<tr style="background-color: #E2E2E2;">
			<td >No.</td>
            <td>Invoice No</td>
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
				//$jumlah = 0;
				while (!$rs->EOF) {
					$class = $odd ? 'odd_row' : 'even_row';
					$odd = !$odd;
					
			?>			
		<tr class="<?=$class?>">
			<td><?= $idx ?>.</td>
			<td><div id="<?=$rs->fields['id']?>"><?=$rs->fields['invoice_no']?></div></td>
            <td><?=$rs->fields['tanggal']?></td>
            <td><?=getData("nama", "tbl_warga", "id",$rs->fields['id_warga'])?></td>
            <td><?=getData("alamat", "tbl_warga", "id",$rs->fields['id_warga'])?></td>
            <td><?=getData("blok", "tbl_warga", "id",$rs->fields['id_warga'])?></td>
            <td><?=getData("no_rumah", "tbl_warga", "id",$rs->fields['id_warga'])?></td>
            <td><?=number_to_bulan($rs->fields['bulan']) . "-" . $rs->fields['tahun']?></td>
            <td><?=getData("tarif", "tbl_tarif", "id",$rs->fields['id_tarif'])?></td>
            <td><?=getData("penagih", "tbl_penagih", "id",$rs->fields['id_penagih'])?></td>
            <td><?=getData("bendahara", "tbl_bendahara", "id",$rs->fields['id_bendahara'])?></td>
		</tr>
			<?php
                    $totalz = getData("tarif", "tbl_tarif", "id",$rs->fields['id_tarif']) + $totalz;
					$rs->MoveNext();
					$idx = $idx +1;
                    
						
				}
		?>
        <tr>
        	<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>Total : </td>
			<td ><b><?=$totalz?></b></td>
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
