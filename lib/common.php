<?php

function goUrlJs ($url) {
	echo "<script>";
	echo "location.href = '".$url."';";
	echo "</script><noscript><font color='#ff0000'><b>Please enable javascript in your browser to run this application properly!</b></font></noscript>";
}
function showErrorJs ($str) {
	$str = addslashes($str);
	echo "<script>";
	echo "alert('".$str."');";
	echo "history.back();";
	echo "</script>";
}
function showErrorJs2($str) {
	$str = addslashes($str);
	echo "<script>";
	echo "alert('".$str."');";
	echo "self.close();";
	echo "</script>";
}
function showSuccessJs ($str, $url) {
	$str = addslashes($str);
	echo "<script>";
	echo "alert('".$str."');";
	echo "location.href = '".$url."';";
	echo "</script>";
}

function calToMysqlDate($str) {
	if ($str != '') {
		// convert tanggal ke dalam mysql format
		//list ($tanggal, $bulan, $tahun) = split("/", $str);
                list ($tanggal, $bulan, $tahun) = split("-", $str);
		return $tahun.'-'.$bulan.'-'.$tanggal;
	}
}
function calToLongDate($str){
	global $arrBulan;
	if ($str != '') {
		// convert tanggal ke dalam mysql format
		list ($tanggal, $bulan, $tahun) = split("/", $str);
		return sprintf("%d %s %d",$tanggal,$arrBulan[intval($bulan)],$tahun);
	}
}
function calToUnixDate($str) {
	if ($str != '') {
		// convert tanggal ke dalam mysql format
		list ($tanggal, $bulan, $tahun) = split("/", $str);
		return mktime(0,0,0,intval($bulan),intval($tanggal),intval($tahun));
	}
}
function mysqlToCalDate($str) {
	if ($str != '' && $str != '0000-00-00') {
		// convert tanggal ke dalam mysql format
		list ($tahun, $bulan, $tanggal) = split("-", $str);
		return $tanggal.'/'.$bulan.'/'.$tahun;
	}
}
function mysqlToLongDate($str) {
	global $arrBulan;

	if ($str != '' && $str != '0000-00-00') {
		list ($tahun, $bulan, $tanggal) = split("-", $str);
		return sprintf("%d %s %d",$tanggal,$arrBulan[intval($bulan)],$tahun);
	}
}
function EOM($month,$year){
	$ret = 0;

	if($month==2){
			if((($year%4==0)&&($year%100 != 0) ) || ($year%400==0)) {
				$ret = 29;
			}else{
				$ret = 28;
			}
	}
	else if($month==1||$month==3||$month==5||$month==7||$month==8||$month==10||$month==12)
			$ret = 31;
	else
			$ret = 30;
	return $ret;
}
function validFileName($file) {
	return preg_match("/^[\w\d\-\.\/\\\\:\s]+$/i",$file) && !preg_match("/\.\./",$file);
}

function limitChar($num, $str) {
	if (strlen($str) < $num) return $str;
	$str = substr($str, 0, $num);
	$pos = strrpos($str, " ");
	if ($pos !== false) { // note: three equal signs
	   $str = substr($str, 0, $pos);
	}
	$str .= '...';
	return $str;
}

