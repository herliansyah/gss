<?php
defined("_VALID_REQUEST") or die("Invalid Request");

$file = "backup/backup.php";
$judul = "Backup Semua Data";

//Add brand
if(isset($_POST['submitbrand'])){
	include($file);
}
?>
<div>

<form action="<?=$file?>" method="POST">
Backup Data:<br><input type="submit" name="submitbrand" value="<?=$judul?>">
<br />
* Untuk Menyimpan File ke Flasdisk, Klik nama filenya lalu save di Flashdisk <br />
* File yang Terbaru adalah file dengan urutan yang paling atas<br />
* pembacaan nama file <strong>db-backup-15012011200513.php</strong> (db-backup-{tanggal,jam backup})
</form>
<br>
<table border="0" cellpadding="2" cellspacing="0" id="b1">
<?
    $sql = "select * from backup";
    if($_GET[c]==""?$order = "order by id desc":$order = "order by $_GET[c] $_GET[s]");
    $sql .= " $order ";
    $result = mysql_query($sql);
    if($_GET['s']=="desc"?$s="asc":$s="desc");
   
?>
<thead>
<tr>
        <td width="300"> &nbsp; File Backup </td>
</tr>
</thead>
<?php

while($row = mysql_fetch_row($result)){
?>
<TR><TD><a href="download.php?id=<?php echo $row[2]; ?>"><?php echo htmlspecialchars($row[1]); ?></a><?php
}
?>
<TR><TD></TD></TR>
</table>
</div>
