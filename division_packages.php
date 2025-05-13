<?php

include 'connect_database.php';

$division = isset($_GET['division']) ? htmlspecialchars($_GET['division']) : '';

if (empty($division)) {
    echo "<p class='text-center mt-5'>Invalid division! Please go back and try again.</p>";
    exit;
}

$query = "SELECT * FROM `packages` WHERE `division` = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $division);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Packages in <?= htmlspecialchars(ucwords($division)) ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .package-card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .package-card:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Tour Packages in <?= htmlspecialchars(ucwords($division)) ?></h2>

        <div class="row">
            <?php
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
                    </div>';
                }
            } else {
                echo '<div class="col-12"><p class="text-center">No packages found for this division.</p></div>';
            }
            ?>
        </div>

        <div class="text-center mt-4">
            <a href="homepage_tourist.php" class="btn btn-secondary">Back to Home</a>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
// Close the database connection
$conn->close();
?>
