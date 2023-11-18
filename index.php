<?php
session_start();
ob_start();
//connect db
require_once "models/pdo.php";
//connect user
require_once "models/user.php";
//connect category
require_once "models/category.php";
//connect product
require_once "models/product.php";

//data home
$hot_product = hot_product();

$home_product = get_products_by_home();

$list_product = list_product();

require_once "views/header.php";

if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {
        case 'home':
            require_once "views/home.php";
            break;

        //trang đăng nhập
        case 'login':
            require_once "views/login.php";
            break;

        //chức năng đăng nhập
        case 'login-function':
            if (isset($_POST["btn-login"]) && $_POST["btn-login"]) {
                $username = $_POST["username"];
                $password = $_POST["password"];

                $result = checkUser($username, $password);

                if (is_array($result) && count($result) > 0) {
                    $_SESSION["user"] = $result;
                    extract($result);
                    header("Location: index.php");
                } else {
                    // Đăng nhập không thành công, đặt thông báo lỗi
                    $message = "Tên đăng nhập hoặc mật khẩu không đúng.";
                    $_SESSION["message"] = $message;
                    header('Location: index.php?page=login');
                }
            }
            break;

        //trang đăng ký
        case 'register':

            require_once "views/register.php";
            break;
        //chức năng đăng ký
        case 'register-function':

            if (isset($_POST["btn-register"]) && $_POST["btn-register"]) {
                // Lấy thông tin từ form
                $username = $_POST["username"];
                $email = $_POST["email"];
                $password = $_POST["password"];

                // Kiểm tra xem username đã tồn tại
                if (usernameExists($username)) {

                    $message = "Tên tài khoản đã được sử dụng";
                    $_SESSION["message"] = $message;
                    header('Location: index.php?page=register');
                } elseif (emailExists($email)) {

                    // Kiểm tra email đã tồn tại
                    $message = "Địa chỉ email đã được sử dụng";
                    $_SESSION["message"] = $message;
                    header('Location: index.php?page=register');
                } else {

                    user_insert($username, $email, $password);
                    $message = "Đăng Ký Thành Công! <a href='index.php?page=login'>Đăng Nhập Ngay</a>";
                    $_SESSION["message"] = $message;
                    header('Location: index.php?page=register');
                }
            }
            break;

        case 'product':

            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id_category = $_GET['id'];

                $product_product_page = get_products_by_category($id_category);
            }
            require_once "views/product.php";
            break;

        //chức năng đăng xuất
        case 'logout':
            if (isset($_SESSION["user"]) && count($_SESSION["user"]) > 0) {
                session_destroy();
            }
            header('Location: index.php?page=login');
            break;
    }

} else {
    require_once "views/home.php";
}

require_once "views/footer.php";

ob_end_flush();
?>