function checkHashUrl($arParamValue, $hash) {
	global $config;
	$glued = implode('',$arParamValue);
	return (md5($glued.$config['secret_key']) == $hash);
}
function printBulan($selected){
	global $arrBulan;
	for($i=1;$i<=12;$i++){
		$sel ="";
		if($selected==$i)$sel = "selected";
		echo sprintf("<option value=\"%s\" %s>%s</option>\n",$i,$sel,$arrBulan[$i]);
	}
}
function printTahun($selected){
	for($i=$selected-5;$i<=$selected+5;$i++){
		$sel ="";
		if($selected==$i)$sel = "selected";
		echo sprintf("<option value=\"%s\" %s>%s</option>\n",$i,$sel,$i);
	}
}
function getPajakUsaha($jenis){
	global $oDb;

	$sql ="SELECT pajak_usaha FROM tpajak_usaha WHERE kode_pajak=?";
	$rs = $oDb->execute($sql,array($jenis));
	if($rs->RecordCount())	
		return $rs->fields['pajak_usaha'];
	else
		return "";
}
function getPejabat($id){
	global $oDb;
	
	$sql = "SELECT * FROM tpejabat WHERE no_jabatan = ?";
	$rs = $oDb->execute($sql,array($id));
	if($rs->RecordCount()){
		return array(
						"jabatan" => $rs->fields['jabatan']
						,"nama" => $rs->fields['nama']
						,"nip" => $rs->fields['nip']
						,"keterangan" => $rs->fields['keterangan']
					);
	}
	else
		return array();
}
function getRekening($kode_rek){
	global $oDb;
	
	$sql = "SELECT * FROM trek WHERE kode_rek = ?";
	$rs = $oDb->execute($sql,array($kode_rek));
	if($rs->RecordCount()){
		return array(
						"no_rekening" => $rs->fields['no_rekening']
						,"keterangan" => $rs->fields['keterangan']
					);
	}
	else
		return array();
}
function getHiburan($jenis){
	global $oDb;
	
	$sql ="SELECT nama FROM ttarif_hiburan WHERE no_jenis=?";
	$rs = $oDb->execute($sql,array($jenis));
	if($rs->RecordCount())	
		return $rs->fields['nama'];
	else
		return "";
}
function getReklame($jenis){
	global $oDb;
	
	$sql ="SELECT nama FROM tjenis_reklame WHERE no_jenis=?";
	$rs = $oDb->execute($sql,array($jenis));
	if($rs->RecordCount())	
		return $rs->fields['nama'];
	else
		return "";
}
function getReklameRuangan($jenis){
	
	if($jenis=="1")	
		return "Dalam Ruangan";
	else
		return "Luar Ruangan";
}
function getReklameHarga($jenis,$ruangan){
	
	global $oDb;
	
	$sql = "SELECT * FROM tjenis_reklame WHERE no_jenis= ?";
	$rs = $oDb->execute($sql,array($jenis));
	if($rs->RecordCount()){
		return $rs->fields['harga'.$ruangan];
	}
	else
		return "0";
}
function printReklameLokasi($selected){
	global $oDb;
	
	$sql = "SELECT * FROM ttarif_reklame_lokasi ORDER BY autono";
	$rs = $oDb->execute($sql);
	while(!$rs->EOF)
	{
		$sel ="";
		if($selected==$rs->fields['autono'])$sel = "selected";
		$value = $rs->fields['autono'] . ";" . $rs->fields['nilai'];
		echo sprintf("<option value=\"%s\" %s>%s</option>\n",$value,$sel,$rs->fields['nama']);
		
		$rs->MoveNext();
	}
}
function getReklameLokasiNilai($no){
	global $oDb;
	
	$sql = "SELECT nilai FROM ttarif_reklame_lokasi WHERE autono = ?";
	$rs = $oDb->execute($sql,array($no));
	if($rs->RecordCount())
		return $rs->fields['nilai'];
	else
		return "0";	
}
function printReklameLuas($selected){
	global $oDb;
	
	$sql = "SELECT * FROM ttarif_reklame_luas ORDER BY autono";
	$rs = $oDb->execute($sql);
	while(!$rs->EOF)
	{
		$sel ="";
		if($selected==$rs->fields['autono'])$sel = "selected";
		$value = $rs->fields['autono'] . ";" . $rs->fields['nilai'];
		echo sprintf("<option value=\"%s\" %s>%s</option>\n",$value,$sel,$rs->fields['nama']);
		
		$rs->MoveNext();
	}
}
function getReklameLuasNilai($no){
	global $oDb;
	
	$sql = "SELECT nilai FROM ttarif_reklame_luas WHERE autono = ?";
	$rs = $oDb->execute($sql,array($no));
	if($rs->RecordCount())
		return $rs->fields['nilai'];
	else
		return "0";	
}
function printReklameSudut($selected){
	global $oDb;
	
	$sql = "SELECT * FROM ttarif_reklame_sudut ORDER BY autono";
	$rs = $oDb->execute($sql);
	while(!$rs->EOF)
	{
		$sel ="";
		if($selected==$rs->fields['autono'])$sel = "selected";
		$value = $rs->fields['autono'] . ";" . $rs->fields['nilai'];
		echo sprintf("<option value=\"%s\" %s>%s</option>\n",$value,$sel,$rs->fields['nama']);
		
		$rs->MoveNext();
	}
}
function getReklameSudutNilai($no){
	global $oDb;
	
	$sql = "SELECT nilai FROM ttarif_reklame_sudut WHERE autono = ?";
	$rs = $oDb->execute($sql,array($no));
	if($rs->RecordCount())
		return $rs->fields['nilai'];
	else
		return "0";	
}
function printGalian($selected){
	global $oDb;
	
	$sql = "SELECT * FROM ttarif_galian ORDER BY autono";
	$rs = $oDb->execute($sql);
	echo "<option value=\"-\">-</option>\n";
	while(!$rs->EOF)
	{
		$sel ="";
		if($selected==$rs->fields['autono'])$sel = "selected";
		$value = $rs->fields['autono'] .";" . $rs->fields['nilai'] . ";" . $rs->fields['tarif'];
		echo sprintf("<option value=\"%s\" %s>%s</option>\n",$value,$sel,$rs->fields['nama']);
		
		$rs->MoveNext();
	}
}
function getGalianNilai($no){
	global $oDb;
	
	$sql = "SELECT nilai FROM ttarif_galian WHERE autono = ?";
	$rs = $oDb->execute($sql,array($no));
	if($rs->RecordCount())
		return $rs->fields['nilai'];
	else
		return "0";	
}
function getGalian($no){
	global $oDb;
	
	$sql = "SELECT nama FROM ttarif_galian WHERE autono = ?";
	$rs = $oDb->execute($sql,array($no));
	if($rs->RecordCount())
		return $rs->fields['nama'];
	else
		return "";	
}
function printLokasiWalet($selected){
	global $oDb;
	
	$sql = "SELECT * FROM ttarif_walet ORDER BY autono";
	$rs = $oDb->execute($sql);
	echo "<option value=\"-\">-</option>\n";
	while(!$rs->EOF)
	{
		$sel ="";
		if($selected==$rs->fields['autono'])$sel = "selected";
		$value = $rs->fields['autono'] .";" . $rs->fields['tarif'];
		echo sprintf("<option value=\"%s\" %s>%s</option>\n",$value,$sel,$rs->fields['nama']);
		
		$rs->MoveNext();
	}
}
function getWaletLokasiNilai($no){
	global $oDb;
	
	$sql = "SELECT tarif FROM ttarif_walet WHERE autono = ?";
	$rs = $oDb->execute($sql,array($no));
	if($rs->RecordCount())
		return $rs->fields['tarif'];
	else
		return "0";	
}
function getWaletLokasi($no){
	global $oDb;
	
	$sql = "SELECT nama FROM ttarif_walet WHERE autono = ?";
	$rs = $oDb->execute($sql,array($no));
	if($rs->RecordCount())
		return $rs->fields['nama'];
	else
		return "";	
}
function printJenisWalet($selected){
	global $oDb;
	
	$sql = "SELECT * FROM tjenis_sarang_burung ORDER BY no_jenis";
	$rs = $oDb->execute($sql);
	echo "<option value=\"-\">-</option>\n";
	while(!$rs->EOF)
	{
		$sel ="";
		if($selected==$rs->fields['no_jenis'])$sel = "selected";
		$value = $rs->fields['no_jenis'] .";" .  number_format($rs->fields['harga'],0,"","") ;
		echo sprintf("<option value=\"%s\" %s>%s</option>\n",$value,$sel,$rs->fields['nama']);
		
		$rs->MoveNext();
	}
}
function getWaletJenisNilai($no){
	global $oDb;
	
	$sql = "SELECT harga FROM tjenis_sarang_burung WHERE no_jenis = ?";
	$rs = $oDb->execute($sql,array($no));
	if($rs->RecordCount())
		return $rs->fields['harga'];
	else
		return "0";	
}
function getWaletJenis($no){
	global $oDb;
	
	$sql = "SELECT nama FROM tjenis_sarang_burung WHERE no_jenis = ?";
	$rs = $oDb->execute($sql,array($no));
	if($rs->RecordCount())
		return $rs->fields['nama'];
	else
		return "";	
}
function getSetoran($no_kd,$pajak_usaha){
	return 0;
}
function getTarifHotel(){
	global $oDb;
	
	$sql ="SELECT tarif FROM ttarif_hotel";
	$rs = $oDb->execute($sql);
	if($rs->RecordCount())	
		return $rs->fields['tarif'];
	else
		return "0";
}
function getTarifReklame(){
	global $oDb;
	
	$sql ="SELECT tarif FROM ttarif_reklame";
	$rs = $oDb->execute($sql);
	if($rs->RecordCount())	
		return $rs->fields['tarif'];
	else
		return "0";
}
function getTarifHiburan($jenis){
	global $oDb;
	
	$sql ="SELECT tarif FROM ttarif_hiburan WHERE no_jenis=?";
	$rs = $oDb->execute($sql,array($jenis));
	if($rs->RecordCount())	
		return $rs->fields['tarif'];
	else
		return "0";
}
function getTarifRestoran(){
	global $oDb;
	
	$sql ="SELECT tarif FROM ttarif_restoran";
	$rs = $oDb->execute($sql);
	if($rs->RecordCount())	
		return $rs->fields['tarif'];
	else
		return "0";
}
function getTarifParkir(){
	global $oDb;
	
	$sql ="SELECT tarif FROM ttarif_parkir";
	$rs = $oDb->execute($sql);
	if($rs->RecordCount())	
		return $rs->fields['tarif'];
	else
		return "0";
}
function getKDDetail($no_kd,$table){
	global $oDb,$arrBulan;
	
    $sql = "SELECT $table.*,tbk02_kirim.npwpd,tbk02_kirim.nama,tbk02_kirim.alamat FROM $table 
    				INNER JOIN tbk02_terima ON $table.sptpd=tbk02_terima.sptpd 
    				INNER JOIN tbk02_kirim ON tbk02_terima.no_form=tbk02_kirim.no_form 
    				WHERE $table.autono = ? ";
    $rs = $oDb->execute($sql,array($no_kd));
	
	if(!empty($rs->fields['masa'])){
        if(strpos($rs->fields['masa'],"-")){
			if(sizeof(split("/",$rs->fields['masa']))==3){
                $arrmasa = explode("-",$rs->fields['masa']);	
                $arrmasaawal = explode("/",$arrmasa[0]);
                $arrmasaakhir = explode("/",$arrmasa[1]);
                $masa = $arrBulan[$arrmasaawal[0]] . " " . $arrmasaawal[1];
                $masa .=(" s/d " . $arrBulan[$arrmasaakhir[0]]. " " . $arrmasaakhir[1]);
			}
			else
        		$masa =  str_replace("-"," s/d ",$rs->fields['masa']);
		}	
        else{
        	$masa =  $arrBulan[$rs->fields['masa']] . " " . $rs->fields['tahun_pajak'];
        }
	}else{
		$masa =  mysqlToCalDate($rs->fields['batas_awal']) . " s/d " . mysqlToCalDate($rs->fields['batas_akhir']);
	}
	return array($rs->fields['npwpd'],$rs->fields['nama'],$masa,$rs->fields['alamat']);	
}
function parseNPWPD($npwpd,$separator){
	return ( substr($npwpd,0,1) . $separator . substr($npwpd,1,5) . $separator . substr($npwpd,6));
}
function printSK($selected){
	global $oDb;
	
	$sql = "SELECT * FROM tsk ORDER BY autono";
	$rs = $oDb->execute($sql);
	while(!$rs->EOF)
	{
		$sel ="";
		if($selected==$rs->fields['autono'])$sel = "selected";
		echo sprintf("<option value=\"%s\" %s>%s</option>\n",$rs->fields['autono'],$sel,$rs->fields['nama']);
		
		$rs->MoveNext();
	}
}
function isDPD02Used($pajak,$sptpd){
	global $oDb;
	
	if($pajak!="03"){
		$table = strtolower(substr($pajak,2,1)) ;
	}else{
		$table = "i";
	}
	
	$sql = "SELECT autono FROM tdpd04_$table WHERE sptpd = ?";
	$rs = $oDb->execute($sql,array($sptpd));
	if(!$rs->RecordCount()){
		return false;
	}else{
		return true;
	}
}
function getRekeningUtamaPAD(){
	global $oDb;
	$arrRekPAD = array();
	
	$sql = "SELECT * FROM trek ORDER BY kode_rek";
	$rs = $oDb->execute($sql);
	while(!$rs->EOF)
	{
		array_push($arrRekPAD,$rs->fields['no_rekening']);	
		$rs->MoveNext();
	}
	return $arrRekPAD;
}
function calDateAdd($interval, $date) {
	
	$number = 1;
	$arrdate = split("/",$date);
	
    $month = sprintf('%d',$arrdate[1]) ;
    $day = sprintf('%d',$arrdate[0]) ;
    $year = sprintf('%d',$arrdate[2]) ;

    switch ($interval){
        case 'T':
            $year+=$number;
            break;
        case 'B':
            $month+=$number;
            break;
        case 'M':
            $day+=($number*7);
            break;
        case 'I':
            $day+=$number;
            break;
    }
	
    $newdate= Date('d/m/Y',mktime(0,0,0,$month,$day,$year));
    return $newdate;
}

