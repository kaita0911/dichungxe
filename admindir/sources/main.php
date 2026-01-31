<?php

//trinh duyet
$rows = $GLOBALS['sp']->GetAll("SELECT user_agent FROM {$GLOBALS['db_sp']}.visits");

$browser_counts = [
    'Chrome' => 0,
    'Firefox' => 0,
    'Edge' => 0,
    'Safari' => 0,
    'Opera' => 0,
    'Other' => 0
];

foreach ($rows as $row) {
    $ua = $row['user_agent'];
    if (strpos($ua, 'Chrome') !== false && strpos($ua, 'Edge') === false && strpos($ua, 'OPR') === false) {
        $browser_counts['Chrome']++;
    } elseif (strpos($ua, 'Firefox') !== false) {
        $browser_counts['Firefox']++;
    } elseif (strpos($ua, 'Edge') !== false) {
        $browser_counts['Edge']++;
    } elseif (strpos($ua, 'Safari') !== false && strpos($ua, 'Chrome') === false) {
        $browser_counts['Safari']++;
    } elseif (strpos($ua, 'OPR') !== false || strpos($ua, 'Opera') !== false) {
        $browser_counts['Opera']++;
    } else {
        $browser_counts['Other']++;
    }
}
// Gán biến cho Smarty
$smarty->assign('browser_counts', $browser_counts);
// header('Content-Type: application/json');
// echo json_encode($browser_counts);
// === Thống kê truy cập ===

// Tổng số IP đã truy cập (mỗi IP tính 1 lần)
$total = (int) $GLOBALS['sp']->getOne("
    SELECT COUNT(*) 
    FROM {$GLOBALS['db_sp']}.visits
");

// Đang online (truy cập trong 5 phút gần nhất)
$online = (int) $GLOBALS['sp']->getOne("
    SELECT COUNT(*) 
    FROM {$GLOBALS['db_sp']}.visits
    WHERE last_active >= (NOW() - INTERVAL 5 MINUTE)
");

// Trong tuần hiện tại
$week = (int) $GLOBALS['sp']->getOne("
    SELECT COUNT(*) 
    FROM {$GLOBALS['db_sp']}.visits
    WHERE YEARWEEK(visit_time, 1) = YEARWEEK(NOW(), 1)
");

// Trong tháng hiện tại
$month = (int) $GLOBALS['sp']->getOne("
    SELECT COUNT(*) 
    FROM {$GLOBALS['db_sp']}.visits
    WHERE YEAR(visit_time) = YEAR(NOW())
      AND MONTH(visit_time) = MONTH(NOW())
");


$smarty->assign('total_visits', $total);
$smarty->assign('online_visits', $online);
$smarty->assign('week_visits', $week);
$smarty->assign('month_visits', $month);
////////////Thong ke link truy cap nhieu

$top_urls = $GLOBALS['sp']->getAll("
    SELECT url, COUNT(*) AS total
    FROM {$GLOBALS['db_sp']}.visit_logs
    GROUP BY url
    ORDER BY total DESC
    LIMIT 10
");
$smarty->assign('top_links', $top_urls);
/////

// === Thống kê theo tỉnh/thành phố Việt Nam ===
$region_stats = $GLOBALS['sp']->GetAll("
    SELECT region, COUNT(*) AS total
    FROM {$GLOBALS['db_sp']}.visit_logs
    WHERE country='Vietnam'
    GROUP BY region
    ORDER BY total DESC
");
$smarty->assign('region_stats', $region_stats);


$smarty->display("header.tpl");
$smarty->display("main/main.tpl");
$smarty->display("footer.tpl");
