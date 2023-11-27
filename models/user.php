<?php
// require_once 'pdo.php';

function checkUser($username, $password)
{
    $sql = "SELECT * FROM user WHERE username = ? AND password = ?";
    return pdo_query_one($sql, $username, $password);
}

function usernameExists($username)
{
    $sql = "SELECT * FROM user WHERE username = ?";
    $user = pdo_query_one($sql, $username);
    return $user ? true : false;
}

function emailExists($email)
{
    $sql = "SELECT * FROM user WHERE email = ?";
    $user = pdo_query_one($sql, $email);
    return $user ? true : false;
}

function user_insert($username, $email, $password)
{
    $sql = "INSERT INTO user(username, email, password,created_at) VALUES (?, ?, ?,NOW())";
    pdo_execute($sql, $username, $email, $password);
}
function render_alluser()
{
    $sql = "SELECT * FROM user";
    return  pdo_query($sql);
}
function addUser($id, $username, $password, $fullname, $email, $phone, $address, $role)
{
    try {
        $sql = "INSERT INTO user (username, password, fullname, email, phone, address, role) VALUES (?, ?, ?, ?, ?, ?, ?)";
        return  pdo_execute($sql, $username, $password, $fullname, $email, $phone, $address, $role);
    } catch (PDOException $e) {
        echo "Thêm thất bại! " . $e->getMessage();
    }
}

function getoneuser($id)
{
    $sql = "SELECT * FROM user WHERE  id=?";
    return  pdo_query($sql, $id);
}

function updateUser($id, $username, $password, $fullname, $email, $phone, $address, $role)
{
    $sql = "UPDATE User SET username=?,password=?,fullname=?,email=?,phone=?,address=?, role=? WHERE id=?";
    pdo_execute($sql, $username, $password, $fullname, $email, $phone, $address, $role, $id);
}
function deluser($id)
{
    $sql = "DELETE FROM user WHERE id=?";
    if (is_array($id)) {
        foreach ($id as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $id);
    }
}
function get_user($id){
    $sql="Select * FROM user WHERE id=?";
    return pdo_query_one($sql, $id);
}

// function khach_hang_delete($ma_kh){
//     $sql = "DELETE FROM khach_hang  WHERE ma_kh=?";
//     if(is_array($ma_kh)){
//         foreach ($ma_kh as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_kh);
//     }
// }

// function khach_hang_select_all(){
//     $sql = "SELECT * FROM khach_hang";
//     return pdo_query($sql);
// }

// function khach_hang_select_by_id($ma_kh){
//     $sql = "SELECT * FROM khach_hang WHERE ma_kh=?";
//     return pdo_query_one($sql, $ma_kh);
// }

// function khach_hang_exist($ma_kh){
//     $sql = "SELECT count(*) FROM khach_hang WHERE $ma_kh=?";
//     return pdo_query_value($sql, $ma_kh) > 0;
// }

// function khach_hang_select_by_role($vai_tro){
//     $sql = "SELECT * FROM khach_hang WHERE vai_tro=?";
//     return pdo_query($sql, $vai_tro);
// }

// function khach_hang_change_password($ma_kh, $mat_khau_moi){
//     $sql = "UPDATE khach_hang SET mat_khau=? WHERE ma_kh=?";
//     pdo_execute($sql, $mat_khau_moi, $ma_kh);
// }