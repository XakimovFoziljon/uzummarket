<?php

require_once "../db/sql.php";

if (count($_POST) > 0) {
    $time = time();

    $sql ="UPDATE cart SET  time=:time , status=1 WHERE user_id=:user_id AND status=0 ";
    $query = $pdo->prepare($sql);
    $query->bindParam('time', $time);
    $query->bindParam('user_id', $_GET['user_id']);
    $query->execute();


    $data = [
        'user_id' => $_GET['user_id'],
        'name' => $_POST['name'],
        'mobile' => $_POST['mobile'],
        'email' => $_POST['email'],
        'address' => $_POST['address'],
        'city' => $_POST['city'],
        'country' => $_POST['country'],
        'text' => $_POST['text'],
        'total_price' => $_POST['total_price'],
        'time' => $time,
        'active' => 0,

    ];
    $sql = "INSERT INTO shop(user_id,name, mobile, email, address, city, country, text, total_price, time, active) VALUES (:user_id,:name, :mobile, :email, :address, :city, :country, :text, :total_price, :time, :active)";
    $query = $pdo->prepare($sql);
    $query->execute($data);

 
    header('Location: /');
}

?>