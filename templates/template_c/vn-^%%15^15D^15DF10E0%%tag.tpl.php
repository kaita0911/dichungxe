<?php /* Smarty version 2.6.30, created on 2025-11-21 21:40:37
         compiled from tag.tpl */ ?>
<?php if ($this->_tpl_vars['tags']): ?>
<div class="tags">
   <?php $_from = $this->_tpl_vars['tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tag']):
?>
   <a href="/tag/<?php echo $this->_tpl_vars['tag']['slug']; ?>
" class="tag-link"><?php echo $this->_tpl_vars['tag']['name']; ?>
</a>
   <?php endforeach; endif; unset($_from); ?>
</div>
<?php endif; ?>