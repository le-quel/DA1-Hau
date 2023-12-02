<?php
$html_list_tksp = '';

foreach ($list_tksp as $tksp) {
    extract($tksp);

    // Check if variables are not null before formatting
    $max_price_formatted = ($max_price !== null) ? number_format($max_price, 0, '', '.') . 'đ' : 'N/A';
    $min_price_formatted = ($min_price !== null) ? number_format($min_price, 0, '', '.') . 'đ' : 'N/A';
    $avg_price_formatted = ($avg_price !== null) ? number_format($avg_price, 0, '', '.') . 'đ' : 'N/A';

    $html_list_tksp .= '
        <tr>
            <td>' . $category_name . '</td>
            <td>' . $product_count . '</td>
            <td>' . $max_price_formatted . '</td>
            <td>' . $min_price_formatted . '</td>
            <td>' . $avg_price_formatted . '</td>
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