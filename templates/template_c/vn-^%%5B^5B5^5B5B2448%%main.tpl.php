<?php /* Smarty version 2.6.30, created on 2026-04-10 13:43:33
         compiled from main/main.tpl */ ?>
<main class="home">
   <div class="container">
      <div class="p-commit">

         <ul class="p-commit__nav">
            <?php $_from = $this->_tpl_vars['commit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tab'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tab']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['tab']['iteration']++;
?>
            <li class="<?php if (($this->_foreach['tab']['iteration'] <= 1)): ?>active<?php endif; ?>" data-tab="commit-tab-<?php echo ($this->_foreach['tab']['iteration']-1); ?>
">
               <?php echo $this->_tpl_vars['item']['name_detail']; ?>

            </li>
            <?php endforeach; endif; unset($_from); ?>
         </ul>
         <div class="p-commit__content">
            <?php $_from = $this->_tpl_vars['commit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tab'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tab']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['tab']['iteration']++;
?>
            <div class="commit-tab-content <?php if (($this->_foreach['tab']['iteration'] <= 1)): ?>active<?php endif; ?>"
               id="commit-tab-<?php echo ($this->_foreach['tab']['iteration']-1); ?>
">
               <img src="<?php echo $this->_tpl_vars['item']['img_thumb_vn']; ?>
" alt="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
" class="img-cover" loading="lazy">
            </div>
            <?php endforeach; endif; unset($_from); ?>
         </div>
      </div>
   </div>
   <div class="container">
      <h2 class="ttl02">Tham khảo lịch trình và đăng ký các chuyến đi</h2>
      <div class="categories-tab">

         <ul class="categories-tab__nav">
            <li class="active" data-tab="home-tab-all">
               Tất cả
            </li>
            <?php $_from = $this->_tpl_vars['home_categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tab'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tab']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cat']):
        $this->_foreach['tab']['iteration']++;
?>
            <li data-tab="cate-tab-<?php echo ($this->_foreach['tab']['iteration']-1); ?>
">
               <?php echo $this->_tpl_vars['cat']['name']; ?>

            </li>
            <?php endforeach; endif; unset($_from); ?>
         </ul>
         <div class="categories-tab__content">
            <div class="cate-tab-pane active" id="home-tab-all">
               <section class="home-category">
                  <div class="p-products">
                     <?php $_from = $this->_tpl_vars['home_categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat']):
?>
                     <?php $_from = $this->_tpl_vars['cat']['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                     <div class="product-item">
                        <a class="product-item__img" href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['unique_key']; ?>
.html"
                           title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
">
                           <div class="img-gall-js">
                              <img src="<?php echo $this->_tpl_vars['item']['img_thumb_vn']; ?>
" alt="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
" class="img-cover img-gall"
                                 loading="lazy">
                              <?php $_from = $this->_tpl_vars['item']['gallery']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['img']):
?>
                              <img src="<?php echo $this->_tpl_vars['img']; ?>
" alt="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
" class="img-cover img-gall" loading="lazy">
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
                              <span class="price-current">
                                 <?php echo $this->_tpl_vars['item']['price_formatted']; ?>

                              </span>
                              <?php if ($this->_tpl_vars['item']['priceold_formatted']): ?>
                              <span class="price-old">
                                 <?php echo $this->_tpl_vars['item']['priceold_formatted']; ?>

                              </span>
                              <?php endif; ?> /Vé
                           </div>
                        </a>

                        <h3>
                           <a class="product-item__ttl hover" href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['unique_key']; ?>
.html"
                              title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
">
                              <?php echo $this->_tpl_vars['item']['name_detail']; ?>

                           </a>
                        </h3>


                        <div class="product-item__more">
                           <?php echo $this->_tpl_vars['item']['short_more']; ?>

                        </div>
                     </div>
                     <?php endforeach; endif; unset($_from); ?>
                     <?php endforeach; endif; unset($_from); ?>
                  </div>
               </section>
            </div>
            <?php $_from = $this->_tpl_vars['home_categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tab'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tab']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cat']):
        $this->_foreach['tab']['iteration']++;
