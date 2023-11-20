<?php
// require_once 'pdo.php';

// /**
//  * Thêm loại mới
//  * @param String $ten_loai là tên loại
//  * @throws PDOException lỗi thêm mới
//  */
// function loai_insert($ten_loai){
//     $sql = "INSERT INTO loai(ten_loai) VALUES(?)";
//     pdo_execute($sql, $ten_loai);
// }
// /**
//  * Cập nhật tên loại
//  * @param int $ma_loai là mã loại cần cập nhật
//  * @param String $ten_loai là tên loại mới
//  * @throws PDOException lỗi cập nhật
//  */
// function loai_update($ma_loai, $ten_loai){
//     $sql = "UPDATE loai SET ten_loai=? WHERE ma_loai=?";
//     pdo_execute($sql, $ten_loai, $ma_loai);
// }
// /**
//  * Xóa một hoặc nhiều loại
//  * @param mix $ma_loai là mã loại hoặc mảng mã loại
//  * @throws PDOException lỗi xóa
//  */
// function loai_delete($ma_loai){
//     $sql = "DELETE FROM loai WHERE ma_loai=?";
//     if(is_array($ma_loai)){
//         foreach ($ma_loai as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_loai);
//     }
// }
// /**
//  * Truy vấn tất cả các loại
//  * @return array mảng loại truy vấn được
//  * @throws PDOException lỗi truy vấn
//  */
function category_select_all()
{
    $sql = "SELECT * FROM category";
    return pdo_query($sql);
}

function addcategory($name, $home)
{

    try {
        $sql = "INSERT INTO category(name, home) VALUES(?,?)";
        pdo_execute($sql, $name, $home);
        echo "Thêm thành công !";
    } catch (PDOException $e) {
        echo "Thêm thất bại: " . $e->getMessage();
    }
}
function getonecategory($id)
{
    $sql = "SELECT * FROM category WHERE  id=?";
    return  pdo_query($sql, $id);
}

// function updatecategory($id, $name, $home){
// $sql = "UPDATE category SET name=?,home=? WHERE id=?";
// pdo_execute($sql, $name, $home, $id);
// }
function updatecategory($id, $name, $home)
{
    try {
        $sql = "UPDATE category SET name=?,home=? WHERE id=?";
        pdo_execute($sql,  $name, $home, $id);
        echo "Update danh mục thành công !";
    } catch (PDOException $e) {
        echo "Update thất bại! " . $e->getMessage();
    }
}
function delcategory($id)
{
    $sql = "DELETE FROM category WHERE id=?";
    if (is_array($id)) {
        foreach ($id as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $id);
    }
}
