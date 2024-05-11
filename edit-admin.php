<?php 
include("php/connection.php");
include("php/functions.php");

check_login();
check_admin();

$error_message = "";

function addAdmin($con, $username, $firstname, $lastname, $email, $password) {
    // Check if username or email already exists
    $query = "SELECT * FROM users WHERE Username = ? OR Email = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        return "Username or Email already exists.";
    }

    $userType = "admin";
    $query = "INSERT INTO users (Username, FirstName, LastName, Email, Password, userType) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ssssss", $username, $firstname, $lastname, $email, $password, $userType);
    
    if (mysqli_stmt_execute($stmt)) {
        return "Admin added successfully!";
    } else {
        return "Error: " . mysqli_error($con);
    }
}

function updateAdmin($con, $username, $firstname, $lastname, $email, $password) {
    // Check if username or email already exists
    $query = "SELECT * FROM users WHERE Username = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 0) {
        return "User does not exist.";
    }

    $query = "UPDATE users SET FirstName = ?, LastName = ?, Email = ?, Password = ? WHERE Username = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $email, $password, $username);

    if (mysqli_stmt_execute($stmt)) {
        return "Admin updated successfully!";
    } else {
        return "Error updating admin: " . mysqli_error($con);
    }
}

function removeAdmin($con, $id) {
    $query = "DELETE FROM users WHERE ID = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    return mysqli_stmt_execute($stmt);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['add_user'])) {

        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $result = addAdmin($con, $username, $firstname, $lastname, $email, $password); 

        if ($result === "Admin added successfully!") {
            header("Location: " . $_SERVER['PHP_SELF'] . "?add=success&message=Admin added successfully!");
            exit();
        } else {
            header("Location: " . $_SERVER['PHP_SELF'] . "?add=fail&message=Username or email already exists!.");
            exit();
        }

    } else if (isset($_POST['update_user'])) {

        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $result = updateAdmin($con, $username, $firstname, $lastname, $email, $password);

        if ($result === "Admin updated successfully!") {
            header("Location: " . $_SERVER['PHP_SELF'] . "?update=success&message=Admin updated successfully!");
            exit();
        } else {
            header("Location: " . $_SERVER['PHP_SELF'] . "?update=fail&message=Admin was not updated successfully.");
            exit();
        }

    } else if (isset($_POST['remove_user'])) {

        $user_id = $_POST['id'];
        if (!empty($user_id)) {
            $check_query = "SELECT * FROM users WHERE ID = ?";
            $stmt = mysqli_prepare($con, $check_query);
            mysqli_stmt_bind_param($stmt, "i", $user_id);
            mysqli_stmt_execute($stmt);
            $check_result = mysqli_stmt_get_result($stmt);
            
            if (mysqli_num_rows($check_result) > 0) {
                if (removeAdmin($con, $user_id)) {
                    header("Location: " . $_SERVER['PHP_SELF'] . "?remove=success&message=Admin removed successfully.");
                    exit();
                } else {
                    header("Location: " . $_SERVER['PHP_SELF'] . "?remove=fail&message=Admin was not removed successfully.");
                    exit();
                }
            } else {
                header("Location: " . $_SERVER['PHP_SELF'] . "?remove=fail&message=Admin Id was not found.");
                exit();
            }
        } else {
            header("Location: " . $_SERVER['PHP_SELF'] . "?remove=fail&message=Please enter a valid information.");
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
    <title>Edit Admins - Satori</title>

</head>
<body>

    <?php include("php/header.php") ?>

    <main>
        <h1>Manage Admins</h1>
        <div class="container">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                </tr>
                <?php 
                    $sql = "SELECT * FROM users";
                    $result = mysqli_query($con, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Check if userType is admin
                            if ($row['userType'] == 'admin') {
                                echo "<tr>";
                                echo "<td>" . $row["ID"] . "</td>";
                                echo "<td>" . $row["Username"] . "</td>";
                                echo "<td>" . $row["FirstName"] . "</td>";
                                echo "<td>" . $row["LastName"] . "</td>";
                                echo "<td>" . $row["Email"] . "</td>";        
                                echo "</tr>";
                            }
                        }
                    } else {
                        echo "<tr><td colspan='6'>0 results</td></tr>";
                    }

                    $con -> close();
                ?>
            </table>
        </div>

        <div class="buttons">
            
            <button id="add_user_btn">Add Admin</button>
            <button id="update_user_btn">Update Admin</button>
            <button id="remove_user_btn">Remove Admin</button>

        </div>

        <div class="user_box">
            <form method="post" enctype="multipart/form-data">
                <legend>Add Admin</legend>
                <div class="add_container">
                    <div>
                        <label for="username">Username</label><br>
                        <input type="text" name="username" required placeholder="Username"><br>
                    </div>
                    <div>
                        <label for="firstname">First Name</label><br>
                        <input type="text" name="firstname" required placeholder="First Name"><br>
                    </div>
                    <div>
                        <label for="lastname">Last Name</label><br>
                        <input type="text" name="lastname" required placeholder="Last Name"><br>
                    </div>
                    <div>
                        <label for="email">Email</label><br>
                        <input type="email" name="email" required placeholder="Email"><br>
                    </div>
                    <div>
                        <label for="password">Password</label><br>
                        <input type="password" name="password" required placeholder="Password"><br>
                    </div>
                    <div>
                        <label for="add">Add Admin</label><br>
                        <input id="add_user_button" type="submit" name="add_user" value="Send" class="send"><br><br>
                    </div>
                </div>
            </form>
        </div>

        <div class="user_box">
            <form method="post" enctype="multipart/form-data">
                <legend>Update Admin</legend>
                <div class="add_container">
                    <div>
                        <label for="username">Username</label><br>
                        <input type="text" id="username" name="username" required placeholder="Username"><br>
                    </div>
                    <div>
                        <label for="firstname">First Name</label><br>
                        <input type="text" id="firstname" name="firstname" required placeholder="First Name"><br>
                    </div>
                    <div>
                        <label for="lastname">Last Name</label><br>
                        <input type="text" id="lastname" name="lastname" required placeholder="Last Name"><br>
                    </div>
                    <div>
                        <label for="email">Email</label><br>
                        <input type="email" id="email" name="email" required placeholder="Email"><br>
                    </div>
                    <div>
                        <label for="password">Password</label><br>
                        <input type="password" id="password" name="password" required placeholder="Password"><br>
                    </div>
                    <div>
                        <label for="update">Update Admin</label><br>
                        <input type="submit" name="update_user" value="Send" class="send"><br><br>
                    </div>
                </div>
            </form>
        </div>

        <div class="user_box">
            <form method="post" enctype="multipart/form-data">
                <legend>Remove Admin</legend>
                <div class="add_container">
                    <div>
                        <label for="id">ID:</label><br>
                        <input type="number" id="id" name="id" required min="1" placeholder="ID"><br>
                    </div>
                    <div>
                        <label for="update">Remove Admin</label><br>
                        <input type="submit" name="remove_user" value="Send" class="send"><br><br>
                    </div>
                </div>
            </form>
        </div>

    </main>

    <script src="./assets/js/script.js"></script>
    <script>

        // Function to toggle box visibility
        function toggleBoxVisibility(boxClass) {
            var boxes = document.querySelectorAll('.user_box');
            boxes.forEach(function(box) {
                if (!box.classList.contains(boxClass)) {
                    box.classList.add('hidden');
                    localStorage.setItem(box.id, 'hidden'); // Store hidden state in local storage
                }
            });

            var targetBox = document.querySelector('.' + boxClass);
            targetBox.classList.toggle('hidden');
            var newState = targetBox.classList.contains('hidden') ? 'hidden' : 'visible';
            localStorage.setItem(targetBox.id, newState); // Store new state in local storage
        }

        // Function to initialize box visibility
        function initializeBoxVisibility() {
            var boxes = document.querySelectorAll('.user_box');
            boxes.forEach(function(box) {
                var state = localStorage.getItem(box.id);
                if (state === 'hidden') {
                    box.classList.add('hidden');
                } else {
                    box.classList.remove('hidden');
                }
            });
        }

        // Initialize box visibility when the page loads
        window.onload = function() {
            initializeBoxVisibility();
        };

        // Add event listeners to buttons
        document.getElementById("add_user_btn").addEventListener("click", function() {
            toggleBoxVisibility("add_user_box");
        });

        document.getElementById("update_user_btn").addEventListener("click", function() {
            toggleBoxVisibility("update_user_box");
        });

        document.getElementById("remove_user_btn").addEventListener("click", function() {
            toggleBoxVisibility("remove_user_box");
        });


        document.addEventListener("DOMContentLoaded", function() {
            var buttons = document.querySelectorAll(".buttons button");
            var boxes = document.querySelectorAll(".user_box");

            buttons.forEach(function(button, index) {
                button.addEventListener("click", function() {
                    var box = boxes[index];
                    
                    // If the box is already visible, hide it
                    if (box.style.display === "block") {
                        box.style.display = "none";
                    } else {
                        // Hide all user boxes
                        boxes.forEach(function(box) {
                            box.style.display = "none";
                        });

                        // Show the user box corresponding to the clicked button
                        box.style.display = "block";
                    }
                });
            });
        });
    </script>
    
</body>
</html>