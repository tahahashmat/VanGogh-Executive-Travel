<?php
session_start();
if (isset($_SESSION["message"]))
{
    echo "<script type='text/javascript'> alert("."'".$_SESSION["message"]."'"."); </script>";
}
unset($_SESSION['message']);
session_destroy();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<!-- HEAD -->
<head>
    <!-- Title -->
    <title>Van Gogh Executive Travel | Login/Register</title>
    <!--Ion Icons-->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Aldrich&display=swap" rel="stylesheet">
    <!-- linking the css and js file -->
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="script.js"></script>
</head>
<!-- BODY -->
<body>
    <!-- Header which contains nav bar and image-->
    <?php include("header.php"); ?>

    <div class="hero">
        <div class="formbox">
            <div class="buttonbox">
                <div id="btn"></div>
                <button class="toggle-btn" onclick="login()">Log In</button>
                <button class="toggle-btn" onclick="register()">Register</button>
            </div>

            <form id="login" action="check_login.php" class="input-group" method="POST">
                <input type="text" name="username" class="input-field" placeholder="Username" required>
                <input type="password" name="password" class="input-field" placeholder="Password" required>
                <button type="submit" name="submit" class="submit-btn">Log In</button>
            </form>

            <form id="register" action="check_registration.php" class="input-group" method="POST">
                <input type="text" name="first_name" class="input-field" placeholder="First Name" required pattern="[A-Za-z]+" title="First name can only contain letters.">
                <input type="text" name="last_name" class="input-field" placeholder="Last Name" required pattern="[A-Za-z]+" title="Last name can only contain letters.">
                <input type="text" name="username" class="input-field" placeholder="Username" required pattern="[A-Za-z0-9]{3,}" title="Username can only contain leters and numbers, and must be at least 3 characters long.">
                <input type="email" name="email" class="input-field" placeholder="Email">
                <input type="text" name="license_number" class="input-field" placeholder="License Number">
                <input type="text" name="phone_number" class="input-field" placeholder="Phone Number">
                <input type="text" name="unit" class="input-field" placeholder="Unit Number">
                <input type="text" name="street" class="input-field" placeholder="Street">
                <input type="text" name="city" class="input-field" placeholder="City">
                <input type="text" name="postal" class="input-field" placeholder="Postal Code">
                <input type="password" name="password" class="input-field" placeholder="Password" required pattern="[A-Za-z0-9]{3,}" title="Password can only contain leters and numbers, and must be at least 3 characters long.">
                <button type="submit" name="submit" class="submit-btn">Register</button>
            </form>

    </div>
    <script type="text/javascript" src="script.js"></script>
</body>
