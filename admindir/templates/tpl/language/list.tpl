<div class="contentmain">
   <div class="main">
      <div class="left_sidebar padding10">
         {include file="left.tpl"}
      </div>
      <div class="right_content">
         <!-- Actions -->
         <div class="divtitle">
            <div class="divright">
               <div class="acti2">
                  <a class="add" href="index.php?do=language&act=add">
                     <i class="fa fa-plus-circle"></i> Thêm mới
                  </a>
               </div>
               <div class="acti2">
                  <button class="add" type="button" id="btnDelete" data-comp="0">
                     <i class="fa fa-trash"></i> Xóa
                  </button>
               </div>
            </div>
         </div>
         <div class="main-content">
            <form name="f" id="f" method="post" action="index.php?do=language&act=dellist">
               <table class="br1" cellspacing="0" cellpadding="0">
                  <thead>
                     <tr>
                        <th align="center" class="width-del">
                           <input type="checkbox" name="all" id="checkAll" />
                        </th>
                        <th align="center" class="width-show">Code</th>
                        <th align="left" class="width-ttl">Tiêu đề</th>
                        <th align="center" class="width-show">Mặc định</th>
                        <th align="center" class="width-show">Show</th>
                        <th align="center" class="width-action">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     {foreach from=$view item=row}
                     <tr data-id="{$row.id}">
                        <td align="center">
                           <input type="checkbox" value="{$row.id}" name="cid[]" class="c-item">
                        </td>
                        <td align="center" class="hidden-xs">{$row.code}</td>
                        <td align="left">{$row.name}</td>
                        <td align="center">
                           <button type="button"
                              class="btn_checks btn_toggle"
                              data-id="{$row.id}"
                              data-active="{$row.is_default}"
                              data-column="is_default"
                              data-table="language">
                              <img src="images/{$row.is_default}.png" alt="Show/Hide">
                           </button>
                        </td>
                        <td align="center">
                           <button type="button"
                              class="btn_checks btn_toggle"
                              data-id="{$row.id}"
                              data-active="{$row.active}"
                              data-column="active"
                              data-table="language">
                              <img src="images/{$row.active}.png" alt="Show/Hide">
                           </button>
                        </td>
                        <td align="center">
                           <div class="flex-btn">
                              <a class="act-btn btnEdit" href="index.php?do=language&act=edit&id={$row.id}" title="Edit">
                                 <i class="fa fa-edit"></i>
                              </a>
                           </div>
                        </td>
                     </tr>
                     {/foreach}
                  </tbody>
               </table>
            </form>
         </div>
      </div>
   </div>
</div>