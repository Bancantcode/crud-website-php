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
    <link rel="stylesheet" href="assets/css/stories.css">
    <link rel="stylesheet" href="assets/css/cart.css">

    <title>Stories - Satori</title>
</head>
<body>
    <!----=============== NAVIGATION ===============--> 
    <?= include("php/header.php")?>
    <?php if ($_SESSION["user_type"] !== "admin"){
        include("php/cart.php");
    }?>

    <!--=============== STORIES ===============-->
    <main class="main" id="main">
        <div class="stories__container">
            <div class="stories__flex">
                <div class="stories__content">
                    <h1 class="stories__title">Experience the Finest Coffee from Farm to Cup</h1>
                    <p class="stories__description">At Satori Specialty Coffee, we take pride in our farm-to-cup sourcing process. Each bean is carefully selected and roasted to perfection, ensuring a rich and flavorful coffee experience. Discover the true essence of specialty coffee with us.</p>
                    <div class="stories__grid">
                        <div class="grid__container">
                            <h2 class="grid__title">Artisanal Roasting</h2>
                            <p class="grid__description">Our expert roasters carefully craft each batch to bring out the unique flavors of every bean.</p>
                        </div>
                        <div class="grid__container">
                            <h2 class="grid__title">Quality Beans</h2>
                            <p class="grid__description">We source our beans directly from sustainable farms around the world, ensuring freshness and quality.</p>
                        </div>
                    </div>
                    <button class="stories__button">
                        <a href="about.php" class="button" target="_blank">LEARN MORE</a>
                    </button>
                </div>
                <div class="stories__image">
                    <img src="./assets/img/about_beans.png" alt="Beans" class="hero__image">
                </div>
            </div>
            <hr>

            <div class="main__stories">
                <div class="main__container">
                    <h1 class="main__title">Discover Our Exceptional Coffee Selection</h1>
                    <p class="main__description">Indulge in our meticulously curated selection of beans, sourced from the world's most esteemed coffee-growing regions, exclusively at Satori Specialty Coffee.</p>
                    <button class="stories__button button1">
                        <a href="discover.php" class="button" target="_blank">LEARN MORE</a>
                    </button>
                </div>
                <div class="main__container">
                    <h1 class="main__title">Sustainability at the Heart of Our Mission</h1>
                    <p class="main__description">We are committed to promoting sustainability in every aspect of our business, from supporting fair trade practices to implementing eco-friendly packaging solutions.</p>
                    <button class="stories__button button1">
                        <a href="sustainability.php" class="button" target="_blank">LEARN MORE</a>
                    </button>
                </div>
                <div class="main__container">
                    <h1 class="main__title">Meet the Team Behind Satori</h1>
                    <p class="main__description">Our team members undergo a meticulous training process, ensuring that every interaction with the Satori Specialty Coffee team is a true delight for our customers.<br><br></p>
                    <button class="stories__button button1">
                        <a href="team.php" class="button" target="_blank">LEARN MORE</a>
                    </button>
                </div>
            </div>

            <div class="menu__stories">
                <h1 class="menu__header">Explore Our Coffee Chronicle: From Beans to Brews</h1>
                <div class="menu__flex">
                    <div class="menu__container">
                        <img src="./assets/img/stories__coffee.jpg" alt="Coffee Menu" class="menu__image">
                        <h2 class="menu__title">Discover Our Wide Range of Coffee Blends and Flavors</h2>
                        <div class="menu__description">Follow the aroma to our menu, where you'll discover your perfect cup waiting to be savored. Whether you're ordering online or opting for our convenient subscription service, our exquisite coffee is just a click away from finding its way to your doorstep.</div>
                        <a href="coffeemenu.php" class="menu__link" target="_blank">Order ></a>
                    </div>
                    <div class="menu__container">
                        <img src="./assets/img/stories__equipments.jpg" alt="Coffee Equipments" class="menu__image">
                        <h2 class="menu__title">Explore Our Selection of Quality Coffee Equipments</h2>
                        <div class="menu__description">From state-of-the-art espresso machines to artisanal grinders and stylish equipments, discover the tools to craft your perfect cup of coffee. At Satori Specialty Coffee, we offer more than just exceptional coffee blends and flavors.</div>
                        <a href="equipments.php" class="menu__link" target="_blank">Explore ></a>
                    </div>
                    <div class="menu__container">
                        <img src="./assets/img/stories__beans.jpg" alt="Coffee Beans" class="menu__image">
                        <h2 class="menu__title">Freshness and Quality Handpicked Coffee Beans</h2>
                        <div class="menu__description">We take pride in offering only the finest artisanal coffee beans. Each bean is carefully selected and roasted to perfection to ensure a rich and flavorful experience in every cup. Explore our range of artisanal coffee beans today.</div>
                        <a href="coffeebeans.php" class="menu__link" target="_blank">Shop ></a>
                    </div>
                </div>
            </div>

            <div class="additional__container">
                <div class="additional__grid">
                    <div class="additional__content">
                        <img src="./assets/img/rechargeandreset.jpg" alt="Recharge and Reset" class="additional__image">
                        <h2 class="additional__title">Recharge and Reset</h2>
                        <a href="recharge.php" class="menu__link" target="_blank">Explore More ></a>
                    </div>
                    <div class="additional__content">
                        <img src="./assets/img/description_tokyodrip.jpg" alt="Product Description" class="additional__image">
                        <h2 class="additional__title">Product Description</h2>
                        <a href="productdescription.php" class="menu__link" target="_blank">Explore More ></a>
                    </div>
                    <div class="additional__content">
                        <img src="./assets/img/events__coffeetasting.jpg" alt="Upcoming Events" class="additional__image">
                        <h2 class="additional__title">Upcoming Events</h2>
                        <a href="events.php" class="menu__link" target="_blank">Explore More ></a>
                    </div>
                    <div class="additional__content">
                        <img src="./assets/img/benefits_Antioxidant Properties.jpg" alt="Coffee Benefits" class="additional__image">
                        <h2 class="additional__title">Coffee Benefits</h2>
                        <a href="benefits.php" class="menu__link" target="_blank">Explore More ></a>
                    </div>
                    <div class="additional__content">
                        <img src="./assets/img/TimemoreChestnutC3Black.jpg" alt="Menu Fun Facts" class="additional__image">
                        <h2 class="additional__title">Menu Fun Facts</h2>
                        <a href="funfacts.php" class="menu__link" target="_blank">Explore More ></a>
                    </div>
                </div>
            </div>
            <hr>

            <div class="newletter">
                <h2 class="newsletter__title">Newsletter</h2>
                <form class="newsletter__form" action="">
                    <input class="newsletter__input" type="email" name="email" id="email" aria-label="Enter your email" placeholder="Enter your email" required>
                    <button type="submit" value="Subscribe" class="newsletter__button">SUBSCRIBE</button>
                </form>
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