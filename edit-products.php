<?php 

include("php/connection.php");
include("php/functions.php");

check_login();
check_admin();

$error_message = "";


// Function to add a product
function addProduct($con, $product_id, $name, $category, $stocks, $price, $image) {
    $query = "INSERT INTO products (id, name, category, stocks, price, image) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "isssds", $product_id, $name, $category, $stocks, $price, $image);
    return mysqli_stmt_execute($stmt);
}

// Function to update a product
function updateProduct($con, $id, $name, $stock, $price, $image = null) {
        // Escape user inputs for security
        $id = mysqli_real_escape_string($con, $id);
        $name = mysqli_real_escape_string($con, $name);
        $stock = mysqli_real_escape_string($con, $stock);
        $price = mysqli_real_escape_string($con, $price);
    
        // This condition checks if the image is provided
        if ($image) {
            $image = mysqli_real_escape_string($con, $image);
            $query = "UPDATE products SET name = '$name', stocks = '$stock', price = '$price', image = '$image' WHERE id = '$id'";
        } else {
            $query = "UPDATE products SET name = '$name', stocks = '$stock', price = '$price' WHERE id = '$id'";
        }
    
        //returns the query
        return mysqli_query($con, $query);
    }

// Function to remove a product
function removeProduct($con, $id) {
    $query = "DELETE FROM products WHERE id = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    return mysqli_stmt_execute($stmt);
}

function generateUniqueProductID($con) {
    $unique = false;
    $product_id = '';

    
    do {
        
        $product_id = mt_rand(10000, 99999); // This generate a random product ID

        // Check if the generated product ID already exists in the database
        $check_product_id_query = "SELECT id FROM products WHERE id = '$product_id'";
        $check_product_id_result = mysqli_query($con, $check_product_id_query);

        //Checks on the database wether the product already exist or not
        //if there is no match, then its unique and should be returned.
        if (mysqli_num_rows($check_product_id_result) == 0) {
            $unique = true;
        }
    } while (!$unique); // This loops until a unique product ID is generated

    return $product_id;
}


