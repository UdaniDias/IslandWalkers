<?php

//includes connection file
include 'dbconnection\dbconnect.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $tpnumber = $_POST['tpnumber'];
    $address = $_POST['address'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

        if ($password == $cpassword){
            $sql = "SELECT * FROM user WHERE email='$email'";
            $result = mysqli_query($conn, $sql);

            if (!$result->num_rows > 0){
            $sql = "INSERT INTO user (username,email,tpnum,address,password)
            VALUES ('$username','$email','$tpnumber','$address','$password')";
    
            $result = mysqli_query($conn, $sql);
            if($result){
                echo "<script>alert('WooW, User Registration is Completed !')</script>"; 
                $username = "";
                $email = "";
                $tpnumber = "";
                $address = "";
                $password = "";
                $cpassword = "";

                }else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			    }
            }else {
    
                echo "<script>alert('Woops, Email Already Exit !')</script>"; 
            }
        }else{
                echo "<script>alert('Entered Two Passwords Donot Match !')</script>"; 
    }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IslandWalkers.lk</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!-- header section starts  -->

    <header>

        <div id="menu-bar" class="fas fa-bars"></div>

        <a href="#" class="logo"><span>ISLAND</span> WALKERS</a>

        <nav class="navbar">
            <a href="index.php#home">home</a>
            <a href="index.php#book">book</a>
            <a href="index.php#packages">packages</a>
            <a href="index.php#services">services</a>
            <a href="index.php#gallery">gallery</a>
            <a href="index.php#review">review</a>
            <a href="index.php#contact">contact</a>
        </nav>

        <div class="icons">
            <i class="fas fa-search" id="search-btn"></i>
            <i class="fas fa-user" id="login-btn"></i>
        </div>

        <form action="" class="search-bar-container">
            <input type="search" id="search-bar" placeholder="search here...">
            <label for="search-bar" class="fas fa-search"></label>
        </form>

    </header>

    <!-- Register section starts  -->
    <section class="contact regform" id="regform">
        <h1 class="heading">
            <span>R</span>
            <span>E</span>
            <span>G</span>
            <span>I</span>
            <span>S</span>
            <span>T</span>
            <span>E</span>
            <span>R</span>
            <span class="space"></span>
            <span>N</span>
            <span>O</span>
            <span>W</span>
        </h1>

        <div class="row">

            <div class="image">
                <img src="images/contact-img.svg" alt="">
            </div>

            <form action="/index.php" method="POST">
                <div class="inputBox">
                    <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" required>
                    <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
                </div>
                <div class="inputBox">
                    <input type="tel" name="tpnumber" placeholder="Contact Number" value="<?php echo $tpnumber; ?>"
                        required>
                    <input type="text" name="address" placeholder="Address" value="<?php echo $address; ?>">
                </div>
                <div class="inputBox">
                    <input type="password" name="password" placeholder="Enter Password"
                        value="<?php echo $_POST['password']; ?>" required>
                    <input type="password" name="cpassword" placeholder="Confirm Password"
                        value="<?php echo $_POST['cpassword']; ?>" required>
                </div>
                <input type="submit" name="submit" class="btn" value="Submit">
                <input type="reset" name="reset" class="btn" value="reset">

            </form>

        </div>
    </section>


    <!-- contact section ends -->

    <!-- footer section  -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>about us</h3>
                <div class="box-elementor-image">
                    <img src="images\footer.png" alt="island_walkers">
                </div>
                <p>Looking for ways to get around in Sri Lanka? You are on vacation so why going through the stress of
                    planning your tour alone? Let Island Walkers to take care of it for you.</p>
            </div>
            <div class="box ">
                <h3>quick links</h3>
                <a href="index.php#home">home</a>
                <a href="index.php#book">book</a>
                <a href="index.php#packages">packages</a>
                <a href="index.php#services">services</a>
                <a href="index.php#gallery">gallery</a>
                <a href="index.php#review">review</a>
                <a href="index.php#contact">contact</a>
            </div>
            <div class="box ">
                <h3>follow us</h3>
                <a href="https://www.facebook.com/islandwalkers.lk " target="_blank ">facebook</a>
                <a href="https://www.instagram.com/island_walkers/ " target="_blank ">instagram</a>
                <a href="https://api.whatsapp.com/send/?phone=94777441959&text&app_absent=0 "
                    target="_blank ">whatsapp</a>
            </div>

        </div>

        <h1 class="credit "> Copyright © <span> ISLAND WALKERS</span> | all rights reserved! </h1>

    </section>


    <script src="https://unpkg.com/swiper/swiper-bundle.min.js "></script>

    <!-- custom js file link  -->
    <script src="js/script.js "></script>

</body>

</html>