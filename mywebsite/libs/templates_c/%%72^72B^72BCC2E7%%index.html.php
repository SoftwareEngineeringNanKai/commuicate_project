<?php /* Smarty version 2.6.28, created on 2015-03-08 07:26:52
         compiled from 06/index.html */ ?>
<html>
<head>
<title><?php echo $this->_tpl_vars['title']; ?>
</title>
</head>
<body>
<?php $_from = $this->_tpl_vars['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
<?php echo $this->_tpl_vars['key']; ?>
=><?php echo $this->_tpl_vars['item']; ?>
<br>
<?php endforeach; endif; unset($_from); ?>
</body>
</html>