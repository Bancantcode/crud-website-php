<?php

// Function to check if the user is logged in
function check_login() {
    session_start();
    if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
        header("Location: login.php"); //If user is not logged in, redirect him to login.php
        exit(); 
    }
}

//This function checks if the user type logged in is an admin.
function check_admin(){
    if ($_SESSION["user_type"] !== "admin") {
        header("Location: login.php"); //If not an admin, redirect back to login page
        exit(); 
    }
}

function getProducts($connection) {
    $products = array();

    $sql = "SELECT name, price, image FROM products"; //query
    $result = mysqli_query($connection, $sql); //insert the query into the database

    if ($result && mysqli_num_rows($result) > 0) { //This gets the product from the database
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
    }
    
    mysqli_free_result($result);
    mysqli_close($connection);

    return $products;
}


//This code is to create an error-proof in the cart as there have been problem in the quantity
if(isset($_SESSION["user_id"])) {
    if(!isset($_SESSION['cart'][$_SESSION['user_id']]) || empty($_SESSION['cart'][$_SESSION['user_id']])) {
        $_SESSION['cart'][$_SESSION['user_id']] = array(
            'product_id_1' => 0, //This is just a debugging operation for the cart.
        );
    }
}

// Function to get products based on category.
function getCategoryProducts($con, $category) {
    $query = "SELECT * FROM products WHERE category = '$category'";
    $result = mysqli_query($con, $query);
    $products = [];
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
    }
    return $products;
}

//This section displays on the html our products based on category retrieved from the databse.
function displayProductsByCategory($con, $category)
{
    $products = getCategoryProducts($con, $category);
    if ($products) {
        foreach ($products as $product) {
            $productName = $product['name'];
            $productPrice = $product['price'];
            $productImage = $product['image'];
?>
            <div class="product__container">
                <img src="<?php echo $productImage; ?>" alt="<?php echo $productName; ?>" class="product__image">
                <div class="product__flex">
                    <p class="product__name"><?php echo $productName; ?></p>
                    <?php if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) { ?> <!-- Checks if user is logged in. If he is, he can add to cart--> 
                        <form method="post">
                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                            <button type="submit" name="add_to_cart" class="order__button">
                                <h2 class="cart">Add to Cart</h2>
                            </button>
                        </form>
                    <?php } else { ?>
                        <!-- If not, redirect him to login page. -->
                        <a href="login.php" class="order__button">
                            <h2 class="cart">Add to Cart</h2>
                        </a>
                    <?php } ?>
                </div>
                <div class="product__price"><br><br>₱<?php echo $productPrice; ?>.00</div>
            </div>
<?php
        }
    } else {
        echo "<p>No products found in the '$category' category.</p>";
    }
}


// Check if add to cart form is submitted

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    if (isset($_POST['add_to_cart']) || isset($_POST['remove_from_cart'])) {
        $product_id = $_POST['product_id'];
        $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

        if ($quantity < 1) {
            $quantity = 1; // Ensure quantity is at least 1
        }

        if (isset($_POST['add_to_cart'])) {
            // Add to cart
            if(isset($_SESSION['cart'][$user_id][$product_id])) {
                $_SESSION['cart'][$user_id][$product_id] += $quantity;
            } else {
                $_SESSION['cart'][$user_id][$product_id] = $quantity;
            }
        } elseif (isset($_POST['remove_from_cart'])) {
            // Remove from cart
            unset($_SESSION['cart'][$user_id][$product_id]);
        }

        header("Location: {$_SERVER['REQUEST_URI']}");
        exit(); // Stop execution to prevent further processing
    }
}

//Get the total price of the items in the cart.
function calculateTotalPrice($cart_items, $con) {
    $total_price = 0;
    foreach ($cart_items as $product_id => $quantity) {
        // Get product price from database
        $query = "SELECT price FROM products WHERE id = '$product_id'";
        $result = mysqli_query($con, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Add product price multiplied by quantity to total price
            $total_price += $row['price'] * $quantity;
        }
    }
    return $total_price;
}

?>