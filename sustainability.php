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
    <link rel="stylesheet" href="assets/css/sustainability.css">
    <link rel="stylesheet" href="assets/css/cart.css">
    
    <title>Sustainability at the Heart of Our Mission - Satori</title>
</head>
<body>
    <!----=============== NAVIGATION ===============--> 
    <?= include("php/header.php")?>
    <?php if ($_SESSION["user_type"] !== "admin"){
        include("php/cart.php");
    }?>

    <!--=============== SUSTAINABILITY ===============-->
    <main class="main" id="main">
        <div class="sustainability__container">
            <div class="sustainability__content">
                <h1 class="sustainability__title">Sustainability at the Heart of Our Mission<br>|</h1>
                <p class="sustainability__description">We are committed to promoting sustainability in every aspect of our business, from supporting fair trade practices to implementing eco-friendly packaging solution. We believe in the power of a delicious cup – but not at the expense of our planet. Sustainability is at the very core of our mission, guiding every step of our coffee journey, from bean to cup.</p>
            </div>
            <div class="sustainability__collaboration">
                <img src="./assets/img/sustainability_Collaboration.png" alt="Collaboration Image" class="sustainability__image">
            </div>
            <div class="sustainability__content">
                <h1 class="sustainability__title">Ethical Sourcing & Fair Trade<br>|</h1>
                <p class="sustainability__description">Our commitment to sustainability starts at the very foundation of our coffee journey – the bean. We source our coffee beans from farms that prioritize sustainable growing methods. These practices not only protect the environment but also promote healthy ecosystems and biodiversity. Additionally, we champion fair trade practices, ensuring fair compensation for the farmers who cultivate our delicious beans. This empowers coffee-growing communities, incentivizing them to continue sustainable practices for generations to come.</p>
            </div>
            <div class="sustainability__grid">
                <img src="./assets/img/sustainability_coffee-grower.jpg" alt="Coffee Grower" class="grid__image">
                <img src="./assets/img/sustainability_Sustainability.jpg" alt="Sustainability" class="grid__image">
            </div>
            <div class="sustainability__content">
                <h1 class="sustainability__title">Bean-to-Cup Responsibility<br>|</h1>
                <p class="sustainability__description">Our commitment to sustainability extends beyond the farm. We utilize eco-friendly practices throughout our operations, including minimizing waste, using energy-efficient roasting techniques, and seeking recyclable packaging solutions.
                </p>
            </div>
            <div class="sustainability__responsibility">
                <img src="./assets/img/sustainability_Responsibility.jpeg" alt="Collaboration Image" class="sustainability__image">
            </div>
            <div class="sustainability__list">
                <p class="sustainability__description">We believe sustainability is a collaborative effort. We encourage our customers to join us on this journey by:</p>
                <ul class="sustainability__items">
                    <li class="list">Choosing Satori Coffee: By opting for our sustainably sourced and packaged products, you're actively supporting responsible coffee practices.</li>
                    <li class="list">Looking for Our Sustainability Labels: Our packaging clearly identifies products that prioritize environmental responsibility.</li>
                    <li class="list">Partnering for Change: We support various environmental initiatives. Look for ways to collaborate with us in promoting a more sustainable coffee industry.</li>
                </ul>
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