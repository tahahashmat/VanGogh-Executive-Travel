<!-- Header which contains nav bar and image-->
<header>
    <div class="container">
        <nav>
            <!-- profile picture -->
            <img onload="weather()" src="images/profile.png" class="profile" onclick="profileIcon('<?php if (isset($_SESSION['username'])) {echo $_SESSION['username'];} else {echo "";} ?>')">
            <!-- logout picture -->
            <a href="login.php"><img src="images/logout_icon.png" id="logout" class="profile"></a>
            <div id="weather" onload="weather()"> </div>
            <!-- menu icon -->
            <div class="menu-icons open" onclick="sidebar()">
                <i class="icon ion-md-menu"></i>
            </div>
            <!-- sidebar -->
            <ul class="nav-list" id="sidebar">
                <!-- close button -->
                <div class="menu-icons close" onclick="sidebar()">
                    <i class="icon ion-md-close"></i>
                </div>
                <!-- home page -->
                <li class="nav-item">
                    <a href="home.php" class="nav-link">Home</a>
                </li>
                <!-- showroom page -->
                <li class="nav-item">
                    <a href="showroom.php" class="nav-link">Showroom</a>
                </li>
                <!-- contact page -->
                <li class="nav-item">
                    <a href="contact.php" class="nav-link">Contact</a>
                </li>
                <!-- login / register page -->
                <li class="nav-item">
                    <a href="login.php" class="nav-link">Login / Register</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
