<?php
require_once '../config.inc.php';
require_once $config['lib_dir'].'/class.session.php';
include_once $config['lib_dir'].'/common.php';

$session->requireLogin('Item');

$sql = "INSERT INTO tbl_barang (kode,nama,type,type_sub,merk,harga,satuan_masuk,satuan_keluar,konversi) VALUES (?,?,?,?,?,?,?,?,?)";
$rs = $oDb->Execute($sql, 
                                array(
                                        $_POST['txtKode'],
                                        $_POST['txtNama'],
                                        $_POST['txtType'],
                                        $_POST['txtTypeS'],
                                        $_POST['txtMerk'],
                                        $_POST['txtHarga'],
                                        $_POST['txtSatuanMasuk'],
                                        $_POST['txtSatuanKeluar'],
                                        $_POST['txtKonversi']
                                )
                        );

showSuccessJs('Data berhasil disimpan','../?mod=item&cmd=index');
?>
