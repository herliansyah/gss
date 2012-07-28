<?php
defined("_VALID_REQUEST") or die("Invalid Request");
require_once $config['lib_dir'].'/class.paging.php';
require_once $config['lib_dir'].'/class.search.php';

$arrSearch = array(
	'FieldName' => array('invoice_no','nama','blok'),'FieldDesc' => array('No Invoice','Nama','Blok')
);

$search = new Search($arrSearch);
$searchSql = $search->GenerateSql(true);
/**************************
          PAGING
 **************************/
$sql = "SELECT COUNT(id) as CountRecord FROM tbl_pembayaran_ipl WHERE 1=1 $searchSql";
$rs = $oDb->execute($sql);
$numRec = $rs->fields['CountRecord'];
$pager = new Paging();

$curPage = $_SERVER['REQUEST_METHOD'] && isset($_GET[$pager->pageParam])? $_GET[$pager->pageParam] : 0;
$pager->init($numRec, $_SERVER['REQUEST_URI'], $curPage);
//*************************

$sql = "
	select * from tbl_pembayaran_ipl i inner join tbl_warga w on i.id_warga = w.id  
	WHERE 1=1 $searchSql 
	ORDER BY invoice_no";
$rs = $oDb->selectLimit($sql, $pager->getItemPerPage(), $pager->getCurrentOffset());

?>
<script type="text/javascript">
function doDelete(code) {
	//itemName = document.getElementById(code).innerHTML;
	q = "Hapus Data ?";
	if (confirm(q)) {
		location.href = "pembayaran_ipl/delete.php?id="+code;
	}
}
function doEdit(code) {
	location.href = "?mod=pembayaran_ipl&cmd=edit&id="+code;
}
function doPrint(){
			win = window.open('pembayaran_ipl/print.php','print','menubar=yes,toolbar=no,location=no,status=yes,resizable=yes,scrollbars=yes');
}
</script>

<div id="sectionHeader">Pembayaran IPL > Index</div>
<div id="sectionSearch"><?= $search->GenerateBar() ?></div><br/>
<div class="navi">
	<div style="float:left"><?=$pager->printPager();?></div>
	<div style="float:right"><b>Total Record:</b> <?=$numRec?></div>
	&nbsp;
</div>
<br>
		<form name="frm" method="post">
		<table border="0" cellpadding="2" cellspacing="0" id="b1">
			<thead>
			<tr>
				<td width="10">No.</td>
				<td width="100">Invoice No</td>
				<td width="100">Tgl</td>
				<td width="100">Nama Warga</td>
				<td width="100">Alamat</td>
                <td width="100">Blok</td>
                <td width="100">No Rumah</td>
                <td width="200">Bulan Bayar</td>
                <!--<td width="100">Gol Tarif</td>-->
                <td width="100">Penagih</td>
				<td width="100">Bendahara</td>
			  	<td>&nbsp;</td>
			</tr>
			</thead>
			<tbody>
			<?php
			if ($rs->recordCount()) {
				$idx = $pager->getCurrentOffset()+1;
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
						 	$sqli = "select * from tbl_bayar_detail where invoice_no = $inv";
							$rsi = mysql_query($sqli);
							while($rowi=mysql_fetch_array($rsi)){
								echo number_to_bulan($rowi['bulan']) . "-" . $rowi['tahun']."<br>";	
							}
						 ?>
                    </td>
                    <!--<td><?=getData("tarif", "tbl_tarif", "id",$rs->fields['id_tarif'])?></td>-->
                    <td><?=getData("penagih", "tbl_penagih", "id",$rs->fields['id_penagih'])?></td>
                    <td><?=getData("bendahara", "tbl_bendahara", "id",$rs->fields['id_bendahara'])?></td>
                    <td>
						<img alt="Edit" id="imgaction" src="<?=$config['img_url']?>/recaction/edit.png" onclick="doEdit('<?=$rs->fields['invoice_no']?>')">
						<?php if($user->data['user_name'] <> 'supervisor'){ ?>
						<img alt="Hapus" id="imgaction" src="<?=$config['img_url']?>/recaction/delete.png" onclick="doDelete('<?=$rs->fields['invoice_no']?>')">
						<? } ?>
					</td>
				</tr>
				<?php
					$rs->MoveNext();
					$idx++;
				}
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
			<br />
			<?php if($user->data['user_name'] <> 'supervisor'){ ?>
			<input type="button" name="btnAdd" value="Tambah" class="button" onClick="location.href='?mod=pembayaran_ipl&cmd=add'">&nbsp;
			<? } ?>
			<!--<input type="button" name="btnPrint" value="Print" class="button" onClick="doPrint()">-->
		</form>
<br />
<div class="navi">
	<div style="float:left"><?=$pager->printPager();?></div>
	&nbsp;
</div>
