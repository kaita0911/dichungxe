<?php
// ------------------------------
// FILE : sources/error-404.php
// ------------------------------

$do  = "error-404";
$act = "view";

// Đường dẫn template hiển thị 404
$smarty->display("./head-404.tpl");
$smarty->display("error-404/view.tpl");
