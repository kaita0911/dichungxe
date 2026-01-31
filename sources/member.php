<?php
//////////////load member//////////////
if(!empty($_SESSION['VIETANHMOBILE_MEMBER_ID'])){
	$sql = "SELECT * FROM $GLOBALS[db_sp].member where id=".$_SESSION['VIETANHMOBILE_MEMBER_ID'];
	$rs = $GLOBALS["sp"]->getRow($sql);
	$mid = $rs['id'];
	$smarty->assign("memberCar",$rs);
}
else{
	if($act=='dang-ky')
		$act = 'dang-ky';
	else
		$act = 'default';
}

switch($act){
	case "don-hang-tu-van":
		$name['title'] = "Danh sách đơn hàng đã tư vấn.";
		$smarty->assign("seo",$name);
		
		$sql = "select * from $GLOBALS[db_sp].orders
				where mid=".$_SESSION['VIETANHMOBILE_MEMBER_ID']."
			 	and mtype=1
			 	and idkhuvuc=$showCity
				and DATE_SUB(NOW(), INTERVAL 30 DAY) <= dated 
				ORDER BY dated DESC, id DESC
		";

		$rs = $GLOBALS["sp"]->getAll($sql);
		$smarty->assign("view",$rs);
		
		$sql_total = "select sum(total) as ThanhTien from $GLOBALS[db_sp].orders
				where mid=".$_SESSION['VIETANHMOBILE_MEMBER_ID']."
			 	and mtype=1
			 	and idkhuvuc=$showCity
				and DATE_SUB(NOW(), INTERVAL 30 DAY) <= dated 
				ORDER BY dated DESC, id DESC
		";
		$total = $GLOBALS["sp"]->getOne($sql_total);
		$smarty->assign("thanhtien",$total);
		//smarty->assign("thanhtien",$total);
		
		$template = "member/don-hang-tu-van.tpl";
	break;
	
	case "danh-sach-yeu-thich":
		$name['title'] = "Danh sách yêu thích.";
		$smarty->assign("seo",$name);
		
		$sql = "select *, pr.id as idsp from $GLOBALS[db_sp].products pr, $GLOBALS[db_sp].colorsize cldd  
				where pr.id in (select idpr from $GLOBALS[db_sp].productlike where mid=".$_SESSION['VIETANHMOBILE_MEMBER_ID'].") 
			 	and pr.id=cldd.idpr
			 	and cldd.idcity=$showCity
		";
		$rs = $GLOBALS["sp"]->getAll($sql);
		$smarty->assign("view",$rs);
		
		$template = "member/danh-sach-yeu-thich.tpl";
	break;
		
	case "quen-mat-khau":
		$template = "member/quen-mat-khau.tpl";
	break;
	
	case "thay-doi-mat-khau":
		$name['title'] = "Thay đổi mật khẩu.";
		$smarty->assign("seo",$name);
		$template = "member/thay-doi-mat-khau.tpl";
	break;
	
	case "thong-tin-tai-khoan":
		if($_POST){
			$arr['name']= striptags($_POST["name"]);
			$arr['phone']= striptags($_POST["phone"]);
			
			$arr['email']= striptags($_POST["email"]);
			$arr['address']= striptags($_POST["address"]);
			
			$arr['day']= trim($_POST["birth_day"]);
			$arr['month']= trim($_POST["birth_month"]);
			$arr['year']= trim($_POST["birth_year"]);
			
			$arr['tinhthanh']= trim($_POST["tinhthanh"]);
			$arr['quanhuyen']= trim($_POST["quanhuyen"]);
			$arr['phuongxa']= trim($_POST["phuongxa"]);
			
			vaUpdate('member',$arr,' id='.$mid);
			$url = "thanh-vien/thong-tin-tai-khoan/";
			PageHome($url);
		}
		$name['title'] = "Thông tin tài khoản.";
		$smarty->assign("seo",$name);
		$template = "member/thong-tin-tai-khoan.tpl";
	break;
	
	case "dang-ky":
		$name['title'] = "Đăng ký thành viên";
		$smarty->assign("seo",$name);
		$template = "member/dang-ky.tpl";
	break;
	
	default:
		$name['title'] = "Đăng Nhập thành viên";
		$smarty->assign("seo",$name);
		$template = "member/dang-nhap.tpl";
	break;
}


//$smarty->assign("seo",$cat1);	

$smarty->assign("checkUser",1);	
$smarty->display("./header.tpl");
$smarty->display($template);
$smarty->display("./footer.tpl");

?>