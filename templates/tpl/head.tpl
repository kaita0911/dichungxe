<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
  <meta name="robots" content="INDEX, FOLLOW, NOODP">
  <meta name="Author" content="{$domain.domain}" />
  {if $is_home eq 1}
  <title>{$seo.name_vn}</title>
  <meta name="keywords" content="{$seo.keyword}">
  <meta name="description" content="{$seo.desc}">
  <meta property="og:title" content="{if $is_page eq 1}{$c_ttl}{else}{$seo.name_vn}{/if}">
  <meta property="og:description" content="{$seo.desc}">
  <meta property="og:image" content="{$path_url}/assets/images/OGP.jpg">
  {else}
  <title>{if $seo.name}{$seo.name}{else}{$c_ttl}{/if}</title>
  <meta name="keywords" content="{$seo.keyword}">
  <meta name="description" content="{if $seo.des}{$seo.des}{else}{$seo.desc}{/if}">
  <meta property="og:title" content="{if $seo.name}{$seo.name}{else}{$c_ttl}{/if}">
  <meta property="og:description" content="{if $seo.des}{$seo.des}{else}{$seo.desc}{/if}">


  {if $seo.img_vn}
  <meta property="og:image" content="{$path_url}/{$seo.img_vn}">
  {elseif $seo.img_thumb_vn}
  <meta property="og:image" content="{$path_url}/{$seo.img_thumb_vn}">
  {else}
  <meta property="og:image" content="{$path_url}/assets/images/OGP.jpg">
  {/if}
  {/if}
  <meta property="og:url" content="{$path_url}{$smarty.server.REQUEST_URI}">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="{$domain.domain}">
  <meta name="twitter:card" content="summary_large_image">
  <link rel="shortcut icon" href="{$path_url}/favicon.ico" type="image/x-icon">
  <link rel="canonical" href="{$path_url}{$smarty.server.REQUEST_URI}">
  <!-- Fancybox CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
  {literal}
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebPage",
      "name": "{/literal}{$c_ttl}{literal}",
      "url": "{/literal}{$path_url}{$smarty.server.REQUEST_URI}{literal}",
      "description": "{/literal}{$seo.des}{literal}"
    }
  </script>
  <script>
    window.gtranslateSettings = {
      "default_language": "vi",
      "languages": ["vi", "en"],
      "wrapper_selector": ".gtranslate_wrapper"
    }
  </script>
  <script src="https://cdn.gtranslate.net/widgets/latest/flags.js" defer></script>

  {/literal}
  {$headerscript.content_vn}
</head>