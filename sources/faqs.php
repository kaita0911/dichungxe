<?php
$cat = $cat1;
switch ($act) {
    case "detail":
        $unique_key = $_GET['unique_key'];
        $sql = "select * from $GLOBALS[db_sp].faqs where unique_key='$unique_key' ";
        $rs = $GLOBALS["sp"]->getRow($sql);
        $smarty->assign("detail", $rs);
        $smarty->assign("seo", $rs);
        if (!$rs['id']) { //bi rong la kg ton tai link quay ve trang chu
            PageHome("");
        }
        $cid = $rs['cid'];
        $linkTitle = getLinkTitle($rs['cid'], 1);
        $sqldmcha = "select * from $GLOBALS[db_sp].categories where id =$cid";
        $rsdmcha = $GLOBALS["sp"]->getRow($sqldmcha);
        $smarty->assign("dmcha", $rsdmcha);
        ///////cap nhap so lan xem
        //$arr['view'] = ceil($rs['view']+1);
        //vaUpdate('faqs',$arr,' id='.$rs['id']);
        $sql_cl = " select * from $GLOBALS[db_sp].faqs where active=1 and cid = " . $cid . " and id <> " . $rs['id'] . " order by  id desc limit 50 ";
        $rs_cl = $GLOBALS["sp"]->getAll($sql_cl);
        $smarty->assign("view", $rs_cl);
        $smarty->assign("seo", $rs);
        $template = "faqs/detail.tpl";
        $smarty->assign("linkTitle", $linkTitle);
    break;
    default:
        $linkTitle = getLinkTitle($cat['id'], 1);
        $sql = " select * from $GLOBALS[db_sp].faqs where active=1 and cid = " . $cat['id'] . " order by num asc, id desc ";
        $sql_sum = "select count(id) from $GLOBALS[db_sp].faqs where active=1 and cid = " . $cat['id'];
        $total = $count = ceil($GLOBALS['sp']->getOne($sql_sum));
        $num_rows_page = 12;
        $num_page = ceil($count / $num_rows_page);
        $begin = ($page - 1) * $num_rows_page;
        $iSEGSIZE = 5;
        $linkpg = "";
        if ($num_page > 1) {
            $linkpg = paginatornum($urll, 1, $num_page, $iSEGSIZE, $cat['id'], 'faqs', $path_url, $UrlLink, $idd, $num_rows_page);
            $smarty->assign("Checkpg", "1");
        }
        $sql = $sql . " limit $begin,$num_rows_page";
        $rs = $GLOBALS["sp"]->getAll($sql);
        $template = "faqs/view.tpl";
        $smarty->assign("linkpg", $linkpg);
        $smarty->assign("CheckNull", $count);
        ////////////////////////////////////////
        $smarty->assign("view", $rs);
        $smarty->assign("seo", $cat);
    break;
}
$smarty->assign("linkTitle", $linkTitle);
$smarty->display("./header.tpl");
$smarty->display($template);
$smarty->display("./footer.tpl");
?>