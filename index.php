<?php 

require_once "config.inc.php";
require_once $config['lib_dir']."/common.php";

$session->requireLogin();

include_once $config['inc_dir'].'/header.php';
?>
<?php
	
	if(empty($_GET['mod'])||empty($_GET['cmd'])){
		//include_once "homeimg.php";
		include_once "home.php";
	}
	else{
		$mod = html_entity_decode($_GET['mod']) ;
		$cmd = html_entity_decode($_GET['cmd']);
		$exclude = ( $mod=="akses" && $cmd=="angsuran") || 
			   ( $mod=="akses" && $cmd=="angsurtunda") ||
			   ( $mod=="akses" && $cmd=="benda") ||
			   ( $mod=="akses" && $cmd=="beritaacara") ||
			   ( $mod=="akses" && $cmd=="bukubarang") ||
			   ( $mod=="akses" && $cmd=="lap") ||
			   ( $mod=="akses" && $cmd=="penagihan") ||
			   ( $mod=="akses" && $cmd=="pendaftaran") ||
			   ( $mod=="akses" && $cmd=="pendataan") ||
			   ( $mod=="akses" && $cmd=="penetapan") ||
			   ( $mod=="akses" && $cmd=="penundaan") ||
			   ( $mod=="akses" && $cmd=="rekap") ||
			   ( $mod=="grafik" && $cmd=="home");
			   
		if(!$exclude && $session->isAuthorized($mod)){
			$incfile = $mod . "/" . $cmd . ".php" ;
			if(file_exists($incfile)){
				define('_VALID_REQUEST',true);
				include_once $incfile ;
			}
			else{
				echo "Invalid module";
			}
		}
		else if($exclude){
			$incfile = $mod . "/" . $cmd . ".php" ;
			if(file_exists($incfile)){
				define('_VALID_REQUEST',true);
				include_once $incfile ;
			}
			else{
				echo "Invalid module";
			}

		}
		else{
			showSuccessJs("Anda tidak berwenang mengakses halaman ini","index.php");
		}
	}
?>
<?php
	include_once $config['inc_dir'].'/footer.php';
?>
<?php $oDb->Close();  ?>
