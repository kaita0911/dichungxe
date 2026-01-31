<?php /* Smarty version 2.6.30, created on 2026-01-08 10:03:34
         compiled from about/list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'about/list.tpl', 4, false),)), $this); ?>
<div class="f-about">
    <?php $_from = $this->_tpl_vars['view']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
    <div class="artseed-detail">
        <!-- <div class="date"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['dated'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</div> -->
        <?php echo $this->_tpl_vars['item']['content']; ?>

    </div>
    <?php endforeach; endif; unset($_from); ?>
</div>
<div id="viewpage" class="pagination"> <?php echo $this->_tpl_vars['pagination']; ?>
</div>