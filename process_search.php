<?php
include 'connect_database.php';

$minPrice = isset($_GET['min_price']) ? (int)$_GET['min_price'] : null;
$maxPrice = isset($_GET['max_price']) ? (int)$_GET['max_price'] : null;
$division = isset($_GET['division']) ? htmlspecialchars($_GET['division']) : null;

$query = "SELECT * FROM packages WHERE 1=1";

if (!empty($minPrice)) {
    $query .= " AND price >= $minPrice";
}
if (!empty($maxPrice)) {
    $query .= " AND price <= $maxPrice";
}
if (!empty($division)) {
    $query .= " AND division = '$division'";
}

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error in query: " . mysqli_error($conn));
}

$packages = [];
while ($row = mysqli_fetch_assoc($result)) {
    $packages[] = $row;
}
?>
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
    <title>Search Results</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
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
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .container {
            flex: 1;
        }
        /* Footer Styling */
        .footer {
            background-color: #003366;
            color: white;
            padding: 20px 0;
            margin-top: auto;
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

    <div class="container mt-4">
        <h2>Search Results</h2>

        <?php if (count($packages) > 0): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Package Name</th>
                        <th>Price</th>
                        <th>Division</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($packages as $package): ?>
                        <tr>
                            <td><?= htmlspecialchars($package['id']) ?></td>
                            <td><?= htmlspecialchars($package['package_name']) ?></td>
                            <td><?= htmlspecialchars($package['price']) ?></td>
                            <td><?= htmlspecialchars($package['division']) ?></td>
                            <td><?= htmlspecialchars($package['description']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-warning">No packages found matching your criteria.</div>
        <?php endif; ?>
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

</body>
</html>
