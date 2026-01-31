<?php /* Smarty version 2.6.30, created on 2026-02-01 06:26:13
         compiled from products/detail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'products/detail.tpl', 6, false),)), $this); ?>
<main>
  <div class="container">
    <ul class="breadcumb"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'breadcumb.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></ul>
    <!-- Main content -->
    <div class="artseed-body">
      <?php if (count($this->_tpl_vars['product_images']) > 0): ?>
      <div class="product-gallery">
        <div class="product-gallery-left">
          <div class="product-gallery-js">
            <?php $_from = $this->_tpl_vars['product_images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['item']):
?>
            <a class="image-main" data-fancybox="gallery" href="<?php echo $this->_tpl_vars['item']['img_vn']; ?>
">
              <img src="<?php echo $this->_tpl_vars['item']['img_vn']; ?>
" title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
" alt="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
" class="img-cover" loading="lazy">
            </a>
            <?php endforeach; endif; unset($_from); ?>
          </div>
          <div class="slick-counter"></div>
        </div>
        <div class="product-gallery-right">
          <?php $_from = $this->_tpl_vars['product_images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['imgloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['imgloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['imgloop']['iteration']++;
?>
          <?php if ($this->_foreach['imgloop']['iteration'] <= 4): ?>
            <div class="product-gallery-item">
            <img src="<?php echo $this->_tpl_vars['item']['img_vn']; ?>
"
              title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
"
              alt="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
"
              class="img-cover"
              loading="lazy">
        </div>
        <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
      </div>
    </div>
    <?php else: ?>
    <div class="image-detail">
      <img src="/<?php echo $this->_tpl_vars['detail']['img_thumb_vn']; ?>
?width=400&height=400&mode=scale" title="<?php echo $this->_tpl_vars['detail']['name_detail']; ?>
" alt="<?php echo $this->_tpl_vars['detail']['name_detail']; ?>
" class="img-scale" loading="lazy">
    </div>
    <?php endif; ?>
    <div class="product-detail">
      <div class="artseed-detail product-detail-des" itemprop="articleBody">
        <h1 class="ttl01 --detail" itemprop="headline"><?php echo $this->_tpl_vars['detail']['name']; ?>
</h1>
        <div class="product-detail__short ">
          <?php echo $this->_tpl_vars['detail']['short']; ?>

        </div>

        <div class="product-detail__des">
          <?php echo $this->_tpl_vars['content']; ?>

        </div>
      </div>
      <div class="product-detail-sidebar" id="sidebar">
        <div class="product-detail-sidebar-content">
          <div class="product-detail-price">
            <label>Giá: </label>
            <?php if ($this->_tpl_vars['detail']['price'] > 0): ?>
            <span class="price-current"><?php echo $this->_tpl_vars['detail']['price_formatted']; ?>
 ₫</span>
            <?php else: ?>
            <span class="price-current">Liên hệ</span>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['detail']['priceold'] > 0): ?>
            <span class="price-old"><?php echo $this->_tpl_vars['detail']['priceold_formatted']; ?>
 ₫</span>
            <?php endif; ?>
          </div>
          <div class="product-detail-order">
            <a class="tlink ticket" href="<?php echo $this->_tpl_vars['detail']['link_order']; ?>
" title="đặt vé">Đặt vé</a>
            <a class="tlink zalo" href="<?php echo $this->_tpl_vars['detail']['link_zalo']; ?>
" title="cộng đồng zalo">Cộng đồng zalo</a>
          </div>
          <div class="hotline-right">Hotline:<strong><?php echo $this->_tpl_vars['hotline']['phone']; ?>
</strong> (ĐI CHUNG XE)</div>
        </div>

      </div>
    </div>
  </div>

  <?php if (count($this->_tpl_vars['articles_related']) > 0): ?>
  <div class="related-articles">
    <h2 class="ttl02">Tham khảo các chuyến đi khác</h2>
    <div class="p-products">
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'products/other.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
  </div>
  <?php endif; ?>


  <!-- /.artseed-ftn-body -->
  </div>
</main>