<?php
require_once '../config.inc.php';
include_once $config['lib_dir'].'/common.php';
include_once $config['lib_dir'].'/class.logger.php';

$session->requireLogin('warga');

$sql = "UPDATE tbl_warga SET nama = ?,alamat = ?,blok = ?,no_rumah = ?,telepon = ?,hp = ? ,luas_tanah = ? , id_tarif = ? WHERE id = ?";
$rs = $oDb->execute($sql, array($_POST['txtNama'],$_POST['txtAlamat'],$_POST['txtBlok'],$_POST['txtNoRumah'],$_POST['txtTelepon'],$_POST['txtHp'],$_POST['txtLT'],$_POST['selTarif'],$_POST['id']) );

//log
$logger->logMsg($_SESSION[_SESSION_PREFIX.'user_name'], sprintf("User '%s' Merubah Data warga a/n '%s'.", $_SESSION[_SESSION_PREFIX.'user_name'],$_POST['txtNama']));

showSuccessJs('Data berhasil disimpan','../?mod=warga&cmd=index');


exit;
?>
