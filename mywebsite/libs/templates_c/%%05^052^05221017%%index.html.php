<?php /* Smarty version 2.6.28, created on 2015-03-08 07:17:32
         compiled from 05/index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', '05/index.html', 7, false),array('modifier', 'nl2br', '05/index.html', 7, false),)), $this); ?>
<html>
<head>
<title><?php echo $this->_tpl_vars['title']; ?>
</title>
</head>
<body>
str is <?php echo $this->_tpl_vars['str']; ?>
 </br>
str is <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['str'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</br>
</body>
</html>