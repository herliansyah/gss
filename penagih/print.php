<?php
require_once '../config.inc.php';
require_once $config['lib_dir'].'/class.session.php';
$session->requireLogin('unitkerja');

$sql = "
	SELECT * 
	FROM tunit_kerja  	   
	ORDER BY nama_unit
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
  <body bgcolor="#FFFFFF" onload="ResizeWindow();self.focus();" style="margin:20">
  	<div id="sectionReportTitle" align="center"><b>Daftar Unit Kerja</b></div>
	<table border="0" width="100%" id="b3" cellspacing="0">
		<thead>
		<tr>
			<td>No.</td>
			<td>Nama Unit</td>
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
			<td><?= $rs->fields['nama_unit'] ?></td>
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