<?php /* Smarty version 2.6.30, created on 2026-01-30 11:26:48
         compiled from ./head.tpl */ ?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
  <meta name="robots" content="INDEX, FOLLOW, NOODP">
  <meta name="Author" content="<?php echo $this->_tpl_vars['domain']['domain']; ?>
" />
  <?php if ($this->_tpl_vars['is_home'] == 1): ?>
  <title><?php echo $this->_tpl_vars['seo']['name_vn']; ?>
</title>
  <meta name="keywords" content="<?php echo $this->_tpl_vars['seo']['keyword']; ?>
">
  <meta name="description" content="<?php echo $this->_tpl_vars['seo']['desc']; ?>
">
  <meta property="og:title" content="<?php if ($this->_tpl_vars['is_page'] == 1): ?><?php echo $this->_tpl_vars['c_ttl']; ?>
<?php else: ?><?php echo $this->_tpl_vars['seo']['name_vn']; ?>
<?php endif; ?>">
  <meta property="og:description" content="<?php echo $this->_tpl_vars['seo']['desc']; ?>
">
  <meta property="og:image" content="<?php echo $this->_tpl_vars['path_url']; ?>
/assets/images/OGP.jpg">
  <?php else: ?>
  <title><?php if ($this->_tpl_vars['seo']['name']): ?><?php echo $this->_tpl_vars['seo']['name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['c_ttl']; ?>
<?php endif; ?></title>
  <meta name="keywords" content="<?php echo $this->_tpl_vars['seo']['keyword']; ?>
">
  <meta name="description" content="<?php if ($this->_tpl_vars['seo']['des']): ?><?php echo $this->_tpl_vars['seo']['des']; ?>
<?php else: ?><?php echo $this->_tpl_vars['seo']['desc']; ?>
<?php endif; ?>">
  <meta property="og:title" content="<?php if ($this->_tpl_vars['seo']['name']): ?><?php echo $this->_tpl_vars['seo']['name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['c_ttl']; ?>
<?php endif; ?>">
  <meta property="og:description" content="<?php if ($this->_tpl_vars['seo']['des']): ?><?php echo $this->_tpl_vars['seo']['des']; ?>
<?php else: ?><?php echo $this->_tpl_vars['seo']['desc']; ?>
<?php endif; ?>">


  <?php if ($this->_tpl_vars['seo']['img_vn']): ?>
  <meta property="og:image" content="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['seo']['img_vn']; ?>
">
  <?php elseif ($this->_tpl_vars['seo']['img_thumb_vn']): ?>
  <meta property="og:image" content="<?php echo $this->_tpl_vars['path_url']; ?>
/<?php echo $this->_tpl_vars['seo']['img_thumb_vn']; ?>
">
  <?php else: ?>
  <meta property="og:image" content="<?php echo $this->_tpl_vars['path_url']; ?>
/assets/images/OGP.jpg">
  <?php endif; ?>
  <?php endif; ?>
  <meta property="og:url" content="<?php echo $this->_tpl_vars['path_url']; ?>
<?php echo $_SERVER['REQUEST_URI']; ?>
">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="<?php echo $this->_tpl_vars['domain']['domain']; ?>
">
  <meta name="twitter:card" content="summary_large_image">
  <link rel="shortcut icon" href="<?php echo $this->_tpl_vars['path_url']; ?>
/favicon.ico" type="image/x-icon">
  <link rel="canonical" href="<?php echo $this->_tpl_vars['path_url']; ?>
<?php echo $_SERVER['REQUEST_URI']; ?>
">
  <!-- Fancybox CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
  <?php echo '
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebPage",
      "name": "'; ?>
<?php echo $this->_tpl_vars['c_ttl']; ?>
<?php echo '",
      "url": "'; ?>
<?php echo $this->_tpl_vars['path_url']; ?>
<?php echo $_SERVER['REQUEST_URI']; ?>
<?php echo '",
      "description": "'; ?>
<?php echo $this->_tpl_vars['seo']['des']; ?>
<?php echo '"
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

  '; ?>

  <?php echo $this->_tpl_vars['headerscript']['content_vn']; ?>

</head>