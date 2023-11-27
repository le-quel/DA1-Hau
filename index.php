<?php
session_start();
ob_start();

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}
//connect db
require_once "models/pdo.php";
//connect user
require_once "models/user.php";
//connect category
require_once "models/category.php";
//connect product
require_once "models/product.php";
//connect bill
require_once "models/bill.php";

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
                    $_SESSION["s_user"] = $result;
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

        case 'detail':

            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id_product = $_GET['id'];

                $product_detail = get_product_by_id($id_product);
            }
            require_once "views/detail.php";
            break;

        case 'addToCart':

            if (isset($_POST['btn-addToCart']) && $_POST['btn-addToCart']) {
                $id_product = $_POST['id_product'];
                $quantity = $_POST['quantity'];
                $name_product = $_POST['name_product'];
                $price_product = $_POST['price_product'];
                $image_product = $_POST['image_product'];

                $pdCart = array(
                    'id_product' => $id_product,
                    'quantity' => $quantity,
                    'name_product' => $name_product,
                    'price_product' => $price_product,
                    'image_product' => $image_product
                );

                if (!isset($_SESSION["cart"])) {
                    $_SESSION["cart"] = array();
                }

                $product_exists = false;
                foreach ($_SESSION["cart"] as &$item) {
                    if ($item['id_product'] == $id_product) {
                        $item['quantity'] += $quantity;
                        $product_exists = true;
                        break;
                    }
                }

                if (!$product_exists) {
                    array_push($_SESSION["cart"], $pdCart);
                }
                header('Location: index.php?page=cart');
            }
            break;

        case 'cart':

            if (isset($_GET['act']) && $_GET['act'] == 'del1' && isset($_GET['id'])) {
                $id_product = $_GET['id'];

                foreach ($_SESSION["cart"] as $key => $item) {
                    if ($item['id_product'] == $id_product) {
                        unset($_SESSION["cart"][$key]);
                        break;
                    }
                }

                header('Location: index.php?page=cart');
            }

            require_once "views/cart.php";
            break;

        //chức năng đăng xuất
        case 'logout':
            if (isset($_SESSION["s_user"]) && count($_SESSION["s_user"]) > 0) {
                session_destroy();
            }
            header('Location: index.php?page=login');
            break;

        case 'checkout':
            require_once "views/checkout.php";
            break;

        case 'bill':
            if (isset($_POST['btn-bill']) && $_POST['btn-bill']) {
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $payment = $_POST['payment'];
                $transport = $_POST['transport'];
                $total_price = $_POST['total_price'];

                if (isset($_SESSION['user']) && count($_SESSION['user']) > 0) {
                    $id_user = $_SESSION['user']['id'];
                } else {
                    $id_user = null;
                }
                $bill = array(
                    'id_user' => $id_user,
                    'fullname' => $fullname,
                    'email' => $email,
                    'phone' => $phone,
                    'address' => $address,
                    'payment' => $payment,
                    'transport' => $transport,
                    'total_price' => $total_price
                );

                $bill_id = bill_insert($bill);

                foreach ($_SESSION["cart"] as $pdCart) {
                    $bill_detail = array(
                        'bill_id' => $bill_id,
                        'product_id' => $pdCart['id_product'],
                        'quantity' => $pdCart['quantity']
                    );

                    bill_detail_insert($bill_detail);
                }

                unset($_SESSION["cart"]);
                header('Location: index.php?page=success');
            }
            break;

        case 'success':
            require_once "views/success.php";
            break;

        case 'profile':
            if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
                include "views/profile.php";
            }

            break;

        case 'profile_update':
            if (isset($_POST["capnhat"]) && ($_POST["capnhat"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $email = $_POST["email"];
                $id = $_POST["id"];
                $role = 0;
                // xử lý
                updateUser($id, $username, $password, $fullname, $email, $phone, $address, $role);
                $message = 'Cập nhật thông tin thành công';
                $_SESSION["message"] = $message;
                header("Location: index.php?page=profile");
            }

        case 'order':

            if (isset($_POST['btn-search-order']) && $_POST['btn-search-order']) {
                $search_order = $_POST['search-order'];
                $order = bill_search($search_order);
                $id_bill = $order['id'];

                if (isset($order)) {
                    $order_details = bill_detail_search($id_bill);

                    $id_product = $order_details['id_product'];

                    $product_order = get_product_by_id($id_product);
                }
            }

            require_once "views/order.php";
            break;

        default:
            http_response_code(404);
            require_once "views/404.php";
            break;
    }
} else {
    require_once "views/home.php";
}

require_once "views/footer.php";

ob_end_flush();
