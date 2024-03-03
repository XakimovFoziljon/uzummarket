<?php 

require_once "../db/sql.php";

$data = [
    'user_id' => $_GET['user_id'],
    'name' => $_POST['name'],
    'price' => $_POST['price'],
    'image' => $_POST['image'],
    'time' => 0,
    'status' => 0,
];

$sql = "INSERT INTO cart(user_id, name, price, image, time, status) VALUES (:user_id, :name, :price, :image, :time, :status)";
$query = $pdo -> prepare($sql);
$query->execute($data);



header('Location: ../cart.php');
?>