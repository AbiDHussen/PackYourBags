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
    <title>Tourism Management - Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

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

        .regsitration-container {
            margin-top: 100px;
            margin-bottom: 100px;
        }

        h2 {
            text-align: center;
            color: #003366;
        }

        .card {
            background-color: rgb(184, 184, 210);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
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

    <div class="container regsitration-container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <h2 class="mb-4">Register</h2>
                    <form id="registrationForm" action="process_registration.php" method="POST">
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
                        </div>
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter a secure password" required>
                        </div>
                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Re-enter your password" required>
                        </div>
                        <!-- Role -->
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="role" required>
                                <option value="Tourist">Tourist</option>
                                <option value="Agency">Agency</option>
                            </select>
                        </div>
                        <!-- Submit -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                    <p class="text-center mt-3">
                        Already have an account? <a href="login.php">Login</a>
                    </p>
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

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript for Validation -->
    <script>
        document.getElementById("registrationForm").addEventListener("submit", function(event) {
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirmPassword").value;
            if (password !== confirmPassword) {
                event.preventDefault();
                alert("Passwords do not match!");
            }
        });
    </script>
</body>

</html>