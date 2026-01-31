<div class="contentmain">
   <div class="main">

      <div class="left_sidebar padding10">
         {include file="left.tpl"}
      </div>

      <div class="right_content">
         <div class="main-content">
            {if $edit.title}
            <div class="form-item">
               <label class="title" for="fullname">Bài viết đã xem</label>
               <div class="meta">
                  <input type="text" id="fullname"
                     value="{$edit.title}"
                     class="InputText" readonly>
               </div>
            </div>
            {/if}
            <div class="form-item">
               <label class="title" for="fullname">Họ tên</label>
               <div class="meta">
                  <input type="text" id="fullname"
                     value="{$edit.fullname|escape:'html':'UTF-8'}"
                     class="InputText" readonly>
               </div>
            </div>

            <div class="form-item">
               <label class="title" for="phone">Điện thoại</label>
               <div class="meta">
                  <input type="text" id="phone"
                     value="{$edit.phone|escape:'html':'UTF-8'}"
                     class="InputText" readonly>
               </div>
            </div>
            <div class="form-item">
               <label class="title" for="email">Email</label>
               <div class="meta">
                  <input type="text" id="email"
                     value="{$edit.email|escape:'html':'UTF-8'}"
                     class="InputText" readonly>
               </div>
            </div>
            {if $edit.address}
            <div class="form-item">
               <label class="title" for="email">Địa chỉ</label>
               <div class="meta">
                  <input type="text" id="email"
                     value="{$edit.address|escape:'html':'UTF-8'}"
                     class="InputText" readonly>
               </div>
            </div>
            {/if}
            <div class="form-item">
               <label class="title" for="message">Nội dung</label>
               <div class="meta">
                  <textarea id="message" class="InputTextarea" readonly>{$edit.message|escape:'html':'UTF-8'}</textarea>
               </div>
            </div>

            <p class="slss">
               <a href="index.php?do=register_info" title="Trở về">
                  <i class="fa fa-rotate-left"></i> Trở về
               </a>
            </p>

         </div>
      </div>

   </div>
</div>