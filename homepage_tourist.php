<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PackYourBags - Home</title>
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

        .package-card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .package-card:hover {
            transform: scale(1.05);
        }

        /* image under navbar */
        .hero-section {
            position: relative;
            background-image: url('picture/background.jpg');
            /* Replace with the path to your image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 500px;
            /* Adjust height as needed */
        }

        .hero-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        .hero-content h1 {
            font-size: 3rem;
            /* Adjust the text size as needed */
            font-weight: bold;
        }

        /* division wise tour pack */
        .division-card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .division-card:hover {
            transform: scale(1.05);
        }

        .division-card img {
            height: 200px;
            object-fit: cover;
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
    <!-- navbar -->
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
                        <a class="nav-link" href="homepage_tourist.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php?isAgent=0">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php?isAgent=0">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="booking_history.php?isAgent=0">Booking History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php?isAgent=0">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registration.php?isAgent=0">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- image under navbar -->
    <div class="hero-section">
        <div class="hero-content text-center">
            <h1 class="text-white">Tour Packages Of Bangladesh</h1>
        </div>
    </div>

    <div class="container mt-4">
        <h2 class="text-center mb-4">EXPLORE OUR FAMOUS TOUR PACKAGES</h2>

        <!-- Search and Filters -->
<form method="GET" action="process_search.php" class="mb-4">
    <div class="row">
        <!-- Price Range -->
        <div class="col-md-6">
            <label for="priceRange" class="form-label">Search by Price Range</label>
            <div class="input-group">
                <input type="number" name="min_price" class="form-control" placeholder="Min Price" 
                       value="<?= isset($_GET['min_price']) ? htmlspecialchars($_GET['min_price']) : '' ?>">
                <span class="input-group-text">-</span>
                <input type="number" name="max_price" class="form-control" placeholder="Max Price" 
                       value="<?= isset($_GET['max_price']) ? htmlspecialchars($_GET['max_price']) : '' ?>">
            </div>
        </div>

        <!-- Division -->
        <div class="col-md-3">
            <label for="division" class="form-label">Search by Division</label>
            <select name="division" id="division" class="form-select">
                <option value="">Select Division</option>
                <option value="dhaka" <?= (isset($_GET['division']) && $_GET['division'] === 'dhaka') ? 'selected' : '' ?>>Dhaka</option>
                <option value="chattogram" <?= (isset($_GET['division']) && $_GET['division'] === 'chattogram') ? 'selected' : '' ?>>Chattogram</option>
                <option value="sylhet" <?= (isset($_GET['division']) && $_GET['division'] === 'sylhet') ? 'selected' : '' ?>>Sylhet</option>
                <option value="khulna" <?= (isset($_GET['division']) && $_GET['division'] === 'khulna') ? 'selected' : '' ?>>Khulna</option>
                <option value="barishal" <?= (isset($_GET['division']) && $_GET['division'] === 'barishal') ? 'selected' : '' ?>>Barishal</option>
                <option value="rajshahi" <?= (isset($_GET['division']) && $_GET['division'] === 'rajshahi') ? 'selected' : '' ?>>Rajshahi</option>
                <option value="rangpur" <?= (isset($_GET['division']) && $_GET['division'] === 'rangpur') ? 'selected' : '' ?>>Rangpur</option>
                <option value="mymensingh" <?= (isset($_GET['division']) && $_GET['division'] === 'mymensingh') ? 'selected' : '' ?>>Mymensingh</option>
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label d-block">&nbsp;</label>
            <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
        </div>
    </div>
</form>


        <!-- Display Tour Packages -->
        <div class="row">
            <?php
            include 'connect_database.php';

            // Search and Filter Logic
            $search = isset($_GET['search']) ? trim($_GET['search']) : '';
            $filter = isset($_GET['filter']) ? trim($_GET['filter']) : '';
            $query = "SELECT * FROM `packages` WHERE 1";

            if ($search) {
                $query .= " AND `package_name` LIKE '%$search%'";
            }
            if ($filter) {
                $query .= " AND `category` = '$filter'";
            }

            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                        <div class="col-md-4 mb-4">
                            <div class="card package-card">
                                <img src="uploads/' . htmlspecialchars($row['image']) . '" class="card-img-top" alt="' . htmlspecialchars($row['package_name']) . '">
                                <div class="card-body">
                                    <h5 class="card-title">' . htmlspecialchars($row['package_name']) . '</h5>
                                    <p class="card-text">' . htmlspecialchars(substr($row['description'], 0, 100)) . '...</p>
                                    <p class="card-text"><strong>Price:</strong> ' . htmlspecialchars($row['price']) . 'Tk </p>
                                    <a href="package_details.php?id=' . $row['id'] . '" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                    ';
                }
            } else {
                echo '<div class="col-12"><p class="text-center">No packages found.</p></div>';
            }

            $conn->close();
            ?>
        </div>
    </div>

    <!-- division wise tour package -->
    <div class="container mt-4">
        <h2 class="text-center mb-4">Explore Tour Packages by Division</h2>
        <div class="row">
            <!-- Cards for Each Division -->
            <?php
            $divisions = [
                'SYLHET' => 'Sylhet.jpg',
                'CHATTOGRAM' => 'Chattogram.jpg',
                'DHAKA' => 'Dhaka.jpg',
                'KHULNA' => 'Khulna.jpg',
                'RAJSHAHI' => 'Rajshahi.jpg',
                'COMILLA' => 'Comilla.jpg'
            ];

            foreach ($divisions as $division => $image) {
                echo '
                <div class="col-md-4 mb-4">
                    <div class="card division-card">
                        <img src="uploads/' . htmlspecialchars($image) . '" class="card-img-top" alt="' . htmlspecialchars($division) . '">
                        <div class="card-body text-center">
                            <h5 class="card-title">' . htmlspecialchars($division) . '</h5>
                            <a href="division_packages.php?division=' . urlencode($division) . '" class="btn btn-primary">View Packages</a>
                        </div>
                    </div>
                </div>
            ';
            }
            ?>
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