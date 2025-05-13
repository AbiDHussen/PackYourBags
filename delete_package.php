<?php
if (isset($_GET['isAgent'])) {
    $is_agent = $_GET['isAgent'];
} else {
    $is_agent = 0;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Package</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .navbar {
            background-color: #003366;
            /* Deep blue */
            margin-bottom: 50px;
        }

        .navbar-brand img {
            height: 60px;
            width: 100px;
        }

        .navbar-nav .nav-link {
            color: white !important;
        }

        .navbar-nav .nav-link:hover {
            color: #ffcc00 !important;
            /* Golden yellow */
        }

        body {
            background-color: #f8f9fa;
        }

        .table-container {
            margin: 20px auto;
            max-width: 800px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-delete {
            color: white;
            background-color: #dc3545;
            border: none;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        /* Footer Styling */
        .footer {
            background-color: #003366;
            color: white;
            padding: 20px 0;
            margin-top: 50px;
        }

        .footer a {
            color: #ffcc00;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="picture/LogoNewNoBG.png" alt="PackYourBags Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <?php
                        if ($is_agent) {
                            echo '<a class="nav-link" href="homepage_agent.php?isAgent=' . $is_agent . '">Home</a>';
                        } else {
                            echo '<a class="nav-link" href="homepage_tourist.php?isAgent=' . $is_agent . '">Home</a>';
                        }
                        ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php?isAgent=<?php echo $is_agent; ?>">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php?isAgent=<?php echo $is_agent; ?>">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="booking_history.php?isAgent=<?php echo $is_agent; ?>">Booking History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php?isAgent=<?php echo $is_agent; ?>">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registration.php?isAgent=<?php echo $is_agent; ?>">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php?isAgent=<?php echo $is_agent; ?>">Log Out</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>


    <div class="container table-container">
        <h2 class="text-center mb-4">Delete Tour Package</h2>
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Package Name</th>
                    <th>Price</th>
                    <th>Division</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connect_database.php';

                $sql = "SELECT id, package_name, price, division FROM packages";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $index = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $index++ . "</td>
                                <td>" . $row['package_name'] . "</td>
                                <td>$" . $row['price'] . "</td>
                                <td>" . $row['division'] . "</td>
                                <td>
                                    <form action='delete_package_action.php' method='POST' style='display: inline-block;'>
                                        <input type='hidden' name='id' value='" . $row['id'] . "'>
                                        <button type='submit' class='btn btn-delete btn-sm' onclick='return confirm('Are you sure you want to delete this package?')'>Delete</button>
                                    </form>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>No packages found.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
        <div class="text-center">
            <a href="homepage_agent.php" class="btn btn-secondary">Back to Dashboard</a>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer text-white" style="background-color: #003366;">
        <div class="container py-5">
            <div class="row">
                <!-- Payment Methods -->
                <div class="col-md-4 d-flex flex-column align-items-center">
                    <h5 class="fw-bold text-center">We Accept</h5>
                    <div class="d-flex flex-wrap justify-content-center">
                        <div class="d-flex justify-content-center align-items-center" style="width: 33.33%;">
                            <img src="picture/nagad.svg" alt="Nagad" class="m-2" style="height: 40px;">
                        </div>
                        <div class="d-flex justify-content-center align-items-center" style="width: 33.33%;">
                            <img src="picture/upay.svg" alt="Upay" class="m-2" style="height: 40px;">
                        </div>
                        <div class="d-flex justify-content-center align-items-center" style="width: 33.33%;">
                            <img src="picture/visaCard.svg" alt="VISA" class="m-2" style="height: 40px;">
                        </div>
                        <div class="d-flex justify-content-center align-items-center" style="width: 33.33%;">
                            <img src="picture/masterCard.svg" alt="MasterCard" class="m-2" style="height: 40px;">
                        </div>
                        <div class="d-flex justify-content-center align-items-center" style="width: 33.33%;">
                            <img src="picture/bkash.svg" alt="bKash" class="m-2" style="height: 40px;">
                        </div>
                        <div class="d-flex justify-content-center align-items-center" style="width: 33.33%;">
                            <img src="picture/dbbl.svg" alt="DBBL" class="m-2" style="height: 40px;">
                        </div>
                    </div>
                </div>
                <!-- Contact Us -->
                <div class="col-md-4">
                    <h5 class="fw-bold">CONTACT US</h5>
                    <p>
                        <i class="bi bi-geo-alt-fill"></i>5TH FLOOR, ARCADIA, SYLHET, BANGLADESH
                    </p>
                    <p>
                        <i class="bi bi-telephone-fill"></i> +8801704206217
                    </p>
                    <p>
                        <i class="bi bi-envelope-fill"></i> ask@packyourbags.com
                    </p>
                    <div>
                        <a href="#" class="text-white me-2"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white me-2"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-white me-2"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="text-white me-2"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="text-white me-2"><i class="bi bi-pinterest"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <!-- About -->
                <div class="col-md-4">
                    <h5 class="fw-bold">PACKYOURBAGS.COM</h5>
                    <p>
                        PackYourBags is a trusted and reliable tour and travel agency among all the leading and updated tour-operating services in Bangladesh. We are here to bring luxury to your travels.
                    </p>
                    <p>
                        Safe traveling, your security, and your enjoyment are our primary focus. Our experienced guides ensure you enjoy every moment with a smile.
                    </p>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>