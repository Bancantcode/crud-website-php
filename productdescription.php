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
    <link rel="stylesheet" href="assets/css/productdescription.css">
    <link rel="stylesheet" href="assets/css/cart.css">

    <title>Product Description - Satori</title>
</head>
<body>
    <!----=============== NAVIGATION ===============--> 
    <?= include("php/header.php")?>
    <?php if ($_SESSION["user_type"] !== "admin"){
        include("php/cart.php");
    }?>

    <!--=============== PRODUCT DESCRIPTION ===============-->
    <main class="main" id="main">
        <div class="description__container">
            <h1 class="description__title">Product Description<br>|</h1>
            <div class="description__grid">
                <!--=============== ESPRESSO ===============-->
                <div class="description__content">
                    <img class="description__image " src="./assets/img/description_espresso.jpg" alt="ESPRESSO">
                    <h1 class="description__name">Espresso<br><hr class="divider" size="2" color="black"></h1>
                    <p class="description__description">A concentrated coffee beverage brewed by forcing hot water through finely-ground coffee beans. It's known for its rich flavor and velvety texture, typically served in small shots.</p>
                </div>

                <!--=============== MILK BASE ===============-->
                <div class="description__content">
                    <img class="description__image " src="./assets/img/description_milkbase.jpg" alt="MILK BASE">
                    <h1 class="description__name">Milk Base<br><hr class="divider" size="2" color="black"></h1>
                    <p class="description__description">Coffee drinks that incorporate milk, such as lattes, cappuccinos, and macchiatos. The milk adds a creamy texture and can be steamed or frothed to varying degrees.</p>
                </div>

                <!--=============== FILTER ===============-->
                <div class="description__content">
                    <img class="description__image " src="./assets/img/description_filterbase.jpg" alt="FILTER">
                    <h1 class="description__name">Filter<br><hr class="divider" size="2" color="black"></h1>
                    <p class="description__description">Coffee brewed by passing water through a filter containing ground coffee beans. This method results in a clean and smooth cup with distinct flavor characteristics.</p>
                </div>

                <!--=============== POUR-OVER ===============-->
                <div class="description__content">
                    <img class="description__image " src="./assets/img/description_pourover.jpg" alt="POUR-OVER">
                    <h1 class="description__name">Pour-Over<br><hr class="divider" size="2" color="black"></h1>
                    <p class="description__description">A manual brewing method where hot water is poured over coffee grounds in a filter. This process allows for precise control over factors like water temperature and pouring technique, resulting in a flavorful and aromatic cup.</p>
                </div>

                <!--=============== TOKYO-DRIP ===============-->
                <div class="description__content">
                    <img class="description__image " src="./assets/img/description_tokyodrip.jpg" alt="TOKYO-DRIP">
                    <h1 class="description__name">Tokyo Drip<br><hr class="divider" size="2" color="black"></h1>
                    <p class="description__description">A slow-drip coffee brewing method originating from Japan, where ice-cold water drips slowly through coffee grounds over an extended period, typically 8-12 hours. This method produces a smooth, rich, and less acidic coffee concentrate.</p>
                </div>

                <!--=============== CONICAL BREWER ===============-->
                <div class="description__content">
                    <img class="description__image " src="./assets/img/description_conicalbrewer.jpg" alt="CONICAL BREWER">
                    <h1 class="description__name">Conical Brewer<br><hr class="divider" size="2" color="black"></h1>
                    <p class="description__description">A coffee brewing device with a conical shape, typically used for pour-over or drip brewing. The conical design allows for even extraction of flavor from the coffee grounds, resulting in a well-balanced cup.</p>
                </div>

                <!--=============== CORTADO ===============-->
                <div class="description__content">
                    <img class="description__image " src="./assets/img/description_cortado.jpg" alt="CORTADO">
                    <h1 class="description__name">Cortado<br><hr class="divider" size="2" color="black"></h1>
                    <p class="description__description">A Spanish coffee beverage consisting of equal parts espresso and steamed milk, resulting in a balanced and creamy drink with a strong coffee flavor.</p>
                </div>

                <!--=============== FLAT-WHITE ===============-->
                <div class="description__content">
                    <img class="description__image " src="./assets/img/description_flatwhite.jpg" alt="FLAT-WHITE">
                    <h1 class="description__name">Flat White<br><hr class="divider" size="2" color="black"></h1>
                    <p class="description__description">A popular espresso-based drink originating from Australia and New Zealand, made with a double shot of espresso and velvety steamed milk. It's known for its smooth texture and balanced flavor, with less milk than a latte.</p>
                </div>
            </div>
        </div>
    </main>

    <!--=============== FOOTER ===============-->
    <?= include("php/footer.php"); ?>

    <!--=============== JAVASCRIPT ===============-->
    <script src="assets/js/script.js"></script>
    <script src="assets/js/cart.js"></script>
</body>
</html>