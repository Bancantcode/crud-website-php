<?php 

session_start();
include("php/connection.php");
include("php/functions.php");

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
    <link rel="stylesheet" href="assets/css/coffeemenu.css">
    <link rel="stylesheet" href="assets/css/cart.css">
    <title>Coffee Menu - Satori</title>
</head>
<body>
    <!----=============== NAVIGATION ===============--> 
    <?= include("php/header.php")?>
    <?php if ($_SESSION["user_type"] !== "admin"){
        include("php/cart.php");
    }?>

    <!--=============== OFFERINGS ===============-->
    <main class="main" id="main">
        <section class="products">
            <h1 class="product__title">Coffee Menu <br><span>|</span></h1>
            <!--=============== ESPRESSO BASED ===============-->
            <h2 class="category__name"><span>Espresso - Based</span> (non-sugar)</h2>

            <div class="product__separator">
                <div class="offerings">
                    <!-- Display the products from the databsed with category espresso-based -->
                     <?php displayProductsByCategory($con, 'espresso-based'); ?> 
                </div>
            </div>

            <!--=============== POUR - OVER ===============-->
            <h2 class="category__name"><span>Pour - Over</span></h2>
            <div class="product__separator">
                <div class="offerings">
                    <!-- Display the products from the databsed with category pour-over -->
                    <?php displayProductsByCategory($con, 'pour-over'); ?>
                </div>
            </div>

            <!--=============== MILK - BASED ===============-->
            <h2 class="category__name milk"><span>Milk - Based</span> (non-sugar)</h2>
            <div class="product__separator">
                <div class="offerings">
                <!-- Display the products from the databsed with category milk-based -->
                <?php displayProductsByCategory($con, 'milk-based'); ?>
                </div>
            </div>

            <!--=============== SIGNATURE ===============-->
            <h2 class="category__name"><span>Signature</span></h2>
            <div class="product__separator">
                <div class="offerings">
                <!-- Display the products from the databsed with category signature -->    
                <?php displayProductsByCategory($con, 'signature'); ?>
                </div>
            </div>

            <!--=============== EXTRA ===============-->
            <h2 class="category__name"><span>Extra</span></h2>
            <div class="product__separator">
                <div class="offerings">
                <!-- Display the products from the databsed with category extra -->    
                <?php displayProductsByCategory($con, 'extra'); ?>
                </div>
            </div>

            <!--=============== PASTRIES ===============-->
            <h2 class="category__name" id="pastries"><span>Pastries</span></h2>
            <div class="product__separator">
                <div class="offerings">
                <!-- Display the products from the databsed with category pastries -->
                <?php displayProductsByCategory($con, 'pastries'); ?>
                </div>
            </div>
        </section>
    </main>

    <!--=============== FOOTER ===============-->
    <?= include("php/footer.php"); ?>


    <!--=============== JAVASCRIPT ===============-->
    <script src="assets/js/script.js"></script>
    <script src="assets/js/cart.js"></script>
</body>
</html>