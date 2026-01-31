<?php


switch ($act) {

    case "detail":
        //$unique_key = isset($_GET['unique_key']) ? $_GET['unique_key'] : '';
        $sql = "SELECT a.*, d.*, p.price, p.priceold
                FROM {$GLOBALS['db_sp']}.articlelist AS a
                LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail AS d
                    ON d.articlelist_id = a.id AND d.languageid = {$langid}
                LEFT JOIN {$GLOBALS['db_sp']}.articlelist_price AS p
                    ON p.articlelist_id = a.id
                WHERE d.unique_key = '{$unique_key}'";
        $rs = $GLOBALS["sp"]->getRow($sql);
        $smarty->assign("seo", $rs);
        $smarty->assign("detail", $rs);
        $menu_name   = $rs['name'];
        $smarty->assign('c_ttl', $menu_name);
        //var_dump($rs['articlelist_id']);
        ///////////////lay nhieu hinh/
        $images = $GLOBALS['sp']->getAll("SELECT *
                                    FROM {$GLOBALS['db_sp']}.gallery_sp
                                    WHERE articlelist_id = {$rs['articlelist_id']}
                                    ORDER BY num ASC");
        $smarty->assign('product_images', $images);

        ///Tin liên quan
        $sql_related = "
        SELECT a.*, d.*, p.price, p.priceold , d.name AS name_detail, d.unique_key AS link_detail
        FROM {$GLOBALS['db_sp']}.articlelist AS a
        INNER JOIN {$GLOBALS['db_sp']}.articlelist_categories AS ac
            ON ac.articlelist_id = a.id
        LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail AS d
            ON d.articlelist_id = a.id AND d.languageid = {$langid}
        LEFT JOIN (
            SELECT articlelist_id, MIN(price) AS price, MIN(priceold) AS priceold
            FROM {$GLOBALS['db_sp']}.articlelist_price
            GROUP BY articlelist_id
        ) AS p
            ON p.articlelist_id = a.id
        WHERE a.id != {$rs['articlelist_id']}
          AND ac.categories_id IN (
              SELECT categories_id
              FROM {$GLOBALS['db_sp']}.articlelist_categories
              WHERE articlelist_id = {$rs['articlelist_id']}
          )
          AND a.active = 1
        GROUP BY a.id
        ORDER BY a.num DESC
        ";

        $rs_related = $GLOBALS["sp"]->GetAll($sql_related);
        $smarty->assign("articles_related", $rs_related);

        break;

    case "sub":
        $smarty->assign('data_url', $cat1);
        $smarty->assign('data_comp', $comp_id);
        $smarty->assign('data_cateid', $cate_id);
        $smarty->assign('data_sub', $act);


        // --- AJAX Response ---
        if (isset($_GET['ajax'])) {
            $html = $smarty->fetch("products/list.tpl");
            $pagination = $smarty->fetch("products/pagination.tpl");
            echo json_encode([
                "success" => true,
                "html" => $html,
                "pagination" => $pagination
            ]);
            exit;
        }
        break;

    default:
        // Trang danh sách sản phẩm với phân trang & sort
        $smarty->assign('data_url', $cat1);
        $smarty->assign('data_comp', $comp_id);

        // --- AJAX Response ---
        if (isset($_GET['ajax'])) {
            $html = $smarty->fetch("products/list.tpl");
            $pagination = $smarty->fetch("products/pagination.tpl");
            echo json_encode([
                "success" => true,
                "html" => $html,
                "pagination" => $pagination
            ]);
            exit;
        }
        break;
}
