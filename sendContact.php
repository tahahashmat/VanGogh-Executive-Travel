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
    if ( !isset($_POST['feedback']) )
    {
        $_SESSION["message"] = "No data found!";
        header("location: home.php");
    }

    else
    {
        $first = mysqli_real_escape_string($connection, $_POST['first']);
        $last = mysqli_real_escape_string($connection, $_POST['last']);
        $phone = mysqli_real_escape_string($connection, $_POST['phone']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $feedback = mysqli_real_escape_string($connection, $_POST['feedback']);

        $sql = "INSERT INTO contact (firstname, lastname, email, phone, feedback) VALUES ('$first', '$last', '$email', '$phone', '$feedback')";

        mysqli_query($connection, $sql);

        $_SESSION["message"] = "Contact info sent!";
        header("location: home.php");
    }
}

?>