// Form submission handling
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['add_product'])) {

        //Gets data from the form of adding product

        $name = $_POST['name'];
        $category = $_POST['category'];
        $stocks = $_POST['stocks'];
        $price = $_POST['price'];
        $image = $_FILES['image']['name'];
        $target_dir = "assets/img/";
    
        // Create the directory if it doesn't exist
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0755, true);
        }
    
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Generate unique product id
            $product_id = generateUniqueProductID($con);
    
            // If add product function was executed, then return success
            if (addProduct($con, $product_id, $name, $category, $stocks, $price, $target_file)) {
                header("Location: " . $_SERVER['PHP_SELF'] . "?add=success&message=Product added successfully");
                exit();
            } else {
                header("Location: " . $_SERVER['PHP_SELF'] . "?add=failed&message=Product was not added successfully");
                exit();
            }
        } else {
            header("Location: " . $_SERVER['PHP_SELF'] . "?add=failed&message=Product was not added successfully");
            exit();
        }
    } elseif (isset($_POST['update_product'])) {

        //Gets data from the form of update product

        $id = $_POST['id'];
        $name = $_POST['name'];
        $stock = $_POST['stocks'];
        $price = $_POST['price'];
    
        // Check if the product exists by checking its id from the products table
        $check_query = "SELECT * FROM products WHERE id = '$id'";
        $check_result = mysqli_query($con, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            $image = $_FILES['image']['name'];
            $target_dir = "assets/img/";

            // Check if an image is uploaded
            if (!empty($image)) {
                $target_file = $target_dir . basename($_FILES["image"]["name"]);

                // Move uploaded file to the target directory
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    if (updateProduct($con, $id, $name, $stock, $price, $target_file)) {
                        header("Location: " . $_SERVER['PHP_SELF'] . "?updated=success&message=Product updated successfully");
                        exit();
                    } else {
                        header("Location: " . $_SERVER['PHP_SELF'] . "?update=failed&message=Product was not updated successfully");
                        exit();
                    }
                } else {
                    header("Location: " . $_SERVER['PHP_SELF'] . "?update=failed&message=Error uploading image");
                    exit();
                }
            } else {
                // Update product without changing the image
                if (updateProduct($con, $id, $name, $stock, $price)) {
                    header("Location: " . $_SERVER['PHP_SELF'] . "?updated=success&message=Product updated successfully");
                    exit();
                } else {
                    header("Location: " . $_SERVER['PHP_SELF'] . "?update=failed&message=Product was not updated successfully");
                    exit();
                }
            }
        } else {
            header("Location: " . $_SERVER['PHP_SELF'] . "?update=failed&message=Product was not updated successfully");
            exit();
        }
        
    } elseif (isset($_POST['remove_product'])) {

        // Lastly is to remove product

        $product_id = $_POST['id']; // Get the product id from the forms
        if (!empty($product_id)) {
            $check_query = "SELECT * FROM products WHERE id = '$product_id'";
            $check_result = mysqli_query($con, $check_query);

            //If there is match, then execute the remove product function.

            if (mysqli_num_rows($check_result) > 0) {
                if (removeProduct($con, $product_id)) {
                    header("Location: " . $_SERVER['PHP_SELF'] . "?remove=success&message=Product removed successfully");
                    exit();
                } else {
                    header("Location: " . $_SERVER['PHP_SELF'] . "?remove=failed&message=Product was not removed successfully");
                    exit();
                }
            } else {
                header("Location: " . $_SERVER['PHP_SELF'] . "?remove=failed&message=Please enter a valid product ID");
                exit();
            }
        } else {
            header("Location: " . $_SERVER['PHP_SELF'] . "?remove=failed&message=Please enter a valid product ID");
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
        <h1>Managing Products</h1>
        <div class="container">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Product <span>Name</span></th>
                    <th>Category</th>
                    <th>Stocks</th>
                    <th>Price</th>
                    <th>Image</th>

                </tr>
                <?php 
                    $sql = "SELECT * FROM products;";
                    $result = mysqli_query($con, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if($resultCheck > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["category"] . "</td>";
                            echo "<td>" . $row["stocks"] . "</td>";
                            echo "<td>" . $row["price"] . "</td>";
                            echo "<td><img class='product-image' src='" . $row["image"] . "'></td>";         
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>0 results</td></tr>";
                    }

                    $con -> close();
                ?>
            </table>
        </div>
        

        <div class="buttons">
            <button id="add_product_btn">Add Product</button>
            <button id="update_product_btn">Update Product</button>
            <button id="remove_product_btn">Remove Product</button>
        </div>

        

        <div class="product_box">
            <form method="post" enctype="multipart/form-data"> <!-- added enctype attribute -->
                <legend>Add Product</legend>
                <div class="add_container">
                    <div>
                        <label for="name">Product Name</label><br>
                        <input type="text" name="name" required placeholder="product"><br>
                    </div>
                    <div>
                        <label for="category">Category</label><br>
                        <input type="text" name="category" required placeholder="category"><br>
                    </div>
                    <div>
                        <label for="stocks">Stocks</label><br>
                        <input type="number" name="stocks" min="1" required placeholder="stocks"><br>
                    </div>

                    <div>
                        <label for="price">Price</label><br>
                        <input type="number" name="price" min="1" required placeholder="price"><br>
                    </div>
                    <div>
                        <label for="image">Image</label><br>
                        <input type="file" name="image" accept=".jpg, .jpeg, .png" required class="no-border"><br> 
                    </div>
                    <div>
                        <label for="add">Add product</label><br>
                        <input id="add_product_button" type="submit" name="add_product" value="Send" class="send"><br><br>
                    </div>
                </div>

                
            </form>
        </div>

        <div class="product_box">
            <form method="post" enctype="multipart/form-data">
                <legend>Update Product</legend>
                <div class="add_container">
                    <div>
                        <label for="id">ID</label><br>
                        <input type="number" id="id" name="id" required min="1" placeholder="ID" required><br>
                    </div>
                    <div>
                        <label for="name">Product Name</label><br>
                        <input type="text" id="name" name="name" placeholder="name" required><br>
                    </div>
                    <div>
                        <label for="stocks">Stocks</label><br>
                        <input type="number" id="stocks" name="stocks" min="1" placeholder="stocks" required><br>
                    </div>
                    <div>
                        <label for="price">Price</label><br>
                        <input type="number" id="price" name="price" min="1" placeholder="price" required><br>
                    </div>
                    <div>
                        <label for="image">Image</label><br>
                        <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png" class="no-border" required><br>
                    </div>
                    <div>
                        <label for="update">Update Product</label><br>
                        <input type="submit" name="update_product" value="Send" class="send"><br><br>
                    </div>
                </div>
            </form>
        </div>

        <div class="product_box">
            <form method="post" enctype="multipart/form-data">
                <legend>Remove Product</legend>
                <div class="add_container">
                    <div>
                        <label for="id">ID:</label><br>
                        <input type="number" id="id" name="id" required min="1" placeholder="ID"><br>
                    </div>
                    <div>
                        <label for="update">Remove Product</label><br>
                        <input type="submit" name="remove_product" value="Send" class="send"><br><br>
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
        document.getElementById("add_product_btn").addEventListener("click", function() {
            toggleBoxVisibility("add_product_box");
        });

        document.getElementById("update_product_btn").addEventListener("click", function() {
            toggleBoxVisibility("update_product_box");
        });

        document.getElementById("remove_product_btn").addEventListener("click", function() {
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