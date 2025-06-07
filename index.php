<?php

include 'dbconnection\dbconnect.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result);

        if ($row['user_type'] == 'admin') {

            $_SESSION['username'] = $row['username'];
            header("Location: dashboard\adminpanel.php");
        } elseif ($row['user_type'] == 'user') {

            $_SESSION['username'] = $row['username'];
            header("Location: dashboard\userpanel.php");
        }
    } else {
        echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
    }
}

if (isset($_POST['booknow'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $whereto = $_POST['whereto'];
    $howmany = $_POST['howmany'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];


    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $sql = "INSERT INTO bookings (username,email,whereto,howmany,arrivals,leaving)
                    VALUES ('$username','$email','$whereto','$howmany','$arrivals','$leaving')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Your Booking is Completed !')</script>";
        
        } else {
            echo "<script>alert('Something Went Wrong !')</script>";
        }
    } else {
        echo "<script>alert('Please Register First !')</script>";
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
            <a href="#home">home</a>
            <a href="#book">book</a>
            <a href="#packages">packages</a>
            <a href="#services">services</a>
            <a href="#gallery">gallery</a>
            <a href="#review">review</a>
            <a href="#contact">contact</a>
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

    <!-- header section ends -->

    <!-- login form container  -->

    <div class="login-form-container">

        <i class="fas fa-times" id="form-close"></i>

        <form action="" method="POST">
            <h3>login</h3>
            <input type="email" name="email" class="box" placeholder="enter your email" value="<?php echo $email; ?>" required>
            <input type="password" name="password" class="box" placeholder="enter your password" value="<?php echo $_POST['password']; ?>" required>
            <input type="submit" name="submit" value="login now" class="btn">
            <input type="checkbox" id="remember">
            <label for="remember">Remember Me !</label>
            <p>forget password? <a href="#">Click Here !</a></p>
            <p>don't have and account? <a href="register.php">Register Now</a></p>
        </form>

    </div>

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="content">
            <h3>Welcome to Sri Lanka</h3>
            <p>dicover new places with us , Your adventure awaits</p>
            <a href="#" class="btn">Be My Guest</a>
        </div>

        <div class="controls">
            <span class="vid-btn active" data-src="images\bannerSlider\vid-1.mp4"></span>
            <span class="vid-btn" data-src="images\bannerSlider\vid-2.mp4"></span>
            <span class="vid-btn" data-src="images\bannerSlider\vid-3.mp4"></span>
            <span class="vid-btn" data-src="images\bannerSlider\vid-4.mp4"></span>
            <span class="vid-btn" data-src="images\bannerSlider\vid-5.mp4"></span>
            <span class="vid-btn" data-src="images\bannerSlider\vid-6.mp4"></span>

        </div>

        <div class="video-container">
            <video src="images\bannerSlider\vid-1.mp4" id="video-slider" loop autoplay muted></video>

        </div>

    </section>

    <!-- home section ends -->

    <!-- book section starts  -->

    <section class="book" id="book">

        <h1 class="heading">
            <span>b</span>
            <span>o</span>
            <span>o</span>
            <span>k</span>
            <span class="space"></span>
            <span>n</span>
            <span>o</span>
            <span>w</span>
        </h1>

        <div class="row">

            <div class="image">
                <img src="images/book-img.svg" alt="">
            </div>

            <form action="" method="POST">
                <div class="inputBox">
                    <h3>Email</h3>
                    <input type="email" name="email" placeholder="Email" value="" required>
                </div>
                <div class="inputBox">
                    <h3>where to</h3>
                    <input type="text" name="whereto" placeholder="place name">
                </div>
                <div class="inputBox">
                    <h3>how many</h3>
                    <input type="number" name="howmany" placeholder="number of guests">
                </div>
                <div class="inputBox">
                    <h3>arrivals</h3>
                    <input type="date" name="arrivals">
                </div>
                <div class="inputBox">
                    <h3>leaving</h3>
                    <input type="date" name="leaving">
                </div>
                <input type="submit" name="booknow" class="btn" value="book now">
            </form>

        </div>

    </section>

    <!-- book section ends -->

    <!-- packages section starts  -->

    <section class="packages" id="packages">

        <h1 class="heading">
            <span>p</span>
            <span>a</span>
            <span>c</span>
            <span>k</span>
            <span>a</span>
            <span>g</span>
            <span>e</span>
            <span>s</span>
        </h1>

        <div class="box-container">

            <div class="box">
                <img src="images/packages/down-south.jpg" alt="">
                <div class="content">
                    <h3> <i class="fas fa-map-marker-alt"></i> Down South </h3>
                    <p>The Down south of Sri Lanka is one of the best-kept secrets in the Asian Region. However, that
                        secret is quickly revealed as more and more travellers gather to Sri Lanka to its stunning
                        beaches, incredible wildlife, rich culture, and
                        classical heritage landmarks!</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">Starting from LKR 47,000.00 <span>LKR 60,000.00</span> </div>
                    <a href="#" class="btn">book now</a>
                </div>
            </div>

            <div class="box">
                <img src="images/packages/ella500x600.jpg" alt="">
                <div class="content">
                    <h3> <i class="fas fa-map-marker-alt"></i> Ella </h3>
                    <p>Ella has all the best parts rolled into one enchanting a mountain town in Sri Lanka that has
                        quickly become a must-visit destination. Read on for the best places to visit in Ella and where
                        to stay ! Ella in Sri Lanka is every bit as
                        bewitching as the name suggests !</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">Starting from LKR 70,000.00 <span>LKR 85,000.00</span> </div>
                    <a href="#" class="btn">book now</a>
                </div>
            </div>

            <div class="box">
                <img src="images/packages/sigiriya.jpg" alt="">
                <div class="content">
                    <h3> <i class="fas fa-map-marker-alt"></i> Sigiriya </h3>
                    <p>Main features of Sigiriya rock are Sigiri graffiti, Lion's paw entrance, Boulders garden, Mirror
                        wall, Fresco paintings of female figures, Extensive networks of landscaped garden, Water
                        gardens, Moats, Ramparts and the remains of the
                        palace !
                    </p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">Starting from LKR 60,000.00 <span>LKR 75,000.00</span> </div> <a href="#" class="btn">book now</a>
                </div>
            </div>

            <div class="box">
                <img src="images/packages/polonnaruwa500x600.jpg" alt="">
                <div class="content">
                    <h3> <i class="fas fa-map-marker-alt"></i> Polonnaruwa </h3>
                    <p>Polonnaruwa was the second capital of Sri Lanka after the destruction of Anuradhapura in 993. It
                        comprises, besides the Brahmanic monuments built by the Cholas, the monumental ruins of the
                        fabulous garden-city created in the 12th century
                        !
                    </p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">Starting from LKR 35,000.00 <span>LKR 40,000.00</span> </div> <a href="#" class="btn">book now</a>
                </div>
            </div>

        </div>

        </div>

    </section>

    <!-- packages section ends -->

    <!-- services section starts  -->

    <section class="services" id="services">

        <h1 class="heading">
            <span>s</span>
            <span>e</span>
            <span>r</span>
            <span>v</span>
            <span>i</span>
            <span>c</span>
            <span>e</span>
            <span>s</span>
        </h1>

        <div class="box-container">

            <div class="box">
                <i class="fas fa-hotel"></i>
                <h3>affordable hotels</h3>
                <p>We guarantee to let you experinces the best and the affordable stays including best guest services,
                    Entertainment, Outdoor spaces and infinity amazing views</p>
            </div>
            <div class="box">
                <i class="fas fa-utensils"></i>
                <h3>food and drinks</h3>
                <p>We are ready to serve you meals upon your request. Packed meals can be arranged for picnics troughout
                    the day and snacks are free of charge.</p>
            </div>
            <div class="box">
                <i class="fas fa-bullhorn"></i>
                <h3>safty guide</h3>
                <p>Under the mask, we couldn’t see your smile. But we can feel it. Our team goes the extra mile,
                    striving to deliver a delightful safe tour experience - because we care.</p>
            </div>
            <div class="box">
                <i class="fas fa-globe-asia"></i>
                <h3>around the country</h3>
                <p>Stay connected is essential no matter where you are in the world. We know better what matters you
                    most when travelling for business or leisure. Enjoy free Wi-Fi in your rooms, restaurants, and even
                    while travelling to keep connected all
                    the time.</p>
            </div>
            <div class="box">
                <i class="fas fa-plane"></i>
                <h3>fastest travel</h3>
                <p>Transport can be arranged upon request. Please inform us about your flight schedules to ensure proper
                    arrangement of transfers.</p>
            </div>
            <div class="box">
                <i class="fas fa-hiking"></i>
                <h3>adventures</h3>
                <p>Free Bicycles to Ride.Enjoy free bicycle to roam through and hiking, surfing and smorkling facilities
                    are also available, you name it we have it.</p>
            </div>

        </div>

    </section>

    <!-- services section ends -->

    <!-- gallery section starts  -->

    <section class="gallery" id="gallery">

        <h1 class="heading">
            <span>G</span>
            <span>a</span>
            <span>l</span>
            <span>l</span>
            <span>e</span>
            <span>r</span>
            <span>y</span>
        </h1>

        <div class="box-container">

            <div class="box">
                <img src="images/gallery/ci_01.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>

                </div>
            </div>
            <div class="box">
                <img src="images/gallery/img-1.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>

                </div>
            </div>
            <div class="box">
                <img src="images/gallery/ci_02.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>

                </div>
            </div>
            <div class="box">
                <img src="images/gallery/img-5.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>

                </div>
            </div>

            <div class="box">
                <img src="images/gallery/ci_03.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                </div>
            </div>
            <div class="box">
                <img src="images/gallery/ourvehicle.png" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>

                </div>
            </div>
            <div class="box">
                <img src="images/gallery/img-11.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>

                </div>
            </div>
            <div class="box">
                <img src="images/gallery/img-12.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>

                </div>
            </div>

        </div>

    </section>

    <!-- gallery section ends -->

    <!-- review section starts  -->

    <section class="review" id="review">

        <h1 class="heading">
            <span>r</span>
            <span>e</span>
            <span>v</span>
            <span>i</span>
            <span>e</span>
            <span>w</span>
        </h1>

        <div class="swiper-container review-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="box">
                        <img src="images/reviewers/pic1.png" alt="">
                        <h3>Ayesha Dias</h3>
                        <p>Island Walkers you made our vacation a memorable one.. Our tour guide Mr.Susil was the
                            perfect host. Friendly, courteous, knowledgeable and extremely helpful. The vehicle was well
                            maintained and very comfortable. It was a round
                            trip as we started this trip from down south and ended up in the upcountry. We are going to
                            be back again for sure!</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box">
                        <img src="images/reviewers/pic2.png" alt="">
                        <h3>Christy Peter</h3>
                        <p>Susil is a sincere, warm and genuine person. He helped to drive us and book accommodation on
                            our two visits to Sri Lanka, once during Christmas 2019 and then again February/March 2020.
                            His van is clean, comfortable and well air
                            conditioned. He is a very safe and experienced driver and was happy to help organize our
                            excursions and recommend places to go</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box">
                        <img src="images/reviewers/pic3.png" alt="">
                        <h3>john deo</h3>
                        <p>A wealth of information, Susil taught us a great deal about his beautiful country and people.
                            Susil really welcomed us into his family and treated our boys, and us, (5 yrs and 8 yrs) as
                            if they were his own. We have maintained
                            regular contact with Susil since our trips to Sri Lanka and we recommend him wholeheartedly.
                            We can’t imagine a trip to Sri Lanka without Susil!</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box">
                        <img src="images/reviewers/pic4.png" alt="">
                        <h3>Marcus Bakker</h3>
                        <p>I visited Sri Lanka in June 2022 with my wife, and we were well aware of the situation there
                            by that time.. Mr. Susil and the team did their best to make our stay a memorable and
                            smooth.. the vehicle were in the best condition
                            and comfortable for long drives.. and Mr. Susil is a good driver! He is good with maps, and
                            the details of the best places to visit.. From all the places in Sri Lanka, Ella was our
                            favourite, follwed by Hikkaduwa Beach.. it
                            was a lovely getaway and hope and pray that the country will become more stable soon...
                            Cheers.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>

    <!-- review section ends -->

    <!-- contact section starts  -->

    <section class="contact" id="contact">

        <h1 class="heading">
            <span>c</span>
            <span>o</span>
            <span>n</span>
            <span>t</span>
            <span>a</span>
            <span>c</span>
            <span>t</span>
        </h1>

        <div class="row">

            <div class="image">
                <img src="images/contact-img.svg" alt="IslandWalkers">
            </div>

            <form onsubmit="sendEmail(); reset(); return false">
                <div class="inputBox">
                    <input type="text" id="cname" placeholder="Name" required>
                    <input type="email" id="cemail" placeholder="Email" required>
                </div>
                <div class="inputBox">
                    <input type="tel" id="cphone" placeholder="Contact Number" required>
                    <input type="text" id="csubject" placeholder="Subject" required>
                </div>
                <textarea placeholder="Message" name="" id="cmessage" cols="30" rows="10"></textarea>
                <input type="submit" class="btn" value="send message" id="contact-us">
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
                <a href="#home">home</a>
                <a href="#book">book</a>
                <a href="#packages">packages</a>
                <a href="#services">services</a>
                <a href="#gallery">gallery</a>
                <a href="#review">review</a>
                <a href="#contact">contact</a>
            </div>
            <div class="box ">
                <h3>follow us</h3>
                <a href="https://www.facebook.com/islandwalkers.lk " target="_blank ">facebook</a>
                <a href="https://www.instagram.com/island_walkers/ " target="_blank ">instagram</a>
                <a href="https://api.whatsapp.com/send/?phone=94777441959&text&app_absent=0 " target="_blank ">whatsapp</a>
            </div>

        </div>

        <h1 class="credit "> Copyright © <span> ISLAND WALKERS</span> | all rights reserved! </h1>

    </section>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js "></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>


    <!-- custom js file link  -->
    <script src="js/script.js "></script>

</body>

</html>
