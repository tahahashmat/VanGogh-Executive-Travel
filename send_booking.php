<?php

session_start();

require "configure.php";

$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

if ( !$connection )
{
    $_SESSION["message"] = "Connection failed!";
    header("location: home.php");
}
else
{
    if ( !isset($_POST['cvv']) )
    {
        $_SESSION["message"] = "No data found!";
        header("location: home.php");
    }

    else
    {
        $customer_id = $_SESSION['customer_id'];
        $vin = mysqli_real_escape_string($connection, $_POST['vin']);
        $start_date = mysqli_real_escape_string($connection, $_POST['start_date']);
        $start_date = date('Y-m-d', strtotime(str_replace('-', '/', $start_date)));
        $end_date = mysqli_real_escape_string($connection, $_POST['end_date']);
        $end_date = date('Y-m-d', strtotime(str_replace('-', '/', $end_date)));
        $total = mysqli_real_escape_string($connection, $_POST['total']);
        $payment_type = mysqli_real_escape_string($connection, $_POST['payment_type']);
        $card_number = mysqli_real_escape_string($connection, $_POST['card_number']);
        $expiration_date = mysqli_real_escape_string($connection, $_POST['expiration_date']);
        $expiration_date = date('Y-m-d', strtotime(str_replace('-', '/', $expiration_date)));
        $cvv = mysqli_real_escape_string($connection, $_POST['cvv']);

        $sql = "INSERT INTO booking (customer_id, vin, start_date, end_date, total, payment_type, card_number, expiration_date, cvv)
                VALUES ('$customer_id', '$vin', '$start_date', '$end_date', '$total', '$payment_type', '$card_number', '$expiration_date', '$cvv')";

        mysqli_query($connection, $sql) or die(mysqli_error($connection));

        $_SESSION["message"] = "Booking info sent!";
        header("location: home.php");
    }
}

?>
