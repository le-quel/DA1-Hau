<?php
$html_list_tksp = '';

foreach ($list_tksp as $tksp) {
    extract($tksp);

    $html_list_tksp .= '
        <tr>
            <td>' . $category_name . '</td>
            <td>' . $product_count . '</td>
            <td>' . number_format($max_price, 0, '', '.') . 'đ</td>
            <td>' . number_format($min_price, 0, '', '.') . 'đ</td>
            <td>' . number_format($avg_price, 0, '', '.') . 'đ</td>
        </tr>
    ';

}
?>
<main>
    <div class="container">
<<<<<<< HEAD
        <ul class="nav justify-content-center">
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

=======
>>>>>>> 02db119d6f688fce9f4b2ad463734e532517b961
        <h2 class="text-center my-5">Thống Kê Sản Phẩm Theo Danh Mục</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Danh mục</th>
                    <th>Số lượng </th>
                    <th>Giá cao nhất</th>
                    <th>Giá thấp nhất</th>
                    <th>Giá trung bình</th>
                </tr>
            </thead>
            <tbody>
                <?= $html_list_tksp ?>
            </tbody>
        </table>
    </div>
</main>