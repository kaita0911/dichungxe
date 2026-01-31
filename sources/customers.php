<?php
switch($act){
	default:	
		if(isset($cat2['id'])){
			$linkTitle =  " 
				<li><a href='".$path_url."/".$cat1["unique_key"]."/' title='".$cat1["title_link"]."'>".$cat1["name_$lang"]."</a></li>  
			";
			$UrlLink = $path_url. "/" .$cat1["unique_key"]. "/" .$cat2["unique_key"]."/";
			$cat = $cat2;
		}
		else{
			$linkTitle =  " ";
			$UrlLink = $path_url. "/" . $cat1["unique_key"]."/";
			$cat = $cat1;			
		}
		$sql = " select * from $GLOBALS[db_sp].customers where active=1 and cid = ".$cat['id']." order by num asc, id desc ";
		$total = $count = ceil(count($GLOBALS["sp"]->getAll($sql)));
		
		$num_rows_page = 200;
		$num_page = ceil($count/$num_rows_page);
		
		$begin = ($page - 1)*$num_rows_page;		
		$iSEGSIZE=5;
		$linkpg = "";
		
		if($num_page > 1 ){
			$linkpg = paginator($urll,1,$num_page,$iSEGSIZE,$cat['id'],'customers',$path_url,$UrlLink,$idd,$num_rows_page);
			$smarty->assign("Checkpg","1");
		}
		
		$sql = $sql." limit $begin,$num_rows_page";
		$rs = $GLOBALS["sp"]->getAll($sql);
		$template = "customers/view.tpl";
		
		$smarty->assign("linkpg",$linkpg);
		$smarty->assign("CheckNull",$count);
		////////////////////////////////////////
		$smarty->assign("view",$rs);
		$smarty->assign("seo",$cat);	
			
	break;
}
$smarty->assign("linkTitle",$linkTitle);			
$smarty->display("./header.tpl");
$smarty->display($template);
$smarty->display("./footer.tpl");

?>