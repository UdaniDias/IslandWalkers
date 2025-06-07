<?php

//includes connection file
include 'dbconnection\dbconnect.php';
$username = "";
$email = "";
$whereto = "";
$howmany = "";
$arrivals = "";
$leaving = "";
if (isset($_GET['bid'])) {
    $id = $_GET['bid'];
    $data = mysqli_query($conn, "SELECT * FROM bookings WHERE bid='$id'");
    $data = mysqli_fetch_assoc($data);
    $username = $data['username'];
    $email = $data['email'];
    $whereto = $data['whereto'];
    $howmany = $data['howmany'];
    $arrivals = $data['arrivals'];
    $leaving = $data['leaving'];
}
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $whereto = $_POST['whereto'];
    $howmany = $_POST['howmany'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];

    if (isset($_GET['bid'])) {
        $sql = "UPDATE bookings SET username='$username', email='$email', whereto='$whereto', howmany='$howmany', arrivals='$arrivals', leaving='$leaving' WHERE bid='$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Booking Details Successfully Updated!')</script>";
            header("Location: dashboard\bookings.php");

        }
    } else {
        $sql = "INSERT INTO bookings (username,email,whereto,howmany,arrivals,leaving)
                VALUES ('$username','$email','$whereto','$howmany','$arrivals','$leaving')";
        $insert = mysqli_query($conn, $sql);
        if ($insert) {
            echo "<script>alert('Booking Details Successfully Added!')</script>";
            header("Location: dashboard\bookings.php");

        } else {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }
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

    <!-- Data Form section starts  -->
    <section class="contact regform" id="regform">
        <h1 class="heading">
            <span>B</span>
            <span>O</span>
            <span>O</span>
            <span>K</span>
            <span>I</span>
            <span>N</span>
            <span>G</span>
            <span>S</span>
        </h1>

        <div class="row">

            <div class="image">
                <img src="images/book-img.svg" alt="">
            </div>

            <form action="" method="POST">
                <div class="inputBox">
                    <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" required>
                    <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
                </div>
                <div class="inputBox">
                    <input type="text" name="whereto" placeholder="Enter whereto" value="<?php echo $whereto; ?>"
                        required>
                    <input type="text" name="howmany" placeholder="User / Admin" value="<?php echo $howmany; ?>"
                        required>

                </div>
                <div class="inputBox">
                    <input type="text" name="arrivals" placeholder="" value="<?php echo $arrivals; ?>" required>
                    <input type="text" name="leaving" placeholder="" value="<?php echo $leaving; ?>" required>

                </div>
                <input type="submit" name="submit" class="btn" value="Update">
                <input type="reset" name="reset" class="btn" value="reset">
            </form>

        </div>
    </section>
    <!-- Data Form section end  -->

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js "></script>

    <!-- custom js file link  -->
    <script src="js/script.js "></script>

</body>

</html>