<?php

session_start();
if (isset($_SESSION["message"])) {
    echo "<script type='text/javascript'> alert("."'".$_SESSION["message"]."'"."); </script>";
}
unset($_SESSION['message']);

require "configure.php";

$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

if ( !$connection )
{
    $_SESSION["message"] = "Connection failed!";
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<!-- HEAD -->
<head>
    <!-- Title -->
    <title>Van Gogh Executive Travel | Showroom</title>
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
<body style="background-image: url('images/inventory1.jpg');
background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5))
background-repeat: no-repeat;
background-attachment: fixed;">
<!-- Header which contains nav bar and image-->
<?php include("header.php"); ?>
<div class="inventory">
    <div class="title-box">
        <h1> “By the work one knows the workmen.” – Jean De La Fontaine </h1>
        <br></br>
        <h3> A motto Van Gogh Executive Travel thrives upon! By constantly updating our inventory
            we make sure that our Customers are always satisfied wih their experience
        </div>

    </div>
    <div class="inventorybox">
        <?php

        $sql = "SELECT * FROM vehicle";

        $query = mysqli_query($connection, $sql);

        while ($row = $query->fetch_assoc())
        {
            if ($row['Status'] == 'Available') {
                echo "
                <div class='car-box'>
                <img src='images/inventory/". $row['Photo']."' class='inventory-photo'>

                <div class='inventory-text'>
                <h1>".$row['Year']." ".$row['Make']." ".$row['Model']."</h1>
                <p>Colour: ".$row['Colour']."</p>
                <p>Mileage: ".$row['Mileage']."km</p>
                <p>Price: $".$row['Price']." per 24 Hours</p>
                <p>Status: ".$row['Status']."</p>
                <button name='submit' class='inventory-btn' onclick=\"bookNow('".$row['Year']."','".$row['Make']."','".$row['Model']."','".$row['VIN']."','".$row['Price']."')\">Book Now</button>
                </div>

                </div>";
            }

        }

        ?>
    </div>

    <script type="text/javascript" src="script.js"></script>


</body>
