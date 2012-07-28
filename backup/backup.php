<?php
session_start();
include_once "../config.inc.php";
//include_once 'function.php';
//just backup table not view, view structure backup manualy before
backup_tables("$config[dbhost]","$config[dbuser]","$config[dbpass]","$config[dbname]");
//log
$logger->logMsg($_SESSION[_SESSION_PREFIX.'user_name'], sprintf("User '%s' Membackup Database ", $_SESSION[_SESSION_PREFIX.'user_name']));
    ?>
        <script type="text/javascript">
            alert("Database Berhasi di Backup");
            history.back();
        </script>
    <?
$tabel = "";

//function backup_tables($host,$user,$pass,$name,$tables = '*') //all tables
function backup_tables($host,$user,$pass,$name,$tables = '*')
{

	$link = mysql_connect($host,$user,$pass);
	mysql_select_db($name,$link);

	//get all of the tables
	if($tables == '*')
	{
		$tables = array();
		$result = mysql_query('SHOW TABLES');
		while($row = mysql_fetch_row($result))
		{
			$tables[] = $row[0];
		}
	}
	else
	{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}

	//cycle through
	foreach($tables as $table)
	{
		$result = mysql_query('SELECT * FROM '.$table);
		$num_fields = mysql_num_fields($result);
                $return.= 'DROP TABLE IF EXISTS '.$table.';';
		$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";

		for ($i = 0; $i < $num_fields; $i++)
		{
			while($row = mysql_fetch_row($result))
			{
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j<$num_fields; $j++)
				{
					$row[$j] = addslashes($row[$j]);
					$row[$j] = ereg_replace("\n","\\n",$row[$j]);
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n\n";
	}

	//save file
	//$handle = fopen('_db-backup/db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql','w+');
    $handle = fopen('../_db-backup/all/db-backup-'.date(dmYHis).'.sql','w+');
    $nama = "db-backup-".date(dmYHis).".sql";
    $lokasi = "_db-backup/all/".$nama;
	$s = mysql_query("insert into backup(file,lokasi,status) values('$nama','$lokasi','1')");
    //$time = date("dmY-gis");
	//$handle = fopen('_db-backup/db-backup-'.$time.'.sql','w+');
    fwrite($handle,$return);
	fclose($handle);
}

?>
