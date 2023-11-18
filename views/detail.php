<?php

if (isset($product_detail['gallery'])) {
    $gallery = json_decode($product_detail['gallery']);
    $html_thumbnail_img = '';
    foreach ($gallery as $img) {
        $html_thumbnail_img .= '<img src="uploads/' . $img . '" width="20%" />';
    }

}

if (isset($product_detail['sale']) && $product_detail['sale'] > 0) {

    $discountAmount = $product_detail['sale'] * $product_detail['price'] / 100;
    $discountedPrice = $product_detail['price'] - $discountAmount;

    $box_price = '
        <p class="ct-price">
            ' . number_format($discountedPrice, 0, ',', '.') . 'đ
            <span>' . number_format($product_detail['price'], 0, ',', '.') . 'đ</span>
        </p>'
    ;

    $box_sale = '
        <p class="ct-sale">' . $product_detail['sale'] . '%</p>
        ';
} else {
    $box_price = '
        <p class="ct-price">
            ' . number_format($product_detail['price'], 0, ',', '.') . 'đ
        </p>'
    ;

    $box_sale = '';
}

$html_near_products = '';

if (isset($product_detail['id_category'])) {
    $near_products = get_products_by_category($product_detail['id_category']);
    $html_near_products = show_box_product($near_products);
}

?>
<main class="my-5">
    <div class="container">
        <section class="breadcrumb flex">
            <p>Trang Chủ</p>
            <i class="fa-solid fa-arrow-right"></i>
            <p>
                <?= $product_detail['category_name'] ?>
            </p>
            <i class="fa-solid fa-arrow-right"></i>
            <p>
                <?= $product_detail['name'] ?>
            </p>
        </section>

        <section class="info_product">
            <div class="product_img">
                <div class="larger-img">
                    <img src="uploads/<?= $product_detail['image'] ?>" width="100%">
                </div>

                <div class="thumbnail_img">
                    <?= $html_thumbnail_img ?>
                </div>
            </div>

            <div class="prodduct_content">
                <p class="ct_name">
                    <?= $product_detail['name'] ?>
                </p>

                <div class="ct_line"></div>

                <div class="ct_price">
                    <?= $box_price ?>
                </div>

                <p class="ct_qt">
                    Còn lại :
                    <?= $product_detail['quantity'] ?>
                    Sản Phẩm
                </p>

                <ul class="description">
                    <li>Chất liệu: Bạc S925</li>
                    <li>Thương hiệu: TLEE JEWELRY</li>
                    <li>Đối tượng sử dụng: Nữ</li>
                    <li>Bảo hành: Làm sáng miễn phí trọn đời tại cửa hàng</li>
                </ul>

                <form action="index.php?page=addToCart" class="detail_add_to_cart" method="POST">
                    <div class="form-quantity flex">
                        <p>Số Lượng</p>
                        <div class="quantity-group flex">
                            <button id="decrement">-</button>
                            <input type="number" name="quantity" id="quantity" class="quantity" value="1">
                            <button id="increment">+</button>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <input type="hidden" name="id_product" value="<?= $product_detail['id'] ?>">
                        <input type="hidden" name="name_product" value="<?= $product_detail['name'] ?>">
                        <input type="hidden" name="price_product" value="<?php
                        if (isset($product_detail['sale']) && $product_detail['sale'] > 0) {
                            echo $discountedPrice;
                        } else {
                            echo $product_detail['price'];
                        }
                        ?>">
                        <input type="hidden" name="image_product" value="<?= $product_detail['image'] ?>">
                        <input type="submit" value="Thêm Vào Giỏ Hàng" class="btn-form my-4" name="btn-addToCart">
                    </div>
                </form>
            </div>
        </section>

        <section class="product_desc my-5">
            <div class="container ps-0">
                <p class="desc_name">
                    Thông Tin Sản Phẩm:
                    <span>
                        <?= $product_detail['name'] ?>
                    </span>
                </p>

                <div class="desc_content">

                </div>
            </div>
        </section>

        <section class="procuct_ct">
            <div class="container px-0">
                <h4>Sản Phẩm Liên Quan</h4>

                <div class="list_product my-3">
                    <?= $html_near_products ?>
                </div>
            </div>
        </section>
    </div>

    <script>
        const decrementButton = document.getElementById('decrement');
        const incrementButton = document.getElementById('increment');
        const quantityInput = document.getElementById('quantity');

        decrementButton.addEventListener('click', function (e) {
            e.preventDefault();
            let currentValue = parseInt(quantityInput.value);

            if (currentValue > 1) {
                currentValue--;
                quantityInput.value = currentValue;
            }
        });

        incrementButton.addEventListener('click', function (e) {
            e.preventDefault();
            let currentValue = parseInt(quantityInput.value);

            currentValue++;
            quantityInput.value = currentValue;
        });
    </script>
</main>