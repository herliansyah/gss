<? 
define("_INDENT_SPACE", 5);
define("_SPACER_IMG", $config['base_url'].'/img/spacer.gif');
define("_IMG_PAD",$config['base_url'].'/img/rekpad.gif');
define("_SPACER_IMG_WIDTH", 20);

$summary = 0;
// functions for loading, contructing and 
// displaying the tree are in this file 
class RekeningTree {  
	// each node in the tree has member variables containing 
	// all the data for a menu
	var $struktur_id; 
	var $no_rekening;
	var $keterangan; 
	var $parent_id;
	var $children;
	var $jenis_struktur;
	var $no_unit;
	var $nama_unit;
	var $child_list; 
	var $depth;

	function RekeningTree($aStrukturId, $aKeterangan,$aRekening,$ajenis,$aNoUnit,$aNamaUnit,$aParentId, $aChildren, $aDepth) {  
		global $oDb;
		// the constructor sets up the member variables, but more 
		// importantly recursively creates lower parts of the tree 
	
		$this->struktur_id = $aStrukturId; 
		$this->keterangan = $aKeterangan; 
		$this->no_rekening = $aRekening;
		$this->jenis_struktur = $ajenis;
		$this->no_unit = $aNoUnit;
		$this->nama_unit = $aNamaUnit;
		$this->parent_id = $aParentId;
		$this->children = $aChildren; 
		$this->child_list = array(); 
		$this->depth = $aDepth; 
		
		if ($this->children) {
	
			$sql = "
				SELECT tstruktur_rekening.*,tunit_kerja.nama_unit    
				FROM tstruktur_rekening 
				INNER JOIN tunit_kerja ON tstruktur_rekening.unit_kerja = tunit_kerja.no_unit 
				WHERE tstruktur_rekening.parent_id = ?
				ORDER BY tstruktur_rekening.ordering";
			$rs = $oDb->execute($sql, array($this->struktur_id));
	
			$childListIdx = 0;
			while (!$rs->EOF) {
				$sqlChild = "SELECT COUNT(tstruktur_rekening.struktur_id) as CountChildren FROM tstruktur_rekening WHERE tstruktur_rekening.parent_id = ?";
				$rsChild  = $oDb->execute($sqlChild, array($rs->fields['struktur_id']));
				$hasChildren = ($rsChild->fields['CountChildren'] > 0) ? 1 : 0;
				$this->child_list[$childListIdx]= new RekeningTree( $rs->fields['struktur_id'], $rs->fields['keterangan'],$rs->fields['no_rekening'],$rs->fields['jenis'],$rs->fields['unit_kerja'] ,$rs->fields['nama_unit'] ,$rs->fields['parent_id'],	$hasChildren, $this->depth+1); 
				$rs->moveNext();
				$childListIdx++;
			}
		}
	}

  function display() {
		static $displayStr = '';

		// if this is the empty root node skip displaying 
		if($this->depth > -1) { 

			echo '<tr>';

			$imgWidth = 0;
			for($i=1; $i<=$this->depth; $i++) { 
				$imgWidth = $i * _SPACER_IMG_WIDTH;
			} 
			echo '<td>'.htmlspecialchars($this->no_rekening).'</td>';
			$indentStr = sprintf('<img src="%s" height=12 width=%s border=0>',_SPACER_IMG, $imgWidth); 
			echo '<td><div id="'.$this->struktur_id.'">'.$indentStr.$this->keterangan.'</div></td>';
			echo '<td>'.$this->nama_unit.'</td>';

			//kolom action
			echo <<<END
				<td align='center' nowrap>
					<a href="javascript:doEdit($this->struktur_id)">Edit</a>&nbsp;|&nbsp;
					<a href="javascript:doAdd(pid=$this->struktur_id)">Tambah Sub</a>&nbsp;|&nbsp;
					<a href="javascript:doDelete($this->struktur_id)">Hapus</a>
				</td>
END;
			echo '</tr>'; 
		}
    // call display on each of this node's children 
    // note a node will only have children in its list if expanded 
    $num_children = sizeof($this->child_list); 
    for($i = 0; $i<$num_children; $i++) { 
      $this->child_list[$i]->display(); 
    } 
  } 

