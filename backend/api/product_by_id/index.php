<?php

include '../../connection.php';
include '../../utils.php';

checkRequestMethod('GET');
$queryString = $_SERVER['QUERY_STRING'];
parse_str($queryString, $params);
$id = $params['id'];

$query = $connection->prepare("SELECT * FROM products where id=:any_id");
$query->execute(['any_id' => $id]);
$result = $query->fetchAll(PDO::FETCH_ASSOC);


respond($result);
