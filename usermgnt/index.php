<?php
defined("_VALID_REQUEST") or die("Invalid Request");
require_once $config['lib_dir'].'/class.paging.php';
require_once $config['lib_dir'].'/class.search.php';

$arrSearch = array(
	'FieldName' => array('tuser.user_name','tuser.nip'),'FieldDesc' => array('Username','NIP')
);

$search = new Search($arrSearch);
$searchSql = $search->GenerateSql(true);
/**************************
          PAGING
 **************************/
$sql = "SELECT COUNT(user_name) as CountRecord FROM tuser WHERE user_name <> '"._USER_DEFAULT_ID."' $searchSql";
$rs = $oDb->execute($sql);
$numRec = $rs->fields['CountRecord'];
$pager = new Paging();

$curPage = $_SERVER['REQUEST_METHOD'] && isset($_GET[$pager->pageParam])? $_GET[$pager->pageParam] : 0;
$pager->init($numRec, $_SERVER['REQUEST_URI'], $curPage);
//*************************

$sql = "
	SELECT tuser.user_name, tuser.full_name,tuser.nip, tuser.active, tuser.exclusive
	FROM tuser  
	WHERE user_name <> '"._USER_DEFAULT_ID."' $searchSql 
	ORDER BY full_name
";
$rs = $oDb->selectLimit($sql, $pager->getItemPerPage(), $pager->getCurrentOffset());

?>
<script type="text/javascript">
function doDelete(code) {
	itemName = document.getElementById(code).innerHTML;
	q = "Hapus: "+itemName+"?";
	if (confirm(q)) {
		location.href = "usermgnt/delete.php?code="+code;
	}
}
function doEdit(code) {
	location.href = "?mod=usermgnt&cmd=edit&id="+code;
}

function doResetPass(code) {
	location.href = "?mod=usermgnt&cmd=resetpass&id="+code;
}
function doPrint(){
			win = window.open('usermgnt/print.php','print','menubar=yes,toolbar=no,location=no,status=yes,resizable=yes,scrollbars=yes');
}
</script>

<div id="sectionHeader">Pengguna Aplikasi > Index</div>
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
				<td>Username</td>
				<td>Nama Lengkap</td>
				<td>NIP</td>
				<td>Administrator</td>
				<td>Aktif</td>
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
					<td><?=$rs->fields['user_name']?></td>
					<td><div id="<?=$rs->fields['user_name']?>"><?=$rs->fields['full_name']?></div></td>
					<td align="center"><?=$rs->fields['nip']?>&nbsp;</td>
					<td align="center"><?=$rs->fields['exclusive']?></td>
					<td align="center"><?=$rs->fields['active']?></td>				
					<td>
						<img alt="Reset password" id="imgaction" src="<?=$config['img_url']?>/recaction/password.gif" onclick="doResetPass('<?=$rs->fields['user_name']?>')">
						<img alt="Edit" id="imgaction" src="<?=$config['img_url']?>/recaction/edit.png" onclick="doEdit('<?=$rs->fields['user_name']?>')">
						<img alt="Hapus" id="imgaction" src="<?=$config['img_url']?>/recaction/delete.png" onclick="doDelete('<?=$rs->fields['user_name']?>')">
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
					<td colspan="7" style="padding:10px; text-align:center">Tidak ada user</td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
			<br />
			<input type="button" name="btnAdd" value="Tambah" class="button" onClick="location.href='?mod=usermgnt&cmd=add'">&nbsp;
			<input type="button" name="btnPrint" value="Print" class="button" onClick="doPrint()">
		</form>
<br />
<div class="navi">
	<div style="float:left"><?=$pager->printPager();?></div>
	&nbsp;
</div>
