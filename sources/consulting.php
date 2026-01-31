<?php
switch ($act) {

    case "detail":
        $sql = "SELECT a.*, d.*
                FROM {$GLOBALS['db_sp']}.articlelist AS a
                LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail AS d
                    ON d.articlelist_id = a.id AND d.languageid = {$langid}
                WHERE d.unique_key = '{$unique_key}'";
        $rs = $GLOBALS["sp"]->getRow($sql);
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
        ///Tin liên quan
        $sql_related = "SELECT a.id, a.comp, a.num, a.unique_key, a.img_thumb_vn, a.dated,
         d.name AS name_detail, d.unique_key
        FROM {$GLOBALS['db_sp']}.articlelist AS a
        LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail AS d
        ON d.articlelist_id = a.id AND d.languageid = {$langid}
        WHERE a.id != {$rs['articlelist_id']} AND a.comp = {$rs['comp']}  AND a.active = 1
        ORDER BY a.num DESC";
        $rs_related = $GLOBALS["sp"]->getAll($sql_related);
        $smarty->assign("articles_related", $rs_related);

        $smarty->assign("detail", $rs);
        $smarty->assign("seo", $rs);
        $menu_name = $rs['name'];
        $smarty->assign('c_ttl', $menu_name);

        // Gán vào Smarty
        $smarty->assign('content', $newContent);
        $smarty->assign('toc', $toc);
        $template = "consulting/detail.tpl";
        break;
    default:
        $isSub = ($act == 'sub');
        $template = $isSub ? "consulting/sub.tpl" : "consulting/view.tpl";
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

        // --- PAGINATION ---
        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $rs_page = $GLOBALS["sp"]->getRow("SELECT phantrang FROM {$GLOBALS['db_sp']}.component WHERE id = 2");
        $per_Page = !empty($rs_page['phantrang']) ? (int)$rs_page['phantrang'] : 20;
        $start = ($page - 1) * $per_Page;

        // --- QUERY CHÍNH ---
        $sql = "
            SELECT a.id, a.num, a.img_thumb_vn,a.dated,
                   d.name AS name_detail, d.unique_key, d.short AS short_detail
            FROM {$GLOBALS['db_sp']}.articlelist AS a
            LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail AS d 
                ON a.id = d.articlelist_id AND d.languageid = {$langid}
            {$joinCate}
            WHERE a.active = 1 AND a.comp = 1 {$whereCate}
            ORDER BY a.num DESC
            LIMIT {$start}, {$per_Page}
        ";

        $articles = $GLOBALS['sp']->getAll($sql);
        $smarty->assign("view", $articles);

        // --- COUNT ---
        $sql_count = "
            SELECT COUNT(*)
            FROM {$GLOBALS['db_sp']}.articlelist AS a
            {$joinCate}
            WHERE a.active = 1 AND a.comp = 1 {$whereCate}
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
        $is_page = 1;
        $smarty->assign('is_page', $is_page);
        break;
}
$smarty->display("./head.tpl");
$smarty->display("./header.tpl");
$smarty->display($template);
$smarty->display("./footer.tpl");
$smarty->display("./js.tpl");
