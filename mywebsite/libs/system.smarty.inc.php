<?php
define('BASE_PATH',$_SERVER['DOCUMENT_ROOT']);
define('SMARTY_PATH','/SmartyDemo/libs/');
require BASE_PATH.SMARTY_PATH.'Smarty.class.php';
class SmartyProject extends Smarty{
	function SmartyProject(){
		$this->template_dir = BASE_PATH.SMARTY_PATH.'templates/';
        $this->compile_dir = BASE_PATH.SMARTY_PATH.'templates_c/';
        $this->config_dir = BASE_PATH.SMARTY_PATH.'configs/';
        $this->cache_dir = BASE_PATH.SMARTY_PATH.'cache/';
	}
}
?>