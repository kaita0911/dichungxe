<div class="contentmain">
  <div class="main">
    <div class="left_sidebar padding10">
      {include file="left.tpl"}
    </div>

    <div class="right_content">
      <form id="ArticleForm" name="allsubmit"
        action="index.php?do=articlelist&act={if $smarty.request.act == 'add'}addsm{else}editsm{/if}&comp={$smarty.request.comp}{$page_para}"
        method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="{$articlelist.id}" />
        <div class="divright">
          <div class="acti2">
            <button type="submit" class="add">
              <i class="fa fa-save"></i> Save
            </button>
          </div>
          <div class="acti2">
            <a class="add" href="javascript:history.go(-1)"><i class="fa fa-mail-reply"></i> Trở về</a>
          </div>
        </div>
        <div class="main-content">
          <div class="wrap-main">
            <div class="left100">
              {if $languages|@count > 1}
              <ul class="tab-list">
                {foreach from=$languages item=lang}
                <li class="tab {if $lang.id==$currentLang}active{/if}" data-lang="{$lang.id}">{$lang.name}</li>
                {/foreach}
              </ul>
              {/if}
              {foreach from=$languages item=lang}
              {assign var=detail value=null}
              {foreach from=$articlelistDetail item=ad}
              {if $ad.languageid == $lang.id}
              {assign var=detail value=$ad}
              {/if}
              {/foreach}
              <div class="tab-content {if $lang.id==$currentLang}active{/if}" data-lang="{$lang.id}">
                <div class="item">
                  <div class="title">Tiêu đề</div>
                  <div class="info-title">
                    <input type="text" name="languages[{$lang.id}][name]" data-lang="{$lang.code}"
                      id="title_{$lang.code}" class="InputText title-input" value="{$detail.name|escape:'html':'UTF-8'}"
                      {if $lang.code=='vi' }required{/if} />
                  </div>
                </div>
                <div class="item">
                  <div class="title">URL</div>
                  <div class="info-title">
                    <input type="text" id="slug_{$lang.code}" name="languages[{$lang.id}][unique_key]"
                      data-lang="{$lang.code}" value="{$detail.unique_key}" class="InputText slug-input" />
                  </div>
                </div>
                {if $tinhnang.id == 2}
                <div class="item">
                  <div class="title --cuz">Điểm đón / Định vị </div>

                  <div id="tripList" class="trip-list">

                    {foreach from=$diemdons item=trip name=loop}
                    <div class="trip-item">
                      <button type="button" class="remove-trip btn-del-more">Xoá</button>
                      <div class="flex-lt">
                        <input type="text" class="more-input time" name="trip_time[]" value="{$trip.time}"
                          placeholder="Thời gian">
                        <input type="text" class="more-input" name="trip_title[]" value="{$trip.name|escape}"
                          placeholder="Tiêu đề">
                      </div>

                      <input type="text" class="more-input" name="trip_link[]" value="{$trip.link|escape}"
                        placeholder="Link">
                      <input type="text" class="more-input" name="trip_location[]" value="{$trip.location|escape}"
                        placeholder="Định vị">
                      <input type="text" class="more-input" name="trip_content[]" value="{$trip.content}"
                        placeholder="Nội dung">
                      <!-- <textarea class="trip-editor" name="trip_content[]" rows="3">{$trip.content}</textarea> -->

                    </div>
                    {/foreach}
                  </div>
                  <div id="addTripBtn" class="brn-add-more">+ Add mốc thời gian</div>
                </div>
                <div class="item">
                  <div class="title --cuz">Lịch trình dự kiến </div>
                  <div id="scheduleList" class="trip-list">
                    {foreach from=$lichtrinhtrongngay item=schedule key=k}
                    <div class="schedule-item" data-index="{$k}">
                      <button type="button" class="remove-schedule btn-del-more">Xoá</button>
                      <input type="text" class="more-input" name="schedule_time[]" value="{$schedule.name|escape}"
                        placeholder="Thời gian">
                      <input type="text" class="more-input" name="schedule_content[]" value="{$schedule.content|escape}"
                        placeholder="Nội dung">
                      <div class="extra-content-list">
                        {foreach from=$schedule.extra item=extra}
                        <div class="extra-item">
                          <textarea class="extra-editor" name="schedule_extra_content[{$k}][]"
                            rows="3">{$extra|escape}</textarea>
                          <button type="button" class="remove-extra">X</button>
                        </div>
                        {/foreach}
                      </div>
                      <button type="button" class="add-extra-content">
                        + Thêm nội dung (nếu có)
                      </button>
                    </div>
                    {/foreach}
                  </div>
                  <div id="dayList">
                    {foreach from=$days key=day item=data}

                    <div class="day-item">

                      <div class="day-header">
                        <strong>Ngày {$day}</strong>
                        <button type="button" class="remove-day">Xoá ngày</button>
                      </div>

                      <input type="text" class="more-input" name="day_content[{$day}]"
                        value="{$data.day_content|escape}" placeholder="Nội dung ngày">

                      <div class="schedule-list">

                        {foreach from=$data.items item=row key=i}

                        <div class="schedule-item">

                          <button type="button" class="remove-schedule btn-del-more">Xoá</button>

                          <input type="text" class="more-input" name="schedule_name_more[{$day}][{$i}]"
                            value="{$row.name|escape}" placeholder="Tên">

                          <input type="text" class="more-input" name="schedule_content_more[{$day}][{$i}]"
                            value="{$row.content|escape}" placeholder="Nội dung">

                        </div>

                        {/foreach}

                      </div>

                      <button type="button" class="add-schedule brn-add-more" data-day="{$day}">
                        + Thêm nội dung
                      </button>

                    </div>
                    {/foreach}
                  </div>
                </div>
                <div id="addScheduleBtn" class="brn-add-more">+ Thêm lịch trình (trong ngày)</div>
                <div id="addDayBtn" class="brn-add-more">+ Thêm lịch trình (qua đêm)</div>

                <div class="item">
                  <div class="title">Mô tả cung đường</div>
                  <div class="meta">
                    <textarea id="short_{$lang.id}" name="languages[{$lang.id}][short]">{$detail.short}</textarea>
                  </div>
                </div>
                <!--
                <div class="item">
                  <div class="title --cuz">Thông tin cung đường</div>

                  <div class="trip-item">
                    <input type="text" name="name_cungduong" class="InputText more-input" value="{$cungduong.name}" />
                    <textarea class="trip-editor" id="cungduong" name="cungduong"
                      rows="3">{$cungduong.content}</textarea>
                  </div>

                </div>
