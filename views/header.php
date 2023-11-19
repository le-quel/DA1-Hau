<?php
$html_account = '';

if (isset($_SESSION['user'])) {
    $html_account = '
    <div class="header__top-account flex">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
  
        <a href="index.php?page=logout">Đăng Xuất</a>
    </div>
    ';
} else {
    $html_account = '
    <div class="header__top-account">
        <a href="index.php?page=register">Đăng Ký</a>
        |
        <a href="index.php?page=login">Đăng Nhập</a>
    </div>
    ';
}

$html_categories = '';

$categories = category_select_all();
foreach ($categories as $category) {
    extract($category);

    $html_categories .= '
    <li><a href="index.php?page=product&id=' . $id . '">' . $name . '</a></li>
    ';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Sức Bạc Tlee Jewelry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
    <header>
        <div class="header__top">
            <div class="container flex">
                <p>FREE SHIP ĐƠN HÀNG TỪ 99K - COMBO QUÀ TẶNG ĐƠN HÀNG TỪ 399K.</p>

                <?= $html_account ?>
            </div>
        </div>

        <div class="header__middle">
            <div class="container">
                <div class="header__logo">
                    <img src="uploads/logo.png" width="100%">
                </div>

                <div class="header__search">
                    <form action="" methhod="POST" class="flex">
                        <input type="search" name="search" id="search" class="form-seach"
                            placeholder="Tìm Kiếm Sản Phẩm">
                        <button type="submit" name="btn-seach" class="btn-search">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>

                <div class="header__icon-cart ">
                    <a href="index.php?page=cart" class="flex">
                        <p>Giỏ Hàng</p>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-cart" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <ul class="header__menu">
            <div class="container flex">
                <li><a href="index.php?page=home">Trang Chủ</a></li>
                <li><a href="index.php?page=about">Giới Thiệu</a></li>
                <?= $html_categories ?>
                <li><a href="index.php?page=blog">Blog</a></li>
            </div>
        </ul>
    </header>