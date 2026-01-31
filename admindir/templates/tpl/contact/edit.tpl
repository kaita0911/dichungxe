<div class="contentmain">
   <div class="main">
      <div class="left_sidebar padding10">
         {include file="left.tpl"}
      </div>
      <div class="right_content">
         <div class="main-content">
            <div class="item">
               <div class="title">Họ tên</div>
               <div class="meta">
                  <input type="text" value="{$edit.name|escape:'html':'UTF-8'}" class="InputText" />
               </div>
            </div>
            <div class="item">
               <div class="title">Điện thoại</div>
               <div class="meta">
                  <input type="text" value="{$edit.phone|escape:'html':'UTF-8'}" class="InputText" />
               </div>
            </div>
            <div class="item">
               <div class="title">Email</div>
               <div class="meta">
                  <input type="text" value="{$edit.email|escape:'html':'UTF-8'}" class="InputText" />
               </div>
            </div>
            <div class="item">
               <div class="title">Nội dung</div>
               <div class="meta">
                  <textarea class="InputTextarea">{$edit.message|escape:'html':'UTF-8'}</textarea>
               </div>
            </div>
            <div class="item">
               <div class="title">File đính kèm</div>
               <div class="meta">
                  <a href="../../../{$edit.fileUpload}" target="_blank">
                     <i class="fa fa-book"></i> Xem file
                  </a>
               </div>
            </div>
            <p class="slss">
               <a href="index.php?do=contact&comp=23" title="Trở về">
                  <i class="fa fa-rotate-left"></i> Trở về
               </a>
            </p>
         </div>
      </div>
   </div>
</div>