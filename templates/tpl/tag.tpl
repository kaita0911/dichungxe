{if $tags}
<div class="tags">
   {foreach from=$tags item=tag}
   <a href="/tag/{$tag.slug}" class="tag-link">{$tag.name}</a>
   {/foreach}
</div>
{/if}