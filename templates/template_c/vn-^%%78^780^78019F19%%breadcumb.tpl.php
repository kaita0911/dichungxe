<?php /* Smarty version 2.6.30, created on 2025-11-21 09:45:43
         compiled from breadcumb.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'breadcumb.tpl', 1, false),)), $this); ?>
<?php if (count($this->_tpl_vars['breadcrumbs']) > 1): ?>
<?php $_from = $this->_tpl_vars['breadcrumbs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
<?php if ($this->_tpl_vars['key']+1 < count($this->_tpl_vars['breadcrumbs'])): ?>
    <li><a href="<?php echo $this->_tpl_vars['item']['link']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a> &raquo;</li>
    <?php else: ?>
    <li><span><?php echo $this->_tpl_vars['item']['name']; ?>
</span></li>
    <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
    <?php endif; ?>