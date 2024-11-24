<?php
session_start();
require 'db_connection.php'; // Connect to the database

$error = ''; // Variable to store error message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $error = 'Both username and password are required.';
    } else {
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);

            if (password_verify($password, $user['password'])) {
                // Authentication successful
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $user['id'];
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                header("Location: welcome.php");
                exit();
            } else {
                $error = "Invalid username or password. Please try again.";
            }
        } else {
            $error = "Invalid username or password. Please try again.";
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}

if (!empty($error)) {
    // Log errors and handle them gracefully
    // For demonstration, let's just echo the error message
    echo "<p>" . htmlspecialchars($error) . "</p>";
}
?>