function getData($nilai,$tabel,$syarat,$syaratnya){
    $sql = "select $nilai from $tabel where $syarat = $syaratnya";
    $res = mysql_query($sql);
    $row = mysql_fetch_array($res);

    return $row[0];
}

function dropDown($TABLE,$WHERE,$ORDERBY,$value,$display,$display2,$display3,$selname,$rowedit,$multitampil)
{
	$sql = "SELECT $value,$display,$display2,$display3 FROM $TABLE $WHERE $ORDERBY";
	$res = mysql_query($sql);
	echo "<select name='$selname'>";
	while($row=mysql_fetch_array($res)){
		$nilai = $row[$value];
		$tampilan = $row[$display];
		$tampilan2 = $row[$display2];
		$tampilan3 = $row[$display3];
		
		if($multitampil==1){
			$multi = " - $tampilan2 - $tampilan3 ";	
		}else{
			$multi = "";	
		}
		//for edit mode
		if($rowedit==$nilai ? $selected="selected" : $selected="");
		echo "<option value='$nilai' $selected>$tampilan $multi</option>";	
	}
	echo "</select>";
}

function dropDownMonth($selname,$rowedit,$disabled,$useempty)
{
	if($disabled=="disabled"?$disabled="disabled":$disabled="");	
	echo "<select name='$selname' $disabled>";	
	
	if($rowedit==0 ? $selected0="selected" : $selected="");
	if($rowedit==1 ? $selected1="selected" : $selected="");
	if($rowedit==2 ? $selected2="selected" : $selected="");
	if($rowedit==3 ? $selected3="selected" : $selected="");
	if($rowedit==4 ? $selected4="selected" : $selected="");
	if($rowedit==5 ? $selected5="selected" : $selected="");
	if($rowedit==6 ? $selected6="selected" : $selected="");
	if($rowedit==7 ? $selected7="selected" : $selected="");
	if($rowedit==8 ? $selected8="selected" : $selected="");
	if($rowedit==9 ? $selected9="selected" : $selected="");
	if($rowedit==10 ? $selected10="selected" : $selected="");
	if($rowedit==11 ? $selected11="selected" : $selected="");
	if($rowedit==12 ? $selected12="selected" : $selected="");
	
	if($useempty == '1'){
		echo "<option value='' $selected0>-</option>";	
	}
	echo "<option value='1' $selected1>Januari</option>";
	echo "<option value='2' $selected2>Februari</option>";
	echo "<option value='3' $selected3>Maret</option>";
	echo "<option value='4' $selected4>April</option>";
	echo "<option value='5' $selected5>Mei</option>";
	echo "<option value='6' $selected6>Juni</option>";
	echo "<option value='7' $selected7>Juli</option>";
	echo "<option value='8' $selected8>Agustus</option>";
	echo "<option value='9' $selected9>September</option>";
	echo "<option value='10' $selected10>Oktober</option>";
	echo "<option value='11' $selected11>November</option>";
	echo "<option value='12' $selected12>Desember</option>";	
	echo "</select>";	
}

function dropDownTahun($selname,$range,$rowedit,$add,$disabled,$useempty)
{
	if($disabled=="disabled"?$disabled="disabled":$disabled="");	
	
	$tahun = date('Y');
	$min   = $tahun - $range;
	$max   = $tahun + $range;
	echo "<select name='$selname' $disabled>";	
	if($useempty == '1'){
		echo "<option value='' $selected0>-</option>";	
	}
	for($i = $min ; $i <= $max ; $i++)
	{
		if($rowedit==$i ? $selected="selected" : $selected="");
		if($add=="1"){
			if($i==$tahun ? $selectedadd = "selected" : $selectedadd="" );	
		}
		echo "<option value='$i' $selected $selectedadd >$i</option>";	
	}
	echo "</select>";	
}

function number_to_bulan($no){
	$bulan = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
	return $bulan[$no-1];	
}

function uang($a){
    $x = number_format($a,0,',','.');
    return $x;
}


?>
