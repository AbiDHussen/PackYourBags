<?php
include 'connect_database.php';
$username = $_POST['name'];
$pass = $_POST["password"];
$con_pass = $_POST["confirmPassword"];
$email = $_POST["email"];
$role = $_POST["role"];

$insert_query = "INSERT INTO `users`(`name`, `email`, `password`, `role`) VALUES ('$username','$email','$pass','$role')";

$duplicate_email = mysqli_query($conn, "SELECT * FROM `users` WHERE email='$email'");

if (strlen($username) < 3 || strlen($username) > 20) {
    echo "<script>alert('User Name should be 3-20 char!!!!')</script>";
    echo "<script>location.href='registration.php'</script>";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Invalid Email!!')</script>";
    echo "<script>location.href='registration.php'</script>";
} else if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/', $pass)) {
    echo "<script>alert('Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character.')</script>";
    echo "<script>location.href='registration.php'</script>";
} else if ($pass !== $con_pass) {
    echo "<script>alert('Pass and confirm pass is not matching!!')</script>";
    echo "<script>location.href='registration.php'</script>";
} else if (mysqli_num_rows($duplicate_email) > 0) {
    echo "<script>alert('email already taken!!')</script>";
    echo "<script>location.href='registration.php'</script>";
} else {
    if (!mysqli_query($conn, $insert_query)) {
        error_log("Database error: " . mysqli_error($conn));
        die("Something went wrong. Please try again later.");
    } else {
        echo "<script>alert('Registration successful! You can now log in.');</script>";
        echo "<script>location.href='login.php';</script>";
    }
}
