<?php
$html_hot_product = show_box_product($hot_product);


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

    <section class="data-product-my-5">
        <div class="container">
            <div class="data-title flex mb-3">
                <b></b>
                <span>LẮC TAY Nữ</span>
                <b></b>
            </div>
    </section>
</main>