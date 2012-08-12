<?php
require_once '../config.inc.php';
require_once $config['lib_dir'].'/class.session.php';
include_once $config['lib_dir'].'/common.php';

//$session->requireLogin('Penjualan');

$tgl = calToMysqlDate($_POST['txtTgl']);

$id_tarif = getData("id_tarif", "tbl_warga", "id",$_POST['txtWarga']);

$sql = "INSERT INTO tbl_pembayaran_ipl (
                                    invoice_no,
                                    tanggal,
                                    id_warga,
                                    id_penagih,
                                    id_bendahara,
                                    id_tarif
                                  ) VALUES (?,?,?,?,?,?)";
$rs = $oDb->Execute($sql, 
                                array(
                                    $_POST['txtinvoice_no'],
                                    $tgl,
                                    $_POST['txtWarga'],
									$_POST['txtPenagih'],
									$_POST['txtBendahara'],
									$id_tarif 
                                )
                        );
// hapus bulan pembayaran yang telah dibayar di invoice lain
$sqld = "SELECT d.*,h.id_warga  FROM tbl_bayar_detail d INNER JOIN tbl_pembayaran_ipl h ON d.invoice_no = h.invoice_no WHERE d.invoice_no = '$_POST[txtinvoice_no]' ";
$resd = mysql_query($sqld);
while($rowd = mysql_fetch_array($resd)){
    $sqld2 = "SELECT d.*,h.id_warga,count(*) as jum  FROM tbl_bayar_detail d INNER JOIN tbl_pembayaran_ipl h ON d.invoice_no = h.invoice_no WHERE d.invoice_no <> '$_POST[txtinvoice_no]' AND h.id_warga = '$rowd[id_warga]' AND d.bulan = '$rowd[bulan]' AND d.tahun = '$rowd[tahun]'";
    $resd2 = mysql_query($sqld2);
    $rowd2 = mysql_fetch_array($resd2);
    $jum  = $rowd2['jum'];

    if($jum > 0 ){

        $sqld3 = "delete from tbl_bayar_detail where invoice_no = '$_POST[txtinvoice_no]' AND bulan = '$rowd[bulan]' AND tahun = '$rowd[tahun]' ";
        $resd3 = mysql_query($sqld3);


    }

}

//log
$logger->logMsg($_SESSION[_SESSION_PREFIX.'user_name'], sprintf("User '%s' Menambah Data Pembayaran dengan No Invoice '%s'.", $_SESSION[_SESSION_PREFIX.'user_name'],$_POST['txtinvoice_no']));

showSuccessJs('Data berhasil disimpan','../?mod=pembayaran_ipl&cmd=index');
?>
