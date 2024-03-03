<?php


?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Products</h3>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="?route=dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Products</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section id="content-types">
        <!-- Button trigger for basic modal -->
        <button type="button" class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#default">
            +Add
        </button>

        <!--Basic Modal -->
        <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel1">Add Products</h5>
                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form action="./functions/product_add.php" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" name="price" min="0" class="form-control" id="price" placeholder="Price" required>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">image</label>
                                <input type="file" name="image" class="form-control" id="exampleInputPassword1" ">
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea name="message" class="form-control" id="message" placeholder="Message" cols="30" rows="3" required></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" class="btn btn-primary ml-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Create</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Basic Modal -->
        <div class="row mt-3">
            <?php foreach ($products as $data) : ?>
               
              <div class="col-xl-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title"><?= $data['name']; ?></h4>
                                <ul>
                                    <li>Price : <b>$<?= $data['price'] ?></b></li>
                                </ul>
                                <p><?= $data['message'] ?></p>
                            </div>
                            <img class="img-fluid w-100" src="assets/images/productImage/<?= $data['image']; ?>" alt="Card image cap" style="height: 300px;">
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-warning block" data-bs-toggle="modal" data-bs-target="#default<?= $data['id'] ?>">
                                Edit
                            </button>
                            <!-- <a href="#" class="btn btn-warning">Edit</a> -->
                            <a href="./functions/product_delete.php?id=<?= $data['id'] ?>" onclick="return confirm('O\'chirishni xohlaysizmi?');" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>

                <!--Basic Modal -->
                <div class="modal fade text-left" id="default<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel1">Home Update image<?= $data['id'] ?></h5>
                                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form action="./functions/product_update.php?id=<?= $data['id'] ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="col d-flex ">
                                        <div class="col-5  ">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?= $data['name'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="price" class="form-label">Price</label>
                                                <input type="number" name="price" min="0" class="form-control" id="price" placeholder="Price" value="<?= $data['price'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <img src="./assets/images/productImage/<?= $data['image'] ?>" style="width: 100%; height: 160px; border-radius: 10px; margin-left: 20px;">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">image</label>
                                        <input type="file" name="image" class="form-control" id="image">
                                        <input type="text" name="image" value="<?= $data['image'] ?>" hidden>
                                    </div>
                                    <div class="mb-3">
                                        <label for="message" class="form-label">Message</label>
                                        <textarea name="message" class="form-control" id="message" placeholder="Message" cols="30" rows="3" required><?= $data['message'] ?></textarea>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button type="submit" class="btn btn-success ml-1">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Update</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Basic Modal -->
            <?php endforeach; ?>
        </div>
    </section>
</div>