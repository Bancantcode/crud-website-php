<?php

include("php/connection.php");
include("php/functions.php");

check_login();
check_admin();

// Function to approve an order
function approveOrder($con, $order_id) {
    $query = "UPDATE orders SET status = 'Approved' WHERE order_id = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "i", $order_id);
    return mysqli_stmt_execute($stmt);
}

// Function to update order status
function updateOrderStatus($con, $order_id, $status) {
    $query = "UPDATE orders SET status = ? WHERE order_id = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "si", $status, $order_id);
    return mysqli_stmt_execute($stmt);
}

// Function to remove an order
function removeOrder($con, $order_id) {
    $query = "DELETE FROM orders WHERE order_id = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "i", $order_id);
    return mysqli_stmt_execute($stmt);
}

// Form submission handling
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['approve_order'])) {

        //Gets data from the form if post value is to approve user
        $order_id = $_POST['order_id']; //Get the order id from the user forms
        
        if (!empty($order_id)) {
            if (approveOrder($con, $order_id)) {
                header("Location: " . $_SERVER['PHP_SELF'] . "?approve=success&message=Order approved successfully");
                exit();
            } else {
                header("Location: " . $_SERVER['PHP_SELF'] . "?approve=failed&message=Failed to approve order");
                exit();
            }
        } else {
            header("Location: " . $_SERVER['PHP_SELF'] . "?approve=failed&message=Please provide an order ID");
            exit();
        }
    } elseif (isset($_POST['update_order_status'])) {

        //Gets data from the form if post value is to update order status

        $order_id = $_POST['order_id_update']; //Get the order id from the user forms
        $status = $_POST['status']; //Gets the status from the user forms

        if (!empty($order_id) && !empty($status)) {
            if (updateOrderStatus($con, $order_id, $status)) {
                header("Location: " . $_SERVER['PHP_SELF'] . "?update_status=success&message=Order status updated successfully");
                exit();
            } else {
                header("Location: " . $_SERVER['PHP_SELF'] . "?update_status=failed&message=Failed to update order status");
                exit();
            }
        } else {
            header("Location: " . $_SERVER['PHP_SELF'] . "?update_status=failed&message=Please provide both order ID and status");
            exit();
        }
    } elseif (isset($_POST['remove_order'])) {
        
        //Gets data from the form if post value is to remove order

        $order_id = $_POST['order_id_remove']; //Gets order id from the user forms

        if (!empty($order_id)) {
            if (removeOrder($con, $order_id)) {
                header("Location: " . $_SERVER['PHP_SELF'] . "?remove=success&message=Order removed successfully");
                exit();
            } else {
                header("Location: " . $_SERVER['PHP_SELF'] . "?remove=failed&message=Failed to remove order");
                exit();
            }
        } else {
            header("Location: " . $_SERVER['PHP_SELF'] . "?remove=failed&message=Please provide an order ID");
            exit();
        }
    }
}

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
    <link rel="stylesheet" href="assets/css-backend/crud.css">
    <title>Edit Products - Satori</title>

