<?php
require_once '../config.inc.php';
include_once $config['lib_dir'].'/common.php';

$session->requireLogin('Item');

$sql = "UPDATE tbl_barang SET kode = ?,nama = ?,type = ?,type_sub = ?,merk = ?,harga = ? ,satuan_masuk = ? ,satuan_keluar = ? ,konversi = ? WHERE id = ?";
$rs = $oDb->execute($sql, array($_POST['txtKode'],
                                $_POST['txtNama'],
                                $_POST['txtType'],
                                $_POST['txtTypeS'],
                                $_POST['txtMerk'],
                                $_POST['txtHarga'],
                                $_POST['txtSatuanMasuk'],
                                $_POST['txtSatuanKeluar'],
                                $_POST['txtKonversi'],
                                $_POST['id']) );

showSuccessJs('Data berhasil disimpan','../?mod=item&cmd=index');
exit;
?>
