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
    <link rel="stylesheet" href="assets/css/benefits.css">
    <link rel="stylesheet" href="assets/css/cart.css">

    <title>Benefits of Coffee - Satori</title>
</head>
<body>
    <!----=============== NAVIGATION ===============--> 
    <?= include("php/header.php")?>
    <?php if ($_SESSION["user_type"] !== "admin"){
        include("php/cart.php");
    }?>

    <!--=============== BENEFITS OF COFFFEE ===============-->
    <main class="main" id="main">
        <div class="benefits__container">
            <h1 class="benefits__title">Benefits of Coffee<br><hr size="2" color="black"></h1>
            <p class="benefits__description">Coffee, one of the world's most beloved beverages, offers more than just a morning pick-me-up. Packed with antioxidants and essential nutrients, coffee has been linked to numerous health benefits. From improved cognitive function and increased energy levels to a reduced risk of certain diseases like Parkinson's and type 2 diabetes, the perks of coffee extend beyond its rich aroma and bold flavor. <br><br>However, moderation is key, as excessive consumption may lead to adverse effects. When enjoyed responsibly, coffee can be a delightful addition to a healthy lifestyle, offering both physical and mental boosts.</p>
        </div>
        <div class="benefits__hero">
            <img class="hero__image" src="./assets/img/benefits_hero.jpg" alt="Coffee in a Province">
        </div>

        <div class="benefits__content">
            <img src="./assets/img/benefits_alertness.jpg" alt="Alertness Image" class="benefits__image">
            <div class="container">
                <h2 class="benefits__name">1. INCREASED ALERTNESS</h2>
                <p class="benefits__text">Coffee contains caffeine, a natural stimulant that blocks the effects of adenosine, a neurotransmitter that makes you feel sleepy. This can help you stay awake and alert, improving focus and concentration. In addition to promoting wakefulness, caffeine in coffee has been shown to enhance cognitive function by increasing the release of neurotransmitters like dopamine and norepinephrine. <br><br>These chemicals play crucial roles in regulating mood, motivation, and attention, leading to heightened alertness and improved mental clarity. As a result, coffee can be a valuable tool for staying productive and engaged throughout the day, especially during periods of intense cognitive tasks or demanding work schedules.</p>
            </div>
        </div>
        <hr class="divider">
        <div class="benefits__content">
            <img src="./assets/img/benefits_Physical Performance.jpg" alt="Improved Physical Performance Image" class="benefits__image">
            <div class="container">
                <h2 class="benefits__name">2. IMPROVED PHYSICAL PERFORMANCE</h2>
                <p class="benefits__text">Caffeine stimulates the nervous system, signaling fat cells to break down body fat. It also increases adrenaline levels in the blood, preparing the body for physical exertion. These effects can enhance physical performance and endurance during activities like exercise or sports. <br><br>Caffeine's ability to stimulate the nervous system can lead to increased muscle contractions and improved neuromuscular coordination, contributing to better overall physical performance. By mobilizing fatty acids from fat tissues and making them available for use as energy, caffeine can also help spare glycogen stores in muscles, delaying fatigue and extending endurance. This dual action on both the nervous system and metabolism makes coffee a popular pre-workout beverage among athletes and fitness enthusiasts seeking to maximize their exercise potential and achieve peak performance.</p>
            </div>
        </div>
        <hr class="divider">
        <div class="benefits__content">
            <img src="./assets/img/benefits_Antioxidant Properties.jpg" alt="Antioxidant Properties Image" class="benefits__image">
            <div class="container">
                <h2 class="benefits__name">3. ANTIOXIDANT PROPERTIES</h2>
                <p class="benefits__text">Coffee is rich in antioxidants, such as chlorogenic acid and polyphenols, which help neutralize harmful free radicals in the body. Regular consumption of coffee may reduce the risk of chronic diseases, including certain cancers, heart disease, and neurodegenerative disorders like Alzheimer's and Parkinson's disease.<br><br>The antioxidants present in coffee have anti-inflammatory properties that can help reduce inflammation throughout the body. Chronic inflammation is linked to various health issues, including cardiovascular diseases and arthritis. By combating inflammation, coffee's antioxidant content may contribute to overall wellness and longevity. Additionally, these antioxidants have been associated with improved vascular health, promoting better blood flow and potentially lowering the risk of conditions such as hypertension and stroke.</p>
            </div>
        </div>
        <hr class="divider">
        <div class="benefits__content">
            <img src="./assets/img/benefits_Mental Well Being.jpg" alt="Mental Well Being Image" class="benefits__image">
            <div class="container">
                <h2 class="benefits__name">4. MENTAL WELL-BEING</h2>
                <p class="benefits__text">Coffee has been linked to improved mood and mental well-being. Caffeine stimulates the release of neurotransmitters like dopamine and serotonin, which are associated with pleasure and mood regulation. Regular coffee consumption has been correlated with a lower risk of depression and may improve overall mental health.<br><br>Coffee consumption has been associated with a reduced risk of cognitive decline and neurodegenerative diseases in later life. The combination of caffeine and antioxidants in coffee may help protect brain cells from damage caused by oxidative stress and inflammation, thereby preserving cognitive function and promoting mental acuity as you age.</p>
            </div>
        </div>
        <hr class="divider">    
        <div class="benefits__content">
            <img src="./assets/img/benefits_Protection Against Liver.jpg" alt="Protection Against Liver Image" class="benefits__image">
            <div class="container">
                <h2 class="benefits__name">5. PROTECTION AGAINST LIVER DISEASES</h2>
                <p class="benefits__text">Coffee has been shown to have protective effects on the liver. Regular consumption may lower the risk of liver diseases, including liver cirrhosis and liver cancer. The compounds in coffee help reduce inflammation and inhibit the accumulation of fat in the liver, promoting better liver function.<br><br>By aiding in the regulation of liver enzymes and promoting the breakdown of fats, coffee's beneficial compounds can help mitigate the progression of NAFLD and other liver disorders. Additionally, studies have found that coffee drinkers have a lower incidence of liver fibrosis and hepatocellular carcinoma, the most common type of liver cancer.</p>
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