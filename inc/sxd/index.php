<?php
$phpversion =  sxd_ver2int(phpversion());

function sxd_ver2int($ver){
	return preg_match("/^(\d+)\.(\d+)\.(\d+)/", $ver, $m) ? sprintf("%d%02d%02d", $m[1], $m[2], $m[3]) : 0;
}

if($phpversion > 70000){
    require_once 'index_php_7.php';
}else{
    require_once 'index_php_5.php';
}