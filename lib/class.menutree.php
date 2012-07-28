<? 
define("_INDENT_SPACE", 5);
define("_SPACER_IMG", $config['base_url'].'/img/spacer.png');
define("_SPACER_IMG_WIDTH", 20);

// functions for loading, contructing and 
// displaying the tree are in this file 
class MenuTree {  
	// each node in the tree has member variables containing 
	// all the data for a menu
	var $menu_id; 
	var $menu_name; 
	var $parent_id;
	var $children;
	var $url ;
	var $child_list; 
	var $depth;

	function MenuTree($aMenuId, $aMenuName,$aurl, $aParentId, $aChildren, $aDepth) {  
		global $oDb;
		// the constructor sets up the member variables, but more 
		// importantly recursively creates lower parts of the tree 
	
		$this->menu_id = $aMenuId; 
		$this->menu_name = $aMenuName; 
		$this->parent_id = $aParentId;
		$this->children = $aChildren; 
		$this->child_list = array(); 
		$this->depth = $aDepth; 
		$this->url = $aurl;
		if ($this->children) {
	
			$sql = "
				SELECT tmenu.menu_id, tmenu.menu_name, tmenu.parent_id,url 
				FROM tmenu 
				WHERE tmenu.parent_id = ?
				ORDER BY tmenu.ordering
				";
			$rs = $oDb->execute($sql, array($this->menu_id));
	
			$childListIdx = 0;
			while (!$rs->EOF) {
				$sqlChild = "SELECT COUNT(tmenu.menu_id) as CountChildren FROM tmenu WHERE tmenu.parent_id = ?";
				$rsChild  = $oDb->execute($sqlChild, array($rs->fields['menu_id']));
				$hasChildren = ($rsChild->fields['CountChildren'] > 0) ? 1 : 0;
				$this->child_list[$childListIdx]= new MenuTree( $rs->fields['menu_id'], $rs->fields['menu_name'],$rs->fields['url'], $rs->fields['parent_id'],	$hasChildren, $this->depth+1); 
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

			// indent replies to the depth of nesting 
			$imgWidth = 0;
			for($i=1; $i<=$this->depth; $i++) { 
				$imgWidth = $i * _SPACER_IMG_WIDTH;
			} 
			$indentStr = sprintf('<img src="%s" height=12 width=%s border=0>',_SPACER_IMG, $imgWidth); 
			echo '<td>'.$indentStr.htmlspecialchars($this->menu_name).'</td>';
			echo '<td>'.htmlspecialchars($this->url).'</td>';
		
			//kolom action
			echo <<<END
				<td align='center'>
					<a href="edit.php?menu_id=$this->menu_id">Edit</a>&nbsp;|&nbsp;
					<a href="add.php?pid=$this->menu_id">Add Sub</a>&nbsp;|&nbsp;
					<a href="javascript:delmenu($this->menu_id)">Delete</a>
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

	//delete tree node and it children
	function getDeleteNodes() {
		static $delId = array();
		array_push($delId,$this->menu_id);

		$num_children = sizeof($this->child_list); 
		for($i=0; $i<$num_children; $i++) { 
		  $this->child_list[$i]->getDeleteNodes(); 
		} 
		return $delId;
	}
	
  	// $top adalah node tree yang memanggil function ini pertama kali
	function genMenuArray($top) {
		static $arBracket = array();
		static $lastDepth = -1;
		static $menuArray = '';
		static $firstTime = true;
		static $initmenuId = 0;

		if ( ($this->menu_id == $top) || $firstTime) {
			$arBracket = array();
			$lastDepth = $this->depth;
			$menuArray = "[\n";
			$firstTime = false;
			$initmenuId = $this->menu_id;
		}
		else {
			if ($this->depth > $lastDepth) {
				array_push($arBracket, $this->depth);
				$menuArray .= str_repeat("\t", sizeof($arBracket));
			} 
			else if ($this->depth == $lastDepth) {
				$menuArray .= str_repeat("\t", sizeof($arBracket));
			}
			else {
				$menuArray = rtrim($menuArray, " ,\t\n\r") . "\n";
				$howMany = $lastDepth - $this->depth;
				for ($i=0; $i<$howMany; $i++) {
					array_pop($arBracket);
					$space = str_repeat("\t", sizeof($arBracket));
					$menuArray .= $space . "],\n";
				}
				$menuArray .= $space;
			}
			$tmpMenuIcon = 'null';
			//$tmpMenuName = htmlspecialchars($this->menu_name, ENT_QUOTES);
			$tmpMenuName = $this->menu_name;
			
			$tmpMenuLink = $this->url;
			$tmpTarget = 'null';
			$tmpMenuDesc = $tmpMenuName;
			
			// construct array of each menu item
			if($this->menu_name!="-" && $this->menu_name!="|")
				$menuArray .= '['.$tmpMenuIcon .",'". $tmpMenuName ."','". $tmpMenuLink ."',". $tmpTarget .",'". $tmpMenuDesc ."'";
			else
				$menuArray .= "_cmSplit,\n";
			if($this->menu_name!="-"  && $this->menu_name!="|"){	
    			if ($this->children) {
    				$menuArray .= ",\n";
    			}
    			else {
    				$menuArray .= "],\n";
    			}
			}
		}
		$lastDepth = $this->depth;

		// call genMenuArray on each of this node's children 
		$num_children = sizeof($this->child_list); 
		for($i = 0; $i<$num_children; $i++) { 
			$this->child_list[$i]->genMenuArray($top); 
		} 

		// generate close bracket yang di stack
		if (($this->menu_id == $top) || ($this->menu_id == $initmenuId) ) {
			$menuArray = rtrim($menuArray, " ,\t\n\r") . "\n";
			for ($i=sizeof($arBracket)-1; $i>0; $i--) {
				$menuArray .= str_repeat("\t", array_pop($arBracket)) . "]\n";
			}
			// close
			$menuArray .= "];\n";
		}

		return $menuArray;
	}
  function checkBoxTree() {
		static $oddRow = true;
		static $displayStr = '';
		$bgcolor = '';

		// if this is the empty root node skip displaying 
		if($this->depth > -1 && $this->menu_name !='|' && $this->menu_name != '-') { 

			if ($oddRow) {
				$bgcolor = '#EFEFEF';
			}
			$oddRow = !$oddRow;
			echo '<tr>';

			// indent replies to the depth of nesting 
			$imgWidth = 0;
			for($i=1; $i<=$this->depth; $i++) { 
				$imgWidth = $i * _SPACER_IMG_WIDTH;
			} 
			$indentStr = sprintf('<img src="%s" height=12 width=%s border=0>',_SPACER_IMG, $imgWidth); 
			$checkboxStr = htmlspecialchars($this->menu_name);
		
			//kolom action
			if (count($this->child_list) > 0) {
				echo sprintf('<td style="font-weight:bold">%s</td>' , ($indentStr.$checkboxStr)) ;
			} else {
				echo sprintf('<td>%s<input type="checkbox" name="chkMenu[]" value="%s" class="checkbox" onClick="isAdministrator(document.frm[\'chkMenu[]\'],document.frm.chkAdministrator)"/>%s</td>', $indentStr, $this->menu_id, $checkboxStr);
			}
			echo '</tr>'; 
		}
    // call display on each of this node's children 
    // note a node will only have children in its list if expanded 
    $num_children = sizeof($this->child_list); 
    for($i = 0; $i<$num_children; $i++) { 
      $this->child_list[$i]->checkBoxTree(); 
    } 
  } 
}; 
?>