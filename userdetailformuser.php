<?php

//includes connection file
include 'dbconnection\dbconnect.php';
$username = "";
$email = "";
$password= "";
$user_type = "";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
    $data = mysqli_fetch_assoc($data);
    $username = $data['username'];
    $email = $data['email'];
    $password = $data['password'];
    $user_type = $data['user_type'];
}
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];

    if (isset($_GET['id'])) {
        $sql = "UPDATE users SET username='$username', email='$email', password='$password', user_type='$user_type' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('User Details Successfully Updated!')</script>";
            header("Location: dashboard\myprofile.php");

        }
    } else {

        $sql = "INSERT INTO users (username,email,password,user_type)
                            VALUES ('$username','$email','$password','$user_type')";
        $insert = mysqli_query($conn, $sql);
        if ($insert) {
            echo "<script>alert('User Details Successfully Added!')</script>";
            header("Location: dashboard\myprofile.php");

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
            <span>U</span>
            <span>S</span>
            <span>E</span>
            <span>R</span>
            <span class="space"></span>
            <span>D</span>
            <span>A</span>
            <span>T</span>
            <span>A</span>
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
                    <input type="password" name="password" placeholder="Enter Password" value="<?php echo $password; ?>" required>
                </div>
                <div class="inputBox">
                    <input type="text" name="user_type" placeholder="User / Admin" value="<?php echo $user_type; ?>" required>
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