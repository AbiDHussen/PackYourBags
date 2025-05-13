<?php
if (isset($_POST['login'])) {
    include 'connect_database.php';
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM `users` WHERE email='$email' And password='$pass'");

    if (mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['email'] = $email; //session create

        $row = mysqli_fetch_assoc($result);
        if ($row['role'] === "Tourist") {
            echo "<script>location.href='homepage_tourist.php';</script>";
        } else {
            echo "<script>location.href='homepage_agent.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid username and Password!!')</script>";
        echo "<script>location.href='login.php'</script>";
    }
}
