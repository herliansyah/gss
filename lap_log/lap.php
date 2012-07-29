<?php
require_once '../config.inc.php';

$bulan1 = sprintf('%02d',$_POST['selBulan']);
$tahun1 = $_POST['selTahun'];
$periode1 =  $tahun1."-".$bulan1."-01";

$bulan2 = sprintf('%02d',$_POST['selBulan2']);
$tahun2 = $_POST['selTahun2'];
$periode2 = $tahun2."-".$bulan2."-31";

$blok = $_POST['selBlok'];

$periode = " AND date(log_date) BETWEEN '$periode1' AND '$periode2'";



$sql = "
	SELECT *
	FROM tlog  
	WHERE log_user = '$_POST[selUser]' $periode 
	ORDER BY log_date DESC";

$rs = $oDb->execute($sql);

?>


<link href="<?=$config['base_url']?>/inc/style_report.css" rel="stylesheet" type="text/css">

<div id="sectionHeader">Laporan Log</div>
<br>
<form name="frm" method="post">
<table border="0" cellpadding="2" cellspacing="0" id="b1" style="width:800px">
	<thead>
	<tr style="background-color: #E2E2E2;">
		<td>No.</td>
		<td >Log Date</td>
		<td >Keterangan</td>
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
			<td><?=$rs->fields['log_date']?></td>
			<td><?=$rs->fields['log_desc']?></td>
          </tr>
		<?php
			$rs->MoveNext();
			$idx++;
		}
	}else {
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
