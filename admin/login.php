<?php
session_start();
ob_start();

require_once "../models/pdo.php";
require_once "../models/user.php";

if (isset($_POST["admin-login"]) && ($_POST["admin-login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $admin = checkUser($username, $password);
    if (isset($admin) && is_array($admin) && count($admin) > 0) {
        extract($admin);

        if ($role == 1) {
            $_SESSION["admin"] = $admin;
            header('Location: index.php');
        } else {
            $message = "Bạn Không Có Quyền Đăng Nhập Trang Quản Trị";
        }
    } else {
        $message = "Tài Khoản Này Không Tồn Tại";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Trị Viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <section class="login my-5">
        <div class="container">
            <div class="img-admin text-center mb-3">
                <img src="../uploads/logo.png" width="300px">
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-container">
                <?php
                if (isset($message) && ($message != "")) {
                    echo '<p class="err"> ' . $message . ' </p>';
                }
                ?>
                <div class="form-group mb-4">
                    <label for="username">Tên Đăng Nhập</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label for="password">Mật Khẩu</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>

                <div class="form-group mb-4">
                    <input type="submit" name="admin-login" value="Đăng Nhập" class="btn-form py-2">
                </div>
            </form>
            
            
        </div>
    </section>
</body>

</html>