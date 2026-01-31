{assign var="level" value=$level|default:1}
<ul class="level_{$level}">
    {foreach from=$categories item=cat}
    <li class="nav-item {if $cat.children|@count > 0}has-sub{/if}">
        <a class="nav-link" href="{$web_base_url}/{$cat.unique_key}/" title="{$cat.name_detail}">
            {if $cat.img_vn}<img class="icon-img" src="{$web_base_url}/{$cat.img_vn}" alt="{$cat.name_detail}">{/if}
            {$cat.name_detail}
            {if $cat.children|@count > 0} <i class="fa-solid fa-angle-right"></i>{/if}
        </a>
        {if isset($cat.children) && $cat.children|@count > 0}
        {include file='categories_tree_2.tpl' categories=$cat.children level=$level+1}
        {/if}
    </li>
    {/foreach}
</ul>