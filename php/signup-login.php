<?php

include("connection.php");

function generateUniqueUserID($con) {
    $unique = false;
    $user_id = '';

    do {
        $user_id = mt_rand(10000, 99999);

        // Check if the generated user ID already exists in the database
        $check_user_id_query = "SELECT id FROM users WHERE id = '$user_id'";
        $check_user_id_result = mysqli_query($con, $check_user_id_query);

        if (mysqli_num_rows($check_user_id_result) == 0) {
            // User ID is unique
            $unique = true;
        }
    } while (!$unique); // This loops until a unique id is generated then returns it
    return $user_id;
}


//If a user signs up, this condition is called
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup-submit"])) {

    //Gets the data from the forms
    $username = $_POST["username"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"]; 

    // Generate unique user id
    $user_id = generateUniqueUserID($con);

    // Check if username already exists
    $check_username_query = "SELECT * FROM users WHERE username = '$username'";
    $check_username_result = mysqli_query($con, $check_username_query);
    if (mysqli_num_rows($check_username_result) > 0) {

        // If a username already exists, set error message in session
        $_SESSION["signup_error_message"] = "Username already exists. Please choose a different username.";

        //Redirect back to login page
        header("Location: login.php?username-already-exists");
        exit();
    }

    // Check if email already exists
    $check_email_query = "SELECT * FROM users WHERE email = '$email'";
    $check_email_result = mysqli_query($con, $check_email_query);
    if (mysqli_num_rows($check_email_result) > 0) {
        // If an email already exists, set error message in session
        $_SESSION["signup_error_message"] = "Email already exists. Please choose a different email.";

        // Redirect back to Login page
        header("Location: login.php?email-already-exists");
        exit();
    }

    // If they are able to bypass the conditions for unique email and username, then create the query and insert to database.

    // Query to insert new user into database
    $insert_user_query = "INSERT INTO users (id, username, firstname, lastname, email, password, usertype) VALUES ('$user_id', '$username', '$firstname', '$lastname', '$email', '$password', 'user')";
    mysqli_query($con, $insert_user_query);

    // Redirect to login page with success message
    header("Location: login.php?signup=success");
    exit();
}

// If a user logins up, this condition is called
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login-submit"])) {

    // Get the username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query the database to check if the provided username and password match any records
    $login_query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $login_result = mysqli_query($con, $login_query);

    // This condition checks if there is a match for username and password in the database
    if (mysqli_num_rows($login_result) == 1) {
        
        // If a user is found, then get its data from the database

        $row = mysqli_fetch_assoc($login_result); 
        $usertype = $row["userType"]; 
        $username_x = $row["Username"];
        $username_id = $row["ID"];

        // This condition checks if the usertype is a user or admin
        if ($usertype === "admin") { 

            // If its admin, set the session variables to the retrieved data from the database.
            // Then redirect the user into the backend database.

            header("Location: backend-db.php"); 
            $_SESSION["logged_in"] = true;
            $_SESSION["user_type"] = "admin";
            $_SESSION["user_name"] = $username_x;
            
            exit();
        } else {

            // If its user, set the session variables to the retrieved data from the database.
            // Then redirect the user into the homepage.

            header("Location: index.php"); 
            $_SESSION["logged_in"] = true;
            $_SESSION["user_type"] = "user";
            $_SESSION["user_name"] = $username_x;
            $_SESSION["user_id"] = $username_id;
            exit();
        }

    } else {

        // if a user is not found or have invalid username or password, then set the session error message.
        // Then redirect back to the login page.

        $_SESSION["login_error_message"] = "Invalid username or password.";
        header("Location: login.php?login=failed"); 
        exit();
    }
}


?>