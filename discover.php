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
    <link rel="stylesheet" href="assets/css/discover.css">
    <link rel="stylesheet" href="assets/css/cart.css">

    <title>Discover Our Exceptional Coffee Selection - Satori</title>
</head>
<body>
    <!----=============== NAVIGATION ===============--> 
    <?= include("php/header.php")?>
    <?php if ($_SESSION["user_type"] !== "admin"){
        include("php/cart.php");
    }?>

    <!--=============== DISCOVER ===============-->
    <main class="main" id="main">
        <div class="discover__container">
            <h1 class="discover__title">Discover Our Exceptional Coffee Selection</h1>
            <div class="discover__flex">
                <p class="discover__description desc1">At Satori Specialty Coffee, we take pride in our carefully curated selection of beans, sourced from the very roots of the coffee plants in the lush mountains of Central-western Gedeb, Ethopia to the highlands of Carmo de Minas, Brazil, each bean is selected with care and expertise to ensure that only the highest quality makes its way into your cup.</p>
                <p class="discover__description">We work closely with farmers who share our commitment to sustainable and ethical practices, ensuring that every bean we use is of the highest standard. Each variety in our collection is handpicked for its unique flavor profile, ranging from bold to earthy. We understand that every coffee lover has their own preferences, which is why we offer a diverse range to cater to every palate.</p>
            </div>
        </div>
        <div class="image__container">
            <img src="./assets/img/discover_Coffee_Farm.jpg" alt="Coffee Farm" class="discover__image">
        </div>
        <div class="flex__container">
            <div class="beans__image">
                <img class="discover__beans" src="./assets/img/discover_Ethiopia_Beans.jpg" alt="Ethiopia Beans">
            </div>
            <div class="flex__content">
                <h1 class="flex__title">Ethiopia Halo Hartune Washed<br><hr class="divider" size="2" color="black"></h1>
                <p class="flex__description">This washed Ethiopian coffee is a collaborative effort involving 476 farmers at Haile Figa’s washing station in the elevated region of Gedeb. The Halo Hartume boasts light and bright characteristics, making it a perfect choice for enthusiasts who savor floral and fruity summery flavors.<br><br>This process involves carefully removing the cherry's outer layers before drying the beans, resulting in a clean and vibrant flavor profile. Expect a delightful combination of floral notes, bright acidity, and hints of citrus in every sip, making this coffee a true embodiment of Ethiopian coffee excellence.</p>
            </div>
        </div>
        <div class="image__container pushtop">
            <img src="./assets/img/discover_Central-western Gedeb, Ethiopia.jpg" alt="Central-western Gedeb, Ethiopia" class="discover__image">
        </div>
        <div class="flex__container">
            <div class="beans__image">
                <img class="discover__beans" src="./assets/img/discover_Brazil_Beans.jpg" alt="Brazil Beans">
            </div>
            <div class="flex__content">
                <h1 class="flex__title">Brazil Fazenda Sertao Anaerobic Natural<br><hr class="divider" size="2" color="black"></h1>
                <p class="flex__description">Rooted in the rich coffee history of Carmo de Minas since the early 1900s, Fazenda Sertão presents an exquisite anaerobic process coffee. Originally focused on Yellow Bourbon, the farm, now owned by Luiz Paulo Pereira of Carmo Coffees, produces a well-balanced coffee with a luscious blend of citrus and stonefruit flavors. <br><br>Delight your palate with the acidity reminiscent of pink grapefruit and tangerine, complemented by a nectarine-like sweetness and stickiness. Discover the rich legacy of Fazenda Sertão in every sip.</p>
            </div>
        </div>
        <div class="image__container pushtop">
            <img src="./assets/img/discover_Carmo de Minas, Brazil.jpeg" alt="Carmo de Minas, Brazil" class="discover__image">
            
        </div>
    </main>

    <!--=============== FOOTER ===============-->
    <?= include("php/footer.php"); ?>

    <!--=============== JAVASCRIPT ===============-->
    <script src="assets/js/script.js"></script>
    <script src="assets/js/cart.js"></script>
</body>
</html>