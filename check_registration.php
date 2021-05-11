<?php

session_start(); // Start the session

require "configure.php"; // Get DB constants that are used to make a connection

$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME); // Establish a connection

echo $_POST['submit'];

// Check if the connection failed
if (!$connection)
{
  $_SESSION["message"] = "Connection failed.";
  header("location: login.php");
}
else
{
  if (!isset($_POST['submit']))
  {
    $_SESSION["message"] = "Please go login page to register.";
    header("location: login.php");
  }

  else
  {
    $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $license_number = mysqli_real_escape_string($connection, $_POST['license_number']);
    $phone_number = mysqli_real_escape_string($connection, $_POST['phone_number']);
    $unit = mysqli_real_escape_string($connection, $_POST['unit']);
    $street = mysqli_real_escape_string($connection, $_POST['street']);
    $city = mysqli_real_escape_string($connection, $_POST['city']);
    $postal = mysqli_real_escape_string($connection, $_POST['postal']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $sql = "SELECT * FROM customer WHERE username = '$username'";

    $query = mysqli_query($connection, $sql);

    $rows_returned = mysqli_num_rows($query);

    if ($rows_returned == 1)
    {
      $_SESSION["message"] = "Username taken!";
      header("location: login.php");
    }

    else
    {
      $sql = "SELECT * FROM customer WHERE email = '$email'";

      $query = mysqli_query($connection, $sql);

      $rows_returned = mysqli_num_rows($query);

      if ($rows_returned == 1)
      {
        $_SESSION["message"] = "Email taken!";
        header("location: login.php");
      }

      else
      {
        $sql = "INSERT INTO customer (license_number, first_name, last_name, email, street, city, postal, unit, phone_number, username, password)
                VALUES ('$license_number', '$first_name', '$last_name', '$email', '$street', '$city', '$postal', '$unit', '$phone_number', '$username', '$password')";
        mysqli_query($connection, $sql);
        $_SESSION["message"] = "User registered!";
        header("location: login.php");
      }
    }
  }
}

?>
