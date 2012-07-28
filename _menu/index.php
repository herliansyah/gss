<?php require_once "../config.inc.php"; ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$config['site_title']?></title>
<link href="<?=$config['base_url']?>/inc/style.css" rel="stylesheet" type="text/css">
<script>
	function delmenu(id) {
		if (confirm("Are you sure want to delete this menu?")) {
			location ="delmenu.php?id=" + id; 
		}
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
				<div id="sectionHeader">Menu Generator > Index</div>
        		<form name="frm" method="post">
        		<table border="0" cellpadding="2" cellspacing="2">
					<tr><td colspan="3" align="right"><input type="button" value="  Add  " class="button" onClick="location='add.php';"></td></tr>
        			<tr class="button" style="cursor:default">
        				<td>Menu Name</td>
						<td>URL</td>
						<td align="center">Action</td>
        			</tr>
					<?php
						require_once $config['lib_dir']. "/class.menutree.php";
						
						$oMenu = new MenuTree(0,'','',0,1,-1);
						$oMenu->display();
					?>
				</table>
				</form>	
			</td>
		</tr>
	</table>
</body>
</html>