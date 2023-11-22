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