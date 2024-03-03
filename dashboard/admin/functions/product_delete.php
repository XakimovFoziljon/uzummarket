<?php 


require_once "../../../db/sql.php";
$sql = "DELETE FROM products WHERE id=:id";
$query = $pdo->prepare($sql);
$query->bindParam("id", $_GET['id']);
$query->execute();

header('Location: /dashboard/admin/?route=products');
?>