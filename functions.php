<?php

require_once "./db/sql.php";

function getProducts(){
    global $pdo;

    $start = 0;
    $limit = 8;
    $sql = "SELECT * FROM products ORDER BY id DESC LIMIT $start, $limit";
    $query = $pdo->prepare($sql);
    $query->execute();
    $products = $query->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}


$products = getProducts();

function getCart(){
    global $pdo, $user_id;
    $sql = "SELECT * FROM cart WHERE user_id=:user_id AND status = 0";
    $query = $pdo->prepare($sql);
    $query -> bindParam('user_id', $user_id);
    $query->execute();
    $cart = $query->fetchAll(PDO::FETCH_ASSOC);

    return $cart;
}

$cart =  getCart();