  function display4find($arrRekPAD) {
  		global $config;
		static $displayStr = '';

		// if this is the empty root node skip displaying 
		if($this->depth > -1) { 

			echo '<tr>';

			$imgWidth = 0;
			for($i=1; $i<=$this->depth; $i++) { 
				$imgWidth = $i * _SPACER_IMG_WIDTH;
			} 
			if(in_array($this->no_rekening,$arrRekPAD)){
				echo '<td>'.htmlspecialchars($this->no_rekening).'<img alt="Rekening Utama PAD" src="'._IMG_PAD.'" width="16" height="16"></td>';
			}else{
				echo '<td>'.htmlspecialchars($this->no_rekening).'</td>';
			}
			$indentStr = sprintf('<img src="%s" height=12 width=%s border=0>',_SPACER_IMG, $imgWidth); 
			echo '<td><div id="'.$this->struktur_id.'">'.$indentStr.$this->keterangan.'</div></td>';
			echo '<td>'.$this->nama_unit.'</td>';
			
			//kolom action
			if($this->jenis_struktur =="2" && !in_array($this->no_rekening,$arrRekPAD)){
				$retval = $this->no_rekening . "|" . $this->keterangan . "|" . $this->struktur_id;
				echo '<td><img alt="Pilih rekening" align="absmiddle" id="imgaction" src="'.$config['img_url'].'/recaction/choose.png" onclick="doSelection(\''.$retval.' \')"></td>';
			}else{
				echo '<td>&nbsp;</td>';	
			}	
			echo '</tr>'; 
		}
    // call display on each of this node's children 
    // note a node will only have children in its list if expanded 
    $num_children = sizeof($this->child_list); 
    for($i = 0; $i<$num_children; $i++) { 
      $this->child_list[$i]->display4find($arrRekPAD); 
    } 
  } 
  
  function displayPrint() {
		static $displayStr = '';
		static $odd =true;

		// if this is the empty root node skip displaying 
		if($this->depth > -1) { 

			$class = $odd ? 'odd_row' : 'even_row';
			$odd = !$odd;
		
			echo '<tr class="'.$class.'">';

			$imgWidth = 0;
			for($i=1; $i<=$this->depth; $i++) { 
				$imgWidth = $i * _SPACER_IMG_WIDTH;
			} 
			echo '<td>'.htmlspecialchars($this->no_rekening).'</td>';
			$indentStr = sprintf('<img src="%s" height=12 width=%s border=0>',_SPACER_IMG, $imgWidth); 
			echo '<td><div id="'.$this->struktur_id.'">'.$indentStr.$this->keterangan.'</div></td>';
			echo '<td>'.$this->nama_unit.'</td>';

			echo '</tr>'; 
		}
    // call display on each of this node's children 
    // note a node will only have children in its list if expanded 
    $num_children = sizeof($this->child_list); 
    for($i = 0; $i<$num_children; $i++) { 
      $this->child_list[$i]->displayPrint(); 
    } 
  } 

  function displayEditTarget($arrRekPAD,$tahun) {
  		global $config,$oDb;
		static $displayStr = '';

		// if this is the empty root node skip displaying 
		if($this->depth > -1) { 

			echo '<tr>';

			$imgWidth = 0;
			for($i=1; $i<=$this->depth; $i++) { 
				$imgWidth = $i * _SPACER_IMG_WIDTH;
			} 
			if(in_array($this->no_rekening,$arrRekPAD)){
				echo '<td>'.htmlspecialchars($this->no_rekening).'<img alt="Rekening Utama PAD" src="'._IMG_PAD.'" width="16" height="16"></td>';
			}else{
				echo '<td>'.htmlspecialchars($this->no_rekening).'</td>';
			}
			
			$indentStr = sprintf('<img src="%s" height=12 width=%s border=0>',_SPACER_IMG, $imgWidth); 
			echo '<td><div id="'.$this->struktur_id.'">'.$indentStr.$this->keterangan.'</div></td>';
			
			if($this->jenis_struktur =="2"){
			
				$sql = "SELECT target FROM ttarget_pad WHERE tahun= ? AND struktur_rekening = ?";
				$rs = $oDb->execute($sql,array($tahun,$this->struktur_id));
				if($rs->RecordCount())
					$target = number_format($rs->fields['target'],0,"","");
				else
					$target = "0";
				$rs = null;		
				
			//kolom nilai target
			echo <<<END
				<td align='center' nowrap>
					<input type='text' name='txt$this->struktur_id' size='15' value='$target' maxlength='12' style='text-align:right' onchange='txtTarget_onchanged()' onKeyPress='event.returnValue = inNumOnly(event)'>,00 
				</td>
END;
			}else{
			
				echo '<td>&nbsp;</td>';
			}
			echo '</tr>'; 
		}
    // call display on each of this node's children 
    // note a node will only have children in its list if expanded 
    $num_children = sizeof($this->child_list); 
    for($i = 0; $i<$num_children; $i++) { 
      $this->child_list[$i]->displayEditTarget($arrRekPAD,$tahun); 
    } 
  } 

