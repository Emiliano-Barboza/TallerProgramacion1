<?php

include_once '../config/configuracion.php';
include_once("../config/config_SMARTY.php");

$smarty = new Smarty();

$smarty->template_dir = TEMPLATE_DIR;
$smarty->compile_dir = COMPILER_DIR;
$smarty->config_dir = CONFIG_DIR;
$smarty->cache_dir = CACHE_DIR;

if(isset($_GET['error'])) {
    $smarty->assign('error', $_GET['error']);
}

$smarty->assign('pageTitle', 'Página de inicio');
$smarty->display('login.tpl');
