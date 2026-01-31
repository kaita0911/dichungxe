<?php
require_once "functions/pagination.php"; // ✅ gọi phan trang
$act = isset($_REQUEST['act']) ? $_REQUEST['act'] : "";
switch ($act) {
	case "edit":

		$id  = $_GET["id"];
		$sql = "select * from $GLOBALS[db_sp].register_info where id=$id";
		$rs = $GLOBALS["sp"]->getRow($sql);

		$smarty->assign("edit", $rs);
		$template = "register_info/edit.tpl";
		//}
		break;

	case 'dellistajax':
		ob_clean(); // Xóa mọi thứ đã in ra trước đó
		$ids = isset($_POST['cid']) ? $_POST['cid'] : '';
		if ($ids !== '') {
			$idList = implode(',', array_map('intval', explode(',', $ids)));

			$GLOBALS["sp"]->query("DELETE FROM {$GLOBALS['db_sp']}.register_info WHERE id IN ($idList)");

			echo json_encode(['success' => true]);
		} else {
			echo json_encode(['success' => false]);
		}
		exit;

	default:
		$where = "";
		$join = "";
		$order = "ORDER BY a.id DESC";

		$page = intval(isset($_GET['page']) ? $_GET['page'] : 1);
		$per_page = 30;

		$result = paginate(
			$GLOBALS["sp"],
			"{$GLOBALS['db_sp']}.register_info as a",
			$join,
			$where,
			$order,
			$page,
			$per_page
		);

		$articles = $result['data'];
		$pagination = $result['pagination'];

		$smarty->assign('articlelist', $articles);
		$smarty->assign('pagination', $pagination);
		$template = "register_info/list.tpl";
		break;
}

$smarty->display("header.tpl");
$smarty->display($template);
$smarty->display("footer.tpl");
