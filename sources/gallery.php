<?php
$cat = $cat1;
$linkTitle = getLinkTitle($cat['id'],1);
switch($act){

	case "detail":
		$unique_key = $_GET['unique_key'];

		$sql = "select * from $GLOBALS[db_sp].gallery where unique_key='$unique_key'";

		$rs = $GLOBALS["sp"]->getRow($sql);

		$idprdt = $idd = $rs['id'];

		$smarty->assign("detail",$rs);

		if(!$rs['id']){//bi rong la kg ton tai link quay ve trang chu

			PageHome("");

		}

		////////////////load chi tiết hình ảnh//////////////

		/*

		$sqlctg = "select * from $GLOBALS[db_sp].ctgallery where idglry=".$rs['id'];

		$rsctg = $GLOBALS["sp"]->getAll($sqlctg);

		$smarty->assign("viewct",$rsctg);

		*/

		$cid = $rs['cid'];

		$sqldmcha = "select * from $GLOBALS[db_sp].categories where id =$cid";

		$rsdmcha = $GLOBALS["sp"]->getRow($sqldmcha);

		$smarty->assign("dmcha",$rsdmcha);

		

		////////////////load san pham cung loai//////////////

		$sql_cl = " select * from $GLOBALS[db_sp].gallery 

					where cid= ".$cid." 

					and id<>".$rs['id']." 

					and active=1 

					order by num asc, id desc

		";

		$sql_sum = " select  count(id) from $GLOBALS[db_sp].gallery 

					where cid= ".$cid." 

					and id<>".$rs['id']." 

					and active=1 

		";

		

		$total = $count = ceil($GLOBALS['sp']->getOne($sql_sum));

		$num_rows_page = 12;

		$num_page = ceil($count/$num_rows_page);

		$begin = ($page - 1)*$num_rows_page;		

		$iSEGSIZE=5;

		$linkpg = "";

		if($num_page > 1 ){

			$linkpg = paginator($urll,1,$num_page,$iSEGSIZE,$cid,'gallery',$path_url,$UrlLink,$idd,$num_rows_page);

			$smarty->assign("Checkpg","1");

		}

		$sql_cl = $sql_cl." limit $begin,$num_rows_page";

		$rs_cl = $GLOBALS["sp"]->getAll($sql_cl);

		$smarty->assign("linkpg",$linkpg);

		$smarty->assign("CheckNull",$count);		

		$smarty->assign("view",$rs_cl);

		$smarty->assign("seo",$rs);

		$template = "gallery/detail.tpl";

	break;

	

	default:

		//////////////////////////Load san pham/////////////////////////
		$sql = "select * from $GLOBALS[db_sp].gallery where active=1 and cid = ".$cat['id']." order by num asc, id desc ";
		$sql_sum = "select count(id) from $GLOBALS[db_sp].gallery where active=1 and cid = ".$cat['id'];

		$total = $count = ceil($GLOBALS['sp']->getOne($sql_sum));

		$num_rows_page = 100;

		$num_page = ceil($count/$num_rows_page);

		$begin = ($page - 1)*$num_rows_page;		

		$iSEGSIZE=5;

		$linkpg = "";

		if($num_page > 1 ){

			$linkpg = paginator($urll,1,$num_page,$iSEGSIZE,$cat['id'],'gallery',$path_url,$UrlLink,$idd,$num_rows_page);

			$smarty->assign("Checkpg","1");

		}

		$sql = $sql." limit $begin,$num_rows_page";
		$rs = $GLOBALS["sp"]->getAll($sql);
		$smarty->assign("num_rows_page",$num_rows_page);
		$smarty->assign("linkpg",$linkpg);
		$smarty->assign("CheckNull",$count);
		
		
		////////////dự án liên quan///////////////////////
		$sql1 = "select * from $GLOBALS[db_sp].categories where pid = ".$cat['pid']." and id<>".$cat['id']." order by num asc, id desc ";
		$rs1 = $GLOBALS["sp"]->getAll($sql1);
		$smarty->assign("allbumlq",$rs1);
		/////////////////////

		$smarty->assign("view",$rs);

		$smarty->assign("seo",$cat);

		$smarty->assign("total",$total);

		$template = "gallery/view.tpl";

	break;

}	



$smarty->assign("checkFont",1);

$smarty->assign("UrlLink",$UrlLink);

$smarty->assign("linkTitle",$linkTitle);		

$smarty->display("./header.tpl");

$smarty->display($template);

$smarty->display("./footer.tpl");

?>