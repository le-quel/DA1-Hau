<?php
require_once 'pdo.php';

function bill_insert($bill)
{
    $sql = "INSERT INTO bill(id_user,fullname, email, phone, address, totalPrice, payment, transport, created_at) VALUES (?,?,?,?,?,?,?,?, NOw())";
    return pdo_execute_id($sql, $bill['id_user'], $bill['fullname'], $bill['email'], $bill['phone'], $bill['address'], $bill['total_price'], $bill['payment'], $bill['transport']);

}

function bill_detail_insert($bill_detail)
{
    $sql = "INSERT INTO bill_details(id_bill, id_product, quantity) VALUES (?,?,?)";
    pdo_execute($sql, $bill_detail['bill_id'], $bill_detail['product_id'], $bill_detail['quantity']);
}
?>