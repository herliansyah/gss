<?php 
	require_once "../config.inc.php"; 
	require_once $config['lib_dir'] . "/common.php"; 
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$config['site_title']?></title>
<link href="<?=$config['base_url']?>/inc/style.css" rel="stylesheet" type="text/css">
<script src="<?=$config['base_url']?>/inc/common.js"></script>
<script>
function checkForm(f) {
	if (trim(f.txtMenuName.value) == '') {
		alert('Please fill Menu Name');
		f.txtMenuName.select();
	}
	else if (trim(f.txtURL.value) != '' && trim(f.txtMenuCode.value) == '') {
		alert('Please fill Menu Code if URL is not blank');
		f.txtMenuCode.select();
	}
	else if (trim(f.txtMenuCode.value) != '' && trim(f.txtURL.value) == '') {
		alert('Please fill URL if Menu Code is not blank');
		f.txtURL.select();
	}
	else if (confirm("Simpan?")) {
		return true;
	}
	return false;
}
</script>
<style type="text/css">
<!--
body {
	margin:0px;
}
-->
</style>
</head>
<body >
	<table width="100%" height="100%" cellspacing="0" cellpadding="0">
		<tr>
			<td valign="top" align="left" height="90%" style="padding:5px 15px 15px 15px">
				<?php 
					$pid = (empty($_GET['pid']) || !is_numeric($_GET['pid']))?0:$_GET['pid'];
					if($pid != 0){
						$sql = "SELECT menu_name FROM tmenu WHERE menu_id=?";
						$rs = $oDb->execute($sql,array($pid));
						if($rs->RecordCount()){
							$menu_name= $rs->fields['menu_name'];
						}else{
							showErrorJs("Invalid menu id");
						}					
					}
					
					$sql ="SELECT IFNULL(MAX(ordering),0)+1 AS max_order FROM tmenu WHERE parent_id = ?";
					$rs = $oDb->execute($sql,array($pid));
					$max_order = $rs->fields['max_order'];				
				?>
                <div id="sectionHeader">Menu Generator > Add<?= $pid != 0 ?" Sub":"" ?></div>
                <table border="0" cellpadding="1" cellspacing="0" id="b2">
                	<thead>
                	<tr>
                		<td>&nbsp;</td>
                	</tr>
                	</thead>
                	<tbody>
                	<tr>
                		<td>
                    		<form name="frm" method="post" action="qadd.php" onSubmit="return checkForm(this)">
							<input type="hidden" name="hParentId" value="<?=$pid?>">
							<input type="hidden" name="hMaxOrder" value="<?=$max_order?>">
                    		<table border="0" cellpadding="2" cellspacing="0" width="100%">
                    			<?php if($pid != 0){ ?>
								<tr>
                    				<td >Menu Parent </td>
                    				<td>:</td>
                    				<td><input name="txtMenuParent" class="disabled" type="text" size="50" maxlength="50" value="<?=$menu_name?>"></td>
                    			</tr>
								<?php } ?>
								<tr>
                    				<td width="100">Menu Name* </td>
                    				<td>:</td>
                    				<td><input name="txtMenuName" type="text" size="50" maxlength="50"></td>
                    			</tr>
								<tr>
                    				<td >Menu Code </td>
                    				<td>:</td>
                    				<td><input name="txtMenuCode" type="text" size="50" maxlength="50"></td>
                    			</tr>
								<tr>
                    				<td >Menu Order* </td>
                    				<td>:</td>
                    				<td>
										<select name="selOrder">
										<?php printMenuOrder($max_order,$max_order); ?>	
										</select>
									</td>
                    			</tr>
								<tr>
                    				<td width="100">URL </td>
                    				<td>:</td>
                    				<td><input name="txtURL" type="text" size="50" maxlength="50"></td>
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
                    					<input type="submit" class="button" value="Submit">
                    					<input type="button" class="button" value="Cancel" onClick="location='index.php';">
                    				</td>
                    			</tr>
                    		</table>
                    		</form>
                    	</td>
                    </tr>
                    </tbody>
                </table>
			</td>
		</tr>td>
		</tr>
	</table>
	<script>
		document.frm.txtMenuName.focus();
	</script>			
</body>
</html>
<?php
function printMenuOrder($selected,$max){
	for($i=1;$i<=$max;$i++){
		$sel ="";
		if($i==$selected)$sel="selected";
		echo sprintf("<option value=\"%s\" %s>%s</option>\n",$i,$sel,$i);
	}
}
?>