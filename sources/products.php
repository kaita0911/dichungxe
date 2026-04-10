<?php

switch ($act) {
    case "detail":

        // ==============================
        // 1️⃣ CHI TIẾT SẢN PHẨM
        // ==============================
        $sql = "
            SELECT a.*, d.*, p.price, p.priceold
            FROM {$GLOBALS['db_sp']}.articlelist AS a
            LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail AS d
                ON d.articlelist_id = a.id AND d.languageid = {$langid}
            LEFT JOIN {$GLOBALS['db_sp']}.articlelist_price AS p
                ON p.articlelist_id = a.id
            WHERE d.unique_key = '{$unique_key}'
        ";
        $rs = $GLOBALS["sp"]->getRow($sql);

        // ✅ ID sản phẩm
        $rs_id = $GLOBALS['sp']->getRow("
            SELECT articlelist_id 
            FROM {$GLOBALS['db_sp']}.articlelist_detail 
            WHERE unique_key = '{$unique_key}' AND languageid = {$langid}
        ");
        $article_id = isset($rs_id['articlelist_id']) ? (int)$rs_id['articlelist_id'] : 0;
        // ==============================
        // 🎬 LẤY VIDEO
        // ==============================
        $sql_video = "
        SELECT *
        FROM {$GLOBALS['db_sp']}.articlelist_videos
        WHERE articlelist_id = {$article_id}
        AND active = 1
        ORDER BY num ASC, id DESC
        ";

        $videos = $GLOBALS['sp']->getAll($sql_video);

        $smarty->assign("videos", $videos);
        ////lấy điểm đón định vị
        $sql_diemdon = "
                SELECT *
                FROM {$GLOBALS['db_sp']}.articlelist_diemdon
                WHERE articlelist_id = {$article_id}
                AND languageid = {$langid}
                ORDER BY id ASC
            ";

        $diemdon = $GLOBALS['sp']->getAll($sql_diemdon);
        $smarty->assign("diemdon", $diemdon);
        //lịch trình
        $sql_lichtrinh = "
        SELECT *
        FROM {$GLOBALS['db_sp']}.articlelist_lichtrinh
        WHERE articlelist_id = {$article_id}
        AND languageid = {$langid}
        ORDER BY id ASC
        ";
        $lichtrinh = $GLOBALS['sp']->getAll($sql_lichtrinh);
        // 🔥 Lấy mô tả cho từng lịch trình
        if (!empty($lichtrinh)) {

            foreach ($lichtrinh as $k => $lt) {

                $sql_mota = "
                SELECT mota
                FROM {$GLOBALS['db_sp']}.articlelist_lichtrinh_mota
                WHERE lichtrinh_id = {$lt['id']}
                ORDER BY id ASC
                ";

                $mota = $GLOBALS['sp']->getAll($sql_mota);

                $lichtrinh[$k]['extra'] = array_column($mota, 'mota');
            }
        }

        $smarty->assign("lichtrinhtrongngay", $lichtrinh);

        ////
        $sql_lichtrinh_quadem = "
        SELECT *
        FROM {$GLOBALS['db_sp']}.articlelist_lichtrinh_quadem
        WHERE articlelist_id = {$article_id}
        AND languageid = {$langid}
        ORDER BY day ASC, id ASC
        ";

        $rows = $GLOBALS['sp']->getAll($sql_lichtrinh_quadem);

        $days = [];

        foreach ($rows as $row) {
            $day = $row['day'];

            if (!isset($days[$day])) {
                $days[$day] = [
                    'day_content' => $row['day_content'],
                    'items' => []
                ];
            }

            $days[$day]['items'][] = [
                'name' => $row['name'],
                'content' => $row['content']
            ];
        }

        $smarty->assign("days", $days);
        ////cung đường
        $sql_cungduong = "
        SELECT *
        FROM {$GLOBALS['db_sp']}.articlelist_thongtin
        WHERE articlelist_id = {$article_id}
        AND languageid = {$langid}
        ORDER BY id ASC
        LIMIT 1
        ";

        $cungduong = $GLOBALS['sp']->getRow($sql_cungduong);
        $smarty->assign("cungduong", $cungduong);
        //haihoa
        $sql_haihoa = "
         SELECT *
         FROM {$GLOBALS['db_sp']}.articlelist_haihoa
         WHERE articlelist_id = {$article_id}
         AND languageid = {$langid}
         ORDER BY id ASC
         LIMIT 1
         ";

        $haihoa = $GLOBALS['sp']->getRow($sql_haihoa);
        $smarty->assign("haihoa", $haihoa);
        //BOLAC
        $sql_bolac = "
         SELECT *
         FROM {$GLOBALS['db_sp']}.articlelist_bolac
         WHERE articlelist_id = {$article_id}
         AND languageid = {$langid}
         ORDER BY id ASC
         LIMIT 1
         ";
        $bolac = $GLOBALS['sp']->getRow($sql_bolac);
        $smarty->assign("bolac", $bolac);
        // ===== LẤY DANH SÁCH VÉ =====
        $sql_ticket = "
        SELECT *
        FROM {$GLOBALS['db_sp']}.articlelist_bolac_2
        WHERE articlelist_id = {$article_id}
        AND languageid = {$langid}
        ORDER BY id ASC
        ";

        $tickets = $GLOBALS['sp']->getAll($sql_ticket);

        $smarty->assign("tickets", $tickets);
        // ====== LỊCH TRÌNH ======

        // Lấy nội dung bài viết
        $content = $rs['content'];
        // Gọi hàm tạo mục lục
        list($newContent, $toc) = generate_toc($content);
        //tag
        $tags = [];
        if (!empty($rs['keyword'])) {
            $rawTags = explode(',', $rs['keyword']);
            foreach ($rawTags as $t) {
                $t = trim($t);
                if ($t !== '') {
                    $slug = removeVietnameseTones($t);
                    $tags[] = ['name' => $t, 'slug' => $slug];
                }
            }
        }
        $smarty->assign('tags', $tags);
        /////giá///
        if ($rs) {
            $rs['price_formatted']    = !empty($rs['price']) ? number_format($rs['price'], 0, ',', '.') : $contact;
            $rs['priceold_formatted'] = !empty($rs['priceold']) ? number_format($rs['priceold'], 0, ',', '.') : '';
            $smarty->assign("detail", $rs);
            $smarty->assign("seo", $rs);
            $smarty->assign("c_ttl", $rs['name']);
        }


        //$smarty->assign('article_id', $article_id);
        //$smarty->assign('total_images', $article_id);
        // lấy mã sản phẩm
        $codes = $sp->getAll("
            SELECT *
            FROM {$GLOBALS['db_sp']}.articlelist_codes
            WHERE articlelist_id = $article_id
            ORDER BY id ASC
            ");

        $valid_codes = [];

        foreach ($codes as $code) {

            // ❌ bỏ nếu không có mã sản phẩm
            if (empty($code['code'])) {
                continue;
            }

            // lấy màu + giá
            $variants = $sp->getAll("
                SELECT *
                FROM {$GLOBALS['db_sp']}.articlelist_attributes
                WHERE code_id = {$code['id']}
                ORDER BY id ASC
            ");

            // ❌ mã không có màu → bỏ
            if (empty($variants)) {
                continue;
            }

            foreach ($variants as &$v) {

                // có giá → format
                if (!empty($v['price']) && $v['price'] > 0) {
                    $v['price_formatted'] = number_format(
                        $v['price'],
                        0,
                        ',',
                        '.'
                    ) . '₫';
                } else {
                    // không có giá → liên hệ
                    $v['price_formatted'] = 'Tạm hết hàng';
                }
            }
            unset($v);

            $code['variants'] = $variants;
            $valid_codes[] = $code;
        }

        $smarty->assign('product_codes', $valid_codes);

        // ✅ Hình ảnh
        $sqlCount = "
            SELECT COUNT(*) 
            FROM {$GLOBALS['db_sp']}.gallery_sp
            WHERE articlelist_id = {$article_id}
        ";
        $totalImages = (int)$GLOBALS['sp']->getOne($sqlCount);

        $smarty->assign('total_images', $totalImages);
        $sql = "
            SELECT *
            FROM {$GLOBALS['db_sp']}.gallery_sp
            WHERE articlelist_id = {$article_id}
            ORDER BY num ASC
        ";
        $smarty->assign('product_images', $GLOBALS['sp']->getAll($sql));
        ////san pham lien quan
        $cat_ids = $GLOBALS['sp']->GetCol("
            SELECT categories_id
            FROM {$GLOBALS['db_sp']}.articlelist_categories
            WHERE articlelist_id = {$article_id}
        ");

        if (empty($cat_ids)) {
            $smarty->assign('articles_related', []);
            return;
        }

        $cat_ids_str = implode(',', array_map('intval', $cat_ids));

        $related_cat_ids = $GLOBALS['sp']->GetCol("
            SELECT DISTINCT
                CASE
                    WHEN category_id IN ({$cat_ids_str}) THEN related_id
                    ELSE category_id
                END
            FROM {$GLOBALS['db_sp']}.categories_related
            WHERE category_id IN ({$cat_ids_str})
            OR related_id IN ({$cat_ids_str})
        ");

        $all_cat_ids = array_unique(array_merge($cat_ids, $related_cat_ids));
        $all_cat_ids_str = implode(',', array_map('intval', $all_cat_ids));

        $sql_related = "
        SELECT DISTINCT
            a.id,
            a.img_thumb_vn, a.difficulty,
            d.name AS name_detail,
            d.unique_key,
            p.priceold,
            d.short_more,
            d.time,
        
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
        
            CASE
                WHEN ac.categories_id IN ({$cat_ids_str}) THEN 0
                ELSE 1
            END AS priority
        
        FROM {$GLOBALS['db_sp']}.articlelist a
        
        INNER JOIN {$GLOBALS['db_sp']}.articlelist_categories ac
            ON ac.articlelist_id = a.id
           AND ac.categories_id IN ({$all_cat_ids_str})
        
        LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail d
            ON d.articlelist_id = a.id
           AND d.languageid = {$langid}
        
        LEFT JOIN (
            SELECT articlelist_id, MIN(price) AS price, MIN(priceold) AS priceold
            FROM {$GLOBALS['db_sp']}.articlelist_price
            GROUP BY articlelist_id
        ) p ON p.articlelist_id = a.id
        
        WHERE a.active = 1
          AND a.comp = 2
          AND a.id != {$article_id}
        
        ORDER BY priority ASC, a.num DESC
        ";

        $rs_related = $GLOBALS['sp']->GetAll($sql_related);


        if (!empty($rs_related)) {
            foreach ($rs_related as &$item) {
                // ❌ xoá thẻ <em> trong short_more
                if (!empty($item['short_more'])) {
                    $item['short_more'] = preg_replace(
                        '/<\/?em[^>]*>/i',
                        '',
                        $item['short_more']
                    );
                }
                // ❌ format giá
                $item['price_formatted']    = !empty($item['price']) ? number_format($item['price'], 0, ',', '.') . '₫' : $contact;
                $item['priceold_formatted'] = !empty($item['priceold']) ? number_format($item['priceold'], 0, ',', '.') . '₫' : '';
            }
            // gom tất cả articlelist_id
            $ids = array_column($rs_related, 'id');
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
            foreach ($rs_related as &$item) {
                $aid = $item['id'];
                $item['gallery'] = isset($galleryMap[$aid]) ? $galleryMap[$aid] : [];
            }
        }
        $smarty->assign("articles_related", $rs_related);
        // Gán vào Smarty
        $smarty->assign('content', $newContent);
        $smarty->assign('toc', $toc);
        $template = "products/detail.tpl";
        break;

        // ==============================
        // 2️⃣ DANH SÁCH (SUB + DEFAULT)
        // ==============================
    default:
        $isSub = ($act == 'sub');
        $template = $isSub ? "products/sub.tpl" : "products/view.tpl";
        $joinCate  = $isSub ? "INNER JOIN {$GLOBALS['db_sp']}.articlelist_categories AS ac ON ac.articlelist_id = a.id" : "";
        $whereCate = $isSub ? "AND ac.categories_id = {$cate_id}" : "";
        // ✅ Lấy thông tin danh mục hiện tại
        $sqlCate = "SELECT d.name, d.content
            FROM {$GLOBALS['db_sp']}.categories AS c
            LEFT JOIN {$GLOBALS['db_sp']}.categories_detail AS d
                ON d.categories_id = c.id AND d.languageid = {$langid}
            WHERE c.id = {$cate_id}
            LIMIT 1
            ";
        $cateInfo = $GLOBALS["sp"]->getRow($sqlCate);

        // Gán qua Smarty
        $smarty->assign("cateInfo", $cateInfo);
        // --- SORT ---
        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'id_desc';
        $smarty->assign("sort", $sort);

        switch ($sort) {
            case 'price_asc':
                $orderBy = 'p.price ASC';
                break;
            case 'price_desc':
                $orderBy = 'p.price DESC';
                break;
            case 'name_asc':
                $orderBy = 'd.name ASC';
                break;
            case 'name_desc':
                $orderBy = 'd.name DESC';
                break;
            case 'id_asc':
                $orderBy = 'a.id ASC';
                break;
            default:
                $orderBy = 'a.num DESC';
                break;
        }

        // --- PAGINATION ---
        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $rs_page = $GLOBALS["sp"]->getRow("SELECT phantrang FROM {$GLOBALS['db_sp']}.component WHERE id = 2");
        $per_Page = !empty($rs_page['phantrang']) ? (int)$rs_page['phantrang'] : 20;
        $start = ($page - 1) * $per_Page;

        // --- QUERY CHÍNH ---
        $sql = "
            SELECT a.id, a.num, a.img_thumb_vn, a.difficulty, d.short_more,
            d.time, d.name AS name_detail, d.unique_key, p.priceold, 
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

            FROM {$GLOBALS['db_sp']}.articlelist AS a
            LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail AS d 
                ON a.id = d.articlelist_id AND d.languageid = {$langid}
            LEFT JOIN {$GLOBALS['db_sp']}.articlelist_price AS p 
                ON p.articlelist_id = a.id
            {$joinCate}
            WHERE a.active = 1 AND a.comp = 2 {$whereCate}
            ORDER BY {$orderBy}
            LIMIT {$start}, {$per_Page}
        ";

        $articles = $GLOBALS['sp']->getAll($sql);
        if (!empty($articles)) {
            foreach ($articles as &$item) {
                // ❌ xoá thẻ <em> trong short_more
                if (!empty($item['short_more'])) {
                    $item['short_more'] = preg_replace(
                        '/<\/?em[^>]*>/i',
                        '',
                        $item['short_more']
                    );
                }
                // ❌ format giá
                $item['price_formatted']    = !empty($item['price']) ? number_format($item['price'], 0, ',', '.') . '₫' : $contact;
                $item['priceold_formatted'] = !empty($item['priceold']) ? number_format($item['priceold'], 0, ',', '.') . '₫' : '';
            }
            // gom tất cả articlelist_id
            $ids = array_column($articles, 'id');
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
            foreach ($articles as &$item) {
                $aid = $item['id'];
                $item['gallery'] = isset($galleryMap[$aid]) ? $galleryMap[$aid] : [];
            }
        }
        $smarty->assign("view", $articles);

        // --- COUNT ---
        $sql_count = "
            SELECT COUNT(*)
            FROM {$GLOBALS['db_sp']}.articlelist AS a
            {$joinCate}
            WHERE a.active = 1 AND a.comp = 2 {$whereCate}
        ";
        $total = (int)$GLOBALS['sp']->getOne($sql_count);
        $totalPages = $total > 0 ? ceil($total / $per_Page) : 1;

        // --- PAGINATION HTML ---
        $baseUrl = strtok($_SERVER["REQUEST_URI"], '?');
        $paginationHtml = renderPagination($page, $totalPages, $baseUrl);

        $smarty->assign(array(
            "totalPages"   => $totalPages,
            "Checkpg"      => $totalPages > 1 ? 1 : 0,
            "currentPage"  => $page,
            "pagination"   => $paginationHtml,
        ));
        break;
        $is_page = 1;
        $smarty->assign('is_page', $is_page);
}

$smarty->assign('do', $do);
$smarty->display("./head.tpl");
$smarty->display("./header.tpl");
$smarty->display($template);
$smarty->display("./footer.tpl");
$smarty->display("./js.tpl");
