<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .package-details-container {
            margin-top: 50px;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .package-title {
            font-size: 2rem;
            font-weight: bold;
            color: #003366;
            margin-bottom: 20px;
        }

        .package-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .package-description {
            color: #666;
            font-size: 1rem;
            margin-bottom: 20px;
        }

        ul.package-inclusions {
            text-align: left;
            list-style-position: inside;
            /* Aligns dots closer to the text */
            padding: 0;
            /* Removes default padding */
            margin-left: auto;
            margin-right: auto;
            max-width: 1000px;
            /* Centers the list */
        }

        .price-highlight {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ff5722;
            /* Highlight price with an eye-catching color */
            margin-top: 10px;
        }

        .book-now-btn {
            background-color: #ffcc00;
            color: #003366;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            padding: 15px;
            text-transform: uppercase;
        }

        .book-now-btn:hover {
            background-color: #e6b800;
            color: #002244;
        }

        .back-btn {
            text-decoration: none;
            color: #003366;
        }

        .back-btn:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        include 'connect_database.php';

        // Check if package ID is provided
        if (!isset($_GET['id']) || empty($_GET['id'])) {
            echo '<div class="alert alert-danger mt-4">Invalid package ID.</div>';
            exit;
        }

        $package_id = intval($_GET['id']);

        // Fetch package details
        $query = "SELECT * FROM `packages` WHERE `id` = $package_id";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $package = $result->fetch_assoc();
        } else {
            echo '<div class="alert alert-danger mt-4">Package not found.</div>';
            exit;
        }

        $conn->close();
        ?>

        <!-- Package Details -->
        <div class="package-details-container">
            <h1 class="package-title"><?= htmlspecialchars($package['package_name']); ?></h1>

            <!-- Package Image -->
            <?php if (!empty($package['image'])): ?>
                <img src="uploads/<?= htmlspecialchars($package['image']); ?>" alt="<?= htmlspecialchars($package['package_name']); ?>" class="package-image">
            <?php else: ?>
                <p class="text-muted">Image not available.</p>
            <?php endif; ?>

            <p class="package-description"><?= htmlspecialchars($package['description']); ?></p>
            <h5>Package Includes:</h5>
            <ul class="package-inclusions">
                <?php
                $inclusions = explode(',', $package['inclusions']);
                foreach ($inclusions as $inclusion) {
                    echo '<li>' . htmlspecialchars(trim($inclusion)) . '</li>';
                }
                ?>
            </ul>
            <p class="price-highlight">Price: <?= htmlspecialchars($package['price']); ?>Tk</p>
            <a href="booking.php?id=<?= $package['id']; ?>" class="btn book-now-btn w-100">Book Now</a>
            <a href="homepage_tourist.php" class="d-block mt-3 back-btn">← Back to Homepage</a>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>