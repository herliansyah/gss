<?php
require_once $config['lib_dir'].'/class.menutree.php';
require_once $config['lib_dir'].'/class.user.php';

$user = new User($session->userName);
$loginAsName = sprintf('Selamat Datang <b>%s</b>',$user->data['full_name']);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title><?=$config['site_title']?></title>
	<script src="<?=$config['base_url']?>/inc/common.js"></script>
	<link href="<?=$config['base_url']?>/inc/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?=$config['base_url']?>/inc/ThemeOffice2003/themeTopMenu.css" type="text/css">
    <script language="JavaScript">
    	var cmThemeOffice2003Base = '<?=$config['base_url']?>/inc/ThemeOffice2003/';	
    	var siteBase = '<?=$config['base_url']?>/';
    </script>
    <script language="JavaScript" src="<?=$config['base_url']?>/inc/JSCookMenu.js" type="text/javascript"></script>
    <script language="JavaScript" src="<?=$config['base_url']?>/inc/ThemeOffice2003/themeTopMenu.js" type="text/javascript"></script>
	<?php include_once $config["inc_dir"]."/topmenu.php"; ?>
</head>
<body style="margin:0px; background-color:#ffffff">
	<table width="100%" height="100%" cellspacing="0" cellpadding="0">
	    <tr>
	        <td>				
				<table width="100%" class="header" cellpadding="0" cellspacing="0">
					<tr>
						<td align="left">
                         	<img src="img/header.png">
						</td>
                    </tr>
				</table>
			</td>
	    </tr>
		<tr>
			<td valign="top" class="menubar">
				<table width="100%">
					<tr>
						<td>
                			<div id="divTopMenu"></div>				
                			<script language="JavaScript" type="text/javascript">
                				cmDraw ('divTopMenu', myMenu, 'hbr', cmThemeOffice2003, 'ThemeOffice2003');
                			</script>			
						</td>
						<td align="right">
							<span>
                				<?=$loginAsName?>&nbsp;&nbsp;|&nbsp;&nbsp;
                				<a href="javascript:if(confirm('Apakah Anda yakin ingin logout?'))window.location='<?=$config['base_url']?>/logout.php'">Logout</a>							
							</span>
						</td>
					</tr>
				</table>
			</td>
		</tr>	
		<tr>
			<td valign="top" align="left" style="padding-left:20px;padding-top:20px;padding-right:20px;padding-bottom:20px" height="90%">
			