</head>
<body>

    <!----=============== NAVIGATION ===============--> 
    <?php include("php/header.php")?>

    <main>
        <h1>Managing Orders</h1>
        <div class="container">
            <table>
                <tr>
                    <th>Order ID</th>
                    <th>Product ID</th>
                    <th>User ID</th>
                    <th><span>Quantity</span></th>
                    <th>Total</th>
                    <th><span>Address</span></th>
                    <th><span>Method of Payment</span></th>
                    <th>Status</th>
                </tr>
                <?php 
                    $sql = "SELECT * FROM orders;";
                    $result = mysqli_query($con, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if($resultCheck > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["order_id"] . "</td>";
                            echo "<td>" . $row["product_id"] . "</td>";
                            echo "<td>" . $row["user_id"] . "</td>";
                            echo "<td><span>" . $row["quantity"] . "</span></td>";
                            echo "<td>" . $row["total"] . "</td>";
                            echo "<td><span>" . $row["address"] . "</span></td>";
                            echo "<td><span>" . $row["mop"] . "</span></td>";
                            echo "<td>" . $row["status"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>0 results</td></tr>";
                    }

                    $con -> close();
                ?>
            </table>
        </div>

        <div class="buttons">
            <button id="approve_order_btn">Approve Order</button>
            <button id="update_order_btn">Update Order Status</button>
            <button id="remove_order_btn">Remove Order</button>
        </div>

        <div class="product_box">
            <form method="post">
                <legend>Approve Order</legend>
                <div class="add_container">
                    <div>
                        <label for="order_id">Order ID</label><br>
                        <input type="number" id="order_id" name="order_id" required min="1" placeholder="Order ID"><br>
                    </div>
                    <div>
                        <label for="approve_order">Approve Order</label><br>
                        <input type="submit" name="approve_order" value="Approve" class="send"><br><br>
                    </div>
                </div>
            </form>
        </div>

        <div class="product_box">
            <form method="post">
                <legend>Update Order Status</legend>
                <div class="add_container">
                    <div>
                        <label for="order_id_update">Order ID</label><br>
                        <input type="number" id="order_id_update" name="order_id_update" required min="1" placeholder="Order ID"><br>
                    </div>
                    <div>
                        <label for="status">Status</label><br>
                        <input type="text" id="status" name="status" required placeholder="Status"><br>
                    </div>
                    <div>
                        <label for="update_order_status">Update Order Status</label><br>
                        <input type="submit" name="update_order_status" value="Update" class="send"><br><br>
                    </div>
                </div>
            </form>
        </div>

        <div class="product_box">
            <form method="post">
                <legend>Remove Order</legend>
                <div class="add_container">
                    <div>
                        <label for="order_id_remove">Order ID</label><br>
                        <input type="number" id="order_id_remove" name="order_id_remove" required min="1" placeholder="ID"><br>
                    </div>
                    <div>
                        <label for="remove_order">Remove Order</label><br>
                        <input type="submit" name="remove_order" value="Remove" class="send"><br><br>
                    </div>
                </div>
            </form>
        </div>

    </main>

    <script src="./assets/js/script.js"></script>
    <script>

function toggleBoxVisibility(boxClass) {
    var boxes = document.querySelectorAll('.' + boxClass);
    
    // Hide all boxes except the one with the given class
    boxes.forEach(function(box) {
        if (!box.classList.contains('hidden')) {
            box.classList.add('hidden');
        }
    });

    // Toggle the display of the target box
    boxes.forEach(function(box) {
        if (box.classList.contains('hidden')) {
            box.classList.remove('hidden');
        } else {
            box.classList.add('hidden');
        }
    });
}

// Function to initialize box visibility
function initializeBoxVisibility() {
    var boxes = document.querySelectorAll('.product_box');
    boxes.forEach(function(box) {
        box.classList.add('hidden');
    });
}

// Initialize box visibility when the page loads
window.onload = function() {
    initializeBoxVisibility();
};

// Add event listeners to buttons
document.getElementById("approve_order_btn").addEventListener("click", function() {
    toggleBoxVisibility("add_product_box");
});

document.getElementById("update_order_btn").addEventListener("click", function() {
    toggleBoxVisibility("update_product_box");
});

document.getElementById("remove_order_btn").addEventListener("click", function() {
    toggleBoxVisibility("remove_product_box");
});

document.addEventListener("DOMContentLoaded", function() {
    var buttons = document.querySelectorAll(".buttons button");
    var boxes = document.querySelectorAll(".product_box");

    buttons.forEach(function(button, index) {
        button.addEventListener("click", function() {
            var box = boxes[index];
            
            // If the box is already visible, hide it
            if (box.style.display === "block") {
                box.style.display = "none";
            } else {
                // Hide all product boxes
                boxes.forEach(function(box) {
                    box.style.display = "none";
                });

                // Show the product box corresponding to the clicked button
                box.style.display = "block";
            }
        });
    });
});

</script>
    
</body>
</html>