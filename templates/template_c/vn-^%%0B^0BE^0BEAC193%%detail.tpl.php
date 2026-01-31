<?php /* Smarty version 2.6.30, created on 2026-01-31 15:49:39
         compiled from consulting/detail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'consulting/detail.tpl', 11, false),)), $this); ?>
<main>
   <div class="container">
      <ul class="breadcumb"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'breadcumb.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></ul>
      <!-- Main content -->
      <div class="artseed-body">
         <h1 class="ttl01" itemprop="headline"><?php echo $this->_tpl_vars['detail']['name']; ?>
</h1>
         <div class="artseed-detail" itemprop="articleBody">
            <?php echo $this->_tpl_vars['detail']['content']; ?>

         </div>
      </div>
      <!-- <?php if (count($this->_tpl_vars['articles_related']) > 0): ?>
      <div class="related-articles">
         <h2 class="ttl02">Tin liên quan</h2>
         <ul class="related-consulting">
            <?php $_from = $this->_tpl_vars['articles_related']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <li>
               <a class="hover" href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['unique_key']; ?>
.html" title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
">
                  <h3><?php echo $this->_tpl_vars['item']['name_detail']; ?>
</h3>
               </a>
            </li>
            <?php endforeach; endif; unset($_from); ?>
         </ul>
      </div>
      <?php endif; ?> -->
      <!-- /.artseed-ftn-body -->
   </div>
</main>