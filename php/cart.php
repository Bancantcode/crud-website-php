<img id="toggle-cart" src="assets/img/shopping-cart.png" alt="Show Cart" class="s-cart">

<section class="cart-section" id="cart-section">
    <h2 id="shopping__cart__title">Shopping Cart</h2>

    <div class="cart-items">
        <?php
        // This checks if user is logged in and cart session is available and is not empty.
        if (isset($_SESSION['user_id']) && isset($_SESSION['cart'][$_SESSION['user_id']])) {
            $cart_items = $_SESSION['cart'][$_SESSION['user_id']]; //This gets the specific cart of the user
            if (!empty($cart_items)) {
                // Display cart items
                foreach ($cart_items as $product_id => $quantity) {
                    // Retrieve product details from the database
                    $query = "SELECT * FROM products WHERE id = '$product_id'";
                    $result = mysqli_query($con, $query);
                    if ($result && mysqli_num_rows($result) > 0) {

                        $row = mysqli_fetch_assoc($result);
                        $productName = $row['name'];
                        $productPrice = $row['price'];
                        $productImage = $row['image']; 
                        $total_price_item = $row['price'] * $quantity;

                        // Display cart item with quantity adjustment buttons
                        echo "<div class='cart-item' id='cart_item_{$product_id}'>
                                <div class='item-details'>
                                    <img src='{$productImage}' alt='{$productName}' class='product-image'>
                                    <p class='product-name'>{$productName}</p>
                                    <p class='price'>Price: ₱{$productPrice}</p>
                                    <p class='total-price'>Total Price: ₱{$total_price_item}</p>
                                </div>
                                <div class='quantity-control'>
                                    <form method='post' id='cart_form_{$product_id}'>
                                        <input type='hidden' name='product_id' value='{$product_id}'>
                                        <input type='hidden' name='quantity' value='{$quantity}'>
                                        <p class='quantity'>Quantity: {$quantity}</p>
                                        <button type='submit' name='remove_from_cart' class='remove-btn'>Remove</button>
                                        
                                    </form>
                                </div>
                            </div>";
                    }
                }
            } else {
                echo "<p>No items in the cart</p>"; //If there is a cart session but has no items, then it sets displays no items.
            }
        } else {
            echo "<p>Please log in to view your cart</p>"; //If there is no user session, then it should ask for the user to log-in to view the cart.
        }
        ?>
    </div>

    <div class="cart-summary-container">
        <div class="cart-summary">
            <?php

            if (isset($_SESSION['user_id']) && isset($_SESSION['cart'][$_SESSION['user_id']])) {

                // Here wem calculate and display the total price and total items
                $total_price = calculateTotalPrice($_SESSION['cart'][$_SESSION['user_id']], $con);
                $total_items = array_sum($_SESSION['cart'][$_SESSION['user_id']]);
                echo "<p class='total-price-cart'>Total Price: ₱{$total_price}</p>";
                echo "<p>Total Items: {$total_items}</p>";
            }
            ?>
        </div>
        <?php
        // Check if the user is logged in and if cart items are set in the session
        if (isset($_SESSION['user_id']) && isset($_SESSION['cart'][$_SESSION['user_id']])) {
            // Calculate and display total price and total items
            $total_price = calculateTotalPrice($_SESSION['cart'][$_SESSION['user_id']], $con);
            $total_items = array_sum($_SESSION['cart'][$_SESSION['user_id']]);
            
            // Check if the total price is greater than 0 and cart is not empty
            if ($total_price > 0 && !empty($cart_items)) {
                ?>
                <div class="checkout-form">
                    <form method="post" action="submit.php">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" required>
                        <label for="mop">Mode of Payment:</label>
                        <input type="text" id="mop" name="mop" required></input>
                        <button type="submit" name="submit_order" id="submit">Submit Order</button>
                    </form>
                </div>
                <?php
            } else {
                echo "<p>Cart is empty.</p>";
            }
        }
        ?>
    </div>
    
</section>