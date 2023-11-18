<?php
session_start();
ob_start();

require_once "../models/pdo.php";
require_once "../models/user.php";
require_once "../models/thong-ke.php";

if (isset($_SESSION["admin"]) && is_array($_SESSION["admin"]) && (count($_SESSION["admin"]) > 0)) {
    $admin = $_SESSION["admin"];
    extract($admin);
} else {
    header('Location: login.php');
}


require_once "views/header.php";

if (isset($_GET["page"])) {
    $page = $_GET["page"];

    switch ($page) {
        case 'statistical':
            $list_tksp = get_statistical();

            require_once "views/statistical/statistical.php";
            break;

        default:
            require_once "views/home.php";
            break;
    }

} else {
    require_once "views/home.php";
}

require_once "views/footer.php";

ob_end_flush();
?>