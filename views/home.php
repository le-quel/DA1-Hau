<?php
$html_hot_product = show_box_product($hot_product);

$categories = getCategoriesWithHomeFlag();

$html_home_product = '';

foreach ($categories as $category) {

    $category_id = $category['id'];
    $category_name = $category['name'];

    $products = getProductsByCategoryId($category_id);

    $html_home_pd = '';

    foreach ($products as $product) {

        if (isset($product['sale']) && $product['sale'] > 0) {
            $discountAmount = $product['sale'] * $product['price'] / 100;
            $discountedPrice = $product['price'] - $discountAmount;

            $box_price = '
                <p class="box-price">
                    ' . number_format($discountedPrice, 0, ',', '.') . 'đ
                    <span>' . number_format($product['price'], 0, ',', '.') . 'đ</span>
                </p>'
            ;

            $box_sale = '
                <p class="box-sale">' . $product['sale'] . '%</p>
                ';
        } else {
            $box_price = '
                <p class="box-price">
                    ' . number_format($product['price'], 0, ',', '.') . 'đ
                </p>'
            ;

            $box_sale = '';
        }

        $html_home_pd .= '
            <div class="box-product">
                <a href="index.php?page=detail&id=' . $product['id'] . '">
                    <div class="box-img">
                        <img src="uploads/' . $product['image'] . '" width="100%">
                    </div>

                    <div class="box-info">
                        <p class="box-category">' . $category_name . '</p>
                        <p class="box-name">' . $product['name'] . '</p>
                        ' . $box_price . '
                    </div>

                    ' . $box_sale . '
                </a>
            </div>';
    }

    $html_home_product .= '
        <section class="data-home my-5">
            <div class="container">
                <div class="data-title flex mb-3">
                    <b></b>
                    <span>' . $category_name . '</span>
                    <b></b>
                </div>

                <div class="list_product">
                    ' . $html_home_pd . '
                </div>
                <div class="btn-all-box">
                    <a class="btn-all" href="index.php?page=product&id=' . $category_id . '">Xem Tất Cả ' . $category_name . '</a>
                </div>
            </div>
        </section>
    ';
}

?>

<main>
    <section class="carousel">
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="uploads/banner1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="uploads/banner2.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section class="information my-5">
        <div class="container">
            <div class="box__info flex">
                <div class="box__info-img">
                    <img src="uploads/ser_1.svg" width="100%">
                </div>
                <p class="box__info-p">
                    Miễn Phí Vận Chuyển
                    <span class="d-block">Đơn hàng từ 99k</span>
                </p>
            </div>

            <div class="box__info flex">
                <div class="box__info-img">
                    <img src="uploads/ser_2.svg" width="100%">
                </div>
                <p class="box__info-p">
                    Quà Tặng Hấp Dẫn
                    <span class="d-block">Hóa Đơn Từ 499k</span>
                </p>
            </div>

            <div class="box__info flex">
                <div class="box__info-img">
                    <img src="uploads/ser_3.svg" width="100%">
                </div>
                <p class="box__info-p">
                    Chứng Nhận Chất Lượng
                    <span class="d-block">Sản Phẩm Chính Hãng</span>
                </p>
            </div>

            <div class="box__info flex">
                <div class="box__info-img">
                    <img src="uploads/ser_4.svg" width="100%">
                </div>
                <p class="box__info-p">
                    Hotline : 1900.xxx
                    <span class="d-block">Hỗ Trợ 24/7</span>
                </p>
            </div>
        </div>
    </section>

    <section class="banner_2 my-5">
        <div class="container">
            <div class="left-column">
                <img src="uploads/b1.jpg">
            </div>

            <div class="right-column">
                <div class="right-column-top">
                    <img src="uploads/b4.jpg" height="300px">
                </div>

                <div class="right-column-bottom">
                    <img src="uploads/b2.jpg">
                    <img src="uploads/b3.jpg">
                </div>
            </div>
        </div>
    </section>

    <section class="data-product my-5">
        <div class="container">
            <div class="banner_hot-product">
                <img src="uploads/spbc.jpg" width="100%">
            </div>

            <div class="list_product mt-5">
                <?php echo $html_hot_product; ?>
            </div>
        </div>
    </section>

    <?= $html_home_product ?>

    <section class="news my-5">
        <div class="container">
            <div class="data-title flex mb-3">
                <b></b>
                <span>Tin Tức</span>
                <b></b>
            </div>

            <div class="news_content">
                <div class="box-news-left">
                    <div class="box-new-img">
                        <img src="uploads/n1.jpg" width="100%">
                    </div>
                    <div class="box-new-info">
                        <p>5 món phụ kiến trang sức dành riêng cho cô nàng công sở</p>
                        <p>Làm thế nào? để những cô nàng công sở có thể làm mới mình, luôn xinh đẹp và tràn ngập năng
                            lượng nếu biết cách lựa chọn trang sức phụ kiện phù hợp. Và đâu là những item ...</p>
                    </div>
                </div>

                <div class="box-news-right">
                    <div class="box-news flex">
                        <div class="box-new-img">
                            <img src="uploads/n3.jpg" width="100%">
                        </div>
                        <div class="box-new-info">
                            <p>5 món phụ kiến trang sức dành riêng cho cô nàng công sở</p>
                            <p>Làm thế nào? để những cô nàng công sở có thể làm mới mình, luôn xinh đẹp và tràn ngập
                                năng
                                lượng nếu biết cách lựa chọn trang sức phụ kiện phù hợp. Và đâu là những item ...</p>
                        </div>
                    </div>

                    <div class="box-news flex">
                        <div class="box-new-img">
                            <img src="uploads/n2.jpg" width="100%">
                        </div>
                        <div class="box-new-info">
                            <p>5 món phụ kiến trang sức dành riêng cho cô nàng công sở</p>
                            <p>Làm thế nào? để những cô nàng công sở có thể làm mới mình, luôn xinh đẹp và tràn ngập
                                năng
                                lượng nếu biết cách lựa chọn trang sức phụ kiện phù hợp. Và đâu là những item ...</p>
                        </div>
                    </div>

                    <div class="box-news flex">
                        <div class="box-new-img">
                            <img src="uploads/n4.jpg" width="100%">
                        </div>
                        <div class="box-new-info">
                            <p>5 món phụ kiến trang sức dành riêng cho cô nàng công sở</p>
                            <p>Làm thế nào? để những cô nàng công sở có thể làm mới mình, luôn xinh đẹp và tràn ngập
                                năng
                                lượng nếu biết cách lựa chọn trang sức phụ kiện phù hợp. Và đâu là những item ...</p>
                        </div>
                    </div>

                    <div class="box-news flex">
                        <div class="box-new-img">
                            <img src="uploads/n2.jpg" width="100%">
                        </div>
                        <div class="box-new-info">
                            <p>5 món phụ kiến trang sức dành riêng cho cô nàng công sở</p>
                            <p>Làm thế nào? để những cô nàng công sở có thể làm mới mình, luôn xinh đẹp và tràn ngập
                                năng
                                lượng nếu biết cách lựa chọn trang sức phụ kiện phù hợp. Và đâu là những item ...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>