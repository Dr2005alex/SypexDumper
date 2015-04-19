<?php
/**
 * Sypex Dumper for Cotonti CMF
 *
 * @version 1.0 
 * @author Dr2005alex, http://mycotonti.ru
 * @copyright (c) 20015 Dr2005alex, http://mycotonti.ru
 */

// Sypex Dumper 2 authorization file for Cotonti Siena 9.18

session_start();
$auth = 0;

if(!isset($_SESSION['backup_create_admin_backup_url'])) exit;// выход если не из админки

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

    //check ip from share internet
    $ip = $_SERVER['HTTP_CLIENT_IP'];
    
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

    //to check ip is pass from proxy
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    
} else {

    $ip = $_SERVER['REMOTE_ADDR'];
    
}

if (isset($_SESSION[$ip]['backup_create_admin'])) {

    if ($_SESSION[$ip]['backup_create_admin']) {

        define('COT_CODE', TRUE);
        $cfg['system_dir'] = $_SERVER['DOCUMENT_ROOT'].mb_substr($cfg['system_dir'], 1);
        
        include '../../../../datas/config.php';
        if ($this->connect($cfg['mysqlhost'], '', $cfg['mysqluser'], $cfg['mysqlpassword'])) {

            $this->CFG['my_db'] = $cfg['mysqldb'];
            $this->CFG['exitURL'] = '../../../../' . $_SESSION['backup_create_admin_backup_url'];
            $this->CFG['lang'] = $cfg['defaultlang'];
            $this->CFG['my_user'] = $cfg['mysqluser'];
            $this->CFG['my_host'] = $cfg['mysqlhost'];
            $this->CFG['my_pass'] = $cfg['mysqlpassword'];
            $this->CFG['backup_path'] = $_SESSION['backup_patch'];
            $this->CFG['backup_url'] = $_SESSION['backup_url'];
            $auth = 1;
        }
    }
    unset($_SESSION[$ip]['backup_create_admin'],$_SESSION['backup_patch'],$_SESSION['backup_create_admin_backup_url'],$_SESSION['backup_url']);
}

