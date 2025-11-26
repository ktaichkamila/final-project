<?php

include '../../connection.php';
include '../../utils.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    respond(null, 'failed', 'Wrong method');
    die;
}
$data = $_POST;

if (!isset($data['product_id']) || !is_numeric($data['product_id'])) {
    respond(null, 'failed', 'Product id is required as int');
    die;
}
$productId = intval($data['product_id']);

if (!isset($data['customer_email'])) {
    respond(null, 'failed', 'Customer email is required');
    die;
}
$customerEmail = $data['customer_email'];

$orderDate = date('Y-m-d H:i:s');

try {

        $query = $connection->prepare("INSERT INTO orders (product_id, customer_email, order_date) VALUES (?,?,?);");
        $result = $query->execute([$productId, $customerEmail, $orderDate]);
    
} catch (PDOException $e) {
    respond(null, 'failed', 'Error occured while ordering');
    die;
}

respond(true, 'success', 'Order added successfully');