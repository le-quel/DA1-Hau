<?php
function add_product($id, $name, $image, $gallery, $price, $sale, $info, $view, $hot, $quantity, $id_category)
{
    try {
        $sql = "INSERT INTO product(name, image, gallery, price, sale, info,view, hot, quantity, id_category, created_at) VALUES (?,?,?,?,?,?,?,?,?,?,NOW())";
        pdo_execute($sql, $name, $image, json_encode($gallery, JSON_FORCE_OBJECT),  $price, $sale, $info, $view, $hot, $quantity, $id_category);
        echo "Thêm thành công !";
    } catch (PDOException $e) {
        echo "Thêm thất bại: " . $e->getMessage();
    }
}


function getone_product($id)
{
    $sql = "SELECT * FROM product WHERE id=?";
    return pdo_query($sql, $id);
}

function update_product($id, $name, $image, $gallery, $price, $sale, $info, $view, $hot, $quantity, $id_category)
{
    try {
        $sql = "UPDATE product SET name=?, image=?, gallery=?, price=?, sale=?, info=?, view=?, hot=?, quantity=?, id_category=?, created_at=NOW(), update_at=NOW() WHERE id=?";
        pdo_execute($sql, $name, $image, json_encode($gallery, JSON_FORCE_OBJECT),  $price, $sale, $info, $view, $hot, $quantity, $id_category, $id);
        echo "Chỉnh sửa thành công";
    } catch (PDOException $e) {
        echo "Chỉnh Sửa thất bại! " . $e->getMessage();
    }
}

function del_product($id)
{
    $sql = "DELETE FROM product WHERE  id=?";
    if (is_array($id)) {
        foreach ($id as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $id);
    }
}

function get_products_by_category($id_category)
{
    $sql = "SELECT product.*, category.name AS category_name, category.id AS category_id
            FROM product
            JOIN category ON product.id_category = category.id
            WHERE id_category = ?";
    return pdo_query($sql, $id_category);
}

function list_product()
{
    $sql = "SELECT * FROM product ORDER BY id DESC";
    return pdo_query($sql);
}

function hot_product()
{
    $sql = "SELECT product.*, category.name AS category_name
            FROM product
            JOIN category ON product.id_category = category.id
            WHERE hot = 1";
    return pdo_query($sql);
}


function get_products_by_home()
{
    $sql = "SELECT product.*, category.name AS category_name
            FROM product
            JOIN category ON product.id_category = category.id
            WHERE category.home = 1";
    return pdo_query($sql);
}


function get_product_by_id($id_product)
{
    $sql = "SELECT product.*, category.name AS category_name
            FROM product
            JOIN category ON product.id_category = category.id
            WHERE product.id=?";
    return pdo_query_one($sql, $id_product);
}

// function hang_hoa_exist($ma_hh){
//     $sql = "SELECT count(*) FROM hang_hoa WHERE ma_hh=?";
//     return pdo_query_value($sql, $ma_hh) > 0;
// }

function view_product($id_product)
{
    $sql = "UPDATE product SET view = view + 1 WHERE id=?";
    pdo_execute($sql, $id_product);
}

// function hang_hoa_select_top10(){
//     $sql = "SELECT * FROM hang_hoa WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
//     return pdo_query($sql);
// }

// function hang_hoa_select_dac_biet(){
//     $sql = "SELECT * FROM hang_hoa WHERE dac_biet=1";
//     return pdo_query($sql);
// }


// function hang_hoa_select_keyword($keyword){
//     $sql = "SELECT * FROM hang_hoa hh "
//             . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
//             . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
//     return pdo_query($sql, '%'.$keyword.'%', '%'.$keyword.'%');
// }

// function hang_hoa_select_page(){
//     if(!isset($_SESSION['page_no'])){
//         $_SESSION['page_no'] = 0;
//     }
//     if(!isset($_SESSION['page_count'])){
//         $row_count = pdo_query_value("SELECT count(*) FROM hang_hoa");
//         $_SESSION['page_count'] = ceil($row_count/10.0);
//     }
//     if(exist_param("page_no")){
//         $_SESSION['page_no'] = $_REQUEST['page_no'];
//     }
//     if($_SESSION['page_no'] < 0){
//         $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
//     }
//     if($_SESSION['page_no'] >= $_SESSION['page_count']){
//         $_SESSION['page_no'] = 0;
//     }
//     $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh LIMIT ".$_SESSION['page_no'].", 10";
//     return pdo_query($sql);
// }

function show_box_product($list_product)
{
    $html_box_product = '';

    foreach ($list_product as $pd) {
        extract($pd);

        if (isset($sale) && $sale > 0) {
            $discountAmount = $sale * $price / 100;
            $discountedPrice = $price - $discountAmount;

            $box_price = '
                <p class="box-price">
                    ' . number_format($discountedPrice, 0, ',', '.') . 'đ
                    <span>' . number_format($price, 0, ',', '.') . 'đ</span>
                </p>';

            $box_sale = '
                <p class="box-sale">' . $sale . '%</p>
                ';
        } else {
            $box_price = '
                <p class="box-price">
                    ' . number_format($price, 0, ',', '.') . 'đ
                </p>';

            $box_sale = '';
        }

        $html_box_product .= '
            <div class="box-product">
                <a href="index.php?page=detail&id=' . $id . '">
                    <div class="box-img">
                        <img src="uploads/' . $image . '" width="100%">
                    </div>

                    <div class="box-info">
                        <p class="box-category">' . $category_name . '</p>
                        <p class="box-name">' . $name . '</p>
                        ' . $box_price . '
                    </div>

                    ' . $box_sale . '
                </a>
            </div>';
    }

    return $html_box_product;
}

function getCategoriesWithHomeFlag()
{
    $sql = "SELECT * FROM category WHERE home = 1";
    return pdo_query($sql,);
}

function getProductsByCategoryId($categoryId)
{
    $sql = "SELECT * FROM product WHERE id_category = ?";
    return pdo_query($sql, $categoryId);
}
