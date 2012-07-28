<?php
defined("_VALID_REQUEST") or die("Invalid Request");
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
	if (trim(f.txtinvoice_no.value) == '') {
		alert('Masukkan invoice no ');
		f.txtinvoice_no.select();
	}
	else if (confirm("Simpan?")) {
		return true;
	}
	return false;
}

function JumUtang()
{
    document.getElementById('txtJumlahUtang').value = document.getElementById('txtTotalTagihan').value - document.getElementById('txtJumlahBayar').value;
}
</script>
<div id="sectionHeader">pembayaran_ipl > Tambah</div>
<div>
<table border="0" cellpadding="1" cellspacing="0" id="b2">
	<thead>
	<tr>
		<td>&nbsp;</td>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td>
		<form name="frm" method="post" action="pembayaran_ipl/qadd.php" onSubmit="return checkForm(this)">
		<table border="0" cellpadding="2" cellspacing="0" width="100%">
		<?php
            $blnthn = date('my');

            $sqlB = "select max(right(invoice_no,3))+1 as Bill from tbl_pembayaran_ipl where left(invoice_no,4)='$blnthn' ";

            $resB = mysql_query($sqlB);
            $rowB = mysql_fetch_array($resB);
            $Bill = $rowB['Bill'];

            if(strlen($Bill)==1){
                    $Bill = $blnthn."00".$Bill;	
            }elseif(strlen($Bill)==2){
                    $Bill = $blnthn."0".$Bill;	
            }elseif(strlen($Bill)==3){
                    $Bill = $blnthn.$Bill;	
            }

            if (trim($Bill)==''?$Bill="$blnthn"."000":$Bill=$Bill);
        ?>
			<tr>
                    <td>Invoice No* </td>
                    <td>:</td>
                    <td><input name="txtinvoice_no" type="text" id="txtinvoice_no" size="10" maxlength="150" value="<?=$Bill?>"  readonly style="background-color:#eeeeee "></td>
            </tr>
            <tr>
                    <td>Tanggal Pembayaran </td>
                    <td>:</td>
                    <td><input name="txtTgl" type="text" id="txtTgl" size="10" value="<?=date('d-m-Y')?>" readonly></td>
            </tr>
            <tr>
                    <td>Nama Warga</td>
                    <td>:</td>
                    <td><?=dropDown("tbl_warga","","id","id","nama","blok","no_rumah","txtWarga","","1")?>
                    </td>
            </tr>
             <!--<tr>
                    <td>Golongan Tarif</td>
                    <td>:</td>
                    <td><?=dropDown("tbl_tarif","","tarif","id","tarif","tarif","tarif","selTarif","","")?>
                    </td>
             </tr>-->
             <tr>
                    <td>Petugas Penagih</td>
                    <td>:</td>
                    <td><?=dropDown("tbl_penagih","","id","id","penagih","penagih","penagih","txtPenagih","","")?>
                    </td>
            </tr>
             <tr>
                    <td>Bendahara</td>
                    <td>:</td>
                    <td><?=dropDown("tbl_bendahara","","id","id","bendahara","bendahara","bendahara","txtBendahara","","")?>
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
</div>
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
				$s = "select * from tbl_bayar_detail where invoice_no = '$Bill' order by autono";
				$r = mysql_query($s);
				while($rw = mysql_fetch_array($r)){
					$deleteUrl = urldecode("pembayaran_ipl/qdelete.php?id=".$rw[0].'&rand=').md5($row['id'].$Config_secure_code);
			?>
            <td>Pembayaran Bulan</td>
            <td>:</td>
            <td><?=dropDownMonth("selBulan",$rw['bulan'],"disabled")?><?=dropDownTahun("selTahun","5",$rw['tahun'],"1","disabled")?></td>
            <td align="center"><a href="<?=$deleteUrl?>">Delete</a></td>
            </tr>
            <? } ?>
        	<tr>
                    <td>Pembayaran Bulan</td>
                    <td>:</td>
                    <td><?=dropDownMonth("selBulan","","","")?><?=dropDownTahun("selTahun","5","","1")?> - <?=dropDownMonth("selBulan2","","","")?><?=dropDownTahun("selTahun2","5","","1")?></td>
            <td>
            	<input type="hidden" name="hBill" value="<?=$Bill?>" />   	
                <input class="submit" type="submit" value="Insert"/>
        	</td>
            </tr>
        </table></form></td>
    </tr>
</table>  
</div>
<script>
	document.frm.txtinvoice_no.focus();
</script>