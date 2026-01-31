<?php /* Smarty version 2.6.30, created on 2026-01-31 14:30:58
         compiled from recruiment/view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'recruiment/view.tpl', 5, false),)), $this); ?>
<main>
   <div class="container">
      <div class="breadcumb"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'breadcumb.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
      <h1 class="ttl01 --intro"><?php echo $this->_tpl_vars['c_ttl']; ?>
</h1>
      <?php if (count($this->_tpl_vars['view']) > 0): ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'about/list.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      <?php else: ?>
      <div class="no-articles">
         <p>Không có sản phẩm nào trong danh mục này.</p>
      </div>
      <?php endif; ?>
   </div>
</main>