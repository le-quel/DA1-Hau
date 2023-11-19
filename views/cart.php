<?php
if (!empty($_SESSION["cart"]) && count($_SESSION["cart"]) > 0) {
    $total_price = 0;

    echo '
        <div class="container my-5">
            <h3 class="my-3">Giỏ hàng của bạn</h3>
            <table class="table ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá sản phẩm</th>
                        <th>Thành Tiền</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
            <tbody>';

    foreach ($_SESSION["cart"] as $pdCart) {
        $subtotal = $pdCart['quantity'] * $pdCart['price_product'];
        $total_price += $subtotal;

        echo '<tr>
                <td>' . $pdCart['id_product'] . '</td>
                <td><img src="uploads/' . $pdCart['image_product'] . '" width="40px"></td>
                <td>' . $pdCart['name_product'] . '</td>
                <td>' . $pdCart['quantity'] . '</td>
                <td>' . number_format($pdCart['price_product'], 0, ',', '.') . ' đ</td>
                <td>' . number_format($subtotal, 0, ',', '.') . ' đ</td>
                <td><a href="index.php?page=cart&act=del1&id=' . $pdCart['id_product'] . '">Xóa</a></td>
            </tr>
            ';
    }

    echo '      </tbody>
            </table>
            <p class="total_price">Tổng Tiền : ' . number_format($total_price, 0, ',', '.') . ' đ</p>

            <a href="index.php?page=checkout" class="btn btn-outline-dark">Thanh Toán</a>
        </div>';
} else {
    echo '
        <div class="empty my-5 text-center">
            <p class="empty-cart">Giỏ hàng của bạn trống.</p>
            <a href="index.php">Quay Lại</a>
        </div>
    ';
}

?>