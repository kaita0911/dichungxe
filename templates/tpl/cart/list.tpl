<div class="cart-head">
  <a class="logo" href="{$path_url}" title="{$logoHome.name_vn}">
    <img src="/{$logoHome.img_thumb_vn}" class="img-responsive" alt="{$logoHome.name_vn}">
  </a>
  <div class="cart-head-ttl">Giỏ hàng</div>
</div>
<div class="container">
  {if isset($cart) && $cart|@count > 0}
  <div class="cart-box">
    <div class="cart-box-left cart-bd">
      <label class="cart-select-all cart-select c-input-check">
        <input type="checkbox" class="cart-check-all" id="check-all-cart" {if $all_checked}checked{/if}>
        <span class="checkmark"></span>
        Chọn tất cả
      </label>
      <ul class="cart-items">
        {foreach from=$cart item=item}
        <li class="cart-item" data-key="{$item.key}">
          <label class="cart-checkbox cart-select c-input-check">
            <input type="checkbox" class="cart-check-item" data-key="{$item.key}" {if $item.checked}checked{/if}>
            <span class="checkmark"></span>
          </label>
          <div class="cart-item__img">
            <img class="img-cover" src="/{$item.image}?width=135&height=140&mode=cover" alt="{$item.name}">
          </div>
          <div class="cart-item__meta">
            <div class="cart-item__meta__head">
              <h3><a class="cart-item__ttl hover" href="{$path_url}/{$lang_prefix}{$item.unique_key}">{$item.name}</a></h3>
              <button class="cart-item__del btn-remove-item" data-key="{$item.key}"><i class="fa-solid fa-trash"></i></button>
            </div>
            {if $item.color_name || $item.size_name}
            <div class="cart-item__attribute">
              {if $item.color_name}{$item.color_name}{/if}
              {if $item.color_name && $item.size_name}, {/if}
              {if $item.size_name}{$item.size_name}{/if}
            </div>
            {/if}
            <div class="cart-item__more">
              <div class="c-quantity --view">
                <button class="btn-qty decrease">−</button>
                <input type="number" min="1" value="{$item.quantity}" class="input-qty" data-key="{$item.key}">
                <button class="btn-qty increase">+</button>
              </div>

              <div class="cart-item__price">
                <span class="price-current">{$item.price|number_format:0:',':'.'}₫</span>
                {if $item.priceold}<span class="price-old">{$item.priceold|number_format:0:',':'.'}₫</span>{/if}
              </div>
            </div>
          </div>
        </li>
        {/foreach}
      </ul>
    </div>
    <div class="cart-box-right cart-bd">
      <div class="cart-box__ttl">Chi tiết đơn hàng</div>
      <div class="cart-summary">
        {assign var="total" value=0} {* tổng tiền hiện tại (đã áp giá hiện tại) *}
        {assign var="totalBefore" value=0} {* tổng tiền theo giá cũ (nếu có) *}
        {assign var="totalDiscount" value=0} {* tổng tiền được giảm *}
        {assign var="totalQty" value=0}

        {foreach from=$cart item=item}
        {if $item.checked}

        {* ép về số nguyên hoặc số thực *}
        {assign var="price" value=$item.price|default:0|replace:",":""|replace:"₫":""}
        {assign var="priceold" value=$item.priceold|default:0|replace:",":""|replace:"₫":""}
        {assign var="qty" value=$item.quantity|default:1|intval}

        {* ✅ Nếu không có giá cũ hoặc = 0, dùng giá hiện tại *}
        {if !$priceold || $priceold == 0}
        {assign var="priceold" value=$price}
        {/if}

        {* subtotal theo giá hiện tại *}
        {math equation="x * y" x=$price y=$qty assign="subtotal"}
        {math equation="a + b" a=$total b=$subtotal assign="total"}

        {* subtotal theo giá cũ (nếu có) *}
        {math equation="x * y" x=$priceold y=$qty assign="subtotalOld"}
        {math equation="a + b" a=$totalBefore b=$subtotalOld assign="totalBefore"}

        {* tổng số lượng *}
        {math equation="a + b" a=$totalQty b=$qty assign="totalQty"}

        {* tính phần giảm *}
        {if $priceold > 0 && $priceold > $price}
        {math equation="a - b" a=$priceold b=$price assign="unitDiscount"}
        {math equation="a * b" a=$unitDiscount b=$qty assign="discountSub"}
        {math equation="a + b" a=$totalDiscount b=$discountSub assign="totalDiscount"}
        {/if}
        {/if}
        {/foreach}
        <div class="cart-summary__row">
          <label>Tổng tiền</label>
          <span class="cart-summary-total">{$totalBefore|number_format:0:",":"."}₫</span>
        </div>
        <div class="cart-summary__row">
          <label>Giảm giá</label>
          <span class="cart-summary-sale">{if $totalDiscount > 0}
            {$totalDiscount|number_format:0:",":"."}₫
            {else}
            0₫
            {/if}</span>
        </div>
        <div class="cart-summary__row">
          <label>Số lượng</label>
          <span class="cart-summary-quality">{$totalQty}</span>
        </div>
      </div>
      <div class="cart-pay"><label>Thành tiền</label><strong class="cart-pay-total">{$total|number_format:0:",":"."} ₫</strong></div>
      <div class="cart-save">Tiết kiệm <span class="cart-summary-sale">{$totalDiscount|number_format:0:",":"."}₫</span></div>
      <a href="{$path_url}/order" class="cart-btn">Đặt hàng <i class="fa-solid fa-arrow-right"></i></a>
      <!-- <a href="{$path_url}/cart.php" class="btn btn-secondary">Xem giỏ hàng</a> -->
    </div>
  </div>
  {/if}
  {if isset($cart) && $cart|@count == 0}
  <div class="cart-empty"> <img src="/assets/images/ic_buy.svg" class="img-responsive" alt="{$logoHome.name_vn}"><br>Giỏ hàng hiện đang trống, cùng mua sắm ngay nhé!<br><a class="btn-home" href="/">Mua sắm ngay !</a></div>

  {else}
  <div class="cart-empty" style="display: none;"> <img src="/assets/images/ic_buy.svg" class="img-responsive" alt="{$logoHome.name_vn}"><br>Giỏ hàng hiện đang trống, cùng mua sắm ngay nhé!<br><a class="btn-home" href="/">Mua sắm ngay !</a></div>
  {/if}
</div>