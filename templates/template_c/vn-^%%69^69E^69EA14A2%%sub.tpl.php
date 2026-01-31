<?php /* Smarty version 2.6.30, created on 2026-01-08 09:47:35
         compiled from articles/sub.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'articles/sub.tpl', 8, false),)), $this); ?>
<main>
   <div class="container">
      <div class="breadcumb"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'breadcumb.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
      <h1 class="ttl01"> <?php echo $this->_tpl_vars['c_ttl']; ?>
</h1>
      <?php if ($this->_tpl_vars['cateInfo']['content']): ?>
      <div class="cate-description"><?php echo $this->_tpl_vars['cateInfo']['content']; ?>
</div>
      <?php endif; ?>
      <?php if (count($this->_tpl_vars['view']) > 0): ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'articles/list.tpl', 'smarty_include_vars' => array()));
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