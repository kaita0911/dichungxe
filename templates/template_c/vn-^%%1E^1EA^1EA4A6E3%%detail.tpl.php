<?php /* Smarty version 2.6.30, created on 2025-12-26 11:31:55
         compiled from about/detail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'about/detail.tpl', 9, false),array('function', 'math', 'about/detail.tpl', 14, false),)), $this); ?>
<main>
   <div class="container">
      <div class="breadcumb"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'breadcumb.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
      <!-- Main content -->
      <div class="artseed-body">

         <h1 class="ttl01" itemprop="headline"><?php echo $this->_tpl_vars['detail']['name']; ?>
</h1>
         <div class="artseed-detail" itemprop="articleBody">
            <!-- <?php if (count($this->_tpl_vars['toc']) > 0): ?>
            <div class="detail-toc">
               <div class="detail-toc__ttl">Mục lục bài viết</div>
               <ul class="toc-content">
                  <?php $_from = $this->_tpl_vars['toc']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                  <li style="margin-left:<?php echo smarty_function_math(array('equation' => " (x - 2) * 20",'x' => $this->_tpl_vars['item']['level']), $this);?>
px;">
                     <a href="#<?php echo $this->_tpl_vars['item']['id']; ?>
" class="hover">
                        <?php echo $this->_tpl_vars['item']['title']; ?>

                     </a>
                  </li>
                  <?php endforeach; endif; unset($_from); ?>
               </ul>
            </div>
            <?php endif; ?> -->
            <?php echo $this->_tpl_vars['content']; ?>

         </div>
         <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'tag.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
         <?php if (count($this->_tpl_vars['articles_related']) > 0): ?>
         <div class="related-articles">
            <h2 class="ttl02">Tin liên quan</h2>
            <div class="related-articles__lst">
               <?php $_from = $this->_tpl_vars['articles_related']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
               <a class="related-item" href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['unique_key']; ?>
.html" title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
">
                  <img src="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['item']['img_thumb_vn']; ?>
" alt="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
" class="related-item__img">
                  <h3 class="related-item__ttl hover"><?php echo $this->_tpl_vars['item']['name_detail']; ?>
</h3>
               </a>
               <?php endforeach; endif; unset($_from); ?>
            </div>
         </div>
         <?php endif; ?>
         <!-- /.artseed-ftn-body -->
      </div>
   </div>
</main>