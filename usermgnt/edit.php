<?php
defined("_VALID_REQUEST") or die("Invalid Request");
require_once 'config.inc.php';
require_once $config['lib_dir'].'/class.menutree.php';

$menu = new MenuTree(0, '', '',0, 1, -1);

/*load all the menu_id from this user */
$sql = "
	SELECT tmenu.menu_id 
	FROM tuser_menu INNER JOIN tmenu ON tuser_menu.menu_code = MD5(CONCAT(?,?,tmenu.menu_code))
	WHERE user_name = ?
";
$rs = $oDb->execute($sql, array(_VKEY, $_GET['id'], $_GET['id']) );
$hasMenu = $rs->recordCount();
if ($hasMenu){
	$arMenuId = array();
	while (!$rs->EOF) {
		array_push($arMenuId, $rs->fields['menu_id']);
		$rs->moveNext();
	}
}

$sql = "
	SELECT tuser.user_name, tuser.user_passwd, tuser.full_name, tuser.active,tuser.nip,tuser.bagian,tuser.jabatan,tuser.exclusive
	FROM tuser 
	WHERE user_name = ?
";
$rs = $oDb->execute($sql, array($_GET['id']));
$chkStatus = $rs->fields['active'] == 'Y' ? 'checked' : '';
$chkAdministrator = $rs->fields['exclusive'] == 'Y' ? 'checked' : '';
?>
<script>
function checkForm(f) {
	if (trim(f.txtFullName.value) == '') {
		alert('Masukkan nama lengkap Anda');
		f.txtFullName.select();
	}
	else if (confirm("Simpan?")) {
		return true;
	}
	return false;
}
function cekMenuAll(chkAll,chk){
	if (chkAll != null) {
	 	if (chkAll.length == null) chkAll.checked = chk.checked;
	 	else for (i=0;i<chkAll.length;i++) chkAll[i].checked = chk.checked;
	}
}
function isAdministrator(chkAll,chk){
	if(chk.checked){
		cekMenuAll(chkAll,chk);
	}
}
</script>
<div id="sectionHeader">Pengguna Aplikasi > Edit</div>
<table border="0" cellpadding="1" cellspacing="0" id="b2">
	<thead>
	<tr>
		<td>&nbsp;</td>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td>
			<form name="frm" method="post" action="usermgnt/qedit.php" onSubmit="return checkForm(this)">
				<input name="hUserName" type="hidden" id="hUserName" value="<?=$rs->fields['user_name']?>">
				<table border="0" cellpadding="2" cellspacing="0"  width="100%">
					<tr>
						<td width="150">Username* </td>
						<td>:</td>
						<td><?=$rs->fields['user_name']?></td>
					</tr>
					<tr>
						<td>Nama Lengkap* </td>
						<td>:</td>
						<td><input name="txtFullName" type="text" id="txtFullName" size="30" maxlength="50" value="<?=htmlspecialchars($rs->fields['full_name'])?>"></td>
					</tr>
        			<tr>
        				<td>NIP </td>
        				<td>:</td>
        				<td><input name="txtNip" type="text" id="txtNip" maxlength="20" size="30" value="<?=$rs->fields['nip']?>"></td>
        			</tr>
        			<tr>
        				<td>Bagian </td>
        				<td>:</td>
        				<td><input name="txtBagian" type="text" id="txtBagian" maxlength="50" size="30" value="<?=$rs->fields['bagian']?>"></td>
        			</tr>
        			<tr>
        				<td>Jabatan </td>
        				<td>:</td>
        				<td><input name="txtJabatan" type="text" id="txtJabatan" maxlength="50" size="30" value="<?=$rs->fields['jabatan']?>"></td>
        			</tr>
        			<tr>
        				<td>Administrator</td>
        				<td>:</td>
        				<td><input name="chkAdministrator" type="checkbox" id="chkAdministrator" value="1" <?=$chkAdministrator?> style="border:none" onClick="cekMenuAll(document.frm['chkMenu[]'],document.frm.chkAdministrator)" />
        				<label for="chkAdministrator">Ya</label></td>
        			</tr>
					<tr>
						<td>Aktif*</td>
						<td>:</td>
						<td><input name="chkActive" type="checkbox" id="chkActive" class="checkbox" value="1" <?=$chkStatus?> style="border:none">
							<label for="chkActive">Ya</label></td>
					</tr>
					<tr>
          				<td valign="top">Kontrol Akses Pengguna </td>
          				<td valign="top">:</td>
          				<td>
          					<table cellpadding="0" cellspacing="0" border="0">
          						<?=$menu->checkBoxTree()?>
         					</table>
						</td>
					</tr>
        			<tr>
        				<td>&nbsp;</td>
        				<td>&nbsp;</td>
        				<td>&nbsp;</td>
        			</tr>					
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>
							<input name="submit" type="submit" class="button" value="Simpan">
							<input name="button" type="button" class="button" onClick="location.href='?mod=usermgnt&cmd=index';" value="Batal">
						</td>
					</tr>
				</table>
			</form>
		</td>
	</tr>
	</tbody>
</table>
<script>
<?php
if ($hasMenu) {
	$menuListStr = implode(',', $arMenuId);
	?>
		function loadMenuid() {
			var f = document.frm;
			for (var i=0; i<f.elements.length; i++) {
				e = f.elements[i];
				if (e.name == 'chkMenu[]') {
					if (_foundToAr(e.value)) {
						e.checked = true;
					}
				}
			}
		}
		function _foundToAr(menuId) {
			var arMenuId = [<?=$menuListStr?>];
			for (var i=0; i<arMenuId.length; i++) {
				if (arMenuId[i] == menuId) {
					return true;
				}
			}
			return false;
		}
		loadMenuid();
	<?php
}
?>
	document.frm.txtFullName.select();
</script>
