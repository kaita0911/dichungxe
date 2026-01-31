<div class="contentmain">
   <div class="main">

      <aside class="left_sidebar padding10">
         {include file="left.tpl"}
      </aside>

      <section class="right_content conten">
         <div class="divright">
            <div class="acti2">
               <button class="add" type="button" id="btnDelete" data-comp="">
                  <i class="fa fa-trash"></i> Xóa
               </button>
            </div>
         </div>
         <div class="main-content">
            <form class="form-all" method="post" action="">
               <table class="br1 w-full border-collapse">
                  <thead>
                     <tr>
                        <th align="center" class="width-del">
                           <input type="checkbox" name="all" id="checkAll" />
                        </th>
                        <th class="width-del">STT</th>

                        <th class="width-ttl">Tiêu đề</th>
                        <th class="width-image">Ngày tháng</th>
                        <th class="width-action">Action</th>
                     </tr>
                  </thead>

                  <tbody>
                     {foreach from=$articlelist item=item name=loop}
                     <tr data-id="{$item.id}">

                        <td class="text-center">
                           <input type="checkbox" class="c-item" name="cid[]" value="{$item.id}">
                        </td>

                        <td class=" text-center">
                           {$smarty.foreach.loop.iteration}
                        </td>



                        <td class=" text-left linkblack">
                           {$item.fullname}
                        </td>
                        <td class=" text-center linkblack">
                           {$item.created_at}
                        </td>
                        <td align="center">

                           <a href="index.php?do=register_info&act=edit&id={$item.id}">Xem</a>

                        </td>
                     </tr>
                     {/foreach}
                  </tbody>
               </table>
            </form>
         </div>
      </section>
   </div>
</div>