<?php
defined("_VALID_REQUEST") or die("Invalid Request");
require_once $config['lib_dir'].'/class.paging.php';
require_once $config['lib_dir'].'/class.search.php';

$arrSearch = array(
	'FieldName' => array('nama'),'FieldDesc' => array('Nama')
);

$search = new Search($arrSearch);
$searchSql = $search->GenerateSql(true);
/**************************
          PAGING
 **************************/
$sql = "SELECT COUNT(id) as CountRecord FROM tbl_barang WHERE 1=1 $searchSql";
$rs = $oDb->execute($sql);
$numRec = $rs->fields['CountRecord'];
$pager = new Paging();

$curPage = $_SERVER['REQUEST_METHOD'] && isset($_GET[$pager->pageParam])? $_GET[$pager->pageParam] : 0;
$pager->init($numRec, $_SERVER['REQUEST_URI'], $curPage);
//*************************

$sql = "
	SELECT *
	FROM tbl_barang  
	WHERE 1=1 $searchSql 
	ORDER BY nama";
$rs = $oDb->selectLimit($sql, $pager->getItemPerPage(), $pager->getCurrentOffset());

?>
<script type="text/javascript">
function doDelete(code) {
	itemName = document.getElementById(code).innerHTML;
	q = "Hapus Data ?";
	if (confirm(q)) {
		location.href = "item/delete.php?id="+code;
	}
}
function doEdit(code) {
	location.href = "?mod=item&cmd=edit&id="+code;
}
function doPrint(){
			win = window.open('item/print.php','print','menubar=yes,toolbar=no,location=no,status=yes,resizable=yes,scrollbars=yes');
}
</script>

<div id="sectionHeader">Item > Index</div>
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
				<td width="100">Kode Barang</td>
				<td width="200">Nama Barang</td>
				<td width="100">Type Real</td>
                                <td width="100">Type Sub.</td>
				<td width="100">Merk</td>
				<td width="100">Harga</td>
                                <td width="100">Satuan Masuk</td>
                                <td width="150">Satuan Keluar</td>
                                <td width="50">Konversi</td>
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
					<td><div id="<?=$rs->fields['id']?>"><?=$rs->fields['kode']?></div></td>
					<td><?=$rs->fields['nama']?></td>
					<td><?=$rs->fields['type']?></td>
                                        <td><?=$rs->fields['type_sub']?></td>
					<td><?=$rs->fields['merk']?></td>
					<td><?=$rs->fields['harga']?></td>
                                        <td><?=$rs->fields['satuan_masuk']?></td>
                                        <td><?=$rs->fields['satuan_keluar']?></td>
                                        <td><?=$rs->fields['konversi']?></td>
                                        <td>
						<img alt="Edit" id="imgaction" src="<?=$config['img_url']?>/recaction/edit.png" onclick="doEdit('<?=$rs->fields['id']?>')">
						<img alt="Hapus" id="imgaction" src="<?=$config['img_url']?>/recaction/delete.png" onclick="doDelete('<?=$rs->fields['id']?>')">
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
					<td colspan="3" style="padding:10px; text-align:center">Tidak ada data</td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
			<br />
			<input type="button" name="btnAdd" value="Tambah" class="button" onClick="location.href='?mod=item&cmd=add'">&nbsp;
			<input type="button" name="btnPrint" value="Print" class="button" onClick="doPrint()">
		</form>
<br />
<div class="navi">
	<div style="float:left"><?=$pager->printPager();?></div>
	&nbsp;
</div>
