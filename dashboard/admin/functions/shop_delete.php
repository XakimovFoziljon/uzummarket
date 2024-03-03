<?php 


require_once "../../../db/sql.php";

$sql = "DELETE FROM cart WHERE user_id=:user_id AND time=:time";
$query = $pdo->prepare($sql);
$query->bindParam("user_id", $_GET['user_id']);
$query->bindParam("time", $_GET['time']);
$query->execute();



$sql = "DELETE FROM shop WHERE id=:id";
$query = $pdo->prepare($sql);
$query->bindParam("id", $_GET['id']);
$query->execute();

header('Location: /dashboard/admin/?route=shop');
?>