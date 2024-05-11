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
    <link rel="stylesheet" href="assets/css/cart.css">
    <link rel="stylesheet" href="assets/css/contacts.css">

    <title>Contact - Satori</title>
</head>
<body>
    <!----=============== NAVIGATION ===============--> 
    <?= include("php/header.php")?>
    <?php if ($_SESSION["user_type"] !== "admin"){
        include("php/cart.php");
    }?>

    <!--=============== CONTACT ===============-->
    <main class="main" id="main">
        <div class="contact__container">
            <img src="./assets/img/contact.png" alt="Satori Image" class="contact__image">
            <div class="contact__details">
                <h2 class="about__sitename">Satori Specialty Coffee</h2>
                <p class="descriptions">Ceo Flats Jupiter Street, Bel-Air Makati City</p>
                <div class="enquiries__container">
                    <p class="number">For More Detail, Call <span class="bold__text"><a class="contact__links" href="tel:0928-2977-154">+9282977154</a></span></p>
                    <p class="customer__enquiries">Customer Enquiries<br><span class="bold__text"><a class="contact__links" href="mailto: santiagobryan831@gmail.com">admin@satorispecialtycoffee.com</a></span></p>
                    <p class="wholesale__enquiries">Wholesale Enquiries<br><span class="bold__text"><a class="contact__links" href="mailto: santiagobryan831@gmail.com">sales@satorispecialtycoffee.com</a></span></p>
                </div>
                <p class="schedule">Monday-Thursday<br><span class="bold__text">9 am - 8 pm</span></p>
                <p class="schedule">Friday-Sunday<br><span class="bold__text">9 am - 9 pm</span></p>
            </div>
        </div>
        
        <!--==================== MAP ====================-->
        <section class="map" id="map">
            <div class="map__container">
                <h1 class="map__title">LOCATION</h1>
                <h2 class="find">Find us on Google Map<br>|</h2>
                <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.7461872765784!2d121.03216617597631!3d14.556501778153027!2m3!1f0!2f0!3f0!3
                    m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c8fe0bbfa08b%3A0x790141a623f7342f!2sCEO%20Flats!5e0!3m2!1sen!2sph!4v1699447996893!5m2!1sen!2sph" 
                    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </section>
            
            <!--==================== CONTACT FILL UP ====================-->
            <section class="fillup" id="fillup">
                <div class="fillup__container">
                    <h1 class="fillup__title">Contact</h1>
                    <form class="fill__form grid">
                        <input class="fill__inp" type="text" id="name" name="name" placeholder="Your name" required>    
                        <input class="fill__inp" type="email" id="email" name="email" placeholder="Your email" required>
                        <input class="fill__inp" type="tel" id="phone" name="phone" placeholder="Your phone (optional)">
                        <textarea class="fill_inp" id="message" name="message" placeholder="Your message" rows="10" required></textarea>
                        <div class="fill__submit">
                            <button class="fill__button" type="submit">Send Message</button>
                        </div>
                    </form>
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