<?php
if (isset($_SESSION["admin"]) && is_array($_SESSION["admin"]) && (count($_SESSION["admin"]) > 0)) {
    $admin = $_SESSION["admin"];
    extract($admin);
} else {
    header('Location: login.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Trị Viên</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <header class="header__admin p-3">
        <div class="container">
            <div class="header__logo">
                <a href="index.php">
                    <img src="../uploads/logo.png" width="100%">
                </a>
            </div>

            <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" href="index.php?page=statistical">Thống Kê</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="index.php?page=category">Danh Mục</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="index.php?page=product">Sản Phẩm</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=user">Người Dùng</a>
        </li>

    </ul>

            <div class="header__logout flex">
                <p>Xin chào
                    <?php echo $username; ?>
                </p>
                <a href="login.php">Đăng Xuất</a>
            </div>
        </div>
        <a class="nav-link" href="../index.php">Quay về trang người dùng</a>
    </header>