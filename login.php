<?php

session_start();
include("php/connection.php");
include("php/functions.php");
include("php/signup-login.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>

    <!--=============== CSS ===============--> 
    
    <link rel="stylesheet" href="assets/css-backend/login.css">
    <link rel="stylesheet" href="assets/css/cart.css">
    <title>Login - Satori</title>
</head>
<body>
    <!----=============== NAVIGATION ===============--> 
    <?= include("php/header.php")?>
    <?php if ($_SESSION["user_type"] !== "admin"){
        include("php/cart.php");
    }?>

    <!--=============== OFFERINGS ===============-->

    <main>
    <div class="form-container">
        <div class="form-image mobile">
            <img src="assets/img/Latte-back-bg.jpg" alt="Latte">
        </div>
        
        <div class="form login">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <legend>Satori</legend>
                
                <label for="username">Username</label>
                <input type="text" name="username" required>

                <!-- Ensure the name attribute of the password field is "password" -->
                <label for="password" >Password</label>
                <input type="password" name="password" required>

                <input id="login-submit" type="submit" name="login-submit" value="Sign in">

                <div class="or">
                    <hr><p>or</p><hr>
                </div>

                <p>New to Satori? <a href="" id="create">Create an account!</a></p>

                <?php
                    // Check if there is an error message in the session
                    if (isset($_SESSION["signup_error_message"])) {
                        echo '<div class="error-message">' . $_SESSION["signup_error_message"] . '</div>';
                        // Remove the error message from the session
                        unset($_SESSION["signup_error_message"]);
                    }

                    if (isset($_SESSION["login_error_message"])) {
                        echo '<div class="error-message">' . $_SESSION["login_error_message"] . '</div>';
                        // Remove the error message from the session
                        unset($_SESSION["login_error_message"]);
                    }
                ?>
                
            </form>
        </div>

        <div class="register">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <legend>Register</legend>
                <label for="username">User Name</label>
                <input type="text" name="username" required>

                <label for="firstname">First Name</label>
                <input type="text" name="firstname" required>

                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" required>

                <label for="email">Email</label>
                <input type="email" name="email" required>

                <label for="password">Password</label>
                <input type="password" name="password" required minlength="8" maxlength="20">

                <input id="signup-submit" type="submit" name="signup-submit" value="Sign up"><br><br>
                
                
                <div class="or">
                    <hr><p>or</p><hr>
                </div>

                <p><a href="">Click to Login</a></p>
            </form>
        </div>
        
    </div>
</main>

    <!--=============== FOOTER ===============-->
    <?= include("php/footer.php"); ?>

    <!--=============== JAVASCRIPT ===============-->
    <script src="assets/js/script.js"></script>
    <script src="assets/js/cart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
        var createAccountLink = document.getElementById('create');
        var registerForm = document.querySelector('.register');

        function handleCreateAccountClick(event) {
            event.preventDefault(); 
            registerForm.style.display = 'flex';
        }

        createAccountLink.addEventListener('click', handleCreateAccountClick);
    });
    </script>

</body>
</html>