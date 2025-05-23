<?php
include 'db.php';

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
    // ✅ Redirect to a confirmation page
    header("Location: registered.html");
    exit(); // <-- Required to stop PHP execution
} else {
    echo "<script>alert('Error: " . $conn->error . "'); window.location.href='register.html';</script>";
}

$conn->close();
?>
