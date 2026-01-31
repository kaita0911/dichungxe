<!DOCTYPE html>
<html lang="vi" xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8" />
  <meta name="robots" content="NOINDEX, NOFOLLOW" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrator</title>

  <!-- Styles -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/font-awesome.css">
  <script src="js/chart.js"></script>
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet">

</head>

<body>

  <div class="popupqc"><img src="images/giahan.jpg" alt="Gia hạn" /></div>
  <div class="header">
    <div class="box-cart">
      {if $showcart.open eq 1}
      <a class="c-cart" href="index.php?do=orders">
        <span><i class="fa fa-shopping-cart"></i></span>
        <label>Danh sách đơn hàng</label>
      </a>
      {/if}
    </div>
    <div class="date linkorg">
      <span>Hi, <strong>{$smarty.session.admin_artseed_username}</strong></span>
      <a target="_blank" href="/">Xem trang chủ</a>
      <a href="index.php?do=login&act=log_out">Thoát</a>
      <a href="index.php?do=login&act=changepass">Đổi mật khẩu</a>
    </div>
  </div>
</body>

</html>
{literal}
<script>
  const langSelect = document.getElementById('language-select');
  if (langSelect) {
    langSelect.addEventListener('change', function() {
      const lang = this.value;
      console.log(lang);
      fetch('./set_language.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'language=' + encodeURIComponent(lang)
      }).then(response => {
        if (response.ok) {
          //alert(sss);
          // Có thể reload trang hiện tại để áp dụng ngôn ngữ
          location.reload();
        }
      });
    });
  }
</script>
{/literal}