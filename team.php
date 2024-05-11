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
    <link rel="stylesheet" href="assets/css/team.css">
    <link rel="stylesheet" href="assets/css/cart.css">
    <title>Meet the Team - Satori</title>
</head>
<body>
    <!----=============== NAVIGATION ===============--> 
    <?= include("php/header.php")?>
    <?php if ($_SESSION["user_type"] !== "admin"){
        include("php/cart.php");
    }?>

    <!--=============== MEET THE TEAM ===============-->
    <main class="main" id="main">
        <div class="team__container">
            <h1 class="team">MEET THE TEAM</h1>
            <h2 class="team__title">Who we are<br>___</h2>
            <div class="team__description">We are not merely a team; we are a meticulously curated ensemble of international experts, unified by a singular ambition: to redefine the landscape of specialty coffee. <br><br>At Satori Specialty Coffee, our mission is crystal clear — to craft extraordinary coffee experiences that transcend the ordinary, leaving an indelible mark on culture while fostering connections among coffee enthusiasts worldwide.</div>
        </div>
        <div class="team__grid">
            <div class="team__content">
                <img class="team__image" src="./assets/img/Team4.png" alt="Kim Co Daluz (Founder - CEO)">
                <p class="content__name">Kim Co Daluz</p>
                <p class="content__role">Founder - CEO</p>
            </div>
            <div class="team__content">
                <img class="team__image" src="./assets/img/Team2.png" alt="JC Pamintuan (Barista)">
                <p class="content__name">JC Pamintuan</p>
                <p class="content__role">Barista</p>
            </div>
            <div class="team__content">
                <img class="team__image" src="./assets/img/Team1.png" alt="Max Yarz (Head Roaster)">
                <p class="content__name">Max Yarz</p>
                <p class="content__role">Head Roaster</p>
            </div>
            <div class="team__content">
                <img class="team__image" src="./assets/img/Team3.png" alt="Josh Doppiowa (Homebrewer)">
                <p class="content__name">Josh Doppiowa</p>
                <p class="content__role">Homebrewer</p>
            </div>
        </div>
        <hr class="divider">
        <div class="about-team__container">
            <h1 class="about-team">MEET THE TEAM</h1>
            <h2 class="about-team__title">About the Team<br>|</h2>
            <p class="about-team__description">As the visionary force behind Satori Specialty Coffee, Kim Co Daluz leads with a passion for specialty coffee that knows no bounds. With a keen eye for innovation and a deep appreciation for craft, <strong>Kim Co Daluz</strong> has cultivated Satori from its inception, infusing every aspect of the brand with authenticity and excellence. <br><br></p>
            <p class="about-team__description"><strong>JC Pamintuan</strong> brings a wealth of experience and a genuine love for the craft of coffee to the Satori team. As a skilled barista, JC's expertise lies not only in the art of brewing but also in creating meaningful connections with each customer who walks through the door. With a meticulous approach to every cup they craft, JC ensures that every sip of Satori's coffee is an experience to savor, embodying the spirit of hospitality and craftsmanship that defines the Satori ethos.<br><br></p>
            <p class="about-team__description">At the heart of Satori's coffee offerings lies the expertise of <strong>Max Yarz</strong>, our Head Roaster extraordinaire. With an acute palate and an unwavering commitment to quality, Max meticulously selects and roasts each batch of beans to perfection, ensuring that every cup of Satori coffee is a true expression of flavor and craftsmanship.<br> Their dedication to sourcing the finest beans and their mastery of the roasting process elevate Satori's offerings to new heights, setting the standard for excellence in specialty coffee.<br><br></p>
            <p class="about-team__description"><strong>Josh Doppiowa</strong> is the embodiment of the homebrewing spirit at Satori Specialty Coffee. With a passion for experimentation and a penchant for pushing the boundaries of flavor, Josh's homebrewing prowess brings a touch of creativity and excitement to the Satori lineup. <br>Their dedication to exploring new techniques and flavor profiles keeps Satori's offerings fresh and dynamic, inviting customers to embark on a journey of discovery with each sip.<br><br></p>
        </div>
    </main>

    <!--=============== FOOTER ===============-->
    <?= include("php/footer.php"); ?>

    <!--=============== JAVASCRIPT ===============-->
    <script src="assets/js/script.js"></script>
    <script src="assets/js/cart.js"></script>
</body>
</html>