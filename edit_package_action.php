<?php
include 'connect_database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $package_name = $_POST['package_name']; 
    $description = $_POST['description']; 
    $price = floatval($_POST['price']);
    $division = $_POST['division']; 
    $inclusions = $_POST['inclusions'];

    if (!empty($package_name) && !empty($division) && $price > 0 && !empty($description) && !empty($inclusions)) {
        $sql = "UPDATE packages SET package_name = ?, description = ?, price = ?, division = ?, inclusions = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("ssdssi", $package_name, $description, $price, $division, $inclusions, $id);

        if ($stmt->execute()) {
            header("Location: edit_package.php?status=success");
        } else {
            header("Location: edit_package.php?status=error");
        }

        $stmt->close();
    } else {
        header("Location: edit_package.php?status=invalid");
    }
} else {
    header("Location: edit_package.php");
}

// Close the database connection
$conn->close();
