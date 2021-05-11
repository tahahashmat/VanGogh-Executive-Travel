<?php
session_start(); // Start the session

// If a message is passed here, then this block is used to display it
if ( isset($_SESSION["message"]) ) {
    echo "<script type='text/javascript'> alert("."'".$_SESSION["message"]."'"."); </script>";
}
unset( $_SESSION['message'] );

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
    <title>Van Gogh Executive Travel | Home</title>
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

    <main>
        <section class="firstsection">
            <div class="container">
                <div class="companyname">
                    <h3>Van Gogh Executive Travel</h3>
                    <p>Guaranteed Luxury and Comfort</p>
                </div>
            </div>

        </section>

        <section class="companyinfo">
            <div class="container">

                <div class="mainheading">
                    <br></br>
                    <h3>Why Van Gogh Executive Travel?</h3>
                    <br></br>
                    <h1> FACTS AND FIGURES </h1>
                </div>

                <div class="activities-grid">

                    <!--first-->
                    <div class="activities-grid-item firstheading">
                        <h1>Number of customers that use our services</h1>
                        <ul>
                            <?php
                            $sql = "SELECT COUNT(*) FROM customer";
                            $query = mysqli_query($connection, $sql);
                            while ($row = $query->fetch_assoc())
                            {
                                foreach ($row as $key => $value) { echo "<li>$value</li>"; }
                            }
                            ?>
                        </ul>
                    </div>
                    <!--second-->
                    <div class="activities-grid-item secondheading">
                        <h1>The Total Number of Bookings Our Company has Made:</h1>
                        <ul>
                            <?php
                            $sql = "SELECT COUNT(*) FROM booking";
                            $query = mysqli_query($connection, $sql);
                            while ($row = $query->fetch_assoc())
                            {
                                foreach ($row as $key => $value) { echo "<li>$value</li>"; }
                            }
                            ?>
                        </ul>
                    </div>
                    <!--third-->
                    <div class="activities-grid-item thirdheading">
                        <h1>Total Revenue from Our Sales</h1>
                        <ul>
                            <?php
                            $sql = "SELECT SUM(total) FROM booking";
                            $query = mysqli_query($connection, $sql);
                            while ($row = $query->fetch_assoc())
                            {
                                foreach ($row as $key => $value) { echo "<li>$value</li>"; }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="companyservices">
            <div class="container">
                <div class="mainheading">
                <br></br>
                        <h3>Price and Mileage</h3>
                        <br></br>


                    </div>
                    <div class="activities-grid">
                        <!--first-->
                        <div class="activities-grid-item fourthheading">
                            <h1>We strive on delivering the most pleasant experience to our customers, which includes providing them with the
                                lastest of super cars on the market. Our 2020 lineup includes:</h1>
                            <ul>
                                <?php
                                $sql = "SELECT Make, Model FROM vehicle WHERE Year = ANY (SELECT Year
                                        FROM vehicle Where Year = 2020 ) GROUP BY Make";
                                $query = mysqli_query($connection, $sql);
                                while ($row = $query->fetch_assoc())
                                {
                                    echo "<li>".$row['Make']." ".$row['Model']."</li>";
                                }
                                ?>
                            </ul>
                        </div>
                        <!--second-->
                        <div class="activities-grid-item fifthheading">
                            <h1>Our Economical Rental Options that fall undernathe the Average rental price include:</h1>
                            <ul>
                                <?php
                                $sql = "SELECT Make, Model, price FROM vehicle WHERE price<= (SELECT AVG(price) FROM vehicle)";
                                $query = mysqli_query($connection, $sql);
                                while ($row = $query->fetch_assoc())
                                {
                                    echo "<li>".$row['Make']." ".$row['Model']."</li>";
                                }
                                ?>
                            </ul>
                        </div>
                        <!--third-->
                        <div class="activities-grid-item sixthheading">
                            <h1>The Number of Vehicles in Our Fleet is:</h1>
                            <ul>
                                <?php
                                $sql = "SELECT COUNT(*) FROM vehicle";
                                $query = mysqli_query($connection, $sql);
                                while ($row = $query->fetch_assoc())
                                {
                                    foreach ($row as $key => $value) { echo "<li>$value</li>"; }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section class="companyservices">
                <div class="container">
                    <div class="mainheading">
                                
                    <br></br>
                        <h3>Our Sales and Fleet</h3>
                        <br></br>

                        </div>
                        <div class="activities-grid">
                            <!--first-->
                            <div class="activities-grid-item fourthheading">
                                <h1>The number of times the most Luxurious Vehicle in our fleet, The Bugatti Chiron, has been booked by Customers is:</h1>
                                <ul>
                                    <?php
                                    $sql = "SELECT COUNT(booking_id) FROM booking JOIN customer ON customer.customer_id = booking.customer_id JOIN vehicle ON booking.vin = vehicle.VIN WHERE vehicle.Make = 'Bugatti'";
                                    $query = mysqli_query($connection, $sql);
                                    while ($row = $query->fetch_assoc())
                                    {
                                        foreach ($row as $key => $value) { echo "<li>$value</li>"; }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <!--second-->
                            <div class="activities-grid-item fifthheading">
                                <h1>To aid you in better selecting you choice of vehicle we have ordered them in terms of increasing mileage</h1>
                                <ul>
                                    <?php
                                    $sql = "SELECT Make, Model, Mileage FROM vehicle WHERE Mileage < ( SELECT AVG(Mileage) FROM vehicle WHERE vehicle.Make = Make) ORDER BY Mileage";
                                    $query = mysqli_query($connection, $sql);
                                    while ($row = $query->fetch_assoc())
                                    {
                                        echo "<li>".$row['Make']." ".$row['Model'].": ".$row['Mileage']."km</li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                            <!--third-->
                            <div class="activities-grid-item sixthheading">

                                <h1>The total price for the all the vehicles that are currently booked:</h1>
                                <ul>
                                    <?php
                                    $sql = "SELECT vehicle.Make, vehicle.Model, booking.total FROM vehicle LEFT OUTER JOIN booking ON vehicle.VIN=booking.vin UNION SELECT vehicle.Make, vehicle.Model, booking.total FROM vehicle RIGHT OUTER JOIN booking ON vehicle.VIN = booking.vin";
                                    $query = mysqli_query($connection, $sql);
                                    while ($row = $query->fetch_assoc())
                                    {
                                        if ($row['total'] < 1){
                                            echo "<li>".$row['Make']." ".$row['Model'].": $0</li>";
                                        }
                                        else
                                        {
                                            echo "<li>".$row['Make']." ".$row['Model'].": $".$row['total']."</li>";
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>


                <section class="companyservices">
                    <div class="container">
                        <div class="mainheading">
                            <br></br>

                            <br></br>

                            <h1> </h1>
                            </div>
                            <div class="activities-grid">
                                <!--first-->

                                <!--second-->
                                <div class="activities-grid-item fifthheading">
                                    <h1>The Lamborghinis in are fleet are:</h1>
                                    <ul>
                                        <?php
                                        $sql = "SELECT Make, Model, Year FROM vehicle WHERE Make = 'Lamborghini'";
                                        $query = mysqli_query($connection, $sql);
                                        while ($row = $query->fetch_assoc())
                                        {
                                            echo "<li>".$row['Year']." ".$row['Make']." ".$row['Model']."</li>";
                                        }
                                        ?>
                                    </ul>
                                </div>

                            </section>

                        </main>
                    </body>
                    </html>
