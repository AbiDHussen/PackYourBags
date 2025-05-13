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
    <title>Contact Us - PackYourBags</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #003366;
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
        }

        .contact-container {
            max-width: 800px;
            margin: 50px auto;
            background-color: rgb(184, 184, 210);
            border-radius: 10px;
            padding: 20px;
            color: black;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .contact-container h1 {
            text-align: center;
            color: #003366;
        }

        .form-label {
            color: rgb(0, 0, 0);
        }

        .form-control {
            background-color: rgb(255, 255, 255);
            color: white;
            border: 1px solid #ffcc00;
        }

        .form-control::placeholder {
            color: rgb(77, 52, 52);
        }

        .form-control:focus {
            border-color: #ffcc00;
            box-shadow: none;
        }

        .btn-custom {
            background-color: #ffcc00;
            color: #212529;
            border: none;
        }

        .btn-custom:hover {
            background-color: #e6b800;
        }

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

    <!-- Contact Us Section -->
    <div class="contact-container">
        <h1>Contact Us</h1>
        <p class="text-center">
            Have any questions, feedback, or just want to say hello? We're here to help! Fill out the form below, and we'll get back to you as soon as possible.
        </p>
        <form>
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message:</label>
                <textarea class="form-control" id="message" rows="4" placeholder="Enter your message" required></textarea>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary" name="login">Submit</button>
            </div>
        </form>
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