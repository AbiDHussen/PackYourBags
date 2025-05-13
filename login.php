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
    <title>Login - Tourism Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .navbar {
            background-color: #003366;
            /* Deep blue */
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

        h2 {
            text-align: center;
            color: #003366;
        }

        .login-container {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .card {
            background-color: rgb(184, 184, 210);
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Footer Styling */
        .footer {
            background-color: #003366;
            color: white;
            padding: 20px 0;
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

    <div class="container login-container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="mb-4">Login</h2>
                        <?php
                        // Display session messages for errors or success
                        session_start();
                        if (isset($_SESSION['error'])) {
                            echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
                            unset($_SESSION['error']);
                        }
                        if (isset($_SESSION['success'])) {
                            echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
                            unset($_SESSION['success']);
                        }
                        ?>
                        <form action="process_login.php" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary" name="login">Login</button>
                            </div>
                        </form>
                        <p class="text-center mt-3">
                            Don't have an account? <a href="registration.php">Register here</a>.
                        </p>
                    </div>
                </div>
            </div>
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


    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>