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
    <title>Van Gogh Executive Travel | Profile</title>
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


    <div class="profile-bg">

        <div class="body-container">
            <div class="title-container">
                <h1>Your Bookings</h1>
            </div>
            <div class="content-container">
                <table id="prof-table">
                    <tr>
                        <th>Booking ID</th>
                        <th>VIN</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Total</th>
                        <th>Payment Type</th>
                        <th>Card Number</th>
                    </tr>
                    <?php

                    require "configure.php";

                    $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

                    if ( !$connection )
                    {
                        $_SESSION["message"] = "Connection failed!";
                        header("location: home.php");
                    }
                    else
                    {
                        $id = $_SESSION["customer_id"];
                        $sql = "SELECT * FROM booking WHERE customer_id = '$id'";

                        $query = mysqli_query($connection, $sql);

                        while ($row = $query->fetch_assoc())
                        {
                            echo "
                                <tr>
                                    <td>".$row['booking_id']."</td>
                                    <td>".$row['vin']."</td>
                                    <td>".$row['start_date']."</td>
                                    <td>".$row['end_date']."</td>
                                    <td>".$row['total']."</td>
                                    <td>".$row['payment_type']."</td>
                                    <td>".$row['card_number']."</td>
                                </tr>";
                        }
                    }

                    ?>
                </table>

            </div>
        </div>

    </div>
    <script type="text/javascript" src="script.js"></script>
</body>
