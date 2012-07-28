<?php
defined("_VALID_REQUEST") or die("Invalid Request");
$sql = "select * from tbl_pembayaran_ipl where invoice_no = '$_GET[id]'";
$res = mysql_query($sql);
$row = mysql_fetch_array($res);
?>
<style type="text/css">
	@import "js/jquery.datepick.css";
</style>
<script type="text/javascript" src="js/jquery-1.4.min.js"></script>
<script type="text/javascript" src="js/jquery.datepick.js"></script>
<script type="text/javascript" src="js/jquery.datepick-id.js"></script>
<script>
$(function() {
	$('#txtTgl').datepick({showOn: 'both',buttonImageOnly: true, buttonImage: 'images/calendar.gif',defaultDate: '-1w'});
        $('#txtJatuhTempo').datepick({showOn: 'both',buttonImageOnly: true, buttonImage: 'images/calendar.gif',defaultDate: '-1w'});
});
</script>
<script>
function checkForm(f) {
	if (trim(f.file.value) == '' && trim(f.txtKet.value) == '' ) {
		alert('Data Harus di isi.');
		f.txtKet.select();
	}
	else if (confirm("Simpan?")) {
		return true;
	}
	return false;
}
</script>
<div id="sectionHeader">Data Pembayaran IPL > Ubah</div>
<table border="0" cellpadding="1" cellspacing="0" id="b2">
	<thead>
	<tr>
		<td>&nbsp;</td>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td>
		<form name="frm" method="post" action="pembayaran_ipl/qedit.php" onSubmit="return checkForm(this)">
		<table border="0" cellpadding="2" cellspacing="0" width="100%">
			<tr>
                    <td>Invoice No* </td>
                    <td>:</td>
                    <td><input type="hidden" name="hId" id="hId" value="<?=$row['id']?>" />
                    	<input name="txtinvoice_no" type="text" id="txtinvoice_no" size="10" maxlength="150" value="<?=$row['invoice_no']?>"  readonly style="background-color:#eeeeee "></td>
            </tr>
            <tr>
                    <td>Tanggal Pembayaran </td>
                    <td>:</td>
                    <td><input name="txtTgl" type="text" id="txtTgl" size="10" value="<?=date('d-m-Y',strtotime($row['tanggal']))?>" readonly></td>
            </tr>
            <tr>
                    <td>Nama Warga</td>
                    <td>:</td>
                    <td><?=dropDown("tbl_warga","","id","id","nama","blok","no_rumah","txtWarga","$row[id_warga]","1")?>
                    </td>
            </tr>
            <!-- <tr>
                    <td>Golongan Tarif</td>
                    <td>:</td>
                    <td><?=dropDown("tbl_tarif","","tarif","id","tarif","tarif","tarif","selTarif","$row[id_tarif]","")?>
                    </td>
             </tr>-->
             <tr>
                    <td>Petugas Penagih</td>
                    <td>:</td>
                    <td><?=dropDown("tbl_penagih","","id","id","penagih","penagih","penagih","txtPenagih","$row[id_penagih]","")?>
                    </td>
            </tr>
             <tr>
                    <td>Bendahara</td>
                    <td>:</td>
                    <td><?=dropDown("tbl_bendahara","","id","id","bendahara","bendahara","bendahara","txtBendahara","$row[id_bendahara]","")?>
                    </td>
            </tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>
					<input type="submit" class="button" value="Simpan">
					<input type="button" class="button" value="Batal" onClick="location.href='?mod=pembayaran_ipl&cmd=index';">
				</td>
			</tr>
		</table>
		</form>
		</td>
	</tr>
	</tbody>
</table>
<div style="float:left">
 <table border="0" cellpadding="2" cellspacing="0" id="b2">
    <tr>
      <td>
      <form action="pembayaran_ipl/qinsert.php" method="post" id="frmAdd" name="frmAdd">
 		<table width="100%"  border="0" cellpadding="4" cellspacing="0" class="contentTable">
          <tr align="center">
            <td colspan="3"> Detail Pembayaran</td>
            </tr>
            <?
				$Bill = $row['invoice_no'];
				$s = "select * from tbl_bayar_detail where invoice_no = '$Bill'";
				$r = mysql_query($s);
				while($rw = mysql_fetch_array($r)){
					$deleteUrl = urldecode("pembayaran_ipl/qdelete.php?id=".$rw[0].'&rand=').md5($row['id'].$Config_secure_code);
					$setFree = urldecode("pembayaran_ipl/setfree.php?id=".$rw[0].'&rand=').md5($row['id'].$Config_secure_code);
					$cancelFree = urldecode("pembayaran_ipl/cancelfree.php?id=".$rw[0].'&rand=').md5($row['id'].$Config_secure_code);
			?>
            <td>Pembayaran Bulan</td>
            <td>:</td>
            <td><?=dropDownMonth("selBulan",$rw['bulan'],"disabled")?><?=dropDownTahun("selTahun","5",$rw['tahun'],"1","disabled")?></td>
            <td>
				<?php
					if($rw['free']=='1'){
						echo 'Free Payment';
					}
				?>
			</td>
			<td>
				<?php
					if($rw['free']=='1'){
						?>
							<a href="<?=$cancelFree?>">Cancel Free</a>&nbsp;
						<?	
					}else{
						?>
							<a href="<?=$setFree?>">Set As Free</a>&nbsp;
						<?	
					}	
				
				?>
				
				<a href="<?=$deleteUrl?>">Delete</a>
			</td>
            </tr>
            <? } ?>
        	<tr>
				<td>Pembayaran Bulan</td>
				<td>:</td>
				<td><?=dropDownMonth("selBulan","","","")?><?=dropDownTahun("selTahun","5","","1")?></td> <td><?=dropDownMonth("selBulan2","","","")?><?=dropDownTahun("selTahun2","5","","1")?></td>
            <td>
            	<input type="hidden" name="hBill" value="<?=$Bill?>" />   	
                <input class="submit" type="submit" value="Insert"/>
        	</td>
            </tr>
        </table></form></td>
    </tr>
</table>  
</div>
