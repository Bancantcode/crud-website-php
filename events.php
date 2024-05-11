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
    <link rel="stylesheet" href="assets/css/events.css">
    <link rel="stylesheet" href="assets/css/cart.css">

    <title>Upcoming Events - Satori</title>
</head>
<body>
    <!----=============== NAVIGATION ===============--> 
    <?= include("php/header.php")?>
    <?php if ($_SESSION["user_type"] !== "admin"){
        include("php/cart.php");
    }?>

    <!--=============== UPCOMING EVENTS ===============-->
    <main class="main" id="main">
        <div class="events__container">
            <h1 class="events__title">Upcoming Events<br>|</h1>
             <!--=============== ART EXHIBITION ===============-->
            <div class="events">
                <img src="./assets/img/events_artexhibition.jpg" alt="Art Exhibition" class="events__image">
                <div class="content__container content1">
                    <h1 class="events__name">Art Exhibition<br><hr class="divider d1" size="2" color="black"></h1>
                    <p class="events__description">At our Art Exhibitions, you'll discover an eclectic array of visual delights, from paintings and photographs to sculptures and mixed media installations. Each piece tells a unique story, offering a glimpse into the imagination and talent of our featured artists.<br><br>Sip on your favorite brew as you wander through our gallery space, soaking in the beauty and intrigue of each creation. Engage with the artists themselves during opening nights and special events, gaining insight into their inspiration, techniques, and artistic vision.</p>
                </div>
            </div>

            <!--=============== BREWING WORKSHOPS ===============-->
            <div class="events1">
                <img src="./assets/img/events_brewingworkshop.jpg" alt="Brewing Workshops" class="events__image">
                <div class="content__container content2">
                    <h1 class="events__name">Brewing Workshops<hr class="divider d2" size="2" color="black"></h1>
                    <p class="events__description">Equip yourself with the tools and know-how to brew coffee like a pro, and experience the satisfaction of savoring a perfectly brewed cup every time. Join us for an enriching and empowering journey into the heart of coffee craftsmanship at our Brewing Workshops!<br><br>Unlock the secrets of exceptional coffee brewing at our Brewing Workshops! Embark on a journey of discovery as our expert instructors guide you through the art and science of crafting the perfect cup.<br><br>In our hands-on workshops, you'll learn the ins and outs of various brewing methods, from the classic French press to the intricate pour-over technique. Gain invaluable knowledge about coffee bean selection, grinding, water temperature, and extraction times, as you master the fundamentals of flavor extraction.</p>
                </div>
            </div>

            <!--=============== BARISTA COMPETITION ===============-->
            <div class="events2">
                <img src="./assets/img/events_baristacompetition.jpg" alt="Barista Competition" class="events__image">
                <div class="content__container content3">
                    <h1 class="events__name">Barista Competition<hr class="divider d1" size="2" color="black"></h1>
                    <p class="events__description">Experience the thrill of coffee mastery at our Barista Competitions! Witness the artistry and precision of talented local baristas as they showcase their skills in a high-stakes showdown. From mesmerizing latte art to flawless espresso extractions, each competitor will push the boundaries of coffee craftsmanship to impress our esteemed panel of judges.<br><br>Join us for an exhilarating event filled with excitement, passion, and the aromatic allure of freshly brewed coffee. Whether you're a seasoned coffee aficionado or just curious to witness the magic behind the counter, our Barista Competitions promise an unforgettable experience for all.<br><br>Be part of the action, cheer on your favorite baristas, and marvel at the creativity and expertise that goes into every cup. Who will emerge victorious and claim the title of coffee champion? Join us and find out!</p>
                </div>
            </div>

            <!--=============== COFFEE TASTING WORKSHOP ===============-->
            <div class="events3">
                <img src="./assets/img/events__coffeetasting.jpg" alt="Coffee Tasting Workshop" class="events__image">
                <div class="content__container content4">
                    <h1 class="events__name">Coffee Tasting Workshop<hr class="divider d2" size="2" color="black"></h1>
                    <p class="events__description">At the coffee tasting workshop, participants embark on a sensory adventure, exploring the intricate flavors, aromas, and brewing methods of various coffee beans sourced from around the world. Led by knowledgeable baristas or coffee experts, attendees learn to discern the nuances between different coffee profiles, from fruity Ethiopian blends to bold Colombian roasts. <br><br>Through interactive sessions, participants deepen their understanding of coffee cultivation, processing, and preparation, gaining insights into the journey from bean to cup. Whether it's mastering the art of espresso extraction or perfecting the pour-over technique, attendees leave the workshop with newfound appreciation and skills to elevate their coffee enjoyment. <br><br>This immersive experience fosters a sense of community among coffee enthusiasts, who come together to share their passion and exchange tips for brewing the perfect cup.</p>
                </div>
            </div>

            <!--=============== LATTE ART COMPETITION ===============-->
            <div class="events4">
                <img src="./assets/img/events__lattecompetition.jpg" alt="Latte Art Competition" class="events__image">
                <div class="content__container content5">
                    <h1 class="events__name">Latte Art Competition<hr class="divider d1" size="2" color="black"></h1>
                    <p class="events__description">The book club meeting offers a sanctuary for bibliophiles to gather and delve into the rich tapestry of literature, engaging in vibrant discussions about characters, themes, and narrative structures. Each meeting revolves around a selected book, ranging from contemporary bestsellers to timeless classics, sparking intellectual curiosity and igniting debates among members. <br><br>Guided by a facilitator or moderator, participants share their interpretations and insights, exploring the depths of storytelling and uncovering layers of meaning within the text. Beyond literary analysis, the book club fosters camaraderie and connections, providing a space for like-minded individuals to bond over their shared love for reading and storytelling. <br><br>Whether it's uncovering hidden symbolism or dissecting plot twists, each meeting offers a journey of discovery and enrichment for all involved</p>
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