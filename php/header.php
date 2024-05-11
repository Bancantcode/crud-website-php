<header id="header">
    <nav class="nav__container">
            
        <h1 class="sitename"><a href="index.php">Satori</a></h1>
        <div class="nav__menu" id="nav__menu">
            <div class="nav__close" id="nav-close">
                <i class="ri-close-line"></i>
            </div>
            <ul class="nav__list">
                <li class="nav__item"><a href="index.php" class="nav__link">Home</a></li><hr>
                <li class="nav__item"><a href="about.php" class="nav__link">About</a></li><hr>
                <li class="nav__item"><a href="coffeemenu.php" class="nav__link">Coffee Menu</a></li><hr>
                <li class="nav__item"><a href="equipments.php" class="nav__link">Equipments</a></li><hr>
                <li class="nav__item"><a href="coffeebeans.php" class="nav__link">Coffee Beans</a></li><hr>
                <li class="nav__item"><a href="stories.php" class="nav__link">Stories</a></li><hr>
                <li class="nav__item"><a href="contact.php" class="nav__link separate">Contact</a></li><hr>
                <?php
                
                if (isset($_SESSION["logged_in"]) && isset($_SESSION["user_name"])) 
                {
                    // If the user is logged in, display its username
                    echo "<li class='nav__item'><a href='' class='nav__link separate'>Hello, ".$_SESSION["user_name"]."!</a></li>";

                    //If the user type is an admin, display the manage button
                    if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin")
                    {
                        echo "<li class='nav__item'><a href='backend-db.php' class='nav__link separate'>Manage</a></li>";
                    }
                    echo '<form action="php/logout.php" method="post"><button type="submit" class="logout">Logout</button></form>';
                }               
                else 
                {
                    echo "<li class='nav__item'><a href='login.php' class='nav__link separate'>Account</a></li>";
                }
                                    
                ?>
            </ul>
        </div>
        
        <div class="nav__toggle" id="nav-toggle">
            <i class="ri-menu-line"></i>
        </div>
    </nav>
</header>