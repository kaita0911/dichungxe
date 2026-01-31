<?php /* Smarty version 2.6.30, created on 2025-12-28 06:56:20
         compiled from search/list.tpl */ ?>
<?php if ($this->_tpl_vars['CheckNull'] == 0): ?>
<div class="nodate">Không tìm thấy kết quả</div>
<?php else: ?>
<?php $_from = $this->_tpl_vars['view']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<div class="products-item">
    <!-- <a href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['unique_key']; ?>
" title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
">
        <img src="/<?php echo $this->_tpl_vars['item']['img_thumb_vn']; ?>
" alt="<?php echo $this->_tpl_vars['item']['name']; ?>
" class="img-responsive">
    </a> -->
    <img src="/<?php echo $this->_tpl_vars['item']['img_thumb_vn']; ?>
" alt="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
" class="img-responsive">
    <h3><?php echo $this->_tpl_vars['item']['name_detail']; ?>
</h3>

</div>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>