<header class="p-header">

  <div class="header-top" id="c-header">
    <div class="container">
      <div class="header-top-wrap">
        <div id="menu-toggle" class="sp"><i class="fa-solid fa-list"></i></div>
        <a class="logo" href="{$path_url}/{$lang_prefix}" title="{$logoHome.name_vn}">
          <img src="/{$logoHome.img_thumb_vn}" class="img-responsive" alt="{$logoHome.name_vn}">
        </a>

        <div class="menu menu_mb" id="mobile-menu">
          <nav class="menutop">
            <ul>
              <li>
                <a href="{$path_url}/{$lang_prefix}" title="{$home|escape:'html'}">
                  {$home|escape:'html'}
                </a>
              </li>
              {foreach from=$menus item=menu}
              <li class="{if $menu.categories|@count > 0}has-sub{/if}">
                <a href="{$path_url}/{$lang_prefix}{$menu.unique_key_detail}/">{$menu.name_detail}</a>
                {if $menu.has_sub ==1}
                {if $menu.categories|@count > 0}
                {include file='categories_tree.tpl' categories=$menu.categories level=1}
                <i class="fa-solid fa-angle-down"></i>
                {/if}
                {/if}
              </li>
              {/foreach}
            </ul>
          </nav>

        </div>

        <div class="box-search">
          <span class="ic_search sp"><i class="fa-solid fa-magnifying-glass"></i></span>
          <div class="box-search-content">
            {if $searchengine.open eq 1}
            <input class="input-search" type="text" id="search-keyword" placeholder="Nhập từ khóa..." autocomplete="off">
            <div id="suggestions"></div>
            <i class="fa-solid fa-magnifying-glass"></i>
            {else}
            <form action="" method="get" onsubmit="return goSearch(this)">
              <input class="search-input" type="text" name="keyword" id="keyword" placeholder="" required>
              <span class="btn-search"><i class="fa-solid fa-magnifying-glass"></i></span>
            </form>
            {literal}
            <script>
              function goSearch(f) {
                const k = f.keyword.value.trim();
                if (!k) return false;
                window.location.href = '/tim-kiem/' + encodeURIComponent(k);
                return false;
              }
            </script>{/literal}
            {/if}
          </div>
        </div>
        {if $alllanguages|@count > 1}
        <div class="lang-switch">
          {foreach from=$alllanguages item=item}
          <a class="ic-lang" href="{$path_url}/{$item.code}" class="">
            <img src="{$path_url}/assets/images/{$item.code}.png" alt="vi">
          </a>
          {/foreach}
        </div>
        {/if}
        <div class="gtranslate_wrapper"></div>
      </div>
    </div>
  </div>
</header>