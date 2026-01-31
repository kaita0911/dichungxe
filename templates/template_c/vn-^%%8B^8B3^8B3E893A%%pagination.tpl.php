<?php /* Smarty version 2.6.30, created on 2025-12-27 16:38:10
         compiled from search/pagination.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'search/pagination.tpl', 9, false),)), $this); ?>
<?php if ($this->_tpl_vars['total_pages'] > 1): ?>
<ul class="pagination" id="viewpage-search">
    <?php $this->assign('prev_page', $this->_tpl_vars['current_page']-1); ?>
    <?php $this->assign('next_page', $this->_tpl_vars['current_page']+1); ?>

        <?php if ($this->_tpl_vars['current_page'] > 1): ?>
    <li>
        <a href="/tim-kiem/<?php echo ((is_array($_tmp=$this->_tpl_vars['keyword'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/page/<?php echo $this->_tpl_vars['prev_page']; ?>
">«</a>
    </li>
    <?php endif; ?>

        <?php unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['start'] = (int)1;
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['total_pages']+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['p']['show'] = true;
$this->_sections['p']['max'] = $this->_sections['p']['loop'];
$this->_sections['p']['step'] = 1;
if ($this->_sections['p']['start'] < 0)
    $this->_sections['p']['start'] = max($this->_sections['p']['step'] > 0 ? 0 : -1, $this->_sections['p']['loop'] + $this->_sections['p']['start']);
else
    $this->_sections['p']['start'] = min($this->_sections['p']['start'], $this->_sections['p']['step'] > 0 ? $this->_sections['p']['loop'] : $this->_sections['p']['loop']-1);
if ($this->_sections['p']['show']) {
    $this->_sections['p']['total'] = min(ceil(($this->_sections['p']['step'] > 0 ? $this->_sections['p']['loop'] - $this->_sections['p']['start'] : $this->_sections['p']['start']+1)/abs($this->_sections['p']['step'])), $this->_sections['p']['max']);
    if ($this->_sections['p']['total'] == 0)
        $this->_sections['p']['show'] = false;
} else
    $this->_sections['p']['total'] = 0;
if ($this->_sections['p']['show']):

            for ($this->_sections['p']['index'] = $this->_sections['p']['start'], $this->_sections['p']['iteration'] = 1;
                 $this->_sections['p']['iteration'] <= $this->_sections['p']['total'];
                 $this->_sections['p']['index'] += $this->_sections['p']['step'], $this->_sections['p']['iteration']++):
$this->_sections['p']['rownum'] = $this->_sections['p']['iteration'];
$this->_sections['p']['index_prev'] = $this->_sections['p']['index'] - $this->_sections['p']['step'];
$this->_sections['p']['index_next'] = $this->_sections['p']['index'] + $this->_sections['p']['step'];
$this->_sections['p']['first']      = ($this->_sections['p']['iteration'] == 1);
$this->_sections['p']['last']       = ($this->_sections['p']['iteration'] == $this->_sections['p']['total']);
?>
    <?php $this->assign('page', $this->_sections['p']['index']); ?>
    <?php if ($this->_tpl_vars['page'] == $this->_tpl_vars['current_page']): ?>
    <li class="active"><span><?php echo $this->_tpl_vars['page']; ?>
</span></li>
    <?php else: ?>
    <li>
        <a href="/tim-kiem/<?php echo ((is_array($_tmp=$this->_tpl_vars['keyword'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/page/<?php echo $this->_tpl_vars['page']; ?>
"><?php echo $this->_tpl_vars['page']; ?>
</a>
    </li>
    <?php endif; ?>
    <?php endfor; endif; ?>

        <?php if ($this->_tpl_vars['current_page'] < $this->_tpl_vars['total_pages']): ?>
        <li>
        <a href="/tim-kiem/<?php echo ((is_array($_tmp=$this->_tpl_vars['keyword'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/page/<?php echo $this->_tpl_vars['next_page']; ?>
">»</a>
        </li>
        <?php endif; ?>
</ul>
<?php endif; ?>