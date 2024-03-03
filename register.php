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
    <title>Uzum market - Register</title>
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
                    <h1 class="auth-title" style="color:rgba(98, 20, 176, 0.878);">Sign Up</h1>
                    <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

                    <?php
                    if(isset($_POST['btn_register'])) {
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $confirm_password = $_POST['confirm_password'];
                        $errors = array();
                        if(empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
                            array_push($errors, "Barcha maydonlarni to'ldiring");
                        }
                        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            array_push($errors, "Elektron pochta manzili yaroqsiz");
                        }
                        if(strlen($password) < 8) {
                            array_push($errors, "Parol kamida 8ta belgidan iborat bo'lishi kerak");
                        }
                        if($password != $confirm_password) {
                            array_push($errors, "Parol mos emas");
                        }
                        require_once "./db/sql.php";
                        $sql = "SELECT * FROM users WHERE email=:email";
                        $query = $pdo->prepare($sql);
                        $query->bindParam('email', $email);
                        $query->execute();
                        $user = $query->fetch(PDO::FETCH_ASSOC);
                        if($user) {
                            array_push($errors, "Elektron pochta allaqachon mavjud");
                        }
                        if(count($errors) > 0) {
                            foreach($errors as $error) {
                                echo "<p class='alert alert-danger'>$error</p>";
                            }
                        } else {
                            $data = [
                                'username' => $username,
                                'email' => $email,
                                'password' => password_hash($password, PASSWORD_DEFAULT),
                                'status' => 0,
                            ];
                            require_once "./db/sql.php";
                            $sql = "INSERT INTO users( username, email, password, status) VALUES ( :username, :email, :password, :status)";
                            $query = $pdo->prepare($sql);
                            $query->execute($data);
                            echo "<p class='alert alert-success'>Siz muvafaqqiyatli ro'yxatdan o'tdingiz. <a href='login.php'>Login</a></p>";
                        }
                    }
                    ?>
                    <!-- <p class="alert alert-success">Error</p> -->
                    <!--  -->



                    <form action="" method="post">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="email" class="form-control form-control-xl" placeholder="Email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="username" class="form-control form-control-xl" placeholder="Username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="confirm_password" class="form-control form-control-xl" placeholder="Confirm Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5" name="btn_register" style="background-color:rgba(98, 20, 176, 0.878);" value="Sign Up">
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Already have an account? <a href="./login.php" class="font-bold"
                                style="color:rgba(98, 20, 176, 0.878);">Login</a>.</p>
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