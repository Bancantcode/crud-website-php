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
    <link rel="stylesheet" href="./assets/css/about.css">
    <link rel="stylesheet" href="assets/css/cart.css">
    <title>About - Satori</title>
</head>
<body>
    <!----=============== NAVIGATION ===============--> 
    <?= include("php/header.php")?>

    <?php if ($_SESSION["user_type"] !== "admin"){
        include("php/cart.php");
    }?>
    
    <!--=============== OFFERINGS ===============-->
    <main class="main" id="main">
        <!--=============== ABOUT US ===============-->
        <section class="about__container">
            <div class="about__content">
                <h1 class="about__us">ABOUT US</h1>
                <h2 class="about__title">Elevating Your Coffee Experience<br>____</h2>
                <p class="about__description">Coffee isn’t just a drink, it’s our passion, reaching deep into the soul of every sip. Satori specialty coffee strives to offer a unique coffee experience like no other. We believe in promoting the culture of supreme quality high-graded coffees from various international roasteries, and we aim to lead the way in doing so. <br><br>Our name, Satori, comes from a Japanese word that means “to know”. It is a unique concept of knowledge, an experience that cannot be put into words.<br><br>      Let’s create, connect, and celebrate the love of coffee together at Satori!</p>
            </div>
            <div class="about__image">
                <img class="about__img" src="./assets/img/about_hero.png" alt="Satori Entrance Picture">
            </div>
        </section>

        <!--=============== OUR PHILOSOPHY ===============-->
        <section class="philosophy__container" id="philosophy">
            <div class="philosophy__content">
                <h1 class="philosophy">OUR PHILOSOPHY</h1>
                <h2 class="philosophy__title">Crafted Rituals, Where Passion Brews<br>|</h2>
                <p class="philosophy__description">We believe that the only sustainable way to grow a company is together with others. This project is the result of many years spent in the specialty coffee industry.<br><br>Every impression and experience we have collected during those years are now being summed up into one final project, Satori Specialty Coffee.<br><br>At Satori, we believe that coffee is not more than just a beverage, but rather an experience that brings people together.</p>
            </div>
        </section>

        <!--=============== SATORI IMAGES ===============-->
        <section class="about__images">
            <div class="about__grid">
                <img class="grid1" src="./assets/img/about_Image1.png" alt="About Image 1">
                <img class="grid2" src="./assets/img/about_Image2.png" alt="About Image 2">
                <img class="grid3" src="./assets/img/about_Image3.png" alt="About Image 3">
                <img class="grid4" src="./assets/img/about_Image4.png" alt="About Image 4">
            </div>
        </section>

        <!--=============== FARM TO CUP INTRODUCTION ===============-->
        <section class="farm__container">
            <div class="farm__content">
                <h1 class="farm">FARM TO CUP</h1>
                <h2 class="farm__title">Everthing we do is a matter of heart, body and soul<br>|</h2>
                <div class="farm__description">No matter what beverage is created with coffee in your cafés, it all starts with green coffee. We believe that no amount of roasting expertise or beverage mixology can take the place of the kind of green coffee that’s the result of intentionality at the farm level. Coffees that are grown and harvested to maintain quality and consistency from cherry ripeness to density and then processed to continue that quality creates a coffee that is clean, flavorful, and interesting from seed to cup.</div>
                <button class="wholebean__button">
                    <a href="coffeemenu.php">VIEW OUR COFFEE MENU</a>
                </button>
            </div>
        </section>
        
        <!--=============== FARM TO CUP ===============-->
        <section class="farmtocup__container" id="farm__container">
            <div class="farmtocup__image">
                <img class="farmtocup__img" src="./assets/img/about_beans.png" alt="Beans">
            </div>
            <div class="farmtocup__content">
                <h1 class="farmtocup">FARM TO CUP</h1>
                <h2 class="farmtocup__title">We source from farmers we know and trust<br>____</h2>
                <p class="farmtocup__description">Our commitment to seeking out quality green coffee ranges from trips to the origin where Max the head roaster cups hundreds of coffees in search of the one or two that fits what we are looking for. At times this yields small, one-bag micro-lot, picked and processed specifically for Satori's coffee roastery that has gone on to win more than two awards in both regional and national coffee competitions.</p>
            </div>
        </section>

        <!--=============== WHOLE BEAN ===============-->
        <section class="wholebean__container">
            <div class="wholebean__content">
                <h1 class="wholebean">OUR WHOLE BEAN</h1>
                <h2 class="wholebean__title">For us it is important to work with the best ingredients we can find <br>|</h2>
                <p class="wholebean__description">When it comes to coffee that means Specialty Graded Green Beans. These beans are grown with attention to detail and love. They are picked by hand and processed in a way that highlights the character of the coffee. This is done by some of the most dedicated farmers and producers around the world. <br><br>For our Whole Bean range, we have divided our products into the following different categories: Filter, Espresso, and Milk base.<br><br>After years of experience in the specialty, we find it important to customize as much as we can when aiming for the best possible quality in each category.</p>
                <button class="wholebean__button">
                    <a href="coffeemenu.php">VIEW OUR COFFEE MENU</a>
                </button>
            </div>
        </section>

        <!--=============== FILTER, ESPRESSO AND MILK BASED COFFEE  ===============-->
        <section class="filter__container">
            <div class="filter__image" id="filter">
                <img class="filter__img" src="./assets/img/about_filter.png" alt="Filter Image">
            </div>
            <div class="filter__content">
                <h1 class="filter">FARM TO CUP</h1>
                <h2 class="filter__title">Filter<br>___</h2>
                <p class="filter__description">When it comes to Filter Coffee we are looking for a clean, flavorful, and transparent cup of coffee that showcases the origin in the best possible way.<br><br>The goal is to showcase a coffee without displaying any negative flavors from the roasting process – that can refer to both under and over roast.</p>
            </div>
            <div class="espresso__image" id="espresso">
                <img class="espresso__img" src="./assets/img/about_espresso.png" alt="Espresso Coffee Image">
            </div>
            <div class="espresso__content">
                <h1 class="espresso">FARM TO CUP</h1>
                <h2 class="espresso__title">Espresso<br>___</h2>
                <p class="espresso__description">All Grandmother Espressos would fall into the category of “Modern Espresso”. The machinery we work with today in terms of brewing enables us to push the idea of roasting for espresso.<br><br>We want it clean, sweet, and with a buttery mouthfeel. A good espresso has a great structure to it without becoming too heavy or dry – balance is key and we welcome acidity but make sure it is balanced up with sweetness.</p>
            </div>
            <div class="milkbase__image" id="milkbase">
                <img class="milkbase__img" src="./assets/img/about_milk.png" alt="Milk Base Coffee Image">
            </div>
            <div class="milkbase__content">
                <h1 class="milkbase">FARM TO CUP</h1>
                <h2 class="milkbase__title">Milk Base<br>___</h2>
                <p class="milkbase__description">This is a concept that we have worked on for a long time. The dynamic of your espresso changes when you pour milk into it. Something that for us is obvious.<br><br>In our attempt to make as tasty coffee as possible and knowing that most people in the region and around the world drink espresso with milk we launched a range of Espresso that we believe to be extra suitable for milk drinks.<br><br>The quality of green coffee is just as high as our Filter and Espresso range but the balance and acidity structure is different. The roasting focuses on optimizing body and sweetness while still retaining flavor clarity.</p>
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