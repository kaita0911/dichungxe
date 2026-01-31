<div class="cart-head">
  <a class="logo" href="{$path_url}" title="{$logoHome.name_vn}">
    <img src="/{$logoHome.img_thumb_vn}" class="img-responsive" alt="{$logoHome.name_vn}">
  </a>
  <div class="cart-head-ttl">
    <div class="container">
      <div class="cart-head-ttl-inner">
        <a class="cart-prev" href="{$path_url}/cart" title="Xác nhận đặt hàng"><i class="fa-solid fa-arrow-left"></i></a>
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
                  <input type="radio" id="c-home" name="shipped" value="Giao tận nơi" checked>
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
                {foreach from=$thanhpho item=tp}
                <option value="{$tp.matp}">{$tp.name}</option>
                {/foreach}
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
            {foreach from=$cart item=item}
            {if isset($item.checked) && $item.checked}
            <li class="cart-item" data-key="{$item.key}">
              <div class="cart-item__img">
                <img class="img-cover" src="/{$item.image}?width=135&height=140&mode=cover" alt="{$item.name}">
              </div>
              <div class="cart-item__meta">
                <div class="cart-item__meta__head">
                  <h3><span class="cart-item__ttl">{$item.name}</span></h3>
                </div>
                {if $item.color_name || $item.size_name}
                <div class="cart-item__attribute">
                  {if $item.color_name}{$item.color_name}{/if}
                  {if $item.color_name && $item.size_name}, {/if}
                  {if $item.size_name}{$item.size_name}{/if}
                </div>
                {/if}
                <div class="cart-item__more">
                  <div class="cart-item__quality">X{$item.quantity}</div>
                  <div class="cart-item__price">
                    <span class="price-current">{$item.price|number_format:0:',':'.'}₫</span>
                    {if $item.priceold}<span class="price-old">{$item.priceold|number_format:0:',':'.'}₫</span>{/if}
                  </div>
                </div>
              </div>
            </li>
            {/if}
            {/foreach}
          </ul>
        </div>
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
        <button type="submit" class="cart-btn">Đặt hàng <i class="fa-solid fa-arrow-right"></i></button>
      </div>
    </div>
  </form>
</div>
<div id="c-loading">
  <div id="orderLoading"><img src="{$path_url}/assets/images/loading.svg"></div>
</div>