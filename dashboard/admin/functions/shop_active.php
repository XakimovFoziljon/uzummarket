<?php 


require_once "../../../db/sql.php";

$sql = "UPDATE shop SET active=1 WHERE id=:id";
$query = $pdo->prepare($sql);
$query->bindParam("id", $_GET['id']);
$query->execute();

header('Location: /dashboard/admin/?route=shop');
?>