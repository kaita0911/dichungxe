<script>
  const PATH_URL = "{$path_url}/";
  const langPrefix = "{$lang_prefix}"; // "en/" hoặc ""
</script>
<script src="{$path_url}/assets/js/jquery.min.js"></script>
<script src="{$path_url}/assets/js/wow.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
<!-- <script src="{$path_url}/assets/js/pagination.js"></script> -->
{if $searchengine.open eq 1}
<script src="{$path_url}/assets/js/search_engine.js"></script>
{/if}
<script src="{$path_url}/assets/js/script.js"></script>
{if $do == 'cart'}
<script src="{$path_url}/assets/js/cart.js"></script>
{/if}