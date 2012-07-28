<?
require_once $config['lib_dir'].'/class.menutree.php';

$menu = new MenuTree(0, '','',0, 1, -1);
$str = $menu->genMenuArray(0);
?>
<script language="Javascript">
	var myMenu = <?=$str;?>
</script>
