<?php
require_once '../config.inc.php';
require_once $config['lib_dir'].'/class.session.php';
include_once $config['lib_dir'].'/common.php';

$session->requireLogin('warga');

$sql = "INSERT INTO tbl_warga (nama,alamat,blok,no_rumah,telepon,hp,luas_tanah,id_tarif) VALUES (?,?,?,?,?,?,?,?)";
$rs = $oDb->Execute($sql, 
                                array(
                                        $_POST['txtNama'],
                                        $_POST['txtAlamat'],
                                        $_POST['txtBlok'],
                                        $_POST['txtNoRumah'],
                                        $_POST['txtTelepon'],
                                        $_POST['txtHp'],
                                        $_POST['txtLT'],
										$_POST['selTarif']
                                )
                        );

//log
$logger->logMsg($_SESSION[_SESSION_PREFIX.'user_name'], sprintf("User '%s' Menambah Data warga a/n '%s'.", $_SESSION[_SESSION_PREFIX.'user_name'],$_POST['txtNama']));
						
showSuccessJs('Data berhasil disimpan','../?mod=warga&cmd=index');
?>
