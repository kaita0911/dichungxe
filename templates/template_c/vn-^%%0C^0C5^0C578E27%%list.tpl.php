<?php /* Smarty version 2.6.30, created on 2025-11-29 16:24:03
         compiled from service/list.tpl */ ?>
<div class="f-services">
   <?php $_from = $this->_tpl_vars['view']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
   <a class="f-services__item" href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['unique_key']; ?>
" title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
">
      <img src="<?php echo $this->_tpl_vars['item']['img_thumb_vn']; ?>
?width=400&height=300&mode=cover" title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
" alt="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
" class="img-cover" loading="lazy">
      <h3 class="f-services__item__ttl"><?php echo $this->_tpl_vars['item']['name_detail']; ?>
</h3>
   </a>
   <?php endforeach; endif; unset($_from); ?>
</div>
<div id="viewpage" class="pagination"> <?php echo $this->_tpl_vars['pagination']; ?>
</div>