<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "profile");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$name = isset($_POST['username']) ? trim($_POST['username']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';

// Validate that fields are not empty
if (empty($name) || empty($email) || empty($phone)) {
    die("Error: All fields are required!");
}

// Use prepared statement for security
$sql = "INSERT INTO contact (name, email, phone) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $phone);
    
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        header("Location: view.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Error preparing statement: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>