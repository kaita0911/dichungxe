<?php
////load menu Top////
$str = "";
$sql = "select * from $GLOBALS[db_sp].categories where pid=2 and active=1 and name_$lang<>'' order by num asc";
$rs = $GLOBALS["sp"]->getAll($sql);
foreach($rs as $item){
	$list = "";
	$list1 = "";
	
	$sql1 = "select * from $GLOBALS[db_sp].categories where pid=".$item['id']." and active = 1 and name_$lang<>''  order by num asc, id desc ";
	$rs1 = $GLOBALS["sp"]->getAll($sql1);
	
	if($item['id'] == 3){ //la trang index
		$list.="
				<p> 
					<a href='".$path_url."/".$item['unique_key_'.$lang].".html' title='".$item['title_link_'.$lang]."' title='".$item['title_link_'.$lang]."' >
						<strong>".$item['name_'.$lang]."</strong>
					</a> 
				 </p>
		";
	}
	
	else{
		$list.="
			<p> 
				<a href='".$path_url."/".$item['unique_key_'.$lang]."/' title='".$item['title_link_'.$lang]."' title='".$item['title_link_'.$lang]."' >
					<strong>".$item['name_'.$lang]."</strong>
				</a>
			</p>
		";
	}
	
	$i = 1;
	if(ceil(count($rs1)) > 0){
		foreach($rs1 as $item1){
			
			$list1.="
				<li>
					<a  href='".$path_url."/".$item['unique_key_'.$lang]."/".$item1['unique_key_'.$lang]."/' title='".$item1['title_link_'.$lang]."'> 
						<strong>".$item1['name_'.$lang]."</strong>
					</a>
				</li>
			";
			
		}
		
		$list1 = " <ul>" .$list1. "</ul> <div class='Clear'></div>";
	}
	$str.= "<div class='MainSiteMap'>".$list . $list1."</div>";
	
}
$smarty->assign("SiteMap",$str);

	
////End menu top////

if(isset($cat2['id'])){
	$linkTitle =  "  <div class='Link'><a href='" . $path_url. "/" .$cat1["unique_key_$lang"]. "/' title='".$cat1["title_link_$lang"]."'>" .$cat1["name_$lang"]. "</a></div> ";
	$UrlLink = $path_url. "/" .$cat1["unique_key_$lang"]. "/" .$cat2["unique_key_$lang"];
	$cat = $cat2;
}
else{
	$linkTitle =  " ";
	$UrlLink = $path_url. "/" . $cat1["unique_key_$lang"];
	$cat = $cat1;
}
$smarty->assign("seo",$cat);
$smarty->assign("UrlLink",$UrlLink);
$smarty->assign("linkTitle",$linkTitle);

$smarty->display("./header.tpl");
$smarty->display("sitemap/view.tpl");
$smarty->display("./footer.tpl");


?>