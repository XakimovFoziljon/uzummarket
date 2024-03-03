<?php 
session_start();
if(isset($_SESSION['user']) || isset($_SESSION['admin'])){
    header('Location: /  ');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uzum market - Login</title>
    <link rel="stylesheet" href="./dashboard/admin/assets/css/main/app.css">
    <link rel="stylesheet" href="./dashboard/admin/assets/css/pages/auth.css">
    <link rel="shortcut icon" href="./dashboard/admin/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="./dashboard/admin/assets/images/logo/favicon.png" type="image/png">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-6 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="/">
                            <h1 class="auth-title" style="color:rgba(98, 20, 176, 0.878); font-size:70px;">Uzum market</h1>
                        </a>
                    </div>
                    <h1 class="auth-title" style="color:rgba(98, 20, 176, 0.878);">Log in.</h1>
                    <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>
                    <?php
                    if(isset($_POST['btn_login'])) {
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        require_once "./db/sql.php";
                        $sql = "SELECT * FROM users WHERE email=:email";
                        $query = $pdo->prepare($sql);
                        $query->bindParam('email', $email);
                        $query->execute();
                        $user = $query->fetch(PDO::FETCH_ASSOC);
                        if($user) {
                            if(password_verify($password, $user['password'])) {
                                if($user['status'] == 1){
                                    session_start();
                                    $_SESSION['admin'] = $user;

                                    header('Location: ./dashboard/admin/');
                                }else{
                                    session_start();
                                     $_SESSION['user'] = $user;

                                     header('Location: /');
                                }




                            } else {
                                echo "<p class='alert alert-danger'>Paro'lda xatolik bor</p>";
                            }
                        } else {
                            echo "<p class='alert alert-danger'>Email yoki paro'lda xatolik bor</p>";
                        }
                    }
                    ?>
                    <form action="" method="post">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="email" class="form-control form-control-xl" placeholder="Email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div>
                        <input type="submit" name="btn_login" class="btn btn-primary btn-block btn-lg shadow-lg mt-5 "
                            style="background-color:rgba(98, 20, 176, 0.878);" value="Log in">
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Don't have an account? <a href="./register.php" class="font-bold"
                                style="color:rgba(98, 20, 176, 0.878);">Sign up</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block " style="background-color:rgba(98, 20, 176, 0.878);">
                <div id="auth-right " class="d-flex justify-content-center align-items-center">
                    <img src="./photos/logo1.png" alt=""
                        style="width: 500px; height:500px; object-fit: cover; margin-top:100px;">
                </div>
            </div>
        </div>

    </div>
</body>

</html>