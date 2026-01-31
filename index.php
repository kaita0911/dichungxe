<?php
session_start();
include_once(__DIR__ . "/includes/config.php");
include_once(__DIR__ . "/functions/function.php");
include_once(__DIR__ . "/includes/get_languages.php");
include_once(__DIR__ . "/functions/allmenu.php");
include_once(__DIR__ . "/includes/track_visit.php");

// Lấy param
$cat1       = isset($_GET['cat1']) ? $_GET['cat1'] : '';
$unique_key = isset($_GET['unique_key']) ? $_GET['unique_key'] : '';

// Lấy menu 1 lần
$menu_list = $GLOBALS['sp']->getAll("
    SELECT m.id, m.comp, m.has_sub, d.name AS name_detail, d.unique_key AS unique_key_detail
    FROM {$GLOBALS['db_sp']}.menu AS m
    LEFT JOIN {$GLOBALS['db_sp']}.menu_detail AS d
      ON d.menu_id = m.id AND d.languageid = {$langid}
");

// ==============================
// Hàm xác định route
// ==============================
function determineRoute($cat1, $unique_key, $menu_list, $langid)
{
    $result = [
        'do'        => 'main',
        'act'       => 'main',
        'page_flag' => 'home',
        'comp_id'   => 0,
        'cate_id'   => 0,
        'menu_name' => 'Trang chủ',
        'unique_key' => ''
    ];

    $fixed_pages = ['404', 'pay', 'finish', 'order', 'cart', 'mua-nhanh', 'addajax', 'lien-he', 'tim-kiem'];

    // Kiểm tra menu
    foreach ($menu_list as $item) {
        if ($item['unique_key_detail'] === $cat1) {
            $result['menu_name'] = $item['name_detail'];
            $result['comp_id']   = $item['comp'];
            $url = $item['unique_key_detail'];

            if (in_array($url, $fixed_pages)) {
                switch ($url) {
                    case '404':
                        $result['do'] = 'error-404';
                        break;
                    case 'cart':
                        $result['do'] = 'cart';
                        $result['act'] = 'list';
                        break;
                    case 'mua-nhanh':
                    case 'thanh-toan':
                        $result['do'] = 'cart';
                        $result['act'] = 'thanh-toan';
                        break;
                    case 'order':
                        $result['do'] = 'cart';
                        $result['act'] = 'order';
                        break;
                    case 'lien-he':
                        $result['do'] = 'contact';
                        $result['act'] = 'view';
                        break;
                    case 'tim-kiem':
                        $result['do'] = 'search';
                        $result['act'] = 'list';
                        break;
                    case 'finish':
                        $result['do'] = 'cart';
                        $result['act'] = 'finish';
                        $result['menu_name'] = 'Hoàn tất';
                        break;
                }
                $result['page_flag'] = $result['do'];
                return $result;
            }

            // Nếu menu bình thường → lấy component
            if (!empty($item['comp'])) {
                $comp = $GLOBALS['sp']->getRow("SELECT do FROM {$GLOBALS['db_sp']}.component WHERE id={$item['comp']}");
                if ($comp) {
                    $result['do'] = $comp['do'];
                    $result['act'] = 'view';
                    $result['page_flag'] = $comp['do'];
                }
            }
            return $result;
        }
    }

    // Nếu cat1 là fixed page
    if (!empty($cat1) && in_array($cat1, $fixed_pages)) {
        switch ($cat1) {
            case '404':
                $result['do'] = 'error-404';
                $result['menu_name'] = '404';
                break;
            case 'cart':
                $result['do'] = 'cart';
                $result['act'] = 'list';
                $result['menu_name'] = 'Giỏ hàng';
                break;
            case 'mua-nhanh':
            case 'thanh-toan':
                $result['do'] = 'cart';
                $result['act'] = 'thanh-toan';
                $result['menu_name'] = 'Thanh toán';
                break;
            case 'order':
                $result['do'] = 'cart';
                $result['act'] = 'order';
                $result['menu_name'] = 'Đặt hàng';
                break;
            case 'lien-he':
                $result['do'] = 'contact';
                $result['act'] = 'view';
                break;
            case 'tim-kiem':
                $result['do'] = 'search';
                $result['act'] = 'list';
                $result['menu_name'] = 'Search';
                break;
            case 'finish':
                $result['do'] = 'cart';
                $result['act'] = 'finish';
                $result['menu_name'] = 'Hoàn tất';
                break;
        }
        $result['page_flag'] = $result['do'];
        return $result;
    }

    // Kiểm tra danh mục
    if (!empty($cat1)) {
        $category = $GLOBALS['sp']->getRow("
            SELECT c.id, c.comp, d.name, d.unique_key
            FROM {$GLOBALS['db_sp']}.categories AS c
            LEFT JOIN {$GLOBALS['db_sp']}.categories_detail AS d
              ON d.categories_id=c.id AND d.languageid={$langid}
            WHERE d.unique_key='{$cat1}' LIMIT 1
        ");
        if ($category) {
            $comp = $GLOBALS['sp']->getRow("SELECT do, act FROM {$GLOBALS['db_sp']}.component WHERE id={$category['comp']}");
            $result['do']        = $comp['do'];
            $result['act']       = 'sub';
            $result['page_flag'] = $comp['do'];
            $result['comp_id']   = $category['comp'];
            $result['cate_id']   = $category['id'];
            $result['menu_name'] = $category['name'];
            return $result;
        }
    }

    // Kiểm tra bài viết
    if (!empty($unique_key)) {
        $article = $GLOBALS['sp']->getRow("
            SELECT a.active, d.articlelist_id, d.unique_key, a.comp
            FROM {$GLOBALS['db_sp']}.articlelist AS a
            LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail AS d
              ON d.articlelist_id=a.id AND d.languageid={$langid}
            WHERE d.unique_key='{$unique_key}' AND a.active=1
        ");
        if ($article) {
            $comp = $GLOBALS['sp']->getRow("SELECT do, act FROM {$GLOBALS['db_sp']}.component WHERE id={$article['comp']}");
            $result['do']        = $comp['do'];
            $result['act']       = 'detail';
            $result['page_flag'] = $comp['do'];
            $result['comp_id']   = $article['comp'];
            $result['unique_key'] = $unique_key;
        } else {
            $result['do']        = 'error-404';
            $result['act']       = 'view';
            $result['menu_name'] = '404';
            $result['page_flag'] = 'home';
        }
        return $result;
    }
    // ===== Thêm kiểm tra tag =====
    if (!empty($cat1) && strpos($cat1, 'tag/') === 0) {

        $slug = substr($cat1, 4); // bỏ 'tags/' ra
        $result['do']        = 'tag';
        $result['act']       = 'view';
        $result['page_flag'] = 'tag';
        $result['unique_key'] = $slug;
        $result['menu_name'] = 'Tag: ' . str_replace('-', ' ', $slug);
        return $result;
    }


    return $result; // default home
}

// ==============================
// Xác định route
// ==============================
$route = determineRoute($cat1, $unique_key, $menu_list, $langid);
// Nếu URL không thuộc menu, category, article, tag → chuyển về 404
if ($route['do'] === 'main' && !empty($cat1)) {
    $do  = 'error-404';
    $act = 'view';
    $page_flag = 'home';
    $menu_name = '404';
} else {
    $do       = $route['do'];
    $act      = $route['act'];
    $comp_id  = $route['comp_id'];
    $cate_id  = $route['cate_id'];
    $page_flag = $route['page_flag'];
    $menu_name = $route['menu_name'];
}

if ($route['page_flag'] == 'search') $page_flag = 'products';

$smarty->assign([
    'c_ttl'     => $menu_name,
    'page_flag' => $page_flag
]);

// ==============================
// Breadcrumbs
// ==============================
$breadcrumbs = buildBreadcrumb($langid, $path_url, $cat1, $unique_key);
$smarty->assign('breadcrumbs', $breadcrumbs);
$smarty->assign('unique_key', $unique_key);
// ==============================
// Load source file
// ==============================
$source_file = "./sources/{$do}.php";
if (!file_exists($source_file)) {
    $do = 'error-404';
    $act = 'main';
    $source_file = "./sources/{$do}.php";
}
require($source_file);
