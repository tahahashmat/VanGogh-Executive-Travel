<?php

session_start();

require "configure.php";

$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

if ( !$connection )
{
  $_SESSION["message"] = "Connection failed!";
  header("location: login.php");
}
else
{
  if ( !isset($_POST['submit']) )
  {
    $_SESSION["message"] = "No data found!";
    header("location: login.php");
  }
  else
  {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM customer WHERE username = '$username' && password = '$password'";

    $query = mysqli_query($connection, $sql);

    $rows_returned = mysqli_num_rows($query);

    if ($rows_returned == 1)
    {
      $sql = "SELECT * FROM customer WHERE username = '$username'";
      $query = mysqli_query($connection, $sql);
      $data_array = $query->fetch_assoc();

      $_SESSION['customer_id'] = $data_array['customer_id'];
      $_SESSION['username'] = $data_array['username'];
      $_SESSION['first_name'] = $data_array['first_name'];
      $_SESSION['last_name'] = $data_array['last_name'];
      $_SESSION['email'] = $data_array['email'];
      $_SESSION['phone_number'] = $data_array['phone_number'];
      $_SESSION['license_number'] = $data_array['license_number'];
      $_SESSION['unit'] = $data_array['unit'];
      $_SESSION['street'] = $data_array['street'];
      $_SESSION['city'] = $data_array['city'];
      $_SESSION['postal'] = $data_array['postal'];

      header("location: home.php");
    }
    else
    {
      $_SESSION["message"] = "Not a valid login!";
      header("location: login.php");
    }
  }
}

?>
