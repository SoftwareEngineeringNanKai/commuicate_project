<?php
require("./Model/DatabaseManager.class.php");
require_once "./Model/Model.php";
require_once "./Model/Manager.php";
require_once "./Model/AbcModelManager.php";
require_once "./Model/AbcModel.php";
define('BASE_PATH',$_SERVER['DOCUMENT_ROOT']);
define('SMARTY_PATH','/SmartyDemo/libs/');
require(BASE_PATH.SMARTY_PATH.'system.inc.php');

$manager = new AbcModelManager();
$data = $manager->getlist();

$smarty->assign('title','Happier Programmers');
$smarty->assign('array',$data);
$smarty->display('database/index.html');
?>





