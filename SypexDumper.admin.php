<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=tools
[END_COT_EXT]
==================== */
/**
 * Sypex Dumper for Cotonti CMF
 *
 * @version 1.1 
 * @author Dr2005alex, http://mycotonti.ru
 * @copyright (c) 20015 Dr2005alex, http://mycotonti.ru
 */

defined('COT_CODE') or die('Wrong URL.');

list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = cot_auth('plug', 'SypexDumper');
cot_block($usr['isadmin']);

$_SESSION['backup_create_admin_backup_url'] = cot_url('admin','m=other&p=SypexDumper&exit=1','',true);  

if(!cot_import('exit','G','INT')){
    
    $bpatch = $_SERVER['DOCUMENT_ROOT'].'/plugins/SypexDumper/inc/sxd/backup/';
    
    // создадим уникальную папку для дампа
    $bpatch .= (!empty($cfg['plugin']['SypexDumper']['unique'])) ? $cfg['plugin']['SypexDumper']['unique'].'/':'';
    if(!file_exists($bpatch)) mkdir($bpatch);
    
    $_SESSION[$usr['ip']]['backup_create_admin'] = $usr['isadmin'];
    $_SESSION['backup_patch'] = $bpatch;
    $_SESSION['backup_url'] = (!empty($cfg['plugin']['SypexDumper']['unique'])) ? 'backup/'.$cfg['plugin']['SypexDumper']['unique'].'/': 'backup/';
      
}else{
    
    unset($_SESSION[$ip]['backup_create_admin'],$_SESSION['backup_patch']);
    
}
       
$t = new XTemplate(cot_tplfile('SypexDumper', 'plug', true));
$t->parse("MAIN");
$adminmain = $t->text("MAIN");
