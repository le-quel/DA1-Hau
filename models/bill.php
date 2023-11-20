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

function bill_search($search_order)
{
    $sql = "SELECT * FROM bill WHERE id = ?";
    return pdo_query_one($sql, $search_order);
}

function bill_detail_search($id_bill)
{
    $sql = "SELECT * FROM bill_details WHERE id_bill = ?";
    return pdo_query_one($sql, $id_bill);
}
