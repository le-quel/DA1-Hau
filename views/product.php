<?php
$html_page_product = show_box_product($product_product_page);
$categories = category_select_all();

$html_name_category = '';
foreach ($categories as $category) {
    if ($category['id'] == $id_category) {
        $html_name_category = $category['name'];
    }
}
?>

<main class="my-5">
    <div class="container">
        <div class="product-category-name">
            <h2 class="text-center">
                <?= $html_name_category ?>
            </h2>
        </div>

        <div class="list_product">
            <?= $html_page_product ?>
        </div>
    </div>
</main>