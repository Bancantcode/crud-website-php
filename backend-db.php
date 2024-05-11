<?php
 
session_start();
include("php/connection.php");
include("php/functions.php");

check_login();
check_admin();

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
    <link rel="stylesheet" href="assets/css-backend/backend.css">
    <title>Backend Homepage - Satori</title>

</head>
<body>
    <!----=============== NAVIGATION ===============--> 
   
    <?php include("php/header.php") ?>
    
    <main class="back">
        <div class="container">
            <div class="box large">
                <h2>Products</h2>
                <a href="edit-products.php"><button>Edit Products</button></a>
            </div>
            <div class="box">
                <h2>Users</h2>
                <a href="edit-users.php"><button>Edit Users</button></a>
            </div>
            <div class="box large">
                <h2>Orders</h2>
                <a href="edit-orders.php"><button>Edit Orders</button></a>
            </div>
            <div class="box">
                <h2>Admin</h2>
                <a href="edit-admin.php"><button >Edit Admins</button></a>
            </div>
        </div>
    </main>
    
    <script src="./assets/js/script.js"></script>
</body>
</html>