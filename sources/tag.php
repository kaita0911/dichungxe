<?php
// sources/tag.php

$slug = isset($route['unique_key']) ? $route['unique_key'] : '';
$keyword = str_replace('-', ' ', $slug); // slug -> keyword

// Lấy các bài viết liên quan + thông tin giá
$sql = "
    SELECT 
        a.id,
        a.comp, a.img_thumb_vn, a.dated,
        ad.name as name_detail, ad.unique_key,
        ad.articlelist_id,ad.short as short_detail,
        p.price,
        p.priceold
    FROM {$GLOBALS['db_sp']}.articlelist a
    JOIN {$GLOBALS['db_sp']}.articlelist_detail ad
        ON a.id = ad.articlelist_id
    LEFT JOIN {$GLOBALS['db_sp']}.articlelist_price p
        ON p.articlelist_id = a.id
    WHERE ad.keyword LIKE '%" . addslashes($keyword) . "%'
      AND a.active = 1
    ORDER BY a.id DESC
";

$articles = $GLOBALS['sp']->getAll($sql);

// Format lại giá hiển thị đẹp hơn
foreach ($articles as &$item) {
	$item['price_formatted'] = isset($item['price']) ? number_format($item['price'], 0, ',', '.') : '';
	$item['priceold_formatted'] = isset($item['priceold']) ? number_format($item['priceold'], 0, ',', '.') : '';
}
// Chia theo comp
$articlesByComp = [];
foreach ($articles as $article) {
	$comp = $article['comp'];
	$articlesByComp[$comp][] = $article;
}

$smarty->assign('tagName', $slug);
$smarty->assign('articlesByComp', $articlesByComp);
// $smarty->assign('views', $articles);

$template = "tag/view.tpl";

$smarty->display("./head.tpl");
$smarty->display("./header.tpl");
$smarty->display($template);
$smarty->display("./footer.tpl");
$smarty->display("./js.tpl");
