<?php
include '..\dbconnection\dbconnect.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ..\index.php");
}

if (isset($_GET['bid'])) {
    $id = $_GET['bid'];
    $sql = "DELETE FROM bookings WHERE bid='$id'";
    $delete = mysqli_query($conn, $sql);
    if ($delete) {
        header("Location: bookings.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="style.css">

    <title>Admin Dashboard</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="..\index.php" class="brand">
            <i class='bx bxs-smile'></i>
            <span class="text">Island Walkers</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="adminpanel.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="..\index.php">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Home</span>
                </a>
            </li>
            <li>
                <a href="userdetails.php">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">User Details</span>
                </a>
            </li>
            <li>
                <a href="packages.php">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Packages</span>
                </a>
            </li>
            <li>
                <a href="bookings.php">
                    <i class='bx bxs-group'></i>
                    <span class="text">Bookings</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="logout.php" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Menu</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <a href="#" class="profile">
                <img src="img/people.png">
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Welcome <?php echo $_SESSION['username'];
                                ?>!</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
                <a href="..\bookingdetailform.php" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">New Booking</span>
				</a>
            </div>
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Recent Bookings</h3>
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>
                    </div>

                    <!-- User Details -->
                    <?php
                    $sql = "SELECT * from bookings";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "
                                <table style='width:100%'>              
                                    <thead>
                                     <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Whereto</th>
                                        <th>How Many</th>
                                        <th>Arrivals</th>
                                        <th>Leaving</th>
                                        <th>Action Update</th>
                                        <th>Action Delete</th>
                                     </tr>
                                    </thead>";
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo
                            "<tbody>
                                    <tr>
                                    <td>" . $row["username"] . "</td>
                                    <td>" . $row["email"] . "</td>
                                    <td>" . $row["whereto"] . "</td>
                                    <td>" . $row["howmany"] . "</td>
                                    <td>" . $row["arrivals"] . "</td>
                                    <td>" . $row["leaving"] . "</td>
                                    <td><a href='..\bookingdetailform.php?bid=" . $row["bid"] . "' span class='status completed'>Update</span></td>
                                    <td><a href='?bid=" . $row["bid"] . "' span class='status pending'>Delete</span></td>
                                    
                                    </tr>
                                    ";
                        }

                        $conn->close();
                    }
                    ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="script.js"></script>
</body>

</html>