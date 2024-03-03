<?php

// function getCategory()
// {
//     global $pdo;
//     $sql = "SELECT * FROM category";
//     $query = $pdo->prepare($sql);
//     $query->execute();
//     $category =  $query->fetchAll(PDO::FETCH_ASSOC);

//     return $category;
// }

// $category = getCategory();


function getProducts()
{
    global $pdo;
    $sql = "SELECT * FROM products";
    $query = $pdo->prepare($sql);
    $query->execute();
    $products =  $query->fetchAll(PDO::FETCH_ASSOC);

    return $products;
}

$products = getProducts();

function shop()
{
    global $pdo;
    $sql = "SELECT * FROM shop";
    $query = $pdo->prepare($sql);
    $query->execute();
    $shop =  $query->fetchAll(PDO::FETCH_ASSOC);

    return $shop;
}

$shop = shop();
