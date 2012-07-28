<?php
require_once '../config.inc.php';
require_once $config['lib_dir'].'/class.session.php';
//$session->requireLogin('Penjualan');

$sql = "
	SELECT * 
	FROM tbl_pembayaran_ipl  	   
	ORDER BY invoice_no
";
$rs = $oDb->execute($sql);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title><?=$config['site_title']?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
	<meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="cache-control" content="no-cache" />
	<link href="<?=$config['base_url']?>/inc/style.css" rel="stylesheet" type="text/css">
	<script language="JavaScript">
		function ResizeWindow(){
    		window.moveTo(0,0);
        	if (document.all) {
        		window.resizeTo(screen.availWidth,screen.availHeight);
        	}
        	else if (document.layers||document.getElementById) {
        		if (window.outerHeight<screen.availHeight||window.outerWidth<screen.availWidth){
        			window.outerHeight = screen.availHeight;
        			window.outerWidth = screen.availWidth;
        		}
        	}
		}
	</script>
  </head>	
  <body bgcolor="#FFFFFF" onLoad="ResizeWindow();self.focus();" style="margin:20">
  	<div id="sectionReportTitle" align="center"><b>Daftar Pembayaran IPL</b></div>
	<table border="0" width="100%" id="b3" cellspacing="0">
		<thead>
		<tr>
			<td width="10">No.</td>
            <td width="100">Invoice No</td>
            <td width="100">Tgl</td>
            <td width="100">Nama Warga</td>
            <td width="100">Alamat</td>
            <td width="100">Blok</td>
            <td width="100">No Rumah</td>
            <td width="100">Bulan Bayar</td>
            <td width="100">Gol Tarif</td>
            <td width="100">Penagih</td>
            <td width="100">Bendahara</td>
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
			<td><?= $idx ?>.</td>
			<td><div id="<?=$rs->fields['id']?>"><?=$rs->fields['invoice_no']?></div></td>
            <td><?=$rs->fields['tanggal']?></td>
            <td><?=getData("nama", "tbl_warga", "id",$rs->fields['id_warga'])?></td>
            <td><?=getData("alamat", "tbl_warga", "id",$rs->fields['id_warga'])?></td>
            <td><?=getData("blok", "tbl_warga", "id",$rs->fields['id_warga'])?></td>
            <td><?=getData("no_rumah", "tbl_warga", "id",$rs->fields['id_warga'])?></td>
            <td><?=$rs->fields['bulan']?> - <?=$rs->fields['tahun']?></td>
            <td><?=getData("tarif", "tbl_tarif", "id",$rs->fields['id_tarif'])?></td>
            <td><?=getData("penagih", "tbl_penagih", "id",$rs->fields['id_penagih'])?></td>
            <td><?=getData("bendahara", "tbl_bendahara", "id",$rs->fields['id_bendahara'])?></td>
		</tr>
			<?php
					$rs->MoveNext();
					$idx = $idx +1;		
				}
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
  </body>
</html> 