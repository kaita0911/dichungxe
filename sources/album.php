<?php

$cat = $cat1;

switch ($act) {

    case "detail":

        $unique_key = $_GET['unique_key'];

        $sql = "select * from $GLOBALS[db_sp].articlelist where unique_key='$unique_key' ";

        $rs = $GLOBALS["sp"]->getRow($sql);

        $item_id = $rs['id'];

        $smarty->assign("view_image", $rs);

        ///////////get noi dung 2 ngon ngu///////////////////

        $sql1 = "select * from $GLOBALS[db_sp].articlelist_detail where languageid= ".$numlang." and articlelist_id = '$item_id' ";

        $rs1 = $GLOBALS["sp"]->getRow($sql1);

        $smarty->assign("detail", $rs1);

        $smarty->assign("seo", $rs1);

        ///////////get date////////////

        $smarty->assign("date", $rs);

        if (!$rs['id']) { //bi rong la kg ton tai link quay ve trang chu

            PageHome("");

        }
         $sql = "select * from $GLOBALS[db_sp].articlelist where unique_key='$unique_key' ";

        $rs = $GLOBALS["sp"]->getRow($sql);

        $item_id = $rs['id'];

        $smarty->assign("image_sp", $rs);
        ////////////////Lay hinh anh san pham///////////////////////////

        $sqlha = "select * from $GLOBALS[db_sp].gallery_sp where articlelist_id  =$item_id ";



        $rsha = $GLOBALS["sp"]->getAll($sqlha);



        $smarty->assign("viewgallery",$rsha);

        $smarty->assign("countgallery", ceil(count($rsha)));

        //$smarty->assign("dmcha", $rsdmcha);

        //cap nhap so lan xem

        $arr['view'] = ceil($rs['view'] + 1);

        vaUpdate('articlelist', $arr, ' id=' . $rs['id']);

        ///////Tin lien quan

        $sqldmcha = "select * from $GLOBALS[db_sp].articlelist_categories where articlelist_id = $item_id";

        $rsdmcha = ceil(count($GLOBALS["sp"]->getAll($sqldmcha)));

        if ($rsdmcha == 0) {

            $sql_cl = "SELECT * from $GLOBALS[db_sp].articlelist where active = 1 and comp=" . $rs['comp'] . " and id != $item_id  order by id desc ";

        } else if ($rsdmcha == 1) {

            $sql = "select * from $GLOBALS[db_sp].articlelist_categories where articlelist_id = $item_id";

            $rs = $GLOBALS["sp"]->getRow($sql);

            $sql_cl = "SELECT * from $GLOBALS[db_sp].articlelist where active = 1 and id != " . $item_id . " and id IN (select articlelist_id from $GLOBALS[db_sp].articlelist_categories where categories_id=" . $rs['categories_id'] . ") order by id desc ";

        } else {

            $sql1 = "SELECT * from $GLOBALS[db_sp].categories where id IN (select categories_id from $GLOBALS[db_sp].articlelist_categories where articlelist_id = $item_id)";

            $rs1 = $GLOBALS["sp"]->getAll($sql1);

            foreach ($rs1 as $item1) {

                if ($item1['parentid'] > 0) {

                    $sql_cl = "SELECT * from $GLOBALS[db_sp].articlelist where active = 1 and id != " . $item_id . " and id IN (select articlelist_id from $GLOBALS[db_sp].articlelist_categories where categories_id=" . $item1['id'] . ") order by id desc ";

                }

            }

        }

        $rs_cl = $GLOBALS["sp"]->getAll($sql_cl);

        $smarty->assign("view", $rs_cl);

       

        $template = "album/detail.tpl";

        break;

    default:

        $sql = "SELECT * from $GLOBALS[db_sp].articlelist where active = 1 and  id IN (select articlelist_id from $GLOBALS[db_sp].articlelist_categories where categories_id=" . $cat1['id'] . ") order by id desc ";

        $sql_sum = "SELECT count(id) from $GLOBALS[db_sp].articlelist where id IN (select articlelist_id from $GLOBALS[db_sp].articlelist_categories where categories_id=" . $cat1['id'] . " and active=1) order by id desc ";

        $total = $total_page = $count = ceil($GLOBALS['sp']->getOne($sql_sum)); ///total item///

        $num_rows_page = 24; ///so item tren 1 trang

        $num_page = ceil($count / $num_rows_page); /////Tong so trang///

        $linkpg = "";

        // Giới hạn current_page trong khoảng 1 đến total_page

        if (!isset($_GET['cat2'])) {

            $page = 1;

        } else {

            $page = $_GET['cat2'];

        }

        // Tìm Start

        $begin = ($page - 1) * $num_rows_page;

        if ($num_page > 1) {

            $linkpg = pagi($page, $num_page, $cat1['unique_key']);

            $smarty->assign("Checkpg", "1");

        }

        $sql = $sql . "limit $begin,$num_rows_page";

        $smarty->assign("linkpg", $linkpg);

        /////////////////////

        $rs = $GLOBALS["sp"]->getAll($sql);

        $smarty->assign("view", $rs);

        $smarty->assign("seo", $cat1);

        $smarty->assign("CheckNull", $count);

        $template = "project/view.tpl";

        break;

    }

    $smarty->display("./header.tpl");

    $smarty->display($template);

    $smarty->display("./footer.tpl");

?>