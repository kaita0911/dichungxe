<?php /* Smarty version 2.6.30, created on 2026-01-07 09:25:40
         compiled from cart/list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'cart/list.tpl', 8, false),array('modifier', 'number_format', 'cart/list.tpl', 46, false),array('modifier', 'default', 'cart/list.tpl', 67, false),array('modifier', 'replace', 'cart/list.tpl', 67, false),array('modifier', 'intval', 'cart/list.tpl', 69, false),array('function', 'math', 'cart/list.tpl', 77, false),)), $this); ?>
<div class="cart-head">
  <a class="logo" href="<?php echo $this->_tpl_vars['path_url']; ?>
" title="<?php echo $this->_tpl_vars['logoHome']['name_vn']; ?>
">
    <img src="/<?php echo $this->_tpl_vars['logoHome']['img_thumb_vn']; ?>
" class="img-responsive" alt="<?php echo $this->_tpl_vars['logoHome']['name_vn']; ?>
">
  </a>
  <div class="cart-head-ttl">Giỏ hàng</div>
</div>
<div class="container">
  <?php if (isset ( $this->_tpl_vars['cart'] ) && count($this->_tpl_vars['cart']) > 0): ?>
  <div class="cart-box">
    <div class="cart-box-left cart-bd">
      <label class="cart-select-all cart-select c-input-check">
        <input type="checkbox" class="cart-check-all" id="check-all-cart" <?php if ($this->_tpl_vars['all_checked']): ?>checked<?php endif; ?>>
        <span class="checkmark"></span>
        Chọn tất cả
      </label>
      <ul class="cart-items">
        <?php $_from = $this->_tpl_vars['cart']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
        <li class="cart-item" data-key="<?php echo $this->_tpl_vars['item']['key']; ?>
">
          <label class="cart-checkbox cart-select c-input-check">
            <input type="checkbox" class="cart-check-item" data-key="<?php echo $this->_tpl_vars['item']['key']; ?>
" <?php if ($this->_tpl_vars['item']['checked']): ?>checked<?php endif; ?>>
            <span class="checkmark"></span>
          </label>
          <div class="cart-item__img">
            <img class="img-cover" src="/<?php echo $this->_tpl_vars['item']['image']; ?>
?width=135&height=140&mode=cover" alt="<?php echo $this->_tpl_vars['item']['name']; ?>
">
          </div>
          <div class="cart-item__meta">
            <div class="cart-item__meta__head">
              <h3><a class="cart-item__ttl hover" href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['unique_key']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a></h3>
              <button class="cart-item__del btn-remove-item" data-key="<?php echo $this->_tpl_vars['item']['key']; ?>
"><i class="fa-solid fa-trash"></i></button>
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
              <div class="c-quantity --view">
                <button class="btn-qty decrease">−</button>
                <input type="number" min="1" value="<?php echo $this->_tpl_vars['item']['quantity']; ?>
" class="input-qty" data-key="<?php echo $this->_tpl_vars['item']['key']; ?>
">
                <button class="btn-qty increase">+</button>
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
        <?php endforeach; endif; unset($_from); ?>
      </ul>
    </div>
    <div class="cart-box-right cart-bd">
      <div class="cart-box__ttl">Chi tiết đơn hàng</div>
      <div class="cart-summary">
        <?php $this->assign('total', 0); ?>         <?php $this->assign('totalBefore', 0); ?>         <?php $this->assign('totalDiscount', 0); ?>         <?php $this->assign('totalQty', 0); ?>

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
      <a href="<?php echo $this->_tpl_vars['path_url']; ?>
/order" class="cart-btn">Đặt hàng <i class="fa-solid fa-arrow-right"></i></a>
      <!-- <a href="<?php echo $this->_tpl_vars['path_url']; ?>
/cart.php" class="btn btn-secondary">Xem giỏ hàng</a> -->
    </div>
  </div>
  <?php endif; ?>
  <?php if (isset ( $this->_tpl_vars['cart'] ) && count($this->_tpl_vars['cart']) == 0): ?>
  <div class="cart-empty"> <img src="/assets/images/ic_buy.svg" class="img-responsive" alt="<?php echo $this->_tpl_vars['logoHome']['name_vn']; ?>
"><br>Giỏ hàng hiện đang trống, cùng mua sắm ngay nhé!<br><a class="btn-home" href="/">Mua sắm ngay !</a></div>

  <?php else: ?>
  <div class="cart-empty" style="display: none;"> <img src="/assets/images/ic_buy.svg" class="img-responsive" alt="<?php echo $this->_tpl_vars['logoHome']['name_vn']; ?>
"><br>Giỏ hàng hiện đang trống, cùng mua sắm ngay nhé!<br><a class="btn-home" href="/">Mua sắm ngay !</a></div>
  <?php endif; ?>
</div>