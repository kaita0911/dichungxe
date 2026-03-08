<?php /* Smarty version 2.6.30, created on 2026-03-08 10:58:39
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
" class="img-cover"
                loading="lazy">
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
          <?php if ($this->_foreach['imgloop']['iteration'] <= 4): ?> <div class="product-gallery-item">
            <img src="<?php echo $this->_tpl_vars['item']['img_vn']; ?>
" title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
" alt="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
" class="img-cover"
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
"
        alt="<?php echo $this->_tpl_vars['detail']['name_detail']; ?>
" class="img-scale" loading="lazy">
    </div>
    <?php endif; ?>
    <div class="product-detail">
      <div class="product-detail-sidebar" id="sidebar">
        <div class="product-detail-sidebar-content">
          <div class="product-detail-price">
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
" title="cộng đồng zalo">Tham gia cộng đồng</a>
          </div>
          <div class="hotline-right">Hotline:<strong><?php echo $this->_tpl_vars['hotline']['phone']; ?>
</strong></div>
        </div>

      </div>
      <div class="product-detail-des" itemprop="articleBody">
        <h1 class="ttl01 --detail" itemprop="headline"><?php echo $this->_tpl_vars['detail']['name']; ?>
</h1>
        <div class="list-pickup">
          <?php if ($this->_tpl_vars['diemdon']): ?>
          <div class="pickup-box">
            <div class="pickup-header">
              ĐIỂM ĐÓN / ĐỊNH VỊ
              <span class="pickup-arrow">▼</span>
            </div>
            <div class="pickup-body">
              <?php $_from = $this->_tpl_vars['diemdon']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
              <div class="pickup-item">
                <div class="pickup-left">
                  <div class="pickup-title">
                    <span class="time"> <?php echo $this->_tpl_vars['item']['time']; ?>
:</span> <?php echo $this->_tpl_vars['item']['name']; ?>

                  </div>
                  <div class="pickup-desc">
                    <?php echo $this->_tpl_vars['item']['content']; ?>

                  </div>
                </div>
                <div class="pickup-right">
                  <a target="_blank" href="<?php echo $this->_tpl_vars['item']['link']; ?>
" class="btn-map">Định vị</a>
                  <?php if ($this->_tpl_vars['item']['location']): ?>
                  <a target="_blank" href="<?php echo $this->_tpl_vars['item']['location']; ?>
" class="btn-map bai">Bãi gửi</a>
                  <?php endif; ?>
                </div>
              </div>
              <?php endforeach; endif; unset($_from); ?>
            </div>
          </div>
          <?php endif; ?>
          <?php if ($this->_tpl_vars['lichtrinhtrongngay']): ?>
          <div class="pickup-box">
            <div class="pickup-header">
              LỊCH TRÌNH DỰ KIẾN
              <span class="pickup-arrow">▼</span>
            </div>
            <div class="pickup-body">
              <?php $_from = $this->_tpl_vars['lichtrinhtrongngay']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
              <div class="schedule-item">
                <span class="time"><?php echo $this->_tpl_vars['item']['name']; ?>
</span>
                <div class="wrap-text">
                  <div class="text"><?php echo $this->_tpl_vars['item']['content']; ?>
</div>
                  <?php if ($this->_tpl_vars['item']['extra']): ?>
                  <div class="schedule-extra">
                    <?php $_from = $this->_tpl_vars['item']['extra']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['extra']):
?>
                    <div class="extra-item">
                      <?php echo $this->_tpl_vars['extra']; ?>

                    </div>
                    <?php endforeach; endif; unset($_from); ?>
                  </div>
                  <?php endif; ?>
                </div>
              </div>

              <?php endforeach; endif; unset($_from); ?>
              <div class="note">
                (Lưu ý: Thời gian trong lịch trình là dự kiến và có thể điều chỉnh linh hoạt tùy điều kiện thực tế và
                sức khỏe của đoàn.)
              </div>
            </div>
          </div>
          <?php endif; ?>
          <?php if ($this->_tpl_vars['days']): ?>
          <div class="pickup-box">
            <div class="pickup-header">
              LỊCH TRÌNH DỰ KIẾN
              <span class="pickup-arrow">▼</span>
            </div>
            <div class="pickup-body">
              <?php $_from = $this->_tpl_vars['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['day'] => $this->_tpl_vars['data']):
?>

              <div class="schedule-day">

                <div class="schedule-day-title">
                  <span><?php echo $this->_tpl_vars['data']['day_content']; ?>
</span>
                </div>

                <?php $_from = $this->_tpl_vars['data']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                <div class="schedule-item">
                  <span class="time"><?php echo $this->_tpl_vars['item']['name']; ?>
</span>
                  <span class="text"><?php echo $this->_tpl_vars['item']['content']; ?>
</span>
                </div>
                <?php endforeach; endif; unset($_from); ?>

              </div>

              <?php endforeach; endif; unset($_from); ?>

              <div class="note">
                (Lưu ý: Thời gian trong lịch trình là dự kiến và có thể điều chỉnh linh hoạt tùy điều kiện thực tế và
                sức khỏe của đoàn.)
              </div>
            </div>
          </div>
          <?php endif; ?>
          <?php if ($this->_tpl_vars['detail']['short']): ?>
          <div class="pickup-box">
            <div class="pickup-header">
              MÔ TẢ CUNG ĐƯỜNG
              <span class="pickup-arrow">▼</span>
            </div>
            <div class="pickup-body">
              <div class="route-item">
                <?php echo $this->_tpl_vars['detail']['short']; ?>

              </div>
            </div>
          </div>
          <?php endif; ?>
          <!-- <?php if ($this->_tpl_vars['cungduong']): ?>
          <div class="pickup-box">
            <div class="pickup-header">
              <?php echo $this->_tpl_vars['cungduong']['name']; ?>

              <span class="pickup-arrow">▼</span>
            </div>
            <div class="pickup-body">
              <div class="route-item">
                <?php echo $this->_tpl_vars['cungduong']['content']; ?>

              </div>
            </div>
          </div>
          <?php endif; ?> -->
          <?php if ($this->_tpl_vars['haihoa']): ?>
          <div class="pickup-box">
            <div class="pickup-header">
              <?php echo $this->_tpl_vars['haihoa']['name']; ?>

              <span class="pickup-arrow">▼</span>
            </div>
            <div class="pickup-body">
              <div class="route-item">
                <?php echo $this->_tpl_vars['haihoa']['content']; ?>

              </div>
            </div>
          </div>
          <?php endif; ?>
          <?php if ($this->_tpl_vars['bolac']): ?>
          <div class="pickup-box">
            <div class="pickup-header">
              <?php echo $this->_tpl_vars['bolac']['name']; ?>

              <span class="pickup-arrow">▼</span>
            </div>
            <div class="pickup-body">
              <div class="route-item">
                <?php echo $this->_tpl_vars['bolac']['content']; ?>

              </div>
            </div>
          </div>
          <?php endif; ?>
          <?php if ($this->_tpl_vars['tickets']): ?>
          <?php $_from = $this->_tpl_vars['tickets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
          <div class="pickup-box">
            <div class="pickup-header">
              <?php echo $this->_tpl_vars['item']['name']; ?>

              <span class="pickup-arrow">▼</span>
            </div>
            <div class="pickup-body">
              <div class="route-item">
                <?php echo $this->_tpl_vars['item']['content']; ?>

              </div>
            </div>
          </div>
          <?php endforeach; endif; unset($_from); ?>
          <?php endif; ?>
          <?php if ($this->_tpl_vars['detail']['content']): ?>
          <div class="pickup-box">
            <div class="pickup-header">
              CẦN CHUẨN BỊ
              <span class="pickup-arrow">▼</span>
            </div>
            <div class="pickup-body">
              <div class="route-item">
                <?php echo $this->_tpl_vars['detail']['content']; ?>

              </div>
            </div>
          </div>
          <?php endif; ?>
          <?php if ($this->_tpl_vars['detail']['luuy']): ?>
          <div class="pickup-box">
            <div class="pickup-header">
              LƯU Ý QUAN TRỌNG
              <span class="pickup-arrow">▼</span>
            </div>
            <div class="pickup-body">
              <div class="route-item">
                <?php echo $this->_tpl_vars['detail']['luuy']; ?>

                <div class="commit">
                  <p class="commit-ttl">Bạn đăng ký chuyến đi đồng nghĩa với việc đồng ý với</p>
                  <?php $_from = $this->_tpl_vars['consulting_detail']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                  <a class="commit-item hover" href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['unique_key']; ?>
.html"
                    title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
">
                    <i class="fa-solid fa-caret-right"></i> <?php echo $this->_tpl_vars['item']['name_detail']; ?>

                  </a> <?php endforeach; endif; unset($_from); ?>
                </div>

              </div>
            </div>
          </div>
          <?php endif; ?>
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
  </div>
</main>