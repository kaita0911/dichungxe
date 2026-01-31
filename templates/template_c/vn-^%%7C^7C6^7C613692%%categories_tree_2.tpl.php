<?php /* Smarty version 2.6.30, created on 2026-01-29 09:35:07
         compiled from categories_tree_2.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'categories_tree_2.tpl', 1, false),array('modifier', 'count', 'categories_tree_2.tpl', 4, false),)), $this); ?>
<?php $this->assign('level', ((is_array($_tmp=@$this->_tpl_vars['level'])) ? $this->_run_mod_handler('default', true, $_tmp, 1) : smarty_modifier_default($_tmp, 1))); ?>
<ul class="level_<?php echo $this->_tpl_vars['level']; ?>
">
    <?php $_from = $this->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat']):
?>
    <li class="nav-item <?php if (count($this->_tpl_vars['cat']['children']) > 0): ?>has-sub<?php endif; ?>">
        <a class="nav-link" href="<?php echo $this->_tpl_vars['web_base_url']; ?>
/<?php echo $this->_tpl_vars['cat']['unique_key']; ?>
/" title="<?php echo $this->_tpl_vars['cat']['name_detail']; ?>
">
            <?php if ($this->_tpl_vars['cat']['img_vn']): ?><img class="icon-img" src="<?php echo $this->_tpl_vars['web_base_url']; ?>
/<?php echo $this->_tpl_vars['cat']['img_vn']; ?>
" alt="<?php echo $this->_tpl_vars['cat']['name_detail']; ?>
"><?php endif; ?>
            <?php echo $this->_tpl_vars['cat']['name_detail']; ?>

            <?php if (count($this->_tpl_vars['cat']['children']) > 0): ?> <i class="fa-solid fa-angle-right"></i><?php endif; ?>
        </a>
        <?php if (isset ( $this->_tpl_vars['cat']['children'] ) && count($this->_tpl_vars['cat']['children']) > 0): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'categories_tree_2.tpl', 'smarty_include_vars' => array('categories' => $this->_tpl_vars['cat']['children'],'level' => $this->_tpl_vars['level']+1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
    </li>
    <?php endforeach; endif; unset($_from); ?>
</ul>