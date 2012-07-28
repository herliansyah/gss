<?php
defined("_VALID_REQUEST") or die("Invalid Request");
require_once $config['lib_dir'].'/class.paging.php';
require_once $config['lib_dir'].'/class.search.php';

$arrSearch = array(
	'FieldName' => array('log_user','log_date'),'FieldDesc' => array('User Name','Tanggal(yyyy-mm-dd)')
);

$search = new Search($arrSearch);
$searchSql = $search->GenerateSql(true);
/**************************
          PAGING
 **************************/
$sql = "SELECT COUNT(log_id) as CountRecord FROM tlog WHERE 1=1 $searchSql";
$rs = $oDb->execute($sql);
$numRec = $rs->fields['CountRecord'];
$pager = new Paging();

$curPage = $_SERVER['REQUEST_METHOD'] && isset($_GET[$pager->pageParam])? $_GET[$pager->pageParam] : 0;
$pager->init($numRec, $_SERVER['REQUEST_URI'], $curPage);
//*************************

$tgl_fmt = $oDb->SQLDate('d M Y H:i:s','log_date');
$sql = "
	SELECT *,$tgl_fmt AS log_date_fmt
	FROM tlog  
	WHERE 1=1 $searchSql 
	ORDER BY log_id DESC
";
$rs = $oDb->selectLimit($sql, $pager->getItemPerPage(), $pager->getCurrentOffset());

?>
<script type="text/javascript">
function doCheck(checked,chk){
	if(typeof(chk.length) != 'undefined'){
		for(i=0;i<chk.length;i++){
			chk[i].checked = checked;
		}
	}
	else
		chk.checked = checked;
}
function isAllChecked(chk){
	if(typeof(chk.length) != 'undefined'){
		for(i=0;i<chk.length;i++){
			if(!chk[i].checked){
				return false;
			}
		}
	}
	else
		return chk.checked;

	return true;	
}
function isChecked(chk){
	if(typeof(chk.length) != 'undefined'){
		for(i=0;i<chk.length;i++){
			if(chk[i].checked){
				return true;
			}
		}
	}
	else
		return chk.checked;

	return false;	
}
function doCheck1(chkall,chk){
	chkall.checked = isAllChecked(chk);
}
function doCheckAll(chkall,chk){
	if(typeof(chk) != 'undefined')
		doCheck(chkall.checked,chk);
}
function doDelete() {
	if(!isChecked(document.frm['chkCheck[]'])){
		alert('Harap memilih sedikitnya 1 baris untuk dihapus');
	}
	else if (confirm("Hapus?")) {
		return true;
	}
	return false;
}
</script>
<div id="sectionHeader">Log Aplikasi > Index</div>
<div id="sectionSearch"><?= $search->GenerateBar() ?></div><br/>
<div class="navi">
	<div style="float:left"><?=$pager->printPager();?></div>
	<div style="float:right"><b>Total Record:</b> <?=$numRec?></div>
	&nbsp;
</div>
<br>
		<form name="frm" method="post" action="log/delete.php" onsubmit="return doDelete()">
		<table border="0" cellpadding="2" cellspacing="0" id="b1" width="100%">
			<thead>
			<tr>
				<td><input type="checkbox" name="chkCheckAll" style="border:none" onclick="doCheckAll(this,frm['chkCheck[]'])"></td>
				<td width="10">No.</td>
				<td width="100">User Name</td>
				<td width="100">Host</td>
				<td width="150">Tanggal</td>
				<td>Keterangan</td>
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
					<td><input type="checkbox" name="chkCheck[]" style="border:none" value="<?=$rs->fields['log_id']?>" onclick="doCheck1(frm.chkCheckAll,frm['chkCheck[]'])"></td>
					<td><?=$idx?>.</td>
					<td><?=$rs->fields['log_user']?></td>
					<td><?=$rs->fields['log_ip']?></td>
					<td><?=$rs->fields['log_date_fmt']?></td>
					<td><?=$rs->fields['log_desc']?></td>
				</tr>
				<?php
					$rs->MoveNext();
					$idx++;
				}
			}
			else {
				?>
				<tr>
					<td colspan="6" style="padding:10px; text-align:center">Tidak ada data</td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
			<br />
			<input type="submit" name="btnHapus" value="Hapus" class="button">&nbsp;
		</form>
<br />
<div class="navi">
	<div style="float:left"><?=$pager->printPager();?></div>
	&nbsp;
</div>