  function displayPrintTarget($arrRekPAD,$tahun) {
  		global $config,$oDb,$summary;
		static $displayStr = '',$odd=true;

		// if this is the empty root node skip displaying 
		if($this->depth > -1) { 

			$class = $odd ? 'odd_row' : 'even_row';
			$odd = !$odd;
		
			echo '<tr class="'.$class.'">';

			$imgWidth = 0;
			for($i=1; $i<=$this->depth; $i++) { 
				$imgWidth = $i * _SPACER_IMG_WIDTH;
			} 
			if(in_array($this->no_rekening,$arrRekPAD)){
				echo '<td>'.htmlspecialchars($this->no_rekening).'<img alt="Rekening Utama PAD" src="'._IMG_PAD.'" width="16" height="16"></td>';
			}else{
				echo '<td>'.htmlspecialchars($this->no_rekening).'</td>';
			}
			
			$indentStr = sprintf('<img src="%s" height=12 width=%s border=0>',_SPACER_IMG, $imgWidth); 
			echo '<td><div id="'.$this->struktur_id.'">'.$indentStr.$this->keterangan.'</div></td>';
			
			if($this->jenis_struktur =="2"){
			
				$sql = "SELECT target FROM ttarget_pad WHERE tahun= ? AND struktur_rekening = ?";
				$rs = $oDb->execute($sql,array($tahun,$this->struktur_id));
				if($rs->RecordCount())
					$target = number_format($rs->fields['target'],2,",",".");
				else
					$target = number_format(0,2,",",".");
				$rs = null;		
				
				echo '<td align="right" style="padding-right:10px">'. $target . '</td>' ;
			}else{
				$summary = 0;
				$oStruktur = new RekeningTree($this->struktur_id,'','','','','',0,1,-1);
				$oStruktur->doSummaryTarget($tahun);

				echo '<td align="right" style="padding-right:10px"><u>',number_format($summary,2,",","."),'</u></td>' ;
			}
			echo '</tr>'; 
		}
    // call display on each of this node's children 
    // note a node will only have children in its list if expanded 
    $num_children = sizeof($this->child_list); 
    for($i = 0; $i<$num_children; $i++) { 
      $this->child_list[$i]->displayPrintTarget($arrRekPAD,$tahun); 
    } 
  } 
  
