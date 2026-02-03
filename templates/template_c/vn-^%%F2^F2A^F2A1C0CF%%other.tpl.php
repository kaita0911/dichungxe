<?php /* Smarty version 2.6.30, created on 2026-02-02 15:01:41
         compiled from products/other.tpl */ ?>
<?php $_from = $this->_tpl_vars['articles_related']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<div class="product-item">

  <a class="product-item__img" href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['unique_key']; ?>
.html" title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
">
    <div class="img-gall-js">
      <picture>
        <source media="(max-width:767px)" srcset="<?php echo $this->_tpl_vars['item']['img_thumb_vn']; ?>
?width=712&height=400&mode=cover">
        <img src="<?php echo $this->_tpl_vars['item']['img_thumb_vn']; ?>
?width=700&height=1000&mode=cover"
          alt="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
"
          class="img-cover"
          loading="lazy">
      </picture>
      <?php $_from = $this->_tpl_vars['item']['gallery']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['img']):
?>

      <picture>
        <source media="(max-width:767px)" srcset="<?php echo $this->_tpl_vars['img']; ?>
?width=712&height=400&mode=cover">
        <img src="<?php echo $this->_tpl_vars['img']; ?>
?width=700&height=1000&mode=cover"
          alt="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
"
          class="img-cover"
          loading="lazy">
      </picture>
      <?php endforeach; endif; unset($_from); ?>
    </div>
    <div class="product-item__ct">
      <span class="ic-w level"><?php echo $this->_tpl_vars['item']['difficulty']; ?>
</span>
      <span class="ic-w rate">4.9</span>
      <span class="ic-w time"><?php echo $this->_tpl_vars['item']['time']; ?>
</span>
    </div>
    <div class="product-price">
      <span class="price-current"><?php echo $this->_tpl_vars['item']['price_formatted']; ?>
</span>
      <?php if ($this->_tpl_vars['item']['priceold'] > 0): ?>
      <span class="price-old"><?php echo $this->_tpl_vars['item']['priceold_formatted']; ?>
</span>
      <?php endif; ?> /Vé
    </div>
  </a>
  <h3><a class="product-item__ttl hover" href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['unique_key']; ?>
.html" title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
"><?php echo $this->_tpl_vars['item']['name_detail']; ?>
</a></h3>
  <div class="product-item__more">
    <?php echo $this->_tpl_vars['item']['short_more']; ?>

  </div>
</div>
<?php endforeach; endif; unset($_from); ?>

<div id="viewpage" class="pagination"> <?php echo $this->_tpl_vars['pagination']; ?>
</div>