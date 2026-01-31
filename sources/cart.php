<?php
include_once(__DIR__ . "/../includes/config.php");
include_once(__DIR__ . "/../functions/sendOrderEmails.php");


//session_start();
//include_once('../includes/config.php'); // config, db, Smarty...
$cart_count = 0;
$action = isset($_GET['action']) ? $_GET['action'] : 'view';
if ($action == 'pay') {
    $act = 'pay';
}
$sql_city = $GLOBALS['sp']->getAll("SELECT * FROM {$GLOBALS['db_sp']}.thanhpho WHERE active=1 ORDER BY num ASC");
$smarty->assign("thanhpho", $sql_city);


// Lấy giỏ hàng từ session
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
// ✅ Nếu có sản phẩm trong giỏ
$all_checked = true;
foreach ($cart as $item) {
    if (empty($item['checked'])) {
        $all_checked = false;
        break;
    }
}
$smarty->assign('cart', $cart);
$smarty->assign('all_checked', $all_checked);
$smarty->assign('path_url', $config['BASE_URL']);
//  unset($_SESSION['cart']);
// Xử lý route
switch ($act) {
    // ============================
    // 🧾 THANH TOÁN (AJAX)
    // ============================
    case 'pay':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json; charset=utf-8');

            // Lấy dữ liệu từ form
            $names     = trim(isset($_POST['names']) ? $_POST['names'] : '');
            $phones    = trim(isset($_POST['phones']) ? $_POST['phones'] : '');
            $email    = trim(isset($_POST['email']) ? $_POST['email'] : '');
            $addresss  = trim(isset($_POST['addresss']) ? $_POST['addresss'] : '');
            $city_id      = isset($_POST['city']) ? $_POST['city'] : '';
            $district_id  = isset($_POST['district']) ? $_POST['district'] : '';
            $wards_id     = isset($_POST['wards']) ? $_POST['wards'] : '';
            $get_city = $GLOBALS['sp']->getRow(
                "SELECT * FROM {$GLOBALS['db_sp']}.thanhpho WHERE active=1 AND matp = ?",
                [$city_id]
            );
            $get_district = $GLOBALS['sp']->getRow(
                "SELECT * FROM {$GLOBALS['db_sp']}.quanhuyen WHERE maqh = ?",
                [$district_id]
            );
            $get_ward = $GLOBALS['sp']->getRow(
                "SELECT * FROM {$GLOBALS['db_sp']}.phuongxa WHERE xaid = ?",
                [$wards_id]
            );
            $smarty->assign("thanhpho", $sql_city);

            $city = $get_city['name'];
            $district = $get_district['name'];
            $wards = $get_ward['name'];
            $content   = isset($_POST['content']) ? $_POST['content'] : '';
            $payment   = isset($_POST['radiothanhtoan']) ? $_POST['radiothanhtoan'] : 'COD';
            $shipped   = isset($_POST['shipped']) ? $_POST['shipped'] : 'home';
            $cart      = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

            if (empty($cart)) {
                echo json_encode(['success' => false, 'message' => 'Giỏ hàng trống!']);
                exit;
            }

            // Tính tổng tiền
            $total = 0;
            $totalQty = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
                $totalQty += $item['quantity'];
            }

            // Lưu đơn hàng
            $sql = "INSERT INTO {$GLOBALS['db_sp']}.orders 
                    (name, phone,email, address, thanhpho, quanhuyen, phuongxa, content, qty, descs, phiship, totalend,created_at)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
            $GLOBALS['sp']->execute($sql, [
                $names,
                $phones,
                $email,
                $addresss,
                $city,
                $district,
                $wards,
                $content,
                $totalQty,
                $payment,
                $shipped,
                $total
            ]);
            $order_id = $GLOBALS['sp']->Insert_ID();
            // Lưu chi tiết đơn hàng

            foreach ($cart as $item) {
                // Tạo đường dẫn đầy đủ cho ảnh
                $productImageUrl = $path_url . '/' . ltrim($item['image'], '/');
                $itemTotal = $item['price'] * $item['quantity'];
                $productName = $item['name'];
                if (!empty($item['color_name']) || !empty($item['size_name'])) {
                    $details = [];

                    if (!empty($item['color_name'])) {
                        $details[] = $item['color_name'];
                    }
                    if (!empty($item['size_name'])) {
                        $details[] = $item['size_name'];
                    }

                    $productName .= ' (' . implode(', ', $details) . ')';
                }
                $GLOBALS['sp']->execute(
                    "INSERT INTO {$GLOBALS['db_sp']}.orders_line (order_id, product_name, product_id, product_image, qty, product_price, tamtinh)
                     VALUES (?, ?, ?, ?, ?,?,?)",
                    [$order_id, $productName, $item['id'], $productImageUrl, $item['quantity'], $item['price'], $itemTotal]
                );
            }


            ///////////////////
            $orderData = [
                'id' => $order_id,
                'customer_name' => $names,
                'phone' => $phones,
                'email' => $email,
                'address' => $addresss,
                'wards' => $wards,
                'district' => $district,
                'city' => $city,
                'content' => $content,
                'payment' => $payment,
                'shipped' => $shipped,
                'total' => $total,
                'cart' => $cart
            ];
            $emails = [
                'admin' => 'kaita0911@email.com',
                //'customer' => $phones . '@mail.com' // hoặc email thực tế của khách
            ];
            sendOrderEmails($orderData, $path_url);
            // Xóa giỏ hàng
            unset($_SESSION['cart']);

            echo json_encode([
                'success' => true,
                'redirect' => $config['BASE_URL'] . '/finish'
            ]);
            exit;
        }
        break;

    // ============================
    // 🧾 Trang cảm ơn
    // ============================
    case 'finish':
        $template = "cart/finish.tpl";
        break;

    // ============================
    // 🛒 Trang đặt hàng
    // ============================
    case 'order':
        $template = "cart/order.tpl";
        break;

    // ============================
    // 🛍️ Xem giỏ hàng
    // ============================
    default:

        $template = "cart/list.tpl";
        break;
}
$smarty->assign('do', $do);
$smarty->display("./head-cart.tpl");
$smarty->display($template);
$smarty->display("./js.tpl");
