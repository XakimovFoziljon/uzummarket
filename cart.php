<?php
session_start();

if (isset($_SESSION['user'])) {
    $user_id = $_SESSION['user']['id'];
    $user = $_SESSION['user'];
} elseif (isset($_SESSION['admin'])) {
    $user_id = $_SESSION['admin']['id'];
    $user = $_SESSION['admin'];
}

require_once "./functions.php";
require_once "./topbot.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
</body>
</html>



    <!-- Cart Page Start -->
    <form action="./functions/shop.php?user_id=<?= $user_id; ?>" method="post">
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Products</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cart as $data) : ?>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <img src="./dashboard/admin/assets/images/productImage/<?= $data['image'] ?>" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                        </div>
                                    </th>
                                    <td>
                                        <p class="mb-0 mt-4"><?= $data['name'] ?></p>
                                    </td>
                                    <td>
                                        <p id="product_price" class="mb-0 mt-4"><?= $data['price'] ?> so'm</p>
                                    </td>
                                    <td>
                                        <a href="./functions/cart_delete.php?id=<?= $data['id'] ?>" class="btn btn-md rounded-circle bg-light border mt-4">
                                            <i class="fa fa-times text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="row g-4 justify-content-end">
                    <div class="col-8">
                        <h1 class="mb-4">Billing details</h1>
                        <div class="form-item">
                            <label for="name" class="form-label my-3">Full Name<sup>*</sup></label>
                            <input type="text" class="form-control" name="name" id="name" value="<?= $user['username'] ?>" required>
                        </div>
                        <div class="form-item">
                            <label for="address" class="form-label my-3">Address <sup>*</sup></label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="House Number Street Name" required>
                        </div>
                        <div class="form-item">
                            <label id="city" class="form-label my-3">Town/City<sup>*</sup></label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                        <div class="form-item">
                            <label for="country" class="form-label my-3">Country<sup>*</sup></label>
                            <input type="text" class="form-control" id="country" name="country" required>
                        </div>
                        <div class="form-item">
                            <label for="mobile" class="form-label my-3">Mobile<sup>*</sup></label>
                            <input type="tel" class="form-control" id="mobile" name="mobile" required>
                        </div>
                        <div class="form-item">
                            <label for="email" class="form-label my-3">Email Address<sup>*</sup></label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" required>
                        </div>
                        <div class="form-item">
                            <label for="message" class="form-label my-3">Message<sup>*</sup></label>
                            <textarea name="text" class="form-control" id="message" name="message" spellcheck="false" cols="30" rows="6" placeholder="Oreder Notes (Optional)" required></textarea>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            <div class="p-4">
                                <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0 me-4">Total:</h5>
                                    <p id="total_price" class="mb-0"></p>
                                    <input id="total_price_input" type="text" name="total_price" value="" hidden>
                                </div>
                            </div>
                            <?php if (count($cart) > 0) : ?>
                                <button type="submit" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4">Place Order</button>
                            <?php else : ?>
                                <button type="button" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4 disabled">Place Order</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Cart Page End -->


  <?php 
  require_once "./bottop.php";
  ?>
    <script>
        let product_price = document.querySelectorAll('#product_price');
        let total_price = document.getElementById('total_price');
        let total_price_input = document.getElementById('total_price_input');

        let sum = 0;
        for (let i = 0; i < product_price.length; i++) {
            let num1 = parseInt(product_price[i].innerHTML);
            let num2 = 1;

            sum += num1 * num2;
        }

        total_price.innerHTML = "$" + sum;
        total_price_input.value = sum;
    </script>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>