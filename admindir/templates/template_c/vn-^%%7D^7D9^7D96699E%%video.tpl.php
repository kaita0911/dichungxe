<?php /* Smarty version 2.6.30, created on 2026-04-09 10:39:34
         compiled from articlelist/video.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'regex_replace', 'articlelist/video.tpl', 90, false),)), $this); ?>
<div class="contentmain">
    <div class="main">

        <!-- LEFT MENU -->
        <div class="left_sidebar padding10">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "left.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>

        <!-- RIGHT CONTENT -->
        <div class="right_content">

            <!-- FORM -->
            <form method="post" action="index.php?do=articlelist&act=addvideo" enctype="multipart/form-data">
                <input type="hidden" name="article_id" value="<?php echo $this->_tpl_vars['article_id']; ?>
" />
                <!-- MAIN -->
                <div class="main-content">
                    <div class="full-width">
                        <!-- <div class="item">
                            <div class="title">Tiêu đề video</div>
                            <input type="text" name="title" class="InputText" placeholder="Nhập tiêu đề video">
                        </div> -->
                        <div class="item">
                            <!-- <div class="title">Upload video</div> -->
                            <div class="upload-video">
                                <label for="video_file" class="custom-upload">
                                    <i class="fa fa-upload"></i>Upload video <i class="txt">(có thể upload nhiều video
                                        cùng lúc)</i>
                                </label>
                            </div>
                            <input type="file" name="video_file[]" id="video_file" accept="video/mp4" multiple>

                            <div id="video-list" data-article="<?php echo $this->_tpl_vars['article_id']; ?>
" class="video-list"></div>

                            <!-- <video id="preview-video" width="150" controls
                                    style="display:none; margin-top:10px;"></video> -->
                        </div>

                    </div>

                    <!-- ACTION -->
                    <div class="divright pad-0">
                        <div class="acti2">
                            <button class="add" type="submit">
                                <i class="fa fa-save"></i> Lưu
                            </button>
                        </div>
                        <div class="acti2">
                            <button type="button" class="add delete-all" id="btn-delete-all" disabled>
                                <i class="fa fa-trash"></i> Xoá đã chọn
                            </button>
                        </div>
                        <!-- <div class="acti2">
                            <a class="add" href="javascript:history.go(-1)">
                                <i class="fa fa-mail-reply"></i> Trở về
                            </a>
                        </div> -->
                    </div>
                    <div class="full-width">
                        <!-- <div class="item">
                                <div class="title">Link Youtube</div>
                                <input type="text" name="video_url" class="InputText"
                                    placeholder="https://youtube.com/...">
                            </div> -->
                        <div class="item">
                            <table class="br1">
                                <thead>
                                    <tr>
                                        <th align="center" class="width-del">
                                            <input type="checkbox" name="all" id="checkAll" />
                                        </th>
                                        <th class="width-order">ID</th>
                                        <th class="width-image">Video</th>
                                        <th class="width-ttl">Tiêu đề</th>
                                        <th class="width-show">Show</th>
                                        <th class="width-action">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $_from = $this->_tpl_vars['videos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                                    <tr data-id="<?php echo $this->_tpl_vars['item']['id']; ?>
">
                                        <td align="center">
                                            <input type="checkbox" class="c-item" name="cid[]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
">
                                        </td>
                                        <td align="center"><?php echo $this->_tpl_vars['item']['id']; ?>
</td>
                                        <td align="center">
                                            <div class="item-video">
                                                <?php if ($this->_tpl_vars['item']['video_url'] != ""): ?>
                                                <iframe
                                                    src="https://www.youtube.com/embed/<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['video_url'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/.*v=([^&]+)/', '$1') : smarty_modifier_regex_replace($_tmp, '/.*v=([^&]+)/', '$1')); ?>
"
                                                    frameborder="0" allowfullscreen>
                                                </iframe>
                                                <?php else: ?>
                                                <video>
                                                    <source src="../<?php echo $this->_tpl_vars['item']['video_file']; ?>
" type="video/mp4">
                                                </video>
                                                <?php endif; ?>
                                            </div>

                                        </td>
                                        <td>
                                            <span class="view-title"><?php echo $this->_tpl_vars['item']['title']; ?>
</span>
                                            <input type="text" class="edit-title InputText" value="<?php echo $this->_tpl_vars['item']['title']; ?>
"
                                                style="display:none;">
                                        </td>

                                        <td align="center">
                                            <button type="button" class="btn_checks btn_toggle" data-id="<?php echo $this->_tpl_vars['item']['id']; ?>
"
                                                data-active="<?php echo $this->_tpl_vars['item']['active']; ?>
" data-column="active"
                                                data-table="articlelist_videos">
                                                <img src="images/<?php echo $this->_tpl_vars['item']['active']; ?>
.png" alt="Hiển thị / Ẩn" />
                                            </button>
                                        </td>

                                        <td align="center">
                                            <div class="flex-btn">
                                                <a href="javascript:void(0)" class="act-btn btnEdit btn-edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="act-btn btn-save btnView"
                                                    style="display:none;">
                                                    <i class="fa fa-save"></i>
                                                </a>
                                                <a class="act-btn btnDeleteRow"
                                                    href="index.php?do=articlelist&act=deletevideo&id=<?php echo $this->_tpl_vars['item']['id']; ?>
&article_id=<?php echo $this->_tpl_vars['article_id']; ?>
"
                                                    onclick="return confirm('Xoá video này?')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; endif; unset($_from); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- PREVIEW JS -->
<?php echo '
<!-- <script>
    document.getElementById(\'video_file\').addEventListener(\'change\', function (e) {
        const file = e.target.files[0];
        const preview = document.getElementById(\'preview-video\');

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = \'block\';
        }
    });
</script> -->

<!-- Nhieu video <script>
    document.getElementById(\'video_file\').addEventListener(\'change\', function (e) {
        const files = e.target.files;
        const previewList = document.getElementById(\'preview-list\');

        previewList.innerHTML = \'\';

        Array.from(files).forEach(file => {
            const video = document.createElement(\'video\');
            video.src = URL.createObjectURL(file);

            video.controls = true;


            previewList.appendChild(video);
        });
    });
</script> -->
<script>
    document.getElementById(\'video_file\').addEventListener(\'change\', function (e) {
        const files = e.target.files;
        const container = document.getElementById(\'video-list\');

        container.innerHTML = \'\';

        Array.from(files).forEach((file, index) => {

            const wrapper = document.createElement(\'div\');


            // video preview
            const video = document.createElement(\'video\');
            video.src = URL.createObjectURL(file);

            video.controls = true;
            video.style.display = \'block\';

            // input title riêng
            const input = document.createElement(\'input\');
            input.type = \'text\';
            input.name = \'title[]\';
            input.placeholder = \'Nhập tên video...\';
            input.className = \'InputText\';
            input.style.marginTop = \'5px\';

            wrapper.appendChild(video);
            wrapper.appendChild(input);

            container.appendChild(wrapper);
        });
    });
</script>
<script>
    function deleteSelected() {

        // ❗ chỉ lấy checkbox trong tbody (tránh dính checkAll)
        const checked = document.querySelectorAll(\'tbody .c-item:checked\');

        if (checked.length === 0) {
            alert(\'Chưa chọn video nào!\');
            return;
        }

        if (!confirm(\'Bạn có chắc muốn xoá các video đã chọn?\')) return;

        let ids = [];

        checked.forEach(item => {
            if (item.value) {
                ids.push(item.value);
            }
        });
        const articleId = document.getElementById(\'video-list\').dataset.article;
        window.location.href = \'index.php?do=articlelist&act=deletevideo_multi\'
            + \'&ids=\' + ids.join(\',\')
            + \'&article_id=\' + articleId;

    }
</script>
<script>
    document.addEventListener(\'DOMContentLoaded\', function () {

        const checkAll = document.getElementById(\'checkAll\');
        const items = document.querySelectorAll(\'.c-item\');
        const btnDelete = document.getElementById(\'btn-delete-all\');

        function toggleButton() {
            const checked = document.querySelectorAll(\'.c-item:checked\');
            btnDelete.disabled = checked.length === 0;
        }

        // check từng item
        items.forEach(item => {
            item.addEventListener(\'change\', toggleButton);
        });

        // check all
        if (checkAll) {
            checkAll.addEventListener(\'change\', function () {
                items.forEach(item => item.checked = this.checked);
                toggleButton();
            });
        }

        // click nút xoá
        btnDelete.addEventListener(\'click\', function () {
            deleteSelected();
        });

    });
</script>
<script>
    document.addEventListener(\'DOMContentLoaded\', function () {

        document.querySelectorAll(\'.btn-edit\').forEach(btn => {
            btn.addEventListener(\'click\', function () {

                const tr = this.closest(\'tr\');

                tr.querySelector(\'.view-title\').style.display = \'none\';
                tr.querySelector(\'.edit-title\').style.display = \'block\';

                this.style.display = \'none\';
                tr.querySelector(\'.btn-save\').style.display = \'inline-block\';
            });
        });

        document.querySelectorAll(\'.btn-save\').forEach(btn => {
            btn.addEventListener(\'click\', function () {

                const tr = this.closest(\'tr\');
                const id = tr.dataset.id;
                const input = tr.querySelector(\'.edit-title\');
                const newTitle = input.value;

                fetch(\'index.php?do=articlelist&act=updatevideo\', {
                    method: \'POST\',
                    headers: {
                        \'Content-Type\': \'application/x-www-form-urlencoded\'
                    },
                    body: \'id=\' + id + \'&title=\' + encodeURIComponent(newTitle)
                })
                    .then(res => res.text())
                    .then(data => {

                        tr.querySelector(\'.view-title\').innerText = newTitle;

                        tr.querySelector(\'.view-title\').style.display = \'block\';
                        tr.querySelector(\'.edit-title\').style.display = \'none\';

                        tr.querySelector(\'.btn-edit\').style.display = \'inline-block\';
                        btn.style.display = \'none\';

                    });
            });
        });

    });
</script>
'; ?>