<?php
$html_result_order = '';

if (isset($order)) {

    if (isset($product_order['sale']) && $product_order['sale'] > 0) {
        $price = $product_order['price'] - ($product_order['price'] * $product_order['sale'] / 100);
    } else {
        $price = $product_order['price'];
    }

    $html_result_order .= '
        <h4 class="text-center my-3">Thông Tin Đơn Hàng</h4>
        <div class="result-info my-5">
            <h6>Thông tin cá nhân</h6>
            <p>Họ và tên: ' . $order['fullname'] . '</p>
            <p>Email: ' . $order['email'] . '</p>
            <p>Số điện thoại: ' . $order['phone'] . '</p>
            <p>Địa chỉ: ' . $order['address'] . '</p>
        </div>

        <div class="result-product my-5">

            <h6>Thông Tin Sản Phẩm</h6>
            <table class="table">
                <thead>
                    <th>Sản Phẩm</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Số Lượng</th>
                    <th>Thành Tiền</th>
                </thead>
                <tbody>
                    <tr>
                        <td>' . $product_order['name'] . '</td>
                        <td><img src="uploads/' . $product_order['image'] . '" width="50px"/>  </td>
                        <td>' . number_format($price, 0, ',', '.') . ' đ</td>
                        <td>' . $order_details['quantity'] . '</td>
                        <td>' . number_format($price * $order_details['quantity'], 0, ',', '.') . 'đ</td>
                    </tr>
                </tbody>
            </table>
            <p class="total_price">Tổng Tiền
               ' . number_format($order['totalPrice'], 0, ',', '.') . ' đ
            </p>
        </div>
    ';
}
?>

<main class="my-5">
    <h4 class="text-center my-3">Tra Cứu Đơn Hàng</h4>
    <div class="container">
        <form action="index.php?page=order" method="POST">
            <div class="form-group mb-3">
                <input type="search" name="search-order" id="search=order" class="form-control"
                    placeholder="Nhập mã đơn hàng">
            </div>

            <div class="form-group mb-3">
                <input type="submit" value="Tìm Kiếm" name="btn-search-order" class="btn btn-outline-dark px-5">
            </div>
        </form>

        <div class="table-result">
            <?= $html_result_order ?>
        </div>
    </div>
</main>