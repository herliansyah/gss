<?php
class Search{
	var $SearchField = array(
		'FieldName' => array()
		,'FieldDesc' => array()
	);
	var $CustomURLParam = array(
		'URLKey' => array()
		,'URLValue' => array()	
	);
	
	function Search($_SearchField,$_CustomURLParam = array()){
		$this->SearchField = $_SearchField;
		if(sizeof($_CustomURLParam) > 0 ){
			$this->CustomURLParam = $_CustomURLParam;
		} 
	}
	function GenerateBar(){
		global $_GET;
		
		$mod = empty($_GET['mod'])?'':$_GET['mod'];
		$cmd = empty($_GET['cmd'])?'':$_GET['cmd'];
		$Field = empty($_GET['SearchField'])?'':$_GET['SearchField'];
		$Value = empty($_GET['SearchValue'])?'':$_GET['SearchValue'];		
		
		echo "<script>";
		echo "function DoSearch(){ if(frmSearch.SearchField.selectedIndex>0 && frmSearch.SearchValue.value==''){alert('Harap mengisi kata kunci');frmSearch.SearchValue.focus();return false;}else if(frmSearch.SearchField.selectedIndex<1) {alert('Harap memilih field pencarian');frmSearch.SearchField.focus();return false;}else{ return true; } }";
		echo "</script>";
		echo "<form name='frmSearch' method='GET' onsubmit=\"return DoSearch()\" >";
		echo "<input type=\"hidden\" name=\"mod\" value=\"$mod\" >";
		echo "<input type=\"hidden\" name=\"cmd\" value=\"$cmd\" >";
		for($i = 0;$i < sizeof($this->CustomURLParam['URLKey']);$i++){
			$key = $this->CustomURLParam['URLKey'][$i];
			$val = $this->CustomURLParam['URLValue'][$i];
			echo "<input type=\"hidden\" name=\"$key\" value=\"$val\" >";
		}
		echo "<table border='0'><tr>";
		echo "<td><b>Pencarian : </b></td>";
		echo "<td><select name='SearchField' onchange='if(this.selectedIndex<1){frmSearch.SearchValue.value=\"\";frmSearch.submit();}else {frmSearch.SearchValue.focus();}'>";
		echo "<option value=''>-Tampilkan Semua-</option>";
		for($i = 0;$i< sizeof($this->SearchField['FieldName']);$i++){
			if($Field==$this->SearchField['FieldName'][$i])
				$selected ="selected";
			else
				$selected = "";	
			echo sprintf("<option value='%s' $selected>%s</option>",$this->SearchField['FieldName'][$i],$this->SearchField['FieldDesc'][$i]);	
		}
		echo "</select></td>";
		echo "<td><input name=\"SearchValue\" type=\"text\" size=\"30\" maxlength=\"30\" value=\"$Value\"></td>";
		echo "<td><input name=\"cmdSearch\" type=\"submit\" class=\"button\" value=\"Cari\"></td>";		
		echo "</tr></table>";
		echo "</form>";
	}
	function GenerateSql($andprefix){
		global $_GET;
		
		$ret ='';
		if(!empty($_GET['SearchField'])&&!empty($_GET['SearchValue'])){
			$Field = $_GET['SearchField'];
			$Value = $_GET['SearchValue'];		
			
			if($andprefix)
				$ret = ("AND " . $Field . " LIKE '%".$Value."%'");
			else
				$ret = ($Field . " LIKE '%".$Value."%'");
		}
		return $ret;
	}
}
?>