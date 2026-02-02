<?php
// session_start();
require_once(__DIR__ . "/../includes/config.php");
require_once(__DIR__ . "/../functions/function.php");
require_once(__DIR__ . "/../includes/get_languages.php");

/* ===== LẤY PARAM ===== */
$keyword_raw = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
$page    = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) $page = 1;

$per_Page = 50;
$start    = ($page - 1) * $per_Page;

/* ===== ĐIỀU KIỆN TÌM KIẾM ===== */
$where  = '';
$params = array();
$keyword     = vn_to_slug($keyword_raw);
if ($keyword !== '') {
  $where    = " AND d.name LIKE ? ";
  $params[] = '%' . $keyword . '%';
}

/* ===== ĐẾM TỔNG ===== */
$sql_count = "
    SELECT COUNT(*) 
    FROM {$GLOBALS['db_sp']}.articlelist a
    LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail d
      ON a.id = d.articlelist_id 
     AND d.languageid = {$langid}
    WHERE a.comp = 2 
      AND a.active = 1 
      $where
";

$total = $GLOBALS['sp']->getOne($sql_count, $params);
$totalPages = $total > 0 ? ceil($total / $per_Page) : 1;
// $total = intval($total);
// --- PAGINATION HTML ---
$baseUrl = strtok($_SERVER["REQUEST_URI"], '?');
$paginationHtml = renderPagination($page, $totalPages, $baseUrl);

/* ===== SQL CHÍNH ===== */
$sql = "
SELECT 
    a.id,
    d.unique_key,
    a.img_thumb_vn,a.difficulty, d.short_more,d.time,
    d.name AS name_detail, p.priceold,
     COALESCE(
                NULLIF(p.price, 0),
                (
                    SELECT att.price
                    FROM {$GLOBALS['db_sp']}.articlelist_attributes att
                    INNER JOIN {$GLOBALS['db_sp']}.articlelist_codes c
                        ON c.id = att.code_id
                    WHERE c.articlelist_id = a.id
                      AND att.price > 0
                    ORDER BY att.sort_order ASC
                    LIMIT 1
                )
            ) AS price
FROM {$GLOBALS['db_sp']}.articlelist a
LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail d
  ON a.id = d.articlelist_id 
 AND d.languageid = {$langid}
 LEFT JOIN {$GLOBALS['db_sp']}.articlelist_price AS p 
    ON p.articlelist_id = a.id
WHERE a.comp = 2 
  AND a.active = 1 
  $where
ORDER BY a.num DESC
LIMIT {$start}, {$per_Page}
";
// $articles = $GLOBALS['sp']->getAll($sql);
// if (!empty($articles)) {
//   foreach ($articles as &$item) {
//     $item['price_formatted']    = !empty($item['price']) ? number_format($item['price'], 0, ',', '.') . '₫' : $contact;
//     $item['priceold_formatted'] = !empty($item['priceold']) ? number_format($item['priceold'], 0, ',', '.') . '₫' : $contact;
//   }
// }
$list = $GLOBALS['sp']->getAll($sql, $params);
if (!empty($list)) {
  foreach ($list as &$item) {
    // ❌ xoá thẻ <em> trong short_more
    if (!empty($item['short_more'])) {
      $item['short_more'] = preg_replace(
        '/<\/?em[^>]*>/i',
        '',
        $item['short_more']
      );
    }
    // ❌ format giá
    $item['price_formatted'] = !empty($item['price'])
      ? number_format($item['price'], 0, ',', '.') . '₫'
      : $contact;

    $item['priceold_formatted'] = !empty($item['priceold'])
      ? number_format($item['priceold'], 0, ',', '.') . '₫'
      : $contact;
  }
  // gom tất cả articlelist_id
  $ids = array_column($list, 'id');
  $ids = array_map('intval', $ids);
  $idList = implode(',', $ids);

  // lấy 5 hình đầu tiên mỗi sản phẩm
  $sqlGallery = "SELECT articlelist_id, img_vn FROM {$GLOBALS['db_sp']}.gallery_sp WHERE active = 1
       AND articlelist_id IN ($idList) ORDER BY num ASC";

  $galleries = $GLOBALS['sp']->getAll($sqlGallery);

  // group gallery theo articlelist_id (limit 5)
  $galleryMap = [];
  foreach ($galleries as $g) {
    $aid = $g['articlelist_id'];
    if (!isset($galleryMap[$aid])) {
      $galleryMap[$aid] = [];
    }
    if (count($galleryMap[$aid]) < 5) {
      $galleryMap[$aid][] = $g['img_vn'];
    }
  }

  // gắn gallery vào từng product
  foreach ($list as &$item) {
    $aid = $item['id'];
    $item['gallery'] = isset($galleryMap[$aid]) ? $galleryMap[$aid] : [];
  }
}
/* ===== GÁN SMARTY ===== */
$smarty->assign(array(
  'view'      => $list,
  'keyword'   => $keyword,
  "totalPages"   => $totalPages,
  "Checkpg"      => $totalPages > 1 ? 1 : 0,
  "currentPage"  => $page,
  "pagination"   => $paginationHtml,
));
/* HIỂN THỊ TEMPLATE CHA */
$smarty->display("./head.tpl");
$smarty->display("./header.tpl");
$smarty->display("./search/list.tpl");
$smarty->display("./footer.tpl");
$smarty->display("./js.tpl");
