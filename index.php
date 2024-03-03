<?php
session_start();

if (isset($_SESSION['user'])) {
    $user_id = $_SESSION['user']['id'];
} elseif (isset($_SESSION['admin'])) {
    $user_id = $_SESSION['admin']['id'];
}

require_once "./functions.php";
require_once "./topbot.php";
?>

<!-- section start -->
<section>
    <?php foreach ($products as $data) : ?>
        <div class="card">
            <div class="img">
                <img src="./dashboard/admin/assets/images/productImage/<?= $data['image'] ?>" alt="" style="height: 150px;">
            </div>
            <div class="text">
                <h3><?= $data['price'] ?> so'm </h3>
                <a class='nom' href='/show'><?= $data['name'] ?></a>
                <h4 style="display: none;"></h4>
                <h4 style="display: flex;">Brend:
                    <pre><p>  <?= $data['message'] ?></p></pre>
                </h4>
                <form action="./functions/cart.php?user_id=<?= $user_id; ?>" method="post">
                    <input type="text" name="name" value="<?= $data['name'] ?>" hidden>
                    <input type="text" name="price" value="<?= $data['price'] ?>" hidden>
                    <input type="text" name="image" value="<?= $data['image'] ?>" hidden>
                    <input type="text" name="quantity" value="1" hidden>
                    <p style="display: flex;align-items: center; justify-content: space-evenly; width: 100%;"><a href="" class="kop"><button>Add to cart</button></a><a href="" class="heart"><i class="fa-regular fa-heart"></i></a></p>
            </div>
                </form>
            </div>

        </div>
    <?php endforeach; ?>
</section>
<!-- section end -->
<?php require_once "./bottop.php"; ?>

<script src="js/search.js"></script>
</body>

</html>