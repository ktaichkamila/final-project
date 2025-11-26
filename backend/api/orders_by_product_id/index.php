<?php

include '../../connection.php';
include '../../utils.php';

checkRequestMethod('GET');

$queryString = $_SERVER['QUERY_STRING'];
parse_str($queryString, $params);
$product_id = $params['product_id'];

$query = $connection->prepare("SELECT * FROM orders where product_id=:any_id ORDER BY order_date DESC
LIMIT 10 ");
$query->execute(['any_id' => $product_id]);
$result = $query->fetchAll(PDO::FETCH_ASSOC);


respond($result);
