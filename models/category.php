<?php

function category_select_all()
{
    $sql = "SELECT * FROM category";
    return pdo_query($sql);
}

function addcategory($name, $home){

    try {
        $sql = "INSERT INTO category(name, home) VALUES(?,?)";
        pdo_execute($sql, $name, $home);
        echo "Thêm thành công !";
    } catch (PDOException $e) {
        echo "Thêm thất bại: " . $e->getMessage();
    }
}
function getonecategory($id){
    $sql = "SELECT * FROM category WHERE  id=?";
    return  pdo_query($sql, $id);
}

// function updatecategory($id, $name, $home){
// $sql = "UPDATE category SET name=?,home=? WHERE id=?";
// pdo_execute($sql, $name, $home, $id);
// }
function updatecategory($id, $name, $home){
    try{
        $sql = "UPDATE category SET name=?,home=? WHERE id=?";
        pdo_execute($sql,  $name, $home,$id);
        echo "Update danh mục thành công !";
    }catch (PDOException $e) {
        echo "Update thất bại! " . $e->getMessage();
    }
   
}
function delcategory($id){
    $sql = "DELETE FROM category WHERE id=?";
    if(is_array($id)){
        foreach ($id as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $id);
    }
}