<?php /* Smarty version 2.6.28, created on 2015-03-07 14:18:26
         compiled from 04/index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', '04/index.html', 1, false),)), $this); ?>
<?php echo smarty_function_config_load(array('file' => "04.conf"), $this);?>

<html>
<head>
<title><?php echo $this->_tpl_vars['title']; ?>
</title>
</head>
<body>
Title is <?php echo $this->_config[0]['vars']['title']; ?>

Name is <?php echo $this->_config[0]['vars']['name']; ?>

</body>
</html>