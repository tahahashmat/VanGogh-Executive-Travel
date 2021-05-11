<?php
session_start();

if ( !isset( $_SESSION['username']) )
{
    $_SESSION["message"] = "You must be logged in to make a reservation.";
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<!-- HEAD -->
<head>
    <!-- Title -->
    <title>Van Gogh Executive Travel | Booking</title>
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
<body style="background-image: url('images/booking.jpg');
background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5))
background-repeat: no-repeat;
background-attachment: fixed;">
    <!-- Header which contains nav bar and image-->
    <?php include("header.php"); ?>

    <div class="bookingbackground">

        <div class="bookingcontainer">
            <h1>Make A Reservation!</h1>
            <div class="bookingbox">

                <div class="bookingboxtext">
                    <form onchange="updateTotal()" action="send_booking.php" method="post">
                        <h3>Personal Information</h3>
                        <div> <p>First Name</p> <input type="text" name="first_name" class="input-coloumn" readonly value=<?php echo "'".$_SESSION['first_name']."'"; ?>> </div>
                        <div> <p>Last Name</p> <input type="text" name="last_name" class="input-coloumn" readonly value=<?php echo "'".$_SESSION['last_name']."'"; ?>> </div>
                        <div> <p>Email</p> <input type="email" name="email" class="input-coloumn" readonly value=<?php echo "'".$_SESSION['email']."'"; ?>> </div>

                        <script type="text/javascript">
                        document.write('<div> <p>Car</p> <input type="text" name="car" class="input-coloumn" readonly value="' +
                        localStorage.getItem("Year") + ' ' + localStorage.getItem("Make") + ' ' + localStorage.getItem("Model") + '"> </div>');
                        </script>

                        <script type="text/javascript">
                        document.write('<div> <p>VIN</p> <input type="text" name="vin" class="input-coloumn" readonly value="' + localStorage.getItem("VIN") + '"> </div>');
                        </script>

                        <script type="text/javascript">
                        document.write('<div> <p>Price/24hrs</p> <input type="text" name="price" id="price-box" class="input-coloumn" readonly value="$' + localStorage.getItem("Price") + '"> </div>');
                        </script>

                        <div><p>Phone Number</p> <input type="text" name="phone_number" class="input-coloumn" readonly value=<?php echo "'".$_SESSION['phone_number']."'"; ?>> </div>
                        <div><p>License Number</p> <input type="text" name="license_number" class="input-coloumn" readonly value=<?php echo "'".$_SESSION['license_number']."'"; ?>> </div>
                        <div><p>Booking From</p> <input type="date" name="start_date" id="booking-from" class="input-coloumn" > </div>
                        <div><p>Booking To</p> <input type="date" name="end_date" id="booking-to" class="input-coloumn" > </div>
                        <div><p>Unit Number</p> <input type="text" name="unit" class="input-coloumn" value=<?php echo "'".$_SESSION['unit']."'"; ?>> </div>
                        <div><p>Street</p> <input type="text" name="street" class="input-coloumn" value=<?php echo "'".$_SESSION['street']."'"; ?>> </div>
                        <div><p>City</p> <input type="text" name="city" class="input-coloumn" value=<?php echo "'".$_SESSION['city']."'"; ?>> </div>
                        <div><p>Postal Code</p> <input type="text" name="postal" class="input-coloumn" value=<?php echo "'".$_SESSION['postal']."'"; ?>> </div>
                        <br>
                        <hr>
                        <br>
                        <h3>Payment</h3>

                        <div>
                            <p>Payment Type</p>
                            <select name="payment_type" id="cars">
                                <option value="Mastercard">Mastercard</option>
                                <option value="Visa">Visa</option>
                            </select>
                        </div>
                        <div> <p>Card Number</p> <input type="text" name="card_number" class="input-coloumn" > </div>
                        <div> <p>Expiration Date</p> <input type="date" name="expiration_date" class="input-coloumn" > </div>
                        <div> <p>CVV</p> <input type="text" name="cvv" class="input-coloumn" > </div>
                        <div> <p>Total</p> <input type="text" name="total" id='total-box' class="input-coloumn" value="$0" readonly> </div>
                        <button class="bookingbtn" type="submit">BOOK</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
