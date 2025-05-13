<?php
include 'connect_database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
  $id = intval($_POST['id']);

  $sql = "DELETE FROM packages WHERE id = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id);

  if ($stmt->execute()) {
    echo "<script>
                alert('Package deleted successfully.');
                window.location.href = 'delete_package.php'; // Redirect back to the table page
              </script>";
  } else {
    echo "<script>
                alert('Failed to delete package. Please try again.');
                window.history.back();
              </script>";
  }
  // Close the statement
  $stmt->close();
}

// Close the connection
$conn->close();
