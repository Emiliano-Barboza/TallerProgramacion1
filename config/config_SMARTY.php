<?php
require_once('../libs/Smarty.class.php');

define('TEMPLATE_DIR', $_SERVER['DOCUMENT_ROOT'].'/driverAcademy/templates/');
define('COMPILER_DIR', $_SERVER['DOCUMENT_ROOT'].'/driverAcademy/tmp/templates_c/');
define('CONFIG_DIR', $_SERVER['DOCUMENT_ROOT'].'/driverAcademy/tmp/configs/');
define('CACHE_DIR', $_SERVER['DOCUMENT_ROOT'].'/driverAcademy/tmp/cache/');

function getSmarty() {
    $smarty = new Smarty();
    $smarty->template_dir = TEMPLATE_DIR;
    $smarty->compile_dir = COMPILER_DIR;
    $smarty->config_dir = CONFIG_DIR;
    $smarty->cache_dir = CACHE_DIR;
    
    return $smarty;
}

?>