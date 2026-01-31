{if $total_pages > 1}
<ul class="pagination" id="viewpage-search">
    {assign var=prev_page value=$current_page-1}
    {assign var=next_page value=$current_page+1}

    {* ← Previous *}
    {if $current_page > 1}
    <li>
        <a href="/tim-kiem/{$keyword|escape}/page/{$prev_page}">«</a>
    </li>
    {/if}

    {* Các số trang *}
    {section name=p start=1 loop=$total_pages+1}
    {assign var=page value=$smarty.section.p.index}
    {if $page == $current_page}
    <li class="active"><span>{$page}</span></li>
    {else}
    <li>
        <a href="/tim-kiem/{$keyword|escape}/page/{$page}">{$page}</a>
    </li>
    {/if}
    {/section}

    {* → Next *}
    {if $current_page < $total_pages}
        <li>
        <a href="/tim-kiem/{$keyword|escape}/page/{$next_page}">»</a>
        </li>
        {/if}
</ul>
{/if}