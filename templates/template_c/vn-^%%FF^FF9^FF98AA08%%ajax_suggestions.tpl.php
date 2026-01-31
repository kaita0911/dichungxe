<?php /* Smarty version 2.6.30, created on 2025-12-04 14:43:17
         compiled from search/ajax_suggestions.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'search/ajax_suggestions.tpl', 1, false),)), $this); ?>
<?php if (count($this->_tpl_vars['suggestions']) > 0): ?>
<?php $_from = $this->_tpl_vars['suggestions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<a class="suggest-item" href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['unique_key']; ?>
.html" title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
">
    <div class="suggest-item__img"><img src="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['item']['img_thumb_vn']; ?>
" alt="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
" class="img-responsive"></div>
    <div class="suggest-item__meta">
        <h3 class="suggest-item__meta__ttl hover"><?php echo $this->_tpl_vars['item']['name_detail']; ?>
</h3>
    </div>
</a>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>