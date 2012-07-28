<?

$file = $_GET['id']; 
$filename = basename($file); 
header("Content-type: application/force-download"); 
header("Content-Transfer-Encoding: binary"); 
header("Content-length: ".filesize($file)); 
header("Content-Disposition: attachment; filename=$filename"); 
readfile($file);  
?>