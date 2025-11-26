<?php
$host = 'localhost';
$db = 'mini_store';
$username = 'root';
$password = 'root';

try{
    $connection = new PDO("mysql:host=$host;dbname=$db",$username,$password);
}catch(PDOEXCEPTION $e){
    echo "Connection failed";
    die;
}
