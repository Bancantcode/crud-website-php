<?php

session_start();
include("php/connection.php");
include("php/functions.php");

function generateUniqueOrderID($con) {
    $unique = false;
    $order_id = '';
    
    do {
        $order_id = mt_rand(10000, 99999);  // Thisenerate a random product ID

        // Check if the generated product ID already exists in the database
        $check_order_id_query = "SELECT order_id FROM orders WHERE order_id = '$order_id'";
        $check_order_id_result = mysqli_query($con, $check_order_id_query);

        if (mysqli_num_rows($check_order_id_result) == 0) {
            $unique = true;
        }
    } while (!$unique); // This will loop until a unique product ID is generated

    return $order_id; 
}


if (isset($_POST['submit_order'])) {
    //if the form is submitted then get the user ID from session as well as the
    //address, cart and mop from the forms.

    $user_id = $_SESSION['user_id'];
    $address = $_POST['address'];
    $mop = $_POST['mop'];
    $cart_items = $_SESSION['cart'][$user_id];

    // Initialize total order price
    $total_order_price = 0;

    // Now, we iterate through cart items to calculate total order price and insert into database

    foreach ($cart_items as $product_id => $quantity) {
        // Retrieve product details from the database
        $query = "SELECT * FROM products WHERE id = '$product_id'";
        $result = mysqli_query($con, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $product_name = $row['name'];
            $product_price = $row['price'];
            $total_price_item = $product_price * $quantity;
            $total_order_price += $total_price_item;
            $order_id = generateUniqueOrderID($con);

            $insert_order = "INSERT INTO orders (order_id, product_id, product_name, user_id, quantity, price, total, address, mop) VALUES ('$order_id','$product_id', '$product_name', '$user_id', '$quantity', '$product_price', '$total_price_item', '$address', '$mop')";
            mysqli_query($con, $insert_order);
        }
    }

    // Once the order has been sent, then we should clear the data
    // from the cart by unsetting it.
    unset($_SESSION['cart'][$_SESSION['user_id']]);

    // Lastly, redirect to the menu page and display order success in the url
    header("Location: coffeemenu.php?order_success=true");
    exit();
} else {
    // If the form is not submitted, redirect to the cart page
    header("Location: cart.php");
    exit();
}
?>