  function generateValidationJs() {
		static $first = true;

		// if this is the empty root node skip displaying 
		if($this->depth > -1) { 
			if($this->jenis_struktur =="2"){
				if($first){
					echo ("
						if(f.txt$this->struktur_id.value=='' || f.txt$this->struktur_id.value=='0'){
							alert('Harap mengisi nilai target $this->keterangan ($this->no_rekening)');
							f.txt$this->struktur_id.focus();
						}");			

					$first = !$first;
				}else{
					echo ("
						else if(f.txt$this->struktur_id.value=='' || f.txt$this->struktur_id.value=='0'){
							alert('Harap mengisi nilai target $this->keterangan ($this->no_rekening)');
							f.txt$this->struktur_id.focus();
						}");			
					
				}
			}
		}

    $num_children = sizeof($this->child_list); 
    for($i = 0; $i<$num_children; $i++) { 
      $this->child_list[$i]->generateValidationJs(); 
    } 
  } 
	
	function StrukturCount(){
		static $iCount = 0;
		if($this->depth > -1){
			$iCount = $iCount + 1;
		}
	    $num_children = sizeof($this->child_list); 
    	for($i = 0; $i<$num_children; $i++) { 
      		$this->child_list[$i]->StrukturCount(); 
	    } 
		return $iCount;
	}	

	//delete tree node and it children
	function getDeleteNodes() {
		static $delId = array();
		array_push($delId,$this->struktur_id);

		$num_children = sizeof($this->child_list); 
		for($i=0; $i<$num_children; $i++) { 
		  $this->child_list[$i]->getDeleteNodes(); 
		} 
		return $delId;
	}

	function getTargetEditableNodes() {
		static $delId = array();
		
		if($this->depth > -1 && $this->jenis_struktur =="2"){
			array_push($delId,$this->struktur_id);
		}	

		$num_children = sizeof($this->child_list); 
		for($i=0; $i<$num_children; $i++) { 
		  $this->child_list[$i]->getTargetEditableNodes(); 
		} 
		return $delId;
	}	
	function doSummaryTarget($tahun){
		global $oDb,$summary;
		
		if($this->depth > -1 && $this->jenis_struktur =="2"){
			$sql = "SELECT target FROM ttarget_pad WHERE tahun= ? AND struktur_rekening = ?";
			$rs = $oDb->execute($sql,array($tahun,$this->struktur_id));
			if($rs->RecordCount()){
				$summary = $summary +  number_format($rs->fields['target'],0,"","") ;
			}
			$rs = null;
		}
	    $num_children = sizeof($this->child_list); 
    	for($i = 0; $i<$num_children; $i++) { 
      		$this->child_list[$i]->doSummaryTarget($tahun); 
	    } 
	}	
	function doSummaryRealisasi($arrRekPAD,$tahun,$param,$thnini){
		global $oDb,$summary;
		
		if($this->depth > -1 && $this->jenis_struktur =="2" && !in_array($this->no_rekening,$arrRekPAD)){
			if(!$thnini){
					if($param['lap']=="T"){
						$sql = "SELECT IFNULL(SUM(jumlah),0) AS Total FROM tdpd12_b_setoran
								INNER JOIN tdpd12_b 
									ON tdpd12_b_setoran.no_sts = tdpd12_b.no_sts
								WHERE tdpd12_b_setoran.kode_rekening = ? AND YEAR(tdpd12_b.tgl_terima)=? AND tdpd12_b.validasi='1'";
    					$rs = $oDb->execute($sql,array($this->struktur_id,intval($tahun)-1));
					}else if($param['lap']=="B"){
						$sql = "SELECT IFNULL(SUM(jumlah),0) AS Total FROM tdpd12_b_setoran
								INNER JOIN tdpd12_b 
									ON tdpd12_b_setoran.no_sts = tdpd12_b.no_sts
								WHERE tdpd12_b_setoran.kode_rekening = ? AND (UNIX_TIMESTAMP(tdpd12_b.tgl_terima) >= ? AND UNIX_TIMESTAMP(tdpd12_b.tgl_terima) < ?) AND tdpd12_b.validasi='1'";
    					$dtdari = calToUnixDate("01/01/" . $tahun);
						$dtsmp = calToUnixDate("01/". intval($param['bb']) ."/" . $tahun);
						$rs = $oDb->execute($sql,array($this->struktur_id,$dtdari,$dtsmp));
					}else{
						$sql = "SELECT IFNULL(SUM(jumlah),0) AS Total FROM tdpd12_b_setoran
								INNER JOIN tdpd12_b 
									ON tdpd12_b_setoran.no_sts = tdpd12_b.no_sts
								WHERE tdpd12_b_setoran.kode_rekening = ? AND (UNIX_TIMESTAMP(tdpd12_b.tgl_terima) >= ? AND UNIX_TIMESTAMP(tdpd12_b.tgl_terima) < ?) AND tdpd12_b.validasi='1'";
    					$dtdari = calToUnixDate("01/01/" . $tahun);
						$dtsmp = calToUnixDate($param['ht']);
						$rs = $oDb->execute($sql,array($this->struktur_id,$dtdari,$dtsmp));
					}
			}else{
    				if($param['lap']=="T"){
						$sql = "SELECT IFNULL(SUM(jumlah),0) AS Total FROM tdpd12_b_setoran
								INNER JOIN tdpd12_b 
									ON tdpd12_b_setoran.no_sts = tdpd12_b.no_sts
								WHERE tdpd12_b_setoran.kode_rekening = ? AND YEAR(tdpd12_b.tgl_terima)=? AND tdpd12_b.validasi='1'";
    					$rs = $oDb->execute($sql,array($this->struktur_id,intval($tahun)));
					}else if($param['lap']=="B"){
						$sql = "SELECT IFNULL(SUM(jumlah),0) AS Total FROM tdpd12_b_setoran
								INNER JOIN tdpd12_b 
									ON tdpd12_b_setoran.no_sts = tdpd12_b.no_sts
								WHERE tdpd12_b_setoran.kode_rekening = ? AND (UNIX_TIMESTAMP(tdpd12_b.tgl_terima) >= ? AND UNIX_TIMESTAMP(tdpd12_b.tgl_terima) <= ?) AND tdpd12_b.validasi='1'";
    					$dtdari = calToUnixDate("01/". intval($param['bb']) . "/" . $tahun);
						$dtsmp = calToUnixDate(EOM(intval($param['bb']),$tahun) . "/". intval($param['bb']) ."/" . $tahun);
						$rs = $oDb->execute($sql,array($this->struktur_id,$dtdari,$dtsmp));
					}else{
						$sql = "SELECT IFNULL(SUM(jumlah),0) AS Total FROM tdpd12_b_setoran
								INNER JOIN tdpd12_b 
									ON tdpd12_b_setoran.no_sts = tdpd12_b.no_sts
								WHERE tdpd12_b_setoran.kode_rekening = ? AND UNIX_TIMESTAMP(tdpd12_b.tgl_terima) = ?  AND tdpd12_b.validasi='1'";
						$dt = calToUnixDate($param['ht']);
						$rs = $oDb->execute($sql,array($this->struktur_id,$dt));
					}
			
			}
			if($rs->RecordCount()){
				$summary = $summary +  number_format($rs->fields['Total'],0,"","") ;
			}
			$rs = null;
		}else if($this->depth > -1 && $this->jenis_struktur =="2" && in_array($this->no_rekening,$arrRekPAD)){
                	$sql = "SELECT kode_rek FROM trek WHERE no_rekening = ?";
                	$rs = $oDb->execute($sql,array($this->no_rekening));
                	if(!$rs->RecordCount())
                		die("Nomor Rekening Utama PAD invalid");
                	$kode_rek = $rs->fields['kode_rek'];
                	if($kode_rek!="03"){
                		$table = strtolower(substr($rs->fields['kode_rek'],2,1));
                	}else{
                		$table = "i";
                	}
			
			if(!$thnini){
					if($param['lap']=="T"){
                    	$sql = "SELECT IFNULL(sum(tdpd12_setoran.setoran),0) AS SumOfSetoran FROM tdpd12_setoran 
                    			INNER JOIN  tdpd12 ON tdpd12_setoran.no_urut = tdpd12.no_urut 
                    			WHERE tdpd12_setoran.pajak_usaha = ? AND tdpd12.validasi = '1' AND YEAR(tdpd12.tgl_terima)=?";		
                    	$rs = $oDb->execute($sql,array($kode_rek,intval($tahun)-1));
					}else if($param['lap']=="B"){
                    	$sql = "SELECT IFNULL(sum(tdpd12_setoran.setoran),0) AS SumOfSetoran FROM tdpd12_setoran 
                    			INNER JOIN  tdpd12 ON tdpd12_setoran.no_urut = tdpd12.no_urut 
                    			WHERE tdpd12_setoran.pajak_usaha = ? AND tdpd12.validasi = '1' AND (UNIX_TIMESTAMP(tdpd12.tgl_terima) >= ? AND UNIX_TIMESTAMP(tdpd12.tgl_terima) < ?)";		
    					$dtdari = calToUnixDate("01/01/" . $tahun);
						$dtsmp = calToUnixDate("01/". intval($param['bb']) ."/" . $tahun);                    	
						$rs = $oDb->execute($sql,array($kode_rek,$dtdari,$dtsmp));
					}else{
                    	$sql = "SELECT IFNULL(sum(tdpd12_setoran.setoran),0) AS SumOfSetoran FROM tdpd12_setoran 
                    			INNER JOIN  tdpd12 ON tdpd12_setoran.no_urut = tdpd12.no_urut 
                    			WHERE tdpd12_setoran.pajak_usaha = ? AND tdpd12.validasi = '1' AND (UNIX_TIMESTAMP(tdpd12.tgl_terima) >= ? AND UNIX_TIMESTAMP(tdpd12.tgl_terima) < ?)";		
    					$dtdari = calToUnixDate("01/01/" . $tahun);
						$dtsmp = calToUnixDate($param['ht']);                   	
						$rs = $oDb->execute($sql,array($kode_rek,$dtdari,$dtsmp));
					}
			
			}else{
					if($param['lap']=="T"){
                    	$sql = "SELECT IFNULL(sum(tdpd12_setoran.setoran),0) AS SumOfSetoran FROM tdpd12_setoran 
                    			INNER JOIN  tdpd12 ON tdpd12_setoran.no_urut = tdpd12.no_urut 
                    			WHERE tdpd12_setoran.pajak_usaha = ? AND tdpd12.validasi = '1' AND YEAR(tdpd12.tgl_terima)=?";		
                    	$rs = $oDb->execute($sql,array($kode_rek,$tahun));
					}else if($param['lap']=="B"){
                    	$sql = "SELECT IFNULL(sum(tdpd12_setoran.setoran),0) AS SumOfSetoran FROM tdpd12_setoran 
                    			INNER JOIN  tdpd12 ON tdpd12_setoran.no_urut = tdpd12.no_urut 
                    			WHERE tdpd12_setoran.pajak_usaha = ? AND tdpd12.validasi = '1' AND (UNIX_TIMESTAMP(tdpd12.tgl_terima) >= ? AND UNIX_TIMESTAMP(tdpd12.tgl_terima) <= ?)";		
    					$dtdari = calToUnixDate("01/". intval($param['bb']) . "/" . $tahun);
						$dtsmp = calToUnixDate(EOM(intval($param['bb']),$tahun) . "/". intval($param['bb']) ."/" . $tahun);
						$rs = $oDb->execute($sql,array($kode_rek,$dtdari,$dtsmp));
					}else{
                    	$sql = "SELECT IFNULL(sum(tdpd12_setoran.setoran),0) AS SumOfSetoran FROM tdpd12_setoran 
                    			INNER JOIN  tdpd12 ON tdpd12_setoran.no_urut = tdpd12.no_urut 
                    			WHERE tdpd12_setoran.pajak_usaha = ? AND tdpd12.validasi = '1' AND UNIX_TIMESTAMP(tdpd12.tgl_terima) = ?";		
						$dt = calToUnixDate($param['ht']);                   	
						$rs = $oDb->execute($sql,array($kode_rek,$dt));
					}
						
			}
			$summary = $summary + number_format($rs->fields['SumOfSetoran'],0,"","");
		}
		
	    $num_children = sizeof($this->child_list); 
    	for($i = 0; $i<$num_children; $i++) { 
      		$this->child_list[$i]->doSummaryRealisasi($arrRekPAD,$tahun,$param,$thnini); 
	    } 
	}
	function displayPDFTargetVsRealisasi($arrRekPAD,$tahun,$param){
		global $config,$oDb,$summary,$posY,$pdf;
		static $bg = 245,$displayStr = '';
		
		if($this->depth > -1){
			
			$bg = $bg == 255 ? 245 : 255;
		
			$pdf->DrawText(_PDF_MARGIN,$posY,_A3_HEIGHT-(_PDF_MARGIN*2),5,'','C',$bg,$bg,$bg,1,1,_PDF_FONT,'B',8);
			
			$pdf->DrawText(5,$posY,50,5,htmlspecialchars($this->no_rekening),'L',255,255,255,'','',_PDF_FONT,'B',8);
			
			$imgWidth = $this->depth * _INDENT_SPACE;
			$pdf->DrawText(55,$posY,$imgWidth,5,'','L',255,255,255,'','',_PDF_FONT,'B',8);
			$pdf->DrawText(55 + $imgWidth,$posY,0,5,$this->keterangan,'L',255,255,255,'','',_PDF_FONT,'B',8);
						
			if($this->jenis_struktur=="2"){
				//target
				$sql = "SELECT target FROM ttarget_pad WHERE tahun= ? AND struktur_rekening = ?";
				$rs = $oDb->execute($sql,array($tahun,$this->struktur_id));
				if($rs->RecordCount())
					$target = number_format($rs->fields['target'],0,"","");
				else
					$target = 0;
				$rs = null;
				$pdf->DrawText(185,$posY,50,5,number_format($target,2,",","."),'R',255,255,255,'','',_PDF_FONT,'B',8);		
											
				if(!in_array($this->no_rekening,$arrRekPAD)){
					//realisasi periode lalu
					if($param['lap']=="T"){
						$sql = "SELECT IFNULL(SUM(jumlah),0) AS Total FROM tdpd12_b_setoran
								INNER JOIN tdpd12_b 
									ON tdpd12_b_setoran.no_sts = tdpd12_b.no_sts
								WHERE tdpd12_b_setoran.kode_rekening = ? AND YEAR(tdpd12_b.tgl_terima)=? AND tdpd12_b.validasi='1'";
    					$rs = $oDb->execute($sql,array($this->struktur_id,intval($tahun)-1));
					}else if($param['lap']=="B"){
						$sql = "SELECT IFNULL(SUM(jumlah),0) AS Total FROM tdpd12_b_setoran
								INNER JOIN tdpd12_b 
									ON tdpd12_b_setoran.no_sts = tdpd12_b.no_sts
								WHERE tdpd12_b_setoran.kode_rekening = ? AND (UNIX_TIMESTAMP(tdpd12_b.tgl_terima) >= ? AND UNIX_TIMESTAMP(tdpd12_b.tgl_terima) < ?) AND tdpd12_b.validasi='1'";
    					$dtdari = calToUnixDate("01/01/" . $tahun);
						$dtsmp = calToUnixDate("01/". intval($param['bb']) ."/" . $tahun);
						$rs = $oDb->execute($sql,array($this->struktur_id,$dtdari,$dtsmp));
					}else{
						$sql = "SELECT IFNULL(SUM(jumlah),0) AS Total FROM tdpd12_b_setoran
								INNER JOIN tdpd12_b 
									ON tdpd12_b_setoran.no_sts = tdpd12_b.no_sts
								WHERE tdpd12_b_setoran.kode_rekening = ? AND (UNIX_TIMESTAMP(tdpd12_b.tgl_terima) >= ? AND UNIX_TIMESTAMP(tdpd12_b.tgl_terima) < ?) AND tdpd12_b.validasi='1'";
    					$dtdari = calToUnixDate("01/01/" . $tahun);
						$dtsmp = calToUnixDate($param['ht']);
						$rs = $oDb->execute($sql,array($this->struktur_id,$dtdari,$dtsmp));
					}
    				if($rs->RecordCount())
    					$realisasithnlalu = number_format($rs->fields['Total'],0,"","");
    				else
    					$realisasithnlalu =  0;
    				$rs = null;		
					$pdf->DrawText(235,$posY,50,5,number_format($realisasithnlalu,2,",","."),'R',255,255,255,'','',_PDF_FONT,'B',8);
									
					//realisasi periode ini
    				if($param['lap']=="T"){
						$sql = "SELECT IFNULL(SUM(jumlah),0) AS Total FROM tdpd12_b_setoran
								INNER JOIN tdpd12_b 
									ON tdpd12_b_setoran.no_sts = tdpd12_b.no_sts
								WHERE tdpd12_b_setoran.kode_rekening = ? AND YEAR(tdpd12_b.tgl_terima)=? AND tdpd12_b.validasi='1'";
    					$rs = $oDb->execute($sql,array($this->struktur_id,intval($tahun)));
					}else if($param['lap']=="B"){
						$sql = "SELECT IFNULL(SUM(jumlah),0) AS Total FROM tdpd12_b_setoran
								INNER JOIN tdpd12_b 
									ON tdpd12_b_setoran.no_sts = tdpd12_b.no_sts
								WHERE tdpd12_b_setoran.kode_rekening = ? AND (UNIX_TIMESTAMP(tdpd12_b.tgl_terima) >= ? AND UNIX_TIMESTAMP(tdpd12_b.tgl_terima) <= ?) AND tdpd12_b.validasi='1'";
    					$dtdari = calToUnixDate("01/". intval($param['bb']) . "/" . $tahun);
						$dtsmp = calToUnixDate(EOM(intval($param['bb']),$tahun) . "/". intval($param['bb']) ."/" . $tahun);
						$rs = $oDb->execute($sql,array($this->struktur_id,$dtdari,$dtsmp));
					}else{
						$sql = "SELECT IFNULL(SUM(jumlah),0) AS Total FROM tdpd12_b_setoran
								INNER JOIN tdpd12_b 
									ON tdpd12_b_setoran.no_sts = tdpd12_b.no_sts
								WHERE tdpd12_b_setoran.kode_rekening = ? AND UNIX_TIMESTAMP(tdpd12_b.tgl_terima) = ?  AND tdpd12_b.validasi='1'";
						$dt = calToUnixDate($param['ht']);
						$rs = $oDb->execute($sql,array($this->struktur_id,$dt));
					}
					
    				if($rs->RecordCount())
    					$realisasithnini = number_format($rs->fields['Total'],0,"","");
    				else
    					$realisasithnini =  0;
    				$rs = null;		
					$pdf->DrawText(285,$posY,50,5,number_format($realisasithnini,2,",","."),'R',255,255,255,'','',_PDF_FONT,'B',8);

				}else{
                	$sql = "SELECT kode_rek FROM trek WHERE no_rekening = ?";
                	$rs = $oDb->execute($sql,array($this->no_rekening));
                	if(!$rs->RecordCount())
                		die("Nomor Rekening Utama PAD invalid");
                	$kode_rek = $rs->fields['kode_rek'];
                	if($kode_rek!="03"){
                		$table = strtolower(substr($rs->fields['kode_rek'],2,1));
                	}else{
                		$table = "i";
                	}
					
					//realisasi periode lalu
					if($param['lap']=="T"){
                    	$sql = "SELECT IFNULL(sum(tdpd12_setoran.setoran),0) AS SumOfSetoran FROM tdpd12_setoran 
                    			INNER JOIN  tdpd12 ON tdpd12_setoran.no_urut = tdpd12.no_urut 
                    			WHERE tdpd12_setoran.pajak_usaha = ? AND tdpd12.validasi = '1' AND YEAR(tdpd12.tgl_terima)=?";		
                    	$rs = $oDb->execute($sql,array($kode_rek,intval($tahun)-1));
					}else if($param['lap']=="B"){
                    	$sql = "SELECT IFNULL(sum(tdpd12_setoran.setoran),0) AS SumOfSetoran FROM tdpd12_setoran 
                    			INNER JOIN  tdpd12 ON tdpd12_setoran.no_urut = tdpd12.no_urut 
                    			WHERE tdpd12_setoran.pajak_usaha = ? AND tdpd12.validasi = '1' AND (UNIX_TIMESTAMP(tdpd12.tgl_terima) >= ? AND UNIX_TIMESTAMP(tdpd12.tgl_terima) < ?)";		
    					$dtdari = calToUnixDate("01/01/" . $tahun);
						$dtsmp = calToUnixDate("01/". intval($param['bb']) ."/" . $tahun);                    	
						$rs = $oDb->execute($sql,array($kode_rek,$dtdari,$dtsmp));
					}else{
                    	$sql = "SELECT IFNULL(sum(tdpd12_setoran.setoran),0) AS SumOfSetoran FROM tdpd12_setoran 
                    			INNER JOIN  tdpd12 ON tdpd12_setoran.no_urut = tdpd12.no_urut 
                    			WHERE tdpd12_setoran.pajak_usaha = ? AND tdpd12.validasi = '1' AND (UNIX_TIMESTAMP(tdpd12.tgl_terima) >= ? AND UNIX_TIMESTAMP(tdpd12.tgl_terima) < ?)";		
    					$dtdari = calToUnixDate("01/01/" . $tahun);
						$dtsmp = calToUnixDate($param['ht']);                   	
						$rs = $oDb->execute($sql,array($kode_rek,$dtdari,$dtsmp));
					}
					$realisasithnlalu = number_format($rs->fields['SumOfSetoran'],0,"","");
					$pdf->DrawText(235,$posY,50,5,number_format($realisasithnlalu,2,",","."),'R',255,255,255,'','',_PDF_FONT,'B',8);					
					
					//realisasi periode ini
					if($param['lap']=="T"){
                    	$sql = "SELECT IFNULL(sum(tdpd12_setoran.setoran),0) AS SumOfSetoran FROM tdpd12_setoran 
                    			INNER JOIN  tdpd12 ON tdpd12_setoran.no_urut = tdpd12.no_urut 
                    			WHERE tdpd12_setoran.pajak_usaha = ? AND tdpd12.validasi = '1' AND YEAR(tdpd12.tgl_terima)=?";		
                    	$rs = $oDb->execute($sql,array($kode_rek,$tahun));
					}else if($param['lap']=="B"){
                    	$sql = "SELECT IFNULL(sum(tdpd12_setoran.setoran),0) AS SumOfSetoran FROM tdpd12_setoran 
                    			INNER JOIN  tdpd12 ON tdpd12_setoran.no_urut = tdpd12.no_urut 
                    			WHERE tdpd12_setoran.pajak_usaha = ? AND tdpd12.validasi = '1' AND (UNIX_TIMESTAMP(tdpd12.tgl_terima) >= ? AND UNIX_TIMESTAMP(tdpd12.tgl_terima) <= ?)";		
    					$dtdari = calToUnixDate("01/". intval($param['bb']) . "/" . $tahun);
						$dtsmp = calToUnixDate(EOM(intval($param['bb']),$tahun) . "/". intval($param['bb']) ."/" . $tahun);
						$rs = $oDb->execute($sql,array($kode_rek,$dtdari,$dtsmp));
					}else{
                    	$sql = "SELECT IFNULL(sum(tdpd12_setoran.setoran),0) AS SumOfSetoran FROM tdpd12_setoran 
                    			INNER JOIN  tdpd12 ON tdpd12_setoran.no_urut = tdpd12.no_urut 
                    			WHERE tdpd12_setoran.pajak_usaha = ? AND tdpd12.validasi = '1' AND UNIX_TIMESTAMP(tdpd12.tgl_terima) = ?";		
						$dt = calToUnixDate($param['ht']);                   	
						$rs = $oDb->execute($sql,array($kode_rek,$dt));
					}
					$realisasithnini = number_format($rs->fields['SumOfSetoran'],0,"","");
					$pdf->DrawText(285,$posY,50,5,number_format($realisasithnini,2,",","."),'R',255,255,255,'','',_PDF_FONT,'B',8);
				}
				//sisa target
				if($param['lap']=="T")
					$sisatarget = $target - $realisasithnini ;
				else	
					$sisatarget = $target - $realisasithnini - $realisasithnlalu;
				$pdf->DrawText(335,$posY,50,5,number_format($sisatarget,2,",","."),'R',255,255,255,'','',_PDF_FONT,'B',8);
				
				//ket (%)
				if($target==0)
					$ket = 0;
				else					
					$ket = ($sisatarget/$target)*100;
				$pdf->DrawText(385,$posY,30,5,number_format($ket,2,",","."),'R',255,255,255,'','',_PDF_FONT,'B',8);
				
			}else{
				//target
				$summary = 0;
				$oStruktur = new RekeningTree($this->struktur_id,'','','','','',0,1,-1);
				$oStruktur->doSummaryTarget($tahun);
				$target = $summary;
				$pdf->DrawText(185,$posY,50,5,number_format($target,2,",","."),'R',255,255,255,'','',_PDF_FONT,'BU',8);		
				
				//realisasi thn lalu
				$summary = 0;
				$oStruktur = new RekeningTree($this->struktur_id,'','','','','',0,1,-1);
				$oStruktur->doSummaryRealisasi($arrRekPAD,$tahun,$param,false);
				$realisasithnlalu = $summary;
				$pdf->DrawText(235,$posY,50,5,number_format($realisasithnlalu,2,",","."),'R',255,255,255,'','',_PDF_FONT,'BU',8);

				//realisasi thn ini
				$summary = 0;
				$oStruktur = new RekeningTree($this->struktur_id,'','','','','',0,1,-1);
				$oStruktur->doSummaryRealisasi($arrRekPAD,$tahun,$param,true);
				$realisasithnini = $summary;
				$pdf->DrawText(285,$posY,50,5,number_format($realisasithnini,2,",","."),'R',255,255,255,'','',_PDF_FONT,'BU',8);
				
				//sisa target
				if($param['lap']=='T')
					$sisatarget = $target - $realisasithnini;
				else
					$sisatarget = $target - $realisasithnini - $realisasithnlalu;
						
				$pdf->DrawText(335,$posY,50,5,number_format($sisatarget,2,",","."),'R',255,255,255,'','',_PDF_FONT,'B',8);
				
				//ket (%)
				if($target==0)
					$ket = 0;
				else	
					$ket = ($sisatarget/$target)*100;
				$pdf->DrawText(385,$posY,30,5,number_format($ket,2,",","."),'R',255,255,255,'','',_PDF_FONT,'B',8);
			}
			$posY = $posY + 5;
		}
	    $num_children = sizeof($this->child_list); 
    	for($i = 0; $i<$num_children; $i++) { 
      		$this->child_list[$i]->displayPDFTargetVsRealisasi($arrRekPAD,$tahun,$param); 
	    } 
	}	
		
}; 
?>