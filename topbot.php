<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="photos/logo1.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

    <title>Document</title>
</head>

<body>
    <!-- header start -->
    <header>
        <a href='/'><img src="photos/logo1.png"></a>
        <input type="search" placeholder="Qidiruv">
        <ul>
            <li><a href='/'><i class="fa-solid fa-house" ></i>Home</a></li>
            <li><a href='./cart.php'><i class="fa-solid fa-basket-shopping"></i>Cart</a></li>
            <div class="d-flex align-items-center m-3 me-0">
                <!-- <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"> -->
                <!-- <i class="fas fa-search text-primary"></i> -->
                </button>
                <?php if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])) : ?>

                    <ul class="auth">
                        <li><a href='./login.php'><i class="fa-solid fa-right-to-bracket"></i>Login</a></li>
                        <li><a href='./register.php'><i class="fa-sharp fa-solid fa-registered"></i>Register</a></li>
                    </ul>
                <?php else : ?>
                    <ul class="auth">
                      <li><a href="#" ><i class="fa-solid fa-user"></i><?= (isset($_SESSION['user'])) ? $_SESSION['user']['username'] : $_SESSION['admin']['username']; ?></a></li>
                        <ul class="dropdown-menu m-0 bg-secondary rounded-0">
                            <?php if (isset($_SESSION['admin'])) : ?>
                            <li><a href="./dashboard/admin/index.php"><i class="fa-sharp fa-solid fa-lock"></i>Dashboard</a></li>
                            <?php endif; ?>
                          <li>  <a href="./logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
                        <?php endif; ?>
                        </ul>
                            </ul>
            </div>
        </ul>
    </header>
    <input type="search" class="input" placeholder="Qidiruv">
    <!-- header end -->
    