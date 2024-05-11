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
    <link rel="stylesheet" href="assets/css/indexxx.css">
    <link rel="stylesheet" href="assets/css/cart.css">
    <title>Home - Satori</title>
</head>
<body>
    <!----=============== NAVIGATION ===============--> 
    <?= include("php/header.php")?>
    <?php if ($_SESSION["user_type"] !== "admin"){
        include("php/cart.php");
    }?>

    <!--=============== HOME PAGE ===============-->
    <main class="main" id="main">
        <!--=============== HERO ===============-->
        <section class="hero">
            <div class="hero__container">
                <div class="hero__content">
                    <h2 class="hero__header">Experience the Finest Coffee Beans and Gear delivered to your Door</h2>
                    <p class="hero__description">Explore our curated selection of the finest coffee beans and top-tier equipment, all conveniently delivered to your doorstep.</p>
                    <button class="hero__button">
                        <h2 class="button"><a href="coffeemenu.php">Buy Coffee</a></h2>
                    </button>
                </div>
            </div>
        </section>

        <!--=============== ABOUT ===============-->
        <section class="about">
            <div class="about__container">  
                <div class="about__info">
                    <h1 class="about__title">More Information<br> About Satori</h1>
                    <p class="about__description">Embark on a journey to discover the most exquisite and delightful coffee experiences. Let us guide you to your perfect cup, ensuring every sip is a moment of pure bliss.</p>
                    <button class="hero__button">
                        <h2 class="about__button"><a href="about.php">Learn More</a></h2>
                    </button>
                </div>
                <div class="abt__imgcontainer">
                    <img class="about__image1" src="./assets/img/main_moreInformation1.png" alt="MoreInformation Image" >
                    <img class="about__image" src="./assets/img/main_moreInformation2.png" alt="MoreInformation Image" >
                </div>
            </div>
        </section>
            
        <!--=============== MENU ===============-->
        <section class="menu">
            <div class="menu__container">
                <div class="coffee__container">
                    <div class="coffee__img">
                        <img src="./assets/img/coffeemenu.jpg" alt="Conical Brewer Image" class="menu__image">
                    </div>
                    <div class="coffee__content">
                        <p class="menu__content">FILTER, ESPRESSO AND MILK BASED</p>
                        <h2 class="menu__title">Quality Coffee</h2>
                        <button class="menu__button">
                            <h2 class="menu__link"><a href="coffeemenu.php">View Menu</a></h2>
                        </button>
                    </div>
                </div>

                <div class="beans__container">
                    <div class="beans__img">
                        <img src="./assets/img/coffeebeans.jpg" alt="Exclusive Coffee Beans" class="menu__image">
                    </div>
                    <div class="beans__content">
                        <p class="menu__content">COMPETITION SERIES</p>
                        <h2 class="menu__title">Exclusive Coffee Beans</h2>
                        <button class="menu__button">
                            <h2 class="menu__link"><a href="coffeebeans.php">Shop Now</a></h2>
                        </button>
                    </div>
                </div>

                <div class="tools__container">
                    <div class="tools__img">
                        <img src="./assets/img/coffeetool.jpg" alt="Hario V60 Metal Dripper Image" class="menu__image">
                    </div>
                    <div class="tools__content">
                        <p class="menu__content">SATORI</p>
                        <h2 class="menu__title">Coffee Tools</h2>
                        <button class="menu__button">
                            <h2 class="menu__link"><a href="equipments.php">Shop Now</a></h2>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!--=============== STORIES ===============-->
        <section class="stories">
            <div class="stories__container">
                <h1 class="stories__title">Discover the Stories of Satori Specialty Coffee</h1>
                <div class="stories__grid">
                    <img class="stories__image grid1" src="./assets/img/description_tokyodrip.jpg" alt="Tokyo Drip Story">
                    <img class="stories__image grid2" src="./assets/img/discover_Brazil_Beans.jpg" alt="Brazil Beans">
                    <img class="stories__image grid3" src="./assets/img/sustainability_coffee-grower.jpg" alt="Coffee Grower">
                    <img class="stories__image grid4" src="./assets/img/Team2.png" alt="Meet the Team">
                </div>
            </div>
            <div class="stories__button">
                <h2 class="more__story"><a href="stories.php">More Stories</a></h2>
            </div>
        </section>

        <!--=============== TESTIMONIAL ===============-->
        <section class="testimonial__container" id="testimonials">
            <h1 class="testimonial__title">★★★★★</h1>
            <p class="testimonial__description">Satori Specialty Coffee has truly changed my coffee-drinking experience. Their beans are of the highest quality and their brewing methods result in a rich and flavorful cup every time. I can't imagine starting my day without a cup of Satori coffee.</p>
            <div class="testimonial__flex">
                <img class="catpic" src="./assets/img/Profile.jpg" alt="Bryan Santiago Profile">
                <div class="testimonal__content">
                    <div class="testimonial__text"><a href="https://www.facebook.com/bryyansantiago/" target="_blank">Bryan Aaron</a></div>
                    <p class="testimonial__type">Coffee Connoisseur</p>
                </div>
            </div>
        </section>

        <!--=============== IMAGES ===============-->
        <section class="images">
            <div class="images__container">
                <img src="./assets/img/home_image1.png" alt="Home Image 1" class="image1">
                <img src="./assets/img/home_image2.png" alt="Home Image 2" class="image2">
                <img src="./assets/img/home_image3.png" alt="Home Image 3" class="image3">
                <img src="./assets/img/home_image4.png" alt="Home Image 4" class="image4">
                <img src="./assets/img/home_image5.png" alt="Home Image 5" class="image5">
                <img src="./assets/img/home_image6.png" alt="Home Image 6" class="image6">
                <img src="./assets/img/home_image7.png" alt="Home Image 7" class="image7">
                <img src="./assets/img/home_image8.png" alt="Home Image 8" class="image8">
            </div>
        </section>

        <!--=============== FAQ's ===============-->
        <section class="section faqs" id="faqs">
            <div class="faqs__container">
                <div class="faqs__data-center">
                    <div class="faqs__data">
                        <h1 class="faqs__h1">FAQ's</h1>
                        <h2 class="faqs__title">Find your<br><span>answers</span></h2>
                    </div>

                    <div class="faqs__accordion">
                        <span class="faqs__accordion-label">What makes Satori unique?</span>
                        <span class="faqs__accordion-content">At Satori, we pride ourselves on our dedication to uniqueness, extending far beyond the beans we use. These beans undergo a carefully crafted roasting process, expertly executed by our skilled baristas. The result? A flavor profile that stands out, offering a rich and memorable coffee experience found nowhere else. We're committed to enhancing your coffee moments with each visit, delivering a truly exceptional brew every time.</span>
                    </div>
                    
                    <div class="faqs__accordion">
                        <span class="faqs__accordion-label">Where do you source your coffee beans from?</span>
                        <span class="faqs__accordion-content">We take immense pride in the transparency of our sourcing process. Our coffee beans are meticulously selected from <a href="about.php#farm__container" target="_blank">Ethiopia and Brazil</a>, where sustainable farming practices and ethical standards are paramount. We prioritize direct relationships with farmers to ensure fair trade and quality control at every step. By sharing the origin of our beans, we invite you to connect with the story behind each cup, embracing a journey that begins at the source and culminates in the delightful experience you savor with every sip.</span>
                    </div>
                    
                    <div class="faqs__accordion">
                        <span class="faqs__accordion-label">How do you ensure the freshness of your coffee?</span>
                        <span class="faqs__accordion-content">Ensuring the freshness of our coffee is a top priority at Satori. We meticulously roast our coffee beans in small batches to maintain optimal flavor and aroma. Additionally, we package our coffee immediately after roasting, utilizing specialized techniques to preserve its freshness during storage and transportation. From bean to cup, we're committed to delivering an unparalleled coffee experience.</span>
                    </div>

                    <div class="faqs__accordion">
                        <span class="faqs__accordion-label">Do you offer any specialty drinks or unique flavor combinations?</span>
                        <span class="faqs__accordion-content">At Satori, we take pride in crafting a diverse menu that caters to all tastes. In addition to our exceptional <a href="about.php#espresso" target="_blank">espresso</a>, <a href="about.php#filter" target="_blank">filter</a>, and <a href="about.php#milkbase" target="_blank">milk-based</a> coffees, we also offer a selection of specialty drinks featuring unique flavor combinations that are sure to tantalize your taste buds. Whether you're craving a classic espresso or looking to explore something new and exciting, we have the perfect beverage to accompany our delicious pastries. Our <a href="coffeemenu.php" target="_blank">menu</a> is designed to delight and surprise, ensuring that every visit to Satori is a memorable experience.</span>
                    </div>

                    <div class="faqs__accordion">
                        <span class="faqs__accordion-label">What sets your coffee shop ambiance apart?</span>
                        <span class="faqs__accordion-content">We believe ambiance is as important as the coffee itself. Our coffee shop offers a unique and inviting atmosphere that sets us apart. From the moment you step through our doors, you'll be enveloped in a warm and welcoming environment, designed to inspire relaxation and creativity. Our carefully curated decor, comfortable seating options, and soothing background music create the perfect backdrop for enjoying your favorite brew or pastry. Whether you're looking for a quiet space to work or a cozy spot to catch up with friends, our ambiance sets the stage for a truly memorable coffee experience.</span>
                    </div>

                    <div class="faqs__accordion">
                        <span class="faqs__accordion-label">Do you host any coffee tasting events or workshops?</span>
                        <span class="faqs__accordion-content">At Satori, we love sharing our passion for coffee with our community. We regularly host coffee tasting <a href="events.php" target="_blank">events and workshops</a> where you can immerse yourself in the world of specialty coffee. Led by our knowledgeable baristas, these events provide a unique opportunity to learn about different coffee varieties, brewing techniques, and flavor profiles. Whether you're a coffee connoisseur or just starting to explore the world of specialty coffee, our events are designed to educate and inspire. Keep an eye on our events calendar for upcoming tastings and workshops, and join us for an unforgettable coffee experience!</span>
                    </div>
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