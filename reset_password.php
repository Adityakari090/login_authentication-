<?php
include 'db.php';

$username = $_POST['username'];
$new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);

// Check if user exists
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Update password
    $update = "UPDATE users SET password='$new_password' WHERE username='$username'";
    if ($conn->query($update) === TRUE) {
        echo "<script>alert('Password updated successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "Error updating password: " . $conn->error;
    }
} else {
    echo "<script>alert('User not found'); window.location.href='forgot_password.html';</script>";
}

$conn->close();
?>
