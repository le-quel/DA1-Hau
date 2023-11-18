<?php
$html_review_cart = '';
foreach ($_SESSION['cart'] as $pdCart) {
    $html_review_cart .= '
        <tr>
            <td>' . $pdCart['name_product'] . '</td>
            <td> ' . number_format($pdCart['price_product'], 0, ",", ".") . ' đ</td>
            <td> ' . $pdCart['quantity'] . '</td>
            <td> ' . number_format($pdCart['price_product'] * $pdCart['quantity'], 0, ",", ".") . ' đ</td>
        </tr>
    ';
}
?>

<main class="my-5">
    <form action="index.php?page=bill" method="POSt">
        <div class="container">
            <div class="checkout-container">
                <div class="checkout-form">
                    <h4 class="mb-4">Thông Tin Thanh Toán</h4>
                    <div class="form-group mb-3">
                        <label for="fullname">Họ và tên</label>
                        <input type="text" name="fullname" id="fullname" class="form-control" value="<?php
                        if (isset($_SESSION['user'])) {
                            echo $_SESSION['user']['fullname'];
                        }
                        ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?php
                        if (isset($_SESSION['user'])) {
                            echo $_SESSION['user']['email'];
                        }
                        ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label for="phone">Số Điện Thoại</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="<?php
                        if (isset($_SESSION['user'])) {
                            echo $_SESSION['user']['phone'];
                        }
                        ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label for="address">Địa Chỉ</label>
                        <input type="text" name="address" id="address" class="form-control" value="<?php
                        if (isset($_SESSION['user'])) {
                            echo $_SESSION['user']['address'];
                        }
                        ?>">
                    </div>

                </div>
                <div class="review-cart">
                    <h4 class="mb-4">Thông Tin Đơn Hàng</h4>

                    <div class="table-review-cart">
                        <table class="table ">
                            <thead>
                                <th>Sản Phẩm</th>
                                <th>Giá</th>
                                <th>Số Lượng</th>
                                <th>Thành Tiền</th>
                            </thead>

                            <tbody>
                                <?= $html_review_cart ?>
                            </tbody>
                        </table>

                        <p class="total_price">Tổng tiền:
                            <?php
                            $total_price = 0;
                            foreach ($_SESSION['cart'] as $pdCart) {
                                $total_price += $pdCart['price_product'] * $pdCart['quantity'];
                            }
                            echo number_format($total_price, 0, ",", ".") . ' đ';
                            ?>
                        </p>
                    </div>

                    <div class="form-group mb-3">
                        <label for="payment">Phương Thức Thanh Toán</label>
                        <select name="payment" id="payment" class="form-control">
                            <option value="1">Thanh Toán Khi Nhận Hàng (COD) </option>
                            <option value="2">Ví Điện Tử Momo</option>
                            <option value="3">Chuyển Khoản Ngân Hàng</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="transport">Phương Thức Vận Chuyển</label>
                        <select name="transport" id="transport" class="form-control">
                            <option value="1">Hỏa Tốc</option>
                            <option value="2">Giao Hàng Nhanh</option>
                            <option value="3">Giao Hàng Tiết Kiệm</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group mt-3 mb-3 form-container">
                <input type="hidden" name="total_price" value="<?php
                $total_price = 0;
                foreach ($_SESSION['cart'] as $pdCart) {
                    $total_price += $pdCart['price_product'] * $pdCart['quantity'];
                }
                echo $total_price;
                ?>">
                <input type="submit" value="Thanh Toán" class="btn-form" name="btn-bill">
                <a href="index.php?page=cart" class="text-center d-block mt-3">Quay Lại</a>
            </div>
        </div>
    </form>
</main>