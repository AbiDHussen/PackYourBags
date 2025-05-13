<?php
include 'connect_database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $package_name = $_POST["package_name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $division = $_POST["division"];
    $inclusions = $_POST["inclusions"];
    $image = $_FILES["image"]["name"];
    $image_tmp_name = $_FILES["image"]["tmp_name"];
    $upload_dir = __DIR__ . '/uploads/';

    // Move uploaded image to the "uploads" directory
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $image_path = $upload_dir . basename($image);
    if (move_uploaded_file($image_tmp_name, $image_path)) {
        // Insert package data into the database
        $sql = "INSERT INTO packages (package_name, description, price, division, inclusions, image) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdsss", $package_name, $description, $price, $division, $inclusions, $image);

        if ($stmt->execute()) {
            echo "<script>
            alert('Package added successfully.');
            window.location.href = 'add_packages.php';
          </script>";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "<script>
                alert('Failed to Upload image.');
                window.location.href = 'add_packages.php';
              </script>";
    }
}
$conn->close();
