<?php
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // ✅ Redirect on success
        header("Location: login_success.html");
        exit(); // <-- THIS IS REQUIRED
    } else {
        echo "<script>alert('Incorrect password'); window.location.href='index.html';</script>";
    }
} else {
    echo "<script>alert('User not found'); window.location.href='index.html';</script>";
}

$conn->close();
?>
