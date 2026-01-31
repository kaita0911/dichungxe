<?php /* Smarty version 2.6.30, created on 2026-01-31 14:32:07
         compiled from products/view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'products/view.tpl', 7, false),)), $this); ?>
<main>
   <div class="container">
      <ul class="breadcumb"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'breadcumb.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></ul>
      <div class="c-filter">
         <h1 class="ttl01 --intro"> <?php echo $this->_tpl_vars['c_ttl']; ?>
</h1>
      </div>
      <?php if (count($this->_tpl_vars['view']) > 0): ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'products/list.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      <?php else: ?>
      <div class="no-product">
         <p>Không có sản phẩm nào trong danh mục này.</p>
      </div>
      <?php endif; ?>
   </div>
</main>