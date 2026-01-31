<?php
include_once(__DIR__ . "/../includes/config.php");
include_once(__DIR__ . "/../functions/sendOrderEmails.php");


if (isset($_SESSION['contact_success']) && $_SESSION['contact_success']) {
	$smarty->assign('contact_success', true);
	unset($_SESSION['contact_success']); // xóa để không hiển thị lại
} else {
	$smarty->assign('contact_success', false);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	//header('Content-Type: application/json; charset=utf-8');

	$name    = isset($_POST['name']) ? $_POST['name'] : '';
	$phone   = isset($_POST['phone']) ? $_POST['phone'] : '';
	$email   = isset($_POST['email']) ? $_POST['email'] : '';
	$address = isset($_POST['address']) ? $_POST['address'] : '';
	$message = isset($_POST['message']) ? $_POST['message'] : '';

	$GLOBALS['sp']->execute(
		"INSERT INTO {$GLOBALS['db_sp']}.contact (name, phone, email, address, message,dated)
		 VALUES (?, ?, ?, ?, ?,NOW())",
		[
			$name,
			$phone,
			$email,
			$address,
			$message,
		]
	);

	$contactData = [
		'name'    => $name,
		'phone'   => $phone,
		'email'   => $email,
		'address' => $address,
		'message' => $message
	];
	$emails = [
		'admin' => 'kaita0911@gmail.com',
		// 'customer' => $contactData['email'] // nếu muốn gửi phản hồi cho khách
	];

	if (sendContactEmail($contactData, $emails)) {
		$_SESSION['contact_success'] = true;
	} else {
		$error = 'Gửi email thất bại.';
	}
}
$smarty->assign("c_ttl", $contact);
$template = "contact/view.tpl";
$smarty->display("./head.tpl");
$smarty->display("./header.tpl");
$smarty->display($template);
$smarty->display("./footer.tpl");
$smarty->display("./js.tpl");
