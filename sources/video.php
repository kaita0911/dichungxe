<?php
switch ($act) {

    case "detail":
        $sql = "SELECT a.*, d.*
                FROM {$GLOBALS['db_sp']}.articlelist AS a
                LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail AS d
                    ON d.articlelist_id = a.id AND d.languageid = {$langid}
                WHERE d.unique_key = '{$unique_key}'";
        $rs = $GLOBALS["sp"]->getRow($sql);
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

        break;
    case "sub":

        $smarty->assign('data_url', $cat1);
        $smarty->assign('data_comp', $comp_id);
        $smarty->assign('data_cateid', $cate_id);
        $smarty->assign('data_sub', $act);

        // --- AJAX Response ---
        if (isset($_GET['ajax'])) {
            $html = $smarty->fetch("video/list.tpl");
            $pagination = $smarty->fetch("/pagination.tpl");
            echo json_encode([
                "success" => true,
                "html" => $html,
                "pagination" => $pagination
            ]);
            exit;
        }

        break;

    default:
        //var_dump($cat1);
        $smarty->assign('data_url', $cat1);
        $smarty->assign('data_comp', $comp_id);

        // --- AJAX Response ---
        if (isset($_GET['ajax'])) {
            $html = $smarty->fetch("video/list.tpl");
            $pagination = $smarty->fetch("pagination.tpl");
            echo json_encode([
                "success" => true,
                "html" => $html,
                "pagination" => $pagination
            ]);
            exit;
        }
        // --- SEO & Tiêu đề ---
        //$menu_name = $menu[isset($comp_id]['name']) ? $comp_id]['name'] : '';
        $smarty->assign('c_ttl', $menu_name);

        break;
}
