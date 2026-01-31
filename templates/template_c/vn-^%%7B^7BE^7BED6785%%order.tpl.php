<?php /* Smarty version 2.6.30, created on 2026-01-06 08:45:30
         compiled from cart/order.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'cart/order.tpl', 92, false),array('modifier', 'default', 'cart/order.tpl', 115, false),array('modifier', 'replace', 'cart/order.tpl', 115, false),array('modifier', 'intval', 'cart/order.tpl', 117, false),array('function', 'math', 'cart/order.tpl', 125, false),)), $this); ?>
<div class="cart-head">
  <a class="logo" href="<?php echo $this->_tpl_vars['path_url']; ?>
" title="<?php echo $this->_tpl_vars['logoHome']['name_vn']; ?>
">
    <img src="/<?php echo $this->_tpl_vars['logoHome']['img_thumb_vn']; ?>
" class="img-responsive" alt="<?php echo $this->_tpl_vars['logoHome']['name_vn']; ?>
">
  </a>
  <div class="cart-head-ttl">
    <div class="container">
      <div class="cart-head-ttl-inner">
        <a class="cart-prev" href="<?php echo $this->_tpl_vars['path_url']; ?>
/cart" title="Xác nhận đặt hàng"><i class="fa-solid fa-arrow-left"></i></a>
        Xác nhận đặt hàng
      </div>
    </div>
  </div>
</div>
<div class="container">
  <form name="formOrder" id="formOrder" class="form-contact" method="post">
    <div class="cart-box">
      <div class="cart-box-left --flex">
        <div class="cart-bd cart-pay">
          <div class="cart-pay-ttl"><i class="fa-solid fa-user"></i> Thông tin người nhận</div>
          <div class="input-group">
            <input type="text" class="form-control" id="names" name="names" placeholder="Họ tên" required />
          </div>
          <div class="input-group">
            <input type="text" class="form-control" id="phones" name="phones" placeholder="Điện thoại" required />
          </div>
          <div class="input-group">
            <input type="text" class="form-control" id="email" name="email" placeholder="Email (Không bắt buộc)" />
          </div>
        </div>
        <div class="cart-bd cart-pay">
          <div class="cart-box-info">
            <div class="cart-pay-ttl"><i class="fa-solid fa-bag-shopping"></i> Hình thức nhận hàng</div>
            <div class="box-choosed">
              <div class="box-choosed__rd">
                <label for="c-home" class="c-input-check --radio">
                  <input type="radio" id="c-home" name="shipped" value="home" checked>
                  <span class="checkmark"></span>Giao tận nơi</label>
              </div>
              <div class="box-choosed__rd">
                <label for="c-shop" class="c-input-check --radio">
                  <input type="radio" id="c-shop" name="shipped" value="Nhận tại cửa hàng">
                  <span class="checkmark"></span>Nhận tại cửa hàng</label>
              </div>
            </div>
            <div class="input-group">
              <input type="text" class="form-control" id="addresss" name="addresss" placeholder="Địa chỉ" required />
            </div>
            <div class="input-address">
              <select id="city" name="city" required>
                <option value="">Tỉnh/TP</option>
                <?php $_from = $this->_tpl_vars['thanhpho']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tp']):
?>
                <option value="<?php echo $this->_tpl_vars['tp']['matp']; ?>
"><?php echo $this->_tpl_vars['tp']['name']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
              </select>

              <select id="district" name="district" required>
                <option value="">Quận/Huyện</option>
              </select>

              <select id="wards" name="wards" required>
                <option value="">Phường/Xã</option>
              </select>
            </div>
            <div class="input-group">
              <textarea name="content" placeholder="Ghi chú"></textarea>
            </div>
          </div>
        </div>
        <div class="cart-bd cart-pay">
          <div class="cart-pay-ttl"><i class="fa-solid fa-cart-shopping"></i> Chi tiết đơn hàng</div>
          <ul class="cart-items">
            <?php $_from = $this->_tpl_vars['cart']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <?php if (isset ( $this->_tpl_vars['item']['checked'] ) && $this->_tpl_vars['item']['checked']): ?>
            <li class="cart-item" data-key="<?php echo $this->_tpl_vars['item']['key']; ?>
">
              <div class="cart-item__img">
                <img class="img-cover" src="/<?php echo $this->_tpl_vars['item']['image']; ?>
?width=135&height=140&mode=cover" alt="<?php echo $this->_tpl_vars['item']['name']; ?>
">
              </div>
              <div class="cart-item__meta">
                <div class="cart-item__meta__head">
                  <h3><span class="cart-item__ttl"><?php echo $this->_tpl_vars['item']['name']; ?>
</span></h3>
                </div>
                <?php if ($this->_tpl_vars['item']['color_name'] || $this->_tpl_vars['item']['size_name']): ?>
                <div class="cart-item__attribute">
                  <?php if ($this->_tpl_vars['item']['color_name']): ?><?php echo $this->_tpl_vars['item']['color_name']; ?>
<?php endif; ?>
                  <?php if ($this->_tpl_vars['item']['color_name'] && $this->_tpl_vars['item']['size_name']): ?>, <?php endif; ?>
                  <?php if ($this->_tpl_vars['item']['size_name']): ?><?php echo $this->_tpl_vars['item']['size_name']; ?>
<?php endif; ?>
                </div>
                <?php endif; ?>
                <div class="cart-item__more">
                  <div class="cart-item__quality">X<?php echo $this->_tpl_vars['item']['quantity']; ?>
</div>
                  <div class="cart-item__price">
                    <span class="price-current"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['price'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ',', '.') : number_format($_tmp, 0, ',', '.')); ?>
₫</span>
                    <?php if ($this->_tpl_vars['item']['priceold']): ?><span class="price-old"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['priceold'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ',', '.') : number_format($_tmp, 0, ',', '.')); ?>
₫</span><?php endif; ?>
                  </div>
                </div>
              </div>
            </li>
            <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
          </ul>
        </div>
      </div>
      <div class="cart-box-right cart-bd">
        <div class="cart-box__ttl">Chi tiết đơn hàng</div>
        <div class="cart-summary">
          <?php $this->assign('total', 0); ?>           <?php $this->assign('totalBefore', 0); ?>           <?php $this->assign('totalDiscount', 0); ?>           <?php $this->assign('totalQty', 0); ?>

          <?php $_from = $this->_tpl_vars['cart']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
          <?php if ($this->_tpl_vars['item']['checked']): ?>

                    <?php $this->assign('price', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['item']['price'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)))) ? $this->_run_mod_handler('replace', true, $_tmp, ",", "") : smarty_modifier_replace($_tmp, ",", "")))) ? $this->_run_mod_handler('replace', true, $_tmp, "₫", "") : smarty_modifier_replace($_tmp, "₫", ""))); ?>
          <?php $this->assign('priceold', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['item']['priceold'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)))) ? $this->_run_mod_handler('replace', true, $_tmp, ",", "") : smarty_modifier_replace($_tmp, ",", "")))) ? $this->_run_mod_handler('replace', true, $_tmp, "₫", "") : smarty_modifier_replace($_tmp, "₫", ""))); ?>
          <?php $this->assign('qty', ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['item']['quantity'])) ? $this->_run_mod_handler('default', true, $_tmp, 1) : smarty_modifier_default($_tmp, 1)))) ? $this->_run_mod_handler('intval', true, $_tmp) : intval($_tmp))); ?>

                    <?php if (! $this->_tpl_vars['priceold'] || $this->_tpl_vars['priceold'] == 0): ?>
          <?php $this->assign('priceold', $this->_tpl_vars['price']); ?>
          <?php endif; ?>

                    <?php echo smarty_function_math(array('equation' => "x * y",'x' => $this->_tpl_vars['price'],'y' => $this->_tpl_vars['qty'],'assign' => 'subtotal'), $this);?>

          <?php echo smarty_function_math(array('equation' => "a + b",'a' => $this->_tpl_vars['total'],'b' => $this->_tpl_vars['subtotal'],'assign' => 'total'), $this);?>


                    <?php echo smarty_function_math(array('equation' => "x * y",'x' => $this->_tpl_vars['priceold'],'y' => $this->_tpl_vars['qty'],'assign' => 'subtotalOld'), $this);?>

          <?php echo smarty_function_math(array('equation' => "a + b",'a' => $this->_tpl_vars['totalBefore'],'b' => $this->_tpl_vars['subtotalOld'],'assign' => 'totalBefore'), $this);?>


                    <?php echo smarty_function_math(array('equation' => "a + b",'a' => $this->_tpl_vars['totalQty'],'b' => $this->_tpl_vars['qty'],'assign' => 'totalQty'), $this);?>


                    <?php if ($this->_tpl_vars['priceold'] > 0 && $this->_tpl_vars['priceold'] > $this->_tpl_vars['price']): ?>
          <?php echo smarty_function_math(array('equation' => "a - b",'a' => $this->_tpl_vars['priceold'],'b' => $this->_tpl_vars['price'],'assign' => 'unitDiscount'), $this);?>

          <?php echo smarty_function_math(array('equation' => "a * b",'a' => $this->_tpl_vars['unitDiscount'],'b' => $this->_tpl_vars['qty'],'assign' => 'discountSub'), $this);?>

          <?php echo smarty_function_math(array('equation' => "a + b",'a' => $this->_tpl_vars['totalDiscount'],'b' => $this->_tpl_vars['discountSub'],'assign' => 'totalDiscount'), $this);?>

          <?php endif; ?>
          <?php endif; ?>
          <?php endforeach; endif; unset($_from); ?>
          <div class="cart-summary__row">
            <label>Tổng tiền</label>
            <span class="cart-summary-total"><?php echo ((is_array($_tmp=$this->_tpl_vars['totalBefore'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ",", ".") : number_format($_tmp, 0, ",", ".")); ?>
₫</span>
          </div>
          <div class="cart-summary__row">
            <label>Giảm giá</label>
            <span class="cart-summary-sale"><?php if ($this->_tpl_vars['totalDiscount'] > 0): ?>
              <?php echo ((is_array($_tmp=$this->_tpl_vars['totalDiscount'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ",", ".") : number_format($_tmp, 0, ",", ".")); ?>
₫
              <?php else: ?>
              0₫
              <?php endif; ?></span>
          </div>
          <div class="cart-summary__row">
            <label>Số lượng</label>
            <span class="cart-summary-quality"><?php echo $this->_tpl_vars['totalQty']; ?>
</span>
          </div>
        </div>
        <div class="cart-pay"><label>Thành tiền</label><strong class="cart-pay-total"><?php echo ((is_array($_tmp=$this->_tpl_vars['total'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ",", ".") : number_format($_tmp, 0, ",", ".")); ?>
 ₫</strong></div>
        <div class="cart-save">Tiết kiệm <span class="cart-summary-sale"><?php echo ((is_array($_tmp=$this->_tpl_vars['totalDiscount'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ",", ".") : number_format($_tmp, 0, ",", ".")); ?>
₫</span></div>
        <button type="submit" class="cart-btn">Đặt hàng <i class="fa-solid fa-arrow-right"></i></button>
      </div>
    </div>
  </form>
</div>
<div id="c-loading">
  <div id="orderLoading"><img src="<?php echo $this->_tpl_vars['path_url']; ?>
/assets/images/loading.svg"></div>
</div>