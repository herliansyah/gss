<?php
/*******************************************************
Author  : Hengky Ilawan
E-mail  : khaiwong@yahoo.com
Date    : 25 July 2005

example of use: (in mysql)
===============

// count number of record in table
$sql = 'SELECT COUNT(amenity_name) as CountRecord FROM amenity';
$rs = $DB->execute($sql);
$numRec = $rs->fields['CountRecord'];

$curPage = $_SERVER['REQUEST_METHOD'] && isset($_GET[$pager->pageParam])? $_GET[$pager->pageParam] : 0;

// initialise our paging class
$pager = new paging();
$pager->setItemPerPage(2);
$pager->init($numRec, $_SERVER['REQUEST_URI'], $curPage);

// limit the result set
$sql = 'SELECT am_id, amenity_name FROM amenity WHERE amenity_name = ?';
$rs = $DB->selectLimit($sql, $pager->getItemPerPage(), $pager->getCurrentOffset(), array('a name'));

// to print the pager
$pager->printPager();

*******************************************************/

define("_ITEM_PER_PAGE", 10);
define("_PAGE_TO_SHOW", 10);

class Paging {

	var $itemPerPage = _ITEM_PER_PAGE;
	var $pageToShow = _PAGE_TO_SHOW;
	var $startPage = 1;
	var $endPage;
	var $curPage;
	var $pageCount;
	var $offset;
	var $url = '';
	var $align = "center";
	var $pageParam = 'p';
	var $printPageOf = false;
	var $recordCount;
	
	var $lang = 'custom';
	var $arLang = array();
	
	function Paging() {
		// language
		$this->arLang = array(
			'en' => array(
				'_Page' => 'Page',
				'_Prev' => 'Prev',
				'_Next' => 'Next',
				'_First' => 'First',
				'_Last' => 'Last',
				'_GoToPage' => 'Go to page'
			),
			'id' => array(
				'_Page' => 'Halaman',
				'_Prev' => 'Sebelumnya',
				'_Next' => 'Berikutnya',
				'_First' => 'Awal',
				'_Last' => 'Akhir',
				'_GoToPage' => 'Ke halaman'
			),
			'custom' => array(
				'_Page' => 'Halaman',
				'_Prev' => '<<',
				'_Next' => '>>',
				'_First' => '|<',
				'_Last' => '>|',
				'_GoToPage' => 'Ke halaman'
			)			
		);
	}
	
	function _d($str) {
		return $this->arLang[$this->lang][$str];
	}

	function init($recordCount, $url, $curPage) {
		$this->recordCount = $recordCount;
		$this->curPage = empty($curPage)? 0 :(int)$curPage;
		$this->url = $this->fixURL($url);
		// jika gak ada parameter curpage, maka default adalah page 1
		if (empty($this->curPage) || $this->curPage<=0) $this->curPage=1;

		// hitung jumlah halaman
		$this->pageCount = floor($recordCount / $this->itemPerPage);
		if ($recordCount != 0 && $recordCount % $this->itemPerPage > 0) $this->pageCount++;

		if (empty($this->curPage) || $this->curPage>$this->pageCount) $this->curPage=$this->pageCount;

		// cari start page dan end page
		if ($this->pageCount <= $this->pageToShow) {
			$this->startPage = 1;
			$this->endPage = $this->pageCount;
		}
		else {
			$this->startPage = $this->curPage - floor($this->pageToShow/2);
			if ($this->startPage <= 0) {
				$this->startPage = 1;
			}
			$this->endPage = $this->startPage + $this->pageToShow - 1;
			if ($this->startPage+$this->pageToShow <= $this->pageCount) {
				if ($this->endPage > $this->pageCount) {
					$this->endPage = $this->pageCount;
					$this->startPage = $this->endPage - $this->pageToShow;
				}
			}
			else {
				$this->endPage = $this->pageCount;
				if ($this->startPage + $this->pageToShow > $this->endPage) {
					$this->startPage = $this->endPage - $this->pageToShow +1;
				}
			}
		}

		$this->offset = $this->getCurrentOffset();
	}

	function printPager() {
		$arrPage = array();

		// print nothing if there is no data
		if ($this->pageCount == 0) {
			return;
		}
		
		printf('<b>%s:</b> ', $this->_d('_Page'));

		if ($this->curPage > 1) {
			array_push($arrPage, sprintf('<a href="%s">%s</a>', $this->url."&p=1", $this->_d('_First') ));
			array_push($arrPage, '&nbsp;');
			array_push($arrPage, sprintf('<a href="%s">%s</a>', $this->url."&p=".($this->curPage-1), $this->_d('_Prev')));
		}
		else {
			array_push($arrPage, $this->_d('_First'));
			array_push($arrPage, '&nbsp;');
			array_push($arrPage, $this->_d('_Prev'));
		}
		array_push($arrPage, '&nbsp;');
		for ($i=$this->startPage; $i<=$this->endPage; $i++) {
			if ($this->curPage == $i) {
				array_push($arrPage, sprintf('<b>%s</b>', $i));
			}
			else {
				array_push($arrPage, sprintf('<a href="%s">%s</a>', $this->url."&p=$i", $i));
			}
		}
		array_push($arrPage, '&nbsp;');
		if ($this->curPage < $this->pageCount) {
			array_push($arrPage, sprintf('<a href="%s">%s</a>', $this->url."&p=".($this->curPage+1), $this->_d('_Next')));
			array_push($arrPage, '&nbsp;');
			array_push($arrPage, sprintf('<a href="%s">%s</a>', $this->url."&p=".$this->pageCount, $this->_d('_Last')));
		}
		else {
			array_push($arrPage, $this->_d('_Next'));
			array_push($arrPage, '&nbsp;');
			array_push($arrPage, $this->_d('_Last'));
		}
		
		echo implode("&nbsp;", $arrPage);
		if ($this->printPageOf) {
			echo "&nbsp;&nbsp;&nbsp;";
			printf('%s %s of %s', $this->_d('_Page'), $this->curPage, $this->pageCount);
		}
	}

	function fixURL($url) {
		$pattern = "/[\?&]?".$this->pageParam."=\d+/";
		if ($_SERVER['QUERY_STRING'] == '') {
			$url = $url."?";
		}
		return preg_replace($pattern, "", $url);
	}

	function getCurrentOffset() {
		$offset = ($this->curPage-1) * $this->itemPerPage;
		if ($offset < 0) $offset=0;
		return $offset;
	}

	function setCurrentPage($page) {
		$this->curPage = (int)$page;
	}
	function getCurrentPage() {
		return $this->curPage;
	}
	function getPageToShow() {
		return $this->pageToShow;
	}
	function setItemPerPage($value) {
		$this->itemPerPage = $value;
	}
	function getItemPerPage() {
		return $this->itemPerPage;
	}
}

?>