-->
                <div class="item">
                  <div class="title --cuz">Các loại vé</div>
                  <div class="trip-item">
                    <input type="text" name="name_haihoa" class="more-input" value='{$haihoa.name}' />
                    <textarea class="trip-editor" id="haihoa" name="haihoa" rows="3">{$haihoa.content}</textarea>
                  </div>
                  <div class="trip-item">
                    <input type="text" name="name_bolac" class="more-input" value='{$bolac.name}' />
                    <textarea class="trip-editor" id="bolac" name="bolac" rows="3">{$bolac.content}</textarea>
                  </div>
                  <div id="ticket-list">
                    {foreach from=$tickets item=ticket}
                    <div class="ticket-item">
                      <button type="button" class="remove-ticket btn-del-more">Xoá</button>
                      <input class="more-input" type="text" name="ticket_name[]" value="{$ticket.name|escape}"
                        placeholder="Tên loại vé">
                      <textarea class="ticket-editor" name="ticket_desc[]">{$ticket.content|escape}</textarea>
                    </div>
                    {/foreach}
                  </div>
                  <div id="add-ticket" class="brn-add-more">
                    + Thêm loại vé
                  </div>
                </div>
                <div class="item">
                  <div class="title --cuz">Cần chuẩn bị</div>
                  <div class="meta">
                    <textarea id="content_{$lang.id}" name="languages[{$lang.id}][content]">{$detail.content}</textarea>
                  </div>
                </div>
                <div class="item">
                  <div class="title --cuz">Lưu ý quan trọng</div>
                  <textarea name="languages[{$lang.id}][luuy]" id="luuy_{$lang.id}">{$detail.luuy}</textarea>
                </div>

                <div class="item">
                  <div class="title">Mô tả nhỏ</div>
                  <div class="meta">
                    <textarea id="shortmore_{$lang.id}"
                      name="languages[{$lang.id}][short_more]">{$detail.short_more}</textarea>
                  </div>
                </div>
                {else}
                {if $tinhnang.short == 1}
                <div class="item">
                  <div class="title">Mô tả ngắn</div>
                  <div class="meta">
                    <textarea id="short_{$lang.id}" name="languages[{$lang.id}][short]">{$detail.short}</textarea>
                  </div>
                </div>
                {/if}
                {if $tinhnang.des == 1}
                <div class="item">
                  <div class="title">Mô tả chi tiết</div>
                  <div class="meta">
                    <textarea id="content_{$lang.id}" name="languages[{$lang.id}][content]">{$detail.content}</textarea>
                  </div>
                </div>
                {/if}
                {/if}
                {if $tinhnang.metatag == 1}
                <div class="item">
                  <div class="title">Meta Keywords</div>
                  <div class="tags-group" data-lang="{$lang.code}">
                    <input type="hidden" name="languages[{$lang.id}][tags]" class="tagsInput" data-lang="{$lang.code}"
                      value="{$detail.tagsJson|escape:'html'}">
                    <div class="tagContainer" data-lang="{$lang.code}">
                      <div class="tagsWrapper" data-lang="{$lang.code}"></div>
                      <input type="text" class="tagInput InputText" data-lang="{$lang.code}" placeholder="Nhập tag...">
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="title">Meta Descriptions</div>
                  <div class="meta">
                    <textarea name="languages[{$lang.id}][des]" class="InputTextarea"
                      id="inputDesc">{$detail.des}</textarea>
                    <span id="showNumDesc" style="color:#ed1b24;">0</span>
                  </div>
                </div>
                {/if}
              </div>
              {/foreach}
              <div class="divright" style="padding: 0;">
                <div class="acti2">
                  <button type="submit" class="add">
                    <i class="fa fa-save"></i> Save
                  </button>
                </div>
                <div class="acti2">
                  <a class="add" href="javascript:history.go(-1)"><i class="fa fa-mail-reply"></i> Trở về</a>
                </div>
              </div>
            </div>
            <div class="right100">

              {if $tinhnang.nhomcon == 1}
              <div class="item">
                <div class="title">Danh mục sản phẩm</div>
                <div class="selectlist tab-mirror">
                  {foreach from=$languages item=lang}
                  <ul class="tab category-tree {if $lang.id==$currentLang}active{/if}" data-lang="{$lang.id}">
                    {foreach from=$categories item=node}
                    {include file="articlelist/category_tree.tpl"
                    node=$node
                    selected=$selected
                    level=0
                    currentLang=$lang.id}
                    {/foreach}
                  </ul>
                  {/foreach}
                </div>
              </div>
              {/if}
              {if $tinhnang.brand == 1}
              <div class="item">
                <div class="title">Thương hiệu</div>
                <div class="selectlist">
                  <ul class="category-tree">
                    {foreach from=$brands item=node}
                    <label> <input type="radio" name="brand_id" value="{$node.id}" {if
                        $node.id==$selectedBrandId}checked{/if}>
                      {$node.detail_name|escape:'html':'UTF-8'}</label>
                    {/foreach}
                  </ul>
                </div>
              </div>
              {/if}
              {if $tinhnang.masp == 1}
              <div class="item">
                <div class="title">Tiêu đề báo</div>
                <div class="info-title">
                  <input type="text" name="code" id="code" class="InputText" value="{$articlelist.code}" />
                </div>
              </div>
              {/if}
              {if $tinhnang.link_out == 1}
              <div class="item">
                <div class="title">Link</div>
                <div class="info-title">
                  <input type="text" name="link_out" id="link_out" class="InputText" value="{$articlelist.link_out}" />
                </div>
              </div>
              <div class="item">
                <div class="title">Video</div>
                <div class="info-title">

                  {if $articlelist.video neq ""}
                  <video width="120" controls style="margin-bottom:10px;">
                    <source src="../{$articlelist.video}" type="video/mp4">
                  </video>
                  {/if}

                  <!-- Upload video -->
                  <label for="video_file" class="custom-upload">
                    <i class="fa fa-upload"></i> Upload video
                  </label>

                  <input type="file" name="video_file" id="video_file" accept="video/mp4,video/mov,video/avi">

                  <!-- Preview video -->
                  <video id="preview-video" width="250" controls style="display:none; margin-top:10px;"></video>

                </div>
              </div>
              {/if}

              {if $tinhnang.hinhanh == 1}
              <div class="item">
                <div class="title">Hình ảnh</div>
                <div class="info-title">
                  {if $articlelist.img_thumb_vn neq ""}
                  <!-- Ảnh cũ -->
                  <img id="current-img" src="/{$articlelist.img_thumb_vn}" height="60"
                    style="display:block; margin-bottom:8px;">
                  {/if}

                  <label for="img_thumb_vn" class="custom-upload">
                    <i class="fa fa-upload"></i> Upload image
                  </label>
                  <!-- Input chọn ảnh -->
                  <input type="file" accept="image/png,image/gif,image/jpeg,image/jpg" name="img_thumb_vn"
                    id="img_thumb_vn" class="img-thumb-input">

                  <!-- Preview ảnh mới -->
                  <p class="previewimg" style="margin-top:8px;">
                    <img id="preview-img" style="max-height:150px; display:none;">
                  </p>
                </div>
              </div>
              {/if}
              {if $tinhnang.nhieuhinh == 1}
              <div class="item">
                <div class="title">Upload multi images</div>
                <div class="gallery-upload">
                  <label for="multiimages" class="custom-upload">
                    <i class="fa fa-upload"></i> Upload multi images
                  </label>
                  <input type="file" name="multiimages[]" id="multiimages"
                    accept="image/png, image/jpeg, image/jpg, image/gif" multiple>
                  <div class="preview-gallery">
                    {foreach from=$multiimages item=img}
                    <div class="gallery-item" data-id="{$img.id}" data-num="{$img.num}">
                      <img src="/{$img.img_vn}" />
                      <div class="overlay">
                        <button type="button" class="remove-image" data-id="{$img.id}">&times;</button>
                      </div>
                      <input type="hidden" name="id_old[]" value="{$img.id}">
                      <input type="hidden" name="num_old[]" value="{$img.num}">
                    </div>
                    {/foreach}
                  </div>
                </div>
                {foreach from=$articlelist_attributes item=attr}
                <div class="color-upload-box">
                  <h4>
                    Ảnh màu {$attr.color_name}
                  </h4>
                  <input type="file" name="images[{$attr.color_code|replace:'#':''}][]"
                    data-color-code="{$attr.color_code}" multiple accept="image/*">
                </div>
                <!-- ảnh đã upload -->
                <div class="preview-gallery">
                  {foreach from=$multiimages item=img}
                  {if $img.color_code == $attr.color_code}
                  <div class="gallery-item" data-id="{$img.id}">
                    <img src="/{$img.img_vn}?width=100&height=100&mode=contain" />
                    <button type="button" class="btn-delete-image remove-image" data-id="{$img.id}">
                      ✖
                    </button>
                  </div>
                  {/if}
                  {/foreach}
                </div>
                {/foreach}
              </div>
              {/if}

              {if $tinhnang.price == 1}
              <div class="item">
                <div class="title">Giá</div>
                <input type="text" name="price" class="InputPrice" value="{$articlelistPrice.price}" />
              </div>
              {/if}

              {if $tinhnang.priceold == 1}
              <div class="item">
                <div class="title">Giá cũ</div>
                <input type="text" name="priceold" class="InputPrice" value="{$articlelistPrice.priceold}" />
              </div>
              {/if}
              {if $tinhnang.link_order == 1}
              <div class="item">
                <div class="title">Link đặt vé</div>
                <input type="text" name="link_order" value="{$articlelist.link_order}" />
              </div>
              <div class="item">
                <div class="title">Link zalo</div>
                <input type="text" name="link_zalo" value="{$articlelist.link_zalo}" />
              </div>
              <div class="item">
                <div class="title">Độ khó</div>
                <input type="text" name="difficulty" value="{$articlelist.difficulty}" />
              </div>
              <div class="item">
                <div class="title">Thời gian</div>
                <input type="text" name="time" value="{$detail.time}" />
              </div>
              {/if}
              {if $tinhnang.mausac == 1}
              <div class="item">
                <div class="title">Danh sách màu</div>
                <div class="selectlist">
                  <ul class="category-tree">
                    {foreach from=$colors item=item}
                    <li><label>
                        <input type="checkbox" name="colorids[]" value="{$item.id}" {if $selected_color|@is_array &&
                          in_array($item.id, $selected_color)}checked="checked" {/if}>
                        {$item.name}
                      </label></li>
                    {/foreach}
                  </ul>
                </div>
              </div>
              {/if}
              {if $tinhnang.kichthuoc == 1}
              <div class="item">
                <div class="title">Danh sách size</div>
                <div class="selectlist">
                  <ul class="category-tree">
                    {foreach from=$sizes item=item}
                    <li><label>
                        <input type="checkbox" name="sizeids[]" value="{$item.id}" {if $selected_size|@is_array &&
                          in_array($item.id, $selected_size)}checked="checked" {/if}>
                        {$item.name}
                      </label></li>
                    {/foreach}
                  </ul>
                </div>
              </div>
              {/if}
              {if $tinhnang.attribute == 1}
              <div class="item">
                <div id="add-product-code">➕ Thêm mã sản phẩm</div>
                <div id="product-code-wrapper">

                  {assign var=productIndex value=0}

                  {foreach from=$product_codes item=pc}
                  {assign var=productIndex value=$productIndex+1}

                  <div class="product-code" data-index="{$productIndex}">
                    <div class="product-handle" draggable="true">⇅</div>
                    <input type="hidden" class="code-sort" name="products[{$productIndex}][sort_order]"
                      value="{$pc.sort_order|default:0}" />

                    <div class="product-code-top">
                      <label>Mã sản phẩm:</label>
                      <input type="text" name="products[{$productIndex}][code]" value="{$pc.code}" />
                      <div class="remove-product" title="Xoá mã sản phẩm">❌</div>
                    </div>
                    <button type="button" class="add-variant">➕ Thêm màu</button>
                    <div class="variant-wrapper">
                      {foreach from=$pc.variants item=v key=k}
                      <div class="variant-item">
                        <div class="variant-handle" draggable="true">⇅</div>
                        <div class="variant-item-flex">
                          <input type="hidden" class="variant-sort"
                            name="products[{$productIndex}][variants][{$k}][sort_order]"
                            value="{$v.sort_order|default:$k}" />
                          <input type="text" name="products[{$productIndex}][variants][{$k}][color_name]"
                            value="{$v.color_name}" placeholder="Tên màu" />
                          <input type="text" class="price-input" name="products[{$productIndex}][variants][{$k}][price]"
                            value="{$v.price|number_format:0:',':'.'}" placeholder="Giá" />
                          <div class="remove-variant">✖ </div>
                        </div>
                        <div class="variant-item-flex">
                          <input type="color" class="color-picker"
                            name="products[{$productIndex}][variants][{$k}][color_code]" value="{$v.color_code}" />

                          <input type="text" class="color-code-text" value="{$v.color_code}" style="width:90px" />
                          <!-- 🔑 LƯU MÀU CŨ -->
                          <input type="hidden" class="old-color"
                            name="products[{$productIndex}][variants][{$k}][old_color]" value="{$v.color_code}" />
                        </div>
                      </div>
                      {/foreach}

                    </div>
                  </div>

                  {/foreach}

                </div>

              </div>
              {/if}
              <div class="item">
                <div class="title">
                  <span>Thứ tự</span>
                  <input type="text" name="num" class="InputNum" value="{$articlelist.num}" />
                </div>
              </div>
              {if $tinhnang.new == 1}
              <div class="item">
                <div class="title">
                  Mới <input type="checkbox" class="CheckBox" name="new" value="new" {if
                    $articlelist.new==1}checked{/if} />
                </div>
              </div>
              {/if}

              {if $tinhnang.hot == 1}
              <div class="item">
                <div class="title">
                  Nổi bật <input type="checkbox" class="CheckBox" name="hot" value="hot" {if
                    $articlelist.hot==1}checked{/if} />
                </div>
              </div>
              {/if}
              {if $tinhnang.mostview == 1}
              <div class="item">
                <div class="title">
                  Xem nhiều<input type="checkbox" class="CheckBox" name="mostview" value="mostview" {if
                    $articlelist.mostview==1}checked{/if} />
                </div>
              </div>
              {/if}
              <div class="item">
                <div class="title">
                  Hiển thị <input type="checkbox" class="CheckBox" name="active" value="acive" {if
                    $articlelist.active==1}checked{/if} />
                </div>
              </div>
            </div>
          </div>
      </form>
    </div>
  </div>
</div>