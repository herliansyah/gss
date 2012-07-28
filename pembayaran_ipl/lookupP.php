<link href="../inc/style.css" rel="StyleSheet" type="text/css">
<? 
require_once "../config.inc.php";
require_once $config['lib_dir']."/common.php";

//$session->requireLogin();
// for searching
$searchString = '';
if (!empty($_GET['q']) && $_GET['q'] != '') {
	$searchString .= "(".$_GET['f']. " like '%". $_GET['q'] . "%')";
}

$c = $_POST['selCari'];

if($c !=''?$cari=" AND (kode like '%$c%' OR nama like '%$c%')":$cari="");

$q ="SELECT *  FROM t_galery where 1=1 $cari ";

$res = mysql_query($q) or die (mysql_error());
//echo $q;
?>
<link href="<?=$Config_base_url?>/includes/css/epegawai.css" rel="stylesheet" type="text/css">
<script>
function checkDel() {
	var f=document.frmIndex;
	var ischecked = false;
	var chkList = f["chkList[]"];
	if (chkList != null) {
		if (chkList.length != null) {
			// length lebih dari 1 (array)
			for (i=0;i<chkList.length;i++) {
				if (chkList[i].checked) {
					ischecked = true;
					break;
				}
			}
		}
		else {
			ischecked = chkList.checked;
		}
		if (!ischecked) {
			alert("Tandai Data yang akan di Hapus.");
			return false;
		}
		else {
			return true;
		}
	}
	else {
		alert('Tidak ada Data untuk di Hapus.');
		return false;
	}
}

function confirmDel() {
	var f=document.frmIndex;
	if (checkDel() && confirm('Anda yakin akan menghapus Data ini ?')) {
		f.action = "index.php?show=script&script=master/Pemeriksaan/delete.php";
		f.submit();
	}
}

function checkAll(chkAll,chkList) {
	if (chkList != null) {
	 if (chkList.length == null) chkList.checked = chkAll.checked;
	 else for (i=0;i<chkList.length;i++) chkList[i].checked = chkAll.checked;
	}
}

function isCheckedAll(chkAll,chkList) {
	if (chkList.length == null) return chkList.checked;
	else {
		for (i=0;i<chkList.length;i++) {
			if (!chkList[i].checked) {
				return false;
				break;
			}
		}
		return true;
	}
}

function checkList(chkAll,chkList) {
	chkAll.checked = isCheckedAll(chkAll,chkList);
}

function isChecked(chkAll,chkList) {
	if (chkList != null) {
		if (chkList.length == null) return chkList.checked;
		else {
			for (i=0;i<chkList.length;i++) {
				if (chkList[i].checked) {
					return true;
					break;
				}
			}
			return false;
		}
	}
	else return false;
}

</script>
	<script>
	function setOpener(a,b) {
		opener.document.getElementById('txtKodeBarang').value=a;
		opener.document.getElementById('txtNamaBarang').value=b;
		self.close();
	}
</script>
<table border="0" cellpadding="2" cellspacing="0" class="borderedTable" width="100%">
  <form name="frmIndex" method="POST">
    <tr>
      <td><table cellpadding=2 cellspacing=0 border=0 width="100%" bgcolor="#ffffff" class="contentTable">
      	  <tr>
          	<form action="#" method="post">
                <td nowrap="nowrap"> CARI NO KODE :</td>
                <td> <input type="text" name="selCari" size="20" /></td>
                <td><input type="submit" value="Cari" /></td>
          	</form>
          </tr>	
          <tr style="background-color: #cccccc">
            <td style="font-weight: bold" align="center">Kode Barang</td>
            <td style="font-weight: bold" align="center">Nama Barang</td>
         </tr>
          <?
			if (mysql_num_rows($res)) {
				$odd = true;
				while ($row = mysql_fetch_array($res)) {
					$css = $odd ? 'oddrow' : 'evenrow';
					$odd = !$odd;
					
					$qty = $row["qty"] * $row["konversi"];
			?>
		  <tr align="center" bgcolor="<?=$bgcolor?>" class="bodytext">
                <td><?=$row["id"]?></td>
                <td><a href="javascript:setOpener('<?=$row["id"]?>','<?=$row['keterangan']?>')"><?=$row["keterangan"]?></a></td>
		</tr>
          <?
				}
			}
			else { ?>
          <tr>
            <td colspan="6" align=center style="font-weight: bold; color:#FF0000; padding: 20px">TIDAK ADA DATA</td>
          </tr>
          <?
			}
			?>
        </table></td>
    </tr>
  </form>
</table>
<? //$pager->printPager() ?>
