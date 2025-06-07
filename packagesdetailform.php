<?php

//includes connection file
include 'dbconnection\dbconnect.php';
$pname = "";
$description = "";
$price= "";
if (isset($_GET['pid'])) {
    $id = $_GET['pid'];
    $data = mysqli_query($conn, "SELECT * FROM packages WHERE pid='$id'");
    $data = mysqli_fetch_assoc($data);
    $pname = $data['pname'];
    $description = $data['description'];
    $price = $data['price'];
}
if (isset($_POST['submit'])) {
    $pname = $_POST['pname'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    if (isset($_GET['pid'])) {
        $sql = "UPDATE packages SET pname='$pname', description='$description', price='$price' WHERE pid='$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Package Details Successfully Updated!')</script>";
            header("Location: dashboard\packages.php");

        }
    } else {

        $sql = "INSERT INTO packages (pname,description,price)
                            VALUES ('$pname','$description','$price')";
        $insert = mysqli_query($conn, $sql);
        if ($insert) {
            echo "<script>alert('Package Details Successfully Added!')</script>";
            header("Location: dashboard\packages.php");

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
            <span>P</span>
            <span>A</span>
            <span>C</span>
            <span>K</span>
            <span>A</span>
            <span>G</span>
            <span>E</span>
            <span>S</span>
        </h1>

        <div class="row">

            <div class="image">
                <img src="images/book-img.svg" alt="">
            </div>

            <form action="" method="POST">
                <div class="inputBox">
                    <input type="text" name="pname" placeholder="Package Name" value="<?php echo $pname; ?>" required>
                </div>
                <textarea placeholder="Description" name="description" id="description" cols="30" rows="10"><?php echo $description; ?></textarea>

                <div class="inputBox">
                <input type="text" name="price" placeholder="Enter price" value="<?php echo $price; ?>" required>
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