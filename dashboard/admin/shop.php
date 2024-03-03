<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Shop</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="?route=dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shop</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section id="content-types">
        <div class="row mt-3">
            <?php foreach ($shop as $data) : ?>
                <div class="col-xl-5 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title"><?= $data['name'] ?></h4>
                                <div class="table-responsive">
                                    <?php
                                    $sql = "SELECT * FROM cart WHERE user_id=:user_id AND time=:time AND status=1";
                                    $query = $pdo->prepare($sql);
                                    $query->bindParam('user_id', $data['user_id']);
                                    $query->bindParam('time', $data['time']);
                                    $query->execute();
                                    $cart = $query->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <table class="table table-lg">
                                        <thead>
                                            <tr>
                                                <th>NAME</th>
                                                <th>PRICE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($cart as $item) : ?>
                                                <tr>
                                                    <td class="text-bold-500"><?= $item['name']; ?></td>
                                                    <td class="text-bold-500"><?= $item['price']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <ul>
                                    <li><b>Mobile:</b> <span class="text-danger"><?= $data['mobile'] ?></span></li>
                                    <li><b>Email:</b> <span class="text-danger"><?= $data['email'] ?></span></li>
                                    <li><b>Country:</b> <span class="text-danger"><?= $data['country'] ?></span></li>
                                    <li><b>City:</b> <span class="text-danger"><?= $data['city'] ?></span></li>
                                    <li><b>Address:</b> <span class="text-danger"><?= $data['address'] ?></span></li>
                                    <li><b>Text:</b> <span class="text-danger"><?= $data['text'] ?></span></li>
                                </ul>
                                <div class="d-flex justify-content-end">

                                    <h4 class="card-title">Totol price: <span class="text-success"><?= $data['total_price'] ?>so'm</span></h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <?php if ($data['active'] == 0) : ?>
                                <a href="./functions/shop_active.php?id=<?= $data['id']; ?>" class="btn btn-warning block">Acceptance</a>
                            <?php else : ?>
                                <button type="button" class="btn btn-success block disabled">Accepted</button>
                            <?php endif; ?>
                            <!-- <a href="?route=home-edit" class="btn btn-warning">Edit</a> -->
                            <a href="./functions/shop_delete.php?id=<?= $data['id'] ?>&user_id=<?= $data['user_id'] ?>&time=<?= $data['time'] ?>" onclick="return confirm('O\'chirishni xohlaysizmi?');" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>