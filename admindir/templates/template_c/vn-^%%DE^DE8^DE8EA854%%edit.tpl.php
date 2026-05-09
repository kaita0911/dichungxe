<?php /* Smarty version 2.6.30, created on 2026-05-09 10:08:10
         compiled from articlelist/edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'articlelist/edit.tpl', 25, false),array('modifier', 'escape', 'articlelist/edit.tpl', 44, false),array('modifier', 'default', 'articlelist/edit.tpl', 102, false),array('modifier', 'replace', 'articlelist/edit.tpl', 436, false),array('modifier', 'is_array', 'articlelist/edit.tpl', 494, false),array('modifier', 'number_format', 'articlelist/edit.tpl', 551, false),)), $this); ?>
<div class="contentmain">
  <div class="main">
    <div class="left_sidebar padding10">
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "left.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>

    <div class="right_content">
      <form id="ArticleForm" name="allsubmit"
        action="index.php?do=articlelist&act=<?php if ($_REQUEST['act'] == 'add'): ?>addsm<?php else: ?>editsm<?php endif; ?>&comp=<?php echo $_REQUEST['comp']; ?>
<?php echo $this->_tpl_vars['page_para']; ?>
"
        method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?php echo $this->_tpl_vars['articlelist']['id']; ?>
" />
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
              <?php if (count($this->_tpl_vars['languages']) > 1): ?>
              <ul class="tab-list">
                <?php $_from = $this->_tpl_vars['languages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lang']):
?>
                <li class="tab <?php if ($this->_tpl_vars['lang']['id'] == $this->_tpl_vars['currentLang']): ?>active<?php endif; ?>" data-lang="<?php echo $this->_tpl_vars['lang']['id']; ?>
"><?php echo $this->_tpl_vars['lang']['name']; ?>
</li>
                <?php endforeach; endif; unset($_from); ?>
              </ul>
              <?php endif; ?>
              <?php $_from = $this->_tpl_vars['languages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lang']):
?>
              <?php $this->assign('detail', null); ?>
              <?php $_from = $this->_tpl_vars['articlelistDetail']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ad']):
?>
              <?php if ($this->_tpl_vars['ad']['languageid'] == $this->_tpl_vars['lang']['id']): ?>
              <?php $this->assign('detail', $this->_tpl_vars['ad']); ?>
              <?php endif; ?>
              <?php endforeach; endif; unset($_from); ?>
              <div class="tab-content <?php if ($this->_tpl_vars['lang']['id'] == $this->_tpl_vars['currentLang']): ?>active<?php endif; ?>" data-lang="<?php echo $this->_tpl_vars['lang']['id']; ?>
">
                <div class="item">
                  <div class="title">Tiêu đề</div>
                  <div class="info-title">
                    <input type="text" name="languages[<?php echo $this->_tpl_vars['lang']['id']; ?>
][name]" data-lang="<?php echo $this->_tpl_vars['lang']['code']; ?>
"
                      id="title_<?php echo $this->_tpl_vars['lang']['code']; ?>
" class="InputText title-input" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['detail']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html', 'UTF-8') : smarty_modifier_escape($_tmp, 'html', 'UTF-8')); ?>
"
                      <?php if ($this->_tpl_vars['lang']['code'] == 'vi'): ?>required<?php endif; ?> />
                  </div>
                </div>
                <div class="item">
                  <div class="title">URL</div>
                  <div class="info-title">
                    <input type="text" id="slug_<?php echo $this->_tpl_vars['lang']['code']; ?>
" name="languages[<?php echo $this->_tpl_vars['lang']['id']; ?>
][unique_key]"
                      data-lang="<?php echo $this->_tpl_vars['lang']['code']; ?>
" value="<?php echo $this->_tpl_vars['detail']['unique_key']; ?>
" class="InputText slug-input" />
                  </div>
                </div>
                <?php if ($this->_tpl_vars['tinhnang']['id'] == 2): ?>
                <div class="item">
                  <div class="title --cuz">Điểm đón / Định vị </div>

                  <div id="tripList" class="trip-list">

                    <?php $_from = $this->_tpl_vars['diemdons']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['trip']):
        $this->_foreach['loop']['iteration']++;
?>
                    <div class="trip-item">
                      <button type="button" class="remove-trip btn-del-more">Xoá</button>
                      <div class="flex-lt">
                        <input type="text" class="more-input time" name="trip_time[]" value="<?php echo $this->_tpl_vars['trip']['time']; ?>
"
                          placeholder="Thời gian">
                        <input type="text" class="more-input" name="trip_title[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['trip']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"
                          placeholder="Tiêu đề">
                      </div>

                      <input type="text" class="more-input" name="trip_link[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['trip']['link'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"
                        placeholder="Link">
                      <input type="text" class="more-input" name="trip_location[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['trip']['location'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"
                        placeholder="Định vị">
                      <input type="text" class="more-input" name="trip_content[]" value="<?php echo $this->_tpl_vars['trip']['content']; ?>
"
                        placeholder="Nội dung">
                      <!-- <textarea class="trip-editor" name="trip_content[]" rows="3"><?php echo $this->_tpl_vars['trip']['content']; ?>
</textarea> -->

                    </div>
                    <?php endforeach; endif; unset($_from); ?>
                  </div>
                  <div id="addTripBtn" class="brn-add-more">+ Add mốc thời gian</div>
                </div>
                <div class="item">
                  <div class="title --cuz">Lịch trình dự kiến </div>
                  <div id="scheduleList" class="trip-list">
                    <?php $_from = $this->_tpl_vars['lichtrinhtrongngay']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['schedule']):
?>

                    <div class="schedule-item">

                      <div class="schedule-top">
                        <span class="drag-handle">↕</span>

                        <button type="button" class="remove-schedule btn-del-more">
                          Xoá
                        </button>
                      </div>

                      <input type="hidden" class="schedule-id" name="schedule_id[]" value="<?php echo $this->_tpl_vars['schedule']['id']; ?>
">

                      <input type="hidden" name="schedule_sort[]" class="schedule-sort"
                        value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['schedule']['sort_order'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['k']+1) : smarty_modifier_default($_tmp, @$this->_tpl_vars['k']+1)); ?>
">

                      <input type="text" class="more-input" name="schedule_time[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['schedule']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"
                        placeholder="Thời gian">

                      <input type="text" class="more-input" name="schedule_content[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['schedule']['content'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"
                        placeholder="Nội dung">

                      <div class="extra-content-list">

                        <?php $_from = $this->_tpl_vars['schedule']['extra']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ek'] => $this->_tpl_vars['extra']):
?>

                        <?php $this->assign('editorId', "extra_editor_".($this->_tpl_vars['schedule']['id'])."_".($this->_tpl_vars['ek'])); ?>

                        <div class="extra-item">

                          <textarea id="<?php echo $this->_tpl_vars['editorId']; ?>
" class="extra-editor" name="schedule_extra_content[<?php echo $this->_tpl_vars['k']; ?>
][]"
                            rows="3"><?php echo ((is_array($_tmp=$this->_tpl_vars['extra'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>

                          <button type="button" class="remove-extra">
                            X
                          </button>

                        </div>

                        <?php endforeach; endif; unset($_from); ?>

                      </div>

                      <button type="button" class="add-extra-content">
                        + Thêm nội dung (nếu có)
                      </button>

                    </div>

                    <?php endforeach; endif; unset($_from); ?>
                  </div>
                  <div id="dayList">

                    <?php $_from = $this->_tpl_vars['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['day'] => $this->_tpl_vars['data']):
?>

                    <div class="day-item">

                      <div class="day-header">
                        <strong>Ngày <?php echo $this->_tpl_vars['day']; ?>
</strong>

                        <button type="button" class="remove-day btn-del-more">
                          Xoá ngày
                        </button>
                      </div>

                      <input type="text" class="more-input" name="day_content[<?php echo $this->_tpl_vars['day']; ?>
]"
                        value="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['day_content'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" placeholder="Nội dung ngày">

                      <div class="schedule-list">

                        <?php $_from = $this->_tpl_vars['data']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['row']):
?>

                        <div class="schedule-item">

                          <div class="schedule-top">

                            <span class="drag-handle">↕</span>

                            <button type="button" class="remove-schedule-more btn-del-more">
                              Xoá
                            </button>

                          </div>

                          <input type="hidden" class="schedule-sort-more" name="schedule_sort_more[<?php echo $this->_tpl_vars['day']; ?>
][]"
                            value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['row']['sort_order'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['i']+1) : smarty_modifier_default($_tmp, @$this->_tpl_vars['i']+1)); ?>
">

                          <input type="text" class="more-input" name="schedule_name_more[<?php echo $this->_tpl_vars['day']; ?>
][]"
                            value="<?php echo ((is_array($_tmp=$this->_tpl_vars['row']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" placeholder="Tên">

                          <input type="text" class="more-input" name="schedule_content_more[<?php echo $this->_tpl_vars['day']; ?>
][]"
                            value="<?php echo ((is_array($_tmp=$this->_tpl_vars['row']['content'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" placeholder="Nội dung">

                        </div>

                        <?php endforeach; endif; unset($_from); ?>

                      </div>

                      <button type="button" class="add-schedule brn-add-more" data-day="<?php echo $this->_tpl_vars['day']; ?>
">
                        + Thêm nội dung
                      </button>

                    </div>

                    <?php endforeach; endif; unset($_from); ?>

                  </div>
                </div>
                <div id="addScheduleBtn" class="brn-add-more">+ Thêm lịch trình (trong ngày)</div>
                <div id="addDayBtn" class="brn-add-more">+ Thêm lịch trình (qua đêm)</div>

                <div class="item">
                  <div class="title">Mô tả cung đường</div>
                  <div class="meta">
                    <textarea id="short_<?php echo $this->_tpl_vars['lang']['id']; ?>
" name="languages[<?php echo $this->_tpl_vars['lang']['id']; ?>
][short]"><?php echo $this->_tpl_vars['detail']['short']; ?>
</textarea>
                  </div>
                </div>
                <!--
                <div class="item">
                  <div class="title --cuz">Thông tin cung đường</div>

                  <div class="trip-item">
                    <input type="text" name="name_cungduong" class="InputText more-input" value="<?php echo $this->_tpl_vars['cungduong']['name']; ?>
" />
                    <textarea class="trip-editor" id="cungduong" name="cungduong"
                      rows="3"><?php echo $this->_tpl_vars['cungduong']['content']; ?>
</textarea>
                  </div>

                </div>
-->
                <div class="item">
                  <div class="title --cuz">Các loại vé</div>
                  <div class="trip-item">
                    <input type="text" name="name_haihoa" class="more-input" value='<?php echo $this->_tpl_vars['haihoa']['name']; ?>
' />
                    <textarea class="trip-editor" id="haihoa" name="haihoa" rows="3"><?php echo $this->_tpl_vars['haihoa']['content']; ?>
</textarea>
                  </div>
                  <div class="trip-item">
                    <input type="text" name="name_bolac" class="more-input" value='<?php echo $this->_tpl_vars['bolac']['name']; ?>
' />
                    <textarea class="trip-editor" id="bolac" name="bolac" rows="3"><?php echo $this->_tpl_vars['bolac']['content']; ?>
</textarea>
                  </div>
                  <div id="ticket-list">
                    <?php $_from = $this->_tpl_vars['tickets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ticket']):
?>
                    <div class="ticket-item">
                      <button type="button" class="remove-ticket btn-del-more">Xoá</button>
                      <input class="more-input" type="text" name="ticket_name[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['ticket']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"
                        placeholder="Tên loại vé">
                      <textarea class="ticket-editor" name="ticket_desc[]"><?php echo ((is_array($_tmp=$this->_tpl_vars['ticket']['content'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
                    </div>
                    <?php endforeach; endif; unset($_from); ?>
                  </div>
                  <div id="add-ticket" class="brn-add-more">
                    + Thêm loại vé
                  </div>
                </div>
                <div class="item">
                  <div class="title --cuz">Cần chuẩn bị</div>
                  <div class="meta">
                    <textarea id="content_<?php echo $this->_tpl_vars['lang']['id']; ?>
" name="languages[<?php echo $this->_tpl_vars['lang']['id']; ?>
][content]"><?php echo $this->_tpl_vars['detail']['content']; ?>
</textarea>
                  </div>
                </div>
                <div class="item">
                  <div class="title --cuz">Lưu ý quan trọng</div>
                  <textarea name="languages[<?php echo $this->_tpl_vars['lang']['id']; ?>
][luuy]" id="luuy_<?php echo $this->_tpl_vars['lang']['id']; ?>
"><?php echo $this->_tpl_vars['detail']['luuy']; ?>
</textarea>
                </div>

                <div class="item">
                  <div class="title">Mô tả nhỏ</div>
                  <div class="meta">
                    <textarea id="shortmore_<?php echo $this->_tpl_vars['lang']['id']; ?>
"
                      name="languages[<?php echo $this->_tpl_vars['lang']['id']; ?>
][short_more]"><?php echo $this->_tpl_vars['detail']['short_more']; ?>
</textarea>
                  </div>
                </div>
                <?php else: ?>
                <?php if ($this->_tpl_vars['tinhnang']['short'] == 1): ?>
                <div class="item">
                  <div class="title">Mô tả ngắn</div>
                  <div class="meta">
                    <textarea id="short_<?php echo $this->_tpl_vars['lang']['id']; ?>
" name="languages[<?php echo $this->_tpl_vars['lang']['id']; ?>
][short]"><?php echo $this->_tpl_vars['detail']['short']; ?>
</textarea>
                  </div>
                </div>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['tinhnang']['des'] == 1): ?>
                <div class="item">
                  <div class="title">Mô tả chi tiết</div>
                  <div class="meta">
                    <textarea id="content_<?php echo $this->_tpl_vars['lang']['id']; ?>
" name="languages[<?php echo $this->_tpl_vars['lang']['id']; ?>
][content]"><?php echo $this->_tpl_vars['detail']['content']; ?>
</textarea>
                  </div>
                </div>
                <?php endif; ?>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['tinhnang']['metatag'] == 1): ?>
                <div class="item">
                  <div class="title">Meta Keywords</div>
                  <div class="tags-group" data-lang="<?php echo $this->_tpl_vars['lang']['code']; ?>
">
                    <input type="hidden" name="languages[<?php echo $this->_tpl_vars['lang']['id']; ?>
][tags]" class="tagsInput" data-lang="<?php echo $this->_tpl_vars['lang']['code']; ?>
"
                      value="<?php echo ((is_array($_tmp=$this->_tpl_vars['detail']['tagsJson'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
">
                    <div class="tagContainer" data-lang="<?php echo $this->_tpl_vars['lang']['code']; ?>
">
                      <div class="tagsWrapper" data-lang="<?php echo $this->_tpl_vars['lang']['code']; ?>
"></div>
                      <input type="text" class="tagInput InputText" data-lang="<?php echo $this->_tpl_vars['lang']['code']; ?>
" placeholder="Nhập tag...">
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="title">Meta Descriptions</div>
                  <div class="meta">
                    <textarea name="languages[<?php echo $this->_tpl_vars['lang']['id']; ?>
][des]" class="InputTextarea"
                      id="inputDesc"><?php echo $this->_tpl_vars['detail']['des']; ?>
</textarea>
                    <span id="showNumDesc" style="color:#ed1b24;">0</span>
                  </div>
                </div>
                <?php endif; ?>
              </div>
              <?php endforeach; endif; unset($_from); ?>
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

              <?php if ($this->_tpl_vars['tinhnang']['nhomcon'] == 1): ?>
              <div class="item">
                <div class="title">Danh mục sản phẩm</div>
                <div class="selectlist tab-mirror">
                  <?php $_from = $this->_tpl_vars['languages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lang']):
?>
                  <ul class="tab category-tree <?php if ($this->_tpl_vars['lang']['id'] == $this->_tpl_vars['currentLang']): ?>active<?php endif; ?>" data-lang="<?php echo $this->_tpl_vars['lang']['id']; ?>
">
                    <?php $_from = $this->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['node']):
?>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "articlelist/category_tree.tpl", 'smarty_include_vars' => array('node' => $this->_tpl_vars['node'],'selected' => $this->_tpl_vars['selected'],'level' => 0,'currentLang' => $this->_tpl_vars['lang']['id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    <?php endforeach; endif; unset($_from); ?>
                  </ul>
                  <?php endforeach; endif; unset($_from); ?>
                </div>
              </div>
              <?php endif; ?>
              <?php if ($this->_tpl_vars['tinhnang']['brand'] == 1): ?>
              <div class="item">
                <div class="title">Thương hiệu</div>
                <div class="selectlist">
                  <ul class="category-tree">
                    <?php $_from = $this->_tpl_vars['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['node']):
?>
                    <label> <input type="radio" name="brand_id" value="<?php echo $this->_tpl_vars['node']['id']; ?>
" <?php if ($this->_tpl_vars['node']['id'] == $this->_tpl_vars['selectedBrandId']): ?>checked<?php endif; ?>>
                      <?php echo ((is_array($_tmp=$this->_tpl_vars['node']['detail_name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html', 'UTF-8') : smarty_modifier_escape($_tmp, 'html', 'UTF-8')); ?>
</label>
                    <?php endforeach; endif; unset($_from); ?>
                  </ul>
                </div>
              </div>
              <?php endif; ?>
              <?php if ($this->_tpl_vars['tinhnang']['masp'] == 1): ?>
              <div class="item">
                <div class="title">Tiêu đề báo</div>
                <div class="info-title">
                  <input type="text" name="code" id="code" class="InputText" value="<?php echo $this->_tpl_vars['articlelist']['code']; ?>
" />
                </div>
              </div>
              <?php endif; ?>
              <?php if ($this->_tpl_vars['tinhnang']['link_out'] == 1): ?>
              <div class="item">
                <div class="title">Link</div>
                <div class="info-title">
                  <input type="text" name="link_out" id="link_out" class="InputText" value="<?php echo $this->_tpl_vars['articlelist']['link_out']; ?>
" />
                </div>
              </div>
              <div class="item">
                <div class="title">Video</div>
                <div class="info-title">

                  <?php if ($this->_tpl_vars['articlelist']['video'] != ""): ?>
                  <video width="120" controls style="margin-bottom:10px;">
                    <source src="../<?php echo $this->_tpl_vars['articlelist']['video']; ?>
" type="video/mp4">
                  </video>
                  <?php endif; ?>

                  <!-- Upload video -->
                  <label for="video_file" class="custom-upload">
                    <i class="fa fa-upload"></i> Upload video
                  </label>

                  <input type="file" name="video_file" id="video_file" accept="video/mp4,video/mov,video/avi">

                  <!-- Preview video -->
                  <video id="preview-video" width="250" controls style="display:none; margin-top:10px;"></video>

                </div>
              </div>
              <?php endif; ?>

              <?php if ($this->_tpl_vars['tinhnang']['hinhanh'] == 1): ?>
              <div class="item">
                <div class="title">Hình ảnh</div>
                <div class="info-title">
                  <?php if ($this->_tpl_vars['articlelist']['img_thumb_vn'] != ""): ?>
                  <!-- Ảnh cũ -->
                  <img id="current-img" src="/<?php echo $this->_tpl_vars['articlelist']['img_thumb_vn']; ?>
" height="60"
                    style="display:block; margin-bottom:8px;">
                  <?php endif; ?>

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
              <?php endif; ?>
              <?php if ($this->_tpl_vars['tinhnang']['nhieuhinh'] == 1): ?>
              <div class="item">
                <div class="title">Upload multi images</div>
                <div class="gallery-upload">
                  <label for="multiimages" class="custom-upload">
                    <i class="fa fa-upload"></i> Upload multi images
                  </label>
                  <input type="file" name="multiimages[]" id="multiimages"
                    accept="image/png, image/jpeg, image/jpg, image/gif" multiple>
                  <div class="preview-gallery">
                    <?php $_from = $this->_tpl_vars['multiimages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['img']):
?>
                    <div class="gallery-item" data-id="<?php echo $this->_tpl_vars['img']['id']; ?>
" data-num="<?php echo $this->_tpl_vars['img']['num']; ?>
">
                      <img src="/<?php echo $this->_tpl_vars['img']['img_vn']; ?>
" />
                      <div class="overlay">
                        <button type="button" class="remove-image" data-id="<?php echo $this->_tpl_vars['img']['id']; ?>
">&times;</button>
                      </div>
                      <input type="hidden" name="id_old[]" value="<?php echo $this->_tpl_vars['img']['id']; ?>
">
                      <input type="hidden" name="num_old[]" value="<?php echo $this->_tpl_vars['img']['num']; ?>
">
                    </div>
                    <?php endforeach; endif; unset($_from); ?>
                  </div>
                </div>
                <?php $_from = $this->_tpl_vars['articlelist_attributes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['attr']):
?>
                <div class="color-upload-box">
                  <h4>
                    Ảnh màu <?php echo $this->_tpl_vars['attr']['color_name']; ?>

                  </h4>
                  <input type="file" name="images[<?php echo ((is_array($_tmp=$this->_tpl_vars['attr']['color_code'])) ? $this->_run_mod_handler('replace', true, $_tmp, '#', '') : smarty_modifier_replace($_tmp, '#', '')); ?>
][]"
                    data-color-code="<?php echo $this->_tpl_vars['attr']['color_code']; ?>
" multiple accept="image/*">
                </div>
                <!-- ảnh đã upload -->
                <div class="preview-gallery">
                  <?php $_from = $this->_tpl_vars['multiimages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['img']):
?>
                  <?php if ($this->_tpl_vars['img']['color_code'] == $this->_tpl_vars['attr']['color_code']): ?>
                  <div class="gallery-item" data-id="<?php echo $this->_tpl_vars['img']['id']; ?>
">
                    <img src="/<?php echo $this->_tpl_vars['img']['img_vn']; ?>
?width=100&height=100&mode=contain" />
                    <button type="button" class="btn-delete-image remove-image" data-id="<?php echo $this->_tpl_vars['img']['id']; ?>
">
                      ✖
                    </button>
                  </div>
                  <?php endif; ?>
                  <?php endforeach; endif; unset($_from); ?>
                </div>
                <?php endforeach; endif; unset($_from); ?>
              </div>
              <?php endif; ?>

              <?php if ($this->_tpl_vars['tinhnang']['price'] == 1): ?>
              <div class="item">
                <div class="title">Giá</div>
                <input type="text" name="price" class="InputPrice" value="<?php echo $this->_tpl_vars['articlelistPrice']['price']; ?>
" />
              </div>
              <?php endif; ?>

              <?php if ($this->_tpl_vars['tinhnang']['priceold'] == 1): ?>
              <div class="item">
                <div class="title">Giá cũ</div>
                <input type="text" name="priceold" class="InputPrice" value="<?php echo $this->_tpl_vars['articlelistPrice']['priceold']; ?>
" />
              </div>
              <?php endif; ?>
              <?php if ($this->_tpl_vars['tinhnang']['link_order'] == 1): ?>
              <div class="item">
                <div class="title">Link đặt vé</div>
                <input type="text" name="link_order" value="<?php echo $this->_tpl_vars['articlelist']['link_order']; ?>
" />
              </div>
              <div class="item">
                <div class="title">Link zalo</div>
                <input type="text" name="link_zalo" value="<?php echo $this->_tpl_vars['articlelist']['link_zalo']; ?>
" />
              </div>
              <div class="item">
                <div class="title">Độ khó</div>
                <input type="text" name="difficulty" value="<?php echo $this->_tpl_vars['articlelist']['difficulty']; ?>
" />
              </div>
              <div class="item">
                <div class="title">Thời gian</div>
                <input type="text" name="time" value="<?php echo $this->_tpl_vars['detail']['time']; ?>
" />
              </div>
              <?php endif; ?>
              <?php if ($this->_tpl_vars['tinhnang']['mausac'] == 1): ?>
              <div class="item">
                <div class="title">Danh sách màu</div>
                <div class="selectlist">
                  <ul class="category-tree">
                    <?php $_from = $this->_tpl_vars['colors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                    <li><label>
                        <input type="checkbox" name="colorids[]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" <?php if (is_array($this->_tpl_vars['selected_color']) && in_array ( $this->_tpl_vars['item']['id'] , $this->_tpl_vars['selected_color'] )): ?>checked="checked" <?php endif; ?>>
                        <?php echo $this->_tpl_vars['item']['name']; ?>

                      </label></li>
                    <?php endforeach; endif; unset($_from); ?>
                  </ul>
                </div>
              </div>
              <?php endif; ?>
              <?php if ($this->_tpl_vars['tinhnang']['kichthuoc'] == 1): ?>
              <div class="item">
                <div class="title">Danh sách size</div>
                <div class="selectlist">
                  <ul class="category-tree">
                    <?php $_from = $this->_tpl_vars['sizes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                    <li><label>
                        <input type="checkbox" name="sizeids[]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" <?php if (is_array($this->_tpl_vars['selected_size']) && in_array ( $this->_tpl_vars['item']['id'] , $this->_tpl_vars['selected_size'] )): ?>checked="checked" <?php endif; ?>>
                        <?php echo $this->_tpl_vars['item']['name']; ?>

                      </label></li>
                    <?php endforeach; endif; unset($_from); ?>
                  </ul>
                </div>
              </div>
              <?php endif; ?>
              <?php if ($this->_tpl_vars['tinhnang']['attribute'] == 1): ?>
              <div class="item">
                <div id="add-product-code">➕ Thêm mã sản phẩm</div>
                <div id="product-code-wrapper">

                  <?php $this->assign('productIndex', 0); ?>

                  <?php $_from = $this->_tpl_vars['product_codes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pc']):
?>
                  <?php $this->assign('productIndex', $this->_tpl_vars['productIndex']+1); ?>

                  <div class="product-code" data-index="<?php echo $this->_tpl_vars['productIndex']; ?>
">
                    <div class="product-handle" draggable="true">⇅</div>
                    <input type="hidden" class="code-sort" name="products[<?php echo $this->_tpl_vars['productIndex']; ?>
][sort_order]"
                      value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['pc']['sort_order'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
" />

                    <div class="product-code-top">
                      <label>Mã sản phẩm:</label>
                      <input type="text" name="products[<?php echo $this->_tpl_vars['productIndex']; ?>
][code]" value="<?php echo $this->_tpl_vars['pc']['code']; ?>
" />
                      <div class="remove-product" title="Xoá mã sản phẩm">❌</div>
                    </div>
                    <button type="button" class="add-variant">➕ Thêm màu</button>
                    <div class="variant-wrapper">
                      <?php $_from = $this->_tpl_vars['pc']['variants']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
                      <div class="variant-item">
                        <div class="variant-handle" draggable="true">⇅</div>
                        <div class="variant-item-flex">
                          <input type="hidden" class="variant-sort"
                            name="products[<?php echo $this->_tpl_vars['productIndex']; ?>
][variants][<?php echo $this->_tpl_vars['k']; ?>
][sort_order]"
                            value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['v']['sort_order'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['k']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['k'])); ?>
" />
                          <input type="text" name="products[<?php echo $this->_tpl_vars['productIndex']; ?>
][variants][<?php echo $this->_tpl_vars['k']; ?>
][color_name]"
                            value="<?php echo $this->_tpl_vars['v']['color_name']; ?>
" placeholder="Tên màu" />
                          <input type="text" class="price-input" name="products[<?php echo $this->_tpl_vars['productIndex']; ?>
][variants][<?php echo $this->_tpl_vars['k']; ?>
][price]"
                            value="<?php echo ((is_array($_tmp=$this->_tpl_vars['v']['price'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ',', '.') : number_format($_tmp, 0, ',', '.')); ?>
" placeholder="Giá" />
                          <div class="remove-variant">✖ </div>
                        </div>
                        <div class="variant-item-flex">
                          <input type="color" class="color-picker"
                            name="products[<?php echo $this->_tpl_vars['productIndex']; ?>
][variants][<?php echo $this->_tpl_vars['k']; ?>
][color_code]" value="<?php echo $this->_tpl_vars['v']['color_code']; ?>
" />

                          <input type="text" class="color-code-text" value="<?php echo $this->_tpl_vars['v']['color_code']; ?>
" style="width:90px" />
                          <!-- 🔑 LƯU MÀU CŨ -->
                          <input type="hidden" class="old-color"
                            name="products[<?php echo $this->_tpl_vars['productIndex']; ?>
][variants][<?php echo $this->_tpl_vars['k']; ?>
][old_color]" value="<?php echo $this->_tpl_vars['v']['color_code']; ?>
" />
                        </div>
                      </div>
                      <?php endforeach; endif; unset($_from); ?>

                    </div>
                  </div>

                  <?php endforeach; endif; unset($_from); ?>

                </div>

              </div>
              <?php endif; ?>
              <div class="item">
                <div class="title">
                  <span>Thứ tự</span>
                  <input type="text" name="num" class="InputNum" value="<?php echo $this->_tpl_vars['articlelist']['num']; ?>
" />
                </div>
              </div>
              <?php if ($this->_tpl_vars['tinhnang']['new'] == 1): ?>
              <div class="item">
                <div class="title">
                  Mới <input type="checkbox" class="CheckBox" name="new" value="new" <?php if ($this->_tpl_vars['articlelist']['new'] == 1): ?>checked<?php endif; ?> />
                </div>
              </div>
              <?php endif; ?>

              <?php if ($this->_tpl_vars['tinhnang']['hot'] == 1): ?>
              <div class="item">
                <div class="title">
                  Nổi bật <input type="checkbox" class="CheckBox" name="hot" value="hot" <?php if ($this->_tpl_vars['articlelist']['hot'] == 1): ?>checked<?php endif; ?> />
                </div>
              </div>
              <?php endif; ?>
              <?php if ($this->_tpl_vars['tinhnang']['mostview'] == 1): ?>
              <div class="item">
                <div class="title">
                  Xem nhiều<input type="checkbox" class="CheckBox" name="mostview" value="mostview" <?php if ($this->_tpl_vars['articlelist']['mostview'] == 1): ?>checked<?php endif; ?> />
                </div>
              </div>
              <?php endif; ?>
              <div class="item">
                <div class="title">
                  Hiển thị <input type="checkbox" class="CheckBox" name="active" value="acive" <?php if ($this->_tpl_vars['articlelist']['active'] == 1): ?>checked<?php endif; ?> />
                </div>
              </div>
            </div>
          </div>
      </form>
    </div>
  </div>
</div>