<?php

include '../../connection.php';
include '../../utils.php';

checkRequestMethod('GET');

try {

    $query = $connection->query("SELECT * FROM mini_store.products ");
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    respond(null, 'failed', 'Error occured while fetch the products');
    die;
}

respond($result);