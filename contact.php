<?php
session_start();
if (isset($_SESSION["message"])) {
  echo "<script type='text/javascript'> alert("."'".$_SESSION["message"]."'"."); </script>";
}
unset($_SESSION['message']);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<!-- HEAD -->
<head>
    <!-- Title -->
    <title>Van Gogh Executive Travel | Contact</title>
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

    <div class="background">

        <div class="contactcontainer">
            <h1>Reach Out to Us!</h1>
            <p> A fundamental part of our buinsess it taking the time to respond to any complexites or queries
            our customer or users might be facing. Feel free to get in touch with us!</p>

                <div class="contactbox">
                    <div class="contact-left">
                        <h3>Forward Your Query!</h3>
                        <form action="sendContact.php" method="POST">

                            <div class="input-row">
                                <div class="input-groups">
                                    <input name='first' type="text" placeholder="First Name">
                                </div>
                                <br></br>
                                <div class="input-groups">
                                    <input name='last' type="text" placeholder="Last Name">
                                </div>
                                <br></br>

                            </div>

                            <div class="input-row">
                                <div class="input-groups">
                                    <input name='email' type="email" placeholder="Email">
                                </div>
                                <br></br>

                                <div class="input-groups">
                                    <input name='phone' type="text" placeholder="Phone Number">
                                </div>
                                <br></br>

                            </div>

                            <textarea name='feedback' rows="5" placeholder="Your Feedback"></textarea>

                            <button class="contactbtn" type="submit">SUBMIT</button>

                        </form>
                    </div>

                    <div class="contact-right">
                        <h3> Get in Touch through our Socials!</h3>

                        <table>
                                <tr>
                                    <td>Email</td>
                                    <td>vangoghet@outlook.com</td>
                                </tr>

                                <tr>
                                    <td>Phone</td>
                                    <td>+1 647 943 2010</td>
                                </tr>

                                <tr>
                                    <td>Instagram</td>
                                    <td>@vangoghet</td>
                                </tr>

                                <tr>
                                    <td>Facebook</td>
                                    <td>Van Gogh Executive Travel</td>
                                </tr>
                        </table>

                    </div>

                 </div>
        </div>
    </div>

    <script type="text/javascript" src="script.js"></script>
</body>
