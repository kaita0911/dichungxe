<div class="f-about">
    {foreach from=$view item=item}
    <div class="artseed-detail">
        <!-- <div class="date">{$item.dated|date_format:"%d/%m/%Y"}</div> -->
        {$item.content}
    </div>
    {/foreach}
</div>
<div id="viewpage" class="pagination"> {$pagination nofilter}</div>