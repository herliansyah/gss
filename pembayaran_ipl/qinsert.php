<?php
require_once '../config.inc.php';
require_once $config['lib_dir'].'/class.session.php';
include_once $config['lib_dir'].'/common.php';

function dateRange( $first, $last, $step = '+1 month', $format = 'd/m/Y' ) {

    $dates = array();
    $current = strtotime( $first );
    $last = strtotime( $last );

    while( $current <= $last ) {

        $dates[] = date( $format, $current );
        $current = strtotime( $step, $current );
    }

    return $dates;
}

$data = dateRange( "$_POST[selTahun]/$_POST[selBulan]/26", "$_POST[selTahun2]/$_POST[selBulan2]/26") ;
foreach($data as $key){
	$tahun = substr($key, 6,4);
	$bulan = substr($key, 3,2);

	//cek bulan telah di pakai apa blm
	$sqlc = "select count(*) as jum from tbl_bayar_detail where invoice_no  = '$_POST[hBill]' and bulan = '$bulan' and tahun = '$tahun'";
	$resc = mysql_query($sqlc);
	$rowc = mysql_fetch_array($resc);
	$jumc = $rowc['jum'];

	if($jumc == 0){

		$query = sprintf("
				INSERT INTO tbl_bayar_detail (
						invoice_no,
						bulan,
						tahun
					) VALUES (
							'%s',%d,%d
					)",
						$_POST['hBill'],
						$bulan,
						$tahun
				);

				
		$res = mysql_query($query) or die("$query");

	}
}	
	//log
	$logger->logMsg($_SESSION[_SESSION_PREFIX.'user_name'], sprintf("User '%s' Menambah Data Detail Pembayaran dengan No Invoice '%s' untuk Bulan '%s' Tahun '%s'.", $_SESSION[_SESSION_PREFIX.'user_name'],$_POST['hBill'],$_POST['selBulan'],$_POST['selTahun']));
	//@mssql_close($conn);
	
	//showSuccessJs("Sukses di eksekusi.", '../?mod=pembayaran_ipl&cmd=edit&id='.$_POST['hBill']);
	
	?>
	<script language="javascript">
	history.back();
	</script>
