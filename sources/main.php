<?php
//Banner
$rs_banner = $GLOBALS['sp']->getAll("SELECT * FROM {$GLOBALS['db_sp']}.articlelist WHERE active = 1 and comp = 7");
$smarty->assign("view_banner", $rs_banner);

$rs_partner = $GLOBALS['sp']->getAll("SELECT * FROM {$GLOBALS['db_sp']}.articlelist WHERE active = 1 and comp = 73");
$smarty->assign("view_partner", $rs_partner);

$sql = "
SELECT 
    a.id,
    a.img_thumb_vn,
    d.name AS name_detail,
    d.unique_key,

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
    ) AS price,

    p.priceold

FROM {$GLOBALS['db_sp']}.articlelist AS a

LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail AS d
    ON a.id = d.articlelist_id 
   AND d.languageid = {$langid}

LEFT JOIN {$GLOBALS['db_sp']}.articlelist_price AS p
    ON p.articlelist_id = a.id

WHERE a.active = 1 AND a.hot =1
  AND a.comp = 2

ORDER BY a.num DESC
";

$articles = $GLOBALS['sp']->getAll($sql);

if (!empty($articles)) {
    foreach ($articles as &$item) {
        $item['price_formatted'] = ($item['price'] !== null && $item['price'] > 0)
            ? number_format($item['price'], 0, ',', '.') . '₫'
            : $contact;

        $item['priceold_formatted'] = !empty($item['priceold'])
            ? number_format($item['priceold'], 0, ',', '.') . '₫'
            : '';
    }
}

$smarty->assign("product_new", $articles);
////
$sql = "
SELECT a.img_thumb_vn,
       d.name AS name_detail, d.unique_key, d.short
FROM {$GLOBALS['db_sp']}.articlelist AS a
LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail AS d 
    ON a.id = d.articlelist_id AND d.languageid = {$langid}
WHERE a.active = 1 AND a.comp = 1
ORDER BY a.num DESC
";
$news_home = $GLOBALS['sp']->getAll($sql);
$smarty->assign("news_home", $news_home);
///

$sqlCat = "
SELECT 
    c.id,
    c.num,
    d.name,
    d.unique_key

FROM {$GLOBALS['db_sp']}.categories AS c
INNER JOIN {$GLOBALS['db_sp']}.categories_detail AS d
    ON d.categories_id = c.id
   AND d.languageid = {$langid}

WHERE c.active = 1

ORDER BY c.num ASC
";

$categories = $GLOBALS['sp']->getAll($sqlCat);
foreach ($categories as &$cat) {

    $sqlSub = "
    SELECT 
        c.id,
        c.num,
        d.name,
        d.unique_key
    FROM {$GLOBALS['db_sp']}.categories_related cr
    INNER JOIN {$GLOBALS['db_sp']}.categories c
        ON c.id = cr.category_id
       AND c.active = 1
    INNER JOIN {$GLOBALS['db_sp']}.categories_detail d
        ON d.categories_id = c.id
       AND d.languageid = {$langid}
    WHERE cr.related_id = {$cat['id']}
    ORDER BY c.num ASC
    ";

    $cat['sub_categories'] = $GLOBALS['sp']->getAll($sqlSub);
}
unset($cat);

////
if (!empty($categories)) {

    foreach ($categories as &$cat) {

        $catid = (int)$cat['id'];

        $sqlProduct = "
        SELECT DISTINCT
            a.id,
            a.img_thumb_vn,
            a.difficulty,
            d.name AS name_detail,
            d.short_more,
            d.time,
            d.unique_key,

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
            ) AS price,

            p.priceold

        FROM {$GLOBALS['db_sp']}.articlelist AS a

        INNER JOIN {$GLOBALS['db_sp']}.articlelist_categories AS ac
            ON ac.articlelist_id = a.id
           AND ac.categories_id = {$catid}

        LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail AS d
            ON d.articlelist_id = a.id
           AND d.languageid = {$langid}

        LEFT JOIN {$GLOBALS['db_sp']}.articlelist_price AS p
            ON p.articlelist_id = a.id
        
        WHERE a.active = 1
          AND a.comp = 2

        ORDER BY a.num DESC
        ";

        $products = $GLOBALS['sp']->getAll($sqlProduct);

        // format giá
        if (!empty($products)) {
            foreach ($products as &$item) {
                // ❌ xoá thẻ <em> trong short_more
                if (!empty($item['short_more'])) {
                    $item['short_more'] = preg_replace(
                        '/<\/?em[^>]*>/i',
                        '',
                        $item['short_more']
                    );
                }
                // ❌ format giá
                $item['price_formatted'] = (!empty($item['price']) && $item['price'] > 0)
                    ? number_format($item['price'], 0, ',', '.') . '₫'
                    : $contact;

                $item['priceold_formatted'] = !empty($item['priceold'])
                    ? number_format($item['priceold'], 0, ',', '.') . '₫'
                    : '';
            }
            // gom tất cả articlelist_id
            $ids = array_column($products, 'id');
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
            foreach ($products as &$item) {
                $aid = $item['id'];
                $item['gallery'] = isset($galleryMap[$aid]) ? $galleryMap[$aid] : [];
            }
        }

        // gắn sản phẩm vào danh mục
        $cat['products'] = $products;
    }
}

$smarty->assign("home_categories", $categories);

/////
$is_home = 1;
$smarty->assign('is_home', $is_home);

$smarty->display("./head.tpl");
$smarty->display("./header.tpl");
$smarty->display("main/main.tpl");
$smarty->display("./footer.tpl");
$smarty->display("./js.tpl");
