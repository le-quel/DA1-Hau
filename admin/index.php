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
        case 'user': 
            $user = render_alluser();
            require_once "users/show-user.php";
            break;
        case 'add-user':
            if(isset($_POST['themmoi'])){
               
                $username = $_POST['username'];
                $password = $_POST['password'];
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $role = $_POST['role'];
                addUser($id,$username, $password, $fullname, $email, $phone, $address, $role);
            }
            require_once "users/add-user.php";
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