?>
            <div class="cate-tab-pane" id="cate-tab-<?php echo ($this->_foreach['tab']['iteration']-1); ?>
">

               <section class="home-category">
                  <div class="p-products">
                     <?php $_from = $this->_tpl_vars['cat']['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                     <div class="product-item">
                        <a class="product-item__img" href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['unique_key']; ?>
.html"
                           title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
">
                           <div class="img-gall-js">
                              <img src="<?php echo $this->_tpl_vars['item']['img_thumb_vn']; ?>
" alt="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
" class="img-cover img-gall"
                                 loading="lazy">
                              <?php $_from = $this->_tpl_vars['item']['gallery']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['img']):
?>
                              <img src="<?php echo $this->_tpl_vars['img']; ?>
" alt="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
" class="img-cover img-gall" loading="lazy">
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
                              <span class="price-current">
                                 <?php echo $this->_tpl_vars['item']['price_formatted']; ?>

                              </span>
                              <?php if ($this->_tpl_vars['item']['priceold_formatted']): ?>
                              <span class="price-old">
                                 <?php echo $this->_tpl_vars['item']['priceold_formatted']; ?>

                              </span>
                              <?php endif; ?> /Vé
                           </div>
                        </a>
                        <h3>
                           <a class="product-item__ttl hover" href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['unique_key']; ?>
.html"
                              title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
">
                              <?php echo $this->_tpl_vars['item']['name_detail']; ?>

                           </a>
                        </h3>
                        <div class="product-item__more">
                           <?php echo $this->_tpl_vars['item']['short_more']; ?>

                        </div>
                     </div>
                     <?php endforeach; endif; unset($_from); ?>
                  </div>
               </section>

            </div>
            <?php endforeach; endif; unset($_from); ?>
         </div>
      </div>

   </div>
   <div class="p-feedback">
      <div class="container">
         <h2 class="ttl02">Lời khen từ khách hàng</h2>
         <div class="js-feedback">
            <?php $_from = $this->_tpl_vars['feedback']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <div class="feedback-item">
               <div class="feedback-item__img">
                  <img src="<?php echo $this->_tpl_vars['item']['img_thumb_vn']; ?>
?width=800&height=800&mode=cover" alt="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
"
                     class="img-cover" loading="lazy">
               </div>
               <div class="feedback-item__meta">
                  <div class="feedback-item__short"><?php echo $this->_tpl_vars['item']['content']; ?>
</div>
                  <h3 class="feedback-item__ttl"><span><?php echo $this->_tpl_vars['item']['name_detail']; ?>
</span></h3>

               </div>
            </div>
            <?php endforeach; endif; unset($_from); ?>
         </div>
      </div>
   </div>
   <div class="p-news">
      <div class="container">
         <h2 class="ttl02">Bài viết mới nhất</h2>
         <div class="p-news-wrap js-news">
            <?php $_from = $this->_tpl_vars['news_home']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <div class="news-item">
               <a class="news-item__img hover-img" href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['unique_key']; ?>
.html"
                  title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
">
                  <img src="<?php echo $this->_tpl_vars['item']['img_thumb_vn']; ?>
?width=800&height=600&mode=cover" alt="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
"
                     class="img-cover" loading="lazy">
               </a>
               <h3><a class="news-item__ttl hover" href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['unique_key']; ?>
.html"
                     title="<?php echo $this->_tpl_vars['item']['name_detail']; ?>
"><?php echo $this->_tpl_vars['item']['name_detail']; ?>
</a></h3>
               <div class="news-item__short"><?php echo $this->_tpl_vars['item']['short']; ?>
</div>
               <a href="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['lang_prefix']; ?>
<?php echo $this->_tpl_vars['item']['unique_key']; ?>
.html" class="viewmore" title="xem thêm">Xem
                  thêm</a>
            </div>
            <?php endforeach; endif; unset($_from); ?>
         </div>
      </div>
   </div>
  
  
</main>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'popup.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>