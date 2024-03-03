<?php



if (count($_POST) > 0) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $message = $_POST['message'];
    $img_name = $_FILES['image']['name'];
    $img_type = $_FILES['image']['type'];
    $img_tmp_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];


    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);

    $img_lower_ex = strtolower($img_ex);

    $img_vd_ex = array('jpg', 'jpeg', 'png', 'svg', 'webp');

    if (in_array($img_lower_ex, $img_vd_ex)) {

        $new_img_name = uniqid("image_", true) . "." . $img_lower_ex;

        move_uploaded_file($img_tmp_name, "../assets/images/productImage/" . $new_img_name);

        require_once "../../../db/sql.php";
        $sql = "INSERT INTO products(name, price, message, image) VALUES (:name, :price, :message, :image)";
        $query = $pdo->prepare($sql);
        $query->bindParam("name", $name);
        $query->bindParam("price", $price);
        $query->bindParam("message", $message);
        $query->bindParam("image", $new_img_name);
        $query->execute();
        header("Location: /dashboard/admin/?route=products");
    } else {
        $error = "Siz kiritgan rasm formati to'g'ri kelmaydi boshqa formatdagi rasm kiriting !";
        header("Location: /dashboard/admin/?route=products");
    }
}
