<?php /* Smarty version 2.6.30, created on 2026-01-31 14:21:35
         compiled from articles/list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'articles/list.tpl', 8, false),)), $this); ?>
<div class="f-articles">
   <?php $_from = $this->_tpl_vars['view']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
   <div class="articles">
      <a class="articles__img" href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['unique_key']; ?>
.html" title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
">
         <img src="/<?php echo $this->_tpl_vars['item']['img_thumb_vn']; ?>
?width=600&height=400&mode=cover" alt="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
" title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
" class="img-cover">
      </a>
      <h3><a class="articles__ttl" href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['unique_key']; ?>
.html" title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
"><?php echo $this->_tpl_vars['item']['name_detail']; ?>
</a></h3>
      <div class="articles__date"><i class="fa-solid fa-calendar"></i> <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['dated'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</div>
      <div class="articles__des">
         <?php echo $this->_tpl_vars['item']['short_detail']; ?>

      </div>
      <a href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['unique_key']; ?>
.html" class="viewmore" title="xem thêm">Xem thêm</a>
   </div>
   <?php endforeach; endif; unset($_from); ?>
</div>
<div id="viewpage" class="pagination"> <?php echo $this->_tpl_vars['pagination']; ?>
</div>