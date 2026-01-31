{if $breadcrumbs|@count > 1}
{foreach from=$breadcrumbs key=key item=item}
{if $key+1 < $breadcrumbs|@count}
    <li><a href="{$item.link}">{$item.name}</a> &raquo;</li>
    {else}
    <li><span>{$item.name}</span></li>
    {/if}
    {/foreach}
    {/if}