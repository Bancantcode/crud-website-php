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
    <link rel="stylesheet" href="assets/css/funfacts.css">
    <link rel="stylesheet" href="assets/css/cart.css">

    <title>Fun Facts - Satori</title>
</head>
<body>
    <!----=============== NAVIGATION ===============--> 
    <?= include("php/header.php")?>
    <?php if ($_SESSION["user_type"] !== "admin"){
        include("php/cart.php");
    }?>

    <!--=============== FUN FACTS ===============-->
    <main class="main" id="main">
        <div class="facts__container">
            <h1 class="facts__title">Menu Fun Facts<br>|</h1>
             <!--=============== ESPRESSO ===============-->
            <div class="facts">
                <img src="./assets/img/Espresso.jpg" alt="Espresso" class="facts__image">
                <div class="content__container content1">
                    <h1 class="facts__name">Espresso<br><hr class="divider d1" size="2" color="black"></h1>
                    <p class="facts__description">Did you know that the term "espresso" comes from the Italian word meaning "pressed out"? This fascinating brewing method has a rich history dating back to the late 19th century, when Angelo Moriondo patented the first steam-driven "instantaneous" coffee machine in Turin, Italy. <br><br>However, it wasn't until the early 20th century that Luigi Bezzera invented a more refined version of the espresso machine, which utilized both pressure and steam to create a concentrated shot of coffee in a matter of seconds. Today, espresso is not just a drink; it's a cultural icon, enjoyed by millions around the world for its intense flavor and versatility in creating a wide range of coffee beverages.</p>
                </div>
            </div>
            <!--=============== POUR OVER ===============-->
            <div class="facts1">
                <img src="./assets/img/description_pourover.jpg" alt="Pour-Over Coffee" class="facts__image">
                <div class="content__container content2">
                    <h1 class="facts__name">Pour-Over<hr class="divider d2" size="2" color="black"></h1>
                    <p class="facts__description">The pour-over brewing method has been around for centuries, but it gained widespread popularity in the early 20th century thanks to the invention of the paper coffee filter by German housewife Melitta Bentz in 1908. This simple yet ingenious innovation revolutionized the way coffee was brewed, allowing for a cleaner and more flavorful cup without the need for cloth filters or complicated brewing apparatus. <br><br>Pour-over coffee enthusiasts praise its ability to highlight the unique characteristics of different coffee beans, as well as its hands-on approach that allows for greater control over the brewing process.</p>
                </div>
            </div>
            <!--=============== COLD BREW ===============-->
            <div class="facts2">
                <img src="./assets/img/ColdBrew.jpg" alt="Cold Brew" class="facts__image">
                <div class="content__container content3">
                    <h1 class="facts__name">Cold Brew<hr class="divider d1" size="2" color="black"></h1>
                    <p class="facts__description">Did you know that cold brew coffee typically has a lower acidity level than traditional hot-brewed coffee? This results in a smoother, less bitter flavor profile that's perfect for enjoying on a hot day or as a refreshing pick-me-up anytime. The cold brew craze has taken the coffee world by storm in recent years, with its rise in popularity attributed to its mellow flavor, long shelf life, and versatility in creating a variety of coffee-based beverages. <br><br>Unlike hot brewing methods that use heat to extract flavor from the coffee grounds, cold brew relies on time, steeping coarse coffee grounds in cold water for an extended period (usually 12-24 hours) to achieve a rich and complex flavor profile.</p>
                </div>
            </div>
            <!--=============== CORTADO ===============-->
            <div class="facts3">
                <img src="./assets/img/Cortado.jpg" alt="Cortado" class="facts__image">
                <div class="content__container content4">
                    <h1 class="facts__name">Cortado<hr class="divider d2" size="2" color="black"></h1>
                    <p class="facts__description">The cortado originated in Spain and means "cut" in Spanish. The name comes from the way the espresso is "cut" with a small amount of warm milk, creating a balanced and creamy coffee drink. This simple yet delicious beverage has its roots in Spanish coffee culture, where it's enjoyed as a mid-morning pick-me-up or an afternoon indulgence. <br><br>The cortado's perfect balance of espresso and milk has made it a favorite among coffee aficionados seeking a drink that's not too strong or too milky, but just right.</p>
                </div>
            </div>
            <!--=============== TOKYO DRIP ===============-->
            <div class="facts4">
                <img src="./assets/img/TokyoDrip.jpg" alt="Tokyo Drip" class="facts__image">
                <div class="content__container content5">
                    <h1 class="facts__name">Tokyo Drip<hr class="divider d1" size="2" color="black"></h1>
                    <p class="facts__description">Did you know that the Tokyo drip, also known as Kyoto-style coffee, originated in Japan and is a slow-drip brewing method that can take up to 12 hours to complete? This extended brewing time results in a smooth and mellow coffee with rich flavors and low acidity. <br><br>The Tokyo drip is made using a special apparatus consisting of a glass tower with multiple chambers, each containing ground coffee and water. <br><br>As the water slowly drips through the coffee grounds, it extracts the flavors and oils, resulting in a concentrated brew that's perfect for sipping slowly and savoring each nuanced flavor note.</p>
                </div>
            </div>
            <!--=============== TIMEMORE CHESTNUT C3 BLACK ===============-->
            <div class="facts5">
                <img src="./assets/img/TimemoreChestnutC3Black.jpg" alt="Timemore Chestnut C3 Black" class="facts__image">
                <div class="content__container content6">
                    <h1 class="facts__name">Timemore Chestnut C3 Black<hr class="divider d2" size="2" color="black"></h1>
                    <p class="facts__description">The Timemore Chestnut C3 Black is not just any coffee grinder; it's known for its sleek design, precise grinding capabilities, and durable construction, making it a favorite among coffee enthusiasts and professionals alike. <br><br>This high-quality manual grinder features a conical burr design that ensures a consistent grind size for optimal extraction and flavor consistency. Its ergonomic handle and easy-to-adjust settings make it a joy to use, whether you're brewing espresso, pour-over, or French press coffee. <br><br>Plus, its compact size makes it perfect for home use or taking on the go, so you can enjoy freshly ground coffee wherever your adventures take you.</p>
                </div>
            </div>
            <!--=============== BURNT CHEESECAKE ===============-->
            <div class="facts6">
                <img src="./assets/img/BurntCheesecake.jpg" alt="Burnt Cheesecake" class="facts__image">
                <div class="content__container content7">
                    <h1 class="facts__name">Burnt Cheesecake<hr class="divider d1" size="2" color="black"></h1>
                    <p class="facts__description">Did you know that burnt cheesecake originated in Basque Country, Spain? Its unique "burnt" appearance and creamy texture have made it a popular dessert worldwide, perfect for pairing with your favorite coffee beverage. Unlike traditional cheesecake recipes that require baking in a water bath to prevent cracking, burnt cheesecake is intentionally baked at a high temperature to achieve its signature caramelized exterior and velvety smooth interior. <br><br>This unconventional baking method results in a dessert that's rich, decadent, and utterly irresistible, making it the perfect indulgence to accompany your coffee break.</p>
                </div>
            </div>
            <!--=============== BARISTA CHOICE ===============-->
            <div class="facts7">
                <img src="./assets/img/BaristaChoice.jpg" alt="Barista Choice" class="facts__image">
                <div class="content__container content8">
                    <h1 class="facts__name">Barista Choice<hr class="divider d2" size="2" color="black"></h1>
                    <p class="facts__description">Our baristas love to get creative and experiment with unique flavor combinations, so the barista's choice is always a surprise! You never know what delicious concoction they'll come up with next. From seasonal specialties to innovative twists on classic recipes, our baristas are constantly pushing the boundaries of coffee craftsmanship to delight and surprise our customers. <br><br>Whether it's a floral-infused latte, a spicy cinnamon cappuccino, or a decadent chocolate mocha, the barista's choice is sure to tantalize your taste buds and leave you craving more.</p>
                </div>
            </div>
            <!--=============== PARAGON SIDE A & B ===============-->
            <div class="facts8">
                <img src="./assets/img/ParagonSideA&B.jpg" alt="Paragon Side A & B" class="facts__image">
                <div class="content__container content9">
                    <h1 class="facts__name">Paragon Side A & B<hr class="divider d1" size="2" color="black"></h1>
                    <p class="facts__description">Did you know that our Paragon Side A & B are inspired by the diverse flavor profiles found in different coffee-growing regions around the world? Each side offers a unique taste experience that reflects the terroir and craftsmanship of its origin. <br><br>Side A features single-origin coffees known for their bold and complex flavors, sourced from renowned coffee estates and cooperatives in regions such as Ethiopia, Colombia, and Kenya. <br><br>Side B, on the other hand, showcases carefully curated blends that balance sweetness, acidity, and body for a harmonious and well-rounded cup. <br><br>Whether you prefer the bright acidity of an African coffee or the chocolatey notes of a South American blend, our Paragon Side A & B are sure to satisfy even the most discerning coffee connoisseurs.</p>
                </div>
            </div>
            <!--=============== FILLED DISTILLED MILK ===============-->
            <div class="facts9">
                <img src="./assets/img/DistilledMilk.jpg" alt="Filled Distinct Milk" class="facts__image">
                <div class="content__container content10">
                    <h1 class="facts__name">Filled Distilled Milk<hr class="divider d2" size="2" color="black"></h1>
                    <p class="facts__description">Our filled distilled milk is made using a traditional method of condensing and sweetening milk, resulting in a creamy and indulgent addition to your coffee that's perfect for those with a sweet tooth. This process involves simmering fresh milk until it reduces by half, concentrating its natural sugars and flavors to create a thick and luscious syrup. <br><br>The filled distilled milk is then carefully blended with steamed milk to create a velvety smooth texture that's both decadent and delicious. Whether you prefer it in your latte, cappuccino, or as a topping for your favorite dessert, our filled distilled milk adds a touch of luxury to every sip.</p>
                </div>
            </div>
            <!--=============== USUCHA MATCHA ===============-->
            <div class="facts10">
                <img src="./assets/img/UsuchaMatcha.jpg" alt="Usucha Matcha" class="facts__image">
                <div class="content__container content11">
                    <h1 class="facts__name">Usucha Matcha<hr class="divider d1" size="2" color="black"></h1>
                    <p class="facts__description">Did you know that usucha matcha is made from finely ground green tea leaves that are specially grown and harvested to ensure the highest quality and flavor? It's rich in antioxidants and provides a smooth and invigorating energy boost without the jitters often associated with coffee. <br><br>Usucha matcha has been enjoyed for centuries in traditional Japanese tea ceremonies for its vibrant green color, earthy flavor, and calming effects. <br><br>Today, it's popular not only for its health benefits but also for its versatility in creating a variety of delicious drinks and desserts, from matcha lattes and smoothies to matcha-flavored ice cream and pastries. So whether you're looking for a caffeine alternative or simply want to explore the world of matcha, our usucha matcha is sure to delight your senses and nourish your body and soul.</p>
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